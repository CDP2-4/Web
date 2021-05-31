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
		<div>
		<form action = "warehouse_ok.php" method="post"> 
			<div class = "list_title">
					<span style="color:red">*</span>창고 주소
			</div>
				<input class="input_box" name = "warehouse_addr" type="text"/>
				<input class="input_box" type="text"/>
				
			<div class = "list_title">
					<span style="color:red">*</span>창고명
			</div>
				<input class="input_box" name = "warehouse_name" type="text" />
           
            <div class="btn_area01">
				<input class="blue_btn" style = "margin-top: 40px;" type="submit" value="등록" />
				<input type="button" value="취소" style = "margin-top: 40px;" class="blue_btn" onClick="location.href='WarehouseListPage.php';" />
			</div>
		</form>
        </div>
		</div>
		</div>
	<?php include "../../include/footer.php"; ?>
</div>