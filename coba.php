<?php 
    if(isset($_POST['submit'])){
        $thn = $_POST["tahun"];
        $bln = $_POST["bulan"];
    }
    else{
        $thn = $_POST["tahun"] = date("yyyy");
        $bln = $_POST["bulan"] = date("m");
    }

    $get_izin        = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_status_izin");
    $get_investasi   = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_investasi");
    $get_tenagakerja = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_tenagakerja");
    $get_izinterbit  = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_izinterbit/$bln/$thn");
    $get_retribusi   = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_retribusi");
    $get_ikm         = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_ikm");

    $izin            = json_decode($get_izin, true);
    $investasi       = json_decode($get_investasi, true);
    $tenaga          = json_decode($get_tenagakerja, true);
    $terbit          = json_decode($get_izinterbit, true);
    $retribusi       = json_decode($get_retribusi, true);
    $ikm             = json_decode($get_ikm, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo ("<META HTTP-EQUIV=Refresh CONTENT=\"300; URL=coba.php\">"); ?> 

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/kediri.png">
    <title>EIS DPMPTSP KOTA KEDIRI</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Online -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        tbody tr td {
            font-family: 'Poppins', sans-serif;
            color: #455a64;;
        }
        .alert-primary {
            background-color: #477ef8;
            border-color: #a2bfff;
            color: #fff;
        }
    </style>
    <script src="jquery-latest.js"></script>
</head>

<body class="fix-header fix-sidebar" onload="burung()">

    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
       <!-- header header  -->
        <div class="header">
            <a href="coba.php">
                <!-- Logo icon -->
                <b><img src="assets/images/kediri.png" alt="" class="dark-logo" height="40px"/></b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="assets/images/logo-text.png" alt="EIS DPMPTSP KOTA KEDIRI" class="dark-logo" style="color: #fff;" /></span>
            </a>
        </div>
        <!-- End header header -->
        <!-- Container fluid  -->
        <div class="container">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-sign-in fa-4x" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right" id="izin">
                                <h2><?php echo $izin['izin_masuk']; ?></h2>
                                <p class="m-b-0">Izin Masuk</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-spinner fa-4x" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right" id="izin">
                                <h2><?php echo $izin['izin_proses']; ?></h2>
                                <p class="m-b-0">Izin Dalam Proses</p>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle" id="izin">
                                <span><i class="fa fa-check-circle fa-4x" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2><?php echo $izin['izin_selesai']; ?></h2>
                                <p class="m-b-0">Izin Selesai</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle" id="izin">
                               <span><i class="fa fa-times fa-4x" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2><?php echo $izin['izin_ditolak']; ?></h2>
                                <p class="m-b-0">Izin Ditolak</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
            <div class="row">
                <!-- Realisasi Investasi Chart -->
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h6>Realisasi Investasi</h6> <hr>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Penyerapan Tenaga Kerja Chart -->
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h6>Penyerapan Tenaga Kerja</h6> <hr>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="barChart1"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Izin Terbit -->
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-9"> 
                                    <div class="panel-title">
                                        <h6>Izin Terbit</h6> <hr>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <form action="" method="post">
                                        <select id="tahun" name="tahun">
                                            <option value="<?php $t=date("Y"); echo $t; ?>">Pilih . . </option>
                                            <?php
                                                $thn_skr = date('Y');
                                                for ($x = $thn_skr; $x >= 2014; $x--) {
                                                ?>
                                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                }
                                              ?>
                                        </select>
                                        <select id="bulan" name="bulan">
                                            <option value="<?php $b=date("m"); echo $b; ?>">Pilih . . </option>
                                            <?php
                                                $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                $angka=array("01","02","03","04","05","06","07","08","09","10","11","12");
                                                $jlh_bln=count($bulan);
                                                for($c=0; $c<$jlh_bln; $c+=1){
                                                    echo"<option value=$angka[$c]> $bulan[$c] </option>";
                                                }
                                              ?>
                                        </select>
                                        <button type="submit" name="submit">Load</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <br>
                            <canvas id="barChart2"></canvas>
                        </div>
                    </div>
                </div>
                 <!-- Realisasi Retribusi Chart -->
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading"> 
                            <div class="panel-title">
                                <h6>Realisasi Retribusi</h6> <hr>
                            </div>
                        </div>
                        <div class="panel-body">
                            <canvas id="sales-chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Indeks Kepuasan Masyarakat Chart -->
                <div class="col-sm-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h6>Indeks Kepuasan Masyarakat</h6>  <hr>
                            </div>
                        </div>
                        <div class="panel-body">
                            <br>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Jumlah Responden</td>
                                        <td>:</td>
                                        <td><?php echo $ikm['jml_responden']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nilai rata-rata IKM</td>
                                        <td>:</td>
                                        <td><?php echo $ikm['rata_rata']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Indeks</td>
                                        <td>:</td>
                                        <td><?php echo $ikm['indeks']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div class="alert alert-primary" style="color: #fff;">
                              <center><strong><?php echo $ikm['nilai']; ?></strong></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End PAge Content -->
        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <script src="assets/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <!-- <script src="assets/js/custom-chart.js"></script> -->
    <!--Custom JavaScript -->
    <script src="assets/js/custom.min.js"></script>

    <script type="text/javascript">
        $('select').on('change', function() {
          alert( this.value );
        })
    </script>

    <!-- Chart -->
    <script type="text/javascript">
        //Realisasi Investasi chart
        var ctx = document.getElementById( "bar-chart" );
           ctx.height = 150;
           ctx = setTimeout(3000);
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
              labels: ["<?php echo $investasi[1]['tahun']; ?>", "<?php echo $investasi[2]['tahun']; ?>", "<?php echo $investasi[3]['tahun']; ?>", "<?php echo $investasi[4]['tahun']; ?>", "<?php echo $investasi[5]['tahun']; ?>"],
              datasets: [
                {
                  label: "Realisasi",
                  backgroundColor: "rgba(0,153,204)",
                  data: 
                  [<?php echo $investasi[1]['realisasi']; ?>, <?php echo $investasi[2]['realisasi']; ?>, <?php echo $investasi[3]['realisasi']; ?>, <?php echo $investasi[4]['realisasi']; ?>, <?php echo $investasi[5]['realisasi']; ?>]
                },
                {
                        label: "Target",
                        data: [ <?php echo $investasi[1]['target']; ?>, <?php echo $investasi[2]['target']; ?>, <?php echo $investasi[3]['target']; ?>, <?php echo $investasi[4]['target']; ?>, <?php echo $investasi[5]['target']; ?> ],
                        borderColor: "rgba(0,0,0,0.09)",
                        borderWidth: "0",
                        backgroundColor: "rgba(146,205,0)"
                                }
              ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                    } ]
                }
            }
        });

        //Penyerapan Tenaga Kerja chart
        var ctx = document.getElementById( "barChart1" );
           ctx.height = 150;
        var myChart = new Chart( ctx, {
            type: 'bar',
            data: {
                labels: [ "<?php echo $tenaga[1]['tahun']; ?>", "<?php echo $tenaga[2]['tahun']; ?>", "<?php echo $tenaga[3]['tahun']; ?>", "<?php echo $tenaga[4]['tahun']; ?>", "<?php echo $tenaga[5]['tahun']; ?>" ],
                datasets: [
                    {
                        label: "Realisasi",
                        data: [ <?php echo $tenaga[1]['realisasi']; ?>, <?php echo $tenaga[2]['realisasi']; ?>, <?php echo $tenaga[3]['realisasi']; ?>, <?php echo $tenaga[4]['realisasi']; ?>, <?php echo $tenaga[5]['realisasi']; ?> ],
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0,153,204)"
                                },
                    {
                        label: "Target",
                        data: [ <?php echo $tenaga[1]['target']; ?>, <?php echo $investasi[2]['target']; ?>, <?php echo $investasi[3]['target']; ?>, <?php echo $investasi[4]['target']; ?>, <?php echo $investasi[5]['target']; ?> ],
                        borderColor: "rgba(0,0,0,0.09)",
                        borderWidth: "0",
                        backgroundColor: "rgba(146,205,0)"
                                }
                            ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                                    } ]
                }
            }
        } );

        //Izin Terbit
        var ctx = document.getElementById( "barChart2" );
        ctx.height = 250;
        var myChart = new Chart( ctx, {
            type: 'horizontalBar',
            data: {
                labels:
                // [ "<?php echo $terbit[0]['jenis_ijin']; ?>", "<?php echo $terbit[1]['jenis_ijin']; ?>", "<?php echo $terbit[2]['jenis_ijin']; ?>", "<?php echo $terbit[3]['jenis_ijin']; ?>", "T<?php echo $terbit[4]['jenis_ijin']; ?>", "<?php echo $terbit[5]['jenis_ijin']; ?>", "<?php echo $terbit[6]['jenis_ijin']; ?>", "<?php echo $terbit[7]['jenis_ijin']; ?>", "<?php echo $terbit[8]['jenis_ijin']; ?>", "<?php echo $terbit[9]['jenis_ijin']; ?>", "<?php echo $terbit[10]['jenis_ijin']; ?>", "<?php echo $terbit[11]['jenis_ijin']; ?>", "<?php echo $terbit[12]['jenis_ijin']; ?>","<?php echo $terbit[13]['jenis_ijin']; ?>", "<?php echo $terbit[14]['jenis_ijin']; ?>", "<?php echo $terbit[15]['jenis_ijin']; ?>", "<?php echo $terbit[16]['jenis_ijin']; ?>", "<?php echo $terbit[17]['jenis_ijin']; ?>", "<?php echo $terbit[18]['jenis_ijin']; ?>", "<?php echo $terbit[19]['jenis_ijin']; ?>" ],
                [<?php foreach ($terbit as $ter) { echo '"' . $ter['jenis_ijin'] . '",';}?>],
                datasets: [
                    {
                        data: 
                        // [ <?php echo $terbit[0]['jml']; ?>, <?php echo $terbit[1]['jml']; ?>, <?php echo $terbit[2]['jml']; ?>, <?php echo $terbit[3]['jml']; ?>, <?php echo $terbit[4]['jml']; ?>, <?php echo $terbit[5]['jml']; ?>, <?php echo $terbit[6]['jml']; ?>, <?php echo $terbit[7]['jml']; ?>, <?php echo $terbit[8]['jml']; ?>, <?php echo $terbit[9]['jml']; ?>, <?php echo $terbit[10]['jml']; ?>, <?php echo $terbit[11]['jml']; ?>, <?php echo $terbit[12]['jml']; ?>, <?php echo $terbit[13]['jml']; ?>, <?php echo $terbit[14]['jml']; ?>, <?php echo $terbit[15]['jml']; ?>, <?php echo $terbit[16]['jml']; ?>, <?php echo $terbit[17]['jml']; ?>, <?php echo $terbit[18]['jml']; ?>, <?php echo $terbit[19]['jml']; ?> ],
                        [<?php foreach ($terbit as $j) { echo '"' . $j['jml'] . '",';} ?>],
                        borderColor: "rgba(255,204,0)",
                        borderWidth: "0",
                        backgroundColor: "rgba(255,204,0)"
                                }
                            ]
            },
            options: {
                scales: {
                    yAxes: [ {
                        ticks: {
                            beginAtZero: true
                        }
                                    } ]
                }
            }
        } );
        myChart = setTimeout(3000);

        //Sales chart
        var ctx = document.getElementById( "sales-chart" );
        ctx.height = 150;
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: [ "<?php echo $retribusi[1]['tahun']; ?>", "<?php echo $retribusi[2]['tahun']; ?>", "<?php echo $retribusi[3]['tahun']; ?>", "<?php echo $retribusi[4]['tahun']; ?>", "<?php echo $retribusi[5]['tahun']; ?>" ],
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [ {
                    label: "Realisasi",
                    data: [ <?php echo $retribusi[1]['realisasi']; ?>, <?php echo $retribusi[2]['realisasi']; ?>, <?php echo $retribusi[3]['realisasi']; ?>, <?php echo $retribusi[4]['realisasi']; ?>, <?php echo $retribusi[5]['realisasi']; ?> ],
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(0,153,204)',
                    borderWidth: 3,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'rgba(0,153,204)',
                        }, {
                    label: "Target",
                    data: [ <?php echo $retribusi[1]['target']; ?>, <?php echo $retribusi[2]['target']; ?>, <?php echo $retribusi[3]['target']; ?>, <?php echo $retribusi[4]['target']; ?>, <?php echo $retribusi[5]['target']; ?> ],
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(40,167,69,0.75)',
                    borderWidth: 3,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'rgba(40,167,69,0.75)',
                        } ]
            },
            options: {
                responsive: true,

                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                legend: {
                    display: false,
                    labels: {
                        usePointStyle: true,
                        fontFamily: 'Montserrat',
                    },
                },
                scales: {
                    xAxes: [ {
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: false,
                            labelString: 'Tahun'
                        }
                            } ],
                    yAxes: [ {
                        display: true,
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        scaleLabel: {
                            display: true,
                            labelString: ''
                        }
                            } ]
                },
                title: {
                    display: false,
                    text: 'Normal Legend'
                }
            }
        } );
    </script>

</body>

</html>