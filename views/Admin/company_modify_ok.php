<?php
	include "../../common/connection.php";

	$name = $_POST['name'];
    $code = $_GET['code'];
    $id = $_POST['id'];
	$passwd = $_POST['passwd'];
    $address = $_POST['address'];
    $remark = $_POST['remark'];

	echo $name;
	echo $code;
	echo $id;
	echo $passwd;
	echo $address;
	echo $remark;

<!--     $conn = new DBconn();
    $conn->connection();
    
    $query = "update company_tbl set 
    company_name='$name',
    	company_id='$id',
    	company_pwd='$passwd',
    company_address='$address',
    company_remarks='$remark' where company_code='$code'";
    
    $result = mysqli_query($conn->connect, $query);
    	$conn->close();
    
    if($result == true) {
        echo "<script>alert('수정을 완료하였습니다.');</script>";
        echo "<script>location.replace('/views/Admin/company_list.php');</script>";
    } else {
        echo "<script>alert('수정에 실패하였습니다.');</script>";
        echo "<script>location.replace('/views/Admin/company_list.php');</script>";
    } -->
?>