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
                    <h4 class="text-muted font-18 m-b-5 text-center">INSTRUKSI TES CFIT - SUBTEST 3</h4>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Disajikan satu kotak besar dimana ada satu kotak kosong.                    
                    </p>
                        </br>
                    <p style="text-align: justify;text-justify: inter-word;">
                        Saudara diminta untuk mencari kotak kosong tersebut di antara pilihan jawaban dengan melihat pola gambar di atasnya, di samping kanan maupun kirinya.                    
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
                <form name="myForm" method="post" action="<?php echo site_url('welcome/submit_contoh_cfit_3')?>">
                    

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
                                    <label class="radio-inline">
  <input type="radio" name="cfit_1" id="inlineRadio1" value="A"> A </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_a);?>
                                    </label>
                                    <label class="radio-inline">
  <input type="radio" name="cfit_1" id="inlineRadio2" value="B"> B </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_b);?>
                                    </label>
                                    <label class="radio-inline">
  <input type="radio" name="cfit_1" id="inlineRadio3" value="C"> C </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_c);?>
                                    </label>
                                    <label class="radio-inline">
  <input type="radio" name="cfit_1" id="inlineRadio4" value="D"> D </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_d);?>
                                    </label>        
                                    <label class="radio-inline">
  <input type="radio" name="cfit_1" id="inlineRadio5" value="E"> E </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_e);?>
                                    </label>        
                                    <label class="radio-inline">
  <input type="radio" name="cfit_1" id="inlineRadio6" value="F"> F </br>
                                        <?php echo str_replace($find,"",$contoh->soal_jawaban_f);?>
                                    </label>
                                </div>
                        </div>
                        
                        <input type="hidden" name="user_id" value="<?php echo $this->session->user_id;?>">
                        <input type="hidden" id="page" name="page" value="<?php echo $page;?>">
                        
                        <div class="col-12 text-center" style="margin-top: 20px;">
                            <?if ($page == 2):?>
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
                        B
                        <img src="data:image/png;base64,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">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Lihatlah contoh soal 1. Dari ketiga gambar yang tersedia memiliki pola gambar persegi miring ke kanan dan diarsir penuh. Artinya, gambar yang harus Anda cari adalah gambar persegi miring ke kanan dan diarsir penuh. <b>Sehingga jawaban yang tepat adalah B.</b>                   
                        </p>
                        <?php elseif ($page == 1):?>
                        C
                        <img src="data:image/png;base64,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">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Lihatlah contoh soal 2. Gambar-gambar tersebut memiliki pola cermin. Dua gambar kotak diatas berisikan gambar seekor bebek yang saling membelakangi dan tidak diarsir. Kemudian, pada bagian bawah terdapat gambar seekor bebek yang menghadap ke kiri dan diarsir. <b>Maka gambar yang dapat mengisi satu kotak yang hilang adalah C.</b>                   
                        </p>
                        <?php elseif ($page == 2):?>
                        F
                        <img src="data:image/png;base64,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">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Lihatlah contoh soal 3. Pada soal tersebut, kotak yang berada diatas sebelah kiri berisikan 2 buah lingkaran yang menempel satu sama lain dan pada kotak sebelah kanannya terdapat 1 lingkaran. Pada kotak bagian bawah sebelah kiri juga terdapat dua lingkaran yang berjarak. Dengan melihat pola tersebut, <b>maka gambar yang dapat mengisi satu kotak yang hilang adalah F.</b>                   
                        </p>
                        <?php endif?>
                        </br>
                        </br>
                        <?php if ($page == 2):?>
                        <button href="<?php echo site_url('welcome/cfit_3')?>" class="btn btn-primary w-md waves-effect waves-light btn-mulai" onclick=setTimer()>Mulai Tes</button>
                        <?php else:?>
                        <a href="<?php echo site_url('welcome/contoh_cfit_3/'.$pg)?>" class="btn btn-primary w-md waves-effect waves-light">Lanjutkan</a>
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
                    <a href="<?php echo site_url('welcome/cfit_3');?>" class="btn btn-primary w-md waves-effect waves-light">Mulai Tes</a>

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
        
         btn_confirm.onclick = function() {
            console.log('confirm');
            $('#modalConfirm').modal('show');
        }
        
        btn_nex.onclick = function() {
            console.log('ok');
            $('#modalHasil').modal('show');
        }
        
        function openHasil()
        {
            if( ! $('input[name="cfit_1"]').is(':checked')) { alert("Jawaban tidak boleh kosong"); }
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
        
        <script>
            function setTimer()
            {
              $(".btn-mulai").click(function(){
                $.ajax({url: '<?=base_url()?>index.php/Welcome/set_timer_3',
                    success:function() {
                      window.location.href = '<?=base_url()?>index.php/Welcome/cfit_3' 
                    }
                });
                
              });
            }
        </script>

</div>
</div>


        
        