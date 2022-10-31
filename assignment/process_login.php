<?php
require_once('./layout/header.php');
$conn = new mysqli("localhost", "root", "", "assignment");
$email = $_POST["email"];
$password = $_POST["password"];
$validationQuery = "SELECT email,password from user_details where email = '$email' and password=MD5('$password')";
$validation = $conn->query($validationQuery);
if ($validation->num_rows == 0) {
    echo "<h3>email password combination not found</h3>";
    echo '<a href="./index.php">Go back to login</a>';
} else {
    echo "<h2>Welcome " . $_POST["email"] . "</h2>";
    setcookie('email', $email);
}
