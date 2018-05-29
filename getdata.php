<?php
	if (isset($_POST['bulan']) or isset($_POST['tahun'])) {
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$get_izinterbit  = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_izinterbit/$bln/$thn");
		echo $get_izinterbit;
	}
	else{
		$thn = $_POST["tahun"] = date("yyyy");
      	$bln = $_POST["bulan"] = date("m");
      	$get_izinterbit  = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_izinterbit/$bln/$thn");

      	$terbit          = json_decode($get_izinterbit, true);
        //echo $terbit;
  	  	foreach ($terbit as $key) {
          	if (is_array($key)) {
              	foreach ($key as $key => $value) {
                  	// echo $key . ' : ' . $value;
              	}
          	}
      	}
	}

	$get_izin        = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_status_izin");
    $get_investasi   = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_investasi");
    $get_tenagakerja = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_tenagakerja");
    //$get_izinterbit  = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_izinterbit/$bln/$thn");
    $get_retribusi   = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_retribusi");
    $get_ikm         = file_get_contents("http://kswi.dpm.kedirikota.go.id/frontend/index.php/api/get_ikm");

    $izin            = json_decode($get_izin, true);
    $investasi       = json_decode($get_investasi, true);
    $tenaga          = json_decode($get_tenagakerja, true);
    //$terbit          = json_decode($get_izinterbit, true);
    $retribusi       = json_decode($get_retribusi, true);
    $ikm             = json_decode($get_ikm, true);
?>