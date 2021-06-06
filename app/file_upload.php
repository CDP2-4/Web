<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("dbconn.php");




//이미지 폴더 경로
$target_fileupdate_path = "./upload_img/";





if($_REQUEST[action] == "insert_Cattle_Sale"){
	/** 20.11.09 - 판매할소 등록하기 */

	$_fileSql = "";

	$_kca_img_pos = 1;

	$imgPath01 = $_FILES ["attach0"] ["name"];
	$temp_imgPath01 = $_FILES ["attach0"] ["tmp_name"];
	$file_size01 = $_FILES ["attach0"] ["size"];



	if ($temp_imgPath01  != "" && $imgPath01 != "") {
		$_imgPath01 = $_REQUEST[u_id]."_sale_"."_1_".getMillisecond()."_".getExt( $imgPath01 );
		copy ( $temp_imgPath01  , $target_sale_path.$_imgPath01  );

		$_fileSql = $_fileSql."kca_img0".$_kca_img_pos." = '$_imgPath01', ";
		$_kca_img_pos++;
	}


	



	$_sql = "INSERT INTO 테이블명  SET ".$_fileSql
					."u_id = $_REQUEST[u_id],
					kca_sale_kind = $_REQUEST[kca_sale_kind],
					kca_object_num = '$_REQUEST[kca_object_num]',
					kca_insertdate = now()";
			
	
	//echo $_sql;
	$result = mysql_query ( $_sql, $dbconn );

	$resultJson['res'] = 0;


	echo json_encode ( $resultJson );


}

?>