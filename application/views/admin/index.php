<?php $this->load->view('admin/header'); ?>
<!-- end: HEAD -->
<body>
		<div id="app">
          <?php  if ($this->session->flashdata('login_success')) {
            echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('login_success') . "</p></h1>";


            }?>
			<!-- sidebar -->
			<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<nav>
						<!-- start: SEARCH FORM -->
						<div class="search-form">
							<a class="s-open" href="#">
								<i class="ti-search"></i>
							</a>
							<form class="navbar-form" role="search">
								<a class="s-remove" href="#" target=".navbar-form">
									<i class="ti-close"></i>
								</a>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search...">
									<button class="btn search-button" type="submit">
										<i class="ti-search"></i>
									</button>
								</div>
							</form>
						</div>
						<!-- end: SEARCH FORM -->
						<!-- start: MAIN NAVIGATION MENU -->
						<div class="navbar-title">
							<span>Main Navigation</span>
						</div>
						<ul class="main-navigation-menu">
							<li class="active open">
								<a href="<?php echo base_url('users/adminHome');?>">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Dashboard </span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('users/manageUsers');?>">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-settings"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Users </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="">
											<span class="title"> Manage Users </span>
										</a>
									</li>

								</ul>
							</li>

							<li>
								<a href="<?php echo base_url('users/manageVideos');?>">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Videos </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="form_elements.html">
											<span class="title">Manage Videos</span>
										</a>
									</li>								

								</ul>
							</li>
							<li>
								<a href="<?php echo base_url('users/manageAdmin');?>">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Admin Management   </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="login_signin.php">
											<span class="title"> Login Form </span>
										</a>
									</li>
									<li>
										<a href="login_registration.html">
											<span class="title"> Registration Form </span>
										</a>
									</li>
									<li>
										<a href="login_forgot.php">
											<span class="title"> Forgot Password Form </span>
										</a>
									</li>
									<li>
										<a href="login_lockscreen.html">
											<span class="title">Lock Screen</span>
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-layers-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Recitations </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="pages_user_profile.html">
											<span class="title">Manage Recitations</span>
										</a>
									</li>

								</ul>
							</li>

                            <li>
                                <a href="">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-layers-alt"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Logout </span><i class="icon-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="pages_user_profile.html">
                                            <span class="title">Manage Recitations</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>

						</ul>
						<!-- end: CORE FEATURES -->

					</nav>
				</div>
			</div>






			<!-- / sidebar -->
            <?php $this->load->view('admin/footer');?>

		</div>

	</body>
</html>
