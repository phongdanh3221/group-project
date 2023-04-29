<?php
    session_start();

    include ("Database.php");
    if(!isset($_SESSION['User'])){
        header("Location: update.php");
    }
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
    <div class="container">
        <div class="nav">
            <div class="logo">
                <p><a href="home.php"></a>Logo</p>
            </div>

            <div class="right-link">
                <?php
      
                    if (isset($_GET['update']))
                    $index = $_GET['update'];
                    
                    $ManegeUsers = ConnectDT("SELECT * FROM users");
                    if(isset($index)){
                        foreach($ManegeUsers as $index => $result){
                            $re_Name = $result['Username'];
                            $re_Email = $result['Email'];
                            $re_PNumber = $result['PhoneNumber'];
                        }
                        
                }   
                if (isset($_POST["ST"]) && ($_POST["ST"])) {
                    $Name = $_POST['Username'];
                    $Emaill = $_POST['Email'];
                    $Phone = $_POST['Phone'];
                    ///////
                    update("UPDATE users SET Username = '$Name', Email = '$Emaill', PhoneNumber = '$Phone' WHERE Username='$Name'");
                    header("Location: Update.php");
                  }

                ?>
                <a href="logout.php"><input type="submit" value="Log Out"></a>
            </div>
        </div>
    </div>
    <?php
          foreach ($ManegeUsers as $index => $result) {
            $stt = $index + 1;
            echo "
              <tr>
                  <td>$stt</td>
                  <td>" . $result["Username"] . "</td>
                  <td>" . $result["Email"] . "</td>
                  <td>" . $result["PhoneNumber"] . "</td>
                  <td>
                  <a href='Update.php?update=".$result["Username"]."'>Update</a>
                  </td>
                  </br>
              </tr>
          ";
          }

    ?>
    <form action="" method="post">
        <header>Change Profile</header>
        <label for="">UserName</label>
        <input autocomplete="off" type="text" name="Username" value="<?php if (isset($index)) echo $re_Name ?>">
        <label for="">Email</label>
        <input autocomplete="off" type="email" name="Email" value="<?php if (isset($index)) echo $re_Email ?>">
        <label for="">PassWord</label>
        <input autocomplete="off" type="password" name="Password">
        <label for="">Number Phone</label>
        <input autocomplete="off" type="number" name="Phone" value="<?php if (isset($index)) echo $re_PNumber ?>">
        <input type="submit" value="Update" name="ST">
    </form>

</body>


</html>