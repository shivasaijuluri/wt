<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add necessary meta tags and title -->
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>
    <?php
    // Check if user details are set in session
    if(isset($_SESSION['user_details'])) {
        $user = $_SESSION['user_details'];
        // Display user details
        echo "<p>Name: " . $user['name'] . "</p>";
        echo "<p>Mobile Number: " . $user['mobile_number'] . "</p>";
        echo "<p>ID: " . $user['id'] . "</p>";
        echo "<p>Gmail: " . $user['gmail'] . "</p>";
    }
    ?>
    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
