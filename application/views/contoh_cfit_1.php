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
                    <h4 class="text-muted font-18 m-b-5 text-center">INSTRUKSI TES KECERDASAN - SUBTEST 1</h4>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Pada subtes kali ini saudara disajikan 3 gambar, dimana ketiga gambar tersebut memiliki pola masing-masing yang merupakan deret gambar.                    
                    </p>
                        </br>
                    <p style="text-align: justify;text-justify: inter-word;">
                        Saudara diminta meneruskan gambar yang ada dengan memilih satu jawaban yang paling sesuai dari 6 pilihan jawaban yang disajikan.                    
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
                <form name="myForm" method="post" action="<?php echo site_url('welcome/submit_contoh_cfit_1')?>">
		
		<?php $page = $this->uri->segment(3, 0);?>
                <?php $pg = $page + 1;?>
                <?php $find = array("<p>","</p>","<br>");?>
                <form name="myForm" method="post" action="<?php echo site_url('welcome/submit_contoh_cfit_1')?>">
                
                <div class="col-md-12" style="">
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
                        C </br>
                        <img src="data:image/png;base64,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">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Pada soal tersebut, terdapat 3 buah gambar berurutan yang polanya semakin miring ke kanan. Dari gambar pertama memiliki pola gambar tegak lurus. Dilanjutkan gambar kedua, memiliki pola agak miring ke kanan, dan di gambar ketiga memiliki pola yang semakin miring ke kanan. <b>Sehingga jawaban yang tepat adalah C.</b>                   
                        </p>
                        <?php elseif ($page == 1):?>
                        E </br>
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGEAAABhCAYAAADGBs+jAAACJklEQVR4Ae2cwUrDYADGrPj+r1xPQtnm4AthvcSL28qXHxJ7mz3O8zy/+rnVwM/j6cdxPH7Ue9HAq7/5b5EfChooAhRnzopg2oSsIkBx5qwIpk3IKgIUZ86KYNqErCJAceasCKZNyCoCFGfOimDahKwiQHHmrAimTcgqAhRnzopg2oSsIkBx5qwIpk3IKgIUZ86KYNqErCJAceasCKZNyCoCFGfOimDahKwiQHHmrAimTcgqAhRnzopg2oSsIkBx5qwIpk3IKgIUZ86KYNqErCJAceasCKZNyCoCFGfOimDahKwiQHHmrAimTcgqAhRnzopg2oSsIkBx5qwIpk3IKgIUZ86KYNqErCJAceasCKZNyCoCFGfOimDahKwiQHHmrAimTcgqAhRnzopg2oSsIkBx5qwIpk3IKgIUZ86KYNqErCJAceasCKZNyHp6QvAf59WTbP+u9Xs38O7Jy90Ju099UQRd6Q4swu5MXxRBV7oDi7A70xdF0JXuwCLszvRFEXSlO7AIuzN9UQRd6Q4swu5MXxRBV7oDi7A70xdF0JXuwCLszvRFEXSlO7AIuzN9UQRd6Q4swu5MXxRBV7oDi7A70xdF0JXuwCLszvRFEXSlO7AIuzN9UQRd6Q4swu5MXxRBV7oDi7A70xdF0JXuwH+/Gv/uq9z7MS3eGehOeGfnQ9ee7oT+OeRD5i/HdCdcZNz1sgh3mb+cW4SLjLteFuEu85dzfwGDsA3GI1uhyAAAAABJRU5ErkJggg==">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Pada soal tersebut, terdapat 3 buah gambar berurutan yang polanya semakin ke kanan arsirannya semakin penuh. Dari gambar pertama, gambar terarsir 1/8 bagian. Dilanjutkan gambar kedua, gambar terarsir 1/4 bagian, dan di gambar ketiga, gambar terarsir 1/2 bagian. <b>Sehingga jawaban yang paling tepat adalah E.</b>                        </p>
                        <?php elseif ($page == 2):?>
                        E </br>
                        <img src="data:image/png;base64,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">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Pada soal tersebut, terdapat 3 buah gambar berurutan yang polanya semakin ke kanan gambarnya bertambah 1. Dari gambar pertama, hanya ada 1 gambar daun. Di gambar kedua, bertambah menjadi 2 daun, dan di gambar ketiga bertambah menjadi 3 daun. <b>Sehingga jawaban yang paling tepat adalah E.</b>
                        </p>                        
                        <?php endif?>
                        
                        
                        </br>
                        </br>
                        <?php if ($page == 2):?>
                        <button href="<?php echo site_url('welcome/cfit_1')?>" class="btn btn-primary w-md waves-effect waves-light btn-mulai" onclick=setTimer()>Mulai Tes</button>
                        <?php else:?>
                        <a href="<?php echo site_url('welcome/contoh_cfit_1/'.$pg)?>" class="btn btn-primary w-md waves-effect waves-light">Lanjutkan</a>
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
        
        function setTimer()
        {
          $(".btn-mulai").click(function(){
            $.ajax({url: '<?=base_url()?>index.php/Welcome/set_timer_1',
                success:function() {
                  window.location.href = '<?=base_url()?>index.php/Welcome/cfit_1' 
                }
            });
            
          });
        }

        </script>

</div>
</div>


        
        