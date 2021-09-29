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
                                                <th>Kelompok Profesi</th>
                                                <?php for($x=1, $y=12; $x<=$y; $x++){?>
                                                <th><?php echo 'Profesi'.$x;?></th>
                                                <?php }?>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($report as $row): ?>
                                            <tr>
                                                <td><?php echo $row->id_user;?></td>
                                                <td><?php echo $row->nama;?></td>
                                                <td><?php echo $row->sub_test;?></td>
                                                <?php $jwb = $row->jawaban;?>
                                                <?php $b = explode(',',$jwb);?>
                                                <?php $find = array("<p>","</p>","<br>");?>
                                                <?php for($x=0, $y=count($b); $x<$y; $x++){?>
                                                <td><?php echo str_replace($find,"",$b[$x]);?></td>
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