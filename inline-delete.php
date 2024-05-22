<?php

$stu_id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "crud") or die("connection unsuccessful");
$sql = "DELETE FROM student WHERE sid = '$stu_id'";
$resust = mysqli_query($conn, $sql) or die("Error in your Query");
header("Location: http://localhost/php_crud/index.php");
mysqli_close($conn);
