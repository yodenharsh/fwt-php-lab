<p>
<?php $a = "global";
function scopeExample(){
    $a = "scoped";
    print("Using $a a");
    global $a;
    echo "<br>";
    print("Using $a a after using 'global' keyword");
};
scopeExample(); ?>
</p>