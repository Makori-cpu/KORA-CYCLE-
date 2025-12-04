<?php // index.php - converted from index.html to demonstrate PHP include usage ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kora Cycle Homepage (Simplified)</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Configure Tailwind with Kora Cycle Colors -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        // Using a standard system font as a fallback
                        sans: ['sans-serif'],
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

    <!-- Custom Gradient Background -->
    <style>
        body {
            /* Apply the soft pink gradient background */
            background: linear-gradient(180deg, var(--tw-colors-kora-pink-light) 0%, var(--tw-colors-kora-pink-deep) 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="text-kora-text">

    <?php include 'includes/nav.php'; ?>

    <!-- === HERO SECTION === -->
    <main class="py-16 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-12 gap-12 items-center">
            
            <!-- Left Side: Text Content -->
            <div class="md:col-span-6 text-center md:text-left">
                <p class="text-sm font-semibold text-kora-coral uppercase tracking-widest mb-3">
                    ⭐ Over 7 million 5-star ratings
                </p>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-kora-text mb-6 leading-tight">
                    We’re Kora Cycle, the world’s #1 women’s health tracker.
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-xl mx-auto md:mx-0">
                    Over 400 million people around the world use Kora Cycle to track their periods, ovulation, pregnancy, and menopause.
                </p>
                
                <!-- Download Buttons -->
                <div class="flex justify-center md:justify-start space-x-4">
                    <a href="#" class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-xl text-white bg-kora-text hover:bg-gray-700 transition duration-150 shadow-lg">
                        <!-- Example App Store SVG -->
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.15c.613 0 1.22.04 1.815.115l.076.01.218.04c.15.02.3.06.44.11.16.05.3.11.45.18l.19.1.18.1.18.1.15.1.12.08.1.06.07.05.05.03.04.02.03.01.01.01.01 0 .01 0h.01c.07.03.13.06.2.1.1.05.19.1.28.16l.19.11.19.12.18.12.16.11.15.1.13.09.11.08.1.07.08.05.07.05.05.03.04.03.03.01.01.01.01 0 0 0h.01c.08.05.15.1.23.16.1.07.19.14.28.22l.2.17.18.16.16.14.15.14.14.12.11.1.09.08.08.07.06.05.05.04.04.03.03.02.02.01.01 0h.01c.06.06.12.12.17.18.1.1.19.2.28.3l.2.2.18.18.16.17.15.16.13.15.12.14.1.12.08.1.06.08.04.06.03.04.02.03.01.02.01.01.01 0h.01c.07.08.14.16.2.25.1.14.18.29.26.44l.19.33.16.32.14.3.12.28.1.26.08.23.06.2.04.18.03.15.02.12.01.1.01.06h.01c.03.1.06.2.08.31.05.2.08.4.11.61.02.2.03.4.03.6v.01c0 .41-.05.81-.14 1.19-.11.45-.3.88-.56 1.27-.31.48-.73.88-1.22 1.18-.54.33-1.15.54-1.8.63-.44.06-.88.09-1.33.09h-.01c-1.33 0-2.61-.26-3.8-.78-.7-.3-1.35-.68-1.95-1.14-1.2-.92-2.2-2.1-3-3.48-.36-.62-.64-1.28-.84-1.97-.2-.68-.3-1.39-.3-2.1c0-.12 0-.24 0-.36 0-.61.05-1.2.14-1.78.1-.6.28-1.18.55-1.73.32-.65.76-1.25 1.32-1.75.58-.51 1.23-.92 1.95-1.22.78-.32 1.6-.53 2.45-.63.09-.01.18-.02.28-.02.02 0 .03 0 .05 0zm0 3.01c-1.22 0-2.43.32-3.5.95-.6.35-1.15.77-1.63 1.25-.97.97-1.6 2.16-1.9 3.48-.13.56-.2 1.14-.2 1.73 0 .09 0 .18 0 .27 0 .84.1 1.65.29 2.45.18.77.5 1.5.97 2.16.85 1.17 1.93 2.1 3.16 2.76 1.13.62 2.36 1.01 3.65 1.13.3.02.6.03.9.03.22 0 .43-.01.65-.02 1.15-.09 2.25-.39 3.25-.87.4-.2.78-.42 1.13-.67.4-.3.74-.63 1.05-1.02.58-.72.9-1.55.9-2.43 0-.17-.01-.33-.02-.5-.07-.86-.33-1.68-.78-2.45-.5-1.24-1.3-2.3-2.3-3.2-.6-.56-1.27-1.05-2.02-1.47-1.2-.67-2.52-1.02-3.87-1.02zM12 5.01c1.24 0 2.46.32 3.55.95.58.35 1.1.77 1.55 1.25.9 1 1.48 2.16 1.75 3.48.1.56.15 1.14.15 1.73 0 .09-.01.18-.01.27-.05.84-.28 1.65-.45 2.45-.16.77-.45 1.5-.9 2.16-.78 1.17-1.78 2.1-2.9 2.76-1.04.62-2.18 1.01-3.37 1.13-.28.02-.55.03-.82.03-.2.0-.4-.01-.6-.02-1.08-.09-2.1-.39-3.04-.87-.36-.2-.68-.42-.98-.67-.36-.3-.66-.63-.94-1.02-.53-.72-.82-1.55-.82-2.43 0-.17.01-.33.02-.5.06-.86.29-1.68.7-2.45.45-1.24 1.19-2.3 2.15-3.2.55-.56 1.19-1.05 1.9-1.47 1.12-.67 2.36-1.02 3.63-1.02z"/></svg>
                        App Store
                    </a>
                    <a href="#" class="inline-flex items-center px-6 py-3 border border-kora-coral text-sm font-medium rounded-xl text-kora-coral bg-white hover:bg-kora-pink-light transition duration-150 shadow-lg">
                        <!-- Example Google Play SVG -->
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12.24 10.96c0-.52-.1-.73-.2-.84l-2.73-1.58-.02-.02c-.04-.04-.09-.07-.13-.08a.3.3 0 00-.33.02l-1.6 1.68c-.1.1-.15.22-.15.35s.05.25.15.35l2.7 2.7c.07.07.17.1.27.1.1 0 .2-.03.27-.10l1.6-1.68c.1-.1.15-.22.15-.35s-.05-.25-.15-.35zM20.2 12c0-.1-.01-.19-.04-.28l-5.3-3.05c-.14-.08-.31-.13-.48-.13h-.01c-.32 0-.62.14-.82.39l-1.3 1.3c-.09.09-.14.2-.14.33s.05.24.14.33l1.3 1.3c.18.18.42.27.68.27h.01c.17 0 .34-.05.48-.13l5.3-3.05c.03-.09.04-.18.04-.28zm-8-3.92c-.3 0-.58.11-.8.30l-5.5 5.5c-.2.2-.3.47-.3.77s.1.57.3.77l5.5 5.5c.2.2.49.3.8.3s.59-.1.8-.3l5.5-5.5c.2-.2.3-.47.3-.77s-.1-.57-.3-.77l-5.5-5.5c-.2-.2-.5-.3-.8-.3z"/></svg>
                        Google Play
                    </a>
                </div>
            </div>

            <!-- Right Side: Image Mockup -->
            <div class="md:col-span-6 mt-16 md:mt-0 flex justify-center">
                <div class="relative max-w-sm w-full lg:max-w-md">
                    <div class="relative pt-[120%] rounded-[3rem] shadow-2xl shadow-kora-coral/50 overflow-hidden border-[12px] border-white">
                        <!-- App UI Image -->
                        <img 
                            src="ChatGPT Image Nov 6, 2025, 09_29_52 PM.png" 
                            alt="Mockup of Kora Cycle App UI showing health tracking data." 
                            class="absolute inset-0 w-full h-full object-cover"
                            onerror="this.onerror=null; this.src='https://placehold.co/400x600/fde6ec/ff6b6b?text=Kora+UI+Mockup'"
                        />
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- === FEATURED CARDS SECTION === -->
    <section class="py-20 lg:py-32 container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-kora-text text-center mb-12">
            Intelligence at Your Fingertips
        </h2>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <!-- Card 1: Cycle Tracking -->
            <div class="bg-white p-6 rounded-3xl shadow-card">
                <!-- Icon: Calendar/Cycle -->
                <div class="bg-kora-coral/10 text-kora-coral p-3 w-max rounded-full mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-kora-text mb-2">Cycle Tracking</h3>
                <p class="text-gray-600 text-sm">Predict your next period with precision and see your cycle phases clearly laid out.</p>
            </div>

            <!-- Card 2: Symptom Logging -->
            <div class="bg-white p-6 rounded-3xl shadow-card">
                <!-- Icon: Heart/Activity -->
                <div class="bg-kora-coral/10 text-kora-coral p-3 w-max rounded-full mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-kora-text mb-2">Symptom Logging</h3>
                <p class="text-gray-600 text-sm">Log mood, cravings, and energy to spot unique hormonal patterns and triggers.</p>
            </div>

            <!-- Card 3: Fertility Insights -->
            <div class="bg-white p-6 rounded-3xl shadow-card">
                <!-- Icon: Moon/Star (for natural cycles) -->
                <div class="bg-kora-coral/10 text-kora-coral p-3 w-max rounded-full mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674h4.925c.976 0 1.371 1.24.588 1.81l-3.976 2.888 1.519 4.674c.3.921-.755 1.688-1.54 1.176l-3.976-2.888-3.976 2.888c-.785.512-1.84-.255-1.54-1.176l1.519-4.674-3.976-2.888c-.783-.57-.387-1.81.588-1.81h4.925l1.519-4.674z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-kora-text mb-2">Fertility Insights</h3>
                <p class="text-gray-600 text-sm">Know your optimal fertile window based on BBT, cycle length, and LH tests.</p>
            </div>

            <!-- Card 4: AI Health Assistant -->
            <div class="bg-white p-6 rounded-3xl shadow-card">
                <!-- Icon: AI/Brain/Microchip -->
                <div class="bg-kora-coral/10 text-kora-coral p-3 w-max rounded-full mb-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 010 2.844m-9.336-1.782a2 2 0 01-1.782-1.782c0-.987.8-1.782 1.782-1.782s1.782.8 1.782 1.782c0 .987-.8 1.782-1.782 1.782zM12 21a9 9 0 009-9h-9m-9 9a9 9 0 01-9-9h9m-9 9l.01-.01M21 21l-.01-.01M12 3v.01"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-kora-text mb-2">AI Health Assistant</h3>
                <p class="text-gray-600 text-sm">Get personalized, data-backed answers about your body, instantly.</p>
            </div>
            
        </div>
    </section>

    <!-- === FOOTER SECTION (Re-used for consistency) === -->
    <footer class="bg-kora-pink-deep pt-16 pb-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 border-b pb-10 border-gray-300">
                <!-- Brand Info -->
                <div class="col-span-2 md:col-span-1">
                    <h4 class="text-2xl font-extrabold text-kora-coral mb-4">Kora Cycle</h4>
                    <p class="text-gray-600 text-sm">Empowering women with health insights.</p>
                </div>
                
                <!-- Company Links -->
                <div>
                    <h5 class="text-kora-text font-bold mb-4">Company</h5>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-kora-coral">About Us</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Careers</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Contact</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h5 class="text-kora-text font-bold mb-4">Legal</h5>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-kora-coral">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Cookie Policy</a></li>
                    </ul>
                </div>
                
                <!-- Support Links -->
                <div>
                    <h5 class="text-kora-text font-bold mb-4">Support</h5>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-kora-coral">Help Center</a></li>
                        <li><a href="#" class="hover:text-kora-coral">For Clinicians</a></li>
                        <li><a href="#" class="hover:text-kora-coral">Calculators</a></li>
                    </ul>
                </div>

                <!-- Social Icons -->
                <div class="col-span-2 md:col-span-1">
                    <h5 class="text-kora-text font-bold mb-4">Connect</h5>
                    <div class="flex space-x-4">
                        <!-- Facebook -->
                        <a href="#" class="text-gray-600 hover:text-kora-coral">...</a>
                        <!-- Twitter -->
                        <a href="#" class="text-gray-600 hover:text-kora-coral">...</a>
                        <!-- Instagram -->
                        <a href="#" class="text-gray-600 hover:text-kora-coral">...</a>
                    </div>
                </div>

            </div>

            <!-- Copyright -->
            <div class="mt-10 pt-4 border-t border-gray-300 text-center">
                <p class="text-sm text-gray-500">&copy; 2025 Kora Cycle. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
