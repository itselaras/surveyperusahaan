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
                <form name="myForm" method="post" action="<?php echo site_url('welcome/submit_rmib')?>" autocomplete="off">
                <?php $ind=0;?>
				<?php foreach ($user as $row): ?>
				<?php $ind++;?>
				<div class="col-md-6" style="border-left : 1px solid #3d84e6; border-right : 1px solid #3d84e6;">
                    <div class="card" style="padding: 20px; margin-bottom: 0px;">
                        <div class="card-body">
                            <h3 class="mt-0 header-title text-center" style="margin-bottom: 30px; margin-top: 10px;"><?php echo $row->kd_tbl_rmib;?></h3>
                            
                            <?php ($this->session->gender == 'Pria') ? $a = $row->soal_jawaban_a : $a = $row->soal_jawaban_b ;?>
                            <?php $b = explode(',',$a);?>
                            <?php $find = array("<p>","</p>","<br>");?>


                            <div class="flex-container" style="display: flex;flex-direction: column;height: 350px;flex-wrap: wrap;">
                                <?php for($x=0, $y=count($b); $x<$y; $x++){?>
									<div class="form-group col-md-6" style="padding-left: 0px; padding-right: 0px;">
										<label for="example-text-input" class="col-sm-8 col-form-label"><?php echo str_replace($find,"",$b[$x]);?></label>
										<div class="col-sm-4">
											<input class="form-control selector" type="text" name="<?php echo "array$ind-[]";?>" id="<?php echo $row->kd_tbl_rmib."".($x+1);?>" maxlength="2" required>
										</div>
									</div>
								<?php }?>
								</div>
                            </div>

                            
                            <input type="hidden" name="<?php echo 'kode_rmib_'.$ind;?>" value="<?php echo $row->kd_tbl_rmib;?>">
                            <input type="hidden" name="user_id" value="<?php echo $this->session->user_id;?>">
                            <input type="hidden" id="page" name="page" value="<?php echo $page;?>">

                            <div id="morris-donut-example" class="dashboard-charts morris-charts"></div>
                        </div>
                    </div>
                    <?endforeach?>
                    </div>
                    <div class="col-12 text-center" style="margin-top: 20px;">
                             <button class="btn btn-primary w-md waves-effect waves-light" type="submit"><?php echo $page == 8 ? 'Finish' : 'Next' ; ?></button>
                    </div>
                    </form>
                </div>
                
			</div>
		</div>
	</div>
	
	        <!-- The Modal RMIB-->
        <div id="RMIBBtnmodal" class="modal" style="
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
                    <h4 class="text-muted font-18 m-b-5 text-center">INSTRUKSI TES RMIB</h4>
                    
                    <p style="text-align: justify;text-justify: inter-word;">
                        Dibawah ini akan Anda temui daftar-daftar pekerjaan yang tersusun dalam beberapa kelompok. Setiap pekerjaan merupakan keahlian khusus yang memerlukan Latihan atau Pendidikan keahlian tersendiri. Mungkin hanya beberapa diantaranya yang Anda sukai. Disini Anda diminta untuk memilih pekerjaan mana yang Anda sukai, terlepas dari besarnya upah atau gaji yang akan Anda terima. Juga terlepas dari apakah Anda akan berhasil atau tidak dalam mengerjakan pekerjaan tersebut.
                    </p>
                        </br>
                    <p style="text-align: justify;text-justify: inter-word;">
                        <b>Tugas Anda adalah menuliskan angka pada tiap pekerjaan dalam kelompok-kelompok yang tersedia.</b> Berikanlah angka 1 untuk pekerjaan yang paling Anda sukai diantara keduabelas pekerjaan yang tersedia pada setiap kelompok, dan dilanjutkan dengan pemberian nomor 2, 3, 4, dan seterusnya berurutan berdasarkan besarnya kadar kesukaan / minat Anda terhadap pekerjaan itu, sampai angka 12 Anda tuliskan untuk pekerjaan yang tersedia pada kelompok tersebut. <b>Tuliskan angka-angka tersebut pada kotak yang tersedia di samping kanan masing-masing daftar pekerjaan.</b> Pastikan tidak ada angka yang sama dalam kelompok pekerjaan tersebut. Jika Anda ingin mengoreksi jawaban, silahkan klik 2x pada angka yang ingin Anda koreksi dan gunakan tombol delete pada keyboard.
                    </p>
                        </br>
                    <p style="text-align: justify;text-justify: inter-word;">
                        Bekerjalah secepatnya, dan tulislah nomor-nomor (angka-angka) sesuai dengan kesan dan keinginan Anda yang pertama muncul.
                    </p>
                        </br>
                        </br>


                <a href="#" class="btn btn-primary w-md waves-effect waves-light btn-rmib" onclick=closeModal(); >Lanjut Kerjakan Soal</a>
            </div>
          </div>
        
        </div>
        
        <script>
            $(document).ready(function() {
                var page = document.getElementById("page").value;
               if (page == 0)
               {
                $('#RMIBBtnmodal').modal('show');
               }
               
            });
            
            function closeModal()
                {
                    $('#RMIBBtnmodal').modal('toggle');
                }
        </script>