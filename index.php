<!DOCTYPE html>
<html lang="en">

<head>
    <title>Courses</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/courses.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
    <style>
        /* Nút user */
        .shopping_cart {
            position: relative;
            display: inline-block;
            padding: 10px;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        .shopping_cart:hover {
            background-color: #2980b9;
        }

        /* Hộp menu người dùng */
        .user_menu {
            display: none;
            /* Ẩn ban đầu */
            position: absolute;
            top: 100%;
            /* Hiển thị ngay dưới nút */
            right: 0;
            /* Căn phải */
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            min-width: 150px;
            z-index: 100;
        }

        .user_menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .user_menu li {
            border-bottom: 1px solid #ddd;
            width: 200px;
        }

        .user_menu li:last-child {
            border-bottom: none;
        }

        .user_menu a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .user_menu a:hover {
            background-color: #f1f1f1;
            color: #000;
        }
    </style>
</head>

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
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <div>001-1234-88888</div>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <div>tranhung296203@gmail.com</div>
                                        </li>
                                    </ul>
                                    <?php
                                    session_start();
                                    if (!isset($_SESSION['user_id'])) {
                                        header("Location: admin/login.php");
                                        exit();
                                    }
                                    ?>
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
                                        <div class="logo_text">Mot<span>el</span></div>
                                    </a>
                                </div>
                                <nav class="main_nav_contaner ml-auto">
                                    <ul class="main_nav">
                                    </ul>
                                    </ul>
                                    <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
                                    <!-- Hamburger -->
                                    <div class="shopping_cart" onclick="toggleUserMenu()">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <div class="user_menu" id="userMenu">
                                            <ul>
                                                <li><a href="view">Thông tin tài khoản</a></li>
                                                <li><a href="post_room.php">Đăng bài</a></li>
                                                <li><a href="post_room.php">Bài viết đã đăng</a></li>
                                                <li><a href="logout.php">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                    </div>

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
                                <form action="" class="header_search_form" method="get">
                                    <input type="search" name="search" class="search_input" placeholder="Tìm kiếm khóa học...">
                                    <button type="submit" class="header_search_button d-flex flex-column align-items-center justify-content-center">
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
                                    <li><a href="index.html">Danh sách phòng trọ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Courses -->

        <div class="courses">
            <div class="container">
                <div class="row">
                    <!-- Courses Main Content -->
                    <div class="col-lg-8">
                        <div class="courses_search_container">
                            <form action="#" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
                                <input type="search" class="courses_search_input" placeholder="Khoảng giá" required="required">
                                <input type="search" class="courses_search_input" placeholder="Khoảng giá" required="required">
                                <button action="submit" class="courses_search_button ml-auto">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="courses_container">
                            <div class="row courses_row">
                                <?php
                                include 'config/db_connect.php';
                                $conditions = [];
                                $filter = false;
                                if (isset($_GET['category'])) {
                                    $select_category = mysqli_real_escape_string($conn, $_GET['category']);
                                    $conditions[] = "motel.category_id = '$select_category'";
                                    $filter = true;
                                }
                                if (isset($_GET['search'])) {
                                    $searchterm = mysqli_real_escape_string($conn, $_GET['search']);
                                    $conditions[] = "(motel.address LIKE '%$searchterm%')";
                                    $filter = true;
                                }

                                $fetch_top_view = false;
                                if(isset($_GET['popular'])&& $_GET['popular'] == 'true'){
                                    $fetch_top_view = true;
                                    $filter = true;
                                }
   
                               
                                $fetch_newest = false;
                                if (isset($_GET['newest']) && $_GET['newest'] == 'true') {
                                    $fetch_newest = true;
                                    $filter = true;
                                }

                                $fetch_near_dhv = false;
                                if(isset($_GET['near_dhv']) && $_GET['near_dhv'] == 'true'){
                                    $fetch_near_dhv = true;
                                    $filter = true;
                                }
                                $total_pages = 1;
                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                $course_per_page = 4;
                                $offset = ($page - 1) * $course_per_page;
                                if ($fetch_top_view) {
                                    $sql_course = "SELECT motel.*, user.name 
                   FROM motel 
                   JOIN user ON motel.user_id = user.id 
                   WHERE approve = 1 
                   ORDER BY motel.count_view DESC 
                   LIMIT 4";
                                } elseif ($fetch_newest) {
                                    $sql_course = "SELECT motel.*, user.name 
                   FROM motel 
                   JOIN user ON motel.user_id = user.id 
                   WHERE approve = 1 
                   ORDER BY motel.created_at DESC 
                   LIMIT 4";
                                } elseif ($fetch_near_dhv) {
                                    $sql_course= " SELECT motel.*, user.name
                                    FROM motel
                                    JOIN user ON motel.user_id = user.id
                                    JOIN districts ON motel.districts_id = districts.id
                                    WHERE approve =1 AND districts.near_dhv =1
                                    ORDER BY motel.created_at DESC
                                    LIMIT $course_per_page OFFSET $offset";
                                } else {
                                    $sql_count = "SELECT COUNT(*) as total FROM motel";
                                    if (!empty($conditions)) {
                                        $sql_count .= " WHERE approve = 1 AND " . implode(" AND ", $conditions);
                                    } else {
                                        $sql_count .= " WHERE approve = 1";
                                    }
                                    $count_result = mysqli_query($conn, $sql_count);
                                    $row = mysqli_fetch_assoc($count_result);
                                    $total_course = $row['total'];
                                    $total_pages = ceil($total_course / $course_per_page);
                                    $sql_course = "SELECT motel.*, user.name FROM motel JOIN user ON motel.user_id = user.id";
                                    if (!empty($conditions)) {
                                        $sql_course .= " WHERE approve = 1 AND " . implode(" AND ", $conditions);
                                    } else {
                                        $sql_course .= " WHERE approve = 1";
                                    }

                                    $sql_course .= " ORDER BY motel.id DESC"; // Sắp xếp mặc định
                                    $sql_course .= " LIMIT $course_per_page OFFSET $offset";
                                }
                                $course_result = mysqli_query($conn, $sql_course);

                                if (mysqli_num_rows($course_result) > 0) {
                                    while ($course = mysqli_fetch_assoc($course_result)) {
                                        echo '
                                <!-- Course -->
                                <div class="col-lg-6 course_col">
                                    <div class="course">
                                        <div class="course_image">
                                            <img src="' . str_replace("../", "", $course['images']) . '" alt="">
                                        </div>
                                        <div class="course_body">
                                            <h3 class="course_title">
                                                <a href="post_detail.php?id=' . $course['id'] . '">' . htmlspecialchars($course['title']) . '</a>
                                            </h3>
                                            <div class="course_teacher"> Địa chỉ: ' . htmlspecialchars($course['address']) . '</div>
                                            <div class="course_text">
                                                <p>Diện tích: ' . htmlspecialchars($course['area']) . ' m^2</p>
                                            </div>
                                            <div class="course_text">
                                                <p>Lượt xem: ' . htmlspecialchars($course['count_view']) . '</p>
                                            </div>
                                        </div>
                                        <div class="course_footer">
                                            <div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
                                                <div class="course_info">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <span>' . htmlspecialchars($course['name']) . '</span>
                                                </div>
                                                <div class="course_price ml-auto">' .
                                            (number_format($course['price'], 0, '', '.') . " VND") .
                                            '</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                    }
                                } else {
                                    echo "Không tìm thấy phòng trọ với tìm kiếm của bạn!";
                                }
                                ?>
                            </div>
                            <?php if (!$filter): ?>
                                <div class="row pagination_row">
                                    <div class="col">
                                        <div class="pagination_container d-flex flex-row align-items-center justify-content-start">
                                            <ul class="pagination_list">
                                                <?php if ($page > 1): ?>
                                                    <li><a href="?page=<?= $page - 1 ?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                                <?php endif; ?>
                                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                                    <li class="<?= $i == $page ? 'active' : '' ?>"><a href="?page=<?= $i ?>"><?= $i ?></a></li>
                                                <?php endfor; ?>
                                                <?php if ($page < $total_pages): ?>
                                                    <li><a href="?page=<?= $page + 1 ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Courses Sidebar -->
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <!-- Categories -->
                            <div class="sidebar_section">
                                <div class="sidebar_section_title">Danh mục phòng trọ</div>
                                <div class="sidebar_categories">
                                    <ul>
                                        <li><a href="?topic=all">Tất cả phòng trọ</a></li>
                                        <?php
                                        $dm = "SELECT * FROM category";
                                        $querydm = mysqli_query($conn, $dm);
                                        while ($category = mysqli_fetch_assoc($querydm)) {
                                        ?>
                                            <li><a href="?category=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar_section">
                                <div class="sidebar_section_title">Danh mục tìm kiếm</div>
                                <div class="sidebar_categories">
                                    <ul>
                                        <li><a href="?newest=true">Phòng trọ mới nhất</a></li>
                                        <li><a href="?popular=true">Phòng trọ nhiều lượt xem nhất</a></li>
                                        <li><a href="?near_dhv=true">Phòng trọ gần trường đại học vinh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter -->
        <div class="newsletter">
            <div class="newsletter_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
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
    <script>
        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
            }
        }

        // Đóng menu khi click ra ngoài vùng menu
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('userMenu');
            const cart = document.querySelector('.shopping_cart');
            if (!cart.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
    </script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="plugins/colorbox/jquery.colorbox-min.js"></script>
    <script src="js/courses.js"></script>
</body>

</html>