<?php
include 'db.php';

$registered = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $conn->real_escape_string($_POST['name']);
    $email    = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']); // No hashing

    // Check if email already exists
    $check_sql = "SELECT id FROM user1 WHERE email = '$email'";
    $result = $conn->query($check_sql);
    
    if ($result && $result->num_rows > 0) {
        $error = "Email already registered. Please use a different email.";
    } else {
        $sql = "INSERT INTO user1 (full_name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            $registered = true;
        } else {
            $error = "Registration failed: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 flex items-center justify-center min-h-screen px-4">

    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Register</h2>

        <?php if ($registered): ?>
            <script>
                alert("Registered successfully! Redirecting to login page...");
                window.location.href = "login.php"; // redirect to login
            </script>
        <?php elseif (!empty($error)): ?>
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded"><?= $error ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
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
                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">Register</button>
        </form>

        <p class="text-sm text-center mt-4">Already have an account? 
            <a href="login.php" class="text-blue-600 font-medium hover:underline">Login here</a>
        </p>
    </div>

</body>
</html>
