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
                    <h4 class="text-muted font-18 m-b-5 text-center">INSTRUKSI TES CFIT - SUBTEST 4</h4>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Gambar paling kiri merupakan soal, sedangkan gambar A sampai dengan F adalah pilihan jawaban.                    
                    </p>
                        </br>
                    <p style="text-align: justify;text-justify: inter-word;">
                        Tugas saudara adalah mencari posisi titik yang sama pada soal dengan salah satu pilihan jawaban yang ada.                    
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
                <form name="myForm" method="post" action="<?php echo site_url('welcome/submit_contoh_cfit_4')?>">
                    

                <div class="col-md-12" style="border-left : 1px solid #3d84e6; border-right : 1px solid #3d84e6;">
                    <div class="card" style="padding: 20px; margin-bottom: 0px;">
                                                <div class="col-6" >

                        <p class="col-6">Subtest <?php echo substr($contoh->soal_kode,6,1);?></p>
                                                </div>

                        <div class="col-6 text-right" >
                                <a name="next" id="btn-inst" class="btn btn-primary">Instruksi Alat</a>
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
                        C
                        <img src="data:image/png;base64,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">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Perhatikan 1 kotak soal diatas. Pada kotak tersebut terdapat sebuah persegi dan lingkaran yang saling berpotongan. Diantara perpotongan tersebut terdapat sebuah titik. Artinya titik tersebut berada di dalam lingkaran dan di dalam persegi. <b>Maka jawaban yang paling tepat adalah C,</b> karena didalamnya terdapat persegi dan lingkaran yang saling berpotongan serta dapat diletakkan titik didalam perpotongan tersebut.                   
                        </p>
                        <?php elseif ($page == 1):?>
                        D
                        <img src="data:image/png;base64,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">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Perhatikan 1 kotak soal diatas. Di dalam kotak tersebut terdapat segitiga dan persegi panjang yang saling berpotongan. Pada gambar tersebut terdapat sebuah titik yang hanya berada di dalam segitiga dan tidak berada didalam persegi panjang. <b>Maka jawaban yang paling tepat adalah D,</b> karena dapat diletakkan titik didalam segitiga namun tidak berada di dalam persegi.                   
                        </p>
                        <?php elseif ($page == 2):?>
                        B
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGcAAABdCAYAAAC4oHgyAAAIeklEQVR4Ae1daUhVTxQ/tottRJtoC9GCFoKm2GIUBWUQkplFVNBCERUVlbRYgRhUVl+iaPvQYquW0pfyQ+uXFtq0BSJKKSoj26Q0y3L+/ObPk/vue8/emG/uvMcZuNw7d85958zvNzP3zMydeWFCCEEcjESglZFWsVESASbH4ILA5DA5BiNgsGlccwwmp4032z58+ECPHz/2lsT3AoBAz549aejQodSqla2uwJW2hpqaGpGSkgL3mg9NGISHh4tr165ZaZDXHjXnx48fdP/+fWrdujVNmTKF2rVrF4Cywj/pQuDWrVv05s0bqqysdN1qPHuQExYWRjjCw8OpqKjIs6o1PsoXLYHAnDlz6OTJk9SmjQcVZGvk/lcHcjBw8PXr15bQz7/RBAK/fv3ymeqVHJ/SnKAVASZHK9xqypgcNby0SjM5WuFWU8bkqOGlVZrJ0Qq3mjImRw0vrdJMjla41ZQxOWp4aZVmcrTCraaMyVHDS6s0k6MVbjVlTI4aXlqlmRytcKspY3LU8NIqzeRohVtNGZOjhpdWaSZHK9xqypgcNby0SjM5WuFWU8bkqOGlVZrJ0Qq3mjImRw0vrdJMjla41ZQxOWp4aZVmcrTCraaMyVHDS6s0k6MVbjVlTI4aXlqlmRytcKspY3LU8NIqzeRohVtNmedyKrXnmyVdWlpKmzdvlgu0sEjrz58/zfodnQ9h5Vl9fT3FxMTQjh07qH379gFX7wg5WGeKdadYPbxx40b6/fu30QSBiNevX0tSsPIZK/90BEfIiY2NpeLiYlqyZAnV1dXR6tWrdeS12Tp+/vxJWLs5Y8YM2rt3r7ZFzI6QA5SSk5Np+/btMtNo2tasWdNs8AL54Pfv3yUpnz9/lgWqS5cugVTn9tuOOgSTJk2iffv2UV5eHh0/ftzNMBMieMcsXryY3r59S2fOnKHIyEitZjlWc1y5RFNRXV1Na9eupYiICMrIyHAlOXrGe3DVqlV0584dunDhAvXv31+7PY6TgxwvWrSIPn78KN9BXbt2pQkTJmgHwq5w06ZNshnDu3HYsGH2ZC1xR5s1aw43bNggm5D58+fT7du3rUnar3fu3EnHjh2jEydOyHej3QDUKjgGOTk51NDQYE9usbgx5CBHubm5NHXqVOkkPHnypMUyqfJDBw4coN27dxPO48eP93j07t27lJ6eLp2Zjh07Btattu+G8+nTJxERESEPXOsO9fX1Yt68eSI+Pl5UVFRoVV9QUCAiIyNFfn6+h96qqiqRnZ0toqKiRHp6uigrK/OQac6NzMxMuQEUdNsDeuluwWlyYExtba1IS0sTycnJorKy0s2+QEUuXrwoevfuLfbs2eOm4suXL+LIkSMiISFBxMTEiNOnT7ul/2vECHIAeHV1td95QUkdO3asSE1NVXrObwUWwZs3b4ro6GiRk5PTeLe8vFzs2rVLJCUlidjYWFlrAlFQjCCnpKRE7uOWlZUlAEZdXV0jEL4u3r17J8HJyMiQtcmX3L/cLy0tFXFxcSI3N1c0NDSIBw8eiOXLl8takpiYKPLy8gLavDZFjjZXGkM2EydOpMuXL1NBQQH169ePxowZQyNGjKCkpCTq1auXx8sXnT54TNj3benSpXT48GGvW195POjnjZcvX9LcuXOlNF7umZmZ9PDhQxo4cCCtX7+e0tLSCK69UyEMpc6qHMMUffv2lbcw2NetWzdr8j9fYwsrDHpev35dHtgIDp3P6OhouZXi4MGDCceQIUMIQyUYZASI06dPp9TUVNq2bVuzbUBWMRzz/v17evTokXSFsV0mtnBEQUhMTKTJkydTSkqKtn3m0AkvLCyUBRaFwxq01RyXUoxIjxw5Uh7r1q2TwN+7d0/uKVpWVkZXrlwh7JbYtm1bwghwfHw8JSQkyNqzdetWeR+DkCAUo8UgsKamRoJuHS1GXwQFDUSUl5fTs2fPqKKigr59+yZHJKBr+PDhsj8TFxcnpwJ0TAO4cPDnrJ0cq1GYMhg0aJA8Zs2aJTt02IAPYD59+pRevHhB6O9cvXpVpqEpRM05evSorFmYB+rQoQOhNtbW1spahtqBuRccVVVVhBHlqKgo6tOnD40aNUo2U5iPGTduHJ09e1YWAKtNJl07So4dCJCFZhQHmhgEEADgQQBqE8a5MBg5evRo2WEFgd27d6fOnTtLAkEO5Hr06CFrFZpLpGFbTISsrCxJFAhGzTQ5GEWON6CwEWynTp0ak/ACx2gxphtA0syZMxvT/naBgcxLly7R+fPnpUPyN3mn040avvEXjAULFtDChQulp3Xjxg2/HsO0+Llz5+Q7xqmBTL8MtQgZX3MstrpdwpnAVMPs2bOltwMnw1fAO2b//v1yF1q47sESgrLmuMCF9wbXFwTBG/MWDh06RBhlPnjwIGFyL5hCUJMDBwJD96g16AfBObAGzF5iKgLkmDKJZ7Xvb9dBTQ4yh74JhvfhlcFZwKQdQklJCa1cuZKys7MJc0TBGIKeHIAOb+7UqVOyY4pZVbjbK1asoGXLlhn/ZU9ThSYkyEEG0TfC7CX+wQQTdpgQ27JlS1N5Nz4taL01b8hiJCA/P5/w5w14BwV7CClyQMaAAQPkEezEwP6QadZCgQx7HpgcOyIGxZkcg8iwm8Lk2BExKM7kGESG3RQmx46IQXEmxyAy7KYwOXZEDIozOQaRYTeFybEjYlCcyTGIDLspTI4dEYPiTI5BZNhNYXLsiBgUZ3IMIsNuildy8NUkvjt28gt7u6GhGse3476Cx2QbiEHAx+TTpk3TtluFLwND/T5mbRG87f/jQQ4+DMeXLM+fP5cfSoQ6OKbkD99z24PH+hwI4PuvV69e2WU5HiAEUCGwzMX1sb1LjVdyXIl8dhYBrw6BsyaxdhcCTI4LCQPP/wFl1YigEz8YuwAAAABJRU5ErkJggg==">
                        <p style="text-align: justify;text-justify: inter-word;">
                        Perhatikan 1 kotak soal diatas. Pada kotak tersebut terdapat sebuah segitiga yang berpotongan dengan garis lengkung. Didalam garis lengkung dan segitiga tersebut terdapat sebuah titik. <b>Maka jawaban yang paling tepat adalah B,</b> Karena dapat diletakkan titik di dalam garis lengkung dan segitiga.                   
                        </p>
                        
                        <?php endif?>
                        </br>
                        </br>
                        <?php if ($page == 2):?>
                        <button href="<?php echo site_url('welcome/cfit_4')?>" class="btn btn-primary w-md waves-effect waves-light btn-mulai" onclick=setTimer()>Mulai Tes</button>
                        <?php else:?>
                        <a href="<?php echo site_url('welcome/contoh_cfit_4/'.$pg)?>" class="btn btn-primary w-md waves-effect waves-light">Lanjutkan</a>
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
                $.ajax({url: '<?=base_url()?>index.php/Welcome/set_timer_4',
                    success:function() {
                      window.location.href = '<?=base_url()?>index.php/Welcome/cfit_4' 
                    }
                });
                
              });
            }
        </script>

</div>
</div>


        
        