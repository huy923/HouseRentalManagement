<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include "../config/db_connect.php";
    $sql = "SELECT motel.*, category.id as idDM, category.name as tenDM, districts.name as tenKV, districts.id as idKV FROM motel
     JOIN category ON motel.category_id = category.id
     JOIN districts ON motel.districts_id = districts.id WHERE motel.id = '$id';";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $idDM = $row['idDM'];
    $idKV = $row['idKV'];
    //Show danh mục
    $showdm = "SELECT * FROM category WHERE id <> $idDM";
    $querydm = mysqli_query($conn, $showdm);
    while ($row2 = mysqli_fetch_array($querydm)) {
        $arrDM[] = $row2;
    }
    //Show khu vực
    $showkv = "SELECT * FROM districts WHERE id <> $idKV";
    $querykv = mysqli_query($conn, $showkv);
    while ($row1 = mysqli_fetch_array($querykv)) {
        $arrKV[] = $row1;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


     
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user me-2"></i>Case study</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['name'] ?></h6>
                        <span><?php if($_SESSION['role'] == 1 ){
                                echo "Quản trị viên";
                        } ?></span>
                    </div>
                </div>
                <?php include "menu.php" ?>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Thêm phòng trọ</h6>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" name="title" value="<?php echo $row['title'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Mô tả </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="description" value="<?php echo $row['description'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Giá phòng </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="price" value="<?php echo $row['price'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Diện tích </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="area" value="<?php echo $row['area'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Địa chỉ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="address" value="<?php echo $row['address'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Bản đồ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="latlng" value="<?php echo $row['latlng'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tiện ích </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="utilities" value="<?php echo $row['utilities'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Điện thoại chủ trọ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="phone" value="<?php echo $row['phone'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formFileSm" class="form-label">Hình ảnh</label>
                                    <input class="form-control form-control-sm bg-dark" id="formFileSm" type="file" name="image">
                                </div>
                                <div class="row mb-3">
                                    <h6 class="mb-4">Danh mục phòng trọ</h6>
                                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category">
                                        <option selected value="<?php echo $row['category_id'] ?>"><?php echo $row['tenDM'] ?></option>
                                        <?php foreach ($arrDM as $dm) { ?>
                                            <option value="<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="mb-4">Khu vực phòng trọ</h6>
                                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="districts">
                                        <option selected value="<?php echo $row['idKV'] ?>"><?php echo $row['tenKV'] ?></option>
                                        <?php foreach ($arrKV as $kv) { ?>
                                            <option value="<?php echo $kv['id'] ?>"><?php echo $kv['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Trạng thái phòng trọ</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="gridRadios1" value="1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Đã duyệt
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="gridRadios2" value="0">
                                            <label class="form-check-label" for="gridRadios2">
                                                Ẩn
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->

            <?php
            // Kiểm tra nếu form được gửi đi
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $area = $_POST['area'];
                $address = $_POST['address'];
                $latlng = $_POST['latlng'];
                $utilities = $_POST['utilities'];
                $phone = $_POST['phone'];
                $category = $_POST['category'];
                $districts = $_POST['districts'];
                $status = $_POST['status'];

                // Xử lý hình ảnh nếu có
                if ($_FILES['image']['name']) {
                    $image = $_FILES['image']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($image);

                    // Di chuyển file lên thư mục lưu trữ
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        // Xóa hình ảnh cũ nếu có
                        if (file_exists($row['images'])) {
                            unlink($row['images']);
                        }
                    } else {
                        $image = $row['images']; // Nếu không có file mới thì giữ hình cũ
                    }
                } else {
                    $image = $row['images']; // Nếu không có file mới thì giữ hình cũ
                }

                // Cập nhật thông tin phòng trọ vào CSDL
                $update_sql = "UPDATE motel SET 
        title = '$title',
        description = '$description',
        price = '$price',
        area = '$area',
        address = '$address',
        latlng = '$latlng',
        utilities = '$utilities',
        phone = '$phone',
        category_id = '$category',
        districts_id = '$districts',
        approve = '$status',
        images = '$image'
        WHERE id = $id";

                // Thực hiện truy vấn cập nhật
                if (mysqli_query($conn, $update_sql)) {
                    $_SESSION['success'] = "Cập nhật thành công!";
                    echo "<script>window.location.href = 'all_motel.php';</script>";
                } else {
                    $_SESSION['error'] = "Cập nhật thất bại!";
                    echo "<script>window.location.href = 'all_motel.php';</script>";
                }
            }
            ?>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>