<?php


$server = "localhost";
$username = "root";
$password = "mysql";
$database = "duanmaufall2023";


global $connect;

$connect = mysqli_connect($server, $username, $password, $database);


if (!$connect) {
        echo "Kết nối thất bại cơ sở dữ liệu";
        die(); //Hàm die() là hàm ngắt chương trình
}