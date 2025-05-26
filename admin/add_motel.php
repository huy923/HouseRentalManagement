<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//Show danh mục
include "../config/db_connect.php";
$showdm = "SELECT * FROM category";
$querydm = mysqli_query($conn, $showdm);
while ($row = mysqli_fetch_array($querydm)) {
    $arrDM[] = $row;
}
//Show khu vực
$showkv = "SELECT * FROM districts";
$querykv = mysqli_query($conn, $showkv);
while ($row1 = mysqli_fetch_array($querykv)) {
    $arrKV[] = $row1;
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
    <style>
        .alert-toast {
            position: fixed;
            top: 20px;
            /* Khoảng cách từ trên xuống */
            right: 20px;
            /* Khoảng cách từ phải sang */
            z-index: 9999;
            /* Đảm bảo thông báo luôn ở trên các thành phần khác */
            min-width: 300px;
            /* Đặt chiều rộng tối thiểu */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Tạo hiệu ứng bóng mờ */
            border-radius: 8px;
            /* Bo góc */
            padding: 15px;
            /* Khoảng cách bên trong */
            font-size: 14px;
            /* Kích thước chữ */
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Hiệu ứng mờ dần khi đóng */
        .alert-toast.fade-out {
            opacity: 0;
            transition: opacity 0.5s ease-out;
        }
    </style>
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
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-toast" role="alert">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-toast" role="alert">
                    <?= $_SESSION['error'] ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
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
                                        <input type="text" class="form-control" id="inputEmail3" name="title">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Mô tả </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="description">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Giá phòng </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="price">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Diện tích phòng </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="area">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Địa chỉ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Bản đồ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="latlng">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tiện ích </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="ultilities">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Điện thoại chủ trọ </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputPassword3" name="phone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="formFileSm" class="form-label">Hình ảnh</label>
                                    <input class="form-control form-control-sm bg-dark" id="formFileSm" type="file" name="image">
                                </div>
                                <div class="row mb-3">
                                    <h6 class="mb-4">Danh mục phòng trọ</h6>
                                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category">
                                        <option selected>--Chọn danh mục phòng trọ--</option>
                                        <?php foreach ($arrDM as $dm) { ?>
                                            <option value="<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <h6 class="mb-4">Khu vực phòng trọ</h6>
                                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="districts">
                                        <option selected>--Chon khu vực phòng trọ--</option>
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
                                                Còn phòng
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status"
                                                id="gridRadios2" value="0">
                                            <label class="form-check-label" for="gridRadios2">
                                                Hết phòng
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
            include '../config/db_connect.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ form
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $price = mysqli_real_escape_string($conn, $_POST['price']);
                $area = mysqli_real_escape_string($conn, $_POST['area']);
                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $latlng = mysqli_real_escape_string($conn, $_POST['latlng']);
                $utilities = mysqli_real_escape_string($conn, $_POST['ultilities']);
                $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                $category_id = $_POST['category'];
                $district_id = $_POST['districts'];
                $status = $_POST['status'];
                $userid = $_SESSION['user_id'];
                $date = date('Y/m/d H:i:s');
                // Xử lý file hình ảnh
                $image = "";
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $imageName = $_FILES['image']['name'];
                    $imageTmpName = $_FILES['image']['tmp_name'];
                    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                    $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

                    if (in_array($imageExt, $allowedExts)) {
                        $image = '../uploads/' . uniqid() . '.' . $imageExt;
                        move_uploaded_file($imageTmpName, '../uploads/' . basename($image));
                    } else {
                        $_SESSION['error'] = "Chỉ chấp nhận hình ảnh với định dạng JPG, JPEG, PNG, GIF.";
                        header("Location: register_room.php");
                        exit;
                    }
                }
                // SQL để thêm phòng trọ vào cơ sở dữ liệu
                $sql = "INSERT INTO motel (title, description, price, area, address, latlng, utilities, phone, images, category_id, user_id, districts_id, approve, created_at)
            VALUES ('$title', '$description', '$price', '$area', '$address', '$latlng', '$utilities', '$phone', '$image', '$category_id', '$userid', '$district_id', '$status', '$date')";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['success'] = "Đăng phòng trọ thành công!";
                    echo "<script>window.location.href = 'add_motel.php';</script>";
                } else {
                    $_SESSION['error'] = "Đã xảy ra lỗi khi đăng phòng trọ: " . $conn->error;
                    echo "<script>window.location.href = 'add_motel.php';</script>";
                    exit;
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
    <script>
        const alerts = document.querySelectorAll('.alert-toast');
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.classList.add('fade-out');
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        });
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>