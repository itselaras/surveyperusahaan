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
                                            
                                            <form method="post" action="<?php echo site_url('welcome/user_admin');?>">
                                            <div class="row" style="padding: 20px 0px;">
                                                <label class="col-sm-2 col-form-label">Pilih Sekolah</label>
                                                <div class="col-md-10 text-right">
                                                    <select name="sekolah" class="form-control">
                                                        <option>-- Daftar Sekolah --</option>
                                                        <?php foreach ($sekolah as $se):?>
                                                        <option value="<?php echo $se->sekolah_id;?>" <?php echo $se->sekolah_id == $sek ? 'selected' : '';?> ><?php echo $se->nama_sekolah;?></option>
                                                        <?endforeach?>
                                                    </select>
                                                    </a>
                                                </div>
                                                <div class="col-md-2 text-left" style="padding-top: 10px; padding-bottom: 20px;">
                                                </div>
                                                    <div class="col-md-10 text-left" style="padding-top: 10px; padding-bottom: 20px;">
                                                        <button class="btn btn-rounded btn-success waves-effect waves-light" href="<?php echo site_url('welcome/create_sekolah');?>">
                                                        <span class="btn btn-rounded btn-success waves-effect waves-light">OK                 
                                                        </span>
                                                        </button>
                                                    </div>
                                            </div>
                                            </form>

                                            <?php if (isset($user)):?>
                                            <table id="datatable-report" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Peserta</th>
                                                <th>Nama Sekolah</th>
                                                <th>Alat Tes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;?>
                                                <?php foreach ($user as $us): ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <?php $i++;?>
                                                <td><?php echo $us->nama;?></td>
                                                <td><?php echo $us->nama_sekolah;?></td>
                                                <td class="text-center">
                                                    <?php foreach($alat as $al):?>
                                                    <?php if ($al->id_sklh == $se->sekolah_id)
                                                    {
                                                    echo '<button class="btn btn-rounded btn-success waves-effect waves-light">'.$al->nama_alat.'</button>';
                                                    } ?>
                                                    <?php endforeach;?>
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