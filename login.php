
<?php
session_start();

// If the student submits the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["student_name"]);

    if (!empty($name)) {
        // Store the name in a session
        $_SESSION["student_name"] = $name;

        // Remember the name for 7 days using a cookie
        setcookie(
            "student_name",
            $name,
            time() + (7 * 24 * 60 * 60),
            "/"
        );

        // Go to the dashboard
        header("Location: home.php");
        exit();
    }
}

// Get the saved name from the cookie, if available
$savedName = $_COOKIE["student_name"] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
</head>
<body>
    <h2>Student Login</h2>

    <form method="POST" action="">
        <label>Enter your name:</label>

        <input
            type="text"
            name="student_name"
            value="<?php echo htmlspecialchars($savedName, ENT_QUOTES, 'UTF-8'); ?>"
            required
        >

        <button type="submit">Login</button>
    </form>

    <?php if ($savedName != ""): ?>
        <p>Welcome back, <?php echo htmlspecialchars($savedName, ENT_QUOTES, 'UTF-8'); ?>!</p>
    <?php endif; ?>
</body>
</html>
