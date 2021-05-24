
<div id="a_side" style = "z-index: 1;">
		<?php $now_dir_arr = explode("/", $_SERVER['PHP_SELF']);
		if(count($now_dir_arr) > 2){
			$now_dir = $now_dir_arr[2];  
			$now_file = $now_dir_arr[3];
		}else{
			$now_file = $now_dir_arr[2];
		}?>
	<ul class="mcate_list">
		<a href="/views/ReceivingProcessingPage/ReceivingProcessingPage.php">
			<li class="<?= ($now_dir == 'ReceivingProcessingPage') ? 'li_active' : ''; ?>">입고처리</li>
		</a>
		<a href="/views/QRGenerationPage/QRGenerationPage.php">
			<li class="<?= ($now_dir == 'QRGenerationPage') ? 'li_active' : ''; ?>">QR생성</li>
		</a>
		<a href="/views/WarehouseListPage/WarehouseListPage.php">
			<li class="<?= ($now_dir == 'WarehouseListPage') ? 'li_active' : ''; ?>">창고목록</li>
		</a>
		<a href="/views/EmployeeListPage/EmployeeListPage.php">
			<li class="<?= ($now_dir == 'EmployeeListPage') ? 'li_active' : ''; ?>">직원목록</li>
		</a>
		<a href="/views/EntryStatusPage/EntryStatusPage.php">
			<li class="<?= ($now_dir == 'EntryStatusPage') ? 'li_active' : ''; ?>">입출입현황</li>
		</a>
		<a href="/views/StockStatusPage/StockStatusPage.php">
			<li class="<?= ($now_dir == 'StockStatusPage') ? 'li_active' : ''; ?>">재고현황</li>
		</a>
		<a href="/views/StockManagmentPage/StockManagmentPage.php">
			<li class="<?= ($now_dir == 'StockManagmentPage') ? 'li_active' : ''; ?>">재고관리</li>
		</a>
	</ul>
</div>