<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $this->header; ?>
		<?php echo $this->js; ?>
	</head>

	<body class="login-layout blur-login">
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '<?php echo $this->config->item("fb_appid"); ?>',
	      xfbml      : true,
	      version    : 'v2.6'
	    });
	  };
	
	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
		<div class="main-container">
			<div class="main-content">
				<div class="row">		
					<div class="col-sm-10 col-sm-offset-1">

								<h3 class='center'>
									<span class="purple"><?php echo $this->_setting->app_name; ?></span>
								</h3>

						<div class="login-container">
							<div class="center">
								<h4 class="blue" id="id-company-text">&copy; <?php echo $this->_setting->app_author; ?></h4>
								<img src='<?php echo base_url('media/img/'.$this->_setting->app_logo);?>' style='width:80px;'>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Masukkan Info Akun Anda
											</h4>
											<div class="alert alert-danger no-margin" style='display:none'><?php echo validation_errors(); ?></div>
											<div class="space-6"></div>


											<form method='post' action="<?php echo base_url('login'); ?>">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="user_id" class="form-control" placeholder="Username" required />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="user_pass" class="form-control" placeholder="Password" required />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input class="form-control" name='captcha' required placeholder="Masukkkan kode dibawah ini" type="text" onkeyup="javascript:this.value=this.value.toUpperCase()">
															<i class="ace-icon fa fa-exclamation-circle"></i>
														</span>
													</label>
													<label class="block clearfix">
														<center><?php echo $image;?></center>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<!--
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Ingat Saya</span>
														</label>
														-->
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
												<input type='hidden' name='time' value='<?php echo $time; ?>'>
												<input type='hidden' name='word' value='<?php echo $word; ?>'>
											</form>

											

										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<center>
										 		<b class="white smaller lighter bigger">
													&copy <?php echo date('Y');?>
													<br>
														Developed by <a href='<?php echo $this->_setting->app_developer_site; ?>' target='_blank' style='color:white'>
												 	<b><?php echo $this->_setting->app_developer; ?></b>
												</a>
											</b>	
											</center>
											<br>
											<!--
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													Saya lupa sandi
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													Saya ingin daftar
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
											-->
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								
							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>media/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<?php echo base_url(); ?>media/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
		<script>
       $( document ).ready(function() {
        var x = $('.alert').html();
        
        if(x !=''){
		  show_alert('.alert','danger',x);
        }
      });

</script>
	</body>
</html>
