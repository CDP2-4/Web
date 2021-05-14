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
			<div class = "list_title">
					*창고 주소
			</div>
				<form onsubmit>
				<input class="input_box" type="text"/>
				<input class="input_box" type="text"/>
				
				</form>
				
			<div class = "list_title">
					*창고명
			</div>
				<form onsubmit>
				<input class="input_box" type="text" />
				
				</form>
           
            <div class="btn_area01">
				<input class="blue_btn" id="warehouse_register_button" type="button" value="등록"/>
				<input type="button" value="취소" class="blue_btn" onClick="location.href='WarehouseListPage.php';" />
			</div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>