<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>창고 등록</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_WarehouseListPage.css" />

</head>

<script language="javascript">
// opener관련 오류가 발생하는 경우 아래 주석을 해지하고, 사용자의 도메인정보를 입력합니다. ("팝업API 호출 소스"도 동일하게 적용시켜야 합니다.)
//document.domain = "schemi.0za.kr";

function jusoCallBack(roadFullAddr){
	document.getElementById('roadFullAddr').value = roadFullAddr;
}

function goPopup(){
	// 주소검색을 수행할 팝업 페이지를 호출합니다.
	// 호출된 페이지(jusoPopup_utf8.php)에서 실제 주소검색URL(https://www.juso.go.kr/addrlink/addrLinkUrl.do)를 호출하게 됩니다.
	var pop = window.open("/common/jusoPopup_utf8.php","pop","width=570,height=420, scrollbars=yes, resizable=yes");  
}
</script>

<div id="wrap">
    <?php include "../../include/header.php";?>
    <div id="container">

		<?php include "../../include/a_side.php"; ?>
		<ul class="title">
            <li>
                <div class="mainTitle">
                    창고 등록
                </div>
            </li>
            <li>
                <div class="subTitle">
                    Register Warehouse
                </div>
            </li>
        </ul>
        <div id="content2" >
		<div class="member_list_area">
		<form action = "warehouse_ok.php" method="post"> 
			<table class="form_table">
						<colgroup>
							<col width="200" />
							<col width="300" />
						</colgroup>
						<tr>
							<th><span style="color:red">*</span>창고 주소</th>
							<td><input id = "roadFullAddr" name = "warehouse_addr" class="input_box" type="text">
				<input class="blue_btn" type="button" value = "주소검색" style = "margin-top: 5px; margin-left:5px;"onclick = "goPopup();" ></td>
						</tr>
						<tr>
							<th><span style="color:red">*</span>창고명</th>
							<td><input id = "input_box" name = "warehouse_name" class="input_box" type="text"></td>
						</tr>
			</table>
           
            <div class="btn_area01">
				<input class="blue_btn" style = "margin-top: 40px;" type="submit" value="등록" >
				<input type="button" value="취소" style = "margin-top: 40px;" class="blue_btn" onClick="location.href='WarehouseListPage.php';" >
			</div>
		</form>
        </div>
		</div>
		</div>
	<?php include "../../include/footer.php"; ?>
</div>