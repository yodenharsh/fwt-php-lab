<p>
<?php
$fruits = array (
    "fruits"  => array("orange","apple","bananas"),
    "numbers" => array(1, 2, 3, 4, 5, 6),
    "holes"   => array("first", 5 => "second", 2 => "third")
);
echo "Outputting chunks of main array => \n";
echo "<br>"; 
print_r(array_chunk($fruits,3));
echo "<br>";
echo "keys of main array in upper case : ";
print_r(array_keys(array_change_key_case($fruits,CASE_UPPER)));
echo "<br>";
echo "Length of array: ",sizeof($fruits);
?>
</p>