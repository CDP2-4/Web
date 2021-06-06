<?php include "../../common/session.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>QR 생성</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript" charset="utf-8"></script>
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
<div id="wrap">
    <?php include "../../include/header.php"; ?>
    <div id="container">
		<?php include "../../include/a_side.php"; ?>
		<ul class="title">
			<li><div class="mainTitle">QR 생성</div></li>
			<li><div class="subTitle">QR Generation</div></li>
		</ul>
		<div id="content2">
			<div class="box" id="qrfrm_box">
				<div class="qrfrm_content">
					<div class = "list_title" id="list_title">생성 개수</div>
					<form action = "QRPrintPage.php" method="get">
						<input id="QR_input" class="input_box" type="text" name="num"/>
						<input class="blue_btn" id="next" type="submit" value="다음"/>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include "../../include/footer.php"; ?>
</div>
