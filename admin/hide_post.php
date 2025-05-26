<?php
session_start();
if(isset($_GET['id'])){
    include "../config/db_connect.php";
    $id = $_GET['id'];
    $sql = "UPDATE motel SET approve = 2 WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['success'] = 'Ẩn thành công';
        header('Location: all_motel.php');
        exit();
    }
}
?>