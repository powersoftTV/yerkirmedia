<? function pagination($page, $pages,$p, $dest){
			echo"<p id='paging'>Էջեր` &nbsp;".$page."/".$pages." &nbsp;&nbsp; ";
			$pre="<span style='color:#F00; font-size:16px; font-weight:600'>";
			$pos="</span>";
			$next="&nbsp;>&nbsp;";
			$prev="&nbsp;<&nbsp;";
		 if($page==1){
         	echo "&nbsp;";
          }
		 else {
			 ?>
         	<a href="<?=$dest?><?=$p?>=<?=$page-1?>"><?=$prev?></a>
         <? }
		
		 for($i=1;$i<$pages+1;$i++){
			 
			 if($pages<12){
				 if($i==$page)echo $pre.$i.$pos;
				 else {?>
				 	<a href="<?=$dest?><?=$p?>=<?=$i?>"><?=$i ?></a>
				 <? }
			  }
			  else {				  
				  if($page<7){
					if($i==$page)echo $pre.$i.$pos;
					if(($i==1 && $i!=$page) || ($i==$pages && $page!=$pages) || ($i<10 && $i!=$page)){?>
				 	<a href="<?=$dest?><?=$p?>=<?=$i?>"><?=$i ?></a> 	<?	}
					if(($i==$page+4 && ($page+4 < $pages) && $page>5) || ($pages>10 && $i==10)) echo "..." ;				 	
				 	}
				  elseif($page>$pages-6){
					 if($i==$page)echo $pre.$i.$pos;
					if(($i==1 && $i!=$page) || ($i==$pages && $page!=$pages) || ($i>$pages-9 && $i!=$page)){?>
				 	<a href="<?=$dest?><?=$p?>=<?=$i?>"><?=$i ?></a> 	<?	}
					if(($i==$page-4 && ($page-4 < $pages) && $page<$pages-9) || ($pages>10 && $i==1)) echo "..." ;				 	
				 	}	
				  else {
					if($i==$page)echo $pre.$i.$pos; 					
					if(($i==1 && $i!=$page) || ($i==$pages && $page!=$pages) || ($i>$page-4 && $i<$page+4 && $i!=$page)){?>
				 		<a href="<?=$dest?><?=$p?>=<?=$i?>"><?=$i ?></a> 	<? }				 
					if(($i==$page+3 && ($page+4 < $pages)) || ($i==$page-4) && ($page-4 > 1)) echo "..." ;
				 	  }
			  	}
		 }
		 if($page==$pages ||$page>$pages-1) echo "&nbsp;";
		 else { 
		  ?>
         	<a href="<?=$dest?><?=$p?>=<?=$page+1 ?>"><?=$next?></a>
         <? }
}
?>