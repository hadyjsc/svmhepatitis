<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/tooplate-style.css">
    <link rel="stylesheet" href="../assets/jquery-toggles/toggles-full.css">
</head>
    <body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50" style="background-image: url('../assets/images/bgwizard.jpg');">
    <?php $this->beginBody() ?>
    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-5">
                    <p>Selamat Datang</p>
                </div>
            </div>
        </div>
    </header>
    <section class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #34495E;">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                </button>
                <!-- lOGO TEXT HERE -->
                <a href="<?= Url::to(["site/index"]) ?>" class="navbar-brand" style="color: #fff;">Diagnosa Hepatitis</a>
            </div>
            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-right: 5px;"><a href="<?= Url::to(["site/index"]) ?>" class="smoothScroll" style="color: #778899; background-color: #f5f5f5; border-radius: 18px;">Halaman Utama</a></li>
                    <li style="margin-right: 5px;"><a href="<?= Url::to(["site/hepatitis"]) ?>" class="smoothScroll" style="color: #778899; background-color: #f5f5f5; border-radius: 18px;">Hepatitis</a></li>
                    <li style="margin-right: 5px;"><a href="<?= Url::to(["site/cek-gejala"]) ?>" class="smoothScroll" style="color: #778899; background-color: #f5f5f5; border-radius: 18px;">Cek Gejala</a></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>

<script src="../assets/jquery-toggles/toggles.min.js"></script>
<script src="../assets/jquery-ui/jquery-ui.js"></script>
<script src="../assets/js/jquery.sticky.js"></script>
<script src="../assets/js/jquery.stellar.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/smoothscroll.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/custom.js"></script>
<script type="text/javascript">
    var datagejala = [];
    var datalab = [];
    var dataserologi = [];

      $(function(){

        'use strict'

        $("#virus-a").on('click',function() {
            if ($(this).is(':checked')) {
                $("#satu-inva").removeAttr("disabled");
                $("#dua-inva").removeAttr("disabled");
            }else {
                $("#satu-inva").attr("disabled","disabled");
                $('#satu-inva')[0].selectedIndex = 0;
                $("#dua-inva").attr("disabled","disabled");
                $('#dua-inva')[0].selectedIndex = 0;
            }
        });

        $("#virus-b").on('click',function() {
            if ($(this).is(':checked')) {
                $("#satu-invb").removeAttr("disabled");
                $("#dua-invb").removeAttr("disabled");
                $("#tiga-invb").removeAttr("disabled");
                $("#empat-invb").removeAttr("disabled");
            }else {
                $("#satu-invb").attr("disabled","disabled");
                $('#satu-invb')[0].selectedIndex = 0;
                $("#dua-invb").attr("disabled","disabled");
                $('#dua-invb')[0].selectedIndex = 0;
                $("#tiga-invb").attr("disabled","disabled");
                $('#tiga-invb')[0].selectedIndex = 0;
                $("#empat-invb").attr("disabled","disabled");
                $('#empat-invb')[0].selectedIndex = 0;
            }
        });

        $("#virus-c").on('click',function() {
            if ($(this).is(':checked')) {
                $("#satu-invc").removeAttr("disabled");
                $("#dua-invc").removeAttr("disabled");
            }else {
                $("#satu-invc").attr("disabled","disabled");
                $('#satu-invc')[0].selectedIndex = 0;
                $("#dua-invc").attr("disabled","disabled");
                $('#dua-invc')[0].selectedIndex = 0;
            }
        });

        $("#virus-d").on('click',function() {
            if ($(this).is(':checked')) {
                $("#satu-invd").removeAttr("disabled");
                $("#dua-invd").removeAttr("disabled");
                $("#tiga-invd").removeAttr("disabled");
            }else {
                $("#satu-invd").attr("disabled","disabled");
                $('#satu-invd')[0].selectedIndex = 0;
                $("#dua-invd").attr("disabled","disabled");
                $('#dua-invd')[0].selectedIndex = 0;
                $("#tiga-invd").attr("disabled","disabled");
                $('#tiga-invd')[0].selectedIndex = 0;
            }
        });

        $("#virus-e").on('click',function() {
            if ($(this).is(':checked')) {
                $("#satu-inve").removeAttr("disabled");
                $("#dua-inve").removeAttr("disabled");
                $("#tiga-inve").removeAttr("disabled");
            }else {
                $("#satu-inve").attr("disabled","disabled");
                $('#satu-inve')[0].selectedIndex = 0;
                $("#dua-inve").attr("disabled","disabled");
                $('#dua-inve')[0].selectedIndex = 0;
                $("#tiga-inve").attr("disabled","disabled");
                $('#tiga-inve')[0].selectedIndex = 0;
            }
        });

        var nilai = 0;
        $("#hitung1").click(function () {
            $("input:checkbox[name=gejala]").each(function(){
                if ($(this).is(':checked')) {
                    nilai = 1;
                }else {
                    nilai = 0;
                }
                datagejala.push(nilai);
            });
           console.log(datagejala);
            $.ajax({
                async: true,
                type: "POST",
                dataType: "JSON",
                url: "hitung-gejala",
                data:"data="+datagejala,
                beforeSend: function() {
                    $("#hitung1").html('<span class="fa fa-spiner fa-pulse"></span> &nbsp; Sedang Proses ...');
                },
                success: function(data){
                    // console.log(data);
                        var html = "";
                    if(data["response"]["code"] == "OK"){
                        $("#gejala_diagnosa").css("display","none");
                        $("#hasil_diagnosis").css("display","");
                        if (data["response"]["result_code"] == "1") {
                            html = "<br><div class='panel panel-danger'><div class='panel-heading'><h4> Anda <strong>"+data["response"]["result_string"]+"</strong></h4></div><div class='panel-body'>";
                            html += "Untuk memastikan anda benar-benar positif hepatitis, anda dapat melakukan pengujian menggunakan hasil Lab,silahkan tekan tombol Cek Data Lab dibawah.</div></div>";
                        }else {
                            html = "<br><div class='panel panel-info'><div class='panel-heading'><h4> Anda <strong>"+data["response"]["result_string"]+"</h4></div><div class='panel-body'>";
                            html += "Ingin menguji hasil lab silahkan tekan klik tombol Cek Data Lab.</div></div>";
                        }
                        $("#result1").html(html);
                        // console.log(data);
                    }  else {
                        console.log("Tidak ada data");
                    }
                }
            });
        });

        var nilaigejala = 0;
        var nilailab = 0;
        var nilaiserologi = "";
        $("#hitung2").click(function () {
            datagejala = [];
            datalab = [];
            dataserologi = [];

            $("input:checkbox[name=gejala]").each(function(){
                if ($(this).prop('checked') == true) {
                    nilaigejala = 1;
                }else {
                    nilaigejala = 0;
                }
                datagejala.push(nilaigejala);
            });

            $("input[type=number]").each(function(){
                if ($(this).val().length > 0) {
                    nilailab = Number($(this).val());
                }else {
                    nilailab = 0;
                }
                datalab.push(nilailab);
            });

            var mergeArray = $.merge(datagejala,datalab);

            $("select[name=serologi]").each(function(){
                if ($(this).val().length > 0) {
                    nilaiserologi = $(this).val();
                }else {
                    nilaiserologi = "0";
                }
                dataserologi.push(nilaiserologi);
            });
            
            console.log(mergeArray);

            $.ajax({
                async: true,
                type: "POST",
                dataType: "JSON",
                url: "hitung-lab",
                data:"data="+mergeArray,
                beforeSend: function() {
                    $("#hitung2").html('<span class="fa fa-spiner fa-pulse"></span> &nbsp; Sedang Proses ...');
                },
                success: function(data){
                    // console.log(data);
                        var html = "";
                    if(data["response"]["code"] == "OK"){
                        $("#gejala_lab").css("display","none");
                        $("#hasil_diagnosis").css("display","");
                        $("#lab_diagnosis").css("display","none");
                        $("#cekLab").css("display","none");
                        if (data["response"]["result_code"] == "1") {
                            html = "<br><div class='panel panel-danger'><div class='panel-heading'><h4> Anda <strong>"+data["response"]["result_string"]+"</strong></h4></div><div class='panel-body'>Silahkan Anda Berobat Agar Tidak Menjadi Penyakit Yang Berbahaya</div></div>";
                        }else {
                            html = "<br><div class='panel panel-info'><div class='panel-heading'><h4> Anda <strong>"+data["response"]["result_string"]+"</h4></div><div class='panel-body'>Jaga Kesehatan Anda Dan Saran2 Lainnya</div></div>";
                        }
                        $("#result1").html(html);
                        // console.log(data);
                    }  else {
                        console.log("Tidak ada data");
                    }
                }
            });
        });

        $("#cekLab").click(function(){
            $("#gejala_diagnosa").css("display","none");
            $("#hasil_diagnosis").css("display","none");
            $("#lab_diagnosis").css("display","");

        });

      });
</script>
</body>
</html>
<?php $this->endPage() ?>
