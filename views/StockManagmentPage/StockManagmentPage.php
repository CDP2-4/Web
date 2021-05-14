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
				?>
				<form id="calender_frm" name="date_frm" method="post" onsubmit>
					<input class="calendar" type="date" name="date_selector_start" value="<?php echo $DateAndTime ?>"/>
					<input class="calendar" type="date" name="date_selector_end" value="<?php echo $DateAndTime ?>"/>
				</form>
				<div class="m_search_area">
						<select class = "selector" name="search_workplace" onchange="form_chk2(this.value);">
							<option value="">::선택::</option>
							<option value="1">CAS번호</option>
							<option value="2">제품명</option>
							<option value="3">창고명</option>
							<option value="4">입고담당자</option>
						</select>
						<input type="text" name="search_id" value="" class="search_box" /><input type="submit" value="검색" class="blue_sbtn" style = "margin-left: 3px;" />&nbsp;&nbsp;&nbsp;
						<select class = "selector" name="sort_workplace" onchange="form_chk2(this.value);">
							<option value="">::선택::</option>
							<option value="1">제품명순</option>
							<option value="2">입고날짜순</option>
							<option value="3">출고날짜순</option>
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
							<th>창고등록번호</th>
						</tr>
						<tr>
							<td>2108-00001</td>
							<td>71-48-7</td>
							<td>아세트알데히드</td>
							<td>2021-08-22
07:30:12
</td>
							<td>박재완</td>
							<td>2023-02-11
14:51:18
</td>
							<td>이서정</td>
							<td>2</td>
						</tr>
					</table>
					<div class="paging">
						<ul class="clearfix">
							<li class="box now_page">1</li>
							<li class="box" onclick="location.href='?page=2&amp;constsize=30'">2</li>
							<li class="box" onclick="location.href='?page=3&amp;constsize=30'">3</li>
							<li class="box" onclick="location.href='?page=4&amp;constsize=30'">4</li>
							<li class="box" onclick="location.href='?page=5&amp;constsize=30'">5</li>
							<li class="box" onclick="location.href='?page=6&amp;constsize=30'">6</li>
							<li class="box" onclick="location.href='?page=7&amp;constsize=30'">7</li>
							<li class="box" onclick="location.href='?page=8&amp;constsize=30'">8</li>
							<li class="box" onclick="location.href='?page=9&amp;constsize=30'">9</li>
							<li class="box" onclick="location.href='?page=10&amp;constsize=30'">10</li>
							<li class="box" onclick="location.href='?page=11&amp;constsize=30'">&gt;</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</div>
</body>