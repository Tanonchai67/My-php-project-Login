<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "present";
    $connect = mysqli_connect($server,$username,$password,$dbname) or die ("เชื่อมต่อฐานข้อมูลไม่ได้");
    mysqli_set_charset($connect,"UTF8");
?>

