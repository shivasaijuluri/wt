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
    
    // Fetch employee details based on ID
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $eid = $row['eid'];
        $ename = $row['ename'];
        $skillset = $row['skillset'];
        $exp = $row['exp'];
    } else {
        echo "Employee not found.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Retrieve form data
    $eid = $_POST['eid'];
    $ename = $_POST['ename'];
    $skillset = $_POST['skillset'];
    $exp = $_POST['exp'];

    // SQL query to update data
    $sql = "UPDATE employees SET eid='$eid', ename='$ename', skillset='$skillset', exp=$exp WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        echo "Record updated successfully";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-top: 0;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"],
        button {
            display: block;
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .employee {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }

        .employee a {
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }

        .employee a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Employee</h2>
        <form method="POST" action="edit.php?id=<?php echo $id; ?>">
            <input type="text" name="eid" value="<?php echo $eid; ?>" placeholder="Employee ID" required><br><br>
            <input type="text" name="ename" value="<?php echo $ename; ?>" placeholder="Employee Name" required><br><br>
            <input type="text" name="skillset" value="<?php echo $skillset; ?>" placeholder="Skillset" required><br><br>
            <input type="number" name="exp" value="<?php echo $exp; ?>" placeholder="Experience" required><br><br>
            <button type="submit" name="update">Update</button><br><br>
        </form>
    </div>
</body>
</html>
