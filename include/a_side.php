
<div id="a_side" style = "z-index: 1;">
	<ul class="mcate_list">
		<a href="/views/ReceivingProcessingPage/ReceivingProcessingPage.php"><li>입고처리</li></a>
		<a href="/views/QRGenerationPage/QRGenerationPage.php"><li>QR생성</li></a>
		<a href="/views/WarehouseListPage/WarehouseListPage.php"><li>창고목록</li></a>
		<a href="/views/EmployeeListPage/EmployeeListPage.php"><li>직원목록</li></a>
		<a href="/views/EntryStatusPage/EntryStatusPage.php"><li>입출입현황</li></a>
		<a href="/views/StockStatusPage/StockStatusPage.php"><li>재고현황</li></a>
		<a href="/views/StockManagmentPage/StockManagmentPage.php"><li>재고관리</li></a>
	</ul>
	<script>
		$(function(){
		var menu = $("ul a");
		menu.find("li").click(function(){   // sBtn에 속해 있는  a 찾아 클릭 하면.
		menu.removeClass("active");     // sBtn 속에 (active) 클래스를 삭제 한다.
		$(this).parent().addClass("active"); // 클릭한 a에 (active)클래스를 넣는다.
			})
		})
	</script>
</div>