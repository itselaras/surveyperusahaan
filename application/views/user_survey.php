<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid" style="padding-top: 30px;">

                        <div class="row">
            
                                <div class="col-xl-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                            
                                            <form method="post" action="<?php echo site_url('survey_controller/user_survey');?>">
                                            <div class="row" style="padding: 20px 0px;">
                                                <label class="col-sm-2 col-form-label">Pilih Perusahaan</label>
                                                <div class="col-md-10 text-right">
                                                    <select name="perusahaan" class="form-control">
                                                        <option>-- Daftar Perusahaan --</option>
                                                        <?php foreach ($perusahaan as $se):?>
                                                        <option value="<?php echo $se->id;?>" <?php echo $se->id == $sek ? 'selected' : '';?> ><?php echo $se->nama_perusahaan;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                    </a>
                                                </div>
                                                <div class="col-md-2 text-left" style="padding-top: 10px; padding-bottom: 20px;">
                                                </div>
                                                    <div class="col-md-10 text-left" style="padding-top: 10px; padding-bottom: 20px;">
                                                        <button class="btn btn-rounded btn-success waves-effect waves-light" href="<?php echo site_url('survey_controller/create_perusahaan');?>">
                                                        <span class="btn btn-rounded btn-success waves-effect waves-light">OK                 
                                                        </span>
                                                        </button>
                                                    </div>
                                            </div>
                                            </form>
                                            
                                            <?php if (isset($sek)):?>
                                            <div class="row" style="padding: 20px 0px;">
                                                <div class="col-md-12 text-right">
                                                    <a class="pull-right" href="<?php echo site_url('survey_controller/generate/'.$sek);?>">
                                                    <span class="btn btn-rounded btn-success waves-effect waves-light">
                                                        <i class="ti-plus"></i> Generate User                 

                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php endif;?>
                                            <?php if (isset($user)):?>
                                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Password</th>
                                                <th>Nama Peserta</th>
                                                <th>Nama Perusahaan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;?>
                                                <?php foreach ($user as $us): ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <?php $i++;?>
                                                <td><?php echo $us->username;?></td>
                                                <td><?php echo $us->password;?></td>
                                                <td><?php echo $us->nama;?></td>
                                                <td><?php echo $us->nama_perusahaan;?></td>
                                            </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <?php endif;?>
                                        
            
                                            
                                    </div>
                                </div>
            
                            </div>
                            <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
                
                <script>
                $(document).ready(function() {
                    $('#datatable').DataTable();
                    
                    //Buttons examples
                    var table = $('#datatable-buttons').DataTable({
                        lengthChange: false,
                        buttons: ['copy', 'excel', 'colvis'],
                    });
                
                    table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
                } ); 
                </script>

                <footer class="footer">
                        © 2021 Crafted with <i class="mdi mdi-heart text-danger"></i> by SMI IT Team</span>.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->