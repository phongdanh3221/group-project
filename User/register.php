<?php
include "Database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 30%;
            width: 500px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["ST"]) && ($_POST["ST"])) {
        $UserName = $_POST['Username'];
        $Email = $_POST['Email'];
        $PassWord = $_POST['Password'];
        $Number = $_POST['Phone'];
        register("INSERT INTO users (Username,Email,PassWord,PhoneNumber) VALUES ('$UserName','$Email','$PassWord','$Number')");
        echo 'Registration Successfully!';
        echo "<a href='login.php'>Login Now</a>";
    }else{
    ?>

    <form action="" method="post">
        <header>Sign Up</header>
        <label for="">UserName</label>
        <input autocomplete="off" type="text" name="Username">
        <label for="">Email</label>
        <input autocomplete="off" type="email" name="Email">
        <label for="">PassWord</label>
        <input autocomplete="off" type="password" name="Password">
        <label for="">Number Phone</label>
        <input autocomplete="off" type="number" name="Phone">
        <input type="submit" value="Register" name="ST">
    </form>
    <?php } ?>
</body>

</html>