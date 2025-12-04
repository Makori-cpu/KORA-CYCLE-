<?php // sugar-skin-aging-article.php - Article demonstrating PHP page and shared include ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $page_title = 'Why Sugar Accelerates Skin Aging — Kora Cycle'; include 'includes/head.php'; ?>
    <style>
        :root { --content-width: 800px; }
        h1,h2 { font-family: 'Merriweather', serif; }
        .prose { max-width: var(--content-width); }
    </style>
</head>
<body>
    <?php include 'includes/nav.php'; ?>

    <?php
    // Try to fetch article by slug from DB; fall back to embedded static content.
    $articleContentHtml = null;
    $articleTitle = 'Why Sugar Accelerates Skin Aging: The Science of Glycation';
    try {
        if (isset($_GET['slug']) && file_exists(__DIR__ . '/includes/db.php')) {
            include_once __DIR__ . '/includes/db.php';
            $db = getPDO();
            $slug = $_GET['slug'];
            $stmt = $db->prepare('SELECT title, content FROM articles WHERE slug = ? LIMIT 1');
            $stmt->execute([$slug]);
            $row = $stmt->fetch();
            if ($row) {
                $articleTitle = $row['title'];
                $articleContentHtml = $row['content'];
            }
        }
    } catch (Exception $e) {
        // ignore and use static content
        $articleContentHtml = null;
    }
    ?>

    <main class="container mx-auto px-6 py-16">
        <article class="mx-auto prose bg-white rounded-xl shadow-lg p-10">
            <p class="text-sm text-kora-coral font-semibold uppercase">Hormones &amp; Diet</p>
            <h1 class="text-4xl font-bold mt-2 mb-4"><?php echo htmlspecialchars($articleTitle); ?></h1>

            <?php if ($articleContentHtml !== null): ?>
                <div class="text-gray-700 leading-relaxed mb-6"><?php echo $articleContentHtml; ?></div>
            <?php else: ?>
                <p class="text-gray-700 leading-relaxed mb-6">Eating sugar doesn&rsquo;t just affect your energy &mdash; it changes your skin at the molecular level. This article explains how sugar damages collagen and elastin through glycation, what that means for appearance and resilience, and practical steps to reduce harm.</p>

                <h2 class="text-2xl font-semibold mt-6 mb-3">What is Glycation?</h2>
                <p class="text-gray-700 mb-4">Glycation is a non-enzymatic chemical reaction where sugar molecules bond to proteins and lipids, forming advanced glycation end products (AGEs). In skin, AGEs stiffen collagen and elastin fibers, reducing elasticity and increasing fragility. Over time, this leads to visible signs of aging &mdash; fine lines, deeper wrinkles, and uneven texture.</p>

                <h2 class="text-2xl font-semibold mt-6 mb-3">The Evidence (Simplified)</h2>
                <ul class="list-disc list-inside text-gray-700 mb-4">
                    <li><strong>Clinical studies</strong> show higher AGE levels in skin samples correlate with decreased elasticity.</li>
                    <li><strong>Biochemistry</strong> explains how AGEs cross-link collagen fibers, making them brittle and less able to recover from mechanical stress.</li>
                    <li><strong>Inflammation</strong> increases where AGEs accumulate, which can accelerate breakdown and pigment changes.</li>
                </ul>

                <h2 class="text-2xl font-semibold mt-6 mb-3">Practical Tips to Protect Your Skin</h2>
                <ol class="list-decimal list-inside text-gray-700 mb-4">
                    <li><strong>Reduce added sugars:</strong> Cut down on sodas, sweets, and processed snacks. Focus on whole foods.</li>
                    <li><strong>Favor low-glycemic carbs:</strong> Whole grains, legumes, and fiber-rich vegetables cause smaller blood sugar spikes.</li>
                    <li><strong>Antioxidant-rich diet:</strong> Berries, leafy greens, nuts, and fatty fish help neutralize oxidative stress linked with AGEs.</li>
                    <li><strong>Topical &amp; clinical care:</strong> Use sunscreen daily and consider treatments that promote collagen remodeling (retinoids, professional therapies) when appropriate.</li>
                </ol>

                <h2 class="text-2xl font-semibold mt-6 mb-3">A Note on Hormones</h2>
                <p class="text-gray-700 mb-4">Hormonal changes (e.g., fluctuating estrogen) affect collagen production and skin repair. Combined with dietary glycation, hormonal shifts can magnify visible aging &mdash; particularly during menopause and postpartum recovery.</p>

                <h2 class="text-2xl font-semibold mt-6 mb-3">Takeaway</h2>
                <p class="text-gray-700 mb-6">Minimizing added sugar, protecting skin from UV, and supporting overall metabolic health are practical, evidence-aligned ways to keep skin resilient. Glycation is one mechanism among many &mdash; addressing it holistically gives the best results.</p>

                <p class="text-sm text-gray-600">References: Selected summaries from dermatology and nutrition research. For a deeper dive, consult peer-reviewed reviews on glycation and skin aging.</p>

                <div class="mt-6">
                    <a href="healthlibrary.php" class="inline-block px-6 py-3 bg-kora-coral text-white rounded-full font-semibold hover:bg-red-500">Back to Health Library</a>
                </div>
            <?php endif; ?>
        </article>
    </main>

    <footer class="text-center py-8 text-sm text-gray-600">&copy; 2025 Kora Cycle</footer>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
