<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>직원 등록</title>

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
                    직원 등록
                </div>
            </li>
            <li>
                <div class="subTitle">
                    Register Employee
                </div>
            </li>
        </ul>
        <div id="content2" >
			<div class = "list_title">
					<span style="color:red">*</span>아이디
					<span style="color:red; margin-left : 400px;">*</span>이름
			</div>
				<form onsubmit>
				<input class="input_box" type="text"/>
				</form>
				<form onsubmit>
				<input class="input_box" type="text" style = "margin-left: 150px;"/>
				</form>
				
			<div class = "list_title">
					<span style="color:red">*</span>비밀번호
			</div>
				<form onsubmit>
				<input class="input_box" type="text" />
				
				</form>
			<div class = "list_title">
					<span style="color:red">*</span>전화번호
			</div>
				<form onsubmit>
				<input class="input_box" type="text" />
				
				</form>
           
            <div class="btn_area01">
				<input type="button" value="완료" class="blue_btn" style = "margin-top: 20px;"onClick="location.href='EmployeeListPage.php';" />
			</div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>