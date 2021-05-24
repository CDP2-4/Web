<?php
#conn = mysqli_connect(
'http://schemi.0za.kr/phpmyadmin',
'knu_schemi',
'kNu_76*0_Pwd_^5@5_schEMi',
'knu_schemi');

$sql = "SELECT * FROM user_tbl";
$result = mysqli_query($conn, $sql);

?>