<?php
// Database configuration
$servername = "localhost";
$username = "my_database"; // default username for XAMPP
$password = "my_database"; // default password for XAMPP
$dbname = "project_allotment"; // name of the database you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete employee record based on ID
    $sql = "DELETE FROM employees WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php after successful deletion
        header("Location: index.php");
        exit(); // Ensure that no other code is executed after the redirection
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
