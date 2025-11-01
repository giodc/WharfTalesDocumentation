# Quick Start Guide

Get WharfDocs running in 3 minutes!

## Installation

```bash
# 1. No installation needed! Just start the server
php -S localhost:8000

# 2. Open browser
open http://localhost:8000
```

**That's it!** No Composer, no npm, no build process. All dependencies are included in the `lib/` folder.

## Creating Your First Page

1. **Create a new Markdown file** in the `docs/` directory:

```bash
# Example: Create a new guide
mkdir -p docs/4.guides
touch docs/4.guides/1.my-first-guide.md
```

2. **Add content** with frontmatter:

```markdown
---
title: My First Guide
description: This is my first documentation page
---

# My First Guide

Welcome to my documentation!

## Getting Started

Here's how to use this feature...
```

3. **Refresh your browser** - the new page appears automatically in navigation!

## File Organization

```
docs/
  1.getting-started/       # Section 1
    1.introduction.md      # First page
    2.installation.md      # Second page
  2.core-concepts/         # Section 2
    1.markdown-syntax.md
  3.advanced/              # Section 3
    1.customization.md
```

**Rules:**
- Numbers control order (1, 2, 3...)
- Use hyphens for spaces
- `.md` extension required
- Numbers removed from URLs

## Customization

### Change Site Name

Edit `config.php`:

```php
'site_name' => 'My Awesome Docs',
```

### Change Colors

Edit `templates/layout.php`:

```css
:root {
    --color-primary: #ff6b6b;  /* Your brand color */
}
```

### Add Custom CSS

Edit `assets/css/style.css`:

```css
/* Your custom styles */
.prose h1 {
    color: #ff6b6b;
}
```

## Features Overview

### Search
- Type in the search box (top right)
- Real-time results as you type
- Searches titles, headings, and content

### Dark Mode
- Click the moon/sun icon (top right)
- Preference saved automatically

### Navigation
- Auto-generated from file structure
- Nested sections supported
- Active page highlighted

### Table of Contents
- Shows on right side (desktop)
- Lists all headings on current page
- Click to jump to section

## Common Tasks

### Add a New Section

```bash
mkdir docs/5.my-section
touch docs/5.my-section/1.first-page.md
```

### Reorder Pages

Rename files to change order:

```bash
# Move page to first position
mv docs/section/3.page.md docs/section/1.page.md
```

### Add Code Blocks

Use triple backticks with language:

````markdown
```php
<?php
echo "Hello, World!";
```
````

### Add Images

```markdown
![Alt text](/assets/images/screenshot.png)
```

Place images in `assets/images/` directory.

### Link Between Pages

```markdown
See the [Installation Guide](../getting-started/installation)
```

## Deployment

### Quick Deploy (Shared Hosting)

1. Upload all files via FTP (including `lib/` folder)
2. Point domain to the directory
3. Done! No installation required!

### Apache VirtualHost

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

```nginx
server {
    server_name docs.yourdomain.com;
    root /path/to/wharfdocs;
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php-fpm.sock;
        include fastcgi_params;
    }
}
```

## Tips & Tricks

1. **Use descriptive filenames** - They become URLs
2. **Keep sections organized** - Use numbered directories
3. **Write good descriptions** - They help with SEO
4. **Test on mobile** - Responsive design works everywhere
5. **Use headings properly** - H2, H3, H4 for structure

## Troubleshooting

**Pages not showing?**
- Check file has `.md` extension
- Verify frontmatter format
- Refresh browser

**Search not working?**
- Check JavaScript console for errors
- Ensure `/api/search` endpoint works

**Styles broken?**
- Check `assets/css/style.css` exists
- Verify web server serves static files

## Need Help?

- Read full docs at `/getting-started/introduction`
- Check `README.md` for detailed info
- See `INSTALL.md` for installation help

---

**You're ready to create amazing documentation! 🚀**
