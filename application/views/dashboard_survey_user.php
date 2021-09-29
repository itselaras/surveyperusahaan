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
                            <h3 class="mt-0 header-title text-center" style="margin-bottom: 30px;">Silakan Pilih Perusahaan Anda</h3>
                            
                            <div class="text-center">
                            <a  href="<?php echo site_url('survey_controller/pdam_start')?>" id="survey" class="btn-survey text-center">
                                <img style="position: relative;" src="<?php echo base_url('assets/images/pdam_surya.png');?>" alt="pdam-logo" class="tes-logo"/>
                            </a>
                            </div>

                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>

            </div>
        <!-- end row -->
        </div>
        
    </div>