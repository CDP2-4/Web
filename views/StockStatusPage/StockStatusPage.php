<?php include "../../common/session.php";?>
<?php include "../../common/paging.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>재고 현황</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_StockStatusPage.css" />

</head>
<body>
	<div id="wrap">
		<?php include "../../include/header.php";?>
		<div id="container">
			<?php include "../../include/a_side.php"; ?>
			<ul class="title">
			    <li><div class="mainTitle">재고 현황</div></li>
			    <li><div class="subTitle">Stock Status</div></li>
			</ul>
			<?php 
				$DateAndTime = date('Y-m-d', time());
				$start = $DateAndTime;
				$end = $DateAndTime;
				$category = 1;
				$search_word = "";
				$code = $_SESSION['code'];
				$page = $_REQUEST[page];
			?>
			<div id="content2">			
				<?php				
					if($_REQUEST[date_selector_start]){
						$start = $_REQUEST[date_selector_start];

						if($_REQUEST[date_selector_end]){
							$end = $_REQUEST[date_selector_end];
						}
					}
					else if($_REQUEST[date_selector_end]){
						$end = $_REQUEST[date_selector_end];
					}

					$where = " WHERE (((date_format(warehousing_time, '%Y-%m-%d') 
								BETWEEN '$start' AND '$end')
								OR (date_format(release_time, '%Y-%m-%d') BETWEEN '$start' AND '$end')))";

					// 검색 기준
					$category = $_GET["search_workplace"];

					// 검색어가 empty일 때 예외처리를 해준다.
					if(!empty($_REQUEST["search_word"])){ 
						$search_word = $_REQUEST["search_word"];

						switch($category) {
							case 1:
								$where .= " AND ((product_cas LIKE '%$search_word%') OR (product_name LIKE '%$search_word%'))";
								break;
							case 2:
								$where .= " AND (product_cas LIKE '%$search_word%')";
								break;
							case 3:
								$where .= " AND (product_name LIKE '%$search_word%')";
								break;
						}
					}					
				?>
				<div class="m_search_area">
					<form name="search_frm" method="get" action="" onsubmit="return form_chk(this);">
						<input class="calendar" type="date" name="date_selector_start" value="<?php echo $start ?>"/>
						<input class="calendar" type="date" name="date_selector_end" value="<?php echo $end ?>"/>
						<select name="search_workplace" onchange="form_chk2(this.value);" class="selector">
							<option value="1" <?php if($category == 1) echo "selected" ?>>::전체::</option>
							<option value="2" <?php if($category == 2) echo "selected" ?>>CAS번호</option>
							<option value="3" <?php if($category == 3) echo "selected" ?>>제품명</option>
						</select>
						<input type="text" name="search_word" value="<?php echo $search_word ?>" class="search_box" />
						<input type="submit" value="검색" class="blue_sbtn" />
					</form>
				</div>
				<div class="member_list_area">
					<table class="list_table">
						<colgroup>
							<col width="300" />
							<col width="300" />
							<col width="330" />
							<col width="330" />
							<col width="" />
						</colgroup>
						<tr>
							<th>CAS번호</th>
							<th>제품명</th>
							<th>입고량</th>
							<th>출고량</th>
							<th style="border-left: 1px solid #D5D5D5;">재고량<span style="font-size: 10px;">(오늘 날짜 기준)</span></th>
						</tr>
						<?php
						include "../../common/connection.php";

						$conn = new DBconn();
						$conn->connection(); 

						# 특정 기간 기준 입출고량 계산을 위한 쿼리
						$query = "
							SELECT 
								product_cas,
								product_name, 
								COUNT(case when date_format(warehousing_time, '%Y-%m-%d') BETWEEN '$start' AND '$end' then 1 end) AS warehousing_count, 
								COUNT(case when date_format(release_time, '%Y-%m-%d') BETWEEN '$start' AND '$end' then 1 end) AS release_count 
							FROM product_tbl $where";
						
						// 회사 코드 추가 및 제품명으로 그룹화
						$query .= " AND company_code='$code'";
						$query .= " GROUP BY product_name";
				
						$result = mysqli_query($conn->connect, $query);

						$bbs_psu = 8;
					    $bbs_pagesu = 5000;

					    // 전체 레코드수
					    $total_record = mysqli_num_rows($result);

					    if(!$page) {
							$page = 1;
					    }
 
						// 전체 페이지수
						$total_page = ceil($total_record/$bbs_psu);

						// 시작값과 종료값
						if($total_record == 0) {
							$first = 1;
							$last = 0;
						}
						else {
							$first = $bbs_psu * ($page-1);
							$last = $bbs_psu * $page;
						}

						$query .=  " order by no asc limit ".$first.", ".$bbs_psu."";
						$result = mysqli_query($conn->connect, $query);
						
						while($row = mysqli_fetch_array($result)) {
							$query2 = "SELECT COUNT(warehousing_time) AS warehousing_count, COUNT(release_time) AS release_count FROM product_tbl";
							$query2 .= " WHERE product_name='".$row['product_name']."' AND company_code='$code'";
							$result2 = mysqli_query($conn->connect, $query2);
							$row2 = mysqli_fetch_array($result2);

							$count = $row2['warehousing_count'] - $row2['release_count'];
						?>
						<tr>
							<td><?php echo $row['product_cas'] ?></td>
							<td><?php echo $row['product_name'] ?></td>
							<td><?php echo $row['warehousing_count'] ?></td>
							<td><?php echo $row['release_count'] ?></td>
							<td style="border-left: 1px solid #D5D5D5"><?php echo $count?></td>
						</tr>
						<?php
							}
							$conn->close();
						?>
					</table>
					<div class="paging">
						<?=paging($bbs_psu,10,"",$page,"&date_selector_start=$_GET[date_selector_start]&date_selector_end=$_GET[date_selector_end]&search_workplace=$_GET[search_workplace]&search_word=$_GET[search_word]",$total_page)?>
					</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</div>
</body>
</html>