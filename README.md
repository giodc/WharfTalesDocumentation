# WharfDocs - Static PHP Documentation Generator

A modern, standalone PHP documentation system inspired by Docus.dev. Create beautiful documentation websites from Markdown files with zero build process.

![PHP Version](https://img.shields.io/badge/PHP-%3E%3D7.4-blue)
![License](https://img.shields.io/badge/license-MIT-green)

## Features

✨ **Modern UI** - Clean, responsive design with dark mode support  
📝 **Markdown-based** - Write documentation in simple Markdown  
🔍 **Full-text Search** - Built-in search with real-time results  
🎨 **Syntax Highlighting** - Beautiful code blocks with highlight.js  
📱 **Responsive** - Works perfectly on all devices  
🔗 **SEO-friendly Permalinks** - Clean URLs for better search rankings  
📑 **Auto-generated Navigation** - Sidebar builds automatically from file structure  
📖 **Table of Contents** - Automatic TOC for easy page navigation  
⚡ **Fast & Simple** - No build process, just PHP and Markdown  
🎯 **Easy to Deploy** - Works on any PHP hosting

## Quick Start

### Requirements

- PHP 7.4 or higher
- Web server (Apache/Nginx) or PHP built-in server
- **Composer is NOT required** - all dependencies are included!

### Installation

1. **Clone or download this repository**

```bash
git clone https://github.com/yourusername/wharfdocs.git
cd wharfdocs
```

2. **That's it! No installation needed** - all libraries are included in the `lib/` folder

3. **Start the development server**

```bash
php -S localhost:8000
```

4. **Open your browser**

Navigate to `http://localhost:8000` and you'll see your documentation!

## Project Structure

```
wharfdocs/
├── docs/                          # Your documentation files (Markdown)
│   ├── 1.getting-started/
│   │   ├── 1.introduction.md
│   │   ├── 2.installation.md
│   │   └── 3.project-structure.md
│   ├── 2.core-concepts/
│   └── 3.advanced/
├── src/                           # PHP source code
│   ├── DocumentationEngine.php    # Main engine
│   ├── MarkdownParser.php         # Markdown to HTML converter
│   ├── NavigationBuilder.php      # Auto-generates navigation
│   └── SearchIndexer.php          # Search functionality
├── templates/                     # HTML templates
│   └── layout.php                 # Main layout template
├── assets/                        # Static assets
│   └── css/
│       └── style.css
├── index.php                      # Entry point
├── config.php                     # Configuration file
└── composer.json                  # PHP dependencies
```

## Creating Documentation

### File Naming Convention

Files and directories use numeric prefixes to control ordering:

```
docs/
  1.getting-started/
    1.introduction.md
    2.installation.md
  2.core-concepts/
    1.markdown-syntax.md
```

The numbers are removed from URLs:
- `1.getting-started/1.introduction.md` → `/getting-started/introduction`

### Markdown File Format

Each Markdown file should include frontmatter:

```markdown
---
title: Page Title
description: Page description for SEO
---

# Page Title

Your content here...
```

### Adding New Pages

1. Create a new `.md` file in the appropriate directory
2. Add frontmatter with title and description
3. Write your content in Markdown
4. Navigation updates automatically!

## Configuration

Edit `config.php` to customize your documentation:

```php
<?php

return [
    'site_name' => 'Your Documentation',
    'site_description' => 'Your project documentation',
    'default_page' => 'getting-started/introduction',
    'github_repo' => 'https://github.com/user/repo',
    'features' => [
        'search' => true,
        'dark_mode' => true,
        'edit_link' => true,
        'toc' => true,
    ]
];
```

## Deployment

### Apache

The included `.htaccess` file handles URL rewriting automatically. Just point your virtual host to the project directory.

```apache
<VirtualHost *:80>
    ServerName docs.yourdomain.com
    DocumentRoot /path/to/wharfdocs
    
    <Directory /path/to/wharfdocs>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Nginx

Add this configuration to your Nginx server block:

```nginx
server {
    listen 80;
    server_name docs.yourdomain.com;
    root /path/to/wharfdocs;
    
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}
```

### Shared Hosting

1. Upload all files to your hosting account (including the `lib/` folder)
2. Ensure `.htaccess` is uploaded (for Apache)
3. Point your domain to the project directory
4. **No installation required** - it works immediately!

## Customization

### Styling

Edit CSS variables in `templates/layout.php`:

```css
:root {
    --color-primary: #3b82f6;
    --color-bg: #ffffff;
    --color-text: #1f2937;
}
```

Or add custom styles in `assets/css/style.css`.

### Templates

Modify `templates/layout.php` to change the HTML structure, add custom headers, footers, or additional features.

### Markdown Processing

Extend `src/MarkdownParser.php` to add custom Markdown syntax or processing.

## Features in Detail

### Search

- Real-time search as you type
- Searches titles, headings, and content
- Results ranked by relevance
- Highlights matching terms
- API endpoint: `/api/search?q=query`

### Navigation

- Auto-generated from file structure
- Supports nested sections
- Numeric prefixes control order
- Active page highlighting

### Permalinks

- SEO-friendly URLs
- Automatically generated from file paths
- Canonical URLs for each page
- Clean, readable structure

### Dark Mode

- Toggle between light and dark themes
- Preference saved in localStorage
- Smooth transitions
- Optimized for readability

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

MIT License - feel free to use this for your projects!

## Credits

- Inspired by [Docus.dev](https://docus.dev)
- Markdown parsing by [Parsedown](https://parsedown.org)
- Syntax highlighting by [Highlight.js](https://highlightjs.org)
- Styling with [Tailwind CSS](https://tailwindcss.com)

## Support

For issues, questions, or suggestions, please open an issue on GitHub.

---

**Made with ❤️ for the documentation community**
