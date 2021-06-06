<!doctype html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <title>직원 등록</title>

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
                        직원 등록
                    </div>
                </li>
                <li>
                    <div class="subTitle">
                        Register Employee
                    </div>
                </li>
            </ul>
            <div id="content2">
                <div class="member_list_area">
                    <form action="Employee_register_ok.php" method="post">
						<table class="form_table">
							<colgroup>
								<col width="200" />
								<col width="300" />
							</colgroup>
							<tr>
								<th><span style="color:red">*</span>아이디</th>
								<td><input class="input_box" name="id" type="text"/></td>
							</tr>
							<tr>
								<th><span style="color:red">*</span>비밀번호</th>
								<td><input class="input_box" name="passwd" type="password"/></td>
							</tr>
							<tr>
								<th><span style="color:red">*</span>이름</th>
								<td><input class="input_box" name="name" type="text"/></td>
							</tr>
							<tr>
								<th><span style="color:red">*</span>전화번호</th>
								<td><input class="input_box" name="tel" type="text"/></td>
							</tr>
						</table>
						<div class="employee_btn_area">
							<input type="submit" value="완료" class="blue_btn" style="margin-right: 5px"/>
							<input type="button" value="취소" class="blue_btn" onclick="location.href='EmployeeListPage.php';"/>
						</div>
                        <!-- <div class="list_title">
                            <span style="color:red">*</span>아이디
                            <span style="color:red; margin-left : 400px;">*</span>이름
                        </div>
                        <input class="input_box" name="id" type="text"/>
                        <input class="input_box" name="name" type="text" style="margin-left: 150px;"/>
                        
                        <div class="list_title">
                            <span style="color:red">*</span>비밀번호
                        </div>
                        <input class="input_box" name="passwd" type="password"/>
                        
                        <div class="list_title">
                            <span style="color:red">*</span>전화번호
                        </div>
                        <input class="input_box" name="phone" type="text"/>
                        <div class="btn_area01">
                            <input type="submit" value="완료" class="blue_btn"/>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        <?php include "../../include/footer.php"; ?>
    </div>
</html>