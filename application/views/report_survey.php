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
                                            <form method="post" action="<?php echo site_url('survey_controller/report_hasil');?>">
                                            <div class="row" style="padding: 20px 0px;">

                                                <label class="col-sm-2 col-form-label">Pilih Perusahaan</label>
                                                <div class="col-md-10 text-right">
                                                    <select name="perusahaan" class="form-control" value ="<?php echo empty($perusahaan) ? '' : $sek;?>">
                                                        <option>-- Daftar Perusahaan --</option>
                                                        <?php foreach ($perusahaan as $se):?>
                                                        <option value="<?php echo $se->id;?>"><?php echo $se->nama_perusahaan;?></option>
                                                        <?php endforeach?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 text-left" style="padding-top: 10px; padding-bottom: 20px;">
                                                </div>
                                                <div class="col-md-10 text-left" style="padding-top: 10px; padding-bottom: 20px;">
                                                    <button class="btn btn-rounded btn-success waves-effect waves-light" type="submit">
                                                    <span class="btn btn-rounded btn-success waves-effect waves-light">OK                 
                                                    </span>
                                                    </button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                            </form>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                    </div>
                </div>
            </div>