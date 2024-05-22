<?php
$stu_id = $_POST['id'];
$stu_name = $_POST['name'];
$stu_address = $_POST['address'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['phone'];

$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection error");
$sql = "UPDATE student SET sname = '$stu_name', saddress = '$stu_address', sclass = '$stu_class', sphone = '$stu_phone' WHERE sid = '$stu_id'";
mysqli_query($conn, $sql) or die("Query error");

header("Location: http://localhost/php_crud/index.php");
mysqli_close($conn);
