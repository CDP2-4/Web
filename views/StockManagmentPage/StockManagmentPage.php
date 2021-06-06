<?php include "../../common/session.php"; ?>
<?php include "../../common/paging.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>재고 관리</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_StockManagementPage.css" />

</head>
<body>
	<div id="wrap">
		<?php include "../../include/header.php";?>
		<div id="container">
			<?php include "../../include/a_side.php"; ?>
			<ul class="title">
			    <li><div class="mainTitle">재고 관리</div></li>
			    <li><div class="subTitle">Stock Management</div></li>
			</ul>
			<div id="content2">
				<?php
					$DateAndTime = date('Y-m-d', time());
					$start = $DateAndTime;
					$end = $DateAndTime;
					$category = 1;
					$sort = 1;
					$search_word = "";
					$code = $_SESSION['code'];
					$page = $_REQUEST[page];
				?>
				<div class="m_search_area">
				<?php
				$category = $_GET["search_workplace"];
				$sort = $_GET["sort_workplace"];

					if(empty($_GET["date_selector_start"]) && empty($_GET["date_selector_end"])){ 
						$where .= " and (((date_format(warehousing_time, '%Y-%m-%d') BETWEEN '$DateAndTime' AND '$DateAndTime')
									OR (date_format(release_time, '%Y-%m-%d') BETWEEN '$DateAndTime' AND '$DateAndTime')))";
					}else {
					 if($_REQUEST[date_selector_start]){
						 $start = $_REQUEST[date_selector_start];
						if($_REQUEST[date_selector_end]){
							$end = $_REQUEST[date_selector_end];
							$where .= "and date_format(date_format(warehousing_time, '%Y-%m-%d'), '%Y-%m-%d') between '$_REQUEST[date_selector_start]' and '$_REQUEST[date_selector_end]'  ";

						}else{
							$where .= "and date_format(date_format(warehousing_time, '%Y-%m-%d'), '%Y-%m-%d') >= '$_REQUEST[date_selector_start]' ";
						}
					}elseif($_REQUEST[date_selector_end]){
						$end = $_REQUEST[date_selector_end];
						$where .= "and date_format(date_format(warehousing_time, '%Y-%m-%d'), '%Y-%m-%d') <= '$_REQUEST[date_selector_end]' ";
					}
					}

					if(!empty($_REQUEST["search_word"])){ // 검색어가 empty일 때 예외처리를 해준다.
						
						$search_word =$_REQUEST["search_word"];
						switch($category) {
									case 1:
										$where .= "and ((product_cas LIKE '%$search_word%') or (product_name LIKE '%$search_word%') or (warehouse_name LIKE '%$search_word%') or (warehousing_user_id LIKE '%$search_word%') or (release_user_id LIKE '%$search_word%' and release_user_id is not null))";
										break;
									case 2:
										$where .= "and product_cas LIKE '%$search_word%'";
										break;
									case 3:
										$where .= "and product_name LIKE '%$search_word%'";
										break;
									case 4:
										$where .= "and warehouse_name LIKE '%$search_word%'";
										break;
									case 5:
										$where .= "and warehousing_user_id LIKE '%$search_word%'";
										break;
									case 6: 
										$where .= " and release_user_id LIKE '%$search_word%' and release_user_id is not null";
										break;

								}
					}
						$where .= " and product_tbl.company_code='$code'";
						switch($sort) {
                           case 1: //제품명 정렬이 기본값
                              $where .= " order by product_name asc";
                              break;
                           case 2:
                              $where .= " order by warehousing_time asc";
                              break;
                           case 3:
                              $where .= " order by release_time asc";
                              break;
                        }
					
					?>
					<form name="search_frm" method="get" action="" onsubmit="return form_chk(this);">
					<input class="calendar" type="date" name="date_selector_start" value="<?php echo $start ?>"/>
					<input class="calendar" type="date" name="date_selector_end" value="<?php echo $end ?>"/>
						<select class = "selector" name="search_workplace" onchange="form_chk2(this.value);">
							<option value="1" <?php if($category == 1) echo "selected" ?>>::전체::</option>
							<option value="2" <?php if($category == 2) echo "selected" ?>>CAS번호</option>
							<option value="3" <?php if($category == 3) echo "selected" ?>>제품명</option>
							<option value="4" <?php if($category == 4) echo "selected" ?>>창고명</option>
							<option value="5" <?php if($category == 5) echo "selected" ?>>입고담당자</option>
							<option value="6" <?php if($category == 6) echo "selected" ?>>출고담당자</option>
						</select>
						<input type="text" name="search_word" value="<?php echo $search_word ?>" class="search_box" /><input type="submit" value="검색" class="blue_sbtn" style = "margin-left: 3px;" />&nbsp;&nbsp;&nbsp;
						<select class = "selector" name="sort_workplace" onchange="form_chk2(this.value);">
							<option value="1" <?php if($sort == 1) echo "selected" ?>>::선택::</option>
							<option value="1" <?php if($sort == 1) echo "selected" ?>>제품명순</option>
							<option value="2" <?php if($sort == 2) echo "selected" ?>>입고날짜순</option>
							<option value="3" <?php if($sort == 3) echo "selected" ?>>출고날짜순</option>
						</select>
					</form>
				</div>
				<div class="member_list_area">
					<table class="list_table">
						<colgroup>
							<col width="180" />
							<col width="180" />
							<col width="200" />
							<col width="220" />
							<col width="180" />
							<col width="220" />
							<col width= />
						</colgroup>
						<tr>
							<th>제품등록번호</th>
							<th>CAS번호</th>
							<th>제품명</th>
							<th>입고시간</th>
							<th>입고담당자</th>
							<th>출고시간</th>
							<th>출고담당자</th>
							<th>창고명</th>
						</tr>
						<?php
							include "../../common/connection.php";

							$conn = new DBconn();
							$conn->connection(); 

							$query = 
							"select
							product_QR,
							product_cas,
							product_name,
							warehousing_time,
							warehousing_user_id,
							release_time,
							release_user_id,
							warehouse_name from product_tbl JOIN warehouse_tbl where product_tbl.warehouse_no = warehouse_tbl.no $where";
							
							$bbs_psu=8;
					$bbs_pagesu=5000;
					
					$result = mysqli_query($conn->connect, $query);
					
					#전체 레코드수
					$total_record = mysqli_num_rows($result);
					if(!$page) {
						$page=1;
					}

					#전체 페이지수
					$total_page=ceil($total_record/$bbs_psu);
					#시작값과 종료값
					if($total_record == 0) {
						$first=1;
						$last=0;
					}
					else {
						$first=$bbs_psu*($page-1);
						$last=$bbs_psu*$page;
					}

					$query .=  " limit ".$first.", ".$bbs_psu."";
					$result = mysqli_query($conn->connect, $query);
							
							while($row = mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php print $row[0]; ?></td>
							<td><?php print $row[1]; ?></td>
							<td><?php print $row[2]; ?></td>
							<td><?php print $row[3]; ?></td>
							<td><?php print $row[4]; ?></td>
							<td><?php print $row[5]; ?></td>
							<td><?php print $row[6]; ?></td>
							<td><?php print $row[7]; ?></td>
						</tr>
						<?php
							}
							$conn->close();
						?>
					</table>
					<div class="paging">
<!-- 						<?=paging($bbs_psu,10,"",$page,"?type=info",$total_page)?> -->
							<?=paging($bbs_psu,10,"",$page,"&date_selector_start=$_GET[date_selector_start]&date_selector_end=$_GET[date_selector_end]&search_workplace=$_GET[search_workplace]&search_word=$_GET[search_word]&sort_workplace=$_GET[sort_workplace]",$total_page)?>
					</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</div>
</body>