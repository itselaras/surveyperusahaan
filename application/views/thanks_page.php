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
                  <a class="nav-link" href="<?php echo site_url('survey_controller/logout')?>">Keluar</a>
                </li>
              </ul>
            </div>
        </div>

	</nav>
    <div class="wrapper" style="padding-top: 150px; padding-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="padding: 20px 0px 20px 0px;">
                        <div class="card-body text-center">
                            <h3 class="mt-0 header-title text-center" style="margin-bottom: 5px;" id="soal">Terima Kasih Anda telah Menyelesaikan Survey</h3>
                            <h1><i class="fas fa-check-circle text-success fa-2x mb-4"></i></h1>
                            <div class="text-center">
                                Selamat <b>NIP</b> <span class="text-success"><b>19988828910</b></span> Telah Menyelesaikan Survey Pada Tanggal 1 Oktober 2021
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <!-- end row -->
        </div>
        
    </div>
</body>