<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>관리자 페이지 샘플</title>

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
    <?php include "include/header.php";?>
    <div id="container">
		<?php include "include/a_side.php"; ?>
        <div id="content2">
            <div class="m_search_area">
                <form name="search_frm" method="post" action="home.php" onsubmit="return form_chk(this);">
                    회원 총 100명&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="search_id" value="" class="size150" /><input type="submit" value="검색" class="darkblue_sbtn" />&nbsp;&nbsp;&nbsp;
                    <select name="search_workplace" onchange="form_chk2(this.value);">
                        <option value="">::선택::</option>
                        <option value="1">항목1</option>
                        <option value="2">항목2</option>
                        <option value="3">항목3</option>
                        <option value="4">항목4</option>
                        <option value="5">항목5</option>
                        <option value="6">항목6</option>
                        <option value="7">항목7</option>
                    </select>
                </form>
            </div>
            <div class="m_input_btn_area">
                <input type="button" value="회원생성" class="darkgray_btn" onclick="location.href='member_write.php';" />
            </div>
            <div class="member_list_area">
                <table class="list_table">
                    <colgroup>
                        <col width="100" />
                        <col width="250" />
                        <col width="250" />
                        <col width="" />
                        <col width="200" />
                        <col width="150" />
                    </colgroup>
                    <tr>
                        <th>번호</th>
                        <th>아이디</th>
                        <th>이름</th>
                        <th>담당</th>
                        <th>생성일</th>
                        <th>활성화</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>ididid</td>
                        <td>username</td>
                        <td>담당자</td>
                        <td>2021.04.07</td>
                        <td>미사용 <input type="button" class="darkblue_sbtn" value="변경" onclick="w_open('m_use_change.php', 'm_use_change', 500, 250, 200, 200);" /></td>
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
	<?php include "include/footer.php"; ?>
</div>