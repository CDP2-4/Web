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
<body>
	<div id="wrap">
		<?php include "../../include/header.php"; ?>
		<div id="container">
			<?php include "../../include/a_side.php"; ?>
			<ul class="title">
				<li><div class="mainTitle">QR 생성</div></li>
				<li><div class="subTitle">QR Generation</div></li>
			</ul>
			<form onsubmit id="print_form">
               <input class="blue_btn" id="print" type="button" value="인쇄"/>
               <input class="blue_btn" id="cancel" type="button" value="취소"/>
            </form>
			<div id="content2">
				<div class="box" id="print_box">
					<div class="qr_image">
					<?php
					$num = $_GET['num'];
					for($i=1; $i<=(int)$num; $i++)
					{
						echo "<img src='/images/QR_image.png' alt='hi'>";

						if($i%8==0)
						echo "<br/>";
					}
				?>
				</div>

				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
		
	</div>
</body>