<p>
    <?php
        print("Comparing '244' to 244 using === and ==, respectively: ");
        $a;
        if(!(244 === '244')){
        global $a;
        $a = 0;
        }
        echo $a, " and ", 244=='244';
        echo "<br>";
        $strA = "I am str A ";
        $strB = "I am str B ";
        echo "Concatenation of strA and strB: ",$strA.$strB;
        echo "<br>";
        echo "Printing absolute value of -23: ", abs(-23);
        echo "<br>";
        echo "Binary equivalent of 23: ", decbin(23);
    ?>
</p>