<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Course Details</title>
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
	<link rel="stylesheet" type="text/css" href="styles/course.css">
	<link rel="stylesheet" type="text/css" href="styles/course_responsive.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	</link>
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
											<i class="fa fa-phone" aria-hidden="true"></i>
											<div>001-1234-88888</div>
										</li>
										<li>
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<div>tranhung296203@gmail.com</div>
										</li>
									</ul>
									<?php
									if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0) {
									?>
										<div class="top_bar_login ml-auto">
											<div class="login_button"><a href="logout.php">Đăng xuất</a></div>
										</div>
									<?php } else { ?>
										<div class="top_bar_login ml-auto">
											<div class="login_button"><a href="login.php">Đăng nhập</a></div>
										</div>
										<div class="top_bar_login ml-1">
											<div class="login_button"><a href="register.php">Đăng ký</a></div>
										</div>
									<?php } ?>
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
									<a href="index.php">
										<div class="logo_text">Mo<span>tel</span></div>
									</a>
								</div>
								<nav class="main_nav_contaner ml-auto">
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
									<li><a href="index.html">Chi tiết phòng trọ</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			include "config/db_connect.php";
			$view = "UPDATE motel SET count_view = count_view + 1 WHERE id = '$id'";
			$count_view = mysqli_query($conn, $view);
			$sql = "SELECT motel.*, user.name FROM motel
    JOIN user ON motel.user_id = user.id
     WHERE motel.id = '$id'";
			$query = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($query);
		}
		?>
		<!-- Course -->
		<div class="course">
			<div class="container">
				<div class="row">

					<!-- Course -->
					<div class="col-lg-8">

						<div class="course_container">
							<div class="course_title"><?php echo $row['title'] ?></div>

							<!-- Course Image -->
							<div class="course_image"><img src="<?php echo str_replace('../', '', $row['images']) ?> ?>" alt=""></div>

							<!-- Course Tabs -->
							<div class="course_tabs_container">
								<div class="tabs d-flex flex-row align-items-center justify-content-start">
									<div class="tab active">Mô tả</div>
								</div>
								<div class="tab_panels">

									<!-- Description -->
									<div class="tab_panel active">
										<div class="tab_panel_content">
											<div class="tab_panel_text">
												<p><?php echo $row['description'] ?></p>
											</div>
											<div class="tab_panel_section">
												<div class="tab_panel_subtitle">Thông tin chi tiết</div>
												<ul class="tab_panel_bullets">
													<li>Địa chỉ: <?php echo $row['address'] ?></li>
													<li>Diện tích: <?php echo $row['area'] ?> m^2</li>
													<li>Tiện ích phòng trọ: <?php echo $row['utilities'] ?></li>
												</ul>
											</div>
										</div>
									</div>

									<!-- Curriculum -->
									<div class="tab_panel tab_panel_2">
										<div class="tab_panel_content">
											<div class="tab_panel_title">Software Training</div>
											<div class="tab_panel_content">
												<div class="tab_panel_text">
													<p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
												</div>

												<!-- Dropdowns -->
											</div>
										</div>
									</div>

									<!-- Reviews -->
								</div>
							</div>
						</div>
					</div>

					<!-- Course Sidebar -->
					<div class="col-lg-4">
						<div class="sidebar">

							<!-- Feature -->
							<div class="sidebar_section">
								<div class="sidebar_section_title">Thông tin phòng trọ</div>
								<div class="sidebar_feature">
									<div class="course_price"><?php echo number_format($row['price'], 0, '', '.') ?> VND</div>

									<!-- Features -->
									<div class="feature_list">

										<!-- Feature -->
										<div class="feature d-flex flex-row align-items-center justify-content-start">
											<div class="feature_title"><i class="fa fa-user" aria-hidden="true"></i><span>Người đăng:</span></div>
											<div class="feature_text ml-auto"><?php echo $row['name'] ?></div>
										</div>

										<!-- Feature -->
										<div class="feature d-flex flex-row align-items-center justify-content-start">
											<div class="feature_title"><i class="fa fa-clock-o" aria-hidden="true"></i><span>Thời gian:</span></div>
											<div class="feature_text ml-auto"><?php $created = strtotime($row['created_at']);
																				$current_time = time();
																				$time_diff = $current_time - $created;
																				if ($time_diff < 60) {
																					echo "Vừa xong";
																				} elseif ($time_diff < 3600) {
																					$minutes = floor($time_diff / 60);
																					echo "$minutes phút trước";
																				} elseif ($time_diff < 86400) {
																					$hours = floor($time_diff / 3600);
																					echo "$hours giờ trước";
																				} elseif ($time_diff < 2592000) {
																					$days = floor($time_diff / 86400);
																					echo "$days ngày trước";
																				} elseif ($time_diff < 31536000) {
																					$months = floor($time_diff / 2592000);
																					echo "$months tháng trước";
																				} else {
																					$years = floor($time_diff / 31536000);
																					echo "$years năm trước";
																				}
																				?></div>
										</div>
										<!-- Feature -->
										<div class="feature d-flex flex-row align-items-center justify-content-start">
											<div class="feature_title"><i class="fa fa-eye" aria-hidden="true"></i><span>Lượt xem:</span></div>
											<div class="feature_text ml-auto"><?php echo $row['count_view'] ?></div>
										</div>

										<!-- Feature -->
										<div class="feature d-flex flex-row align-items-center justify-content-start">
											<div class="feature_title"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Trạng thái:</span></div>
											<div class="feature_text ml-auto"><?php if ($row['approve'] == 1) {
																					echo "Đã duyệt";
																				} else {
																					echo "Chưa duyệt";
																				} ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="sidebar_section">
							<div class="sidebar_section_title">Báo cáo</div>
							<div class="sidebar_latest">
							<form action="send_report.php" method="post">
								<div class="mb-6">
									<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
									<label class="block text-gray-700 font-semibold mb-3">Tùy chọn:</label>
									<div class="flex items-center mb-4">
										<input id="rented" type="radio" name="report" value="1" class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300">
										<label for="rented" class="text-gray-700 text-lg">Đã cho thuê</label>
									</div>
									<div class="flex items-center">
										<input id="incorrect-content" type="radio" name="report" value="2" class="mr-3 h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300">
										<label for="incorrect-content" class="text-gray-700 text-lg">Sai nội dung</label>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-400 text-white px-6 py-3 rounded-full text-lg font-semibold">
										Gửi báo cáo
									</button>
								</div>
							</form>
							</div>
						</div>
							<!-- Feature -->


							<!-- Latest Course -->

						</div>
					</div>
				</div>
			</div>
		</div>

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
    const alerts = document.querySelectorAll('.alert-toast');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 2000);
    });
</script>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
	<script src="js/course.js"></script>
</body>

</html>