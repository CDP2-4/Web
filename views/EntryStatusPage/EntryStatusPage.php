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
					?>
					<form id="calender_frm" name="date_frm" method="post" onsubmit>
						<input class="calendar" type="date" name="date_selector_start" value="<?php echo $DateAndTime ?>"/>
						<input class="calendar" type="date" name="date_selector_end" value="<?php echo $DateAndTime ?>"/>
					</form>
				<div class="m_search_area">
					<form name="search_frm" method="post" action="" onsubmit="return form_chk(this);">
						<select name="search_workplace" onchange="form_chk2(this.value);" class="selector">
							<option value="">::선택::</option>
							<option value="1">창고명</option>
							<option value="2">이름</option>
						</select>
						<input type="text" name="search_id" value="" class="search_box" />
						<input type="submit" value="검색" class="blue_sbtn" />
					</form>
				</div>
				<div class="member_list_area">
					<table class="list_table">
						<colgroup>
							<col width="250" />
							<col width="250" />
							<col width="300" />
							<col width="300" />
							<col width="" />
						</colgroup>
						<tr>
							<th>이름</th>
							<th>아이디</th>
							<th>창고명</th>
							<th>입(入) 시간</th>
							<th>출(出) 시간</th>
						</tr>
						<tr>
							<td>username</td>
							<td>id</td>
							<td>대구창고1</td>
							<td>2021-03-31 00:02</td>
							<td>2021-03-31 00:30</td>
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