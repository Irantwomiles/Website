<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>PvPTemple</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_POST['login'])) {
            //If we click on submit, require the login.php file to run
            require 'login.php';

        } elseif(isset($_POST['logout'])) {

            if($_SESSION['status'] == 1) {
                require 'logout.php';
            }

        }

    }

?>

<body>

    <div class="jumbotron text-center">
      <h1>PvPTemple</h1>
      <p>Home of competitive PvP!</p>
    </div>

</body>
</html>
