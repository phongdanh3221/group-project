<?php
    session_start();

    include ("Database.php");
    if(!isset($_SESSION['User'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <div class="logo">
                <p>Logo</p>
            </div>

            <div class="right-link">
                <a href="logout.php"><input type="submit" value="Log Out"></a>

                <?php
                    $id =  $_SESSION['User'];
                    $products = ConnectDT("SELECT * FROM users");               
                   foreach($products as $UserBD){
                        $re_Name = $UserBD['Username'];
                        $re_Email = $UserBD['Email'];
                        $re_PNumber = $UserBD['PhoneNumber'];
                    }
                    echo "<a href='Update.php?update=' . $re_Name . '>Change Profile </a>";

                ?>
            </div>
        </div>
        <div class="mainbox">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $re_Name ?></b>, Wellcome</p>
                </div>
                <div class="box">
                    <p>Your Email <b><?php echo $re_Email ?></b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And your phone number <b><?php echo $re_PNumber ?></b></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>