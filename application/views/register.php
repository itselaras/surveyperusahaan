
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
	<title>Psikotes Sekolah</title>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
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


<div class="wrapper-page" style="max-width: 860px; position: relative;">
        <div class="card">
            <div class="card-body">


                <h3 class="text-center m-0">
                    <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url('assets/images/logo.png')?>" height="80" alt="logo"></a>
                </h3>
                
                <?php if($this->session->flashdata())
                    {
                    echo 
                    '<div class="alert alert-success" style="margin: 0 30px;">'
                      . $this->session->flashdata('error').
                    '</div>';
                    }
                    ?>
                
                <div style="padding: 30px;">
                    <h4 class="text-left">
                        Nama Sekolah : <?php echo $this->session->nama_sekolah;?>
                    </h4>
                    <h4 class="text-muted font-18 m-b-5 text-center">Registrasi</h4>
                    <p class="text-muted text-center">Silahkan masukkan data anda.</p>
                <form name="form" action="<?php echo site_url('welcome/register_attempt')?>" id="loginF" method="post">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="username">Nama Pengguna</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna"
                        Required>
                        <span id="availablity" style="color: blue;"></span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="password">Kata Sandi</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi"
                        Required>
                        <!-- An element to toggle between password visibility -->
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" Required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="tgl_lahir">Tanggal Lahir (YYYY-MM-DD)</label>
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="1997-12-03"
                        Required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="jk">Jenis Kelamin</label>
                      <select id="jk" name="jk" class="form-control" Required>
                        <option selected>Pria</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="contoh@psikotes.com"
                        Required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="telp">No Telepon</label>
                      <input type="text" class="form-control" id="telp" name="telp" placeholder="08xxxxxxxxx">
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" Required>
                  </div>
                  
                  <input name="id_sekolah" type="hidden" value="<?php echo $this->session->id_sekolah;?>">
                  
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success text-center" name="submit">Daftar</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
        <script>
            function myFunction() {
              var x = document.getElementById("password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
            </script>
            
            <script>
            $('document').ready(function(){
                  $('#username').keyup(function(){
                       var username = $(this).val();
                        $.ajax ({
                            url : '<?=base_url()?>index.php/Welcome/check_user',
                            method : "POST",
                            data :  {username :username },
                            dataType: "text",
                            success:function(html)
                            {
                                $('#availablity').html(html);
                            }
                        });
                    });
                
           });
        </script>