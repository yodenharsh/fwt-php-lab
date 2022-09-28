<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database connection testing</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lab_5";
        
        $conn = new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error){
            die("Connection failed: " .$conn->connect_error);
        }
        echo "Connected successfully";

        echo "<br>Inserting into database <br>";
        $query = "INSERT INTO students(firstname,lastname,email)
        VALUES('Harsh','Morayya','harsh.morayya_2025@s')";
        if($conn -> query($query) === TRUE){
            echo "Record successfully inserted";
        }
        else {
            echo "Error: " . $sql ."<br>". $conn->error;
        }

        $sql = "INSERT INTO students (firstname,lastname,email)
        VALUES('Shreya','M','Shreya@woxsen.edu.in');";
        $sql.= "INSERT INTO students (firstname, lastname, email)
        VALUES('Pranati','S','Pranati@woxsen.edu.in');";
        if($conn->multi_query($sql) === TRUE){
            echo "<br>New record(s) created successfully";
        }
    ?>
</body>
</html>