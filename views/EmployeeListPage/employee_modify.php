<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>직원 정보 수정</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_EmployeeListPage.css" />

</head>

<div id="wrap">
    <?php include "../../include/header.php";?>
    <div id="container">
		<?php include "../../include/a_side.php"; ?>
		<ul class="title">
            <li>
                <div class="mainTitle">
                    직원 정보 수정
                </div>
            </li>
            <li>
                <div class="subTitle">
                    Modify employee information
                </div>
            </li>
        </ul>
        <div id="content2" >
			<div class = "list_title">
					<span style="color:red">*</span>아이디
			</div>
				<form onsubmit>
				<input class="input_box" type="text"/>
				</form>
				
			<div class = "list_title">
					<span style="color:red">*</span>비밀번호
			</div>
				<form onsubmit>
				<input class="input_box" type="text" />
				
				</form>
           
            <div class="btn_area01">
				<input class="blue_btn" type="button" value="수정"/>
				<input type="button" value="취소" class="blue_btn" onClick="location.href='EmployeeListPage.php';" />
			</div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>