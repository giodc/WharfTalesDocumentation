<?php

namespace WharfDocs;

class NavigationBuilder
{
    private $docsPath;

    public function __construct($docsPath)
    {
        $this->docsPath = $docsPath;
    }

    public function build()
    {
        if (!is_dir($this->docsPath)) {
            return [];
        }

        return $this->scanDirectory($this->docsPath);
    }

    private function scanDirectory($dir, $basePath = '')
    {
        $items = [];
        $entries = scandir($dir);
        
        foreach ($entries as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            
            $fullPath = $dir . '/' . $entry;
            $relativePath = $basePath ? $basePath . '/' . $entry : $entry;
            
            if (is_dir($fullPath)) {
                // It's a directory - create a section
                $sectionName = $this->formatName($entry);
                $children = $this->scanDirectory($fullPath, $relativePath);
                
                if (!empty($children)) {
                    $items[] = [
                        'type' => 'section',
                        'title' => $sectionName,
                        'path' => $this->getDocPath($relativePath),
                        'children' => $children,
                        'order' => $this->extractOrder($entry)
                    ];
                }
            } elseif (pathinfo($entry, PATHINFO_EXTENSION) === 'md') {
                // It's a markdown file
                $title = $this->extractTitleFromFile($fullPath);
                $path = $this->getDocPath($relativePath);
                
                $items[] = [
                    'type' => 'page',
                    'title' => $title,
                    'path' => $path,
                    'order' => $this->extractOrder($entry)
                ];
            }
        }
        
        // Sort by order
        usort($items, function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });
        
        return $items;
    }

    private function formatName($name)
    {
        // Remove numeric prefix if exists (e.g., "1.getting-started" -> "Getting Started")
        $name = preg_replace('/^\d+\./', '', $name);
        
        // Replace hyphens and underscores with spaces
        $name = str_replace(['-', '_'], ' ', $name);
        
        // Capitalize words
        return ucwords($name);
    }

    private function extractOrder($name)
    {
        // Extract numeric prefix for ordering (e.g., "1.introduction.md" -> 1)
        if (preg_match('/^(\d+)\./', $name, $matches)) {
            return (int)$matches[1];
        }
        return 999; // Default order for items without numeric prefix
    }

    private function extractTitleFromFile($filePath)
    {
        $content = file_get_contents($filePath);
        
        // Try to get title from frontmatter
        if (preg_match('/^---\s*\ntitle:\s*(.+)\n/m', $content, $matches)) {
            return trim($matches[1]);
        }
        
        // Try to get first H1 heading
        if (preg_match('/^#\s+(.+)$/m', $content, $matches)) {
            return trim($matches[1]);
        }
        
        // Fallback to filename
        $filename = basename($filePath, '.md');
        return $this->formatName($filename);
    }

    private function getDocPath($relativePath)
    {
        // Remove .md extension and convert to URL path
        $path = preg_replace('/\.md$/', '', $relativePath);
        
        // Remove numeric prefixes from all path segments
        $parts = explode('/', $path);
        $cleanParts = array_map(function($part) {
            return preg_replace('/^\d+\./', '', $part);
        }, $parts);
        $path = implode('/', $cleanParts);
        
        // Remove index or README from path
        $path = preg_replace('/(\/|^)(index|README)$/', '', $path);
        
        return $path;
    }
}
