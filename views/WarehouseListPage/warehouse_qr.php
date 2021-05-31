<?php

	//이페이지 QR코드에는 창고번호가 들어가야함.
	//오류확인코드
	error_reporting(E_ALL);
	ini_set("display_errors", 1);


    include "../../common/phpqrcode/qrlib.php";

	$warehouse_num = $_GET['warehouse_num'];

	$Today = new DateTime();
	$DateAndTime = $Today->format("Y-m-d h:i:s");
	//echo  'md5 : '.md5($DateAndTime).'<br>';
	//echo  'substr() : '.substr(md5($DateAndTime),5,14).'<br>';
	//echo  'DateAndTime : ' .$DateAndTime. '<br>';

	//날짜-시간 값을 md5로 변환한 후 문자열 자르기
	$product_QR = substr(md5($DateAndTime),5,14);
	//$qrContents = $product_QR;
	$qrContents = $warehouse_num;

	$filePath = md5($qrContents).".png";


   
    if(!file_exists($filePath)) {
        $ecc = 'H';
		$pixel_Size = 100;
		$frame_Size = 10;
        //QRcode::png($qrContents, $filePath, $ecc, $pixel_Size, $frame_Size);
		//QRcode::png($qrContents);
		QRcode::png($qrContents, false, $ecc, $pixel_Size, $frame_Size);
        echo "파일이 정상적으로 생성되었습니다.";
        echo "<hr/>";
    } else {
        echo "파일이 이미 생성되어 있습니다.\n파일을 지우거나 이름을 바꾸어 실행하세요.";
        echo "<hr/>";
    }
   
    //echo "저장된 파일명 : ".$filePath;
    //echo "<hr/>";
    //echo "<img src='".$filePath."'/>";

?>