<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>360° Feedback - Government News Stories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById("mobile-menu-button");
            const menu = document.getElementById("mobile-menu");
            btn.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });
        });
    </script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo / Title -->
                <div class="text-xl font-bold">360° Feedback Portal</div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="index.php" class="hover:text-blue-200">Home</a>
                    <a href="news.php" class="hover:text-blue-200">News Stories</a>
                    <a href="feedback.php" class="hover:text-blue-200">Submit Feedback</a>
                    <a href="analysis.php" class="hover:text-blue-200">Analysis</a>
                    <a href="about.html" class="hover:text-blue-200">About</a>
                </div>

                <!-- Logout Button -->
                <div class="hidden md:flex items-center space-x-4">
                    <form action="log-out.php" method="POST">
                        <button type="submit" class="bg-red-500 text-white font-semibold px-4 py-2 rounded hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </div>

                <!-- Mobile menu button -->
                <button class="md:hidden" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-blue-500 text-white" id="mobile-menu">
        <div class="container mx-auto px-6 py-4 space-y-3">
            <a href="index.php" class="block hover:text-blue-200">Home</a>
            <a href="news.php" class="block hover:text-blue-200">News Stories</a>
            <a href="feedback.php" class="block hover:text-blue-200">Submit Feedback</a>
            <a href="analysis.php" class="block hover:text-blue-200">Analysis</a>
            <a href="about.html" class="block hover:text-blue-200">About</a>
            <form action="logout.php" method="POST">
                <button type="submit" class="w-full text-left mt-3 bg-red-600 px-4 py-2 rounded hover:bg-red-700">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="bg-blue-700 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-bold mb-4">360-Degree Feedback on Government News Stories</h1>
                <p class="text-xl mb-8">Share your perspective on news stories about the Government of India from regional media sources.</p>
                <a href="feedback.php" class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300">Submit Feedback</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto px-6 py-16">
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Submit Feedback</h3>
                <p class="text-gray-600">Share your perspective on government news stories from regional media sources.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">View Analysis</h3>
                <p class="text-gray-600">Explore data-driven insights from collected feedback and trends.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Stay Informed</h3>
                <p class="text-gray-600">Access the latest government news stories from various regional sources.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-4">About Us</h4>
                    <p class="text-gray-400">A platform for collecting comprehensive feedback on Government of India news stories.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="news.php" class="hover:text-white">Latest News</a></li>
                        <li><a href="feedback.php" class="hover:text-white">Submit Feedback</a></li>
                        <li><a href="analysis.php" class="hover:text-white">View Analysis</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact</h4>
                    <p class="text-gray-400">Email: contact@360feedback.com</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 360° Feedback Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
