<!DOCTYPE html>
<html>
<head>
    <title>Personal Information Form</title>
</head>
<body>
    <h2>Personal Information Form</h2>
    <form action="" method="get">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <input type="submit" value="Submit (GET)">
    </form>

    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <input type="submit" value="Submit (POST)">
    </form>

    <?php
    // Retrieving and displaying data using $_REQUEST
    if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['age'])) {
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $age = $_REQUEST['age'];

            echo "<h2>Submitted Information (Using \$_REQUEST)</h2>";
            echo "Name: $name <br>";
            echo "Email: $email <br>";
            echo "Age: $age <br>";
        }
    }
    ?>
</body>
</html>