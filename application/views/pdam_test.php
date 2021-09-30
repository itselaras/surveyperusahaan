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
    <div class="wrapper" style="padding-top: 150px; padding-bottom: 30px;">
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
                        <div class="card-body">
                            <h4 class="mt-0 header-title text-center" style="margin-bottom: 30px;" id="soal">Pertanyaan Survey</h4>
                            
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
        <!-- end row -->
        </div>
        
    </div>
    <script>
        let data = <?= json_encode($pertanyaan); ?>;
        let num = 1;
        var answersList = [];

        $("#soal").text(num+'.'+data[0].soal);
        if(data[0].jenis == "skala"){
            let temp = this.generateSkala(data, 0);
            $("#jawaban").html(temp);
        }else{
            esai = `<div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Jawaban Anda </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>`
            $("#jawaban1").text('halo'); 
        }

        
    
        function nextPage() {
            $(".question").each(function() {

                var questionId = $(this).attr("id");
                var answer1 = $("input[name='soal1']:checked", $(this)).val();
                var answer2 = $("input[name='soal2']:checked", $(this)).val();
                var essayAnswer = $('#exampleFormControlTextarea1').val();
                            
                //if Answer isnt provided do not update the answersList
                if (1==1) {
                  answersList.push({
                    question: num,
                    answer: data[num-1].jenis == "skala"?[answer1, answer2]:[essayAnswer]
                  });
                  console.log(data[num-1].jenis);
                }
            });
            $("input[name='soal1']:checked").prop('checked', false);
            $("input[name='soal2']:checked").prop('checked', false);
            localStorage.setItem("answer", JSON.stringify(answersList)); //store colors
            if(num>=data.length-1){
                $("#btn-nav").removeClass( "btn-primary" );
                $("#btn-nav").addClass("btn-success");
                $("#btn-nav").text('Submit');
            }
            if(num>=data.length){
                console.log(localStorage.getItem("answer"))
                alert("submit")
                let jawaban = localStorage.getItem("answer");
                $.ajax({
                    url: "<?php echo site_url('survey_controller/submit_survey')?>",
                    type: 'post',
                    data: { 
                        'id_user': 1,
                        'answer': jawaban,
                        'id_batch': 10
                    },
                    dataType: "json",
                    success: function(response) {
                    if (response.success == true) {
                      alert("haloe")
                    }
                },
                })
            }else{
                $("#soal").text(num+1+'.'+data[num].soal);
                if(data[num].jenis == "skala"){
                    let temp = this.generateSkala(data, num);
                    $("#jawaban").html(temp);
                }else{
                    esai = `<div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>`
                    $("#jawaban1").html(esai);
                    pilgan2+= `` 
                    $("#jawaban2").html(pilgan2);
                }
                num++;

            }

            
            
        }
        
        function generateSkala(data, num)
        {
            let pilgan1=''
            let pilgan2=''
            if(data[num].jumlah == 10){
                pilgan1+= `<div class="col-lg-12 mb-2"><div><label>STM<br/>&nbsp;</label>`
                for(let i= 0; i<data[num].jumlah; i++){
                    pilgan1+= `
                        <label class="form-check-label" for="inlineRadio${i+1}" style="text-align:center; padding:0px 3px;">
                            <input class="form-check-input" type="radio" name="soal1" id="inlineRadio${i+1}" value="${i+1}">
                            <br/>
                            ${i+1}
                        </label>
                    `
                }
                pilgan1+= `<label>SM<br/>&nbsp;</label></div></div>`
                
            }else{
                pilgan1+= `<div class="col-lg-6 mb-3"><div><h6><b>Tingkat Kepuasan</b></h6><label>STP<br/>&nbsp;</label>`
                pilgan2+= `<div class="col-lg-6"><div><h6><b>Tingkat Kepentingan</b></h6><label>STP<br/>&nbsp;</label>`
                for(let i= 0; i<data[num].jumlah; i++){
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
            }

            
            return pilgan1
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <footer id="footer" class="mt-5">
 
    <div class="container">
            <div class="row">
                <div class="col-md-4">
                    </div>
                        <div class="social col-md-4 text-center">
                            <div class="panel-body" style="margin-top:0px;">
                                <p class="text-right">
                                    Copyright &copy; 2020. SMI IT Team
                                </p>
                            </div>
                        </div> 
                        <div class="col-md-4 panel">
        
                </div>
            </div>
            </div>
        </footer>
</body>