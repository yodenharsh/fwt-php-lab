<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 test</title>
    <style>
        h1{
            text-align: center;
            font-size: 48px;
        }
    </style>
</head>
<body>
    <h1><?php 
    echo "Test"?></h1>
    <p><?php $bool_var = false;
    print("$bool_var\n"); 
    if(10 < 20){
    $bool_var = true;
    echo "true";
    }
    if(!($bool_var)):   
    ?>
    <p>Element to not render</p>
    <?php endif; ?>
    <h2>Function test: 
        <?php
        $three_passed = false;
        function countToThree(){
            sleep(3);
            global $three_passed;
            $three_passed = true;
        }
        countToThree();
        if($three_passed):
        ?>
    This line appears after three seconds
    <?php endif;?>
</body>
</html>