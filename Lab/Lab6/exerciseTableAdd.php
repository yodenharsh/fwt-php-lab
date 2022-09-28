<?php
    $conn = new mysqli("localhost","root","","lab_5");
    IamLazy('AIML');
    IamLazy('DSAI');
    IamLazy('BC');
    function IamLazy($tableName){
    
        global $conn;
    
        for($i = 1;$i<=10;$i++){
            $course_id = strval($i);
            $instructor = "some ".strval($i);
            $rand_marks = strval(rand(0,100));
            $query = "INSERT INTO $tableName VALUES('$course_id','AIML',$rand_marks,'online','$instructor')";
            if($conn->query($query) === TRUE){
                echo "1 Record(s) added to $tableName<br>";
            }
        }
        echo "<br>";
    }
?>
