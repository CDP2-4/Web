<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>QR 인쇄</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_QRGenerationPage.css" />

</head>
<script>
	function w_open(p_url, p_name, p_width, p_height, p_top, p_left){
	window.open(p_url, p_name, "width="+p_width+", height="+p_height+", left="+p_left+", top="+p_top+", resizable=yes, scrollbars=auto");
}
</script>

<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

    include "../../common/phpqrcode/qrlib.php";

	$Today = new DateTime();
	$DateAndTime = $Today->format("Y-m-d h:i:s");
	//echo  'md5 : '.md5($DateAndTime).'<br>';
	//echo  'substr() : '.substr(md5($DateAndTime),5,14).'<br>';
	//echo  'DateAndTime : ' .$DateAndTime. '<br>';

	//날짜-시간 값을 md5로 변환한 후 문자열 자르기
	$product_QR = substr(md5($DateAndTime),5,14);
	//echo "$product_QR";
?>

<body>
	<div id="page_hor">
		<div id="qr_area">
		<?php
		$num = $_GET['num'];
		for($i=1; $i<=(int)$num; $i++)
		{
			$qrContents = $product_QR.$i;
			$fileName = md5($qrContents).".png";
			$filePath = "Cache/$fileName";
				   
			if(!file_exists($filePath)) {
				$ecc = 'H';
				$pixel_Size = 4;
				$frame_Size = 2;
				//QRcode::png($qrContents, $filePath, $ecc, $pixel_Size, $frame_Size);
				QRcode::png($qrContents, $filePath, $ecc, $pixel_Size, $frame_Size);
				//QRcode::png($qrContents, $filePath, $ecc, $pixel_Size, $frame_Size);
				//echo "파일이 정상적으로 생성되었습니다.";
				//echo "<hr/>";
			} else {
				//echo "파일이 이미 생성되어 있습니다.\n파일을 지우거나 이름을 바꾸어 실행하세요.";
				//echo "<hr/>";
			}
			//echo "저장된 파일명 : ".$filePath;
			//echo "<hr/>";
			//echo "<h1>$warehouse_name</h1>";
			
			echo "<img src='".$filePath."' width='130px' height='130px'/>";
//			if($i%8==0)
//			echo "<br/>";
		}
		?>
		</div>
	</div>
</body>