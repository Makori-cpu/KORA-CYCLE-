<?php // healthlibrary.php - Health Library (loads articles from DB if available) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_title = 'Health Library — Kora Cycle'; include 'includes/head.php'; ?>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>

    <?php
    // Try to load articles from DB; fall back to static content if DB not configured
    $articles = [];
    try {
        if (file_exists(__DIR__ . '/includes/db.php')) {
            include_once __DIR__ . '/includes/db.php';
            $db = getPDO();
            $stmt = $db->query('SELECT id, title, excerpt, slug, published_at FROM articles ORDER BY published_at DESC LIMIT 12');
            $articles = $stmt->fetchAll();
        }
    } catch (Exception $e) {
        // ignore DB errors and fall back to static content
        $articles = [];
    }
    ?>

    <!-- === HEADER & SEARCH SECTION === -->
    <section class="py-16 bg-white border-b border-kora-pink-deep">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-4xl fade-in-up">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-kora-coral mb-4">The Kora Health Library</h1>
            <p class="text-xl text-gray-600 mb-8">Science-backed articles, tailored insights, and wellness tips for every stage of life.</p>
            <div class="max-w-xl mx-auto flex">
                <input type="search" placeholder="Search articles, symptoms, or phases..." class="w-full px-5 py-3 border border-gray-300 rounded-l-full focus:ring-kora-coral focus:border-kora-coral shadow-sm text-gray-700" />
                <button class="bg-kora-coral text-white px-6 py-3 rounded-r-full hover:bg-red-500 transition duration-300 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- === ARTICLES GRID === -->
    <section class="py-20 container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-kora-text mb-8 fade-in-up">Latest Articles</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $a): ?>
                    <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 fade-in-up">
                        <div class="p-6">
                            <p class="text-sm font-semibold text-kora-coral uppercase mb-1">Article</p>
                            <h3 class="text-xl font-bold text-kora-text mb-3"><?php echo htmlspecialchars($a['title']); ?></h3>
                            <p class="text-gray-600 text-sm mb-4"><?php echo htmlspecialchars($a['excerpt']); ?></p>
                            <a href="sugar-skin-aging-article.php?slug=<?php echo urlencode($a['slug']); ?>" class="text-kora-coral text-sm font-semibold hover:underline">Read Article &rarr;</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback static cards when DB not available -->
                <div class="md:col-span-1 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 fade-in-up">
                    <div class="p-6">
                        <p class="text-sm font-semibold text-kora-coral uppercase mb-1">Hormones</p>
                        <h3 class="text-xl font-bold text-kora-text mb-3">The Four Seasons of Your Cycle: Hormones Explained</h3>
                        <p class="text-gray-600 text-sm mb-4">A detailed breakdown of the follicular, ovulation, luteal, and menstrual phases and how they affect your mood.</p>
                        <a href="#" class="text-kora-coral text-sm font-semibold hover:underline">Read Article &rarr;</a>
                    </div>
                </div>

                <div class="md:col-span-1 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition duration-300 fade-in-up" style="transition-delay: 100ms;">
                    <img src="https://placehold.co/400x250/ff6b6b/ffffff?text=Menopause+Tips" alt="A woman meditating" class="w-full h-40 object-cover"/>
                    <div class="p-6">
                        <p class="text-sm font-semibold text-kora-coral uppercase mb-1">Menopause</p>
                        <h3 class="text-xl font-bold text-kora-text mb-3">Managing Hot Flashes: Natural Remedies & Diet Changes</h3>
                        <p class="text-gray-600 text-sm mb-4">Practical, non-hormonal strategies to reduce the frequency and severity of menopausal symptoms.</p>
                        <a href="#" class="text-kora-coral text-sm font-semibold hover:underline">Read Article &rarr;</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-12 fade-in-up">
            <button class="px-8 py-3 bg-kora-text text-white font-bold text-base rounded-full shadow-lg hover:bg-gray-700 transition duration-300">Load More Articles</button>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
