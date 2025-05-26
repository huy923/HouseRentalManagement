<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//Show danh mục
include "config/db_connect.php";
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
    <title>Contact</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->
            <div class="top_bar">
                <div class="top_bar_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                                    <ul class="top_bar_contact_list">
                                        <li>
                                            <div class="question">Have any questions?</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <div>001-1234-88888</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <div>info.deercreative@gmail.com</div>
                                        </li>
                                    </ul>
                                    <div class="top_bar_login ml-auto">
                                        <div class="login_button"><a href="#">Register or Login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Content -->
            <div class="header_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <div class="logo_container">
                                    <a href="#">
                                        <div class="logo_text">Unic<span>at</span></div>
                                    </a>
                                </div>
                                <nav class="main_nav_contaner ml-auto">
                                    <ul class="main_nav">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="courses.html">Courses</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="#">Page</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                    <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>

                                    <!-- Hamburger -->

                                    <div class="shopping_cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                                    <div class="hamburger menu_mm">
                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Search Panel -->
            <div class="header_search_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                                <form action="#" class="header_search_form">
                                    <input type="search" class="search_input" placeholder="Search" required="required">
                                    <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu -->

        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="search">
                <form action="#" class="header_search_form menu_mm">
                    <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                    <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"><a href="index.html">Home</a></li>
                    <li class="menu_mm"><a href="#">About</a></li>
                    <li class="menu_mm"><a href="#">Courses</a></li>
                    <li class="menu_mm"><a href="#">Blog</a></li>
                    <li class="menu_mm"><a href="#">Page</a></li>
                    <li class="menu_mm"><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>

        <!-- Home -->

        <div class="home">
            <div class="breadcrumbs_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li>Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact -->

        <div class="contact">

            <!-- Contact Map -->

            <div class="contact_map">

                <!-- Google Map -->

            </div>

            <!-- Contact Info -->

            <div class="contact_info_container">
                <div class="container">
                    <div class="row">

                        <!-- Contact Form -->
                        <div class="col-lg-6">
                            <div class="contact_form">
                                <div class="contact_info_title">Đăng tải phòng trọ</div>
                                <form action="" class="comment_form" method="post" enctype="multipart/form-data">
                                    <div>
                                        <div class="form_title">Tiêu đề</div>
                                        <input type="text" class="comment_input" required="required" name="title">
                                    </div>
                                    <div>
                                        <div class="form_title">Giá phòng</div>
                                        <input type="text" class="comment_input" required="required" name="price">
                                    </div>
                                    <div>
                                        <div class="form_title">Diện tích</div>
                                        <input type="text" class="comment_input" required="required" name="area">
                                    </div>
                                    <div>
                                        <div class="form_title">Địa chỉ</div>
                                        <input type="text" class="comment_input" required="required" name="address">
                                    </div>
                                    <div>
                                        <div class="form_title">Bản đồ</div>
                                        <input type="text" class="comment_input" required="required" name="latlng">
                                    </div>
                                    <div>
                                        <div class="form_title">Tiện ích</div>
                                        <input type="text" class="comment_input" required="required" name="utilities">
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6" style="padding-top: 88px;">
                            <div class="contact_form">
                                <div>
                                    <div>
                                        <div class="form_title">Điện thoại chủ trọ</div>
                                        <input type="text" class="comment_input" required="required" name="phone">
                                    </div>
                                    <div>
                                        <div class="form_title"></div>
                                        <select class="comment_input" name="category" required="required">
                                            <option disabled selected>--Chọn danh mục phòng trọ--</option>
                                            <?php foreach ($arrDM as $dm) { ?>
                                                <option value="<?php echo $dm['id'] ?>"><?php echo $dm['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="form_title"></div>
                                        <select class="comment_input" required="required" name="districts">
                                            <option value="" disabled selected>--Chọn khu vực--</option>
                                            <?php foreach ($arrKV as $kv) { ?>
                                                <option value="<?php echo $kv['id'] ?>"><?php echo $kv['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="form_title">Hình ảnh</div>
                                        <input type="file" class="comment_input" required="required" name="image">
                                    </div>
                                    <div>
                                        <div class="form_title">Mô tả</div>
                                        <textarea class="comment_input comment_textarea" required="required" name="description"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="comment_button trans_200">Đăng tải</button>
                                    </div>
                                            </form>
                                </div>
                            </div>
                            <!-- Contact Info -->
                        </div>
                    </div>
                </div>
            </div>
            <?php
include 'config/db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $latlng = mysqli_real_escape_string($conn, $_POST['latlng']);
    $utilities = mysqli_real_escape_string($conn, $_POST['utilities']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $category_id = $_POST['category'];
    $district_id = $_POST['districts'];
    $userid = $_SESSION['user_id'];
    $date = date('Y/m/d H:i:s');
    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowedExts)) {
            $image = 'uploads/' . uniqid() . '.' . $imageExt;
            move_uploaded_file($imageTmpName, 'uploads/' . basename($image));
        } else {
            $_SESSION['error'] = "Chỉ chấp nhận hình ảnh với định dạng JPG, JPEG, PNG, GIF.";
            header("Location: register_room.php");
            exit;
        }
    }
    $sql = "INSERT INTO motel (title, description, price, area, address, latlng, utilities, phone, images, category_id, user_id, districts_id, approve, created_at)
            VALUES ('$title', '$description', '$price', '$area', '$address', '$latlng', '$utilities', '$phone', '$image', '$category_id', '$userid', '$district_id', 0, '$date')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Đăng phòng trọ thành công!";
        echo "<script>window.location.href = 'post_room.php';</script>";
    } else {
        $_SESSION['error'] = "Đã xảy ra lỗi khi đăng phòng trọ: " . $conn->error;
        echo "<script>window.location.href = 'post_room.php';</script>";
        exit;
    }
}
?>
            <!-- Newsletter -->

            <div class="newsletter">
                <div class="newsletter_background" style="background-image:url(images/newsletter_background.jpg)"></div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="newsletter_container d-flex flex-lg-row flex-column align-items-center justify-content-start">

                                <!-- Newsletter Content -->
                                <div class="newsletter_content text-lg-left text-center">
                                    <div class="newsletter_title">sign up for news and offers</div>
                                    <div class="newsletter_subtitle">Subcribe to lastest smartphones news & great deals we offer</div>
                                </div>

                                <!-- Newsletter Form -->
                                <div class="newsletter_form_container ml-lg-auto">
                                    <form action="#" id="newsletter_form" class="newsletter_form d-flex flex-row align-items-center justify-content-center">
                                        <input type="email" class="newsletter_input" placeholder="Your Email" required="required">
                                        <button type="submit" class="newsletter_button">subscribe</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->

            <footer class="footer">
                <div class="footer_background" style="background-image:url(images/footer_background.png)"></div>
                <div class="container">
                    <div class="row footer_row">
                        <div class="col">
                            <div class="footer_content">
                                <div class="row">

                                    <div class="col-lg-3 footer_col">

                                        <!-- Footer About -->
                                        <div class="footer_section footer_about">
                                            <div class="footer_logo_container">
                                                <a href="#">
                                                    <div class="footer_logo_text">Unic<span>at</span></div>
                                                </a>
                                            </div>
                                            <div class="footer_about_text">
                                                <p>Lorem ipsum dolor sit ametium, consectetur adipiscing elit.</p>
                                            </div>
                                            <div class="footer_social">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-3 footer_col">

                                        <!-- Footer Contact -->
                                        <div class="footer_section footer_contact">
                                            <div class="footer_title">Contact Us</div>
                                            <div class="footer_contact_info">
                                                <ul>
                                                    <li>Email: Info.deercreative@gmail.com</li>
                                                    <li>Phone: +(88) 111 555 666</li>
                                                    <li>40 Baria Sreet 133/2 New York City, United States</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-3 footer_col">

                                        <!-- Footer links -->
                                        <div class="footer_section footer_links">
                                            <div class="footer_title">Contact Us</div>
                                            <div class="footer_links_container">
                                                <ul>
                                                    <li><a href="index.html">Home</a></li>
                                                    <li><a href="about.html">About</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="#">Features</a></li>
                                                    <li><a href="courses.html">Courses</a></li>
                                                    <li><a href="#">Events</a></li>
                                                    <li><a href="#">Gallery</a></li>
                                                    <li><a href="#">FAQs</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-3 footer_col clearfix">

                                        <!-- Footer links -->
                                        <div class="footer_section footer_mobile">
                                            <div class="footer_title">Mobile</div>
                                            <div class="footer_mobile_content">
                                                <div class="footer_image"><a href="#"><img src="images/mobile_1.png" alt=""></a></div>
                                                <div class="footer_image"><a href="#"><img src="images/mobile_2.png" alt=""></a></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row copyright_row">
                        <div class="col">
                            <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
                                <div class="cr_text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                                <div class="ml-lg-auto cr_links">
                                    <ul class="cr_list">
                                        <li><a href="#">Copyright notification</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="styles/bootstrap4/popper.js"></script>
        <script src="styles/bootstrap4/bootstrap.min.js"></script>
        <script src="plugins/easing/easing.js"></script>
        <script src="plugins/parallax-js-master/parallax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
        <script src="plugins/marker_with_label/marker_with_label.js"></script>
        <script src="js/contact.js"></script>
</body>

</html>
<!-- Contact Section End -->

<script>
    const alerts = document.querySelectorAll('.alert-toast');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 2000);
    });
</script>