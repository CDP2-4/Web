<?php
	CLASS DBconn {
		var $Host = "localhost";
		var $Username = "knu_schemi";
		var $Userpasswd = "kNu_76*0_Pwd_^5@5_schEMi";
		var $DBname = "knu_schemi";
		var $Target = array();
		var $connect;

		function connection() {
			$this->connect = mysqli_connect($this->Host, $this->Username, $this->Userpasswd, $this->DBname);
			mysqli_query($this->connect, "set name utf8");
			mysqli_set_charset($this->connect, "utf8");
		}

		function close() {
			mysqli_close($this -> connect);
		}
}
?>
