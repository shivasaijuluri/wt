<?php
session_start();
$servername = "localhost";
$username = "my_database"; 
$password = "my_database";
$dbname = "implement_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile_number = $_POST["mobile_number"];
    $user_id = $_POST["id"];
    $gmail = $_POST["gmail"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, mobile_number, user_id, gmail, password)
            VALUES ('$name', '$mobile_number', '$user_id', '$gmail', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        header("Location: login.html"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
