<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-toast" role="alert">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php
        include '../config/db_connect.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass'];
            $cpass = $_POST['cpass'];
            $sql = "SELECT * FROM user WHERE id = '1';";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            if (!password_verify($oldpass, $row['password'])) {
                $_SESSION['error'] = 'Mật khẩu cũ không chính xác';
                echo "<script>window.location.href = 'change_password.php'</script>";
                exit;
            }
            if ($newpass != $cpass) {
                $_SESSION['error'] = 'Mật khẩu mới không khớp';
                echo "<script>window.location.href = 'change_password.php'</script>";
                exit;
            }
            $hashedPassword = password_hash($cpass, PASSWORD_BCRYPT);
            $update = "UPDATE user SET password = '$hashedPassword' WHERE  id = '1';";
            $result = mysqli_query($conn, $update);
            if ($result){
                $_SESSION['success'] = 'Đổi mật khẩu thành công';
                echo "<script>window.location.href = 'login.php'</script>";
                exit;
            } else {
                $_SESSION['error'] = 'Thất bại';
                echo "<script>window.location.href = 'change_password.php'</script>";
                exit;
            }
        }
        ?>
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Đổi mật khẩu</h3>
                            </a>
                        </div>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" name="oldpass" placeholder="name@example.com">
                                <label for="floatingInput">Mật khẩu cũ</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="newpass" placeholder="Password">
                                <label for="floatingPassword">Mật khẩu mới</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="cpass" placeholder="Password">
                                <label for="floatingPassword">Nhập lại mật khẩu mới</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Đổi mật khẩu</button>
                        </form>
                        <p class="text-center mb-0"><a href="home.php">Quay lại</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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