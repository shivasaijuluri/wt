<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Allotment System</title>
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
        <h2>Project Allotment System</h2>
        <form method="POST">
            <input type="text" name="eid" placeholder="Employee ID" required><br><br>
            <input type="text" name="ename" placeholder="Employee Name" required><br><br>
            <input type="text" name="skillset" placeholder="Skillset" required><br><br>
            <input type="number" name="exp" placeholder="Experience" required><br><br>
            <button type="submit" name="submit">Submit</button><br><br>
        </form>
    </div>

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

    // Insert data into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Retrieve form data
        $eid = $_POST['eid'];
        $ename = $_POST['ename'];
        $skillset = $_POST['skillset'];
        $exp = $_POST['exp'];

        // SQL query to insert data
        $sql = "INSERT INTO employees (eid, ename, skillset, exp) VALUES ('$eid', '$ename', '$skillset', $exp)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Display employees from the database
    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<div class='container'>";
        echo "<h2>Employee List</h2>";
        while($row = $result->fetch_assoc()) {
            echo "<p>Employee ID: " . $row["eid"]. " - Name: " . $row["ename"]. " - Skillset: " . $row["skillset"]. " - Experience: " . $row["exp"]. " <a href='edit.php?id=" . $row["id"] . "'>Edit</a> <a href='delete.php?id=" . $row["id"] . "'>Delete</a></p>";
        }
        echo "</div>";
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
