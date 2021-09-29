

    <div class="wrapper" style="padding-top: 150px;">
        <div class="container">
            
            <div class="row">
                
                <div class="col-md-4">
                    
                    <h3 class="mt-0 header-title text-center" style="margin-bottom: 30px; margin-top: 40px;">Daftar Alat Tes</h3>
                    
                    <?php var_dump($check_attempt);?>
                    
                    <div class="col-md-12">
                   
                    <div class="col-md-6 text-center logo-tes" style="margin-bottom: 30px;">
                            <a style="border: none;" <?php echo empty($check_attempt) ? 'href=#' : 'href='.site_url('survey_controller/start_survey');?> 
                                id="survey" class="tes-logo w-md waves-effect waves-light"><img style="position: relative;" src="<?php echo base_url($al->logo);?>" alt="" /><img style="position: absolute; top: 10%; left: 20%; width: 20%;" src="<?php echo empty($check_attempt) ? base_url('assets/images/check.png') : ''; ?>" alt="" /></a>
                            <h4 class="text-center">Survey</h4>
                    </div>
                    </div>

                </div>

                <div class="col-md-8">
                    <div class="card" style="padding: 20px;">
                        <div class="card-body">
                            <h3 class="mt-0 header-title text-center" style="margin-bottom: 30px;">Profil Pengguna</h3>

                            <div class="row">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-12 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-8 ">
                                        <input class="form-control text-center" type="text" value="<?php echo $soal->nama;?>" id="nama_lengkap" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-8 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-center" type="text" value="<?php echo $soal->email;?>" id="email" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-8 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-center" type="text" value="<?php echo $soal->jk;?>" id="jen_kel" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-8 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-center" type="text" value="<?php echo $soal->tgl_lahir;?>" id="tgl_lahir" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-8 col-form-label">No HP</label>
                                    <div class="col-sm-8">
                                        <input class="form-control text-center" type="text" value="<?php echo $soal->telp;?>" id="telp" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-sm-8 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <text area class="form-control form-control-lg text-center" type="text" id="example-text-input" disabled><?php echo $soal->alamat;?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>

            </div>
        <!-- end row -->
        </div>

        
        <!-- The Modal CFIT -->
        <div id="CFITBtnmodal" class="modal" style="
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
                    <h4 class="text-muted font-18 m-b-5 text-center">TES CFIT</h4>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Tekan tombol <b>Lanjutkan</b> untuk masuk ke Tes CFIT.
                    </p>
                        </br>
                        </br>


                <a href="<?php echo site_url('welcome/contoh_cfit_1')?>" class="btn btn-primary w-md waves-effect waves-light btn-cfit">Lanjutkan</a>
            </div>
          </div>
          </div>
          
          <!-- The Modal Pakta -->
        <div id="modalPakta" class="modal" style="
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
              padding: 30px;
              border: 1px solid #888;
              width: 75%; ">
            <div>
                    <h4 class="text-muted font-18 m-b-5 text-center">PAKTA INTEGRITAS</h4>
                    <hr>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Dengan ini saya menyatakan bahwa :<br>
                        1.	Mematuhi seluruh prosedur pelaksanaan pemeriksaan psikologis online yang dilaksanakan oleh PT Selaras Mitra Integra selaku vendor penyelenggara psikotes online dari PT Selaras Mitra Integra.<br>
                        2.	Bersedia untuk menjaga kerahasiaan alat dan proses pemeriksaan psikologis online.<br>
                        3.	Tidak akan menggandakan dan atau menyebarluaskan alat pemeriksaan psikologis online dari PT Selaras Mitra Integra dengan cara apapun (baik foto, video rekaman, screenshoot, atau mencatat manual).<br>
                        4.	Apabila melanggar hal-hal yang yang dinyatakan dalam pakta integritas ini, maka saya bersedia untuk :<br>
                        &nbsp;&nbsp;&nbsp;a.	Bersedia menerima sanksi, baik sanksi administrasi atau bahkan sanksi pidana jika diperlukan, sesuai dengan ketentuan perundang-undanganan.<br>
                        &nbsp;&nbsp;&nbsp;b.	Menerima sanksi sebagai pihak yang akan dimasukan ke dalam daftar hitam PT Selaras Mitra Integra.<br>
                        &nbsp;&nbsp;&nbsp;c.	Menerima segala bentuk gugatan dan/ atau tuntutan dari PT Selaras Mitra Integra selaku pihak yang dirugikan.<br>
                    </p>
                        </br>
                        </br>


                <div class="text-center row">
                    <button id="btnPakta" class="btn btn-primary w-md waves-effect waves-light btn-pakta col-6">Setuju</button>
                    <a href="<?php echo site_url('survey_controller/logout')?>" class="btn btn-danger w-md waves-effect waves-light btn-cfit col-6">Tidak Setuju</a>
                </div>
            </div>
          </div>
          </div>
          
          <?php $dateTime = new DateTime();
$dateTime->modify('+ 90 seconds');
$timestamp = $dateTime->getTimestamp();
?>
        
        </div>
    </div>
    
    <script>
                // Get the modal
        var modal;

        $(document).ready(function(){
            modal = document.getElementById('modalPakta');
            $('#modalPakta').modal({backdrop: 'static', keyboard: false});
            $('#modalPakta').modal('show');
        });
        
        $("#btnPakta").click(function(){
            $('#modalPakta').modal('toggle');
        });

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
       /* window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        } */
    </script>
    
        <script>
        $(document).ready(function(){
          $(".btn-rmib").click(function(){
            $.ajax({url: '<?=base_url()?>index.php/Welcome/delete_rmib'});
          });
        });
        </script>
        
        <script>
        $(document).ready(function(){
          $(".btn-cfit").click(function(){
            $.ajax({url: '<?=base_url()?>index.php/Welcome/delete_cfit'});
          });
        });
        
        $(document).ready(function(){
                $.ajax({
                  type: 'POST',
                  dataType: 'JSON',
                  url:'<?=base_url()?>index.php/Welcome/check_start',
                  success: function(data1)
                  {
                    if (data1 === true)
                    {
                        
                    }else
                    {
                        alert('Tes Belum Dimulai');
                        window.location.replace("<?=base_url()?>index.php/Welcome/login");
                    }
                  }
                });
            });
            
            $(document).ready(function(){
                $.ajax({
                  type: 'POST',
                  dataType: 'JSON',
                  url:'<?=base_url()?>index.php/Welcome/check_end',
                  success: function(data1)
                  {
                    if (data1 === true)
                    {
                        
                    }else
                    {
                        alert('Tes Sudah Berakhir');
                        window.location.replace("<?=base_url()?>index.php/Welcome/login");
                    }
                  }
                });
            });
            
        </script>
        
      