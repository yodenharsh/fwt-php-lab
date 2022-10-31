<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assignment/styles/index.css">
    <title>Signup
    </title>

</head>

<body>

    <?php
    require_once('./layout/header.php');
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $conn = new mysqli("localhost", "root", "", "assignment");
        $checkIfExistsQuery = "SELECT email from user_details where email = '$email'";
        $checkIfExists = $conn->query($checkIfExistsQuery);
        if ($_POST["email"] == '' || $_POST["password"] == '') {
            echo "<h2>Please input an email address and password and provide a png file</h2>";
        } else if (!isset($_FILES['image'])) {
            echo "<h2>Image not given</h2>";
        } else if ($checkIfExists->num_rows == 1) {
            echo "<h2>Email address already exists</h2>";
        } else {

            $addUserQuery = "INSERT INTO user_details VALUES('$email','$password')";
            $conn->query($addUserQuery);
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp, "uploads/" . $email . ".png");
            echo "<h2>Account created and automatically logged in</h2>";
        }
    }
    ?>
</body>