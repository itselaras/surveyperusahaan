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
                                            <h4 class="mt-0 header-title">Tambah Batch</h4>
                                            <form method="post" action="<?php echo ($submit == 'create') ? site_url('survey_controller/submit_batch/'.$id_peru) : site_url('survey_controller/update_batch/'.$batch->id_batch) ?>">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Enrollment Key</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="kode" id="kode" value="<?php echo (isset($batch)) ? $batch->enroll : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="tanggal" type="datetime-local" id="tanggal" value="<?php echo (isset($batch)) ? date('Y-m-d\TH:i', strtotime($batch->start)) : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Durasi (jam)</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="durasi" type="number" id="durasi" value="<?php echo (isset($batch)) ? round((strtotime($batch->end) - strtotime($batch->start))/3600, 1) : '' ?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Link Survey</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="link" id="link" value="<?php echo (isset($batch)) ? $batch->link : '' ?>">
                                                    </div>
                                                </div>
                                            <button type="submit" class="btn btn-primary"><?php echo ($submit == 'create') ? 'Submit' : 'Update' ?></button>
                                            </form>
                                            
                                            <div id="morris-area-example" class="dashboard-charts morris-charts"></div>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
                            <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->