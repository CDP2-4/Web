<?php include "../../common/session.php"; ?>
<?php include "../../common/paging.php"; ?>

<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf-8" />
<title>직원 목록</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>

<body>
	<div id="wrap">
		<?php include "../../include/header.php";?>
		<div id="container">
			<?php include "../../include/a_side.php"; ?>
			<ul class="title">
			    <li><div class="mainTitle">직원 목록</div></li>
			    <li><div class="subTitle">Employee List</div></li>
			</ul>
			<?php 
				$category1 = 2;
				$category2 = 1;
				$search_word = "";
				$code = $_SESSION['code'];
				$page = $_REQUEST[page];
			?>
			<div id="content2">
				<div class="m_input_btn_area">
					<input type="button" value="회원생성" class="blue_sbtn" onclick="location.href='Employee_register.php';" />
				</div>
				<div class="m_search_area">
					<?php
					if(empty($_REQUEST["search_word"])){ // 검색어가 empty일 때 예외처리를 해준다.
						$search_word ="";
					}else{
						$search_word =$_REQUEST["search_word"];
					}
					
					//사용이나 사용중지가 선택되면 그 값을 넘겨줌
					if(empty($_GET["search_workplace1"])){ 
						$category1 = 2; //전체 선택
					}else{
						$category1 = $_GET["search_workplace1"];
						if($category1 == 3){
							$category1 = 0;
						}
					}

					if(empty($_GET["search_workplace2"])){ 
						$category2 = 1; //전체 선택
					}else{
						$category2 = $_GET["search_workplace2"];
					}
					
					?>
					<form name="search_frm" method="get" action="" onsubmit="return form_chk(this);">
						<select class="selector" name="search_workplace1" onchange="form_chk2(this.value);" >
							<option value="2" <?php if($category1 == 2) echo "selected" ?>>::전체::</option>
							<option value="1" <?php if($category1 == 1) echo "selected" ?>>사용</option>
							<option value="3" <?php if($category1 == 0) echo "selected" ?>>사용중지</option>
						</select>
						<select class="selector" name="search_workplace2" onchange="form_chk2(this.value);">
							<option value="" <?php if($category2 == 1) echo "selected" ?>>::전체::</option>
							<option value="user_id" <?php if($category2 == "user_id") echo "selected" ?>>아이디</option>
							<option value="user_name" <?php if($category2 == "user_name") echo "selected" ?>>이름</option>
						</select>
						<input type="text" name="search_word" value="<?php echo $search_word ?>" class="search_box" />
						<input type="submit" value="검색" class="blue_sbtn" style = "margin-left: 3px;"/>&nbsp;&nbsp;&nbsp;
						
					</form>
				</div>
				<div class="member_list_area">
				<?php 
					include "../../common/connection.php";

					$conn = new DBconn();
					$conn->connection(); 

					$query = "SELECT user_id, user_name, user_tel, user_created, user_state, company_code FROM user_tbl";
					
					if($category1 == 2 && $category2 == 1)
					{
						$query .= " WHERE ((user_state= 0 or user_state = 1) AND (user_name LIKE '%$search_word%' OR user_id LIKE '%$search_word%'))";
					} 
					else if( $category1 == 2 && $category2 != 1) {
						$query .= " WHERE ((user_state= 0 or user_state = 1) AND ($category2 LIKE '%$search_word%'))";
					} 
					else if( $category1 !=2 && $category2 == 1) {
						$query .= " WHERE (user_state=$category1 AND (user_name LIKE '%$search_word%' OR user_id LIKE '%$search_word%'))";
					} 
					else {
						$query .= " WHERE (user_state= $category1 AND ($category2 LIKE '%$search_word%'))";
					}

					$query .= " AND company_code='$code'";
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

					$query .=  " order by user_name asc limit ".$first.", ".$bbs_psu."";
					$result = mysqli_query($conn->connect, $query);

					?>
					<table class="list_table">
						<colgroup>
							<col width="300" />
							<col width="300" />
							<col width="350" />
							<col width="350" />
							<col width="" />
						</colgroup>
						<tr>
							<th>아이디</th>
							<th>이름</th>
							<th>전화번호</th>
							<th>등록일</th>
							<th>상태</th>
						</tr>
						<?php
							while($row = mysqli_fetch_array($result)){
						?>
						<tr>
						<td 
							style="text-decoration:underline;cursor: pointer;" 
							onclick="location.href='Employee_modify.php?id=<?php echo $row[0]?>';"
						>
							<?php print $row[0]; ?>
						</td>
						<td><?php print $row[1]; ?></td>
						<td><?php print $row[2]; ?></td>
						<td><?php print $row[3]; ?></td>
						<td>
						<?php 
							if($row[4] == 1) {
								print "사용";
							} else {
								print "사용중지";
							}
						 ?>
						 </td>
						</tr>
						<?php
							}
							$conn->close();
						?>
					</table>

					<div class="paging">
							<?=paging($bbs_psu,10,"",$page,"&search_workplace1=$_GET[search_workplace1]&search_workplace2=&_GET[search_workplace2]&search_word=$_GET[search_word]",$total_page)?>
					</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</div>
</body>