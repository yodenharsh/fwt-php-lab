<?php
    $conn = new mysqli("localhost","root","","lab_5");
    
    function showRecords($tableName){

        global $conn;

        echo "Showing records from $tableName<br>";
        $sql = "SELECT course_id, course_name, marks, mode, instructor FROM $tableName";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            echo "Course ID - ".
            $row["course_id"]." ".$row["course_name"]
            ."   marks: ".$row["marks"]
            ."   mode: ".$row["mode"]
            ."   instructor: ".$row["instructor"]
            ."<br>";
        }

        echo "<br><br><br>";
    }

    showRecords("AIML");
    showRecords("DSAI");
    showRecords("BC");
?>