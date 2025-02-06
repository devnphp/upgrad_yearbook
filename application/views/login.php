<!DOCTYPE HTML>
<html>
<head>
<title>Upgrade</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel = "icon" href ="<?php echo base_url()?>assets/front_end/image/favicon.png"  type = "image/x-icon">
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="<?php echo base_url()?>assets/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS-->
<link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

 <!-- side nav css file -->
 <link href='<?php echo base_url()?>css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
 
<!-- Metis Menu -->
<script src="<?php echo base_url()?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body>
<div class="main-content">

		<?php 
			$kk=base_url()."settingpic/logo.svg";

			// echo $kk ;
		?>
		<!-- <img src="<?php echo $kk; ?>" class="img-thumbnail" alt="Logo"> <?php //exit; ?> -->
		<div id="page-wrapper">
				<div class="col-sm-4 col-sm-offset-4" style="padding-left:12%;">
					
					 <img src="<?php echo $kk; ?>"  alt="Logo" width="110px" height="100px;">
				</div>
				<div style="clear: both"></div>
			<div class="main-page login-page ">
				
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="<?php echo site_url()?>admin/adminlogin" method="post">
							<?php if(isset($paaserror))
								{?>
									<div class="custom"> <?php echo $paaserror ;?></div>
					  	 <?php } ?>
							<input type="email" class="user" name="user" placeholder="Enter Your Email" required="" autocomplete="off" value="<?php echo set_value('user'); ?>">
							
							<?php if(form_error('user'))
							{?>
								<div class="error" style="color:red">
  									<?php echo form_error('password');?>
  								</div> 
					 <?php  };?>
							<input type="password" name="password" class="lock" placeholder="Password" required=""value="<?php echo set_value('password'); ?>">
							<?php if(form_error('password'))
							{?>
								<div class="custom"> <?php echo strip_tags(form_error('password'));?></div>
  								
					 <?php  };?>
						
							<div class="clearfix"> </div>
							<input type="submit" name="Sign In" value="Sign In">
							<div class="registration">
							
							</div>
						</form>
					</div>
				</div>
				
			</div>
		
		
	</div>
</div>
	
	<!-- side nav js -->
	
   
</body>
</html>