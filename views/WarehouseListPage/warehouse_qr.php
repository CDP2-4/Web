
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/default.css" />

<body>
<div id="page_ver">
<?php
	include "../../common/connection.php";

	$conn = new DBconn();
	$conn->connection();

	$no = $_GET['no'];
	$query = "select warehouse_name, warehouse_addr from warehouse_tbl where no='".$no."'";
			
	$result = mysqli_query($conn->connect, $query);
	$row = mysqli_fetch_array($result);

	$warehouse_name = $row['warehouse_name'];
	//$warehouse_addr = $row['warehouse_addr'];

	$conn->close();
		
	//이페이지 QR코드에는 창고번호가 들어가야함.
	//오류확인코드
	error_reporting(E_ALL);
	ini_set("display_errors", 1);


    include "../../common/phpqrcode/qrlib.php";

	//$Today = new DateTime();
	//$DateAndTime = $Today->format("Y-m-d h:i:s");
	//echo  'md5 : '.md5($DateAndTime).'<br>';
	//echo  'substr() : '.substr(md5($DateAndTime),5,14).'<br>';
	//echo  'DateAndTime : ' .$DateAndTime. '<br>';

	//날짜-시간 값을 md5로 변환한 후 문자열 자르기
	//$product_QR = substr(md5($DateAndTime),5,14);
	//$qrContents = $product_QR;
	$qrContents = $no;

	$fileName = md5($qrContents).".png";
	$filePath = "Cache/$fileName";
   
    if(!file_exists($filePath)) {
        $ecc = 'H';
		$pixel_Size = 100;
		$frame_Size = 10;
        //QRcode::png($qrContents, $filePath, $ecc, $pixel_Size, $frame_Size);
		//QRcode::png($qrContents);
		QRcode::png($qrContents, $filePath, $ecc, $pixel_Size, $frame_Size);
        //echo "파일이 정상적으로 생성되었습니다.";
        //echo "<hr/>";
    } else {
        //echo "파일이 이미 생성되어 있습니다.\n파일을 지우거나 이름을 바꾸어 실행하세요.";
        //echo "<hr/>";
    }

    //echo "저장된 파일명 : ".$filePath;
    //echo "<hr/>";

    echo "<div class='mainTitle'>$warehouse_name</h1>";
	echo "<img src='".$filePath."'/>";

?>
</div>
</body>