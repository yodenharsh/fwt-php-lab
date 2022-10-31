<?php
$email = $_COOKIE['email'];
$conn = new mysqli("localhost", "root", "", "assignment");
$getTripsQuery = "SELECT tripID,year,people,cost,package FROM trip_details where user_email='$email'";
$getTrips = $conn->query($getTripsQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing trips</title>
</head>

<body>
    <?php require_once("./layout/header.php"); ?>
    <h3 class="mt-5 mb-3 ml-3">Existing trip details</h3>
    <?php require_once('./layout/table.php') ?>

</body>

</html>