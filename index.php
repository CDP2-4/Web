<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>로그인</title>
<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>

<body>
<div id="wrap">
    <div id="login_area">
        <h1 class="login_h1"><img src="/images/logo01.png" width="300" alt="로고 샘플 이미지" /></h1>
        <div class="login_box">
            <form name="login_frm" method="post" action="home.php" onsubmit="return form_chk(this);">
            <ul class="login_form">
                <li class="id"><input type="text" name="uid" value="" placeholder="아이디" /></li>
                <li class="pw"><input type="password" name="upw" value="" placeholder="비밀번호" /></li>
            </ul>
            <div class="login_btn"><input type="button" value="로그인" onClick="location.href='/views/ReceivingProcessingPage/ReceivingProcessingPage.php'"/></div>
            </form>
        </div>
    </div>
</body>
</html>