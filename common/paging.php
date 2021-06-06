<?php
	function paging($constsize,$pagewidth,$pagename,$page,$extra,$totalpage){
        global $conn;
        $prepage = $page - 1;
        if ($prepage < 1) {
            $prepage = "";
        }

        $nextpage = $page + 1;
        if ($nextpage > $totalpage) {
            $nextpage = "";
        }

        $blockPage = (int)(($page-1)/$pagewidth)*$pagewidth+1;
        
        echo "<ul class='clearfix'>";
        if ($page > $pagewidth) {
            echo "<li class=\"box\" onclick=\"location.href='".$pagename."?page=".($blockPage - 10)."&constsize=".$constsize.$extra."'\";><</li>";
        }

        for($i=1; $i <= $pagewidth;$i++){
            if($blockPage <= $totalpage){
                If($blockPage == $page){
                    echo "<li class=\"box now_page\">".$blockPage."</li>";
                }else{
                    echo "<li class=\"box\" onclick=\"location.href='".$pagename."?page=".$blockPage."&constsize=".$constsize.$extra."'\">".$blockPage."</li>";
                }
            }
            $blockPage++;
        }
        

        if ($nextpage <> "" && $totalpage >= $blockPage) {
            echo "<li class=\"box\" onclick=\"location.href='".$pagename."?page=".$blockPage ."&constsize=".$constsize.$extra."'\">></li>";
        }
        echo "</ul>";
}
?>