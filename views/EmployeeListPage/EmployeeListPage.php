<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
<title>직원 목록</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>
<script>
	function w_open(p_url, p_name, p_width, p_height, p_top, p_left){
	window.open(p_url, p_name, "width="+p_width+", height="+p_height+", left="+p_left+", top="+p_top+", resizable=yes, scrollbars=auto");
}
</script>
<body>
	<div id="wrap">
		<?php include "../../include/header.php";?>
		<div id="container">
			<?php include "../../include/a_side.php"; ?>
			<ul class="title">
			    <li><div class="mainTitle">직원 목록</div></li>
			    <li><div class="subTitle">Employee List</div></li>
			</ul>
			<div id="content2">
				<div class="m_input_btn_area">
					<input type="button" value="회원생성" class="darkgray_btn" onclick="location.href='employee_write.php';" />
				</div>
				<div class="m_search_area">
					<form name="search_frm" method="post" action="home.php" onsubmit="return form_chk(this);">
						회원 총 100명&nbsp;&nbsp;&nbsp;&nbsp;
						<select class="selector" name="search_workplace" onchange="form_chk2(this.value);">
							<option value="">::선택::</option>
							<option value="1">전체</option>
							<option value="2">사용</option>
							<option value="3">사용중지</option>
						</select>
						<select class="selector" name="search_workplace" onchange="form_chk2(this.value);">
							<option value="">::선택::</option>
							<option value="1">아이디</option>
							<option value="2">이름</option>
						</select>
						<input type="text" name="search_id" value="" class="search_box" />
						<input type="submit" value="검색" class="blue_sbtn" />&nbsp;&nbsp;&nbsp;
						
					</form>
				</div>
				<div class="member_list_area">
					<table class="list_table">
						<colgroup>
							<col width="300" />
							<col width="300" />
							<col width="350" />
							<col width="300" />
							<col width="" />
						</colgroup>
						<tr>
							<th>아이디</th>
							<th>이름</th>
							<th>전화번호</th>
							<th>등록일</th>
							<th>상태</th>
						</tr>
						<tr>
							<td>ididid</td>
							<td>username</td>
							<td>010-1111-2222</td>
							<td>2021-04-07</td>
							<td>미사용 <input type="button" class="blue_ssbtn" value="변경" onclick="w_open('m_use_change.php', 'm_use_change', 500, 250, 200, 200);" /></td>
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