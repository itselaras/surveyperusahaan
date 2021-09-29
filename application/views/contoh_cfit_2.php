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
        
        <!-- The Modal instruksi-->
        <div id="aaa" class="modal" style="
          display: none;
          position: fixed;
          z-index: 100000;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4);">
        
          <!-- Modal content -->
          <div class="modal-content" style="
          background-color: #fefefe;
              margin: 15% auto;
              padding: 20px;
              border: 1px solid #888;
              width: 50%; ">
            <span class="close">&times;</span>
            <div style="padding: 30px;">
                    <h4 class="text-muted font-18 m-b-5 text-center">INSTRUKSI TES CFIT - SUBTEST 2</h4>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Saudara disajikan lima gambar. Dari lima gambar tersebut, Saudara diminta untuk mencari dua gambar yang memiliki persamaan.                    
                    </p>
                        </br>
                    <p style="text-align: justify;text-justify: inter-word;">
                        Jadi nanti akan ada dua jawaban, dan kedua-duanya harus benar.                    
                    </p>

                        </br>
                        </br>
                                            <a class="btn btn-primary w-md waves-effect waves-light" onclick=closeModalInst()>OK</a>

                    

            </div>
          </div>
        
        </div>
        
        
<div class="wrapper" style="padding-top: 130px;">
        
        <div class="container">
            <div class="row" style="margin-bottom: 0px;">
                <?php $page = $this->uri->segment(3, 0);?>
                <?php $pg = $page + 1;?>
                <?php $find = array("<p>","</p>","<br>");?>
                <form name="myForm" id="myForm" method="post" action="<?php echo site_url('welcome/submit_contoh_cfit_2')?>">
                    

                <div class="col-md-12" style="border-left : 1px solid #3d84e6; border-right : 1px solid #3d84e6;">
                    <div class="card" style="padding: 20px; margin-bottom: 0px;">
                                                <div class="col-6" >

                        <p class="col-6">Subtest <?php echo substr($contoh->soal_kode,6,1);?></p>
                                                </div>

                        <div class="col-6 text-right" >
                                <a name="next" id="btn-inst" class="btn btn-primary">Instruksi Tes</a>
                                <a name="skip" id="btn-tombol" class="btn btn-warning" onclick=openTombol()>Instruksi Tombol</a>
                        </div>
                        <h3 class="text-center">Contoh Soal <?php echo $page+1;?></h3>
                        </br>
                        
                        <div class="card-body row text-center">
                            <div class="col-12">
                            <?php echo str_replace($find,"",$contoh->soal_pertanyaan);?>                            
                            </div>
                            </br>
                                <div class="col-12 row">
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox1" value="A"> A </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_a);?>
                                    </label>
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox2" value="B"> B </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_b);?>
                                    </label>
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox3" value="C"> C </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_c);?>
                                    </label>
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox" name="cfit_2[]" id="inlinecheckbox4" value="D"> D </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_d);?>
                                    </label>        
                                    <label class="checkbox-inline">
  <input type="checkbox" class="single-checkbox"name="cfit_2[]" id="inlinecheckbox5" value="E"> E </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_e);?>
                                    </label>        
                                </div>
                        </div>
                        
                        <input type="hidden" name="user_id" value="<?php echo $this->session->user_id;?>">
                        <input type="hidden" id="page" name="page" value="<?php echo $page;?>">
                        
                        <div class="col-12 text-center" style="margin-top: 20px;">
                            <?if ($page == 1):?>
                                <a id="btn-nex" class="btn btn-primary btn-next" onclick=openHasil()>Finish</a>
                            <?else:?>
                                <a id="btn-nex" class="btn btn-primary btn-next" onclick=openHasil()>Next</a>
                                <button type="submit" name="skip" value="skip" class="btn btn-warning">Skip</button>
                            <?endif?>
                        </div>
                        </form>
                </div>
		</div>
</div>

        <!-- The Modal Hasil-->
        <div id="modalHasil" class="modal" style="
          display: none;
          position: fixed;
          z-index: 100000;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4);">
        
          <!-- Modal content -->
          <div class="modal-content" style="
          background-color: #fefefe;
              margin: 15% auto;
              padding: 20px;
              border: 1px solid #888;
              width: 50%; ">
            <span class="close">&times;</span>
            <div style="padding: 30px;">
                    <h4 class="text-muted font-18 m-b-5 text-center">JAWABAN SUBTEST <?php echo substr($contoh->soal_kode,6,1);?> SOAL <?php echo $page+1;?></h4>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Jawaban yang benar adalah :                   
                    </p>
                        </br>
                        
                        <?php if ($page == 0):?>
                        <div class="row">
                        <div class="col-md-3">
                            B </br>
                        <img src="data:image/png;base64,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">
                        
                        </div>
                        <div class="col-md-3">
                            D </br>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHEAAABrCAYAAABAM20tAAAD70lEQVR4Ae2dPy90QRSHb02QKLZS0fkKPoFCtaIjeolapeJDIGhYFBKJivggCn+iEY1CQqJh3tyRnVezcY47Z+6YPJtMMuHcmbnP7zxb7CZ3K8frzxOo/vwdcAOOEAtoAkIkxAIIFHALmEiIBRAo4BYwkRALIFDALYhMvL+/dxsbG259fZ1hyGBzc9Pd3Nyo20oU4srKiquqipGAwerqqk2I3W7XB7i3t+dOT08ZBgy2trY846WlJZsQFxYW/Abv7+/qDbhARuDl5cUzXl5ell3wrUr0dtoP8enp6dulTGMSeHh4IMSYQNtYixDboB55T0KMDLSN5QixDeqR9yTEyEDbWI4Q26AeeU9CjAy0jeUIsQ3qkfckxMhA21iuqBA/Pj5c/fFeTqM+k/WrmBBvb2/dzMyM63Q6bnx8PItRn6U+02++ItIEX0yIx8fH/vPDsbExNzExkcUYHR31Zzo7O9Nkoq4tLsSDgwP3+fmZxdje3vYhnp+fq4PRXFBMiCcnJx7Y0dGR5v5Na3d3dwlRQ7gf4uHhoeYy09qdnR1C1BAmxMr9+S+FCZEQNdKLa3k7FaP6KsRETFS2jKwcE2WcQhUmYmJohpgTTFTSxERMVLaMrBwTZZxCFSZiYmiGmBNMVNLERExUtoysHBNlnEIVJmJiaIaYE0xU0sRETFS2jKwcE2WcQhUmYmJohpgTTFTSxERMVLaMrBwTZZxCFSZiYmiGmBNMVNLERExUtoysHBNlnEIVJmJiaIaYE0xU0sRETFS2jKwcE2WcQhUmYmJohpgTTFTSxERMVLaMrBwTZZxCFSZiYmiGmBNMVNLERExUtoysHBNlnEIVJmJiaIaYE0xU0sRETFS2jKwcE2WcQhUmYmJohpgTTFTSxERMVLaMrBwTZZxCFSZiYmiGmBNMVNLsm2j9lF/NsfqPtLY+UzFPHu71ev4BsXNzc25tbS2LMTs768/EM8CFrX9xceGB5fj7xVdXV8K7+F1ZMSbWv4VRw6rfunIal5eX7u3t7XfpCK8qJkTh/RZZRogFxEqIhPgzAX7d+2dGTSswsSnBDK4nxAxCaHoEQmxKMIPrCTGDEJoegRCbEszgekLMIISmR0gW4vPzc9Ozcv0AAo+Pj/5zY/Mf/Lq7u3Ovr68MAwbX19e2Ic7Pz/sNhoeH3cjICMOAwdDQkGe8uLg4wNXBf64G/+v/f/b399309LSbmppyk5OTDAMGNduacf3LqdqXKETtotSnJUCIaXmb7EaIJljTLkqIaXmb7EaIJljTLkqIaXmb7EaIJljTLkqIaXmb7EaIJljTLkqIaXmb7EaIJljTLkqIaXmb7EaIJljTLvoPJjZWPjT8MJgAAAAASUVORK5CYII=">
                        </div>
                        </div>
                        <p style="text-align: justify;text-justify: inter-word;">
                        Lihatlah kelima gambar tersebut. Gambar A, C, E merupakan gambar yang sama, yaitu segitiga. Sedangkan terdapat 2 gambar yang bukan segitiga yaitu gambar B dan D yang merupakan  persegi. <b>Sehingga Jawaban yang paling tepat adalah B dan D.</b>                   
                        </p>

                        <?php elseif ($page == 1):?>
                       <div class="row">
                        <div class="col-md-3">
                            C </br>
                        <?php echo str_replace($find,"",$contoh->soal_jawaban_c);?>
                        
                        </div>
                        <div class="col-md-3">
                            E </br>
                        <?php echo str_replace($find,"",$contoh->soal_jawaban_e);?>                        
                        </div>
                        </div>
                        <p style="text-align: justify;text-justify: inter-word;">
                        Lihatlah kelima gambar tersebut. Gambar A, B, C, D, dan E merupakan gambar yang sama, yaitu lingkaran. Tetapi terdapat 2 gambar yang terlihat berbeda dari ketiga gambar lainnya. Gambar A, B, dan D adalah lingkaran yang tidak diarsir. Sedangkan gambar C dan E adalah lingkaran yang diarsir. <b>Sehingga Jawaban yang paling tepat adalah C dan E.</b>                        
                        </p>
                        <?php endif?>
                        </br>
                        </br>
                        <?php if ($page == 1):?>
                        <button href="<?php echo site_url('welcome/cfit_2')?>" class="btn btn-primary w-md waves-effect waves-light btn-mulai" onclick=setTimer() >Mulai Tes</button>
                        <?php else:?>
                    <a href="<?php echo site_url('welcome/contoh_cfit_2/'.$pg)?>" class="btn btn-primary w-md waves-effect waves-light">Lanjutkan</a>
                        <?endif?>

            </div>
          </div>
        
        </div>
        
        <!-- The Modal Hasil-->
        <div id="modalConfirm" class="modal" style="
          display: none;
          position: fixed;
          z-index: 100000;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4);">
        
          <!-- Modal content -->
          <div class="confirm-modal" style="
          background-color: #fefefe;
              margin: 15% auto;
              padding: 20px;
              border: 1px solid #888;
              width: 50%; ">
            <span class="close">&times;</span>
            <div style="padding: 30px;">
                    <h4 class="text-muted font-18 m-b-5 text-center">Siap Memulai Tes ?</h4>
                    
                        </br>
                        </br>
                    <a href="<?php echo site_url('welcome/cfit_1');?>" class="btn btn-primary w-md waves-effect waves-light">Mulai Tes</a>

            </div>
          </div>
        
        </div>
        
        <!-- The Modal Tombol-->
        <div id="modalTombol" class="modal" style="
          display: none;
          position: fixed;
          z-index: 100000;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgb(0,0,0);
          background-color: rgba(0,0,0,0.4);">
        
          <!-- Modal content -->
          <div class="confirm-modal" style="
          background-color: #fefefe;
              margin: 15% auto;
              padding: 20px;
              border: 1px solid #888;
              width: 50%; ">
            <span class="close">&times;</span>
            <div style="padding: 30px;">
                    <h4 class="text-muted font-18 m-b-5 text-center">Instruksi Tombol</h4
                        </br>
                        </br>
                        <div row>
                            <div class="col-2 text-center">
                                <button id="btn-nex" class="btn btn-primary btn-next">Next</button>
                            </div>
                            <div class="col-10">
                                Klik tombol Next bila Anda telah menjawab soal dan ingin melanjutkan ke soal berikutnya
                            </div>
                        </div>
                        
                        </br>
                        </br>
                        
                        <div row>
                            <div class="col-2 text-center">
                                <button type="submit" name="skip" value="skip" class="btn btn-warning">Skip</button>
                            </div>
                            <div class="col-10">
                                Klik tombol Skip apabila Anda ingin melewati soal, dan lanjut ke soal berikutnya. Nomor soal yang Anda skip akan muncul di deretan nomor soal
                            </div>
                        </div>
                        
                        
                        </br>
                        </br>
                    <a class="btn btn-primary w-md waves-effect waves-light" onclick=closeModal()>OK</a>

            </div>
          </div>
        
        </div>
        
        <script>
        
        // Get the button that opens the modal
        var btn_inst = document.getElementById("btn-inst");
        var btn_nex = document.getElementsByClassName("btn-next");
        var btn_confirm = document.getElementById("btn-confirm");
            
        var modal_instruksi = document.getElementById('#aaa');
            
            $(document).ready(function() {
                var page = document.getElementById("page").value;
               if (page == 0)
               {
                $('#aaa').modal('show');
               }
               
            }); 
                
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        btn_inst.onclick = function() {
            console.log('ok');
            $('#aaa').modal('show');
        }
        
        btn_nex.onclick = function() {
            console.log('ok');
            $('#modalHasil').modal('show');
        }
        
        function openHasil()
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
            else
            {
                $('#modalHasil').modal('show');
            }
            
        }
        
        function openTombol()
        {
            $('#modalTombol').modal('show');
        }
        
        function closeModal()
        {
            $('#modalTombol').modal('toggle');
        }
        
        function closeModalInst()
        {
            $('#aaa').modal('toggle');
        }
       
            
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal_instruksi.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal_instruksi) {
            modal_instruksi.style.display = "none";
          }
        }
        </script>

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
            alert('ok');
            
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
        
        
        
        
        
        
</script>

<script>
            function setTimer()
            {
              $(".btn-mulai").click(function(){
                $.ajax({url: '<?=base_url()?>index.php/Welcome/set_timer_2',
                    success:function() {
                      window.location.href = '<?=base_url()?>index.php/Welcome/cfit_2' 
                    }
                });
                
              });
            }
</script>

        
        