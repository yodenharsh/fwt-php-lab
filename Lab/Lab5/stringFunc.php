<p>
    <?php 
        $str = "base string";
        print($str);
        echo "<br>";
        echo "Uppercase string: ",strtoupper($str);
        echo "<br>";
        echo "Length of string: ",strlen($str);
        echo "<br>";
        echo "Shuffled string: ", str_shuffle($str);
        echo "<br>";
        echo "Reversed string: ", strrev($str);
    ?>
</p>