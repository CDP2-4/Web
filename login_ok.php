<?php
	include "./common/connection.php";
	include "./common/session.php";
	//session_start();
	
	$id = $_POST['id'];
	$pw = $_POST['pw'];

	$conn = new DBconn();
	$conn->connection();

	$query = "select admin_pwd from admin_tbl where admin_id='$id'";
	$result = mysqli_query($conn->connect, $query);
	$row = mysqli_fetch_array($result);
	
	$query2 = "select company_code, company_name, company_pwd from company_tbl where company_id='$id'";
	$result2 = mysqli_query($conn->connect, $query2);
	$row2 = mysqli_fetch_array($result2);
	
	// 관리자일 경우
	if($row != null) {
		if($pw == $row['admin_pwd']){
			$_SESSION['name'] = "admin";
		} 
		else {
			echo "
			<script>
				alert('비밀번호가 일치하지 않습니다.');
				history.back();
			</script>
			";
		}
	// 기업일 경우
	} 
	else if($row2 != null) {
		if($pw == $row2['company_pwd']) {
			$_SESSION['code'] = $row2['company_code'];
			$_SESSION['name'] = $row2['company_name'];
		}
		else {
			echo "
			<script>
				alert('비밀번호가 일치하지 않습니다.');
				history.back();
			</script>
			";
		}
	}
	// 둘 다 아닐 경우
	else {
		echo "
		<script>
			alert('존재하지 않는 아이디 입니다.');
			history.back();
		</script>
		";
	}

	if($_SESSION['name'] == "admin") {
		echo("<script>location.replace('/views/Admin/company_list.php');</script>");
	}
	else {
		echo("<script>location.replace('/views/ReceivingProcessingPage/ReceivingProcessingPage.php');</script>");
	}
?>