<?php

$stu_name = $_POST['name'];
$stu_address = $_POST['address'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['phone'];

$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection error");
$sql = "INSERT INTO student(sname,saddress,sclass,sphone) VALUES('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}')";
mysqli_query($conn, $sql) or die("Query error");

header("Location: http://localhost/php_crud/index.php");
mysqli_close($conn);
