# WharfDocs - No Composer Required! 🎉

## Truly Standalone Installation

WharfDocs is now **100% standalone** - no Composer, no npm, no build process required!

## What Changed?

### Before (Required Composer)
```bash
composer install  # Had to install dependencies
php -S localhost:8000
```

### Now (No Installation)
```bash
php -S localhost:8000  # Just works!
```

## How It Works

All required libraries are included directly in the `lib/` folder:

```
lib/
├── Parsedown.php       # Markdown parser
└── ParsedownExtra.php  # Extended Markdown features
```

These files are loaded directly in `index.php` using `require_once` - no autoloader needed!

## Installation Methods

### Method 1: Download and Run (Easiest)

1. Download or clone the repository
2. Navigate to the directory
3. Run: `php -S localhost:8000`
4. Open: `http://localhost:8000`

**That's it!** No installation, no dependencies, no setup.

### Method 2: Upload to Shared Hosting

1. Upload all files via FTP (including `lib/` folder)
2. Point your domain to the directory
3. Done!

Works on any PHP hosting - no SSH access required!

### Method 3: Use with Docker

```dockerfile
FROM php:7.4-apache
COPY . /var/www/html/
```

No composer install step needed!

## File Structure

```
wharfdocs/
├── lib/                    # ← Required libraries (included)
│   ├── Parsedown.php
│   └── ParsedownExtra.php
├── src/                    # ← Your PHP code
├── docs/                   # ← Your documentation
├── templates/              # ← HTML templates
├── assets/                 # ← CSS/JS
├── index.php               # ← Entry point
├── config.php              # ← Configuration
└── .htaccess              # ← Apache config
```

## Benefits

✅ **No Dependencies** - Everything included
✅ **No Build Process** - Upload and run
✅ **No Composer** - One less tool to install
✅ **No npm** - Pure PHP solution
✅ **Portable** - Works anywhere PHP runs
✅ **Simple** - Just PHP files
✅ **Fast Setup** - Literally seconds
✅ **Shared Hosting Friendly** - No SSH needed

## What About Composer?

Composer is now **completely optional**. The `composer.json` file is included for those who want to use it, but it's not required.

### When to Use Composer (Optional)

- If you want to update Parsedown libraries
- If you're adding additional PHP packages
- If you prefer package management

### When NOT to Use Composer (Default)

- Quick deployment
- Shared hosting without SSH
- Simple projects
- Maximum portability
- Minimal dependencies

## Updating Libraries

If you want to update the Parsedown libraries:

### Option 1: Manual Update (No Composer)

```bash
# Download latest Parsedown
curl -o lib/Parsedown.php https://raw.githubusercontent.com/erusev/parsedown/master/Parsedown.php

# Download latest ParsedownExtra
curl -o lib/ParsedownExtra.php https://raw.githubusercontent.com/erusev/parsedown-extra/master/ParsedownExtra.php
```

### Option 2: Use Composer (Optional)

```bash
composer update
# Then copy from vendor/ to lib/ if needed
```

## Deployment Examples

### Shared Hosting (cPanel)

1. Zip the project
2. Upload via File Manager
3. Extract
4. Point domain to directory
5. **Done!**

### VPS/Cloud

```bash
cd /var/www/html
git clone your-repo
# No composer install needed!
```

### Netlify/Vercel (with PHP support)

Just push to Git - no build commands needed!

## Troubleshooting

### "Class 'Parsedown' not found"

**Solution:** Make sure the `lib/` folder is uploaded with both files:
- `lib/Parsedown.php`
- `lib/ParsedownExtra.php`

### "Cannot find lib/Parsedown.php"

**Solution:** Check file paths. The `lib/` folder should be in the same directory as `index.php`.

### Still want to use Composer?

No problem! The `composer.json` is still there. Just run:

```bash
composer install
```

The system will work with either approach!

## Comparison

| Feature | With Composer | Without Composer |
|---------|---------------|------------------|
| Installation | `composer install` | None required |
| File Size | ~1MB (vendor) | ~70KB (lib) |
| Deployment | Upload + install | Upload only |
| Shared Hosting | Needs SSH | Works via FTP |
| Portability | Good | Excellent |
| Updates | `composer update` | Manual download |
| Dependencies | Managed | Included |

## Why This Matters

### For Developers
- Faster setup
- Less complexity
- More portable
- Easier to understand

### For Deployment
- No build step
- No SSH required
- Works on any hosting
- Faster deployment

### For Users
- Download and run
- No technical knowledge needed
- Works immediately
- No troubleshooting

## Summary

WharfDocs is now a **truly standalone PHP application**:

- ✅ No Composer required
- ✅ No npm required
- ✅ No build process
- ✅ No installation steps
- ✅ Just upload and run!

**It's as simple as PHP can be!**

---

**Questions?** Check the README.md or QUICK_START.md for more info.
