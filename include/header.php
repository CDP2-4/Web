<?php include "../../common/session.php"; ?>
<?php 
   if(!$_SESSION['name']){
      echo "<script>alert('로그인해야 이용 가능합니다!');</script>";
        echo "<script>location.replace('/index.php');</script>";
}
?>

<div id="header">
		<div id="logo_area">
            <img src="/images/logo.png" width="200" alt="로고 샘플 이미지" />
        </div>

        <ul id="gnb">
            <li><a href="/common/logout_ok.php">로그아웃</a></li>
			<li><?php echo $_SESSION['name'];?></li>
        </ul>
</div>