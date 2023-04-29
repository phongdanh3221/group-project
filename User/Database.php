<?php
function ConnectDT($sql)
{
    //Kết nối database
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        // $conn dùng để kết nối cơ sở dữ liệu 
        $conn = new PDO("mysql:host=$servername;dbname=quanlyusers", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // dùng để báo lỗi 
        // echo "Connected successfully";
        $stmt = $conn->prepare("SELECT * FROM users");
        // prepare này được hiểu là 1 câu lệnh truy vấn dữ liệu 
        $stmt->execute();
        // execute dùng để thực thi câu lệnh 

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $products = $stmt->fetchAll();
        // fetchAll lấy tất cả mọi dòng dữ liệu từ đối tượng dữ liệu
        return $products;
    } catch (PDOException $e) {
        die("Could not connect to the database users :" . $e->getMessage());
        // echo "Connection failed: " . $e->getMessage();
    }
    // return $conn;
    // trong đó phương thức get Message hiện thị tin nhắn ngoại lệ thông báo lỗi!
}
function checkuser($UserName, $Password)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=quanlyusers", $username, $password);
    // set the PDO error mode to exception
    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = '" . $UserName . "'AND PassWord ='" . $Password . "'");
    // prepare này được hiểu là 1 câu lệnh truy vấn dữ liệu 
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $manger = $stmt->fetchAll();
    if (count($manger) > 0) {
        return $manger[0]['PassWord'];
    } else {
        return 0;
    }
}
function register($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=quanlyusers", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function update($sql)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=quanlyusers", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }   
}
?>