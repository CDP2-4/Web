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
					<span style="color:red; margin-left : 400px;">*</span>이름
			</div>
				<form onsubmit>
				<input class="input_box" type="text" value = "sam0909" disabled/>
				</form>
				<form onsubmit>
				<input class="input_box" type="text" style = "margin-left: 150px;"/>
				</form>
				
			<div class = "list_title">
					<span style="color:red">*</span>비밀번호
					<span style="color:red; margin-left : 375px;">*</span>전화번호
			</div>
				<form onsubmit>
				<input class="input_box" type="text" />
				<form onsubmit>
				<input class="input_box" type="text" style = "margin-left: 150px;"/>
				</form>
				</form>

			<div class = "list_title">
				상태
			</div>
			<div>
				<select class = "selector" name="search_workplace" onchange="form_chk2(this.value);" style = "float:left; margin-left : 30px; margin-top : 10px">
							<option value="">::선택::</option>
							<option value="1">사용</option>
							<option value="2">사용중지</option>
						</select>
			</div>
		
            <div class="btn_area01">
				<input type="button" value="수정" class="blue_btn" style = "margin-top: 20px;" onClick="location.href='EmployeeListPage.php';" />
				<input type="button" value="취소" class="blue_btn" style = "margin-top: 20px;"onClick="location.href='EmployeeListPage.php';" />
			</div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>