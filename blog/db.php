<?php

declare(strict_types=1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn === false) {
    die("Connection Failed: " . mysqli_connect_error());
}