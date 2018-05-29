<?php 
    include('getdata.php');
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
    <?php echo ("<META HTTP-EQUIV=Refresh CONTENT=\"300; URL=index.php\">"); ?> 

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
            <a href="index.php">
                <!-- Logo icon -->
                <b><img src="assets/images/kediri.png" alt="" class="dark-logo" height="40px"/></b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span style="color: #fff;">EIS DPMPTSP KOTA KEDIRI</span>
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
                                            <option>Tahun</option>
                                            <?php
                                                $thn_skr = date('Y');
                                                for ($x = $thn_skr; $x >= 2013; $x--) {
                                                ?>
                                                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                                <?php
                                                }
                                              ?>
                                        </select>
                                        <select id="bulan" name="bulan" disabled="">
                                            <option>Bulan</option>
                                            <?php
                                                $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                $angka=array("01","02","03","04","05","06","07","08","09","10","11","12");
                                                $jlh_bln=count($bulan);
                                                for($c=0; $c<$jlh_bln; $c+=1){
                                                    echo"<option value=$angka[$c]> $bulan[$c] </option>";
                                                }
                                              ?>
                                        </select>
                                        <!-- <button type="submit" name="submit">Load</button> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
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
                            <br>
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
        // $('#tahun').on('change', function() {
        //   var tahun = $(this).val();
        //   responsive: true
        //   if (tahun == '')
        //     {
        //       $('#bulan').prop('disabled', true);
        //     }
        //   else {
        //       //alert( this.value );
        //       $('#bulan').prop('disabled', false);
        //           $.ajax({
        //                 url:"izinterbit.php",
        //                 data: {'tahun' : tahun},
        //                 success: function(data){
        //                   alert(data);
        //                   terbit(data);
        //                 },
        //                 error: function(){
        //                   alert('error...');
        //                 }
        //           });
        //   }
        // })

        $(document).ready(function() {
          $('#tahun').on('change',function(){
            var tahun = $(this).val();
            responsive: true
            if (tahun == '')
            {
              $('#bulan').prop('disabled', true);
            }
            else {
              //alert( this.value );
              $('#bulan').prop('disabled', false);
              $('#bulan').on('change',function(){
                var bulan = $(this).val();
                $.ajax({
                    url:"getdata.php",
                    type: "POST",
                    data: {'tahun' : tahun, 'bulan' : bulan},
                    //dataType: 'json',
                    success: function(data){
                      alert(data);
                      terbit(data);
                    },
                    error: function(){
                      alert('error...');
                    }
                });
              })
            }
          });
        });

        function terbit(data)
        {
            //Izin Terbit
            var ctx = document.getElementById( "barChart2" );
            //ctx.height = 250;
            var myChart = new Chart( ctx, {
                type: 'horizontalBar',
                data: {
                    labels:  [<?php foreach ($terbit as $ter) { echo '"' . $ter['jenis_ijin'] . '",';}?>],
                    datasets: [
                        {
                            label: "Jumlah",
                            data: [<?php foreach ($terbit as $j) { echo '"' . $j['jml'] . '",';} ?>],
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
        }
    </script>


    <!-- Chart -->
    <script type="text/javascript">
        //Realisasi Investasi chart
        var ctx = document.getElementById( "bar-chart" );
           ctx.height = 200;
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
               labels: [<?php foreach ($investasi as $i) { echo '"' . $i['tahun'] . '",';}?>],
              datasets: [
                {
                  label: "Realisasi",
                  backgroundColor: "rgba(0,153,204)",
                  data: [<?php foreach ($investasi as $r) { echo '"' . $r['realisasi'] . '",';} ?>]
                },
                {
                        label: "Target",
                        data: [<?php foreach ($investasi as $t) { echo '"' . $t['target'] . '",';} ?>],
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
           ctx.height = 200;
        var myChart = new Chart( ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($tenaga as $te) { echo '"' . $te['tahun'] . '",';}?>],
                datasets: [
                    {
                        label: "Realisasi",
                        data:[<?php foreach ($tenaga as $re) { echo '"' . $re['realisasi'] . '",';} ?>],
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0,153,204)"
                                },
                    {
                        label: "Target",
                        data: [<?php foreach ($tenaga as $tar) { echo '"' . $tar['target'] . '",';} ?>],
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
        ctx.height = 240;
        var myChart = new Chart( ctx, {
            type: 'horizontalBar',
            data: {
                labels:  [<?php foreach ($terbit as $ter) { echo '"' . $ter['jenis_ijin'] . '",';}?>],
                datasets: [
                    {
                        label: "Jenis Izin",
                        data: [<?php foreach ($terbit as $j) { echo '"' . $j['jml'] . '",';} ?>],
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

        //Retribusi chart
        var ctx = document.getElementById( "sales-chart" );
        ctx.height = 150;
        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: [<?php foreach ($retribusi as $retri) { echo '"' . $retri['tahun'] . '",';}?>],
                type: 'line',
                defaultFontFamily: 'Montserrat',
                datasets: [ {
                    label: "Realisasi",
                    data: [<?php foreach ($retribusi as $rea) { echo '"' . $rea['realisasi'] . '",';} ?>],
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(0,153,204)',
                    borderWidth: 3,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'rgba(0,153,204)',
                        }, {
                    label: "Target",
                    data: [<?php foreach ($retribusi as $targ) { echo '"' . $targ['target'] . '",';} ?>],
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
                    display: true,
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
                }
            }
        } );
    </script>

</body>

</html>