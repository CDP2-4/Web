<?php
	include "../../common/session.php";
    include "../../common/connection.php";

	//DB연결, insert
    $conn = new DBconn();
    $conn->connection();

	//기업 고유번호는 어떻게 해결하지..? -> 로그인 기능
	//창고 등록번호도 자동으로 올라가도록해야함. -> DB의 no를 따라가게 할까?
	//DB의 no를 창고 등록번호로 사용해도 되지않나..?

    $warehouse_name = $_POST['warehouse_name'];
    $warehouse_addr = $_POST['warehouse_addr'];
    $company_code = $_SESSION['code'];
			
    $query = "
        insert into warehouse_tbl (
            warehouse_name, 
            warehouse_addr, 
			company_code
        ) values (
            '".$warehouse_name."',
            '".$warehouse_addr."',
			'".$company_code."')";
    
    $result = mysqli_query($conn->connect, $query);

    if($result == true) {
        echo "<script>alert('창고 등록을 완료하였습니다.');</script>";
        echo "<script>location.replace('/views/WarehouseListPage/WarehouseListPage.php');</script>";
    } 
	if($result == false) {
		echo "<script>alert('창고 등록에 실패했습니다.');</script>";
		echo "<script>location.replace('/views/WarehouseListPage/WarehouseListPage.php');</script>";
	}
?>