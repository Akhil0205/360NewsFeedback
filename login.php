<?php
session_start();
include 'db.php';

$error = "";
$showWelcome = false;
$userName = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user1 WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Direct comparison (assuming password is not hashed)
        if ($password === $user['password']) {
            $_SESSION['user_name'] = $user['full_name'];
            $userName = $user['full_name'];
            $showWelcome = true;

            // Redirect to dashboard.php after 3 seconds
            header("Refresh: 3; URL=dashboard.php");
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen px-4">

<?php if ($showWelcome): ?>
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
        <h2 class="text-2xl font-bold text-green-600 mb-4">Welcome, <?= htmlspecialchars($userName) ?>!</h2>
        <p class="text-gray-600 mb-4">Redirecting you to your dashboard...</p>
        <div class="loader border-4 border-blue-200 border-t-blue-600 rounded-full w-10 h-10 mx-auto animate-spin"></div>
    </div>
<?php else: ?>
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Login</h2>

        <?php if (!empty($error)): ?>
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded"><?= $error ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <button type="submit"
                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">Login</button>
        </form>

        <p class="text-sm text-center mt-4">Don't have an account?
            <a href="register.php" class="text-blue-600 font-medium hover:underline">Register here</a>
        </p>
    </div>
<?php endif; ?>

</body>
</html>
