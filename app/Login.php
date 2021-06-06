<?php
	include "../common/connection.php";

	$conn = new DBconn();
	$conn->connection(); 
	
	$user_id = $_POST["user_id"];
	$user_pwd = $_POST["user_pwd"];

    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE user_iD = ? AND user_pwd = ?");
    mysqli_stmt_bind_param($statement, "ss", $user_id, $user_pwd);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_id, $user_pwd, $user_name, $user_tel);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["user_id"] = $user_id;
        $response["user_pwd"] = $user_pwd;
        $response["user_name"] = $user_name;
        $response["user_tel"] = $user_tel;
    }

    echo json_encode($response);

	$conn->close();
?>