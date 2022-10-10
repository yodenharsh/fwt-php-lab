<?php
$conn = new mysqli("localhost","root","","lab_5");
$sql = "Select firstname, lastname FROM students";
$result = $conn->query($sql);
print_r($result);
echo "<br>";
while($row = $result->fetch_assoc()){
    echo "Name: ".
    $row["firstname"]." ".$row["lastname"]
    ."<br>";
}
?>