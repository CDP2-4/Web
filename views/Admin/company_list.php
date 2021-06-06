<?php include "../../common/session.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>업체 목록</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>
<div id="wrap">
    <?php include "../../include/header.php";?>
    <div id="container">
		<?php include "../../include/b_side.php"; ?>
		<ul class="title">
            <li>
                <div class="mainTitle">
                    업체 목록
                </div>
            </li>
            <li>
                <div class="subTitle">
                    Company List
                </div>
            </li>
        </ul>
        <div id="content2">
            <div class="m_input_btn_area">
                <input type="button" value="추가" class="blue_sbtn" onclick="location.href='company_register.php';" />
            </div>
            <div class="member_list_area">
                <table class="list_table">
                    <colgroup>
                        <col width="180" />
                        <col width="180" />
                        <col width="200" />
                        <col width="200" />
                        <col width="500" />
                        <col width=  />
                    </colgroup>
                    <tr>
                        <th>업체 이름</th>
                        <th>업체 고유번호</th>
                        <th>관리자 아이디</th>
                        <th>관리자 비밀번호</th>
                        <th>주소</th>
                        <th>비고</th>
                    </tr>
                    <?php
							include "../../common/connection.php";

							$conn = new DBconn();
							$conn->connection(); 

							$query = 
							"select 
							company_name, 
							company_code, 
							company_id,
							company_pwd, 
							company_address, 
							company_remarks 
							from company_tbl";

							$result = mysqli_query($conn->connect, $query);
							
							while($row = mysqli_fetch_array($result)){
						?>
						<tr>
						<td><?php print $row[0] ?></td>
						<td 
							style="text-decoration:underline" 
							onclick="location.href='company_modify.php?code=<?php echo $row[1]?>';"
						>
							<?php print $row[1]; ?>
						</td>
						<td><?php print $row[2] ?></td>
						<td><?php print $row[3] ?></td>
						<td><?php print $row[4] ?></td>
						<td><?php print $row[5] ?></td>
						<?php
							}
							$conn->close();
						?>
                </table>
				<div class="paging">
                    <ul class="clearfix">
						<li class="box now_page">1</li>
						<!-- <li class="box" onclick="location.href='?page=2&amp;constsize=30'">2</li>
						<li class="box" onclick="location.href='?page=3&amp;constsize=30'">3</li>
						<li class="box" onclick="location.href='?page=4&amp;constsize=30'">4</li>
						<li class="box" onclick="location.href='?page=5&amp;constsize=30'">5</li>
						<li class="box" onclick="location.href='?page=6&amp;constsize=30'">6</li>
						<li class="box" onclick="location.href='?page=7&amp;constsize=30'">7</li>
						<li class="box" onclick="location.href='?page=8&amp;constsize=30'">8</li>
						<li class="box" onclick="location.href='?page=9&amp;constsize=30'">9</li>
						<li class="box" onclick="location.href='?page=10&amp;constsize=30'">10</li>
						<li class="box" onclick="location.href='?page=11&amp;constsize=30'">&gt;</li> -->
					</ul>
				</div>
            </div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>