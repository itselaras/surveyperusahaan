	<script>
		document.addEventListener("keyup", function (e) {
        e.preventDefault();
        var keyCode = e.keyCode ? e.keyCode : e.which;
            if (keyCode == 44) {
                
            window.alert('Anda telah menekan tombol print screen. Silahkan Login Lagi!!');
            location.href='logout';
            }
        });
        document.onmousedown = function () {
            var rightclick;
            var e = window.event;
            if (e.which) {
                rightclick = (e.which == 3);
                if(e.which == 3) {
                    alert('Maaf, dilarang untuk klik kanan');
                }
            }
        };
        window.addEventListener("keydown",function(e){
        if(e.ctrlKey && (e.which==67)){
            e.preventDefault();
            alert("Dilarang Copy atau Merekam Selama Melakukan Test."); 
        }
        });
        </script>
<div class="wrapper" style="padding-top: 130px;">
        
        <div class="container">
            <div class="row" style="margin-bottom: 0px;">
                <?php $page = $this->uri->segment(3, 0);?>
                <?php $find = array("<p>","</p>","<br>");?>
                

		        
                <form name="myForm" id="myForm" method="post" action="<?php echo site_url('welcome/submit_cfit_2')?>">
                <div class="col-md-10" style="border-left : 1px solid #3d84e6; border-right : 1px solid #3d84e6;">
                    <div class="card" style="padding: 20px; margin-bottom: 0px;">
                        <p>Subtest <?php echo substr($user->soal_kode,6,1);?></p>
                        <h4 id="demo" class="text-right"></h4>
                        <h3 class="text-center">Soal <?php echo $page+1;?></h3>
                        </br>
                        
                        <div class="card-body row text-center">
                            <div class="col-12">
                            <?php echo str_replace($find,"",$user->soal_pertanyaan);?>                            
                        </div>
                            </br>
                                <div class="col-12 row">
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox1" value="A"> A </br>
                                        <?php echo str_replace($find,"",$user->soal_jawaban_a);?>
                                    </label>
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox2" value="B"> B </br>
                                        <?php echo str_replace($find,"",$user->soal_jawaban_b);?>
                                    </label>
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox3" value="C"> C </br>
                                        <?php echo str_replace($find,"",$user->soal_jawaban_c);?>
                                    </label>
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox4" value="D"> D </br>
                                        <?php echo str_replace($find,"",$user->soal_jawaban_d);?>
                                    </label>        
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox"name="cfit_2[]" id="inlinecheckbox5" value="E"> E </br>
                                        <?php echo str_replace($find,"",$user->soal_jawaban_e);?>
                                    </label>        
                                </div>
                        </div>
                        
                        <input type="hidden" name="user_id" value="<?php echo $this->session->user_id;?>">
                        <input type="hidden" name="page" value="<?php echo $page;?>">
                        
                        <div class="col-12 text-center" style="margin-top: 20px;">
                            <?if ($page == 13):?>
                                <button type="submit" name="sub3" value="sub3" class="btn btn-primary">Next Subtest</button>
                            <?else:?>
                                <button type="submit" name="next" value="next" class="btn btn-primary" onclick=openHasil();>Next</button>
                                <button type="submit" name="skip" value="skip" class="btn btn-warning">Skip</button>
                            <?endif?>
                        </div>
                        </form>
                </div>
		</div>
		
		        <div class="col-md-2" style="">
                    <div class="card" style="padding: 20px; margin-bottom: 0px;">
                        

                        <div class="col-12 text-center" >
                            <p>Navigasi</p>
                            <?php if ($page !== 0):?>
                            <?php for ($i=0;$i<14;$i++):?>
                                <?php if ($navigasi[$i] === null):?>
                                <?php elseif ($navigasi[$i] === 'sk'):?>
                                <a href="<?php echo site_url('welcome/cfit_2/'.$i);?>" name="next" style="width:50px; height:50px; padding:10px; background-color: #e57373; margin-bottom: 10px; margin-left: 5px;"  class="btn btn-primary"><?php echo $i+1;?></a>
                                <?php else:?>
                                <a href="<?php echo site_url('welcome/cfit_2/'.$i);?>" name="next" style="width:50px; height:50px; padding:10px; background-color: #81d4fa; margin-bottom: 10px; margin-left: 5px;"  class="btn btn-primary"><?php echo $i+1;?></a>
                                <?php endif?>
                            <?php endfor ?>
                            <?php endif?>
                                
                        </div>
                    </div>
		        </div>
</div>

<script>
    var totChecks = 0;
        $('.single-checkbox').on('change', function() {
              if($(this).prop("checked") == true)
              {
                 if(totChecks > 1){
                   /*cancel your action*/
                   $(this).prop('checked', false);
                   totChecks = totChecks - 1;
                 }
                 /*otherwise, proceed*/
                 totChecks = totChecks + 1;
              }
             else //checkbox is unchecked, so remove a point from totChecks.
              {
                totChecks = totChecks - 1;
              }
        });
        
        function onSubmit() 
        {
            
            var fields = $("input[name='cfit_2[]']").serializeArray(); 
            if (fields.length === 0) 
            { 
                alert('Anda belum memilih jawaban.'); 
                // cancel submit
                event.preventDefault();
            } 
            else if (fields.length === 1)
            { 
                alert('Silahkan pilih 2 jawaban.');
                event.preventDefault();
            }
        }
        
        function openHasil()
        {
        // register event on form, not submit button
        $('#myForm').submit(onSubmit);
        }
</script>

<script>
// Set the date we're counting down to
var countDownDate = <?php echo $end * 1000;?>

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
  console.log(now);
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = "Waktu Tersisa : " + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    window.location.href = '<?=base_url()?>index.php/Welcome/contoh_cfit_3';
  }
}, 1000);
</script>