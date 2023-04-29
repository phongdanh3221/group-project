<?php
    session_start();
    ob_start();
    $content = ob_get_contents();

    ob_end_clean();
    include 'Database.php';
    // check USER để đăng nhập
    if (isset($_POST['SM']) && $_POST['SM']) {
        $User= $_POST['User'];
        $Pass = $_POST['Pass'];
        $_SESSION['User'] = $User;
        echo $_SESSION['User']; 
        $PassServer = checkuser($User,$Pass);
        if ( $Pass == $PassServer) {
            echo "Login Successfully !";
            header("Location: home.php");
        } else {
            echo "Login Fail !";
            echo "<a href='login.php'><button>Go back</button></a>";
            
        }
        
        // if(isset($_SESSION['User'])){
        //     header("Location: home.php");
        // }
    }else{
   
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
    <form action="" method="post">
        <label for="">UserName</label>
        <input type="text" name="User" autocomplete="off">
        <label for="">PassWord</label>
        <input type="password" name="Pass" autocomplete="off">
        <input type="submit" name="SM">
    </form>
    <?php
        }
    ?>
</body>

</html>