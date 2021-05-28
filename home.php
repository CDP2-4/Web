
<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>관리자 페이지 샘플</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>
<script>
	function w_open(p_url, p_name, p_width, p_height, p_top, p_left){
	window.open(p_url, p_name, "width="+p_width+", height="+p_height+", left="+p_left+", top="+p_top+", resizable=yes, scrollbars=auto");
}
</script>

<div id="wrap">
    <?php include "include/header.php";?>
    <div id="container">
		<?php include "include/a_side.php"; ?>
        <?php // 디비 연결 
			include "common/connection.php"; 
			$conn = new DBconn();
			$conn->connection();
			$query = "select * from admin_tbl";
			$result = mysqli_query($conn->connect, $query);
			$row = mysqli_fetch_array($result);
			
			printf("%s : %s", $row['admin_id'], $row['admin_pwd']);
		?>

    </div>
	<?php include "include/footer.php"; ?>
</div>