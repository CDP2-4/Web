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
			<?php
				include "../../common/connection.php";

				$conn = new DBconn();
				$conn->connection();

				$code = $_GET['code'];
				$query = "select company_name, company_id, company_address, company_remarks 
				from company_tbl where company_code='".$code."'";
			
				$result = mysqli_query($conn->connect, $query);
				$row = mysqli_fetch_array($result);

				$name = $row['company_name'];
				$id = $row['company_id'];
				$address = $row['company_address'];
				$remark = $row['company_remarks'];
			
				$conn->close();
			?>
			<div class="member_list_area">
				<form action="company_modify_ok.php?code=<?php echo $code; ?>" method="post">
					<table class="form_table">
						<colgroup>
							<col width="200" />
							<col width="300" />
						</colgroup>
						<tr>
							<th><span style="color:red">*</span>업체명</th>
							<td><input class="input_box" name="name" type="text" value=<?php echo $name; ?> /></td>
						</tr>
						<tr>
							<th><span style="color:red">*</span>업체 고유번호</th>
							<td><input class="input_box" name="code" type="text" value=<?php echo $code; ?> disabled="disabled"/></td>
						</tr>
						<tr>
							<th><span style="color:red">*</span>관리자 아이디</th>
							<td><input class="input_box" name="id" type="text" value=<?php echo $id; ?> /></td>
						</tr>
						<tr>
							<th><span style="color:red">*</span>관리자 비밀번호</th>
							<td><input class="input_box" name="passwd" type="password"/></td>
						</tr>
						<tr>
							<th><span style="color:red">*</span>주소</th>
							<td><input class="input_box" id = "roadFullAddr" name="address" type="text" value=<?php echo $address; ?>/>
							<input class="blue_btn" type="button" value = "주소검색" style = "margin-top: 5px; margin-left:5px;"onclick = "goPopup();" ></td>
						</tr>
						<tr>
							<th>비고</th>
							<td>
							<?php 
								if($remark == null) {
							?>
								<input class="input_box" name="name" type="text" value="" />
							<?php
							} else {
							?>
								<input class="input_box" name="name" type="text" value=<?php echo $remark; ?> />
							<?php
							}
							?>
							</td>
						</tr>
					</table>
					<div class="admin_btn_area">
						<input type="submit" value="완료" class="blue_btn" style="margin-right: 5px"/>
						<input type="button" value="취소" class="blue_btn" onclick="location.href='company_list.php';"/>
					</div>
				</form>
			</div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>