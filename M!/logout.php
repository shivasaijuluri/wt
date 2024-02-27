<?php
session_start(); 
session_destroy(); 
header("Location: index.html"); // Redirect to login page
exit; // Ensure script stops executing after redirect
?>
