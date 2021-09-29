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
                                            
                                            <table id="datatable-buttons" class="table table-striped table-bordered nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                <th>No.</th>
                                                <th>Nama Peserta</th>
                                                <th>Sub Tes</th>
                                                <?php for($x=1; $x<=22; $x++):?>
                                                <th><?php echo 'Soal '.$x;?></th>
                                                <?php endfor ?>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($report as $row): ?>
                                                <tr>
                                                    <td><?php echo $row->id_user;?></td>
                                                    <td><?php echo $row->nama;?></td>
                                                    <td><?php echo $row->sub_test;?></td>
                                                    <?php $array = array($row->soal_1,$row->soal_2,$row->soal_3,$row->soal_4,$row->soal_5,$row->soal_6,$row->soal_7,$row->soal_8,$row->soal_9,$row->soal_10,$row->soal_11,$row->soal_12,$row->soal_13,$row->soal_14,$row->soal_15,$row->soal_16,$row->soal_17,$row->soal_18,$row->soal_19,$row->soal_20,$row->soal_21,$row->soal_22);?>
                                                    <?php for($x=0; $x<22; $x++){?>
                                                    <td><?php echo $array[$x];?></td>
                                                    <?php }?>
                                                 </tr>
                                                <?endforeach?>
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
                $(document).ready(function() {
                    $('#datatable').DataTable();
                
                    //Buttons examples
                    var table = $('#datatable-buttons').DataTable({
                        lengthChange: false,
                        buttons: ['copy', 'excel', 'colvis'],
                        scrollX: true
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