<?php
	include "../../common/session.php";
    include "../../common/connection.php";

    $conn = new DBconn();
    $conn->connection();

    $id = $_POST['id'];
    $passwd = $_POST['passwd'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $today = date("Y-m-d");
    $code = $_SESSION['code'];

    $query = "
        insert into user_tbl (
            user_id, 
            user_pwd, 
            user_name, 
            user_tel,
            user_created,
            company_code
        ) values (
            '".$id."',
            '".$passwd."',
            '".$name."',
            '".$tel."',
            '".$today."',
            '".$code."')";
    
    $result = mysqli_query($conn->connect, $query);
    $conn->close();

    if($result == true) {
        echo "<script>alert('직원 등록을 완료하였습니다.');</script>";
        echo "<script>location.replace('/views/EmployeeListPage/EmployeeListPage.php');</script>";
    } else {
        echo "<script>alert('직원 등록을 실패하였습니다.');</script>";
        echo "<script>location.replace('/views/EmployeeListPage/EmployeeListPage.php');</script>";
    }
?>