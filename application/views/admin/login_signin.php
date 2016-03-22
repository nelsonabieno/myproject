<?php $this->load->view('admin/header'); ?>
<!-- start: BODY -->
	<body class="login">
		<!-- start: LOGIN -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">

                <?php


                if ($this->session->flashdata('login_failed')) {
                    echo " <h1><p class='text-danger text-center'>" . $this->session->flashdata('login_failed') . "</p></h1>";
                }
                if ($this->session->flashdata('errors')) {
                    echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('errors') . "</p></h1>";


                }




                ?>

				<div class="logo margin-top-30">
					<img src="<?php echo base_url('assets/images/logo.png');?>" alt="QuranCom Admin"/>
				</div>
				<!-- start: LOGIN BOX -->
				<div class="box-login">
					<form class="form-login" action="<?php echo base_url('users/confirmAdmin'); ?>" method="post">
						<fieldset>
							<legend>
								<strong>Admin Login Panel</strong>
							</legend>
							<p>
								Please enter your name and password to log in.
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Username">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									<a class="forgot" href="#">
										I forgot my password
									</a> </span>
							</div>
							<div class="form-actions">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="remember" value="1">
									<label for="remember">
										Keep me signed in
									</label>
								</div>
								<button type="submit" class="btn btn-primary pull-right">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>

						</fieldset>
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
						&copy; <span class="current-year">2016</span><span class="text-bold text-uppercase"> Qurancom</span>. <span>All rights reserved</span>
					</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: LOGIN BOX -->
			</div>
		</div>
		<!-- end: LOGIN -->


			</body>
	<!-- end: BODY -->
</html>