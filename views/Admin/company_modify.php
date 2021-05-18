<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>업체 정보 수정</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_Admin.css" />

</head>

<div id="wrap">
    <?php include "../../include/header.php";?>
    <div id="container">
		<?php include "../../include/b_side.php"; ?>
		<ul class="title">
            <li>
                <div class="mainTitle">
                    업체 정보 수정
                </div>
            </li>
            <li>
                <div class="subTitle">
                    Modify company information
                </div>
            </li>
        </ul>
        <div id="content2" >
			<div class = "list_title">
					<span style="color:red">*</span>업체 이름
					<span style="margin-left : 350px;"></span>업체 고유번호
			</div>
				<form onsubmit>
				<input class="input_box" type="text" value = "삼성"/>
				</form>
				<form onsubmit>
				<input class="input_box" type="text" value = "65AF" style = "margin-left: 150px;" disabled/>
				</form>
				
			<div class = "list_title">
					<span style="color:red">*</span>관리자 아이디
					<span style="color:red; margin-left : 300px;">*</span>관리자 비밀번호
			</div>
				<form onsubmit>
				<input class="input_box" type="text" value = "sam06"/>
				</form>
                <form onsubmit>
				<input class="input_box" type="text" value = "!sam*" style = "margin-left: 150px;"/>
				</form>

			<div class = "list_title">
                <span style="color:red">*</span>주소
				<span style="margin-left:750px;"></span>비고
			</div>
                <form onsubmit>
				<input id = "address1" class="input_box" type="text"/>
				<input id = "address2" class="input_box" type="text"/>
				<input class="input_box" type="text" style = "margin-left : 150px;"/>
				</form>

            <div class="btn_area01">
				<input type="button" value="수정" class="blue_btn" style = "margin-top: 40px;" onClick="location.href='company_list.php';" />
				<input type="button" value="취소" class="blue_btn" style = "margin-top: 40px;"onClick="location.href='company_list.php';" />
			</div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>