<?php include "../../common/session.php"; ?>
<?php include "../../common/paging.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>입출입 현황</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/style_EntryStatusPage.css" />

</head>
<body>
	<div id="wrap">
		<?php include "../../include/header.php";?>
		<div id="container">
			<?php include "../../include/a_side.php"; ?>
			<ul class="title">
			    <li><div class="mainTitle">입출입 현황</div></li>
			    <li><div class="subTitle">Entry and exit status</div></li>
			</ul>
			<div id="content2">
				<?php 
					$DateAndTime = date('Y-m-d', time());
					$start = $DateAndTime;
					$end = $DateAndTime;
					$category = 1;
					$search_word = "";
					$code = $_SESSION['code'];
					$page = $_REQUEST[page];
				?>
				<div class="m_search_area">
				<?php
				$category = $_GET["search_workplace"];

					if(empty($_GET["date_selector_start"])){ 
						$where .= " and (in_time between DATE(NOW()) AND DATE_ADD(NOW(), INTERVAL +1 DAY))";
					}
					else {
						if($_REQUEST[date_selector_start]){
							$start = $_REQUEST[date_selector_start];
							if($_REQUEST[date_selector_end]){
								$end = $_REQUEST[date_selector_end];
								$where .= " and (date_format(date_format(in_time, '%Y-%m-%d'), '%Y-%m-%d') between '$_REQUEST[date_selector_start]' and '$_REQUEST[date_selector_end]')";
							}
							else{
								$where .= " and (date_format(date_format(in_time, '%Y-%m-%d'), '%Y-%m-%d') >= '$_REQUEST[date_selector_start]')";
							}
						}
						elseif($_REQUEST[date_selector_end]){
							$end = $_REQUEST[date_selector_end];
							$where .= " and (date_format(date_format(in_time, '%Y-%m-%d'), '%Y-%m-%d') <= '$_REQUEST[date_selector_end]')";
						}
					}

					if(empty($_REQUEST["search_word"])){ // 검색어가 empty일 때 예외처리를 해준다.
						$search_word ="";
					} else {
						$search_word =$_REQUEST["search_word"];
						switch($category) {
									case 1:
										$where .= " and ((user_id LIKE '%$search_word%') or (warehouse_name LIKE '%$search_word%'))";
										break;
									case 2:
										$where .= " and (warehouse_name LIKE '%$search_word%')";
										break;
									case 3:
										$where .= " and (user_id LIKE '%$search_word%')";
										break;
								}
					}
					?>
					<form name="search_frm" method="get" action="" onsubmit="return form_chk(this);">
						<input class="calendar" type="date" name="date_selector_start" value="<?php echo $start ?>"/>
						<input class="calendar" type="date" name="date_selector_end" value="<?php echo $end ?>"/>
						<select name="search_workplace" onchange="form_chk2(this.value);" class="selector">
							<option value="1" <?php if($category == 1) echo "selected" ?>>::전체::</option>
							<option value="2" <?php if($category == 2) echo "selected" ?>>창고명</option>
							<option value="3" <?php if($category == 3) echo "selected" ?>>아이디</option>
						</select>
						<input type="text" name="search_word" value="<?php echo $search_word ?>" class="search_box" />
						<input type="submit" value="검색" class="blue_sbtn" />
					</form>
				</div>
				<div class="member_list_area">
					<table class="list_table">
						<colgroup>
							<col width="250" />
							<col width="350" />
							<col width="400" />
							<col width="" />
						</colgroup>
						<tr>
							<th>아이디</th>
							<th>창고명</th>
							<th>입(入) 시간</th>
							<th>출(出) 시간</th>
						</tr>
					<?php 
						include "../../common/connection.php";

						$conn = new DBconn();
						$conn->connection(); 
				
						$query = "SELECT warehouse_name, 
								user_id, 
								in_time, 
								out_time 
								FROM inout_tbl JOIN warehouse_tbl where inout_tbl.warehouse_no = warehouse_tbl.no $where";
						
						$query .= " AND inout_tbl.company_code='$code'";
						
						$bbs_psu=2;
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

					$query .=  " order by user_id asc limit ".$first.", ".$bbs_psu."";
					//echo $query;
					$result = mysqli_query($conn->connect, $query);

						while($row = mysqli_fetch_array($result)){
					?>
						<tr>
							<td><?php print $row[1]; ?></td>
							<td><?php print $row[0]; ?></td>
							<td><?php print $row[2]; ?></td>
							<td><?php print $row[3]; ?></td>
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