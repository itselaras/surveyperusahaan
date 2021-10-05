<!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->
            <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container-fluid" style="padding-top: 30px;">

                        

                        <div class="row">

            
                        <?php print_r(json_decode($report_type1[0]->jawaban)[0]); ?>
                                <div class="col-xl-12">

                                    <div class="card m-b-20">

                                        <div class="card-body">

                                        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">halo</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>

                                            <table id="datatable-buttons" class="table table-striped table-bordered nowrap" style="width:100%">

                                            <thead>

                                                <tr>

                                                    <th rowspan="2">No.</th>

                                                    <th rowspan="2">NIP</th>

                                                    <?php for($x=1; $x<=count(json_decode($report_type1[0]->jawaban)); $x++):?>
                                                        <th colspan="2">Soal <?= $x?></th>
                                                    <?php endfor ?>

                                                </tr>
                                                <tr>
                                                    <?php for($x=1; $x<=count(json_decode($report_type1[0]->jawaban)); $x++):?>
                                                        <th>Kepuasan</th>
                                                        <th>Kepentingan</th>
                                                    <?php endfor ?>
                                                </tr>

                                            </thead>

                                            <tbody>

                                            <?php foreach ($report_type1 as $row): ?>

                                                <tr>
                                                    <td><?= $row->id?></td>
                                                    <td><?= $row->nip?></td>
                                                    <?php foreach(json_decode($row->jawaban) as $answer): ?>
                                                        <td><?= $answer->answer[0]?></td>
                                                        <td><?= $answer->answer[1]?></td>
                                                    <?php endforeach; ?>

                                                 </tr>

                                                <?php endforeach; ?>

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

                <script>
                    $('#nav-home-tab').on('click', function (event) {
 
                     alert("Halo")
                    })

                </script>



                <footer class="footer">

                        © 2021 Crafted with <i class="mdi mdi-heart text-danger"></i> by SMI IT Team</span>.

                </footer>



            </div>





            <!-- ============================================================== -->

            <!-- End Right content here -->

            <!-- ============================================================== -->