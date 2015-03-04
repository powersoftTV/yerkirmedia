<?PHP

error_reporting(0);

session_start();

include"../baza.php";

include"func.php";



//$ath = mysql_query("SELECT * FROM  `admins` Where `a_user`='".$_SERVER['PHP_AUTH_USER']."';");

//$author = mysql_fetch_array($ath);



$author['a_user'] = "admine4r5";

$author['a_pass'] = "bs5h5j6j1d";



if(!isset($_SERVER['PHP_AUTH_USER']) || !$_SERVER['PHP_AUTH_USER']){

	header ("WWW-Authenticate: Basic realm=\"BizNet Admin Page\"");

	header ("HTTP/1.0 401 Unauthorized");

	die();

}



else{  

		//$ath = mysql_query("SELECT * FROM  `admins` Where `a_user`='".$_SERVER['PHP_AUTH_USER']."';");

		//$author = mysql_fetch_array($ath);

	if($_SERVER['PHP_AUTH_USER']!=$author['a_user'] || $_SERVER['PHP_AUTH_PW']!=$author['a_pass'] || !$author['a_pass']){

		header ("WWW-Authenticate: Basic realm=\"BizNet Admin Page\"");

		header ("HTTP/1.0 401 Unauthorized");

		die();

	}

}







if(!$_SESSION['yerkir_enter']) $_SESSION['yerkir_enter']="yerkir_enter";



if(isset($_GET['act']) && ($_GET['act']=="pages" || $_GET['act']=="news" || $_GET['act']=="categories" || $_GET['act']=="reports" || $_GET['act']=="ether" || $_GET['act']=="marquee" || $_GET['act']=="banners" || $_GET['act']=="videos" || $_GET['act']=="serv_videos" || $_GET['act']=="e_harc" || $_GET['act']=="eem_videos" || $_GET['act']=="iwach_videos" || $_GET['act']=="films" || $_GET['act']=="polls" || $_GET['act']=="spec" || $_GET['act']=="ht_videos" || $_GET['act']=="f_videos" || $_GET['act']=="reports_videos") ) $act=$_GET['act']; else $act='';



if(isset($_GET['lan'])){ if($_GET['lan']=="ru") $lan="ru"; elseif($_GET['lan']=="en") $lan="en"; else  $lan="hy";} else $lan="hy";



$p=intval($_GET['p']); if(!$p) $p = 1;



if(isset($_GET['id'])) $ip=intval($_GET['id']);



if(isset($_POST['hid_act']) && $_POST['hid_act']=="update"){ 

	include"update.php";

}



$note_right_text = '';

?>

<?echo'<?xml version="1.0" encoding="utf-8"?>';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">

<head>

<title>Ադմինիստրացիոն էջ | Երկիր Մեդիա</title>

<link rel="icon" href="favicon.ico" type="image/x-icon" />

<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

<meta http-equiv="content-Type" content="text/html; charset=utf-8" />

<link href="../s/s.css" type="text/css" rel="stylesheet" />

<meta name="page-topic" content="" />

<meta name="description" content="" />

<!--DESCRIPTIONS-->

<meta name="keywords" content="" />

<!--KEYWORDS-->

<meta name="revisit-after" content="1 hour" />

<meta name="distribution" content="Global" />



<meta name="robots" content="index,follow" />

<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>

<script type="text/javascript" src="../js/jquery.rating.js"></script>

<script type="text/javascript" src="../js/jquery.MetaData.js"></script>

<script type="text/javascript" src="../js/niceforms.js"></script>

<script type="text/javascript" src="../js/accordion.js"></script>

<script type="text/javascript" src="../js/jquery.jcarousel.min.js"></script>

<script type="text/javascript" src="../js/main.js"></script>

<script type="text/javascript" src="../js/JsHttpRequest.js"></script>



<script type="text/javascript" src="fckeditor/fckeditor.js"></script>

<!--<script type="text/javascript" src="../http://s7.addthis.com/js/250/addthis_widget.js#username=narekmarkosyan"></script>-->



</head>

<body>



<!--HEADER START-->

<div id="header">

<a href="#" id="logo"><img src="/s/i/logohy.png" title="Երկիր Մեդիա" alt="Երկիր Մեդիա" style="border:0px;"></a>

<div id="top_b"></div>

</div>

<!--HEADER END-->



<!--MENU START-->

<div id="menu">

	<ul>



		<li><a href="?" class="menu" 

		   <?if($act=="") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		     ><img src='../s/i/home_menu_icon.png' style='border:0px;margin-top:2px;'></a></li>

		<li><a href="?act=ether" class="menu" 

		   <?if($act=="ether") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		     >Եթերում</a></li>

		<li><a href="?act=pages" class="menu" 

		   <?if($act=="pages") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		     >Էջեր</a></li>

		<li><a href="?act=news" class="menu" 

		   <?if($act=="news") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		     >Նորություններ</a></li>

		<li><a href="?act=categories" class="menu" 

		   <?if($act=="categories") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		     >Բաժիններ</a></li>

		<li><a href="?act=reports" class="menu"

		   <?if($act=="reports") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

			>Հաղորդումներ</a></li>

		<li><a href="?act=banners" class="menu"

		   <?if($act=="banners") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

			>Բաներներ</a></li>

		<li><a href="?act=marquee" class="menu"

		   <?if($act=="marquee") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		>Վազող տող</a></li>

		<li><a href="?act=videos" class="menu"

		   <?if($act=="videos") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		>Վիդեոներ</a></li>

		<li><a href="?act=films" class="menu"

		   <?if($act=="films") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		>Ֆիլմեր</a></li>

		<li><a href="?act=polls" class="menu"

		   <?if($act=="polls") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		>Հարցում</a></li>

		<li><a href="?act=spec" class="menu"

		   <?if($act=="spec") echo"style='background-color:#ff7c02;color:#000;text-decoration:none;'";?>

		>Հ. Թղթակից</a></li>



		

		

   </ul>

	

</div>

<!--MENU END-->



<!--CRAWL LINE START-->

<div id="crawl">

	<?

		$resh = mysql_query("SELECT * FROM `vazox_tox` WHERE `id` = 1");

		 $i=0;



    	 $m_text_1 = mysql_result($resh, $i, "text_1_$lan");

    	 $m_link_1 = mysql_result($resh, $i, "link_1_$lan");

    	 $m_text_2 = mysql_result($resh, $i, "text_2_$lan");

    	 $m_link_2 = mysql_result($resh, $i, "link_2_$lan");



    	 $m_text_3 = mysql_result($resh, $i, "text_3_$lan");

    	 $m_link_3 = mysql_result($resh, $i, "link_3_$lan");

    	 $m_text_4 = mysql_result($resh, $i, "text_4_$lan");

    	 $m_link_4 = mysql_result($resh, $i, "link_4_$lan");



    	 $m_text_5 = mysql_result($resh, $i, "text_5_$lan");

    	 $m_link_5 = mysql_result($resh, $i, "link_5_$lan");



		 if($m_text_1){if($m_link_1) echo "<a href='$m_link_1'>$m_text_1</a>"; else echo"<span style='padding-right:50px;'>$m_text_1</span>";}

		 if($m_text_2){if($m_link_2) echo "<a href='$m_link_2'>$m_text_2</a>"; else echo"<span style='padding-right:50px;'>$m_text_2</span>";}

		 if($m_text_3){if($m_link_3) echo "<a href='$m_link_3'>$m_text_3</a>"; else echo"<span style='padding-right:50px;'>$m_text_3</span>";}

		 if($m_text_4){if($m_link_4) echo "<a href='$m_link_4'>$m_text_4</a>"; else echo"<span style='padding-right:50px;'>$m_text_4</span>";}

		 if($m_text_5){if($m_link_5) echo "<a href='$m_link_5'>$m_text_5</a>"; else echo"<span style='padding-right:50px;'>$m_text_5</span>";}

?>

</div>

<!--CRAWL LINE END-->



<!--BODY START-->

<div id="body">



	<div style="float:left;border-right:1px solid #aaaaaa;width:800px;">



	<!-- empty action -->

	<?

	if(empty($act)){

		echo"<div style='width:700px;margin:auto;'>";



		if(isset($_POST['id_com']) && intval($_POST['id_com'])){

			$com_name = mysql_real_escape_string($_POST['com_name']);

			$com_com = mysql_real_escape_string($_POST['com_com']);

			mysql_query("UPDATE ` records_comments` SET `c_name`='".$com_name."', `c_com`='".$com_com."' WHERE `id` = '".intval($_POST['id_com'])."' ");

			echo"<h2 style='height:40px;font-size:18px;'>Փոփոխել մեկնաբանությունը</h2>";

			echo"<p style='color:gray;'>Մեկնաբանությունը փոփոխված է:<br /></p>";

			}



		  if($_GET['id_d']) {

			 mysql_query("DELETE FROM ` records_comments` WHERE `id`='".intval($_GET['id_d'])."' ");

			 }

		  elseif($_GET['id_ok']){

			mysql_query("UPDATE ` records_comments` SET `c_approve`='1' WHERE `id` = '".intval($_GET['id_ok'])."' ");

		  }

		  elseif($_GET['id_c'] && !isset($_POST['id_com'])){

			$resh = mysql_query("SELECT * FROM ` records_comments` WHERE id = '".intval($_GET['id_c'])."'");

		    $count = mysql_num_rows($resh);

			if($count){

			$c_name_rr = mysql_result($resh, 0, "c_name");

			$c_com_r = mysql_result($resh, 0, "c_com");

			echo"<h2 style='height:40px;font-size:18px;'>Փոփոխել մեկնաբանությունը</h2>";

			echo"<table><form action='?' method='post'><input type='hidden' name='id_com' value=".$_GET['id_c']." />

			<tr><td align='right'>Անունը`</td><td width='20'></td><td><input type='text' name='com_name' style='width:296px;padding:3px;' value='".$c_name_rr."' /></td></tr>

			<tr><td align='right'>Մեկնաբանությունը`</td><td width='20'></td><td><textarea style='width:300px;padding:3px;' name='com_com'>".$c_com_r."</textarea></td></tr>

			<tr><td colspan='2'></td><td><input type='submit' value='Փոփոխել'></td></tr></form>

			</table>";

			}



		  }



			

		  if(!$id && !isset($_GET['n'])){



		   $resh = mysql_query("SELECT * FROM ` records_comments` WHERE `c_approve` = '0' ORDER BY id DESC ");

		   $count = mysql_num_rows($resh);



		   echo"<h2 style='height:40px;font-size:18px;'>Չհրապարակված մեկնաբանություններ` ".$count." հատ</h2>";



		   if(!$count) {

			  echo"Չհրապարակված մեկնաբանություններ չկան:";

		   }

		   else{

			   $note_right_text.= "Ձախում սկզբից բերված են մեկնաբանությունները որոնք դեռ հրապարակված չեն կայքում, կարող եք հաստատել, փոփոխել, կամ ջնջել նրանցից յուրաքանչյուրը:<br /><br />";

		 

		   echo"<table cellpadding='0' cellspacing='0'><tr style='background: #d4d4d4; height:24px;'>

		   <td width='30'></td>

		   <td  width='200'><b>Մեկնաբանություն<b></td>

		   <td width='20'></td>

		   <td width='100'><b>Հեղինակ</b></td>

		   <td width='20'></td>

		   <td width='100'><b>E-mail</b></td>

		   <td width='20'></td>

		   <td width='100'><b>IP</b></td>

		   <td width='20'></td>

		   <td width='100'><b>Ժամ</b></td>

		   </tr>";

			 

		   for($i=0;$i<$count;$i++)	{

					$id_r = mysql_result($resh, $i, "id");

					$record_id_r = mysql_result($resh, $i, "record_id");

					$c_name_r = mysql_result($resh, $i, "c_name");

					$c_email_r = mysql_result($resh, $i, "c_email");

					$c_com_r = mysql_result($resh, $i, "c_com");

					$c_date_r = mysql_result($resh, $i, "c_date");

					$c_ip_r = mysql_result($resh, $i, "c_ip");



					$j=$i+1;

					

					if(!$c_name_r) $c_name_r = "* Դատարկ վերնագիր *";



					echo"<tr><td colspan='10'>

					<table onmouseover=\"this.style.backgroundColor='#EEE'\" onmouseout=\"this.style.backgroundColor='#FFF'\"><tr>

					<td height='30' width='30'><span style='color:#aaaaa;'>".$j."</span></td>



							 <td width='200'>".$c_com_r."</td>

							 <td width='20'></td>

							 <td width='100'>".$c_name_r."</td>

							 <td width='20'></td>

							 <td width='100'>".$c_email_r."</td>

							 <td width='20'></td>

							 <td width='100'>".$c_ip_r."</td>

							 <td width='20'></td>

							 <td width='100'>".$c_date_r."</td>

							 </tr>";

					echo"<tr><td height='20' colspan='10'>

						<a href='?act=$act&id_ok=$id_r'><img src='../s/i/checked.png' alt='' style='border:0px;margin-left:30px;' title='Հաստատել'/></a>

						<a href='?act=$act&id_d=$id_r'><img src='../s/i/b_drop.png' alt='' style='border:0px;margin-left:12px;' title='Ջնջել'/></a>

						<a href='?act=$act&id_c=$id_r'><img src='../s/i/b_edit.png' alt='' style='border:0px;margin-left:12px;' title='Փոփոխել'/></a>

						<a href='/?act=news&lan=hy&id=$record_id_r' target='_blank'><img src='../s/i/view.png' alt='' style='border:0px;margin-left:12px;' title='Դիտել Նորությունը'/></a>

						</td></tr></table></td></tr>";

			}

			echo"</table>";



			

		   }echo"<br /><br /><br />";



		   //hraparakvacery

			$resh = mysql_query("SELECT * FROM ` records_comments` WHERE `c_approve` = '1' ORDER BY id desc ");

		    $count = @mysql_num_rows($resh);



		   echo"<h2 style='height:40px;font-size:18px;'>Հրապարակված մեկնաբանությունները` ".$count." հատ</h2>";



		   echo"<table cellpadding='0' cellspacing='0'><tr style='background: #d4d4d4; height:24px;'>

		   <td width='30'></td>

		   <td width='30'></td>

		   <td  width='200'><b>Մեկնաբանություն<b></td>

		   <td width='20'></td>

		   <td width='100'><b>Հեղինակ</b></td>

		   <td width='20'></td>

		   <td width='100'><b>E-mail</b></td>

		   <td width='20'></td>

		   <td width='100'><b>IP</b></td>

		   <td width='20'></td>

		   <td width='100'><b>Ժամ</b></td>

		   </tr>";



			 if($count) $note_right_text.= "Հրապարակված մեկնաբանությունները դասավորված են ըստ նրանց ստեղծման, ամենավերջինները ամենասկզբում: Հրապարակված մեկնաբանությունները նույնպես կարող եք փոփոխել սեղմելով ցանկացած մեկի վերնագրի վրա:";

			 else echo"<tr><td colspan='5'><br>Հրապարակված նորություններ չկան:</td></tr>";

		   for($i=($p-1)*10;$i<$count && $i<(10*$p);$i++)	{



					$id_r = mysql_result($resh, $i, "id");

					$record_id_r = mysql_result($resh, $i, "record_id");

					$c_name_r = mysql_result($resh, $i, "c_name");

					$c_email_r = mysql_result($resh, $i, "c_email");

					$c_com_r = mysql_result($resh, $i, "c_com");

					$c_date_r = mysql_result($resh, $i, "c_date");

					$c_ip_r = mysql_result($resh, $i, "c_ip");



					$j=$i+1;



					echo"<tr>

							 <td height='30'><a href='?act=$act&id_d=$id_r'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել'/></a></td>

							 <td height='30'><span style='color:#aaaaa;'>".$j."</span></td>



							 <td>".$c_com_r."</td>

							 <td width='20'></td>

							 <td>".$c_name_r."</td>

							 <td width='20'></td>

							 <td>".$c_email_r."</td>

							 <td width='20'></td>

							 <td>".$c_ip_r."</td>

							 <td width='20'></td>

							 <td>".$c_date_r."</td>

							 </tr>";

			}

			echo"</table>";

			$count_h=$count;



				//new paging

					if($count_h%10 == 0 && $count_h) $p_all = intval($count_h/10); else $p_all = intval($count_h/10) + 1;

						if(!$p) $p=1; 



					echo"<br /><p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; ";



					echo" <a href='?act=$act&lan=$lan&p=1'>1</a> ";



					$i=2;

					if($p_all<=10){

						while($p_all>=$i){

							if($p==$i) $st = "style='text-decoration:underline;'"; else $st = '';

						echo" <a href='?act=$act&lan=$lan&p=$i' $st>$i</a> ";

						$i++;

						}

					}

					elseif($p_all>10){

						if($p>7) {echo"...";$i=$p-5;

							while(($p_all>=($i+1)) && ($i<($p+5))) {

							echo" <a href='?act=$act&lan=$lan&p=$i'>$i</a> ";

							$i++;

							}	

							if($p_all>$i+1) echo " ... ";

						}

						elseif($p<=7){

							$i=2;

							while($p_all>=$i && $i<12){

							echo" <a href='?act=$act&lan=$lan&p=$i'>$i</a> ";

							$i++;

							}

							if($p_all>12) echo " ... ";

						}



						echo" <a href='?act=$act&lan=$lan&p=$p_all'>$p_all</a> ";

					}



					echo"</p>";

				 // end new paging



		  }

		  echo"</div>";

	}

	?>

	<!-- empty action end-->

	

	<!-- pages  start -->

	 <?

	 if($act=="pages"){

		 echo"<div style='width:700px;margin:auto;'>";



		 if(!isset($id) || empty($id)){

		  	  $resh = mysql_query("SELECT * FROM `records` WHERE `r_category` = '0' ORDER BY id LIMIT 4 ");

			  $count = @mysql_num_rows($resh);



			  $note_right_text = "Ձախում բերված են կայքի հիմնական էջերը, ընտրելով նրանցից ցանկացածը դուք կարող եք փոփոխել ներսի ինֆորմացիան, բոլոր երեք լեզուներով:";



			  echo"<h2 style='height:40px;font-size:18px;'>Ընտրեք էջը փոփոխելու համար</h2>";



			   for($i=0;$i<$count;$i++)	{

    	        $id_r = mysql_result($resh, $i, "id");

    	        $r_title_arm_r = mysql_result($resh, $i, "r_title_hy");



				echo"<h4 style='margin-left:30px;height:30px;'><a href='?act=pages&id=$id_r'>".$r_title_arm_r."</a></h4>";

			   }

			  

		 }



		 else{



         if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		 $note_right_text.= "Էջի ինֆորմացիան փոփոխելուց հետո, սեղմում եք ներքևում տեղակայված &quot;Թարմացնել ինֆորմացին&quot; կոճակը, փոփոխված ինֆորմացիան բազայում գրանցելու համար:";



		 



		 if($lan=="hy") {

			 $note_right_text.="<br /><br />Համապատասխան ռուսերեն կամ անգլերեն լեզվով ինֆորմացիան տեսնելու և փոփոխելու համար, ընտրեք  լեզուն օգտվելով` &quot;Էջը ռուսերեն&quot; կամ &quot;Էջը անգլերեն&quot; հղումներից:";



		    echo"<p style='text-align:right;height:25px;'><a href='?act=pages&id=$id&lan=ru'><u>Էջը ռուսերենով</u></a></p>";

		    echo"<p style='text-align:right;height:25px;'><a href='?act=pages&id=$id&lan=en'><u>Էջը անգլերենով</u></a></p>";

		 }

		 elseif($lan=="ru"){

		    echo"<p style='text-align:right;height:25px;'><a href='?act=pages&id=$id'><u>Էջը հայերենով</u></a></p>";

		    echo"<p style='text-align:right;height:25px;'><a href='?act=pages&id=$id&lan=en'><u>Էջը անգլերենով</u></a></p>";		 

		 }

		 elseif($lan=="en"){

		    echo"<p style='text-align:right;height:25px;'><a href='?act=pages&id=$id'><u>Էջը հայերենով</u></a></p>";	 

		    echo"<p style='text-align:right;height:25px;'><a href='?act=pages&id=$id&lan=ru'><u>Էջը ռուսերենով</u></a></p>";	 

		 }



		 $resh = mysql_query("SELECT * FROM `records` WHERE `r_category` = '0' AND `id` = '".$id."' ");

		 //$id_r = mysql_result($resh, $i, "id");

		 //echo $lan;

    	 $r_title_r = mysql_result($resh, $i, "r_title_$lan");

    	 $r_text_r = mysql_result($resh, $i, "r_text_$lan");

    	 $r_keywords_r = mysql_result($resh, $i, "r_keywords_$lan");



		 echo"<h2 style='height:40px;font-size:18px;'>Ներքևի դաշտերում լրացված է էջի ողջ ինֆորմացին</h2>";







	  ?><form action='#' method='post' name='EditForm'>



	    <table>

		 <tr><td style='height:40px;' valign='top'> Էջի անունը</td><td style="text-align:right;" valign='top'><input type='text' name="page_title"  style="width:580px;" value='<?=$r_title_r?>'/></td></tr>

		 

		 <tr><td colspan='2'> Հիմանական ինֆորմացիան</td></tr>

		 <tr><td colspan='2'>



        <textarea id="tempTextId" style="display:none;" rows="1" cols="3"><?=$r_text_r?></textarea>

	    <script type="text/javascript">

	     var sBasePath = "fckeditor/" ;

	     var oFCKeditor = new FCKeditor( 'page_content' ) ;

	     oFCKeditor.BasePath	= sBasePath ;

		 oFCKeditor.Height = 500 ;

		 oFCKeditor.Width = 700 ;

		 oFCKeditor.Value = document.getElementById('tempTextId').value;

		 oFCKeditor.Create() ;

        </script>



		</td></tr>



		<tr><td colspan='2' style='height:40px;' valign='bottom'> Բանալի բառեր(keywords), բաժանել միմյանցից ստորակետով</td></tr>

		<tr><td colspan='2'><input type='text' name="page_keywords" style="width:700px;" value='<?=$r_keywords_r?>'/></td></tr>



		<tr><td colspan='2' style='text-align:center;'>

		 <input type='hidden' name='hid_act' value='update'/>

		 <input type='submit' style='outline:none;margin-top:20px;width:200px;' onclick='this.form.submit(); return false;' value='Թարմացնել ինֆորմացիան' alt="" title=""/></td></tr>

		

		</table>

		</form>

 <?}//ip>0



	 echo"</div>";

	 }

	 ?>

	<!-- pages  end -->









	<!-- categories start -->

	<?

	 if($act=="categories"){

	  echo"<div style='width:700px;margin:auto;'>";



	  if(!isset($id) || empty($id)){



		   echo"<h2 style='height:40px;font-size:18px;'>Նոր բաժին ավելացնելու համար լրացրեք դաշտերը</h2>";

		   echo"<table style='width:500px;' ><form action='#' method='post'>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Անունը ռուսերեն</td><td width='20'></td><td><input type='text' name='name_ru'style='width:300px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Անունը անգլերեն</td><td width='20'></td><td><input type='text' name='name_en'style='width:300px;'></td></tr>

		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Ավելացնել նոր բաժին'></td></tr>

			 </form></table><br /><br />";	 



		  	  



			  if($_GET['u']==1) $note_right_text = "<b>Նոր բաժինն ավելացված է:<br />".date("G:i:s")."</b><br /><br />";

			  if(isset($_GET['id_d']) && intval($_GET['id_d'])) {

				  $note_right_text = "<b>Բաժինը ջնջված է:<br />".date("G:i:s")."</b><br /><br />";	

				  mysql_query("DELETE FROM `categories` WHERE `id`='".intval($_GET['id_d'])."' ");

			  }



              $resh = mysql_query("SELECT * FROM `categories` ORDER BY id ");

			  $count = @mysql_num_rows($resh);



			  $note_right_text.= "Ձախում բերված են նորությունների գլխավոր բաժինները, ընտրելով նրանցից ցանկացածը դուք կարող եք փոփոխել բաժնի անունը, բոլոր երեք լեզուներով:";



			  echo"<h2 style='height:40px;font-size:18px;'>Ընտրեք Բաժինը փոփոխելու համար</h2>";



			   for($i=0;$i<$count;$i++)	{

    	        $id_c = mysql_result($resh, $i, "id");

    	        $c_name_hy = mysql_result($resh, $i, "c_name_hy");



				echo"<h4 style='margin-left:30px;height:30px;'><a href='?act=categories&id=$id_c'>".$c_name_hy."</a></h4>";

			   }

			  

		 }

	 

	 else{

		 $resh = mysql_query("SELECT * FROM `categories` WHERE `id` = '".$id."' ");

		  //$id_c = mysql_result($resh, $i, "id");

    	  $c_name_hy = mysql_result($resh, $i, "c_name_hy");

    	  $c_name_ru = mysql_result($resh, $i, "c_name_ru");

    	  $c_name_en = mysql_result($resh, $i, "c_name_en");



		  echo"<p style='text-align:right;height:25px;'><a href='?act=categories&id_d=$id'><img src='../s/i/b_drop.png' alt='' title='Ջնջել բաժինը'> Ջնջել բաժինը</a></p>";



		  if($_GET['u']==1) $note_right_text = "<b>Բաժնի ինֆորմացիան թարմացված է:<br />".date("G:i:s")."</b><br /><br />";



		  		  

		  $note_right_text.= "Ձախում բերված են նորությունների գլխավոր բաժիններից, որը կարող եք կամ փոփոխել կամ ջնջել: Բաժինը ջնջելուց հետո կջնջվեն նաև այդ բաժնում ավելացված բոլոր նուրությունները:";

		  



		  echo"<h2 style='height:40px;font-size:18px;'>Փոփոխելու համար օգտագերծեք ներքևի դաշտերը </h2>";

		   echo"<table style='width:500px;' ><form action='#' method='post'>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;' value='".$c_name_hy."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Անունը ռուսերեն</td><td width='20'></td><td><input type='text' name='name_ru'style='width:300px;' value='".$c_name_ru."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Անունը անգլերեն</td><td width='20'></td><td><input type='text' name='name_en'style='width:300px;' value='".$c_name_en."'></td></tr>

		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Թարմացնել ինֆորմացին'></td></tr>

			 </form></table><br /><br />";	 

	 

	 }



	  echo"</div>";

	 }

	?>

	<!-- categories end -->













	<!-- polls start -->

	<?

	 if($act=="polls"){
		 if(isset($_REQUEST[question_show])) $question=1;
				else $question=0;
				mysql_query("UPDATE `n_conf` SET `question`='$question'") or die(mysql_error()); 
				$question = "SELECT * FROM `n_conf`";
	   	  		$result=mysql_query($question)or die(mysql_error());
		  		$row = mysql_fetch_array($result);
		  		if($row['question']==1) $controlbit='checked="checked"';
		  		else $controlbit="";

	 			echo"<div style='width:700px;margin:auto;'>";?>
	  			<form action='#' method='post' name='form' >
	 			<br />
                <table>
                	<tr>
                		<td><input type="checkbox" name= 'question_show' id="question_show"  <?=$controlbit?> /></td>
                		<td><label for="question_show"><h2 style='height:40px;font-size:18px;margin-top:10px; margin-left:5px'>Հիմնական էջում երևա հարցման բլոկը</h2></label></td>
                    </tr>
                </table>
                <input type='submit' style="width:90px;height:22px;" value='Հաստատել'/>
			    </form><br /><br />


<?
	  if(!isset($id) || empty($id)){



		   echo"<h2 style='height:40px;font-size:18px;'>Նոր հարց ավելացնելու համար լրացրեք դաշտը</h2>";

		   echo"<table style='width:500px;' ><form action='#' method='post'>

		     <tr><td style='height:25px;text-align:right;'>Հարցը</td><td width='20'></td><td><textarea  name='harc_hy' style='width:300px;'></textarea></td></tr>

		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Ավելացնել նոր հարցում'></td></tr>

			 </form></table><br /><br />";	 



		  	  



			  if($_GET['u']==1) $note_right_text = "<b>Նոր բաժինն ավելացված է:<br />".date("G:i:s")."</b><br /><br />";

			  if(isset($_GET['id_d']) && intval($_GET['id_d'])) {

				  $note_right_text = "<b>Հարցը ջնջված է:<br />".date("G:i:s")."</b><br /><br />";	

				  mysql_query("DELETE FROM `ym_poll_q` WHERE `id`='".intval($_GET['id_d'])."' ");

			  }



              $resh = mysql_query("SELECT * FROM `ym_poll_q` ORDER BY id desc");

			  $count = @mysql_num_rows($resh);



			  $note_right_text.= "Ձախում բերված են մինչ այս ավելացված հարցումները, դուք կարող եք ավելացնել նորը, կամ ընտրելուվ հիւներց փոփոխել այն:";



			  echo"<h2 style='height:40px;font-size:18px;'>Ընտրեք Հարցումը փոփոխելու համար</h2>";



			   for($i=0;$i<$count;$i++)	{

    	        $id_q = mysql_result($resh, $i, "id");

    	        $poll_q = mysql_result($resh, $i, "poll_q");



				echo"<h4 style='margin-left:30px;height:30px;'><a href='?act=polls&id_d=$id_q'><img src='../s/i/b_drop.png' alt='' title='Ջնջել հարցումը իր պատասխաններով'></a> <a href='?act=polls&id=$id_q'>".$poll_q."</a></h4>";

			   }

			  

		 }

	 

	 else{

		 $resh = mysql_query("SELECT * FROM `ym_poll_q` WHERE `id` = '".$id."' ");

		  $id_q = mysql_result($resh, $i, "id");

    	  $poll_q = mysql_result($resh, $i, "poll_q");





		  if($_GET['u']==1) $note_right_text = "<b>Հարցումը թարմացված է:<br />".date("G:i:s")."</b><br /><br />";



		  		  

		  $note_right_text.= "Ձախում բերված է Հարցումներից, որը կարող եք փոփոխել: Բաժինը ջնջելուց հետո կջնջվեն նաև այդ բաժնում ավելացված բոլոր նուրությունները:";

		  



		  echo"<h2 style='height:40px;font-size:18px;'>Փոփոխելու համար օգտագերծեք ներքևի դաշտերը </h2>";

		   echo"<table style='width:500px;' ><form action='#' method='post'>

		     <tr><td style='height:25px;text-align:right;'>Հարցը</td><td width='20'></td><td><textarea  name='harc_hy' style='width:300px;'>".$poll_q."</textarea></td></tr><tr><td style='height:20px;'></td></tr>";



		  $resh = mysql_query("SELECT * FROM `ym_poll_a` WHERE `q_id` = '".$id_q."' LIMIT 10");

		  for($i=0;$i<10;$i++){

			  $id_a = mysql_result($resh, $i, "id");

			  $poll_a = mysql_result($resh, $i, "poll_a");

			  $poll_v = mysql_result($resh, $i, "poll_a_v");

			  $jj=$i+1;



			  echo"<tr><td style='height:25px;text-align:right;'>Պատ $jj </td><td width='20'></td><td><input type='hidden' value='$id_a' name='poll_a_id_".$i."'><input type='text' name='poll_a_".$i."' style='width:300px;' value='".$poll_a."'></td></tr>";

		  }



		    echo"<tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Թարմացնել ինֆորմացին'></td></tr>

			 </form></table><br /><br />";	 

	 

	 }



	  echo"</div>";

	 }

	?>

	<!-- categories end -->



















	<!-- haxordumner start -->

	<?

	 if($act=="reports"){

	  echo"<div style='width:700px;margin:auto;'>";



	  if(!isset($id) || empty($id)){



		   echo"<h2 style='height:40px;font-size:18px;'>Նոր հաղորդում ավելացնելու համար լրացրեք դաշտերը և ընտրեք նկարը</h2>";

		   echo"<table style='width:600px;' ><form action='#' method='post' enctype='multipart/form-data'>

		     <tr><td style='height:25px;text-align:right;'>Հաղորդման նկարը</td><td width='20'></td><td><input type='file' name='h_nkar' style='width:300px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Հաղորդման բաժինը</td><td width='20'></td><td>

			 <select name='h_bajin' style='width:300px;'>

			  <option value='0'>Քաղաքական</option>

			  <option value='1'>Հասարակական</option>

			  <option value='2'>Ճանաչողական</option>

			  <option value='3'>Ժամանցային</option>

			  <option value='4'>Մշակութային</option>

			  <option value='5'>Մարզական</option>

			 </select>

			 </td></tr>



		     <tr><td style='height:25px;text-align:right;'>Հաղորդման անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;' ></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը հայերեն</td><td width='20'></td><td><input type='text' name='text_hy' style='width:400px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը հայերեն</td><td width='20'></td><td><textarea name='desc_hy' style='width:400px;'></textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը ռուսերեն</td><td width='20'></td><td><input type='text' name='name_ru'style='width:300px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը ռուսերեն</td><td width='20'></td><td><input type='text' name='text_ru'style='width:400px;'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը ռուսերեն</td><td width='20'></td><td><textarea name='desc_ru' style='width:400px;'></textarea></td></tr>



			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը անգլերեն</td><td width='20'></td><td><input type='text' name='name_en'style='width:300px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը անգլերեն</td><td width='20'></td><td><input type='text' name='text_en'style='width:400px;'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը անգլերեն</td><td width='20'></td><td><textarea name='desc_en' style='width:400px;'></textarea></td></tr>



		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Ավելացնել նոր հաղորդումը'></td></tr>

			 </form></table><br /><br />";	 



		  	  



			  if($_GET['u']==1) $note_right_text = "<b>Նոր հաղորդումը ավելացված է:<br />".date("G:i:s")."</b><br /><br />";

			  if(isset($_GET['id_d']) && intval($_GET['id_d'])) {

				  $note_right_text = "<b>Հաղորդումը ջնջված է:<br />".date("G:i:s")."</b><br /><br />";	

				  mysql_query("DELETE FROM `haxordumner` WHERE `id`='".intval($_GET['id_d'])."' ");

			  }



              $resh = mysql_query("SELECT * FROM `haxordumner` ORDER BY id ");

			  $count = @mysql_num_rows($resh);



			  $note_right_text.= "Ձախում բերված են գլխավոր հաղորդումները, կարող եք ավելացնել հաղորդում, կամ ընտրել ներքևի ցուցակից և կատարել փոփոխություններ, բոլոր երեք լեզուներով:";



			  echo"<h2 style='height:40px;font-size:18px;'>Ընտրեք Հաղորդումը փոփոխելու համար</h2>";



			   for($i=0;$i<$count;$i++)	{

    	        $id_c = mysql_result($resh, $i, "id");

    	        $c_name_hy = mysql_result($resh, $i, "h_name_hy");



				if (!$c_name_hy) $c_name_hy = "անհայտ";

 

				echo"<h4 style='margin-left:30px;height:30px;'><a href='?act=reports&id=$id_c'>".$c_name_hy."</a>  <a href='#' style='font-size:16px;font-weith:none;'>&#187;</a> <a href='?act=reports_videos&ip=$id_c'>Հաղորդման վիդեոներ</a></h4>";

			   }

			  

		 }

	 

	 else{

		 $resh = mysql_query("SELECT * FROM `haxordumner` WHERE `id` = '".$id."' ");

		  //$id_c = mysql_result($resh, $i, "id");

    	  $h_nkar_b = mysql_result($resh, $i, "h_nkar");

    	  $c_name_hy = mysql_result($resh, $i, "h_name_hy");

    	  $c_text_hy = mysql_result($resh, $i, "h_text_hy");

    	  $c_name_ru = mysql_result($resh, $i, "h_name_ru");

    	  $c_text_ru = mysql_result($resh, $i, "h_text_ru");

    	  $c_name_en = mysql_result($resh, $i, "h_name_en");

    	  $c_text_en = mysql_result($resh, $i, "h_text_en");



    	  $c_desc_en = mysql_result($resh, $i, "h_desc_en");

    	  $c_desc_ru = mysql_result($resh, $i, "h_desc_ru");

    	  $c_desc_hy = mysql_result($resh, $i, "h_desc_hy");

    	  $c_bajin = mysql_result($resh, $i, "h_bajin");



		  echo"<p style='text-align:right;height:25px;'><a href='?act=reports&id_d=$id'><img src='../s/i/b_drop.png' alt='' title='Ջնջել հաղորդումը'> Ջնջել հաղորդումը</a></p>";



		  if($_GET['u']==1) $note_right_text = "<b>Հաղորդման ինֆորմացիան թարմացված է:<br />".date("G:i:s")."</b><br /><br />";



		  		  

		  $note_right_text.= "Ձախում բերված է գլխավոր հաղորդումներից, որը կարող եք կամ փոփոխել կամ ջնջել:";

		  



		  echo"<h2 style='height:40px;font-size:18px;'>Փոփոխելու համար օգտագերծեք ներքևի դաշտերը </h2>";

		   echo"<table style='width:600px;' ><form action='#' method='post' enctype='multipart/form-data'>

		     <tr><td style='height:25px;text-align:right;'>Հաղորդման նկարը</td><td width='20'></td>

			   <td><table><tr><td><img src='../userfiles/$h_nkar_b' width='300'></td></tr>

			           <tr><td><input type='file' name='h_nkar' style='width:300px;' value='".$c_name_hy."'></td></tr></table>

						  </td>

			 </tr>

			 <tr><td style='height:25px;text-align:right;'>Հաղորդման բաժինը</td><td width='20'></td><td>

			 <select name='h_bajin' style='width:300px;'>";?>

			  <option value='0' <?if($c_bajin==0)echo"selected='selected'";?>>Քաղաքական</option>

			  <option value='1' <?if($c_bajin==1)echo"selected='selected'";?>>Հասարակական</option>

			  <option value='2' <?if($c_bajin==2)echo"selected='selected'";?>>Ճանաչողական</option>

			  <option value='3' <?if($c_bajin==3)echo"selected='selected'";?>>Ժամանցային</option>

			  <option value='4' <?if($c_bajin==4)echo"selected='selected'";?>>Մշակութային</option>

			  <option value='5' <?if($c_bajin==5)echo"selected='selected'";?>>Մարզական</option>

			 <?echo"</select>

			 </td></tr>

		     <tr><td style='height:25px;text-align:right;'>Հաղորդման անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;' value='".$c_name_hy."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը հայերեն</td><td width='20'></td><td><input type='text' name='text_hy' style='width:400px;' value='".$c_text_hy."'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը հայերեն</td><td width='20'></td><td><textarea name='desc_hy' style='width:400px;'>".$c_desc_hy."</textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը ռուսերեն</td><td width='20'></td><td><input type='text' name='name_ru'style='width:300px;' value='".$c_name_ru."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը ռուսերեն</td><td width='20'></td><td><input type='text' name='text_ru'style='width:400px;' value='".$c_text_ru."'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը ռուսերեն</td><td width='20'></td><td><textarea name='desc_ru' style='width:400px;'>".$c_desc_ru."</textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը անգլերեն</td><td width='20'></td><td><input type='text' name='name_en'style='width:300px;' value='".$c_name_en."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը անգլերեն</td><td width='20'></td><td><input type='text' name='text_en'style='width:400px;' value='".$c_text_en."'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը անգլերեն</td><td width='20'></td><td><textarea name='desc_en' style='width:400px;'>".$c_desc_en."</textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Թարմացնել ինֆորմացին'></td></tr>

			 </form></table><br /><br />";	 

	 

	 }



	  echo"</div>";

	 }

	?>

	<!-- haxordumner end -->









	<!-- spec start -->

	<?

	 if($act=="spec"){

	  echo"<div style='width:700px;margin:auto;'>";



	  if(!isset($id) || empty($id)){



		   echo"<h2 style='height:40px;font-size:18px;'>Նոր Բաժին` Հատուկ Թղթակից էջում ավելացնելու համար լրացրեք դաշտերը և ընտրեք նկարը</h2>";

		   echo"<table style='width:600px;' ><form action='#' method='post' enctype='multipart/form-data'>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի նկարը (276px 122px)</td><td width='20'></td><td><input type='file' name='h_nkar' style='width:300px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Բաժնի անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;' ></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը հայերեն</td><td width='20'></td><td><input type='text' name='text_hy' style='width:400px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը հայերեն</td><td width='20'></td><td><textarea name='desc_hy' style='width:400px;'></textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը ռուսերեն</td><td width='20'></td><td><input type='text' name='name_ru'style='width:300px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը ռուսերեն</td><td width='20'></td><td><input type='text' name='text_ru'style='width:400px;'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը ռուսերեն</td><td width='20'></td><td><textarea name='desc_ru' style='width:400px;'></textarea></td></tr>



			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը անգլերեն</td><td width='20'></td><td><input type='text' name='name_en'style='width:300px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը անգլերեն</td><td width='20'></td><td><input type='text' name='text_en'style='width:400px;'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը անգլերեն</td><td width='20'></td><td><textarea name='desc_en' style='width:400px;'></textarea></td></tr>



		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Ավելացնել նոր հաղորդումը'></td></tr>

			 </form></table><br /><br />";	 



		  	  



			  if($_GET['u']==1) $note_right_text = "<b>Նոր բաժինը ավելացված է:<br />".date("G:i:s")."</b><br /><br />";

			  if(isset($_GET['id_d']) && intval($_GET['id_d'])) {

				  $note_right_text = "<b>Հաղորդումը ջնջված է:<br />".date("G:i:s")."</b><br /><br />";	

				  mysql_query("DELETE FROM `hatuk_txtakic` WHERE `id`='".intval($_GET['id_d'])."' ");

			  }



              $resh = mysql_query("SELECT * FROM `hatuk_txtakic` ORDER BY id ");

			  $count = @mysql_num_rows($resh);



			  $note_right_text.= "Ձախում բերված են գլխավոր բաժինները, կարող եք ավելացնել բաժին, կամ ընտրել ներքևի ցուցակից և կատարել փոփոխություններ, բոլոր երեք լեզուներով:";



			  echo"<h2 style='height:40px;font-size:18px;'>Ընտրեք Բասժինը փոփոխելու համար</h2>";



			   for($i=0;$i<$count;$i++)	{

    	        $id_c = mysql_result($resh, $i, "id");

    	        $c_name_hy = mysql_result($resh, $i, "h_name_hy");



				if(!$c_name_hy) $c_name_hy = "Անհայտ";



				echo"<h4 style='margin-left:30px;height:30px;'><a href='?act=spec&id=$id_c'>".$c_name_hy."</a></h4>";

			   }

			  

		 }

	 

	 else{

		 $resh = mysql_query("SELECT * FROM `hatuk_txtakic` WHERE `id` = '".$id."' ");

		  //$id_c = mysql_result($resh, $i, "id");

    	  $h_nkar_b = mysql_result($resh, $i, "h_nkar");

    	  $c_name_hy = mysql_result($resh, $i, "h_name_hy");

    	  $c_text_hy = mysql_result($resh, $i, "h_text_hy");

    	  $c_name_ru = mysql_result($resh, $i, "h_name_ru");

    	  $c_text_ru = mysql_result($resh, $i, "h_text_ru");

    	  $c_name_en = mysql_result($resh, $i, "h_name_en");

    	  $c_text_en = mysql_result($resh, $i, "h_text_en");



    	  $c_desc_en = mysql_result($resh, $i, "h_desc_en");

    	  $c_desc_ru = mysql_result($resh, $i, "h_desc_ru");

    	  $c_desc_hy = mysql_result($resh, $i, "h_desc_hy");



		  echo"<p style='text-align:right;height:25px;'><a href='?act=spec&id_d=$id'><img src='../s/i/b_drop.png' alt='' title='Ջնջել հաղորդումը'> Ջնջել հաղորդումը</a></p>";



		  if($_GET['u']==1) $note_right_text = "<b>Բաժնի ինֆորմացիան թարմացված է:<br />".date("G:i:s")."</b><br /><br />";



		  		  

		  $note_right_text.= "Ձախում բերված է Հատուկ թղթակցի բաժիններից, որը կարող եք կամ փոփոխել կամ ջնջել:";

		  



		  echo"<h2 style='height:40px;font-size:18px;'>Փոփոխելու համար օգտագերծեք ներքևի դաշտերը </h2>";

		   echo"<table style='width:600px;' ><form action='#' method='post' enctype='multipart/form-data'>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի նկարը (276px 122px)</td><td width='20'></td>

			   <td><table><tr><td><img src='../userfiles/$h_nkar_b' width='300'></td></tr>

			              <tr><td><input type='file' name='h_nkar' style='width:300px;' value='".$c_name_hy."'></td></tr></table>

						  </td>

			 </tr>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;' value='".$c_name_hy."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը հայերեն</td><td width='20'></td><td><input type='text' name='text_hy' style='width:400px;' value='".$c_text_hy."'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը հայերեն</td><td width='20'></td><td><textarea name='desc_hy' style='width:400px;'>".$c_desc_hy."</textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը ռուսերեն</td><td width='20'></td><td><input type='text' name='name_ru'style='width:300px;' value='".$c_name_ru."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը ռուսերեն</td><td width='20'></td><td><input type='text' name='text_ru'style='width:400px;' value='".$c_text_ru."'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը ռուսերեն</td><td width='20'></td><td><textarea name='desc_ru' style='width:400px;'>".$c_desc_ru."</textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Անունը անգլերեն</td><td width='20'></td><td><input type='text' name='name_en'style='width:300px;' value='".$c_name_en."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Կարճ նկարագիրը անգլերեն</td><td width='20'></td><td><input type='text' name='text_en'style='width:400px;' value='".$c_text_en."'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը անգլերեն</td><td width='20'></td><td><textarea name='desc_en' style='width:400px;'>".$c_desc_en."</textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Թարմացնել ինֆորմացին'></td></tr>

			 </form></table><br /><br />";	 

	 

	 }



	  echo"</div>";

	 }

	?>

	<!-- spec end -->















	<!-- films start -->

	<?

	 if($act=="films"){

	  echo"<div style='width:700px;margin:auto;'>";



	  if(!isset($id) || empty($id)){



		   echo"<h2 style='height:40px;font-size:18px;'>Նոր բաժին` ֆիլմերում ավելացնելու համար լրացրեք դաշտերը և ընտրեք նկարը</h2>";

		   echo"<table style='width:600px;' ><form action='#' method='post' enctype='multipart/form-data'>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի նկարը(276px 122px)</td><td width='20'></td><td><input type='file' name='f_nkar' style='width:300px;'></td></tr>



		     <tr><td style='height:25px;text-align:right;'>Բաժնի անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;' ></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Եթերում</td><td width='20'></td><td><input type='text' name='text_hy' style='width:400px;'></td></tr>

		     <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը հայերեն</td><td width='20'></td><td><textarea name='desc_hy' style='width:400px;'></textarea></td></tr>



		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Ավելացնել նոր Բաժին'></td></tr>

			 </form></table><br /><br />";	 



		  	  



			  if($_GET['u']==1) $note_right_text = "<b>Նոր Բաժինը ավելացված է:<br />".date("G:i:s")."</b><br /><br />";

			  if(isset($_GET['id_d']) && intval($_GET['id_d'])) {

				  $note_right_text = "<b>Բաժինը ջնջված է:<br />".date("G:i:s")."</b><br /><br />";	

				  mysql_query("DELETE FROM `filmer` WHERE `id`='".intval($_GET['id_d'])."' ");

			  }



              $resh = mysql_query("SELECT * FROM `filmer` ORDER BY id ");

			  $count = @mysql_num_rows($resh);



			  $note_right_text.= "Ձախում կարող եք ավելացնել նոր բաժին ֆիլմերում, կամ ընտրել ներքևի ցուցակից և կատարել փոփոխություններ:";



			  echo"<h2 style='height:40px;font-size:18px;'>Ընտրեք Բաժինը փոփոխելու համար</h2>";



			   for($i=0;$i<$count;$i++)	{

    	        $id_c = mysql_result($resh, $i, "id");

    	        $c_name_hy = mysql_result($resh, $i, "f_name_hy");

				if(empty($c_name_hy)) $c_name_hy = "անհայտ";



				echo"<h4 style='margin-left:30px;height:30px;'><a href='?act=films&id=$id_c'>".$c_name_hy."</a></h4>";

			   }

			  

		 }

	 

	 else{

		 $resh = mysql_query("SELECT * FROM `filmer` WHERE `id` = '".$id."' ");

		  //$id_c = mysql_result($resh, $i, "id");

    	  $f_nkar_b = mysql_result($resh, $i, "f_nkar");

    	  $c_name_hy = mysql_result($resh, $i, "f_name_hy");

    	  $c_text_hy = mysql_result($resh, $i, "f_text_hy");

    	  $c_desc_hy = mysql_result($resh, $i, "f_desc_hy");



		  echo"<p style='text-align:right;height:25px;'><a href='?act=films&id_d=$id'><img src='../s/i/b_drop.png' alt='' title='Ջնջել Բաժինը'> Ջնջել Բաժինը</a></p>";



		  if($_GET['u']==1) $note_right_text = "<b>Բաժնի ինֆորմացիան թարմացված է:<br />".date("G:i:s")."</b><br /><br />";



		  		  

		  //$note_right_text.= "Ձախում բերված է գլխավոր հաղորդումներից, որը կարող եք կամ փոփոխել կամ ջնջել:";

		  



		  echo"<h2 style='height:40px;font-size:18px;'>Փոփոխելու համար օգտագերծեք ներքևի դաշտերը </h2>";

		   echo"<table style='width:600px;' ><form action='#' method='post' enctype='multipart/form-data'>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի նկարը(276px 122px)</td><td width='20'></td>

			   <td><table><tr><td><img src='../userfiles/$f_nkar_b' width='300'></td></tr>

			              <tr><td><input type='file' name='f_nkar' style='width:300px;' value='".$c_name_hy."'></td></tr></table>

						  </td>

			 </tr>

		     <tr><td style='height:25px;text-align:right;'>Բաժնի անունը հայերեն</td><td width='20'></td><td><input type='text' name='name_hy' style='width:300px;' value='".$c_name_hy."'></td></tr>

		     <tr><td style='height:25px;text-align:right;'>Եթերում</td><td width='20'></td><td><input type='text' name='text_hy' style='width:400px;' value='".$c_text_hy."'></td></tr>

			 <tr><td style='height:25px;text-align:right;' valign='top'>Լրիվ նկարագիրը հայերեն</td><td width='20'></td><td><textarea name='desc_hy' style='width:400px;'>".$c_desc_hy."</textarea></td></tr>

			 

			 <tr><td style='height:20px;'></td></tr>



		     <tr><td style='height:30px;'></td><td width='20'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Թարմացնել ինֆորմացին'></td></tr>

			 </form></table><br /><br />";	 

	 

	 }



	  echo"</div>";

	 }

	?>

	<!-- films end -->































	<!-- ether start -->

	<?

	 if($act=="ether"){

	  echo"<div style='width:700px;margin:auto;'>";



	  if(!isset($id) || empty($id)){



		   echo"<h2 style='height:60px;font-size:18px;'>Օգտագործելով երկու Ֆայլ բեռնելու կոճակները բեռնեք xlsx ֆայլերը:</h2>";

		   echo"<form action='#' method='post' enctype='multipart/form-data'><table style='width:600px;' >";



		   ?>

		   <tr><td style='height:32px;width:250px;'>Սովորական եթերի մեկ շաբաթվա ծրագիը</td><td width='20'></td><td><input type='file' name='ether_sovorakan' style='width:160px;'/></td></tr>

		   <tr><td style='height:32px;width:250px;'>Արբանյակային եթերի մեկ շաբաթվա ծրագիը</td><td width='20'></td><td><input type='file' name='ether_arbanyakayin' style='width:160px;'/></td></tr>

		   <tr><td height='30' colspan='3'><hr /></td></tr>

		   <?		     



		   echo"

		     <tr><td colspan='3' style='text-align:center;'><input type='hidden' name='hid_act' value='update'><input type='submit' style='width:160px;height:22px;' value='Ավելացնել եթերում'></td></tr>

			 </table></form><br /><br />";	 



		  	  



			  if($_GET['u']==1) $note_right_text = "<b>Նոր ծրագրերը ավելացված են:<br />".date("G:i:s")."</b><br /><br />";

			  if(isset($_GET['id_d']) && intval($_GET['id_d'])) {

				  $note_right_text = "<b>Ջնջված է:<br />".date("G:i:s")."</b><br /><br />";	

				  mysql_query("DELETE FROM `ether` WHERE `id`='".intval($_GET['id_d'])."' ");

			  }



			  $note_right_text.= "Ձախում բերված դաշտերը լրացնելով կարող եք եթերում նյութ ավելացնել:";





			 $resh = mysql_query("SELECT * FROM `ether` ORDER BY id desc Limit 50");

			 $count = @mysql_num_rows($resh);

			 if($count){

				 while ($resultEter = mysql_fetch_array($resh)) {

					echo"<p><a href='?act=$act&id_d=".$resultEter['id']."'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել'/></a> ".$resultEter['e_name_simple']."</p>";

				 }

				 // var_dump($resultEter); // e_name_simple e_name_sputnik 

				 // echo"<h2 style='font-size:18px;'><br /><br /><br />Վերջին ծրագրային օրը բազայում` ".$e_date." -ն է: </h2><br />";

			 }



		 }

	 

	  echo"</div>";

	 }

	?>

	<!-- ether end -->











	<!-- news start -->



	<?

	if($act=="news"){

	  echo"<div style='width:700px;margin:auto;'>";

	  if($_GET['id_d']) mysql_query("DELETE FROM `records` WHERE `id`='".intval($_GET['id_d'])."' ");

	  echo"<p style='text-align:right;height:25px;'><a href='?act=news&n=1'>Ավելացնել նորություն</a></p>";

	  if(!$id && !isset($_GET['n'])){

		if($_GET['lan'] && $_GET['lan']!="") $lan=$_GET['lan'];

		else $lan="hy";

		if($_GET['day'] && $_GET['day']!="")$day=$_GET['day'];

		if($_GET['month'] && $_GET['month']!="")$month=$_GET['month'];

		if($_GET['year'] && $_GET['year']!="")$year=$_GET['year'];

		if($_GET['search_category'] && $_GET['search_category']!="")$search_category=$_GET['search_category'];

		$dest="?act=$act&lan=$lan";

		if($_GET['w'] && $_GET['w']!="") $dest=$dest."&w=".$_GET['w'];

		if($day && $day!="") $dest=$dest."&day=$day";

		if($month && $month!="") $dest=$dest."&month=$month";

		if($year && $year!="") $dest=$dest."&year=$year";

		if($_GET['search_category'] && $_GET['search_category']!="") $dest=$dest."&search_category=$search_category"; 

		if($_GET['p'] && $_GET['p']!="") $dest0=$dest."&p=".$_GET['p']."&";

		else $dest0=$dest."&";

		if($_GET['pp'] && $_GET['pp']!="") $dest=$dest."&pp=".$_GET['pp'];

		$dest=$dest."&";

		if($_GET['day']) $getDate = $_GET['day'];

		$getDate .= ".";

		if($_GET['month']) $getDate .= $_GET['month'];

		$getDate .= ".";

		if($_GET['year'])$getDate .= $_GET['year'];

		if($getDate=="..") $getDate ='';

		if($_GET['search_category']) $search_category= $_GET['search_category'];

		$getDate = mysql_real_escape_string(str_replace("..",".%.",$getDate));

		$num=10;

		$num0=3;

		if($_GET['p']){

			$page=$_GET['p'];

			$start=$num*$page-$num;

		}

		else {

			$page=1;

			$start=0;

		}

		if($_GET['pp']){

			$page0=$_GET['pp'];

			$start0=$num0*$page0-$num0;

		}

		else {

			$page0=1;

			$start0=0;

		}

		

		if($_GET['w'] &&  $_GET['w']!=""){

			$search=$_GET['w'];

			$search = trim($search);

			$search = stripslashes($search);

			$search = htmlspecialchars($search);

			$search = mb_substr($search, 0, 128, 'utf-8');

			$search_hilights =preg_replace('/([,.; ])/', " ", $search);

			//$search_hilights = preg_replace("/ +/", " ", $search);	

			$tempp=explode(" ",	$search_hilights);

			$temp=array();

			$tegs=array("span","spa","pan","fon","ont","font","sty","tyl","yle","styl","tyle","style","siz","ize","size","medium","med","edi","diu","ium","medi",				            "ediu","dium","img","src","href","hre","ref");

			$flag=true;

			foreach($tempp as $f){

				if(mb_strlen($f,'UTF-8') > 2){

					foreach($tegs as $ff){

					  if($f==$ff)$flag=false;

						}

					if($flag)$temp[]=$f;

				}

			}

			$search_hilights=implode(" ", $temp);

			$search=mysql_real_escape_string($search_hilights);

			if($search!=""){

				if($getDate && $getDate!="" && $search_category){

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND records.r_category=$search_category AND  `r_show_$lan` AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";	

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND records.r_category=$search_category AND  `r_show_$lan`=0 AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";	

				}

				elseif ($search_category) {

						$query = "SELECT * FROM `records` WHERE    `r_category` > 0 AND r_category=$search_category AND   `r_show_$lan` AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') ORDER BY `r_ord` DESC ";

						$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND r_category=$search_category AND `r_show_$lan`=0 AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') ORDER BY `r_ord` DESC ";

				}

				elseif($getDate && $getDate!=""){

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND  `r_show_$lan` AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";	

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0  AND  `r_show_$lan`=0 AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";	

				}

				

			   else {$query = "SELECT * FROM `records` WHERE    `r_category` > 0  AND   `r_show_$lan` AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') ORDER BY `r_ord` DESC ";

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND `r_show_$lan`=0 AND (`r_title_$lan`  LIKE '%". str_replace(" ", "%' AND `r_title_$lan` LIKE '%", $search). "%' OR `r_text_$lan` LIKE '%". str_replace(" ", "%' AND `r_text_$lan` LIKE '%", $search). "%') ORDER BY `r_ord` DESC ";}

				}

			else {

				if($getDate && $getDate!="" && $search_category){

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND r_category=$search_category AND  `r_show_$lan`  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND r_category=$search_category AND  `r_show_$lan`=0  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

				}	

				elseif($getDate && $getDate!="") {

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND  `r_show_$lan`  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND  `r_show_$lan`=0  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

				}

				

				

				elseif ($search_category ) {

						$query = "SELECT * FROM `records` WHERE    `r_category` > 0 AND r_category=$search_category AND   `r_show_$lan`  ORDER BY `r_ord` DESC ";

						$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND r_category=$search_category AND `r_show_$lan`=0  ORDER BY `r_ord` DESC ";

				}		

				

				

				else {

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND  `r_show_$lan`   ORDER BY `r_ord` DESC ";

					$query0 = "SELECT * FROM `records` WHERE   `r_category` > 0 AND  `r_show_$lan`=0   ORDER BY `r_ord` DESC ";

				}

			}

		}

		 else{ 

				if($getDate && $getDate!="" && $search_category){

					

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND r_category=$search_category AND  `r_show_$lan`  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND r_category=$search_category AND  `r_show_$lan`=0  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

				}	

				

				elseif ($search_category) {

						$query = "SELECT * FROM `records` WHERE    `r_category` > 0 AND r_category=$search_category AND   `r_show_$lan`  ORDER BY `r_ord` DESC ";

						$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND r_category=$search_category AND `r_show_$lan`=0  ORDER BY `r_ord` DESC ";

				}

				elseif($getDate && $getDate!="") {

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND  `r_show_$lan`  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND `r_show_$lan`=0  AND `r_fullDate` LIKE '%".$getDate."%' ORDER BY `r_ord` DESC ";

				}

					

				

				else {

					$query = "SELECT * FROM `records` WHERE  `r_category` > 0 AND  `r_show_$lan`   ORDER BY `r_ord` DESC ";

					$query0 = "SELECT * FROM `records` WHERE  `r_category` > 0 AND  `r_show_$lan`=0   ORDER BY `r_ord` DESC ";

				}	

		}

		if($query){

			$result=mysql_query ($query) or die(mysql_error());

			$total=mysql_num_rows($result); 

			$pages=ceil($total/$num);

		}
		

		if($query0){

			$result0=mysql_query ($query0) or die(mysql_error());

			$total0=mysql_num_rows($result0); 

			$pages0=ceil($total0/$num0);

		}
		

	 ?>

		<div style="overflow:hidden;margin:8px 0;">

					<h3 style="margin:0 0 5px 0;">Որոնում</h3>

					<form action="?" method="Get">

						<input type="hidden" value="news" name="act" />

						<span style="float:left;margin-right:30px;">

							Բանալի բառ <input type="text"  name="w" value="<?=$search?>" style="width:150px;"/>

						</span>

                        </br>
                        
						</br>
                       
						<span style="float:left;margin-right:5px;">

							Ըստ ամսաթվի <select name="day">

												<option value="0"> օր </option>

												<?

													for($i=1;$i<=31;$i++) {

														$ij = (strlen($i)==1?"0".$i:$i);

														echo"<option value='".$ij."' ".($_GET['day']==$ij?" SELECTED ":"").">".$ij."</option>";

													}

												?>

										   </select>

										   <select name="month">

												<option value="0"> ամիս </option>

												<?

													for($i=1;$i<=12;$i++) {

														$ij = (strlen($i)==1?"0".$i:$i);

														echo"<option value='".$ij."' ".($_GET['month']==$ij?" SELECTED ":"").">".$ij."</option>";

													}

												?>

										   </select>

										   <select name="year">

                                           		<option value="0"> տարի </option>

                                           		<? for ($i=2011; $i<=date('Y'); $i++ ){

													$j=$i-2000; ?>

													<option value=<?= $j?> <?=($_GET['year']==$j?" SELECTED ":"")?>> <?= $i?> </option>

                                                    <? } ?>

										   </select>

                                           

                                      

                    Ըստ բաժնի <select name="search_category"  style="width:140px;"/>

				   <option selected="selected" value="0">բաժինը</option> 

	 			   <?

					$resh = mysql_query("SELECT * FROM `categories` Order By Id");

					$count = mysql_num_rows($resh);

					 for($i=0;$i<$count;$i++)	{

					    $category_id = mysql_result($resh, $i, "id");

					    $category_n = mysql_result($resh, $i, "c_name_$lan");


						 if($category_id == $search_category){ echo"<option value='$category_id' selected='selected'>$category_n</option>";}

						  else echo"<option value='$category_id' >$category_n</option>";

					}

				   ?>
					</select></td></tr>

				</span>



						<span style="float:left;margin-right:15px;">

							<input type="submit" value="Փնտրել" />

						</span>						

					<form>

				</div>

		<?
		

		if(!$total0) echo "<h2 style='height:40px;font-size:18px;'>Չհրապարակված նորություններում որոնման արդյունքը` 0</h2>";

		else {

			if($total0>$num0) $query0=$query0." LIMIT $start0,$num0";

			$result=mysql_query ($query0) or die(mysql_error());

			echo"<h2 style='height:40px;font-size:18px;'>Չհրապարակված նորությունները` ".$total0." հատ</h2>";

		   	$note_right_text.= "Ձախում սկզբից բերված են նորությունները որոնք դեռ հրապարակված չեն կայքում, ընտրելով նրանցից ցանկացածը կարող ես փոփոխել և հրապարակել:<br /><br />";

	 		echo"<table cellpadding='0' cellspacing='0'><tr style='background: #d4d4d4; height:24px;'><td width='30'></td><td width='30'></td><td  width='360'><b>Վերնագիր<b></td><td width='20'></td><td width='150'><b>Բաժին</b></td><td width='20'></td><td width='120'><b>Հրապարակվել է</b></td></tr>";

			$j=1;

			while($row=mysql_fetch_array($result)){

					$id_r = $row['id'];

					$r_category_r = $row['r_category'];

					$r_trans_r = $row['r_trans'];

					$r_title_hy_r = $row['r_title_hy'];

				 	$r_date_r = $row['r_date'];

				 	$r_fulldate = $row['r_fullDate'];

					$resh_c = mysql_query("SELECT * FROM `categories` WHERE `id` = '".$r_category_r."' ");

		     		$c_name_hy = mysql_result($resh_c, 0, "c_name_hy");

					$rowarray=explode(" ",$r_title_hy_r);

					$i=0;

					foreach($rowarray as $e){		

						foreach($temp as $f){				

							if(mb_strrichr($e,$f,true,'utf-8')!==false){

								$skizb=mb_strrichr($e,$f,true,'utf-8');

								$verch=mb_strrichr($e,$f,false,'utf-8');

								$sovpadenie=mb_substr($e,mb_strlen($skizb,'utf-8'),mb_strlen($f,'utf-8'),'utf-8');				

								$ostatok=mb_substr($e,mb_strlen($skizb,'utf-8')+ mb_strlen($f,'utf-8'),mb_strlen($e,'utf-8')-mb_strlen($skizb,'utf-8')- mb_strlen($f,'utf-8'),'utf-8');

								$sovpadenie="<span style='font-weight:900; font-size:20px'>".$sovpadenie."</span>";

								$rowarray[$i]=$skizb.$sovpadenie.$ostatok;

								}

							}

						$i++;	

					}

					$r_title_hy_r= implode(" ",$rowarray);

					if(!$r_title_hy_r) $r_title_hy_r = "* Դատարկ վերնագիր *";

					if($r_trans_r==1) $tImage = "<img src='images.jpg' height='20' border='0' style='margin:0px 5px;'>";

					else  $tImage = '';
					if($_GET['pp'])$tiv=($j+10*$_GET['pp'])-10;
					else $tiv=$j;
					echo"<tr>

						 <td height='30'><a href='?act=$act&id_d=$id_r'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել'/></a></td>

						 <td height='30'><span style='color:#aaaaa;'>".$tiv."</span></td>

				         <td>".$tImage."<a href='?act=news&id=".$id_r."'>".$r_title_hy_r."</a></td>

				         <td width='20'></td>

						 <td><span style='color:#aaaaa;'>".$c_name_hy."</span></td>

						 <td width='20'></td>

						 <td>".$r_date_r."</td></tr>";

					$j=$j+1;

			}

			echo"</table>";

			echo"<br />";

			if($total0>$num0 && $total0) pagination($page0, $pages0,"pp", $dest0);

		}

		echo"<br /><br /><br />";

		if(!$total) echo "<h2 style='height:40px;font-size:18px;'>Հրապարակված նորություններում որոնման արդյունքը` 0</h2>";

		else {

			if($total>$num) $query=$query." LIMIT $start,$num";

			$result=mysql_query ($query) or die(mysql_error());

			echo"<h2 style='height:40px;font-size:18px;'>Հրապարակված նորությունները` ".$total." հատ</h2>";

		   	$note_right_text.= "Հրապարակված նորությունները դասավորված են ըստ նրանց ստեղծման, ամենավերջինները ամենասկզբում: Հրապարակված նորությունները նույնպես կարող եք փոփոխել սեղմելով ցանկացած մեկի վերնագրի վրա:";

	 		echo"<table cellpadding='0' cellspacing='0'><tr style='background: #d4d4d4; height:24px;'><td width='30'></td><td  width='360'><b>Վերնագիր<b></td><td width='20'></td><td width='150'><b>Բաժին</b></td><td width='20'></td><td width='120'><b>Հրապարակվել է</b></td></tr>";

			$j=1;

			while($row=mysql_fetch_array($result)){

					$id_r = $row['id'];

					$r_category_r = $row['r_category'];

					$r_trans_r = $row['r_trans'];

					$r_title_hy_r = $row['r_title_hy'];

					$r_date_r = $row['r_date'];

				 	$r_fulldate = $row['r_fullDate'];

					$resh_c = mysql_query("SELECT * FROM `categories` WHERE `id` = '".$r_category_r."' ");

		     		$c_name_hy = mysql_result($resh_c, 0, "c_name_hy");

					$rowarray=explode(" ",$r_title_hy_r);

					$i=0;

					foreach($rowarray as $e){		

						foreach($temp as $f){				

							if(mb_strrichr($e,$f,true,'utf-8')!==false){

								$skizb=mb_strrichr($e,$f,true,'utf-8');

								$verch=mb_strrichr($e,$f,false,'utf-8');

								$sovpadenie=mb_substr($e,mb_strlen($skizb,'utf-8'),mb_strlen($f,'utf-8'),'utf-8');				

								$ostatok=mb_substr($e,mb_strlen($skizb,'utf-8')+ mb_strlen($f,'utf-8'),mb_strlen($e,'utf-8')-mb_strlen($skizb,'utf-8')- mb_strlen($f,'utf-8'),'utf-8');

								$sovpadenie="<span style='font-weight:900; font-size:20px'>".$sovpadenie."</span>";

								$rowarray[$i]=$skizb.$sovpadenie.$ostatok;

								}

							}

						$i++;	

					}

					$r_title_hy_r= implode(" ",$rowarray);

					if(!$r_title_hy_r) $r_title_hy_r = "* Դատարկ վերնագիր *";

					if($r_trans_r==1) $tImage = "<img src='images.jpg' height='20' border='0' style='margin:0px 5px;'>";

					else  $tImage = '';
					if($_GET['p'])$tiv=($j+10*$_GET['p'])-10;
					else $tiv=$j;
					echo"<tr><td height='30'><span style='color:#aaaaa;'>".$tiv."</span></td>

				         <td>".$tImage."<a href='?act=news&id=".$id_r."'>".$r_title_hy_r."</a></td>

				         <td width='20'></td>

						 <td><span style='color:#aaaaa;'>".$c_name_hy."</span></td>

						 <td width='20'></td>

						 <td>".$r_date_r."</td></tr>";

					$j=$j+1;

			}

			echo"</table>";	

			echo"<br />";				

			if($total>$num && $total) pagination($page, $pages,"p",$dest);

		   }

	  }//!id

	  elseif($id || (isset($_GET['n']) && $_GET['n']==1)) {

		

		 if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		 $note_right_text.= "<br /><br/>Նորությունը փոփոխելուց հետո, սեղմում եք ներքևում տեղակայված &quot;Թարմացնել ինֆորմացին&quot; կոճակը, փոփոխված ինֆորմացիան բազայում գրանցելու համար:";



		 



		 if($id){

		 if($lan=="hy") {

			 $note_right_text.="<br /><br />Համապատասխան ռուսերեն կամ անգլերեն լեզվով նորությունը տեսնելու և փոփոխելու համար, ընտրեք  լեզուն օգտվելով` &quot;Էջը ռուսերեն&quot; կամ &quot;Էջը անգլերեն&quot; հղումներից:";
			 $note_right_text.="<br /><br /><font color='#FF0000'/>Գլխավոր նկարի անունը պետք է լինի միայն անգլերեն լեզվով և չպիտի պարունակի ստորակետ, պռոբել կամ այլ սիմվոլներ:";



		    echo"<p style='text-align:right;height:25px;'><a href='?act=news&id=$id&lan=ru'><u>Էջը ռուսերենով</u></a></p>";

		    echo"<p style='text-align:right;height:25px;'><a href='?act=news&id=$id&lan=en'><u>Էջը անգլերենով</u></a></p>";

		 }

		 elseif($lan=="ru"){

		    echo"<p style='text-align:right;height:25px;'><a href='?act=news&id=$id'><u>Էջը հայերենով</u></a></p>";

		    echo"<p style='text-align:right;height:25px;'><a href='?act=news&id=$id&lan=en'><u>Էջը անգլերենով</u></a></p>";		 

		 }

		 elseif($lan=="en"){

		    echo"<p style='text-align:right;height:25px;'><a href='?act=news&id=$id'><u>Էջը հայերենով</u></a></p>";	 

		    echo"<p style='text-align:right;height:25px;'><a href='?act=news&id=$id&lan=ru'><u>Էջը ռուսերենով</u></a></p>";	 

		 }

		 }



		 if($id){

		 $resh = mysql_query("SELECT * FROM `records` WHERE `r_category` > 0 AND `id` = '".$id."' ");

		 //$id_r = mysql_result($resh, $i, "id");

		 //echo $lan;

		 $i=0;



    	 $r_category = mysql_result($resh, $i, "r_category");

    	 $r_pic_r = mysql_result($resh, $i, "r_pic");

		 $r_title_r = mysql_result($resh, $i, "r_title_$lan");

    	 $r_short_r = mysql_result($resh, $i, "r_short_$lan");

    	 $r_text_r = mysql_result($resh, $i, "r_text_$lan");

    	 $r_keywords_r = mysql_result($resh, $i, "r_keywords_$lan");

    	 $r_video_r = mysql_result($resh, $i, "r_video_$lan");

    	 $r_date_r = mysql_result($resh, $i, "r_date");

     	 $r_show_r = mysql_result($resh, $i, "r_show_$lan");

     	 $r_top_r = mysql_result($resh, $i, "r_top");

     	 $r_top_plus_r = mysql_result($resh, $i, "r_top_plus");

     	 $r_trans_r = mysql_result($resh, $i, "r_trans");

     	 $r_ord_r = mysql_result($resh, $i, "r_ord");

          echo "<h2 style='height:40px;font-size:18px;'>Ներքևի դաշտերում լրացված է էջի ողջ ինֆորմացին</h2>";

		 }

		  else echo"<h2 style='height:40px;font-size:18px;'>Նորություն ավելացնելու համար լրացրեք դաշտերը</h2>";



		







	  ?><form action='#' method='post' name='EditForm' enctype='multipart/form-data'>



	    <table>

		 <tr><td style='height:40px;' valign='top'> Բաժինը</td><td style="padding-left:30px;" valign='top'>

		           <select name="page_category"  style="width:140px;"/>

				   <!-- <option selected="selected" value=""> - ընտրեք բաժինը -</option> -->

	 			   <?

					$resh = mysql_query("SELECT * FROM `categories` Order By Id");

					$count = mysql_num_rows($resh);

	 



					 for($i=0;$i<$count;$i++)	{

					    $category_id = mysql_result($resh, $i, "id");

					    $category_n = mysql_result($resh, $i, "c_name_$lan");

						

						 if($category_id == $r_category){ echo"<option value='$category_id' selected='selected'>$category_n</option>";}

						  else echo"<option value='$category_id' >$category_n</option>";

					}

				   ?>



					</select></td></tr>

		 <tr><td style='height:40px;' valign='top'> Գլխավոր նկարը(360*280)</td><td style="padding-left:30px;" valign='top'>

		       <?if($r_pic_r) echo"<img src='../userfiles/".$r_pic_r."' width='140' /><br />";?>

		        <input type='file' name="page_pic"  style="width:140px;" value='<?=$r_title_r?>'/></td></tr>

		 <tr><td style='height:40px;' valign='top'> Վերնագիրը</td><td style="text-align:right;" valign='top'><input type='text' name="page_title"  style="width:580px;" value='<?=$r_title_r?>'/></td></tr>

		 <?if($id){?>

			<tr><td style='height:40px;' valign='top'> Ստեղծվել է</td><td style="text-align:right;" valign='top'><input type='text' name="page_date"  style="width:580px;" value='<?=$r_date_r?>'/></td></tr>

			<tr><td style='height:40px;' valign='top'> Համարը</td><td style="text-align:right;" valign='top'><input type='text' name="page_ord"  style="width:580px;" value='<?=$r_ord_r?>'/></td></tr>

		 <?}?>



		 <tr><td colspan='2' style='height:40px;' valign='bottom'> Կարճ ինֆորմացիա</td></tr>

		 <tr><td colspan='2'><textarea type='text' name="page_short" style="width:700px;"><?=$r_short_r?></textarea></td></tr>

		 

		 <tr><td colspan='2'> Հիմանական ինֆորմացիան</td></tr>

		 <tr><td colspan='2'>



        <textarea id="tempTextId" style="display:none;" rows="1" cols="3"><?=$r_text_r?></textarea>

	    <script type="text/javascript">

	     var sBasePath = "fckeditor/" ;

	     var oFCKeditor = new FCKeditor( 'page_content' ) ;

	     oFCKeditor.BasePath	= sBasePath ;

		 oFCKeditor.Height = 500 ;

		 oFCKeditor.Width = 700 ;

		 oFCKeditor.Value = document.getElementById('tempTextId').value;

		 oFCKeditor.Create() ;

        </script>



		</td></tr>



		<tr><td colspan='2' style='height:40px;' valign='bottom'> Բանալի բառեր(keywords), բաժանել միմյանցից ստորակետով</td></tr>

		<tr><td colspan='2'><input type='text' name="page_keywords" style="width:700px;" value='<?=$r_keywords_r?>'/></td></tr>



		<tr><td colspan='2' style='height:40px;' valign='bottom'> Վիդոի կոդը</td></tr>

		<tr><td colspan='2'><textarea type='text' name="page_video" style="width:700px;"><?=$r_video_r?></textarea></td></tr>



		<tr><td colspan='2' style='height:40px;' valign='bottom'> 

		  <span style='margin-right:30px;'><label><input type="checkbox" name='page_show' value='1' <?if($r_show_r==1) echo"checked='checked'";?> /> Հրապարակել նորությունը</label></span>

		  <span style='margin-right:30px;'><label><input type="checkbox" name='page_top' value='1' <?if($r_top_r==1) echo"checked='checked'";?> /> Թոփ</label></span>

		  <span style='margin-right:30px;'><label><input type="checkbox" name='page_top_plus' value='1' <?if($r_top_plus_r==1) echo"checked='checked'";?> /> Թոփ պլյուս նորությունը</label></span>

		  <span style='margin-right:30px;'><label><input type="checkbox" name='page_trans' value='1' <?if($r_trans_r==1) echo"checked='checked'";?> /> Թարգմանել</label></span>

		</td></tr>



		<tr><td colspan='2' style='text-align:center;'>

		 <input type='hidden' name='hid_act' value='update'/>

		 <input type='submit' style='outline:none;margin-top:20px;width:200px;' onclick='this.form.submit(); return false;' value='<?if(!$id) echo"Ավելացնել ինֆորմացիան"; else echo"Թարմացնել ինֆորմացիան"; ?>' alt="" title=""/>

		 </td></tr>

		

		</table>

		</form>

		<?





	}//edit news

  echo"</div>";

}	

	?>



	



	<!-- news end -->















	<!-- maruee start -->





	<?

	 if($act=="marquee"){

	  echo"<div style='width:700px;margin:auto;'>";



	  $note_right_text = "Ձախում բերված են վազող տողի ինֆորմացիաները, դուք կարող եք փոփոխել բոլոր 5 Վազող տողերը, երեք լեզուներով ինչպես նաև ավելացնել հղում նրանց համար:";



         if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		 if($lan=="hy") {

			 $note_right_text.="<br /><br />Համապատասխան ռուսերեն կամ անգլերեն լեզվով ինֆորմացիան տեսնելու և փոփոխելու համար, ընտրեք  լեզուն օգտվելով` &quot;Էջը ռուսերեն&quot; կամ &quot;Էջը անգլերեն&quot; հղումներից:";



		    echo"<p style='text-align:right;height:25px;'><a href='?act=marquee&lan=ru'><u>Էջը ռուսերենով</u></a></p>";

		    echo"<p style='text-align:right;height:25px;'><a href='?act=marquee&lan=en'><u>Էջը անգլերենով</u></a></p>";

		 }

		 elseif($lan=="ru"){

		    echo"<p style='text-align:right;height:25px;'><a href='?act=marquee'><u>Էջը հայերենով</u></a></p>";

		    echo"<p style='text-align:right;height:25px;'><a href='?act=marquee&lan=en'><u>Էջը անգլերենով</u></a></p>";		 

		 }

		 elseif($lan=="en"){

		    echo"<p style='text-align:right;height:25px;'><a href='?act=marquee'><u>Էջը հայերենով</u></a></p>";	 

		    echo"<p style='text-align:right;height:25px;'><a href='?act=marquee&lan=ru'><u>Էջը ռուսերենով</u></a></p>";	 

		 }



		 $resh = mysql_query("SELECT * FROM `vazox_tox` WHERE `id` = 1");

		 $i=0;



    	 $m_text_1 = mysql_result($resh, $i, "text_1_$lan");

    	 $m_link_1 = mysql_result($resh, $i, "link_1_$lan");

    	 $m_text_2 = mysql_result($resh, $i, "text_2_$lan");

    	 $m_link_2 = mysql_result($resh, $i, "link_2_$lan");



    	 $m_text_3 = mysql_result($resh, $i, "text_3_$lan");

    	 $m_link_3 = mysql_result($resh, $i, "link_3_$lan");

    	 $m_text_4 = mysql_result($resh, $i, "text_4_$lan");

    	 $m_link_4 = mysql_result($resh, $i, "link_4_$lan");



    	 $m_text_5 = mysql_result($resh, $i, "text_5_$lan");

    	 $m_link_5 = mysql_result($resh, $i, "link_5_$lan");



	  



		   echo"<h2 style='height:40px;font-size:18px;'>Փոփոխեք վազող տողի ինֆորմացիան</h2>";

		   echo"<table style='width:600px;' ><form action='#' method='post'>



			 <tr><td style='height:25px;text-align:right;' valign='top'>Վազող տեքստ 1 ($lan)</td><td width='20'></td><td><textarea name='m_text_1' style='width:400px;'>".$m_text_1."</textarea></td></tr>

			 <tr><td style='height:25px;text-align:right;'>Հղում 1</td><td width='20'></td><td><input type='text' name='m_link_1' value='".$m_link_1."' style='width:400px;'></td></tr>

			 <tr><td height='10'></td></tr>



			 <tr><td style='height:25px;text-align:right;' valign='top'>Վազող տեքստ 2 ($lan)</td><td width='20'></td><td><textarea name='m_text_2' style='width:400px;'>".$m_text_2."</textarea></td></tr>

			 <tr><td style='height:25px;text-align:right;'>Հղում 2</td><td width='20'></td><td><input type='text' name='m_link_2' value='".$m_link_2."' style='width:400px;'></td></tr>

			 <tr><td height='10'></td></tr>



			 <tr><td style='height:25px;text-align:right;' valign='top'>Վազող տեքստ 3 ($lan)</td><td width='20'></td><td><textarea name='m_text_3' style='width:400px;'>".$m_text_3."</textarea></td></tr>

			 <tr><td style='height:25px;text-align:right;'>Հղում 3</td><td width='20'></td><td><input type='text' name='m_link_3' value='".$m_link_3."' style='width:400px;'></td></tr>

			 <tr><td height='10'></td></tr>



			 <tr><td style='height:25px;text-align:right;' valign='top'>Վազող տեքստ 4 ($lan)</td><td width='20'></td><td><textarea name='m_text_4' style='width:400px;'>".$m_text_4."</textarea></td></tr>

			 <tr><td style='height:25px;text-align:right;'>Հղում 4</td><td width='20'></td><td><input type='text' name='m_link_4' value='".$m_link_4."' style='width:400px;'></td></tr>

			 <tr><td height='10'></td></tr>



			 <tr><td style='height:25px;text-align:right;' valign='top'>Վազող տեքստ 5 ($lan)</td><td width='20'></td><td><textarea name='m_text_5' style='width:400px;'>".$m_text_5."</textarea></td></tr>

			 <tr><td style='height:25px;text-align:right;'>Հղում 5</td><td width='20'></td><td><input type='text' name='m_link_5' value='".$m_link_5."' style='width:400px;'></td></tr>

			 <tr><td height='30' colspan='3'><hr /></td></tr>



			 <tr><td colspan='2' style='text-align:center;'></td><td>

			 <input type='hidden' name='hid_act' value='update'/>

			 <input type='submit' style='outline:none;margin-top:20px;width:200px;' onclick='this.form.submit(); return false;' value='Թարմացնել ինֆորմացիան' alt='' title=''/>

			 </td></tr>

			 </form>

			 </table>";

		 echo"</div>";

	  }

	 

	 ?>

	<!-- maruee end -->























	<!-- banners start -->





	<?

	 if($act=="banners"){

	  echo"<div style='width:700px;margin:auto;'>";



	  $note_right_text = "Ձախում բերված են կայքի բաններները, դուք կարող եք փոփոխել բոլոր գովազդային բաններները, ինչպես նաև ավելացնել նորը:";



         if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		 if($_GET['id_d']) {

		 mysql_query("DELETE FROM `banners` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



		 if($id){

		 $resh = mysql_query("SELECT * FROM `banners` WHERE `id` = $id");

		 $i=0;



    	 $b_type_b = mysql_result($resh, $i, "b_type");

    	 $b_pic_b = mysql_result($resh, $i, "b_pic");

    	 $b_link_b = mysql_result($resh, $i, "b_link");

		 }

		 else{$b_type_b=0;$b_pic_b=0;}



		 echo"<h2 style='height:40px;font-size:18px;'>Բանների ինֆորմացիոն դաշտերը</h2>";



		 if($id) echo"<p style='text-align:right;'><a href='?act=$act&id_d=$id'>Ջնջել բանները</a></p>";

		   echo"<table style='width:450px;' ><form action='#' method='post' enctype='multipart/form-data'>

		   <tr><td style='height:25px;text-align:right;'>Ընտրեք տեսակը</td><td width='20'></td><td>";

		   ?>

		   <select name="b_type_n" style='width:300px;'>

							<option value="0"></option>

							<option value="1" <?if($b_type_b==1) echo"selected='selected'"?>> - Top (587 x 103)- </option>

							<option value="2" <?if($b_type_b==2) echo"selected='selected'"?>> - Middle first (684) -</option>

							<option value="3" <?if($b_type_b==3) echo"selected='selected'"?>> - Middle Second (684) - </option>

							<option value="4" <?if($b_type_b==4) echo"selected='selected'"?>> - Left menu small (276) - </option>

							<option value="5" <?if($b_type_b==5) echo"selected='selected'"?>> - Bottom smalls (276) - </option>

			</select>

		   <?

		   echo"</td></tr>



		   <tr><td style='height:25px;text-align:right;'>Նկարը</td><td width='20'></td><td>";

		   if($b_pic_b) {echo"<img src='../userfiles/$b_pic_b' alt='' style='max-width:300px;'/><br />"; $up_t = "Թարմացնել";}else $up_t="Ավելացնել";

		   echo"<input type='file' name='b_pic_n' style='width:300px;' /></td></tr>



		   <tr><td style='height:25px;text-align:right;'>Հղումը</td><td width='20'></td><td>";

		   echo"<input type='text' name='b_link_n' style='width:300px;' value='".$b_link_b."' /></td></tr>



		   <tr><td colspan='3'><hr /></td></tr>

		   <tr><td colspan='2' style='text-align:center;'></td><td>

			 <input type='hidden' name='hid_act' value='update'/>

			 <input type='submit' style='outline:none;margin-top:20px;width:200px;' onclick='this.form.submit(); return false;' value='$up_t ինֆորմացիան' alt='' title=''/>

			 </td></tr>





		   </form></table>";



		 

		 $resh = mysql_query("SELECT * FROM `banners` ORDER BY `id`");



		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Սեղմեք բանների վրա փոփոխելու համար</h2>";

		 echo"<table style='width:600px;' >";

		   			 

		 $count = @mysql_num_rows($resh);



		 for($i=0;$i<$count;$i++)	{ 



    	 $b_id = mysql_result($resh, $i, "id");

    	 $b_type = mysql_result($resh, $i, "b_type");

    	 $b_pic = mysql_result($resh, $i, "b_pic");

	  



		   echo"<tr><td><a href='?act=$act&id=$b_id'><img src='../userfiles/".$b_pic."' style='max-width:500px; border:0px;' /></a></td></tr>

			 <tr><td height='10'></td></tr>";

		 }

			 echo"</table>"; 

			 

			 echo"</div>";



	  }

	 

	 ?>

	<!-- banners end -->









	<!-- videos start -->



	 <?

	  if($act=='videos'){

	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Ընտրեք որտեղ եք ուզում ավելացնել վիդեո ֆայլ:</h2>";



		 echo"

		 <a href='?act=iwach_videos' style='padding-right:12px;padding-left:12px;'>Ես դիտում եմ</a> |  

		 <a href='?act=eem_videos' style='padding-right:12px;padding-left:12px;'>Երկիրը Երկրի մասին</a> |  

		 <a href='?act=serv_videos' style='padding-right:12px;padding-left:12px;'>Ծառայության էջում</a> |  

		 <a href='?act=e_harc' style='padding-right:12px;padding-left:12px;'>Երկրի հարցը</a> |  

		 <a href='?act=f_videos' style='padding-right:12px;padding-left:12px;'>Ֆիլմեր</a> | 

		 <a href='?act=ht_videos' style='padding-right:12px;padding-left:12px;'>Հատուկ Թղթակից</a>";



	   echo"</div>";

	  }



	 ?>



	<!-- videos end -->









	<!-- serv videos start -->



	 <?

	  if($act=='serv_videos'){

		  if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		  if($_GET['id_d']) {

		 mysql_query("DELETE FROM `serv_videos` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Օգտվեք ներքևի դաշտից Ծառայության էջում վիդո ավելացնելու համար:</h2>";



		 echo"<table width='600'><form action='#' method='post'>

				<tr><td height='25'> Youtube Embad code (200px): </td><td width='10'></td><td><textarea name='v_url' style='width:400px;'></textarea></td></tr>

				

				<tr><td height='25'></td><td width='10'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' value='Ավելացնել վիդեոն' /></td></tr>

			   </form>

			  </table>

		 ";





		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Մինչ այս ավելացված վիդեոները:</h2>";



		 $resh = mysql_query("SELECT * FROM `serv_videos` ORDER BY `id` desc");



			 echo"<table style='width:600px;' >";

						 

			 $count = @mysql_num_rows($resh);



			 for($i=0;$i<$count;$i++)	{ 



			 $v_id = mysql_result($resh, $i, "id");

			 $v_url = mysql_result($resh, $i, "v_url");

			 echo"<tr><td height='22px;' width='30' style='text-align:center;'><a href='?act=serv_videos&id_d=$v_id'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել վիդեոն'/></a></td><td>$v_url</td></tr>";

			 

			 }



			 echo"</table>";









	   echo"</div>";

	  }



	 ?>



	<!-- serv videos end -->











	<!--  iwach_videos start -->



	 <?

	  if($act=='iwach_videos'){

		  if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		  if($_GET['id_d']) {

		 mysql_query("DELETE FROM `iwach_videos` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Օգտվեք ներքևի դաշտից Ես դիտում եմ վիդո ավելացնելու համար:</h2>";



		 echo"<table width='600'><form action='#' method='post'>

				<tr><td height='25'> Youtube Embad code (200px): </td><td width='10'></td><td><textarea name='v_url' style='width:400px;'></textarea></td></tr>

				

				<tr><td height='25'></td><td width='10'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' value='Ավելացնել վիդեոն' /></td></tr>

			   </form>

			  </table>

		 ";





		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Մինչ այս ավելացված վիդեոները:</h2>";



		 $resh = mysql_query("SELECT * FROM `iwach_videos` ORDER BY `id` desc");



			 echo"<table style='width:600px;' >";

						 

			 $count = @mysql_num_rows($resh);



			 for($i=0;$i<$count;$i++)	{ 



			 $v_id = mysql_result($resh, $i, "id");

			 $v_url = mysql_result($resh, $i, "v_url");

			 echo"<tr><td height='22px;' width='30' style='text-align:center;'><a href='?act=iwach_videos&id_d=$v_id'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել վիդեոն'/></a></td><td>$v_url</td></tr>";

			 

			 }



			 echo"</table>";









	   echo"</div>";

	  }



	 ?>



	<!--  iwach_videos end -->











	<!--  eem_videos start -->



	 <?

	  if($act=='eem_videos'){

		  if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		  if($_GET['id_d']) {

		 mysql_query("DELETE FROM `eem_videos` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Օգտվեք ներքևի դաշտից երկիրը երկրի մասին վիդո ավելացնելու համար:</h2>";



		 echo"<table width='600'><form action='#' method='post'>

				<tr><td height='25'> Youtube Embad code (200px): </td><td width='10'></td><td><textarea name='v_url' style='width:400px;'></textarea></td></tr>

				

				<tr><td height='25'></td><td width='10'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' value='Ավելացնել վիդեոն' /></td></tr>

			   </form>

			  </table>

		 ";





		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Մինչ այս ավելացված վիդեոները:</h2>";



		 $resh = mysql_query("SELECT * FROM `eem_videos` ORDER BY `id` desc");



			 echo"<table style='width:600px;' >";

						 

			 $count = @mysql_num_rows($resh);



			 for($i=0;$i<$count;$i++)	{ 



			 $v_id = mysql_result($resh, $i, "id");

			 $v_url = mysql_result($resh, $i, "v_url");

			 echo"<tr><td height='22px;' width='30' style='text-align:center;'><a href='?act=eem_videos&id_d=$v_id'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել վիդեոն'/></a></td><td>$v_url</td></tr>";

			 

			 }



			 echo"</table>";









	   echo"</div>";

	  }



	 ?>



	<!--  iwach_videos end -->













		<!-- e_harc videos start -->



	 <?

	  if($act=='e_harc'){

		  if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		  if($_GET['id_d']) {

		 mysql_query("DELETE FROM `e_harc_videos` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



		 $ttt = 'Ավելացնել';



		 if($id){

			 $resh = mysql_query("SELECT * FROM `e_harc_videos` WHERE `id` = '".$id."'ORDER BY `id` desc");

			 $v_id = mysql_result($resh, 0, "id");

			 $v_eter = mysql_result($resh, 0, "v_eter");

			 $v_url = mysql_result($resh, 0, "v_url");

			 $v_name = mysql_result($resh, 0, "v_name");

			 $v_desc = mysql_result($resh, 0, "v_desc");

			 $ttt = 'Թարմացնել';

		 

		 }



	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Օգտվեք ներքևի դաշտից Երկրի հարցը էջում վիդո ավելացնելու համար:</h2>";



		 echo"<table width='600'><form action='#' method='post'>

				

				<tr><td height='25' style='text-align:right;'> Եթերում </td><td width='10'></td><td><input type='text' name='v_eter' style='width:300px;' value='".$v_eter."'/></td></tr>

				<tr><td height='25' style='text-align:right;'> Անունը </td><td width='10'></td><td><input type='text' name='v_name' style='width:300px;' value='".$v_name."'/></td></tr>

				<tr><td height='30' style='text-align:right;'> Երկար անուն (վազող) </td><td width='10'></td><td><input type='text' name='v_desc' style='width:450px;' value='".$v_desc."'/></td></tr>



				<tr><td height='50' style='text-align:right;' valign='top'> Youtube Embed Code(276x...): </td><td width='10'></td><td><textarea name='v_url' style='width:450px;' >".$v_url."</textarea></td></tr>

				

				<tr><td colspan='3' height:20px;><hr /></td></tr>

				<tr><td height='25'></td><td width='10'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' value='$ttt վիդեոն' /></td></tr>

			   </form>

			  </table>

		 ";





		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Մինչ այս ավելացված վիդեոները:</h2>";



		 $resh = mysql_query("SELECT * FROM `e_harc_videos` ORDER BY `id` desc");



			 echo"<table style='width:600px;' >";

						 

			 $count = @mysql_num_rows($resh);



			 for($i=0;$i<$count;$i++)	{ 



			 $v_id = mysql_result($resh, $i, "id");

			 $v_url = mysql_result($resh, $i, "v_url");

			 $v_name = mysql_result($resh, $i, "v_name");

			 echo"<tr><td height='22px;' width='30' style='text-align:center;'><a href='?act=e_harc&id_d=$v_id'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել վիդեոն'/></a></td><td><a href='?act=$act&id=$v_id'>$v_name</td><td width='10'></td><td></td></tr>";



			  echo"<tr><td colspan='4' height='10'><hr /></td></tr>";

			 

			 }



			 echo"</table>";









	   echo"</div>";

	  }



	 ?>



	<!-- e_harc videos end -->















	<!-- ht_videos start -->



	 <?

	  if($act=='ht_videos'){

		  if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		  if($_GET['id_d']) {

		 mysql_query("DELETE FROM `ht_videos` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



		 $ttt = 'Ավելացնել';



		 if($id){

			 $resh = mysql_query("SELECT * FROM `ht_videos` WHERE `id` = '".$id."'ORDER BY `id` desc");

			 $v_id = mysql_result($resh, 0, "id");

			 $v_eter = mysql_result($resh, 0, "v_eter");

			 $v_url = mysql_result($resh, 0, "v_url");

			 $v_name = mysql_result($resh, 0, "v_name");

			 $v_desc = mysql_result($resh, 0, "v_desc");

			 $b_id = mysql_result($resh, 0, "b_id");

			 $ttt = 'Թարմացնել';

		 

		 }



	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Օգտվեք ներքևի դաշտից Հատուկ Թղթակից էջում վիդո ավելացնելու համար:</h2>";



		 echo"<table width='600'><form action='#' method='post'>

				

				<tr><td height='25' style='text-align:right;'> Բաժինը </td><td width='10'></td><td>";

				?>

				   <select name="ht_category"  style="width:140px;"/>

				   <!-- <option selected="selected" value=""> - ընտրեք բաժինը -</option> -->

	 			   <?

					$resh = mysql_query("SELECT * FROM `hatuk_txtakic` Order By Id");

					$count = mysql_num_rows($resh);

	 



					 for($i=0;$i<$count;$i++)	{

					    $category_id = mysql_result($resh, $i, "id");

					    $category_n = mysql_result($resh, $i, "h_name_hy");

						

						 if($category_id == $b_id){ echo"<option value='$category_id' selected='selected'>$category_n</option>";}

						  else echo"<option value='$category_id' >$category_n</option>";

					}

				   ?>

					</select>

				<?

		 echo"</td></tr>

				<tr><td height='25' style='text-align:right;'> Եթերում </td><td width='10'></td><td><input type='text' name='v_eter' style='width:300px;' value='".$v_eter."'/></td></tr>

				<tr><td height='25' style='text-align:right;'> Անունը </td><td width='10'></td><td><input type='text' name='v_name' style='width:300px;' value='".$v_name."'/></td></tr>

				<tr><td height='30' style='text-align:right;'> Երկար անուն (վազող) </td><td width='10'></td><td><input type='text' name='v_desc' style='width:450px;' value='".$v_desc."'/></td></tr>



				<tr><td height='50' style='text-align:right;' valign='top'> Youtube Embed Code(276x...): </td><td width='10'></td><td><textarea name='v_url' style='width:450px;' >".$v_url."</textarea></td></tr>

				

				<tr><td colspan='3' height:20px;><hr /></td></tr>

				<tr><td height='25'></td><td width='10'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' value='$ttt վիդեոն' /></td></tr>

			   </form>

			  </table>

		 ";





		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Մինչ այս ավելացված վիդեոները:</h2>";



		 $resh = mysql_query("SELECT * FROM `ht_videos` ORDER BY `id` desc");



			 echo"<table style='width:600px;' >";

						 

			 $count = @mysql_num_rows($resh);



			 for($i=0;$i<$count;$i++)	{ 



			 $v_id = mysql_result($resh, $i, "id");

			 $v_url = mysql_result($resh, $i, "v_url");

			 $v_name = mysql_result($resh, $i, "v_name");

			 echo"<tr><td height='22px;' width='30' style='text-align:center;'><a href='?act=$act&id_d=$v_id'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել վիդեոն'/></a></td><td><a href='?act=$act&id=$v_id'>$v_name</td><td width='10'></td><td></td></tr>";



			  echo"<tr><td colspan='4' height='10'><hr /></td></tr>";

			 

			 }



			 echo"</table>";









	   echo"</div>";

	  }



	 ?>



	<!-- ht_videos end -->















<!-- f_videos start -->



	 <?

	  if($act=='f_videos'){

		  if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		  if($_GET['id_d']) {

		 mysql_query("DELETE FROM `f_videos` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



		 $ttt = 'Ավելացնել';



		 if($id){

			 $resh = mysql_query("SELECT * FROM `f_videos` WHERE `id` = '".$id."'ORDER BY `id` desc");

			 $v_id = mysql_result($resh, 0, "id");

			 $v_eter = mysql_result($resh, 0, "v_eter");

			 $v_url = mysql_result($resh, 0, "v_url");

			 $v_name = mysql_result($resh, 0, "v_name");

			 $v_desc = mysql_result($resh, 0, "v_desc");

			 $b_id = mysql_result($resh, 0, "b_id");

			 $ttt = 'Թարմացնել';

		 

		 }



	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Օգտվեք ներքևի դաշտից Ֆիլմ ավելացնելու համար:</h2>";



		 echo"<table width='600'><form action='#' method='post'>

				

				<tr><td height='25' style='text-align:right;'> Բաժինը </td><td width='10'></td><td>";

				?>

				   <select name="ht_category"  style="width:140px;"/>

				   <!-- <option selected="selected" value=""> - ընտրեք բաժինը -</option> -->

	 			   <?

					$resh = mysql_query("SELECT * FROM `filmer` Order By id");

					$count = mysql_num_rows($resh);

	 



					 for($i=0;$i<$count;$i++)	{

					    $category_id = mysql_result($resh, $i, "id");

					    $category_n = mysql_result($resh, $i, "f_name_hy");

						

						 if($category_id == $b_id){ echo"<option value='$category_id' selected='selected'>$category_n</option>";}

						  else echo"<option value='$category_id' >$category_n</option>";

					}

				   ?>

					</select>

				<?

		 echo"</td></tr>

				<tr><td height='25' style='text-align:right;'> Եթերում </td><td width='10'></td><td><input type='text' name='v_eter' style='width:300px;' value='".$v_eter."'/></td></tr>

				<tr><td height='25' style='text-align:right;'> Անունը </td><td width='10'></td><td><input type='text' name='v_name' style='width:300px;' value='".$v_name."'/></td></tr>

				<tr><td height='30' style='text-align:right;'> Նկարագրությունը </td><td width='10'></td><td><input type='text' name='v_desc' style='width:450px;' value='".$v_desc."'/></td></tr>



				<tr><td height='50' style='text-align:right;' valign='top'> Youtube Embed Code(276x...): </td><td width='10'></td><td><textarea name='v_url' style='width:450px;' >".$v_url."</textarea></td></tr>

				

				<tr><td colspan='3' height:20px;><hr /></td></tr>

				<tr><td height='25'></td><td width='10'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' value='$ttt վիդեոն' /></td></tr>

			   </form>

			  </table>

		 ";





		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Մինչ այս ավելացված վիդեոները:</h2>";



		 $resh = mysql_query("SELECT * FROM `f_videos` ORDER BY `id` desc");



			 echo"<table style='width:600px;' >";

						 

			 $count = @mysql_num_rows($resh);



			 for($i=0;$i<$count;$i++)	{ 



			 $v_id = mysql_result($resh, $i, "id");

			 $v_url = mysql_result($resh, $i, "v_url");

			 $v_name = mysql_result($resh, $i, "v_name");

			 if(!$v_name) $v_name = "անհայտ";

			 echo"<tr><td height='22px;' width='30' style='text-align:center;'><a href='?act=$act&id_d=$v_id'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել վիդեոն'/></a></td><td><a href='?act=$act&id=$v_id'>$v_name</td><td width='10'></td><td></td></tr>";



			  echo"<tr><td colspan='4' height='10'><hr /></td></tr>";

			 

			 }



			 echo"</table>";









	   echo"</div>";

	  }



	 ?>



	<!-- f_videos end -->





	<!-- reports_videos start -->

	<? if($act=="reports_videos"){

	$h_id = $_GET['ip'];



	if(isset($_GET['u']) && $_GET['u']) $note_right_text = "<b>Կատարվեց ինֆորմացիայի թարմացում:<br />".date("G:i:s")."</b><br /><br />";



		  if($_GET['id_d']) {

		 mysql_query("DELETE FROM `haxordumner_videos` WHERE `id`='".intval($_GET['id_d'])."' ");

		 }



		 $ttt = 'Ավելացնել';



		 if($id){

			 $resh = mysql_query("SELECT * FROM `haxordumner_videos` WHERE `id` = '".$id."'ORDER BY `id` desc");

			 $v_id = mysql_result($resh, 0, "id");

			 $v_eter = mysql_result($resh, 0, "v_eter");

			 $v_url = mysql_result($resh, 0, "v_url");

			 $v_name = mysql_result($resh, 0, "v_name");

			 $v_desc = mysql_result($resh, 0, "v_desc");

			 $h_id = mysql_result($resh, 0, "h_id");

			 $ttt = 'Թարմացնել';

		 

		 }



	   echo"<div style='width:700px;margin:auto;'>";



		 echo"<h2 style='height:40px;font-size:18px;'>Օգտվեք ներքևի դաշտից Հաղորդման հերթական վիդեոն ավելացնելու համար:</h2>";



		 echo"<table width='600'><form action='#' method='post'>

				

				<tr><td height='25' style='text-align:right;'> Հաղորդումը </td><td width='10'></td><td>";

				?>

				   <select name="ht_category"  style="width:140px;"/>

				   <!-- <option selected="selected" value=""> - ընտրեք բաժինը -</option> -->

	 			   <?

					$resh = mysql_query("SELECT * FROM `haxordumner` Order By id");

					$count = mysql_num_rows($resh);

	 



					 for($i=0;$i<$count;$i++)	{

					    $category_id = mysql_result($resh, $i, "id");

					    $category_n = mysql_result($resh, $i, "h_name_hy");

						

						 if($category_id == $h_id){ echo"<option value='$category_id' selected='selected'>$category_n</option>";}

						  else echo"<option value='$category_id' >$category_n</option>";

					}

				   ?>

					</select>

				<?

		 echo"</td></tr>

				<tr><td height='25' style='text-align:right;'> Եթերում </td><td width='10'></td><td><input type='text' name='v_eter' style='width:300px;' value='".$v_eter."'/></td></tr>

				<tr><td height='25' style='text-align:right;'> Անունը </td><td width='10'></td><td><input type='text' name='v_name' style='width:300px;' value='".$v_name."'/></td></tr>

				<tr><td height='30' style='text-align:right;'> Նկարագրությունը </td><td width='10'></td><td><input type='text' name='v_desc' style='width:450px;' value='".$v_desc."'/></td></tr>



				<tr><td height='50' style='text-align:right;' valign='top'> Youtube Embed Code(276x...): </td><td width='10'></td><td><textarea name='v_url' style='width:450px;' >".$v_url."</textarea></td></tr>

				

				<tr><td colspan='3' height:20px;><hr /></td></tr>

				<tr><td height='25'></td><td width='10'></td><td><input type='hidden' name='hid_act' value='update'><input type='submit' value='$ttt վիդեոն' /></td></tr>

			   </form>

			  </table>

		 ";





		 echo"<br /><br /><br /><h2 style='height:40px;font-size:18px;'>Մինչ այս ավելացված վիդեոները:</h2>";



		 $resh = mysql_query("SELECT * FROM `haxordumner_videos` ORDER BY `id` desc");



			 echo"<table style='width:600px;' >";

						 

			 $count = @mysql_num_rows($resh);



			 for($i=($p-1)*10;$i<$count && $i<(10*$p);$i++)	{ 



			 $v_id = mysql_result($resh, $i, "id");

			 $v_url = mysql_result($resh, $i, "v_url");

			 $v_name = mysql_result($resh, $i, "v_name");

			 if(!$v_name) $v_name = "անհայտ";

			 echo"<tr><td height='22px;' width='30' style='text-align:center;'><a href='?act=$act&ip=$ip&id_d=$v_id'><img src='../s/i/b_drop.png' alt='' style='border:0px;' title='Ջնջել վիդեոն'/></a></td><td><a href='?act=$act&ip=$ip&id=$v_id'>$v_name</td><td width='10'></td><td></td></tr>";



			  echo"<tr><td colspan='4' height='10'><hr /></td></tr>";

			 

			 }



			 echo"</table>";



			 //new paging

			 $count_h = $count;

				if($count_h%10 == 0 && $count_h) $p_all = intval($count_h/10); else $p_all = intval($count_h/10) + 1;

					if(!$p) $p=1; 



				echo"<br /><p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; ";



				echo" <a href='?act=$act&lan=$lan&p=1'>1</a> ";



				$i=2;

				if($p_all<=10){

					while($p_all>=$i){

						if($p==$i) $st = "style='text-decoration:underline;'"; else $st = '';

					echo" <a href='?act=$act&lan=$lan&p=$i' $st>$i</a> ";

					$i++;

					}

				}

				elseif($p_all>10){

					if($p>7) {echo"...";$i=$p-5;

						while(($p_all>=($i+1)) && ($i<($p+5))) {

						echo" <a href='?act=$act&lan=$lan&p=$i'>$i</a> ";

						$i++;

						}	

						if($p_all>$i+1) echo " ... ";

					}

					elseif($p<=7){

						$i=2;

						while($p_all>=$i && $i<12){

						echo" <a href='?act=$act&lan=$lan&p=$i'>$i</a> ";

						$i++;

						}

						if($p_all>12) echo " ... ";

					}



					echo" <a href='?act=$act&lan=$lan&p=$p_all'>$p_all</a> ";

				}



				echo"</p>";

			 // end new paging









	   echo"</div>";

	}	

	?>

	<!-- reports_videos end -->





	

	</div>



	<div style="float:left;width:178px;">

	

	 <div style="width:150px;margin:auto;"><?=$note_right_text?></div>

	

	</div>



</div>

<!--BODY END-->



<!--FOOTER START-->

<div id="footer">

	<div class="left">

		<p><i>&copy;</i> 2011 Yerkir Media TV Company</p>

		<p>Republic of Armenia, Yerevan, N 94 Charents</p>

		<p>Phone. + 374 10 576512, Fax + 374 10 576540, <a href="#">Contact Us</a></p>

	</div>

	<div class="right">

		<p>News department:</p>

		<p>Phone. + 374 10 576498, <a href="#">Contact Us</a></p>

	</div>

</div>

<!--FOOTER END-->



</body>

</html>