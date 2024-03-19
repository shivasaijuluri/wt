<!DOCTYPE html>
<html>
<head>
    <title>Personal Information Form</title>
</head>
<body>
    <h2>Personal Information Form</h2>
    <form action="" method="get">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br>
        <input type="submit" value="Submit (GET)">
    </form>

    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br>
        <input type="submit" value="Submit (POST)">
    </form>

    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br>
        <input type="hidden" name="form_type" value="request">
        <input type="submit" value="Submit (REQUEST)">
    </form>

    <h2>Submitted Information</h2>
    <h3>Using GET method:</h3>
    <?php
    if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['age'])) {
        echo "Name: " . $_GET['name'] . "<br>";
        echo "Email: " . $_GET['email'] . "<br>";
        echo "Age: " . $_GET['age'] . "<br>";
    }
    ?>

    <h3>Using POST method:</h3>
    <?php
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['age'])) {
        echo "Name: " . $_POST['name'] . "<br>";
        echo "Email: " . $_POST['email'] . "<br>";
        echo "Age: " . $_POST['age'] . "<br>";
    }
    ?>

    <h3>Using REQUEST method:</h3>
    <?php
    if(isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['age'])) {
        echo "Name: " . $_REQUEST['name'] . "<br>";
        echo "Email: " . $_REQUEST['email'] . "<br>";
        echo "Age: " . $_REQUEST['age'] . "<br>";
    }
    ?>
</body>
</html>
