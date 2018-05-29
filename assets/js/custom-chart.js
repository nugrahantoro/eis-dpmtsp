( function ( $ ) {
	"use strict";

	 //Realisasi Investasi chart
        var ctx = document.getElementById( "bar-chart" );
           ctx.height = 200;
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
              labels: ["<?php echo $investasi[1]['tahun']; ?>", "<?php echo $investasi[2]['tahun']; ?>", "<?php echo $investasi[3]['tahun']; ?>", "<?php echo $investasi[4]['tahun']; ?>", "<?php echo $investasi[5]['tahun']; ?>"],
              datasets: [
                {
                  label: "Realisasi",
                  backgroundColor: "rgba(0,153,204)",
                  data: [<?php echo $investasi[1]['realisasi']; ?>, <?php echo $investasi[2]['realisasi']; ?>, <?php echo $investasi[3]['realisasi']; ?>, <?php echo $investasi[4]['realisasi']; ?>, <?php echo $investasi[5]['realisasi']; ?>]
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
           ctx.height = 200;
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
        ctx.height = 100;
        var myChart = new Chart( ctx, {
            type: 'horizontalBar',
            data: {
                labels: [ "<?php echo $terbit[0]['jenis_ijin']; ?>", "<?php echo $terbit[1]['jenis_ijin']; ?>", "<?php echo $terbit[2]['jenis_ijin']; ?>", "<?php echo $terbit[3]['jenis_ijin']; ?>", "T<?php echo $terbit[4]['jenis_ijin']; ?>", "<?php echo $terbit[5]['jenis_ijin']; ?>", "<?php echo $terbit[6]['jenis_ijin']; ?>", "<?php echo $terbit[7]['jenis_ijin']; ?>", "<?php echo $terbit[8]['jenis_ijin']; ?>", "<?php echo $terbit[9]['jenis_ijin']; ?>", "<?php echo $terbit[10]['jenis_ijin']; ?>", "<?php echo $terbit[11]['jenis_ijin']; ?>", "<?php echo $terbit[12]['jenis_ijin']; ?>","<?php echo $terbit[13]['jenis_ijin']; ?>", "<?php echo $terbit[14]['jenis_ijin']; ?>", "<?php echo $terbit[15]['jenis_ijin']; ?>", "<?php echo $terbit[16]['jenis_ijin']; ?>", "<?php echo $terbit[17]['jenis_ijin']; ?>", "<?php echo $terbit[18]['jenis_ijin']; ?>", "<?php echo $terbit[19]['jenis_ijin']; ?>" ],
                datasets: [
                    {
                        data: [ <?php echo $terbit[0]['jml']; ?>, <?php echo $terbit[1]['jml']; ?>, <?php echo $terbit[2]['jml']; ?>, <?php echo $terbit[3]['jml']; ?>, <?php echo $terbit[4]['jml']; ?>, <?php echo $terbit[5]['jml']; ?>, <?php echo $terbit[6]['jml']; ?>, <?php echo $terbit[7]['jml']; ?>, <?php echo $terbit[8]['jml']; ?>, <?php echo $terbit[9]['jml']; ?>, <?php echo $terbit[10]['jml']; ?>, <?php echo $terbit[11]['jml']; ?>, <?php echo $terbit[12]['jml']; ?>, <?php echo $terbit[13]['jml']; ?>, <?php echo $terbit[14]['jml']; ?>, <?php echo $terbit[15]['jml']; ?>, <?php echo $terbit[16]['jml']; ?>, <?php echo $terbit[17]['jml']; ?>, <?php echo $terbit[18]['jml']; ?>, <?php echo $terbit[19]['jml']; ?> ],
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
                    borderColor: 'rgba(220,53,69,0.75)',
                    borderWidth: 3,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointBorderColor: 'transparent',
                    pointBackgroundColor: 'rgba(220,53,69,0.75)',
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

} )( jQuery );
