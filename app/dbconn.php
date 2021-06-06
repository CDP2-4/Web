<?php
 $db_name='knu_schemi';
 $db_user='knu_schemi';
 $db_pw = 'kNu_76*0_Pwd_^5@5_schEMi';


$dbconn = mysqli_connect ( 'localhost', $db_user, $db_pw, $db_name ) or die ( "MySQL에 접속할 수 없습니다." );
mysqli_select_db ( $dbconn, $db_name ) or die ( "DB에 연결할 수 없습니다." );
mysqli_query ( $dbconn, 'set names utf8' );

set_time_limit ( 0 );
?>
