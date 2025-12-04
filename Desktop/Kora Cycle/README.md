# Kora Cycle — PHP conversion notes

What I changed
- Added a shared navigation include: `includes/nav.php`.
- Converted several pages from static HTML to PHP so they can `include` the shared nav:
  - `index.php` (already added)
  - `healthlibrary.php` (already added)
  - `sugar-skin-aging-article.php` (article page)
  - `about.php` (new)
  - `calculator.php` (new)
  - `product.php` (new)
  - `forclinicians.php` (new)
  - `subscribtions.php` (new)

Why this helps
- Using `<?php include 'includes/nav.php'; ?>` centralizes navigation markup so you can update links, mobile menu, or scripts in one place instead of editing every page.

How to run locally (XAMPP)
1. Move the `Kora Cycle` folder into your XAMPP `htdocs` directory (e.g. `C:\xampp\htdocs\Kora Cycle`).
2. Start Apache from the XAMPP control panel.
3. Open `http://localhost/Kora%20Cycle/index.php` in your browser.

Quick alternative (PHP built-in server)
1. Open PowerShell and run:
```powershell
cd 'C:\Users\user\Desktop\Kora Cycle'
php -S localhost:8000
# Then open http://localhost:8000/index.php
```

Notes for your lecturer
- Show `includes/nav.php` — a single file showing the nav HTML and the mobile toggle script.
- Show any converted page (e.g. `index.php`) where the include is invoked as a single line near the top:
```php
<?php include 'includes/nav.php'; ?>
```
- Explain that PHP runs server-side: the server assembles the final HTML (nav + page) and returns it to the browser. GitHub Pages will not execute PHP; use XAMPP or a PHP-capable host to demo.

If you want
- I can remove the original `.html` files after you confirm everything looks correct.
- I can convert the remaining `.html` pages to `.php` and update nav links consistently (I already updated the nav to point to `.php`).
