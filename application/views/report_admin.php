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
                                            <form method="post" action="<?php echo site_url('welcome/report_admin');?>">
                                            <div class="row" style="padding: 20px 0px;">

                                                <label class="col-sm-2 col-form-label">Pilih Sekolah</label>
                                                <div class="col-md-10 text-right">
                                                    <select name="sekolah" class="form-control" value ="<?php echo empty($sek) ? '' : $sek;?>">
                                                        <option>-- Daftar Sekolah --</option>
                                                        <?php foreach ($sekolah as $se):?>
                                                        <option value="<?php echo $se->sekolah_id;?>" <?php echo $se->sekolah_id == $sek ? 'selected' : '';?>><?php echo $se->nama_sekolah;?></option>
                                                        <?endforeach?>
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
                                                
                                                <label class="col-sm-2 col-form-label">Tipe Tes</label>
                                                <div class="col-md-10 text-center">
                                                <?php if (isset($alat)):?>
                                                <?foreach ($alat as $al):?>
                                                    <a class="btn btn-rounded btn-primary waves-effect waves-light" href="<?php echo site_url('welcome/report_hasil/'.$al->nama_alat.'/'.$sek);?>">
                                                    <span class="btn btn-rounded btn-primary waves-effect waves-light"><?php echo $al->nama_alat;?>                 
                                                    </span>
                                                    </a>
                                                <?php endforeach?>
                                                <?php endif?>
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