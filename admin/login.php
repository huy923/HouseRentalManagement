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
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if ($user['login_attempts'] >= 2) {
                    $_SESSION['show_captcha'] = true;
                    if (isset($_SESSION['show_captcha']) && $_SESSION['show_captcha'] == true && isset($_POST['g-recaptcha-response'])) {
                        $captcha = $_POST['g-recaptcha-response'];
                        $secretKey = "6Le_IJUqAAAAADaO3Gr8kprknoVngONY7tkGM1J9";
                        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
                        $responseKeys = json_decode($response, true);
                        if (!$responseKeys["success"]) {
                            $_SESSION['error'] = "Vui lòng hoàn thành CAPTCHA.";
                            echo "<script>window.location.href = 'login.php';</script>";
                            exit;
                        }
                    } else {
                        $_SESSION['error'] = "Bạn cần xác thực CAPTCHA.";
                        echo "<script>window.location.href = 'login.php';</script>";
                        exit;
                    }
                }
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['avartar'] = $user['avartar'];
                    $_SESSION['role'] = $user['role'];
                    $conn->query("UPDATE user SET login_attempts = 0 WHERE id = {$user['id']}");
                    if ($user['role'] == 1) {
                        echo "<script>window.location.href = 'home.php';</script>";
                    } else if ($user['role'] == 0) {
                        echo "<script>window.location.href = '../index.php';</script>";
                    }
                    exit;
                } else {
                    $conn->query("UPDATE user SET login_attempts = login_attempts + 1, last_attempts = NOW() WHERE id = {$user['id']}");
                    $_SESSION['error'] = "Mật khẩu không đúng.";
                }
            } else {
                $_SESSION['error'] = "Tài khoản không tồn tại.";
            }

            echo "<script>window.location.href = 'login.php';</script>";
            exit;
        }
        ?>
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Đăng nhập</h3>
                            </a>
                        </div>
                        <form action="login.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                                <label for="floatingInput">Tài khoản</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Mật khẩu</label>
                            </div>
                            <?php if (isset($_SESSION['show_captcha']) && $_SESSION['show_captcha'] == true): ?>
                            <div class="form-floating mb-4">
                                <div id="captcha-container" style="display: block;">
                                    <div class="g-recaptcha" data-sitekey="6Le_IJUqAAAAAI1BRGx3zsY0wWSyq57snEvD13vl"></div>
                                </div>
                            </div>
                            <?php endif ?>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Nhớ tài khoản</label>
                                </div>
                                <a href="">Quên mật khẩu</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Đăng nhập</button>
                        </form>
                        <p class="text-center mb-0">Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
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