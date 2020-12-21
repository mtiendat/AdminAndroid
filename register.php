<?php

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $username = $_POST['username'];
    $hoten  = $_POST['hoten'];
    $password = $_POST['password'];
    $diachi=$_POST['diachi'];
    $sdt=$_POST['sdt'];
    $email = $_POST['email'];
    $password = md5($password);
    $trangthai=1;
    require_once 'connect.php';
    $sql = "INSERT INTO user (username,password,hoten,diachi,sdt, email,trangthai ) VALUES ('$username','$password','$hoten','$diachi','$sdt', '$email','$trangthai')";

    if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
        mysqli_close($conn);

    } else {
        $result["success"] = "0";
        $result["message"] = "error";
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
        mysqli_close($conn);
    }
}

?>
