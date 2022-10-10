<?php
$conn = new mysqli("localhost","root","","lab_5");
// $createTable = "CREATE TABLE AIML (
//     course_id varchar(30) PRIMARY KEY NOT NULL,
//     course_name varchar(30),
//     marks int,
//     mode varchar(10),
//     instructor varchar(20)
//     )";

// $createTable = "CREATE TABLE DSAI (
//     course_id varchar(30) PRIMARY KEY NOT NULL,
//     course_name varchar(30),
//     marks int,
//     mode varchar(10),
//     instructor varchar(20)
//     )";


$createTable = "CREATE TABLE BC (
    course_id varchar(30) PRIMARY KEY NOT NULL,
    course_name varchar(30),
    marks int,
    mode varchar(10),
    instructor varchar(20)
    )";


if($conn->query($createTable) === TRUE){
    print("Table created successfully");
}
?>