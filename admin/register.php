<?php
session_start();
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


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Đăng ký</h3>
                            </a>
                        </div>
                        <form action="register.php" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingText" name="username" placeholder="">
                                <label for="floatingText">Tài khoản</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingInput" name="pass" placeholder="">
                                <label for="floatingInput">Mật khẩu</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="cpass" placeholder="">
                                <label for="floatingPassword">Nhập lại mật khẩu</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="floatingText" name="email" placeholder="">
                                <label for="floatingText">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingText" name="phone" placeholder="">
                                <label for="floatingText">Số điện thoại</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingText" name="name" placeholder="">
                                <label for="floatingText">Tên hiển thị</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Ảnh đại diện</label>
                                <input class="form-control form-control-sm bg-dark" id="formFileSm" type="file" name="avartar">
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Đăng ký</button>
                        </form>
                        <p class="text-center mb-0">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>
    <?php
    include '../config/db_connect.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['cpass']);
        $avatarPath = null;
        if ($password !== $confirm_password) {
            $_SESSION['error'] = "Mật khẩu và xác nhận mật khẩu không khớp.";
            header("Location: register.php");
            exit;
        }
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        if (isset($_FILES['avartar']) && $_FILES['avartar']['error'] == 0) {
            $uploadDir = "../uploads/";
            $fileName = basename($_FILES['avartar']['name']);
            $fileTmp = $_FILES['avartar']['tmp_name'];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($fileType, $allowedTypes)) {
                $uniqueFileName = uniqid() . '.' . $fileType;
                $targetFile = $uploadDir . $uniqueFileName;
                if (move_uploaded_file($fileTmp, $targetFile)) {
                    $avatarPath = $targetFile;
                } else {
                    $_SESSION['error'] = "Không thể tải tệp lên.";
                    echo "<script>window.location.href = 'register.php';</script>";
                    exit;
                }
            } else {
                $_SESSION['error'] = "Định dạng file không hợp lệ. Chỉ cho phép JPG, PNG, GIF.";
                echo "<script>window.location.href = 'register.php';</script>";
                exit;
            }
        }
        $checkQuery = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($checkQuery);
        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Tài khoản hoặc email đã tồn tại.";
            echo "<script>window.location.href = 'register.php';</script>";
            exit;
        }
        $role = 0;
        $sql = "INSERT INTO user (name, username, email, password, role, phone, avartar, login_attempts) 
            VALUES ('$name', '$username', '$email', '$hashedPassword', $role, '$phone', '$avatarPath', 0)";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Đăng ký thành công!";
            echo "<script>window.location.href = 'register.php';</script>";
        } else {
            $_SESSION['error'] = "Lỗi khi thêm người dùng: " . $conn->error;
            echo "<script>window.location.href = 'register.php';</script>";
        }
    }
    $conn->close();
    ?>
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
    <script>
    const alerts = document.querySelectorAll('.alert-toast');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 2000);
    });
</script>

</body>

</html>