<?php /* Shared head include: meta tags, Tailwind, fonts, and CSS link */ ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($page_title) ? $page_title : 'Kora Cycle'; ?></title>

<!-- Tailwind CSS (CDN) -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Tailwind config for project colors/typography -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Poppins', 'system-ui', 'sans-serif'],
                },
                colors: {
                    'kora-pink-light': '#fff5f8',
                    'kora-pink-deep': '#fde6ec',
                    'kora-coral': '#ff6b6b',
                    'kora-text': '#333333',
                },
                boxShadow: {
                    'card': '0 10px 30px -5px rgba(255, 107, 107, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'
                }
            }
        }
    };
</script>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<!-- Project CSS -->
<link rel="stylesheet" href="assets/css/style.css">
