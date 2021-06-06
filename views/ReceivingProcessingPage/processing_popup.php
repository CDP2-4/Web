<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>입고 처리 팝업</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_ReceivingProcessingPage.css" />

</head>
<script>
	function refreshPage() {
		opener.refreshPage();
	}
</script>
<?php
	$product_qr = $_POST["product_qr"];
	$image_name = ($_POST).".png";
	$warehousing_time = $_POST["warehousing_time"];
	$warehousing_user_id = $_POST["warehousing_user_id"];
	$warehouse_no = $_POST["warehouse_no"];
	$company_code = $_POST["company_code"];

	include "../../common/connection.php";

	$conn = new DBconn();
	$conn->connection();

	$query = "SELECT warehousing_label FROM warehousing_tbl WHERE product_QR='$product_qr'";

	$result = mysqli_query($conn->connect, $query);
	$row = mysqli_fetch_array($result);
	
	$image_name = $row['warehousing_label'];
?>
<body style="overflow-X:hidden; overflow-Y:hidden;">
<div id="wrap">
	<div class = "picture">
		<img id="cas_picture" src="../../app/upload_img/<?php echo $image_name; ?>"/>
	</div>
	<form action="processing_ok.php" method="post">
		<input type="hidden" value="<?php echo $product_qr; ?>" name="product_qr" />			<input type="hidden" name="warehousing_time" value="<?php echo $warehousing_time; ?>">
		<input type="hidden" name="warehousing_user_id" value="<?php echo $warehousing_user_id; ?>">
		<input type="hidden" name="warehouse_no" value="<?php echo $warehouse_no; ?>">
		<input type="hidden" name="company_code" value="<?php echo $company_code; ?>">

		<div class = "list_title">CAS번호</div>
		<input class="input_box" type="text" name="product_cas" />			
		<div class = "list_title">이름</div>
		<input class="input_box" type="text" name="product_name" />
		<br><br><br><br>
		<input class="blue_btn" id="warehouse_register_button" type="submit" value="완료" />
	</form>
</div>

</body>
</html>