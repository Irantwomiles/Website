<?php
session_start();
require 'database/support-database.php';

if(!isset($_POST['deny-submit'])) {
     header("Location: support.php");
    exit();
}

//Check if user has permission

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: support.php");
    exit();
}

$resolved = 0;
$resolved_uuid = $_SESSION['uuid'];
$tid = $_GET['id'];

$query = "UPDATE ticket SET resolved='$resolved',resolved_uuid='$resolved_uuid' WHERE id='$tid'";

echo($tid);

if($connection->query($query) === TRUE) {
    header("Location: support-view.php?id=" . $tid);
    $connection->close();
    exit();
} else {
    echo("FALSE");
}

$connection->close();

//header("Location: support-list.php");
