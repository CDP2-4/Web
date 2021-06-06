<?php 
	include 'session.php';

	if($login) {
		session_destroy();
		echo "<script>alert('로그아웃 되었습니다.');</script>";
        echo "<script>location.replace('/');</script>";
	} else {
		echo "<script>alert('로그인 상태가 아닙니다.');</script>";
        echo "<script>location.replace('/');</script>";
	}
?>