<!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->
            <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container-fluid" style="padding-top: 30px;">

                        

                        <div class="row">

            
                        <?php print_r(count(json_decode($report_type1[0]->jawaban))); ?>
                                <div class="col-xl-12">

                                    <div class="card m-b-20">

                                        <div class="card-body">

                                            

                                            <table id="datatable-buttons" class="table table-striped table-bordered nowrap" style="width:100%">

                                            <thead>

                                                <tr>

                                                <th rowspan="2">No.</th>

                                                <th rowspan="2">NIP</th>

                                                <?php for($x=1; $x<=count(json_decode($report_type1[0]->jawaban)); $x++):?>
                                                    <th>Soal <?= $x?></th>
                                                <?php endfor ?>

                                              </tr>

                                            </thead>

                                            <tbody>

                                            <?php foreach ($report_type1 as $row): ?>

                                                <tr>
                                                    <td></td>

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

                        .appendTo('#datatable_wrapper .col-md-6:eq(0)');

                } ); 

                </script>



                <footer class="footer">

                        © 2021 Crafted with <i class="mdi mdi-heart text-danger"></i> by SMI IT Team</span>.

                </footer>



            </div>





            <!-- ============================================================== -->

            <!-- End Right content here -->

            <!-- ============================================================== -->