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
                                            <h4 class="mt-0 header-title">Tambah Sekolah</h4>
                                            <form method="post" action="<?php echo ($submit == 'create') ? site_url('welcome/submit_sekolah') : site_url('welcome/update_sekolah/'.$sekolah->sekolah_id) ?>">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="sekolah" id="sekolah" value="<?php echo (isset($sekolah)) ? $sekolah->nama_sekolah : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Alamat Sekolah</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="alamat" id="alamat" value="<?php echo (isset($sekolah)) ? $sekolah->alamat : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Kode Sekolah</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="kode" id="kode" value="<?php echo (isset($sekolah)) ? $sekolah->kode_sekolah : '' ?>">
                                                    </div>
                                                </div>                                                
                                                <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Alat Tes</label>
                                                 <div class="col-sm-10">
                                                <select name="alat[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Silahkan Pilih ...">
                                                        <option value="RMIB">RMIB</option>
                                                        <option value="CFIT">CFIT</option>
                                                </select>
                                                </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="tanggal" type="datetime-local" id="tanggal" value="<?php echo (isset($sekolah)) ? date('Y-m-d\TH:i', strtotime($sekolah->start)) : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label">Durasi (jam)</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name="durasi" type="number" id="durasi" value="<?php echo (isset($sekolah)) ? round((strtotime($sekolah->end) - strtotime($sekolah->start))/3600, 1) : '' ?>" >
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