<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    require_once 'connect.php';
    mysqli_set_charset($conn, 'UTF8');
    $sql = "SELECT * FROM user WHERE email='$email' ";
    $response = mysqli_query($conn, $sql);
    $result = array();
    $result['login'] = array();
    if ( mysqli_num_rows($response) === 1 ) {
        $row = mysqli_fetch_assoc($response);
        if ($password==$row['password'] ) {
            $index['name'] = $row['hoten'];
            $index['email'] = $row['email'];
            array_push($result['login'], $index);
            $result['success'] = "1";
            $result['message'] = "success";
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($result);
            mysqli_close($conn);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($result);
            mysqli_close($conn);

        }
    }
}

?>
