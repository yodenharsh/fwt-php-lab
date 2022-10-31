<?php
require_once('./layout/header.php');
$cost;
if ($_GET['country'] == 'asia') {
    global $cost;
    $cost = 1400;
} else if ($_GET['country'] == 'europe') {
    global $cost;
    $cost = 11000;
} else {
    global $cost;
    $cost = 25000;
}

$totalCost = $cost * ($_GET['people']) / 1; //Converts $_GET['people'] to a number
$user_email = $_COOKIE['email'];
$year = $_GET['year'];
$people = $_GET['people'];
$package = $_GET['country'];
$conn = new mysqli("localhost", "root", "", "assignment");
$insertQuery = "INSERT INTO trip_details(user_email,year,people,cost,package) VALUES ('$user_email','$year','$people','$totalCost','$package')";
$insert = $conn->query($insertQuery);
echo "<h3>Your trip has been booked!</h3>";
