    <!--

Author: WebThemez

Author URL: http://webthemez.com

License: Creative Commons Attribution 3.0 Unported

License URL: http://creativecommons.org/licenses/by/3.0/

-->

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="free-educational-responsive-web-template-webEdu">

	<meta name="author" content="webThemez.com">

	<title>Survey Perusahaan</title>

	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/9206474aa9.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>"> 

	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.css')?>" media="screen"> 

	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">

    <link rel='stylesheet' id='camera-css'  href="<?php echo base_url('assets/css/camera.css')?>" type='text/css' media='all'> 

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="assets/js/html5shiv.js"></script>

	<script src="assets/js/respond.min.js"></script>

	<![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



</head>

<body> 

	<!-- Fixed navbar -->

	<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">

	    <div class="container-fluid my-3 mx-3">

            <a class="navbar-brand" href="<?php echo site_url('survey_controller/index')?>">

                <img src="<?php echo base_url('assets/images/logo.png')?>" style="width: 100px; margin-top: -20px;" alt="Techro HTML5 template">

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

              <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

              <ul class="navbar-nav">

                <li class="nav-item">

                  <a class="nav-link" href="<?php echo site_url('survey_controller/logout')?>">Keluar</a>

                </li>

              </ul>

            </div>

        </div>



	</nav>

    <div class="wrapper" style="padding-top: 120px; padding-bottom: 30px;">

        <div class="container">

            

            <?php if($this->session->flashdata('error'))

                    {

                    echo 

                    '<div class="alert alert-danger" style="margin: 20px 30px;">'

                      . $this->session->flashdata('error').

                    '</div>';

                    }else if($this->session->flashdata('success'))

                    {

                      echo 

                    '<div class="alert alert-success" style="margin: 20px 30px;">'

                      . $this->session->flashdata('success').

                    '</div>'; 

                    }

                    ?>

            

            <div class="row">



                <div class="col-md-12">

                    <div class="card" style="padding: 20px 0px 20px 0px;">

                        <div class="card-header bg-white border-bottom">

                            <div class="row">

                               <div class="col-6 text-start"><b>Survey Bagian <?= $jenis; ?></b></div> 

                               <div class="col-6 text-end"><button type="button" class="btn btn-light btn-sm p-0" onclick="openModal()"><i class="far fa-question-circle me-2"></i>Panduan Pengisian</button></div> 

                            </div>

                            

                        </div>

                        <div class="card-body">

                            <h4 class="mt-3 header-title text-center" style="margin-bottom: 30px;" id="soal">Pertanyaan Survey</h4>

                            

                            <div class="text-center">

                                <form class="question" id="1">

                                <div class="row my-4" id="jawaban">

                                </div>

                                <button id="btn-nav" type="button" class="btn btn-primary btn-sm" onclick="nextPage()">Next <i class="fas fa-chevron-right ms-2"></i></button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>



            </div>



                <!-- Modal -->



        <!-- end row -->

        </div>

        

    </div>



    <div id="myModal" class="modal" style="

        display: none;

        position: fixed;

        z-index: 100000;

        left: 0;

        top: 0;

        width: 100%;

        height: 100%;

        padding:0px;

        overflow: hidden;

        background-color: rgb(0,0,0);

        background-color: rgba(0,0,0,0.4);">

      <!-- Modal content -->

      <div class="modal-content" style="

        background-color: #fefefe;

        margin: 10% auto;

        padding: 0px;

        border: 1px solid #888;

        width: 75%;">



        <div class="modal-header"><b>Petunjuk Pengisian</b></div>

        <div class="modal-body overflow-auto modal-test"></div>

        <div class="modal-footer justify-content-center">

            <button type="button" class="btn btn-primary btn-sm" onclick="closeModal()">Mengerti</button>

        </div>

      </div>



    </div>



    <script>

        $( document ).ready(function() {

            $('.modal-body').html(generateModal());

            $("#myModal").show();

        });



        function closeModal(){

            $("#myModal").hide();

        }



        function openModal(){

            $("#myModal").show();

        }



        function generateModal()

        {

            let type = <?= json_encode($jenis); ?>;

            switch(type){

                case "1":

                    return `<div>Pada bagian ini kami akan menyajikan beberapa pertanyaan terkait dengan faktor-faktor kepuasan pegawai di PDAM Surya Sembada. Bapak/Ibu kami mohon untuk menilai seberapa puas 

                    Bapak/Ibu terhadap faktor tersebut pada saat ini, dengan memilih salah satu respon dari 6 alternatif respon tingkat kepuasan yang disediakan</div><div class="row mt-2">

                    <div class="col-lg-6"><b>Tingkat Kepuasan</b>

                        <ol>

                            <li>STP (Sangat Tidak Puas)</li>

                            <li>TP (Tidak Puas)</li>

                            <li>KP (Kurang Puas)</li>

                            <li>CP (Cukup Puas)</li>

                            <li>P (Puas)</li>

                            <li>SP (Sangat Puas)</li>

                        </ol>

                    </div>

                    <div class="col-lg-6"><b>Tingkat Kepentingan</b>

                        <ol>

                            <li>STP (Sangat Tidak Penting)</li>

                            <li>TP (Tidak Penting)</li>

                            <li>KP (Kurang Penting)</li>

                            <li>CP (Cukup Penting)</li>

                            <li>P (Penting)</li>

                            <li>SP (Sangat penting)</li>

                        </ol>

                    </div></div>`

                case "2":

                    return `<div>Pada bagian ini, Bapak / Ibu akan dihadapkan pada beberapa pernyataan terkait pendapat Bapak/Ibu. Kami mohon untuk menilai seberapa setuju Bapak/Ibu terhadap pernyataan tersebut, 

                    dengan memilih salah satu respon dari 6 alternatif respon tingkat persetujuan yang disediakan.</div><div class="row mt-2">

                    <div class="col-lg-6">

                        <ol>

                            <li> STS (Sangat Tidak Setuju)</li>

                            <li> TS (Tidak Setuju)</li>

                            <li> KS (Kurang Setuju)</li>

                            <li> CS (Cukup Setuju)</li>

                            <li> S (Setuju)</li>

                            <li> SS (Sangat Setuju)</li>

                        </ol>

                    </div>

                    <div class="col-lg-6">

                    </div></div>`

                case "3":

                    return `<div>Pada bagian ini, Bapak / Ibu akan dihadapkan pada 2 pernyataan. Kami mohon untuk Bapak/ Ibu memberikan penilaian sesuai dengan pernyataan yang telah disediakan</div>`

                case "4":

                    return `<div>Pada bagian ini, jawablah pertanyaan-pertanyaan dibawah ini. Ingat, tidak ada jawaban benar dan salah</div>`

            }

        }

    </script>

    

    <script>

        let data = <?= json_encode($pertanyaan); ?>;

        let num = 1;

        let jenisSoal = 1;

        var answersList = [];

        console.log(data);



        if(localStorage.getItem("answer")){

            let temp = JSON.parse(localStorage.getItem("answer"))

            console.log(temp)

            num = temp.length +1;

            console.log("ini Num", num);

            $("#soal").text(num+'.'+data[num-1].soal);

            $("#jawaban").html(this.generateSkala(data, 0));

            if(answersList.length == 0){

                temp.map(item => {

                    answersList.push(item)

                })

            }

        }else{

            $("#soal").text(num+'.'+data[0].soal);

            $("#jawaban").html(this.generateSkala(data, 0));

        }

        

    

        function nextPage() {

            let empty = true;

            $(".question").each(function() {



                var questionId = $(this).attr("id");

                var answer1 = $("input[name='soal1']:checked", $(this)).val();

                var answer2 = $("input[name='soal2']:checked", $(this)).val();

                var essayAnswer = $('#exampleFormControlTextarea1').val();



                if((data[num-1].jenis == "1" && answer1 && answer2) || (data[num-1].jenis == "2" && answer1)  || (data[num-1].jenis == "3" && answer1) || (data[num-1].jenis == "4" && essayAnswer)){

                    answersList.push({

                      question: num,

                      answer: data[num-1].jenis == "1"?[answer1, answer2]:data[num-1].jenis == "4"?[essayAnswer]:[answer1]

                    });

                    console.log(typeof <?= json_encode($jenis); ?>);

              

                    empty = false;

                }

                else{

                    alert("Jawaban Masih Kosong, Mohon diisi terlebih dahulu")

                    empty = true;

                }

                            



            });

            if(!empty){

                $("input[name='soal1']:checked").prop('checked', false);

                $("input[name='soal2']:checked").prop('checked', false);

                localStorage.setItem("answer", JSON.stringify(answersList)); //store colors

                if(num>=data.length-1){

                    if(<?= json_encode($jenis); ?> == "4"){

                        $("#btn-nav").text('Submit');

                    }

                }

                if(num>=data.length){

                    console.log("ini Num", num);

                    let jawaban = localStorage.getItem("answer");

                    $.ajax({

                        url: "<?php echo site_url('survey_controller/submit_survey')?>",

                        type: 'post',

                        data: { 

                            'id_user': <?= $this->session->id_user?>,

                            'answer': jawaban,

                            'id_batch': <?= $this->session->id_batch?>,

                            'jenis': <?= json_encode($jenis); ?>

                        },

                        dataType: "json",

                        success: function(response) {

                        if (response.success == true) {

                            localStorage.clear();

                            let nextType = parseInt(<?= json_encode($jenis); ?>) + 1;

                            if(<?= json_encode($jenis); ?> != "4"){

                                window.location.href = `<?php echo site_url('/')?>survey_controller/pdam_test/${nextType}`;

                            }else{

                                window.location.href = "<?php echo site_url('survey_controller/thanks_page')?>";

                            }

                        }

                    },

                    })

                }else{

                    $("#soal").text(num+1+'.'+data[num].soal);

                    $("#jawaban").html(this.generateSkala(data, 0));

                    console.log(num);

                    num++;



                }

            }

            

        }

        

        

        function generateSkala(data, num)

        {

            let pilgan1=''

            let pilgan2=''

            switch(data[num].jenis){

                case "1":

                    pilgan1+= `<div class="col-lg-6 mb-3"><div><h6><b>Tingkat Kepuasan</b></h6><label>STP<br/>&nbsp;</label>`

                    pilgan2+= `<div class="col-lg-6"><div><h6><b>Tingkat Kepentingan</b></h6><label>STP<br/>&nbsp;</label>`

                    for(let i= 0; i<6; i++){

                        pilgan1+= `

                            <label class="form-check-label" for="inlineRadio${i+1}" style="text-align:center; padding:0px 5px;">

                                <input class="form-check-input" type="radio" name="soal1" id="inlineRadio${i+1}" value="${i+1}">

                                <br/>

                                ${i+1}

                            </label>

                        `

    

                        pilgan2+= `

                            <label class="form-check-label" for="inlineRadio${i+1}" style="text-align:center; padding:0px 5px;">

                                <input class="form-check-input" type="radio" name="soal2" id="inlineRadio${i+1}" value="${i+1}">

                                <br/>

                                ${i+1}

                            </label>

                    `

                    }

                    pilgan1+= `<label>SP<br/>&nbsp;</label></div></div>`

                    pilgan2+= `<label>SP<br/>&nbsp;</label></div></div>`

                    pilgan1+= pilgan2

                    return pilgan1

                    break;



                case "2":

                    pilgan1+= `<div class="col-lg-12 mb-2"><div><label>STS<br/>&nbsp;</label>`

                    for(let i= 0; i<6; i++){

                        pilgan1+= `

                            <label class="form-check-label" for="inlineRadio${i+1}" style="text-align:center; padding:0px 3px;">

                                <input class="form-check-input" type="radio" name="soal1" id="inlineRadio${i+1}" value="${i+1}">

                                <br/>

                                ${i+1}

                            </label>

                        `

                    }

                    pilgan1+= `<label>SS<br/>&nbsp;</label></div></div>`

                    return pilgan1;

                    break;



                case "3":

                    pilgan1+= `<div class="col-lg-12 mb-2"><div><label>STM<br/>&nbsp;</label>`

                    for(let i= 0; i<10; i++){

                        pilgan1+= `

                            <label class="form-check-label" for="inlineRadio${i+1}" style="text-align:center; padding:0px 3px;">

                                <input class="form-check-input" type="radio" name="soal1" id="inlineRadio${i+1}" value="${i+1}">

                                <br/>

                                ${i+1}

                            </label>

                        `

                    }

                    pilgan1+= `<label>SM<br/>&nbsp;</label></div></div>`

                    return pilgan1;

                    break;



                case "4":

                    let esai = `<div class="form-group mb-3 px-5">

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Tuliskan jawaban anda disini" style="height:100px"></textarea>

                            </div>`

                    return esai

                           

            }     

            

        }



        // Timer Countdown function 



        // var countDownDate = 1633070397154;



        // var x = setInterval(function() {



        //     var now = new Date().getTime();



        //     console.log(now);



        //     var distance = countDownDate - now;



        //     var days = Math.floor(distance / (1000 * 60 * 60 * 24));



        //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));



        //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));



        //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);



        //     document.getElementById("timer").innerHTML = "<b><i class='fas fa-hourglass-start me-2'></i></b>" + minutes + "m " + seconds + "s ";



        //     if (distance < 0) {

            

        //         clearInterval(x);

        //         // window.location.href = "<?php echo site_url('survey_controller/thanks_page')?>";

        

        // }



        // }, 1000);





    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



        

</body>