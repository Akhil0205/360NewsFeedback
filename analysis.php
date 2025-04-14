<?php
// TODO: Add database connection to fetch actual analytics data
$feedback_stats = [
    'total_feedback' => 150,
    'average_rating' => 4.2,
    'total_stories' => 45
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis - 360° Feedback Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/main.js" defer></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="index.php" class="text-xl font-bold hover:text-blue-200">360° Feedback Portal</a>
                <div class="hidden md:flex space-x-6">
                    <a href="index.php" class="hover:text-blue-200">Home</a>
                    <a href="news.php" class="hover:text-blue-200">News Stories</a>
                    <a href="feedback.php" class="hover:text-blue-200">Submit Feedback</a>
                    <a href="analysis.php" class="hover:text-blue-200 border-b-2 border-white">Analysis</a>
                    <a href="about.html" class="hover:text-blue-200">About</a>
                </div>
                <button class="md:hidden" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
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
        </div>
    </div>

    <!-- Analysis Section -->
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-8">Feedback Analysis</h1>

        <!-- Stats Overview -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Total Feedback</h3>
                <p class="text-3xl font-bold text-blue-600"><?php echo $feedback_stats['total_feedback']; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">Average Rating</h3>
                <p class="text-3xl font-bold text-blue-600"><?php echo $feedback_stats['average_rating']; ?>/5.0</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-600 mb-2">News Stories</h3>
                <p class="text-3xl font-bold text-blue-600"><?php echo $feedback_stats['total_stories']; ?></p>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-4">Feedback Distribution</h3>
                <canvas id="feedbackChart"></canvas>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-4">Regional Distribution</h3>
                <canvas id="regionChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-8">
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

    <script>
        // Sample data for charts
        const feedbackCtx = document.getElementById('feedbackChart').getContext('2d');
        new Chart(feedbackCtx, {
            type: 'bar',
            data: {
                labels: ['5 Stars', '4 Stars', '3 Stars', '2 Stars', '1 Star'],
                datasets: [{
                    label: 'Feedback Distribution',
                    data: [45, 65, 25, 10, 5],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(59, 130, 246, 0.6)',
                        'rgba(59, 130, 246, 0.4)',
                        'rgba(59, 130, 246, 0.3)',
                        'rgba(59, 130, 246, 0.2)'
                    ]
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const regionCtx = document.getElementById('regionChart').getContext('2d');
        new Chart(regionCtx, {
            type: 'pie',
            data: {
                labels: ['North', 'South', 'East', 'West', 'Central'],
                datasets: [{
                    data: [30, 25, 15, 20, 10],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(59, 130, 246, 0.6)',
                        'rgba(59, 130, 246, 0.4)',
                        'rgba(59, 130, 246, 0.3)',
                        'rgba(59, 130, 246, 0.2)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>
