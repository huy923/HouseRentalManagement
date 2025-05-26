<?php
session_start();
if(isset($_GET['id'])){
    include "../config/db_connect.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM motel WHERE id = '$id';";
    $query = mysqli_query($conn, $sql);
    if($query){
        $_SESSION['success'] = 'Xóa phòng trọ thành công!';
        header('Location: all_motel.php');
        exit();
    }
}
?>