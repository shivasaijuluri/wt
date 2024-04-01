<!doctype html>    
<html>    
<head>    
<title>Register</title>    
    <style>     
        body{    
    margin-top: 110px;    
    margin-bottom: 110px;    
    margin-right: 160px;    
    margin-left: 90px;    
    background-color: lightcyan;    
    color: palevioletred;    
    font-family: verdana;    
    font-size: 100%    
        
        }    
            h1 {    
    color: darkred;    
    font-family: indigo;    
    font-size: 100%;    
}    
         h2 {    
    color: darkred;    
    font-family: indigo;    
    font-size: 100%;    
}</style>    
</head>    
<body>    
       
    <center><h1> REGISTRATION </h1></center>    
   <p><a href="register.php">Register</a> | <a href="index.html">Login</a></p>    
    <center><h2>Registration Form</h2></center>    
<form action="" method="POST">    
    <legend>    
    <fieldset>    
            
Username: <input type="text" name="user"><br />    
Password: <input type="password" name="pass"><br />     
<input type="submit" value="Register" name="submit" />    
                
        </fieldset>    
        </legend>    
</form>    
<?php    
if(isset($_POST["submit"])){    
if(!empty($_POST['user']) && !empty($_POST['pass'])) {    
    $user=$_POST['user'];    
    $pass=$_POST['pass'];    
    $con=mysqli_connect('localhost','root','') or die(mysql_error());    
    mysqli_select_db($con,'login') or die("cannot select DB");    
    
    $query=mysqli_query($con,"SELECT * FROM signin WHERE username='".$user."'");    
    $numrows=mysqli_num_rows($query);    
    if($numrows==0)    
    {    
    $sql="INSERT INTO signin(username,password) VALUES('$user','$pass')";    
    
    $result=mysqli_query($con,$sql);    
        if($result){    
    echo "Account Successfully Created";    
    } else {    
    echo "Failure!";    
    }    
    
    } else {    
    echo "That username already exists! Please try again with another.";    
    }    
    
} else {    
    echo "All fields are required!";    
}    
}    
?>    
</body>    
</html>  
