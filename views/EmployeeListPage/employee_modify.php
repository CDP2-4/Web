<?php include "../../common/session.php";?>
<!doctype html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>직원 정보 수정</title>

        <link rel="stylesheet" type="text/css" href="/css/default.css"/>
        <link rel="stylesheet" type="text/css" href="/css/layout.css"/>
        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="/css/style_EmployeeListPage.css"/>

    </head>

    <div id="wrap">
        <?php include "../../include/header.php";?>
        <div id="container">
            <?php include "../../include/a_side.php"; ?>
            <ul class="title">
                <li>
                    <div class="mainTitle">
                        직원 정보 수정
                    </div>
                </li>
                <li>
                    <div class="subTitle">
                        Modify employee information
                    </div>
                </li>
            </ul>
            <div id="content2">
                <?php
				include "../../common/connection.php";

				$conn = new DBconn();
				$conn->connection();

				$id = $_GET['id'];
				$code = $_SESSION['code'];
				$query = "SELECT user_name, user_tel, user_state FROM user_tbl WHERE user_id='$id' AND company_code='$code'";
			
				$result = mysqli_query($conn->connect, $query);
				$row = mysqli_fetch_array($result);

				$name = $row['user_name'];
				$tel = $row['user_tel'];
				$state = $row['user_state'];

				$conn->close();
			?>
                <div>
                    <form action="Employee_modify_ok.php?id=<?php echo $id; ?>" method="post">
						<table class="form_table" style="margin-top: 25px">
							<colgroup>
								<col width="200" />
								<col width="300" />
							</colgroup>
							<tr>
								<th><span style="color:red">*</span>아이디</th>
								<td><input class="input_box" name="id" type="text" value=<?php echo $id; ?> disabled="disabled"/></td>
							</tr>
							<tr>
								<th><span style="color:red">*</span>비밀번호</th>
								<td><input class="input_box" name="passwd" type="password"/></td>
							</tr>
							<tr>
								<th><span style="color:red">*</span>이름</th>
								<td><input class="input_box" name="name" type="text" value=<?php echo $name; ?> /></td>
							</tr>
							<tr>
								<th><span style="color:red">*</span>전화번호</th>
								<td><input class="input_box" name="tel" type="text" value=<?php echo $tel; ?> /></td>
							</tr>
							<tr>
								<th><span style="color:red">*</span>상태</th>
								<td>
									<select
										class="selector"
										name="search_workplace"
										onchange="form_chk2(this.value);"
										style="float:left; margin-left : 20px;">
										<?php 
											if($state == 1) {
										?>
										<option value="1" selected>사용</option>
										<option value="0">사용중지</option>
										<?php } else {
										?>
										<option value="1">사용</option>
										<option value="0" selected>사용중지</option>
										<?php
											}
										?>
									</select>
								</td>
							</tr>
						</table>
						<div class="employee_btn_area">
							<input type="submit" value="수정" class="blue_btn" style="margin-right: 5px"/>
							<input type="button" value="취소" class="blue_btn" onclick="location.href='EmployeeListPage.php';"/>
						</div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "../../include/footer.php"; ?>
    </div>
</html>