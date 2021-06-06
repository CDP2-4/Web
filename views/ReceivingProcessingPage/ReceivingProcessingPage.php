<?php include "../../common/session.php"; ?>
<?php include "../../common/paging.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>입고 처리</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style_ReceivingProcessingPage.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<script>
	function w_open(p_url, p_name, p_width, p_height, p_top, p_left) {
		//window.open(p_url, p_name, "width="+p_width+", height="+p_height+", left="+p_left+", top="+p_top+", resizable=yes, scrollbars=auto");
		window.open(p_url, p_name, "width="+p_width+", height="+p_height+", left="+p_left+",	top="+p_top+", resizable=yes, scrollbars=auto");
		var frmData = document.frmData;
		frmData.target = pop_title;
	}
	function refreshPage() {
		alert('새로고침');
		window.location.reload();
	}
</script>
<div id="wrap">
    <?php include "../../include/header.php";?>

    <div id="container">
		<?php include "../../include/a_side.php"; ?>
		<ul class="title">
            <li>
                <div class="mainTitle">입고 처리</div>
            </li>
            <li>
                <div class="subTitle">Receiving Processing</div>
            </li>
        </ul>
		<?php 
				$code = $_SESSION['code'];
				$page = $_REQUEST[page];
			?>
        <div id="content2">
			<?php
				include "../../common/connection.php";

				$conn = new DBconn();
				$conn->connection(); 

				$query = 
				"SELECT 
				product_QR,
				warehouse_name,
				warehousing_time,
				user_id,
				warehouse_no
				FROM warehousing_tbl JOIN warehouse_tbl WHERE warehousing_tbl.warehouse_no = warehouse_tbl.no AND state=1";

				$query .= " AND warehousing_tbl.company_code='$code'";

				$bbs_psu=4;
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

				$query .=  " order by warehousing_time asc limit ".$first.", ".$bbs_psu."";
				$result = mysqli_query($conn->connect, $query);
							
			?>
            <div class = "remain_num">
                    <?php echo "남은 항목 : ".$total_record."개"; ?>
            </div>

            <div class="member_list_area">
                <table class="list_table">
                    <colgroup>
                        <col width="350" />
                        <col width="350" />
                        <col width="350" />
                        <col width="" />
  
                    </colgroup>
                    <tr>
                        <th>제품등록번호</th>
                        <th>창고명</th>
                        <th>입고시간</th>
                        <th>입고담당자</th>
                    </tr>
					<?php 
						while($row = mysqli_fetch_array($result)){ ?>
                    <tr>
						<td>
							<form action="processing_popup.php" method="post" target="popup" onsubmit="window.open('processing_popup.php', 'popup', 'width=880, height=450, left=400, top=200');">
								<input type="hidden" name="product_qr" value="<?php echo $row[0]; ?>">
								<input type="hidden" name="warehousing_time" value="<?php echo $row[2]; ?>">
								<input type="hidden" name="warehousing_user_id" value="<?php echo $row[3]; ?>">
								<input type="hidden" name="warehouse_no" value="<?php echo $row[4]; ?>">
								<input type="hidden" name="company_code" value="<?php echo $_SESSION['code']; ?>">

								<input type="submit" value="<?php echo $row[0]; ?>" style = "border: none; background-color: white; text-decoration: underline;
    cursor: pointer;">
							</form>
						</td>
                        <td><?php print $row[1]; ?></td>
                        <td><?php print $row[2]; ?></td>
                        <td><?php print $row[3]; ?></td>
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
	