<?php
if(isset($_FILES['image'])){
    $fileName = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileTmpStorage = $_FILES['image']['tmp_name'];
    $fileError = $_FILES['image']['error'];

    $ext = explode('.',$fileName);
    $actExt = strtolower(end($ext));

    $allow = array('jpeg','jpg','png');

    if(!(in_array($actExt,$allow)))
        echo "Invalid file type.","<br>";

    else if (!($fileError === 0)) 
            echo "There was an error uploading your file" . "<br>";

    else if($fileSize > 5242880)
            echo "File size too high";

    else{

        $newFileName = uniqid('',true).".".$actExt;
        $destination = "/xampp/htdocs/Lab/Lab8B/".$newFileName;
        move_uploaded_file($fileTmpStorage,$destination);
    }
}
?>