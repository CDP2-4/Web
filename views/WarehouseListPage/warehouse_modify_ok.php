<?php 
    include "../../common/connection.php";

	$no = $_GET['no'];
    $warehouse_name = $_POST['warehouse_name'];
    $warehouse_addr = $_POST['warehouse_addr'];

    $conn = new DBconn();
    $conn->connection();

    $query = "update warehouse_tbl set 
    warehouse_name='$warehouse_name', 
    warehouse_addr='$warehouse_addr' where no='$no'";

    $result = mysqli_query($conn->connect, $query);
	$conn->close();

    if($result == true) {
        echo "<script>alert('수정을 완료하였습니다.');</script>";
        echo "<script>location.replace('/views/WarehouseListPage/WarehouseListPage.php');</script>";
    } else {
        echo "<script>alert('수정에 실패하였습니다.');</script>";
        echo "<script>location.replace('/views/WarehouseListPage/WarehouseListPage.php');</script>";
    }
?>