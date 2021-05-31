<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>창고 정보 수정</title>

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
                    창고 정보 수정
                </div>
            </li>
            <li>
                <div class="subTitle">
                    Modify Warehouse Information
                </div>
            </li>
        </ul>
        <div id="content2" >
		<?php
				include "../../common/connection.php";

				$conn = new DBconn();
				$conn->connection();

				$warehouse_num = $_GET['warehouse_num'];
				$query = "select warehouse_name, warehouse_addr from warehouse_tbl where warehouse_num='".$warehouse_num."'";
			
				$result = mysqli_query($conn->connect, $query);
				$row = mysqli_fetch_array($result);

				$warehouse_name = $row['warehouse_name'];
				$warehouse_addr = $row['warehouse_addr'];

				$conn->close();
			?>
			<div>
			<form action = "warehouse_modify_ok.php?warehouse_num=<?php echo $warehouse_num;?>" method="post"> 
			<div class = "list_title">
					<span style="color:red">*</span>창고 주소
			</div>
				<input id = "address1" name = "warehouse_addr" class="input_box" type="text" value = <?php echo $warehouse_addr; ?>>
				<input id = "address2" class="input_box" type="text"/>
				
			<div class = "list_title">
					<span style="color:red">*</span>창고명
			</div>
				<input id = "input_box" name = "warehouse_name" class="input_box" type="text" value = <?php echo $warehouse_name; ?>>
           
            <div class="btn_area01">
				<input class="blue_btn" style = "margin-top: 20px;" type="submit" value="수정"/>
				<input type="button" value="취소" class="blue_btn" style = "margin-top: 20px;" onClick="location.href='WarehouseListPage.php';" />
				<input type="button" value="QR생성" class="blue_btn" style = "margin-top: 20px;" onClick="location.href='warehouse_qr.php?warehouse_num=<?php echo $warehouse_num;?>'" />
			</div>
			</form>
			</div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>