<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary sidebar-open app-loaded">
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Ready Dashboard
				</a>
			</div>
				<nav class="navbar navbar-header navbar-expand-lg">
					<div class="container-fluid">
						
						
						<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
							<li class="nav-item dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="la la-envelope"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</li>
							<li class="nav-item dropdown hidden-caret">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="la la-bell"></i>
									<span class="notification">3</span>
								</a>
								<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
									<li>
										<div class="dropdown-title">You have 4 new notification</div>
									</li>
									<li>
										<div class="notif-center">
											<a href="#">
												<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
												<div class="notif-content">
													<span class="block">
														New user registered
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
												<div class="notif-content">
													<span class="block">
														Rahmad commented on Admin
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/profile2.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="block">
														Reza send messages to you
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
												<div class="notif-content">
													<span class="block">
														Farrah liked Admin
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</li>
									<li>
										<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
									</li>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span >Hizrian</span></span> </a>
								<ul class="dropdown-menu dropdown-user">
									<li>
										<div class="user-box">
											<div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
											<div class="u-text">
												<h4>Hizrian</h4>
												<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
											</div>
										</div>
									</li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
										<a class="dropdown-item" href="#"></i> My Balance</a>
										<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>

								</ul>
									<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
		</div>		
		
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="assets/img/profile.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
                    <li class="nav-item">
							<a href="<?= base_url('Dashboard')?>" class="nav-link">
								<i class="la la-table"></i>
								<div data-i18n="Dashboard">Dashboard</div>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?= base_url('Pelanggan')?>" class="nav-link">
								<i class="la la-users"></i>
								<div data-i18n="Pelanggan">Pelanggan</div>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Produk')?>" class="nav-link">
								<i class="la la-table"></i>
								<div data-i18n="Produk">Produk</div>
							</a>
                        </li>
                            <li class="nav-item">
							<a href="<?= base_url('Penjualan')?>" class="nav-link">
								<i class="la la-table"></i>
								<div data-i18n="Penjualan">Penjualan</div>
							</a>
                        </li>
				    </ul>
				</div>
			</div>
	
       