

    <div class="wrapper" style="padding-top: 150px;">
        <div class="container">
            
            <?php if($this->session->flashdata('error'))
                    {
                    echo 
                    '<div class="alert alert-danger" style="margin: 20px 30px;">'
                      . $this->session->flashdata('error').
                    '</div>';
                    }else if($this->session->flashdata('success'))
                    {
                      echo 
                    '<div class="alert alert-success" style="margin: 20px 30px;">'
                      . $this->session->flashdata('success').
                    '</div>'; 
                    }
                    ?>
            
            <div class="row">

                <div class="col-md-12">
                    <div class="card" style="padding: 20px;">
                        <div class="card-body">
                            <h3 class="mt-0 header-title text-center" style="margin-bottom: 30px;">Mulai Survey</h3>
                            
                            <div class="text-center">
                            <button style="border: none; background-color: transparent; width:250px; margin-bottom: 30px;" <?php echo empty($check_attempt) ? 'href=#' : 'href='.site_url('survey_controller/start');?>
                                id="survey" class="btn-survey text-center tes-logo w-md waves-effect waves-light">
                                <img style="position: relative;" src="<?php echo base_url('assets/images/pdam_surya.png');?>" alt="" />
                            </button>
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
                    </hr>
                    
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
                    <button id="btnPakta" class="btn btn-primary w-md waves-effect waves-light btn-pakta col-6" style="margin-bottom: 20px;" >Setuju</button>
                    <a href="<?php echo site_url('survey_controller/logout')?>" class="btn btn-danger w-md waves-effect waves-light btn-cfit col-6" style="margin-bottom: 20px;">Tidak Setuju</a>
                </div>
            </div>
          </div>
          </div>
          
          <?php $dateTime = new DateTime();
$dateTime->modify('+ 90 seconds');
$timestamp = $dateTime->getTimestamp();
?>
        
        </div>
        
        <!-- The Modal -->
        <div id="enrollModal" class="modal" style="
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
              width: 75%; ">
            <span class="close">&times;</span>
            <div style="padding: 30px;">
                    <h4 class="text-muted font-18 m-b-5 text-center">Verifikasi - Masukkan Kode Batch</h4>
            <form class="form-horizontal" style="margin-top: 30px;" method="POST" action="<?php echo site_url('survey_controller/enroll_attempt')?>">

                        <div class="form-group">
                            <input type="text" class="form-control" name="enroll" id="enroll" placeholder="Kode Batch">
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
        
        $("#btnPakta").click(function(){
            $.ajax({
                  type: 'POST',
                  dataType: 'JSON',
                  url:'<?=base_url()?>index.php/Survey_controller/check_start',
                  success: function(data1)
                  {
                    if (data1 === true)
                    {
                        
                    }else
                    {
                        alert('Tes Belum Dimulai');
                        window.location.replace("<?=base_url()?>index.php/Survey_controller/logout");
                    }
                  }
                });
            $.ajax({
                  type: 'POST',
                  dataType: 'JSON',
                  url:'<?=base_url()?>index.php/Survey_controller/check_end',
                  success: function(data1)
                  {
                    if (data1 === true)
                    {
                        
                    }else
                    {
                        alert('Tes Sudah Berakhir');
                        window.location.replace("<?=base_url()?>index.php/Survey_controller/logout");
                    }
                  }
                });
            $.ajax({url: '<?=base_url()?>index.php/Survey_controller/set_pakta'});
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
                // Get the modal
        var modall = document.getElementById("enrollModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("survey");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on the button, open the modal
        btn.onclick = function() {
          modall.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modall.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modall) {
            modall.style.display = "none";
          }
        }
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
                
            });
            
            $(document).ready(function(){
                
            });
            
            function setTimer()
            {
              $(".btn-survey").click(function(){
                $.ajax({url: '<?=base_url()?>index.php/Survey_controller/set_timer',
                    success:function() {
                      window.location.href = '<?=base_url()?>index.php/Survey_controller/start' 
                    }
                });
                
              });
            }

        </script>
        
      