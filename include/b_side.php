<div id="a_side" style = "z-index: 1;">
	<ul class="mcate_list">
		<a href="/views/Admin/company_list.php"><li>업체목록</li></a>
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