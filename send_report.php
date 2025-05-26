<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $report = $_POST['report'];
    include "config/db_connect.php";
    $sql = "UPDATE motel SET status = $report WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        $_SESSION['success'] = 'Đã gửi báo cáo';
        header('Location: post_detail.php?id='.$id);
        exit();
    }
}
?>