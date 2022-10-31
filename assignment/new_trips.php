<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assignment/styles/new_trips.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assignment/js/new_trips.js"></script>
    <title>Book trip</title>
</head>

<body>
    <?php
    require_once('./layout/header.php');
    if (!str_contains($_COOKIE['email'], '@')) { //checks if the user is logged in
        header("location: ./index.php");
    }
    ?>
    <h2 class="text-center mb-3 mt-3">Book a trip</h2>
    <div class="container-fluid">
        <form method="GET" action="add_trip.php">
            <?php require('./layout/new_trip_form.php') ?>
        </form>
    </div>
</body>

</html>