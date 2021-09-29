

    <div class="wrapper" style="padding-top: 150px;">
        <div class="container">

            <div class="row">
                

                <div class="col-md-12">
                    <div class="card" style="padding: 20px;">
                        <div class="card-body">
                            <h3 class="mt-0 header-title text-center" style="margin-bottom: 30px;">Report Tes Minat</h3>
                            
                            
                            <table class="table table-bordered">
                              <tr>
                                <th>#</th>
                                <?php for($x=0, $y=12; $x<$y; $x++){?>
                                <th><?php echo $x+1;?></th>
                                <?php }?>
                              </tr>
                            <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?php echo $row->kode_rmib;?></td>
                                <?php $jwb = $row->jawaban;?>
                                <?php $b = explode(',',$jwb);?>
                                <?php $find = array("<p>","</p>","<br>");?>
                                <?php for($x=0, $y=count($b); $x<$y; $x++){?>
                                <td><?php echo str_replace($find,"",$b[$x]);?></td>
                                <?php }?>
                             </tr>
                            <?endforeach?>
                            </table>


                            

                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        <!-- end row -->
        </div>
    </div>