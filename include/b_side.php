<div id="a_side" style = "z-index: 1;">
		<?php $now_dir_arr = explode("/", $_SERVER['PHP_SELF']);
		if(count($now_dir_arr) > 2){
			$now_dir = $now_dir_arr[2];  
			$now_file = $now_dir_arr[3];
		}else{
			$now_file = $now_dir_arr[2];
		}?>
	<ul class="mcate_list">
		<a href="/views/Admin/company_list.php">
			<li class="<?= ($now_dir == 'Admin') ? 'li_active' : ''; ?>">업체목록</li>
		</a>
	</ul>
</div>