<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwordadroi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
        <header class="grid grid-cols-2 items-start gap-2 mt-6 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="" fill="currentColor"/></svg>
            </div>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 bg-gray-800 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 bg-gray-800 ml-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
    </div>
    <div class="main">
        <header class="header-section text-center py-5">
            <h1 class="mt-20 mb-7 text-md md:text-xl lg:text-4xl font-bold">Unlock the Power of Forgot Password ROI</h1>
            <p class="max-w-lg mx-auto mt-2 mb-2">Engage users, generate leads, and measure ROI with our innovative forgot password process.</p>
            <a href="features.html" class="cta-button bg-pink-600 text-white py-3 px-8 mt-5 rounded-md inline-block text-center hover:bg-pink-700 transition-colors duration-300">Learn More</a>
        </header>

        <main class="content-section text-center py-5" id="features">
            <h2 class="text-3xl mb-5">Key Features</h2>
            <div class="features-container flex flex-wrap justify-around mt-12">
                <div class="feature-card flex-1 py-5 px-5 max-w-sm m-5 bg-gray-800 text-white rounded-md">
                    <img src="images/user-engagement.jpg" alt="Engagement" class="mb-5 w-full h-auto">
                    <h2 class="text-2xl mb-2">User Engagement</h2>
                    <p class="text-lg leading-relaxed px-5">Our forgot password process provides an efficient way to engage with users, keeping them connected with your brand.</p>
                </div>
                <div class="feature-card flex-1 py-5 px-5 max-w-sm m-5 bg-gray-800 text-white rounded-md">
                    <img src="images/sales-lead.jpg" alt="Leads" class="mb-5 w-full h-auto">
                    <h2 class="text-2xl mb-2">Lead Generation</h2>
                    <p class="text-lg leading-relaxed px-5">Generate high-quality leads by presenting targeted advertisements to users during the password reset process.</p>
                </div>
                <div class="feature-card flex-1 py-5 px-5 max-w-sm m-5 bg-gray-800 text-white rounded-md">
                    <img src="images/measure-ROI.jpg" alt="ROI" class="mb-5 w-full h-auto">
                    <h2 class="text-2xl mb-2">Measure ROI</h2>
                    <p class="text-lg leading-relaxed px-5">Track and measure the return on investment (ROI) of your advertising campaigns with our built-in analytics.</p>
                </div>
            </div>
        </main>
        <footer class="footer-section text-center py-5">
            <p>&copy; 2024 Forgot Password ROI. All rights reserved.</p>
        </footer>
    </div>

    <script src="js/navigation.js"></script>
</body>
</html>
