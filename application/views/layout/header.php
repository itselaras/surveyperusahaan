<!--
Author: WebThemez
Author URL: http://webthemez.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Survey Perusahaan</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/9206474aa9.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.css')?>" media="screen"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
    <link rel='stylesheet' id='camera-css'  href="<?php echo base_url('assets/css/camera.css')?>" type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
	    <div class="container-fluid my-3 mx-3">
            <a class="navbar-brand" href="<?php echo site_url('survey_controller/index')?>">
                <img src="<?php echo base_url('assets/images/logo.png')?>" style="width: 100px; margin-top: -20px;" alt="Techro HTML5 template">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="<?php echo site_url('survey_controller/index')?>">Beranda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">Tentang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('survey_controller/dashboard_survey_user')?>">Survey</a>
                </li>
                <?php if ($this->session->logged_in){?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('survey_controller/dashboard_survey')?>">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('survey_controller/logout')?>">Logout</a>
                </li>
                <?php } else {?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo site_url('survey_controller/login')?>">Login</a>
                </li>
                <?php }?>
              </ul>
            </div>
        </div>

	</nav>
	
	
	
	
	
	
