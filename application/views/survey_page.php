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
    
    <?php $page = $this->uri->segment(3, 0);?>
    <?php $find = array("<p>","</p>","<br>");?>
    
    
        
        <div class="container">
            <div class="row" style="margin-bottom: 0px;">
               
                <form name="myForm" id="myForm" method="post" action="<?php echo site_url('survey_controller/submit_answer')?>">
                    

                <div class="col-md-10" style="border-left : 1px solid #3d84e6; border-right : 1px solid #3d84e6;">
                    <div class="card" style="padding: 20px; margin-bottom: 0px;">
                        <h4 id="demo" class="text-right"></h4>
                        <h3 class="text-left">Soal <?php echo $page+1;?></h3>

                        <div class="card-body row text-center">
                            <div class="col-12">
                            <h3><?php echo str_replace($find,"",$user->soal);?></h3>                            
                        </div>
                            </br>
                                <div class="col-12 row">
                                    <label class="radio-inline">
  <input type="radio" name="answer" id="inlineRadio1" value="1"> A </br>
                                        Sangat Tidak Setuju
                                    </label>
                                    <label class="radio-inline">
  <input type="radio" name="answer" id="inlineRadio2" value="2"> B </br>
                                        Tidak Setuju
                                    </label>
                                    <label class="radio-inline">
  <input type="radio" name="answer" id="inlineRadio3" value="3"> C </br>
                                        Setuju
                                    </label>
                                    <label class="radio-inline">
  <input type="radio" name="answer" id="inlineRadio4" value="4"> D </br>
                                        Sangat Setuju
                                    </label>
                                </div>
                        </div>
                        
                        <?php $dateTime = new DateTime();
                        $dateTime->modify('+ 90 seconds');
                        $start = 
                        $timestamp = $dateTime->getTimestamp();
                        ?>
                        
                        <input type="hidden" name="user_id" value="<?php echo $this->session->user_id;?>">
                        <input type="hidden" name="page" value="<?php echo $page;?>">
                        <input type="hidden" name="time" value="<?php echo $timestamp;?>">
                        
                        <div class="col-12 text-center" style="margin-top: 20px;">
                            <?if ($page == $count-1):?>
                                <button type="submit" name="sub2" value="sub2" class="btn btn-primary">Finish</button>
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
                            <?php for ($i=0;$i<$count;$i++):?>
                                <?php if ($navigasi[$i] === null):?>
                                <?php elseif ($navigasi[$i] === 'sk'):?>
                                <a href="<?php echo site_url('survey_controller/start/'.$i);?>" name="next" style="width:50px; height:50px; padding:10px; background-color: #e57373; margin-bottom: 10px; margin-left: 5px;"  class="btn btn-primary"><?php echo $i+1;?></a>
                                <?php else:?>
                                <a href="<?php echo site_url('survey_controller/start/'.$i);?>" name="next" style="width:50px; height:50px; padding:10px; background-color: #81d4fa; margin-bottom: 10px; margin-left: 5px;"  class="btn btn-primary"><?php echo $i+1;?></a>
                                <?php endif?>
                            <?php endfor ?>
                            <?php endif?>
                                
                        </div>
                    </div>
		        </div>
</div>
</div>
</div>

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
    window.location.href = '<?=base_url()?>index.php/Survey_controller/dashboard_survey';
  }
}, 1000);

//$('#myForm').submit(openHasil);

function openHasil()
        {
            if( ! $('input[name="answer"]').is(':checked')) 
            { 
                alert("Jawaban tidak boleh kosong");
                event.preventDefault();
            }
        }
</script>