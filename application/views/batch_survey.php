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
                                            
                                            <form method="post" action="<?php echo site_url('survey_controller/batch');?>">
                                            <div class="row" style="padding: 20px 0px;">
                                                <label class="col-sm-2 col-form-label">Pilih Perusahaan</label>
                                                <div class="col-md-10 text-right">
                                                    <select name="perusahaan" class="form-control">
                                                        <option>-- Daftar Perusahaan --</option>
                                                        <?php foreach ($perusahaan as $se):?>
                                                        <option value="<?php echo $se->id;?>" <?php echo $se->id == $id_peru ? 'selected' : '';?> ><?php echo $se->nama_perusahaan;?></option>
                                                        <?php endforeach?>
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
                                            
                                            <?php if (!empty($id_peru)) :?>
                                            <div class="row" style="padding: 20px 0px;">
                                                <div class="col-md-12 text-right">
                                                    <a class="pull-right" href="<?php echo site_url('survey_controller/create_batch/'.$id_peru);?>">
                                                    <span class="btn btn-rounded btn-success waves-effect waves-light">
                                                        <i class="ti-plus"></i> Tambah Batch                 

                                                    </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php endif ?>

                                            <?php if (isset($peru)):?>
                                            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Enrollment Key</th>
                                                <th>Tanggal Survey</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;?>
                                                <?php foreach ($peru as $pe): ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <?php $i++;?>
                                                <td><?php echo $pe->enroll;?></td>
                                                <td><?php echo $pe->tanggal;?></td>
                                                <td class="text-center"><a class="btn btn-rounded btn-warning waves-effect waves-light" href="<?php echo site_url('survey_controller/edit_batch/'.$pe->id_batch);?>">Edit</a>
                                                                        <a class="btn btn-rounded btn-danger waves-effect waves-light" href="<?php echo site_url('survey_controller/delete_batch/'.$pe->id_batch);?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <?php endif?>
                                        
            
                                            
                                    </div>
                                </div>
            
                            </div>
                            <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
                
                <script>
                $(document).ready(function() {
                    $('#datatable').DataTable();
                });
                </script>

                <footer class="footer">
                        © 2021 Crafted with <i class="mdi mdi-heart text-danger"></i> by SMI IT Team</span>.
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->