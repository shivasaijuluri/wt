<?php
// Database connection parameters
$servername = "localhost";
$username = "my_database";
$password = "my_database";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $speciality = mysqli_real_escape_string($conn, $_POST['speciality']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['num']);
    $problem = mysqli_real_escape_string($conn, $_POST['problem']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO appointment_details (first_name, last_name, appointment_date, gender, age, speciality, phone_number, problem) 
            VALUES ('$name', '$last_name', '$appointment_date', '$gender', '$age', '$speciality', '$phone_number', '$problem')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>