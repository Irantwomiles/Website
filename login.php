<?php
session_start();
require 'database/database.php';

if(isset($_POST['login']) == FALSE) {
    header("Location: index.php");
    exit();
}

$email = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$_SESSION['status'] = 0;

//Requested Method is not POST
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit();
}

//Inputs are empty
if(empty($email) || empty($password)) {
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($connection, $query);
$rows = mysqli_num_rows($result);

if($rows < 0) {
    //Add message "User not found"
    //header("Location: index.php/login=error");
    exit();
}

$info = mysqli_fetch_assoc($result);
if($password == $info['password']) {
    $_SESSION['status'] = 1;
    $_SESSION['uuid'] = $info['uuid'];


    $_SESSION['name'] = get_name($_SESSION['uuid']);
    header("Location: index.php");
} else {
    exit();
}

function get_name($uuid) {

    $uuid = str_replace("-", "", $_SESSION['uuid']);

    $json_response = file_get_contents('https://api.minetools.eu/uuid/' . $uuid);

    $obj = json_decode($json_response);

    return $obj->name;
}

