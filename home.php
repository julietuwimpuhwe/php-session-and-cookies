
<?php
session_start();

$sessionName = $_SESSION["student_name"] ?? "";
$cookieName = $_COOKIE["student_name"] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>
    <h2 style="margin :center";>Student Dashboard</h2>

    <?php if ($sessionName != ""): ?>
<fieldset>
        <h3>
            <i>student login</i>,
        </h3>
    
        <p>student name: <?php
            echo htmlspecialchars($sessionName, ENT_QUOTES, 'UTF-8');
            ?>!</p>

        <p style="color :green";>welcame, you are successfully logged in
             <?php
            echo htmlspecialchars($sessionName, ENT_QUOTES, 'UTF-8');
            ?>!
        </p>
        
    <br><br>
    <a href="logout.php">Logout</a>
    </fieldset>

    <?php elseif ($cookieName != ""): ?>

        <h3>
            Welcome back, <?php
            echo htmlspecialchars($cookieName, ENT_QUOTES, 'UTF-8');
            ?>!
        </h3>

        <p>Your cookie remembers your name.</p>
        <p>Please log in again to start a new session.</p>

        <a href="login.php">Go to Login</a>

    <?php else: ?>

        <p>You are not logged in.</p>
        <a href="login.php">Login here</a>

    <?php endif; ?>

</body>
</html>
