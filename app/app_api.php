<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);

include("dbconn.php");




//이미지 폴더 경로
$target_path = "./user_img/";
//이미지 폴더 경로
$target_fileupdate_path = "./upload_img/";


$_version = "10000";


if($_REQUEST['action'] == "_isLoginCheck" ){
	$_sql = "SELECT *, COUNT(user_id) AS CNT FROM user_tbl WHERE user_id='$_REQUEST[user_id]' AND user_pwd='$_REQUEST[user_pwd]'";

	$result = mysqli_query($dbconn, $_sql);

	if(!$result){
		die(mysqli_error($dbconn));
	}

	$list = mysqli_fetch_array ( $result );
	$cnt =  $list['CNT'];
	if($cnt > 0){
		
		$resultJson['res'] = "0";
		$resultJson['info'] = $list;
	}else{
		$resultJson['res'] = "1";
	}

	echo json_encode ( $resultJson );

} else if($_REQUEST['action'] == "_isLoadWarehouse" ) {
	$_sql = "SELECT *
			FROM inout_tbl AS _iot 
			JOIN warehouse_tbl AS _wt 
			ON _iot.warehouse_no = _wt.no
			JOIN user_tbl AS _ut
			ON _iot.user_id = _ut.user_id
			WHERE _iot.user_id = '$_REQUEST[user_id]' 
			ORDER BY _iot.in_time DESC LIMIT 0, 1";

	$result = mysqli_query($dbconn, $_sql);

	if(!$result){
		$resultJson['res'] = "1";
		die(mysqli_error($dbconn));
	}

	$list = mysqli_fetch_array ( $result );

	$resultJson['res'] = "0";
	$resultJson['info'] = $list;

	echo json_encode ( $resultJson );

} else if($_REQUEST['action'] == "_isEditValue" ) {
   $_sql = "UPDATE user_tbl 
			SET user_pwd='$_REQUEST[user_pwd]', user_name='$_REQUEST[user_name]', user_tel='$_REQUEST[user_tel]' 
			WHERE user_id='$_REQUEST[user_id]'";
   
   $result = mysqli_query($dbconn, $_sql);

   if(!$result){
	   $resultJson['res'] = "1";
      die(mysqli_error($dbconn));
   }else{
	$resultJson['res'] = "0";
   }

/*if res=0 mean update complete

   $list = mysqli_fetch_array ( $result );
   $cnt =  $list [CNT];

   if($cnt > 0){
      
      $resultJson['res'] = "0";
      $resultJson['info'] = $list;
   }else{
      $resultJson['res'] = "1";
   }
*/
   echo json_encode ( $resultJson );

}
else if($_REQUEST['action'] == "_isRelease" ) {
   $_sql = "UPDATE product_tbl
			SET release_user_id='$_REQUEST[user_id]', release_time=now() 
			WHERE product_QR='$_REQUEST[product_QR]'";
   
   $result = mysqli_query($dbconn, $_sql);

   if(!$result){
	   $resultJson['res'] = "1";
      die(mysqli_error($dbconn));
   }else{
	$resultJson['res'] = "0";
   }

   echo json_encode ( $resultJson );

}
else if($_REQUEST['action'] == "_isInOutCheck" ) {
	$_sql = "SELECT * 
			FROM inout_tbl 
			WHERE user_id = '$_REQUEST[user_id]' AND warehouse_no = $_REQUEST[warehouse_no] 
			ORDER BY no DESC LIMIT 0, 1";

	$result = mysqli_query($dbconn, $_sql);

   if(!$result){
	  die(mysqli_error($dbconn));
   }

   $list = mysqli_fetch_array ( $result );
   $cnt =  mysqli_num_rows($result);

   if($cnt > 0){
		if($list['out_time'] == '1111-11-11 11:11:11' ){
			/** 나오는걸 업데이트*/
			$_sql = "UPDATE inout_tbl 
					SET out_time=now() 
					WHERE no = $list[no]";

			$result = mysqli_query($dbconn, $_sql);

			$resultJson['res'] = "1";
		} else {
			/** 추가 */
			$_sql = "INSERT INTO inout_tbl SET 
				user_id = '$_REQUEST[user_id]',
				in_time = '$_REQUEST[in_time]',
				warehouse_no = $_REQUEST[warehouse_no],
				out_time = '1111-11-11 11:11:11',
				company_code = '$_REQUEST[company_code]'";

			$result = mysqli_query($dbconn, $_sql);

			$resultJson['res'] = "0";
		}
  
   }else{
	   /** 추가 */
		$_sql = "INSERT INTO inout_tbl SET 
				user_id = '$_REQUEST[user_id]',
				in_time = '$_REQUEST[in_time]',
				warehouse_no = $_REQUEST[warehouse_no],
				out_time = '1111-11-11 11:11:11',
				company_code = '$_REQUEST[company_code]'";

		$result = mysqli_query($dbconn, $_sql);

		$resultJson['res'] = "0";
   }

   echo json_encode ( $resultJson );

} else if($_REQUEST['action'] == "_isWarehousing"){

	$_fileSql = "";

	$_kca_img_pos = 1;

	$imgPath01 = $_FILES ["img0"] ["name"];
	$temp_imgPath01 = $_FILES ["img0"] ["tmp_name"];
	$file_size01 = $_FILES ["img0"] ["size"];
	
	$_warehousing_label = "";


	if ($temp_imgPath01  != "" && $imgPath01 != "") {
		$_imgPath01 = "$_REQUEST[user_id]_".getMillisecond().getFile_Extendsion( $imgPath01 );
		copy ( $temp_imgPath01  , $target_fileupdate_path.$_imgPath01  );
		
		$_warehousing_label = $_imgPath01;
	}


	$_sql = "INSERT INTO warehousing_tbl  
			SET product_QR = '$_REQUEST[product_QR]',
				warehouse_no = $_REQUEST[warehouse_no],
				warehousing_time = now(),
				user_id = '$_REQUEST[user_id]',
				warehousing_label = '$_warehousing_label',
				company_code = '$_REQUEST[company_code]'";
			
	
	//echo $_sql;
	$result = mysqli_query($dbconn, $_sql);

	$resultJson['res'] = 0;


	echo json_encode ( $resultJson );


}




function getMillisecond() {
	list ( $microtime, $timestamp ) = explode ( ' ', microtime () );
	$time = $timestamp . substr ( $microtime, 2, 3 );
	
	return $time;
}

function getFile_Extendsion($_file_name){
	$fileinfo = pathinfo($_file_name);
	$ext = $fileinfo['extension'];
	return $ext;
}
?>



