<!doctype html>
<html lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>직원 등록</title>

<link rel="stylesheet" type="text/css" href="/css/default.css" />
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />

</head>

<div id="wrap">
	<?php include "../../include/header.php";?>
	<div id="container">
		<?php include "../../include/a_side.php"; ?>
        <div id="content2">
			<ul class="title">
			    <li><div class="mainTitle">직원 등록</div></li>
			    <li><div class="subTitle">Register employee</div></li>
			</ul>
            <form name="write_frm" method="post" action="#" onsubmit="return form_chk(this);" enctype="multipart/form-data">
            <input type="hidden" name="t_code" value="<?=$_REQUEST[t_code]?>" />
            <input type="hidden" name="oimage1" value="<?=$upimage1?>" />
            <table class="default_view_table">
                <colgroup>
                    <col width="" />
                    <col width="" />
                </colgroup>
                <tr>
                    <th>아이디</th>
                    <td><input type="text" name="t_insta_auth" class="size450" value="" /></td>
                </tr>
                <tr>
                    <th>항목항목2</th>
                    <td>
						<select name="loc_code">
							<option value="1">항목1</option>
							<option value="2">항목2</option>
							<option value="3">항목3</option>
						</select>
                    </td>
                </tr>
                <tr>
                    <th>항목항목3</th>
                    <td><input type="text" name="t_insta_auth" class="size450" value="" readonly /></td>
                </tr>
            </table>
            <div class="btn_area01">
				<input type="submit" value="등록하기" class="darkblue_btn" />
				<input type="button" value="목록보기" class="darkgray_btn" onClick="location.href='home.php';" />
			</div>
            </form>
        </div>
    </div>
	<?php include "../../include/footer.php"; ?>
</div>