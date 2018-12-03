<?php
    include "libs/utils.php";
?>

<!DOCTYPE html>
<html>
    <head>
       <title>Hello</title>
       <link rel="stylesheet" type="text/css" href="css/style.css">
       <link rel="stylesheet" type="text/css" href="css/user.css">
       <link rel="stylesheet" type="text/css" href="css/header.css">
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

       <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
       
    </head> 
     
    <body>

        <div class="navigation">
            <ul class="left-nav">
                <li class="left-li"><a href="index.php">PvPTemple</a></li>
                <li class="left-li"><a href="#">Shop</a></li>
                <li class="left-li"><a href="support.php">Support</a></li>
            </ul>

        <ul class="right-nav">
                <?php
                    if(logged_in()) {
                ?>
                <form class="form-wrapper" action="logout.php" method="POST">
                    <button class="logout-button" type="submit" name="logout">Logout</button>
                </form>
                <li class="right-li"><a id="alert-count" href="#">(2)</a></li>
                <li id="alert" class="right-li"><i class="far fa-bell"></i></li>

                <?php
                    } else  {
                    
                ?>
                <li class="right-li"><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                
                <?php
                }
                ?>
            </ul>
        </div>


        <div class="banner">
            <label class="banner-text">pvptemple</label>
            <label class="banner-subtext">profile</label>
        </div>
        <?php
        if(!isset($_GET['id'])) {
        ?>
            <div class="wrapper">That user could not be found</div>
        <?php
        exit();
        } else {
            require 'database/database.php';

            $id = $_GET['id'];

            $query = "SELECT * FROM user WHERE id='$id'";
            $result = mysqli_query($connection, $query);
            $rows = mysqli_num_rows($result);

            if($rows < 0) {
        ?>
        
        <div class="wrapper">That user could not be found</div>

        <?php
                exit();
            }

            $info = mysqli_fetch_assoc($result);
        }
        ?>


        <div class="wrapper">
        
                <div class="user">
                    <div class="user-image">
                    <!-- <img src="https://crafatar.com/avatars/<?php echo($info['uuid']) ?>?size=128&default=MHF_Steve&overlay"> -->
                    <img class="image" src="https://crafatar.com/avatars/<?php echo($info['uuid']) ?>?size=128&default=MHF_Steve&overlay">
                    </div>

                    <div class="user-text">
                        <p><?php echo(get_name($info['uuid'])); ?></p>
                    </div>

                    <div class="user-rank">
                        <p class="rank">Developer</p>
                    </div>
                </div>      
         
   
            <div class="info">
               <div class="user-stats">
                    <label class="practice">Practice</label>
                    <label class="uhc">UHC</label>
                    <label class="skywars">Skywars</label>  
               </div>
            </div>
            
        </div>
        
    </body>
    
</html>