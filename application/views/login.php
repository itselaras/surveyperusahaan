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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.css')?>" media="screen"> 
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
    <link rel='stylesheet' id='camera-css'  href="<?php echo base_url('assets/css/camera.css')?>" type='text/css' media='all'> 
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Fixed navbar -->
	<div style="z-index: 100; right: 0px; left: 0px;" class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="<?php echo site_url('welcome/index')?>">
					<img src="<?php echo base_url('assets/images/logo.png')?>" style="width: 100px; margin-top: -20px;" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active"><a href="<?php echo site_url('welcome/index')?>">Beranda</a></li>
					<li><a href="#about">Tentang</a></li>
					<li><a class="logbut" href="<?php echo site_url('welcome/login')?>">Login</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

    <div class="wrapper-page" style="padding:20px; position: relative;">
        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url('assets/images/logo.png')?>" height="35" alt="logo"></a>
                </h3>
                
                <?php if($this->session->flashdata('error'))
                    {
                    echo 
                    '<div class="alert alert-danger" style="margin: 0 30px;">'
                      . $this->session->flashdata('error').
                    '</div>';
                    }else if($this->session->flashdata('success'))
                    {
                      echo 
                    '<div class="alert alert-success" style="margin: 0 30px;">'
                      . $this->session->flashdata('success').
                    '</div>'; 
                    }
                    ?>
                
                <div style="padding: 30px;">
                    <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang</h4>
                    <p class="text-muted text-center">Silahkan masukkan user dan password.</p>

                    <form class="form-horizontal" style="margin-top: 30px;" method="POST" action="<?php echo site_url('survey_controller/login_attempt')?>">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Enter password">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" onclick="myFunction()">
                            <label class="custom-control-label" for="customControlInline">Show Password</label>
                        </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                            <div class="col-12" style="padding: 20px;">
                                <a id="myBtn" href="#" class="text-muted"><i class="mdi mdi-lock"></i>Daftar Sekarang</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- The Modal -->
        <div id="myModal" class="modal" style="
          display: none;
          position: fixed;
          z-index: 100000;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4);">
        
          <!-- Modal content -->
          <div class="modal-content" style="
          background-color: #fefefe;
              margin: 15% auto;
              padding: 20px;
              border: 1px solid #888;
              width: 50%; ">
            <span class="close">&times;</span>
            <div style="padding: 30px;">
                    <h4 class="text-muted font-18 m-b-5 text-center">Verifikasi - Masukkan Kode Perusahaan</h4>
            <form class="form-horizontal" style="margin-top: 30px;" method="POST" action="<?php echo site_url('survey_controller/verif_attempt')?>">

                        <div class="form-group">
                            <input type="text" class="form-control" name="kode_perusahaan" id="kode_perusahaan" placeholder="Kode Perusahaan">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-6 text-center">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">OK</button>
                            </div>
                        </div>
                    </form>
                </div>
          </div>
        
        </div>
    </div>
    
    <script>
                // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on the button, open the modal
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
            </script>

        
        <script>
            function myFunction() {
              var x = document.getElementById("userpassword");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script>
	