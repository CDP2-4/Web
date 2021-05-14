<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>샘플 팝업</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/popup.css" />
</head>

<body>
<div id="wrap">
    <h1>비밀번호</h1>
    <div class="member_input_area">
        <form name="write_frm" method="post" action="#" onsubmit="return form_chk(this);">
        <dl class="member_input">
            <dt>이름</dt>
            <dd>홍길동</dd>
            <dt>활성화유무</dt>
            <dd>
                <select name="use_yn">
                    <option value="Y"selected="selected">활성화</option>
                    <option value="N">사용안함</option>
                </select>
            </dd>
        </dl>
        <div class="btn_area01"><input type="submit" value="변경" class="darkblue_sbtn" /> <input type="button" value="닫기" class="darkgray_sbtn" onclick="window.close();" /></div>
        </form>
    </div>
</div>
</body>
</html>