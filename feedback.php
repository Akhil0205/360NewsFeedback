<?php
require 'db.php';
session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // TODO: Add database connection and form processing
//     $success = true;
//     $_SESSION['message'] = "Thank you for your feedback!";
//     header("Location: feedback.php");
//     exit();
// }

// Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $news_title = $_POST['news_title'];
    $source = $_POST['source'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    // Insert data into the database
    $sql = "INSERT INTO feedback (news_title, source, rating, feedback)
            VALUES ('$news_title', '$source', '$rating', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Thank you for your feedback!";
        header("Location: feedback.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Feedback - 360° Feedback Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/main.js" defer></script>
</head>

<body class="bg-gray-50">
    <!-- Navigation (same as index.html) -->
    <nav class="bg-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="text-xl font-bold">360° Feedback Portal</div>
                <div class="hidden md:flex space-x-6">
                    <a href="index.html" class="hover:text-blue-200">Home</a>
                    <a href="news.php" class="hover:text-blue-200">News Stories</a>
                    <a href="feedback.php" class="hover:text-blue-200">Submit Feedback</a>
                    <a href="analysis.php" class="hover:text-blue-200">Analysis</a>
                    <a href="about.html" class="hover:text-blue-200">About</a>
                </div>
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
        </div>
    </div>

    <!-- Feedback Form Section -->
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold mb-8">Submit Your Feedback</h1>

            <?php if (isset($_SESSION['message'])): ?>
                <div id="success-message"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>

            <?php
            // Get the title from URL parameter and decode it
            $prefilled_title = isset($_GET['title']) ? urldecode($_GET['title']) : '';
            ?>
            <form action="feedback.php" method="POST" class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="news_title">
                        News Story Title
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="news_title" name="news_title" type="text" value="<?php echo htmlspecialchars($prefilled_title); ?>" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="source">
                        News Source
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="source" name="source" type="text" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
                        Rating (1-5)
                    </label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="rating" name="rating" required>
                        <option value="">Select a rating</option>
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="feedback">
                        Your Feedback
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="feedback" name="feedback" rows="6" required></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Submit Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-8">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-4">About Us</h4>
                    <p class="text-gray-400">A platform for collecting comprehensive feedback on Government of India
                        news stories.</p>
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
        // Hide the success message after 5 minutes (300,000 milliseconds)
        setTimeout(function () {
            var successMessage = document.getElementById("success-message");
            if (successMessage) {
                successMessage.style.display = "none";
            }
        }, 3000); // 300000 ms = 5 minutes
    </script>
</body>

</html>