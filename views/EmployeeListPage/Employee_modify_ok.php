<?php 
	include "../../common/session.php";
    include "../../common/connection.php";

    $id = $_GET['id'];
    $name = $_POST['name'];
    $passwd = $_POST['passwd'];
    $tel = $_POST['tel'];
    $state = $_POST['search_workplace'];
	$code = $_SESSION['code'];

    $conn = new DBconn();
    $conn->connection();

    $query = "update user_tbl set 
    user_name='$name', 
    user_pwd='$passwd',
    user_tel='$tel',
    user_state=$state where user_id='$id' and company_code='$code'";

    $result = mysqli_query($conn->connect, $query);
	$conn->close();

    if($result == true) {
        echo "<script>alert('수정을 완료하였습니다.');</script>";
        echo "<script>location.replace('/views/EmployeeListPage/EmployeeListPage.php');</script>";
    } else {
        echo "<script>alert('수정에 실패하였습니다.');</script>";
        echo "<script>location.replace('/views/EmployeeListPage/EmployeeListPage.php');</script>";
    }
?>