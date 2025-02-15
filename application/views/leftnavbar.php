<!DOCTYPE HTML>
<html>
<head>
<title>Upgrad | Dashboard :: Upgrad</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="<?php echo base_url()?>assets/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='<?php echo base_url()?>assets/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="<?php echo base_url()?>assets/js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="<?php echo base_url()?>assets/js/metisMenu.min.js"></script>
<script src="<?php echo base_url()?>assets/js/custom.js"></script>
<link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="<?php echo base_url()?>assets/js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

  <!-- requried-jsfiles-for owl -->
          <link href="<?php echo base_url()?>assets/css/owl.carousel.css" rel="stylesheet">
          <script src="<?php echo base_url()?>assets/js/owl.carousel.js"></script>
            <script>
              $(document).ready(function() {
                $("#owl-demo").owlCarousel({
                  items : 3,
                  lazyLoad : true,
                  autoPlay : true,
                  pagination : true,
                  nav:true,
                });
              });
            </script>
          <!-- //requried-jsfiles-for owl -->
</head> 
<body class="cbp-spmenu-push">
  <div class="main-content">
  <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <!--left-fixed -navigation-->
    <aside class="sidebar-left">
      <nav class="navbar navbar-inverse" style="overflow: scroll; width: 100%; height: 100%;">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="<?php echo base_url()?>">
              <a class="navbar-brand" href="<?php echo base_url()?>admin" style="padding: 0px !important;">
              <span>

            </span>
              <?php  $sessiontrue=$this->session->userdata();?>
                            <img src="<?php echo base_url()?>settingpic/logo.svg" style="width:130s%; height: 120%;"/></span>
              <span class="dashboard_text">Upgrad</span>
            </a>
            </a></h1>
          </div> <?php $level2 = $this->uri->segment(2);
                       $level3 = $this->uri->segment(3);
                       $level4 = $this->uri->segment(4);
                   ?>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <!--  -->
             <!--   <li>
                    <a href="<?php echo site_url("dashboard/setting?sectionid=9")?>">
                    <i class="glyphicon glyphicon-th-list"></i> Covidaction Collab
                    </a>
                  </li> -->

               <li class="<?= ($level2=='yearbook') ? 'active':''?>">
                    <a href="<?php echo site_url("admin/yearbook")?>">
                    <i class="glyphicon glyphicon-th-list"></i>
                  <span>Yearbooks</span>
              
                </a>
                  </li>

                   <li class="<?= ($level2=='faculty') ? 'active':''?>">
                    <a href="<?php echo site_url("admin/faculty")?>">
                    <i class="glyphicon glyphicon-th-list"></i>
                  <span>Faculty</span>
              
                </a>
                  </li>

                   <li class="<?= ($level2=='studentsdata' && $level3 !='yearbook_students' && $level4 !='edit_yearbook_student') ? 'active':''?>">
                    <a href="<?php echo site_url("admin/studentsdata")?>">
                    <i class="glyphicon glyphicon-th-list"></i>
                  <span>Students</span>
              
                </a>
                  </li>

                   <li class="<?= ($level3 =='yearbook_students' || $level4 =='edit_yearbook_student') ? 'active':''?>">
                    <a href="<?php echo site_url("admin/studentsdata/yearbook_students")?>">
                    <i class="glyphicon glyphicon-th-list"></i>
                  <span>Yearbook Students</span>
              
                </a>
                  </li>
                 
           
            
            
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
  </div>
    <!--left-fixed -navigation-->