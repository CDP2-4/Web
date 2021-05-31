<?php
    include "../../common/connection.php";

	//업체고유번호 4자리 랜덤생성
	$characters = "0123456789";
	$characters .= "abcdefghijklmnopqrstuvwxyz";  
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  

	$string_generated = "";
	$nmr_loops = 4;  
    while ($nmr_loops--)  
    {  
        $string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];  
    }  

	//DB연결, insert
    $conn = new DBconn();
    $conn->connection();

    $company_name = $_POST['name'];
    $company_id = $_POST['id'];
    $company_pwd = $_POST['passwd'];
    $company_address = $_POST['address'];
    $company_remarks = $_POST['remark'];
	$code = $string_generated;

    $query = "
        insert into company_tbl (
            company_name, 
            company_id, 
            company_pwd, 
            company_address,
            company_remarks,
			company_code
        ) values (
            '".$company_name."',
            '".$company_id."',
            '".$company_pwd."',
            '".$company_address."',
            '".$company_remarks."',
			'".$code."')";
    
    $result = mysqli_query($conn->connect, $query);

    if($result == true) {
        echo "<script>alert('기업 등록을 완료하였습니다.');</script>";
        echo "<script>location.replace('/views/Admin/company_list.php');</script>";
    } 
	if($result == false) {
		echo "<script>alert('기업 등록에 실패했습니다.');</script>";
	}
?>