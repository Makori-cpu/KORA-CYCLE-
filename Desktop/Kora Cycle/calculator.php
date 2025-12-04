<?php // calculator.php - converted from calculator.html and uses shared nav include ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kora Cycle Calculator</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Configure Tailwind to use Poppins font and custom colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'kora-pink-light': '#fff5f8', // Light background start color
                        'kora-pink-deep': '#fde6ec',  // Light background end color
                        'kora-coral': '#ff6b6b',      // Primary CTA pink/coral
                        'kora-text': '#333333',       // Dark text
                    },
                    boxShadow: {
                        'card': '0 10px 30px -5px rgba(255, 107, 107, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
                    }
                },
            },
        };
    </script>

    <!-- Custom Gradient and Animation Styles -->
    <style>
        body {
            background: linear-gradient(180deg, var(--tw-colors-kora-pink-light) 0%, var(--tw-colors-kora-pink-deep) 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .fade-in-up { opacity: 0; transform: translateY(20px); transition: opacity 0.8s ease-out, transform 0.8s ease-out; }
        .fade-in-up.is-visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="text-kora-text">
    <?php include 'includes/nav.php'; ?>

    <!-- === CALCULATOR HEADER SECTION === -->
    <section class="py-16 bg-white border-b border-kora-pink-deep fade-in-up">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-4xl">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-kora-coral mb-4">
                Ovulation Calculator
            </h1>
            <p class="text-xl text-gray-600">
                Determine your most fertile days by calculating your next ovulation window.
            </p>
        </div>
    </section>

    <!-- === CALCULATOR CARD SECTION === -->
    <main class="py-16 lg:py-24 container mx-auto px-4 sm:px-6 lg:px-8 flex justify-center">
        <div class="w-full max-w-lg bg-white p-8 sm:p-10 rounded-3xl shadow-2xl shadow-kora-coral/20 fade-in-up">
            
            <h2 class="text-2xl font-bold text-kora-text mb-6 border-b pb-3">Your Cycle Details</h2>
            
            <!-- Input Form -->
            <form id="calculator-form" class="space-y-6">
                <div>
                    <label for="lmp-date" class="block text-sm font-medium text-gray-700 mb-2">First Day of Last Period (LMP)</label>
                    <input type="date" id="lmp-date" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-kora-coral focus:border-kora-coral shadow-sm text-lg" />
                </div>
                <div>
                    <label for="cycle-length" class="block text-sm font-medium text-gray-700 mb-2">Average Cycle Length (days)</label>
                    <input type="number" id="cycle-length" required min="21" max="45" placeholder="e.g., 28" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-kora-coral focus:border-kora-coral shadow-sm text-lg" />
                    <p class="mt-1 text-xs text-gray-500">Must be between 21 and 45 days.</p>
                </div>
                <button type="submit" class="w-full mt-4 px-6 py-3 bg-kora-coral text-white font-bold text-lg rounded-xl shadow-lg hover:bg-red-500 transition duration-300">Calculate Fertile Window</button>
            </form>
            
            <div id="results-area" class="mt-10 pt-6 border-t border-kora-pink-deep hidden">
                <h2 class="text-2xl font-bold text-kora-text mb-4">Your Personalized Results</h2>
                <div class="bg-kora-pink-light p-4 rounded-xl mb-4">
                    <p class="text-lg font-semibold text-gray-700">Estimated Ovulation Date:</p>
                    <p id="ovulation-date-display" class="text-3xl font-extrabold text-kora-coral"></p>
                </div>
                <div class="bg-kora-pink-light p-4 rounded-xl">
                    <p class="text-lg font-semibold text-gray-700">Your Fertile Window:</p>
                    <p id="fertile-window-display" class="text-2xl font-bold text-kora-text"></p>
                </div>
                <div id="error-message" class="hidden mt-4 p-4 bg-red-100 text-red-700 rounded-lg text-sm font-medium" role="alert"></div>
            </div>
        </div>
    </main>

    <!-- footer & scripts (kept minimal) -->
    <footer class="bg-kora-pink-deep pt-16 pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-10 pt-4 border-t border-gray-300 text-center">
                <p class="text-sm text-gray-500">&copy; 2025 Kora Cycle. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('calculator-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const lmpDateStr = document.getElementById('lmp-date').value;
            const cycleLength = parseInt(document.getElementById('cycle-length').value, 10);
            const resultsArea = document.getElementById('results-area');
            const ovulationDisplay = document.getElementById('ovulation-date-display');
            const fertileWindowDisplay = document.getElementById('fertile-window-display');
            const errorBox = document.getElementById('error-message');
            errorBox.classList.add('hidden'); resultsArea.classList.add('hidden');
            if (!lmpDateStr || isNaN(cycleLength) || cycleLength < 21 || cycleLength > 45) { errorBox.textContent = "Please ensure a valid Last Period date is selected and cycle length is between 21 and 45 days."; errorBox.classList.remove('hidden'); return; }
            const lmp = new Date(lmpDateStr); lmp.setMinutes(lmp.getMinutes() + lmp.getTimezoneOffset());
            const daysToOvulation = cycleLength - 14;
            const ovulationDate = new Date(lmp); ovulationDate.setDate(lmp.getDate() + daysToOvulation);
            const fertileStart = new Date(ovulationDate); fertileStart.setDate(ovulationDate.getDate() - 5);
            const options = { month: 'short', day: 'numeric', year: 'numeric' };
            ovulationDisplay.textContent = ovulationDate.toLocaleDateString('en-US', options);
            fertileWindowDisplay.textContent = `${fertileStart.toLocaleDateString('en-US', options)} - ${ovulationDate.toLocaleDateString('en-US', options)}`;
            resultsArea.classList.remove('hidden');
        });

        const observer = new IntersectionObserver((entries, observer) => { entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('is-visible'); observer.unobserve(entry.target); } }); }, { rootMargin: '0px 0px -100px 0px', threshold: 0.1 });
        document.querySelectorAll('.fade-in-up').forEach(element => observer.observe(element));
    </script>

</body>
</html>
