<?php
	include "../../common/connection.php";

	$product_qr = $_POST['product_qr'];
    $product_cas = $_POST['product_cas'];
    $product_name = $_POST['product_name'];
	$warehousing_time = $_POST["warehousing_time"];
	$warehousing_user_id = $_POST["warehousing_user_id"];
	$warehouse_no = $_POST["warehouse_no"];
	$company_code = $_POST["company_code"];

	//echo "$product_qr";
	//echo "$product_cas";
	//echo "$product_name";
	//echo "$warehousing_time";
	//echo "$warehousing_user_id";
	//echo "$warehouse_no";
	//echo "$company_code";

	//echo "<script>alert('$product_qr');</script>";

	$conn = new DBconn();
    $conn->connection();
    
    $query = "update warehousing_tbl set 
    state='0' where product_QR='$product_qr'";

	$query_insert = "insert into product_tbl (
			product_QR,
			product_cas,
			product_name,
			warehousing_time,
			warehousing_user_id,
			warehouse_no,
			company_code
        ) values (
			'".$product_qr."',
			'".$product_cas."',
            '".$product_name."',
			'".$warehousing_time."',
            '".$warehousing_user_id."',
            '".$warehouse_no."',
			'".$company_code."')";
    
    $result = mysqli_query($conn->connect, $query);

	$result2 = mysqli_query($conn->connect, $query_insert);
    $conn->close();
    
    if($result2 == true) {
        echo "<script>alert('등록을 완료하였습니다.');</script>";
		echo "<script>opener.refreshPage();</script>";
        echo "<script>self.close();</script>";

    } else {
        echo "<script>alert('등록에 실패하였습니다.');</script>";
        echo "<script>self.close();</script>";
		echo "<script>opener.refreshPage();</script>";
    }

//	echo "<script>window.close()</script>";
//	echo "<script>self.close()</script>";
//	echo "<script>close()</script>";

//	echo "<script>window.opener.close()</script>";
//	echo "<script>opener.close()</script>";

?>