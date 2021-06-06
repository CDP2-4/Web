<?php include "../../common/session.php"; ?>
<?php include "../../common/paging.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />

<title>창고 목록</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>

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
		<?php 
			$code = $_SESSION['code'];
			$page = $_REQUEST[page];
		?>
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
					<?php
					include "../../common/connection.php";

					$conn = new DBconn();
					$conn->connection(); 

					$query = 
					"select 
					no, 
					warehouse_name, 
					warehouse_addr from warehouse_tbl where company_code='$code'";

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

					$query .=  " order by no asc limit ".$first.", ".$bbs_psu."";
					$result = mysqli_query($conn->connect, $query);
							
							while($row = mysqli_fetch_array($result)){
						?>
                    <tr>
                        <td><?php print $row[0]; ?></td>
                        <td><?php print $row[2]; ?></td>
                        <td  style="text-decoration:underline;cursor: pointer;" onclick="location.href='warehouse_modify.php?no=<?php echo $row[0]?>';"> <?php print $row[1]; ?>
						</td>
                    </tr>
					<?php
							}
							$conn->close();
						?>
                </table>
				<div class="paging">
					<?=paging($bbs_psu,10,"",$page,"?type=info",$total_page)?>
				</div>
            </div>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>