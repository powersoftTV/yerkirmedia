<?php
include "baza.php" ;
echo "<ul>";
$resh_bottom = mysql_query( "SELECT * FROM `records` WHERE `r_category` > 0 AND `r_top` = 1 AND `r_show_hy` = 1 Order by `r_ord` desc LIMIT 15" ) ;
    $count_bottom = @mysql_num_rows($resh_bottom);
    for($i=0;$i<$count_bottom;$i++){
	   $pic_bottom = mysql_result( $resh_bottom, $i, "r_pic" );
       echo "<li><img alt='' src='userfiles/".$pic_bottom."'></li>";			
	}
echo "</ul>";
?>