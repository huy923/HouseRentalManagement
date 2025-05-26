<?php
session_start();
if(isset($_GET['id'])){
    include "../config/db_connect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id = '$id';";
    $query = mysqli_query($conn, $sql);
    if($query){
        $_SESSION['success'] = 'Xóa tài khoản thành công!';
        header('Location: all_account.php');
        exit();
    }
}
?>