<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>창고 목록</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>
<script>
	function w_open(p_url, p_name, p_width, p_height, p_top, p_left){
	window.open(p_url, p_name, "width="+p_width+", height="+p_height+", left="+p_left+", top="+p_top+", resizable=yes, scrollbars=auto");
}
</script>
<div id="wrap">
    <?php include "../../include/header.php";?>
    <div id="container">
		<?php include "../../include/a_side.php"; ?>
		<ul class="title">
            <li>
                <div class="mainTitle">
                    창고 목록
                </div>
            </li>
            <li>
                <div class="subTitle">
                    Warehouse List
                </div>
            </li>
        </ul>
        <div id="content2">
            <div class="m_input_btn_area">
                <input type="button" value="추가" class="blue_sbtn" onclick="location.href='warehouse_write.php';" />
            </div>
            <div class="member_list_area">
                <table class="list_table">
                    <colgroup>
                        <col width="250" />
                        <col width="500" />
                        <col width="250" />
                    </colgroup>
                    <tr>
                        <th>창고등록번호</th>
                        <th>주소</th>
                        <th>창고명</th>
                    </tr>
                    <tr>
                        <td>10
</td>
                        <td>경북 군위군 군위읍 동서4길 14
</td>
                        <td  style="text-decoration:underline" onclick="location.href='warehouse_modify.php';">군위창고1</td>
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