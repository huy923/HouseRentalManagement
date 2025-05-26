<!-- lượt xem nhiều nhất -->
<?php
$fetch_top_view = false;
if(isset($_GET['popular'])&& $_GET['popular'] == 'true'){
    $fetch_top_view = true;
    $filter = true;
}

if($fetch_top_view){
    $sql_count = " SELECT motel.*, user.name
    FROM motel 
    JOIN user ON motel.user_id = user.id
    WHERE approve = 1
    ORDER BY motel.count_view DESC
    LIMIT = 4";
    
}

?>
  


<!-- Gần trường đại học vinh -->

<?php
$fetch_near_dhv = false;
if(isset($_GET['near_dhv']) && $_GET['near_dhv']=='true'){
    $fetch_near_dhv = true;
    $filter = true;
}
<?php
$fetch_near_dhv = false;
if(isset($_GET['near_dhv']) && $_GET['near_dhv']=='true'){
    $fetch_near_dhv = true;
    $filter = true;
}

if ($fetch_near_dhv) {
    $sql_course = "SELECT motel.*, user.name 
FROM motel 
JOIN user ON motel.user_id = user.id
JOIN districts ON motel.districts_id = districts.id 
WHERE approve = 1 AND districts.near_dhv = 1 
ORDER BY motel.created_at DESC 
LIMIT $course_per_page OFFSET $offset";
}
?>

?>

<!-- thêm tài khoản -->

<!-- thêm bài đăng -->