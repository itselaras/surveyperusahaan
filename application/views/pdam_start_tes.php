    <div class="wrapper" style="padding-top: 90px;">

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

                        <div class="card-body pdam-input">

                            <form method="post" action="<?php echo site_url('survey_controller/user_verification')?>">

                                <div class="text-center mb-4">

                                    <img style="position: relative;" src="<?php echo base_url('assets/images/pdam_surya.png');?>" alt="pdam-logo" width="150"/>

                                </div>

                                <h3 class="mt-3 header-title text-center" style="margin-bottom: 30px;">Selamat Datang Di Survey PDAM</h3>

                                

                                <div class="input-group mb-3 nip-input">

                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-badge me-2"></i> NIP</span>

                                  <input type="text" class="form-control" placeholder="Masukan NIP Anda" aria-label="Username" aria-describedby="basic-addon1" name="nip">

                                </div>

                                <div class="text-center mb-4">

                                    <button type="submit" class="btn btn-primary btn-sm">Masuk <i class="fas fa-sign-in-alt ms-1"></i></button>

                                </div>

                                

                            </form>

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