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
                                            
                                            <div class="row" style="padding: 20px 0px;">
                                                <div class="col-md-12 text-right">
                                                    <a class="pull-right" href="<?php echo site_url('survey_controller/create_perusahaan');?>">
                                                    <span class="btn btn-rounded btn-success waves-effect waves-light">
                                                        <i class="ti-plus"></i> Tambah Perusahaan                 

                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            <table id="datatable-report" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Kode Perusahaan</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;?>
                                                <?php foreach ($sek as $se): ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <?php $i++;?>
                                                <td><?php echo $se->nama_perusahaan;?></td>
                                                <td><?php echo $se->kode_perusahaan;?></td>
                                                <td class="text-center"><a class="btn btn-rounded btn-warning waves-effect waves-light" href="<?php echo site_url('survey_controller/edit/'.$se->id)?>">Edit</a>
                                                                        <a class="btn btn-rounded btn-danger waves-effect waves-light" href="<?php echo site_url('survey_controller/delete/'.$se->id)?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        
            
                                            <div id="morris-area-example" class="dashboard-charts morris-charts"></div>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
                
                <script>
                $(document).ready(function () { 
                    $("#datatable-buttons").table2excel({ 
                        filename: "Students.xls" 
                    }); 
                 }); 
                </script>

                <footer class="footer">
                        © 2021 Crafted with <i class="mdi mdi-heart text-danger"></i> by SMI IT Team</span>.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->