<?PHP

if($_SESSION['yerkir_enter']!="yerkir_enter") exit;

$timeDif = 9;

if($act=="pages"){

	$b_page_content = mysql_real_escape_string($_POST['page_content']);


mysql_query("UPDATE `records` SET `r_title_".$lan."`='".$_POST['page_title']."', `r_text_".$lan."`='".$b_page_content."', `r_keywords_".$lan."` = '".$_POST['page_keywords']."' WHERE `r_category` = '0' AND `id` = '".$id."' ");

header("Location: header.php?act=$act&lan=$lan&id=$id");
}

elseif($act=="marquee"){
	
	mysql_query("UPDATE `vazox_tox` SET `text_1_".$lan."` = '".$_POST['m_text_1']."', `link_1_".$lan."` = '".$_POST['m_link_1']."', `text_2_".$lan."` = '".$_POST['m_text_2']."',  `link_2_".$lan."` = '".$_POST['m_link_2']."', `text_3_".$lan."` = '".$_POST['m_text_3']."', `link_3_".$lan."` = '".$_POST['m_link_3']."', `text_4_".$lan."` = '".$_POST['m_text_4']."',  `link_4_".$lan."` = '".$_POST['m_link_4']."', `text_5_".$lan."` = '".$_POST['m_text_5']."', `link_5_".$lan."` = '".$_POST['m_link_5']."' WHERE `id` = '1' ");

header("Location: header.php?act=$act&lan=$lan");

}

elseif($act=="e_harc"){
	if(!$id){
		 mysql_query("INSERT INTO `e_harc_videos` (v_eter, v_name, v_desc, v_url) VALUES ('".$_POST['v_eter']."', '".$_POST['v_name']."', '".$_POST['v_desc']."', '".$_POST['v_url']."')"); 
	}
	else mysql_query("UPDATE `e_harc_videos` SET `v_eter` = '".$_POST['v_eter']."', `v_name` = '".$_POST['v_name']."', `v_desc` = '".$_POST['v_desc']."',  `v_url` = '".$_POST['v_url']."' WHERE `id` = '".$id."' ");

		 header("Location: header.php?act=$act&lan=$lan");
}



elseif($act=="ht_videos"){
	if(!$id){
		 mysql_query("INSERT INTO `ht_videos` (b_id, v_eter, v_name, v_desc, v_url) VALUES ('".$_POST['ht_category']."', '".$_POST['v_eter']."', '".$_POST['v_name']."', '".$_POST['v_desc']."', '".$_POST['v_url']."')"); 
	}
	else mysql_query("UPDATE `ht_videos` SET `b_id` = '".$_POST['ht_category']."', `v_eter` = '".$_POST['v_eter']."', `v_name` = '".$_POST['v_name']."', `v_desc` = '".$_POST['v_desc']."',  `v_url` = '".$_POST['v_url']."' WHERE `id` = '".$id."' ");

		 header("Location: header.php?act=$act&lan=$lan");
}



elseif($act=="f_videos"){
	if(!$id){
		 mysql_query("INSERT INTO `f_videos` (b_id, v_eter, v_name, v_desc, v_url) VALUES ('".$_POST['ht_category']."', '".$_POST['v_eter']."', '".$_POST['v_name']."', '".$_POST['v_desc']."', '".$_POST['v_url']."')"); 
	}
	else mysql_query("UPDATE `f_videos` SET `b_id` = '".$_POST['ht_category']."', `v_eter` = '".$_POST['v_eter']."', `v_name` = '".$_POST['v_name']."', `v_desc` = '".$_POST['v_desc']."',  `v_url` = '".$_POST['v_url']."' WHERE `id` = '".$id."' ");

		 header("Location: header.php?act=$act&lan=$lan");
}

elseif($act=="reports_videos"){
	if(!$id){
		 mysql_query("INSERT INTO `haxordumner_videos` (h_id, v_eter, v_name, v_desc, v_url) VALUES ('".$_POST['ht_category']."', '".$_POST['v_eter']."', '".$_POST['v_name']."', '".$_POST['v_desc']."', '".$_POST['v_url']."')"); 
	}
	else mysql_query("UPDATE `haxordumner_videos` SET `h_id` = '".$_POST['ht_category']."', `v_eter` = '".$_POST['v_eter']."', `v_name` = '".$_POST['v_name']."', `v_desc` = '".$_POST['v_desc']."',  `v_url` = '".$_POST['v_url']."' WHERE `id` = '".$id."' ");

		 header("Location: header.php?act=$act&lan=$lan");
}



elseif($act=="serv_videos"){
		 mysql_query("INSERT INTO `serv_videos` (v_url) VALUES ('".$_POST['v_url']."')"); 
		 header("Location: header.php?act=$act&lan=$lan");
}
elseif($act=="eem_videos"){
		 mysql_query("INSERT INTO `eem_videos` (v_url) VALUES ('".$_POST['v_url']."')"); 
		 header("Location: header.php?act=$act&lan=$lan");
}
elseif($act=="iwach_videos"){
		 mysql_query("INSERT INTO `iwach_videos` (v_url) VALUES ('".$_POST['v_url']."')"); 
		 header("Location: header.php?act=$act&lan=$lan");
}

elseif($act=="polls"){
	if(!$id){
		 mysql_query("INSERT INTO `ym_poll_q` (poll_q) VALUES ('".$_POST['harc_hy']."')"); 
		 header("Location: header.php?act=$act&lan=$lan");}
	else{
		mysql_query("UPDATE `ym_poll_q` SET `poll_q` = '".$_POST['harc_hy']."' WHERE `id` = '".$id."' ");

		 for($i=0;$i<10;$i++){
		  if($_POST["poll_a_id_$i"]){
			  mysql_query("UPDATE `ym_poll_a` SET `poll_a` = '".$_POST["poll_a_$i"]."' WHERE `id` = '".$_POST["poll_a_id_$i"]."' ");		  
		  }
		  elseif($_POST["poll_a_$i"]){
			  mysql_query("INSERT INTO `ym_poll_a` (q_id, poll_a) VALUES ('".$id."', '".$_POST["poll_a_$i"]."')");
		  }
		 }
		 header("Location: header.php?act=$act&lan=$lan");	
	}
}

elseif($act=="banners"){

 if($HTTP_POST_FILES["b_pic_n"]['tmp_name'])
{
  $userfile = $HTTP_POST_FILES["b_pic_n"]['tmp_name'];
  $userfile_name = $HTTP_POST_FILES["b_pic_n"]['name'];
  $userfile_size = $HTTP_POST_FILES["b_pic_n"]['size'];
  $userfile_type = $HTTP_POST_FILES["b_pic_n"]['type'];
  $userfile_error = $HTTP_POST_FILES["b_pic_n"]['error'];
  
if ($userfile_error > 0)
  {
    echo 'Problem: ';
    switch ($userfile_error)
    {
      case 1:  echo 'File exceeded upload_max_filesize';  break;
      case 2:  echo 'File exceeded max_file_size';  break;
      case 3:  echo 'File only partially uploaded';  break;
      case 4:  echo 'No file uploaded';  break;
    }
    exit;
  }
  $as=$userfile_name;
  $as = explode('.', $as);
  $c= count($as);
  $xx=mt_rand(10,10100);
  $xx= date("d.m.y")."-".$xx;

  $allow_array = array("jpg","jpeg","gif","png");
  if(!in_array(strtolower($as[$c-1]), $allow_array)) exit;

  $as[$c-1]=$xx.$as[$c-2].".".$as[$c-1];
  $upfile = '../userfiles/'.$as[$c-1];
  
   if (is_uploaded_file($userfile)) 
  {
     if (!move_uploaded_file($userfile, $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
    exit;
  }

$userfile=$as[$c-1];

}//u_pic

 if(!$id && $userfile){
	 mysql_query("INSERT INTO `banners` (b_type, b_pic, b_link) VALUES ('".$_POST['b_type_n']."', '".$userfile."', '".$_POST['b_link_n']."')"); 
	 header("Location: header.php?act=$act");
 }
 elseif($id){
	 mysql_query("UPDATE `banners` SET `b_type`='".$_POST['b_type_n']."', `b_link` = '".$_POST['b_link_n']."' WHERE `id` = '".$id."' ");
	 if($userfile) mysql_query("UPDATE `banners` SET `b_pic`='".$userfile."' WHERE `id` = '".$id."' ");
	 header("Location: header.php?act=$act");
 }
}




elseif($act=="categories"){
if(!$id){
 mysql_query("INSERT INTO `categories` (c_name_hy, c_name_ru, c_name_en) VALUES ('".$_POST['name_hy']."', '".$_POST['name_ru']."', '".$_POST['name_en']."')");

header("Location: header.php?act=$act");
}
else{
mysql_query("UPDATE `categories` SET `c_name_hy`='".$_POST['name_hy']."', `c_name_ru`='".$_POST['name_ru']."', `c_name_en` = '".$_POST['name_en']."' WHERE `id` = '".$id."' ");
header("Location: header.php?act=$act&id=$id");
}

}




elseif($act=="ether"){
	//$b_page_content = mysql_real_escape_string($_POST['page_content']);

	if(!$id){

		include('class.php');
		function xl2timestamp($xl_date){
			$timestamp = ($xl_date - 25569) * 86400;
			return $timestamp;
		}

		if($HTTP_POST_FILES["ether_sovorakan"]['tmp_name'])
		{
		  $userfile = $HTTP_POST_FILES["ether_sovorakan"]['tmp_name'];
		  $userfile_name = $HTTP_POST_FILES["ether_sovorakan"]['name'];
		  $userfile_size = $HTTP_POST_FILES["ether_sovorakan"]['size'];
		  $userfile_type = $HTTP_POST_FILES["ether_sovorakan"]['type'];
		  $userfile_error = $HTTP_POST_FILES["ether_sovorakan"]['error'];
		  
		if ($userfile_error > 0)
		  {
			echo 'Problem: ';
			switch ($userfile_error)
			{
			  case 1:  echo 'File exceeded upload_max_filesize';  break;
			  case 2:  echo 'File exceeded max_file_size';  break;
			  case 3:  echo 'File only partially uploaded';  break;
			  case 4:  echo 'No file uploaded';  break;
			}
			exit;
		  }
		  $as=$userfile_name;
		  $as = explode('.', $as);
		  $c= count($as);
		  $xx=mt_rand(10,10100);
		  $xx= date("d.m.y")."-".$xx;

		  $allow_array = array("xlsx","xls","pdf","doc","docx");
		  if(!in_array(strtolower($as[$c-1]), $allow_array)) {echo"Wrong Fromat"; exit;}

		  $as[$c-1]=$userfile_name;//$xx.$as[$c-2].".".$as[$c-1];
		  $upfile = '../userfiles/'.$as[$c-1];
		  
		   if (is_uploaded_file($userfile)) 
		  {
			 if (!move_uploaded_file($userfile, $upfile))
			 {
				echo 'Problem: Could not move file to destination directory';
				exit;
			 }
		  } 
		  else 
		  {
			echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
			exit;
		  }

			$userfile1 = mysql_real_escape_string($as[$c-1]);

			

		}//ether_sovorakan





		if($HTTP_POST_FILES["ether_arbanyakayin"]['tmp_name'])
		{
		  $userfile = $HTTP_POST_FILES["ether_arbanyakayin"]['tmp_name'];
		  $userfile_name = $HTTP_POST_FILES["ether_arbanyakayin"]['name'];
		  $userfile_size = $HTTP_POST_FILES["ether_arbanyakayin"]['size'];
		  $userfile_type = $HTTP_POST_FILES["ether_arbanyakayin"]['type'];
		  $userfile_error = $HTTP_POST_FILES["ether_arbanyakayin"]['error'];
		  
		if ($userfile_error > 0)
		  {
			echo 'Problem: ';
			switch ($userfile_error)
			{
			  case 1:  echo 'File exceeded upload_max_filesize';  break;
			  case 2:  echo 'File exceeded max_file_size';  break;
			  case 3:  echo 'File only partially uploaded';  break;
			  case 4:  echo 'No file uploaded';  break;
			}
			exit;
		  }
		  $as=$userfile_name;
		  $as = explode('.', $as);
		  $c= count($as);
		  $xx=mt_rand(10,10100);
		  $xx= date("d.m.y")."-".$xx;

		  $allow_array = array("xlsx","xls","pdf","doc","docx");
		  if(!in_array(strtolower($as[$c-1]), $allow_array)) {echo"Wrong Fromat"; exit;}

		  $as[$c-1]=$userfile_name;//$xx.$as[$c-2].".".$as[$c-1];
		  $upfile = '../userfiles/'.$as[$c-1];
		  
		   if (is_uploaded_file($userfile)) 
		  {
			 if (!move_uploaded_file($userfile, $upfile))
			 {
				echo 'Problem: Could not move file to destination directory';
				exit;
			 }
		  } 
		  else 
		  {
			echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
			exit;
		  }

		$userfile2 = mysql_real_escape_string($as[$c-1]);

		//mysql_query("UPDATE `ether` SET `e_date`='".date("d/m/Y H:i")."', `e_time`=".time().", `e_name_sputnik`='".$userfile."' WHERE id=1");

		}//ether_arbanyakain

		mysql_query("INSERT INTO `ether` SET `e_date`='".date("d/m/Y H:i")."', `e_time`=".time().", `e_name_simple`='".$userfile1."', `e_name_sputnik`='".$userfile2."'");

	 header("Location: header.php?act=$act&lan=$lan");
	}

}




elseif($act=="reports"){
$b_name_hy = mysql_real_escape_string($_POST['name_hy']);
$b_name_ru = mysql_real_escape_string($_POST['name_ru']);
$b_name_en = mysql_real_escape_string($_POST['name_en']);
$b_text_hy = mysql_real_escape_string($_POST['text_hy']);
$b_text_ru = mysql_real_escape_string($_POST['text_ru']);
$b_text_en = mysql_real_escape_string($_POST['text_en']);
$b_desc_hy = mysql_real_escape_string($_POST['desc_hy']);
$b_desc_ru = mysql_real_escape_string($_POST['desc_ru']);
$b_desc_en = mysql_real_escape_string($_POST['desc_en']);
$b_bajin = mysql_real_escape_string($_POST['h_bajin']);

if($HTTP_POST_FILES["h_nkar"]['tmp_name'])
{
  $userfile = $HTTP_POST_FILES["h_nkar"]['tmp_name'];
  $userfile_name = $HTTP_POST_FILES["h_nkar"]['name'];
  $userfile_size = $HTTP_POST_FILES["h_nkar"]['size'];
  $userfile_type = $HTTP_POST_FILES["h_nkar"]['type'];
  $userfile_error = $HTTP_POST_FILES["h_nkar"]['error'];
  
if ($userfile_error > 0)
  {
    echo 'Problem: ';
    switch ($userfile_error)
    {
      case 1:  echo 'File exceeded upload_max_filesize';  break;
      case 2:  echo 'File exceeded max_file_size';  break;
      case 3:  echo 'File only partially uploaded';  break;
      case 4:  echo 'No file uploaded';  break;
    }
    exit;
  }
  $as=$userfile_name;
  $as = explode('.', $as);
  $c= count($as);
  $xx=mt_rand(10,10100);
  $xx= date("d.m.y")."-".$xx;

  $allow_array = array("jpg","jpeg","gif","png");
  if(!in_array(strtolower($as[$c-1]), $allow_array)) exit;

  $as[$c-1]=$xx.$as[$c-2].".".$as[$c-1];
  $upfile = '../userfiles/'.$as[$c-1];
  
   if (is_uploaded_file($userfile)) 
  {
     if (!move_uploaded_file($userfile, $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
    exit;
  }

$userfile=$as[$c-1];

}//u_pic

if(!$id){
 mysql_query("INSERT INTO `haxordumner` (h_nkar, h_name_hy, h_name_ru, h_name_en, h_text_hy, h_text_ru, h_text_en, h_desc_hy, h_desc_ru, h_desc_en, h_bajin) VALUES ('".$userfile."', '".$b_name_hy."', '".$b_name_ru."', '".$b_name_en."', '".$b_text_hy."', '".$b_text_ru."', '".$b_text_en."', '".$b_desc_hy."', '".$b_desc_ru."', '".$b_desc_en."', '".$b_bajin."')");

header("Location: header.php?act=$act");
}
else{
mysql_query("UPDATE `haxordumner` SET `h_name_hy`='".$b_name_hy."', `h_name_ru`='".$b_name_ru."', `h_name_en` = '".$b_name_en."', `h_text_hy`='".$b_text_hy."', `h_text_ru`='".$b_text_ru."', `h_text_en` = '".$b_text_en."', `h_desc_hy`='".$b_desc_hy."', `h_desc_ru`='".$b_desc_ru."', `h_desc_en`='".$b_desc_en."', `h_bajin`='".$b_bajin."' WHERE `id` = '".$id."' ");

if($userfile){
	mysql_query("UPDATE `haxordumner` SET `h_nkar`='".$userfile."' WHERE `id` = '".$id."' ");
}

header("Location: header.php?act=$act&id=$id");
}

}











elseif($act=="spec"){
$b_name_hy = mysql_real_escape_string($_POST['name_hy']);
$b_name_ru = mysql_real_escape_string($_POST['name_ru']);
$b_name_en = mysql_real_escape_string($_POST['name_en']);
$b_text_hy = mysql_real_escape_string($_POST['text_hy']);
$b_text_ru = mysql_real_escape_string($_POST['text_ru']);
$b_text_en = mysql_real_escape_string($_POST['text_en']);
$b_desc_hy = mysql_real_escape_string($_POST['desc_hy']);
$b_desc_ru = mysql_real_escape_string($_POST['desc_ru']);
$b_desc_en = mysql_real_escape_string($_POST['desc_en']);

if($HTTP_POST_FILES["h_nkar"]['tmp_name'])
{
  $userfile = $HTTP_POST_FILES["h_nkar"]['tmp_name'];
  $userfile_name = $HTTP_POST_FILES["h_nkar"]['name'];
  $userfile_size = $HTTP_POST_FILES["h_nkar"]['size'];
  $userfile_type = $HTTP_POST_FILES["h_nkar"]['type'];
  $userfile_error = $HTTP_POST_FILES["h_nkar"]['error'];
  
if ($userfile_error > 0)
  {
    echo 'Problem: ';
    switch ($userfile_error)
    {
      case 1:  echo 'File exceeded upload_max_filesize';  break;
      case 2:  echo 'File exceeded max_file_size';  break;
      case 3:  echo 'File only partially uploaded';  break;
      case 4:  echo 'No file uploaded';  break;
    }
    exit;
  }
  $as=$userfile_name;
  $as = explode('.', $as);
  $c= count($as);
  $xx=mt_rand(10,10100);
  $xx= date("d.m.y")."-".$xx;

  $allow_array = array("jpg","jpeg","gif","png");
  if(!in_array(strtolower($as[$c-1]), $allow_array)) exit;

  $as[$c-1]=$xx.$as[$c-2].".".$as[$c-1];
  $upfile = '../userfiles/'.$as[$c-1];
  
   if (is_uploaded_file($userfile)) 
  {
     if (!move_uploaded_file($userfile, $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
    exit;
  }

$userfile=$as[$c-1];

}//u_pic



if(!$id){
 mysql_query("INSERT INTO `hatuk_txtakic` (h_nkar, h_name_hy, h_name_ru, h_name_en, h_text_hy, h_text_ru, h_text_en, h_desc_hy, h_desc_ru, h_desc_en) VALUES ('".$userfile."', '".$b_name_hy."', '".$b_name_ru."', '".$b_name_en."', '".$b_text_hy."', '".$b_text_ru."', '".$b_text_en."', '".$b_desc_hy."', '".$b_desc_ru."', '".$b_desc_en."')");

header("Location: header.php?act=$act");
}
else{
mysql_query("UPDATE `hatuk_txtakic` SET `h_name_hy`='".$b_name_hy."', `h_name_ru`='".$b_name_ru."', `h_name_en` = '".$b_name_en."', `h_text_hy`='".$b_text_hy."', `h_text_ru`='".$b_text_ru."', `h_text_en` = '".$b_text_en."', `h_desc_hy`='".$b_desc_hy."', `h_desc_ru`='".$b_desc_ru."', `h_desc_en`='".$b_desc_en."' WHERE `id` = '".$id."' ");

if($userfile){
	mysql_query("UPDATE `hatuk_txtakic` SET `h_nkar`='".$userfile."' WHERE `id` = '".$id."' ");
}

header("Location: header.php?act=$act&id=$id");
}

}//spec







elseif($act=="news"){
	$b_page_category = mysql_real_escape_string($_POST['page_category']);
	$b_page_title = mysql_real_escape_string($_POST['page_title']);
	$b_page_content = mysql_real_escape_string($_POST['page_content']);
	$b_page_short = mysql_real_escape_string($_POST['page_short']);
	$b_page_keywords = mysql_real_escape_string($_POST['page_keywords']);
	$b_page_video = mysql_real_escape_string($_POST['page_video']);
	$b_page_show = mysql_real_escape_string($_POST['page_show']);
	$b_page_top = mysql_real_escape_string($_POST['page_top']);
	$b_page_top_plus = mysql_real_escape_string($_POST['page_top_plus']);
	$b_page_trans = mysql_real_escape_string($_POST['page_trans']);
	$b_page_ord = intval($_POST['page_ord']);

if(!$id){

if($HTTP_POST_FILES["page_pic"]['tmp_name'])
{
  $userfile = $HTTP_POST_FILES["page_pic"]['tmp_name'];
  $userfile_name = $HTTP_POST_FILES["page_pic"]['name'];
  $userfile_size = $HTTP_POST_FILES["page_pic"]['size'];
  $userfile_type = $HTTP_POST_FILES["page_pic"]['type'];
  $userfile_error = $HTTP_POST_FILES["page_pic"]['error'];
  
if ($userfile_error > 0)
  {
    echo 'Problem: ';
    switch ($userfile_error)
    {
      case 1:  echo 'File exceeded upload_max_filesize';  break;
      case 2:  echo 'File exceeded max_file_size';  break;
      case 3:  echo 'File only partially uploaded';  break;
      case 4:  echo 'No file uploaded';  break;
    }
    exit;
  }
  $as=$userfile_name;
  $as = explode('.', $as);
  $c= count($as);
  $xx=mt_rand(10,10100);
  $xx= date("d.m.y")."-".$xx;

  $allow_array = array("jpg","jpeg","gif","png");
  if(!in_array(strtolower($as[$c-1]), $allow_array)) exit;

  $as[$c-1]=$xx.$as[$c-2].".".$as[$c-1];
  $upfile = '../userfiles/'.$as[$c-1];
  
   if (is_uploaded_file($userfile)) 
  {
     if (!move_uploaded_file($userfile, $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
    exit;
  }

$userfile=$as[$c-1];

}//u_pic


	//$date_d = date("G:i . d/m");
	//$date_d = date("G:i . d/m/y", mktime(date("H")+$timeDif, date("i"), date("s"), date("n"), date("j"), date("Y")));
	//echo $date_d;
	
	$timezone = "Asia/Yerevan"; 
	date_default_timezone_set('Asia/Yerevan');
	$date_d = date("G:i . d/m/y", time());
 mysql_query("INSERT INTO `records` (r_category, r_pic, r_title_hy, r_short_hy, r_text_hy, r_keywords_hy, r_video_hy, r_show_hy, r_top, r_top_plus, r_trans, r_fullDate) VALUES ('".$_POST['page_category']."', '".$userfile."', '".$b_page_title."', '".$b_page_short."', '".$b_page_content."', '".$b_page_keywords."', '".$b_page_video."', '".$b_page_show."', '".$b_page_top."', '".$b_page_top_plus."', '".$b_page_trans."', '".date("d.m.y")."')");



 $id = mysql_insert_id();


 //echo $id."***";

 mysql_query("UPDATE `records` SET `r_date` = '".$date_d."', `r_ord`=`id`  WHERE `id` = '".$id."' ");

 include"rssXML.php";

 header("Location: header.php?act=$act&id=$id");
} //!id


elseif($id){
if($HTTP_POST_FILES["page_pic"]['tmp_name'])
{
  $userfile = $HTTP_POST_FILES["page_pic"]['tmp_name'];
  $userfile_name = $HTTP_POST_FILES["page_pic"]['name'];
  $userfile_size = $HTTP_POST_FILES["page_pic"]['size'];
  $userfile_type = $HTTP_POST_FILES["page_pic"]['type'];
  $userfile_error = $HTTP_POST_FILES["page_pic"]['error'];
  
if ($userfile_error > 0)
  {
    echo 'Problem: ';
    switch ($userfile_error)
    {
      case 1:  echo 'File exceeded upload_max_filesize';  break;
      case 2:  echo 'File exceeded max_file_size';  break;
      case 3:  echo 'File only partially uploaded';  break;
      case 4:  echo 'No file uploaded';  break;
    }
    exit;
  }
  $as=$userfile_name;
  $as = explode('.', $as);
  $c= count($as);
  $xx=mt_rand(10,10100);
  $xx= date("d.m.y")."-".$xx;

  $allow_array = array("jpg","jpeg","gif","png");
  if(!in_array(strtolower($as[$c-1]), $allow_array)) exit;

  $as[$c-1]=$xx.$as[$c-2].".".$as[$c-1];
  $upfile = '../userfiles/'.$as[$c-1];
  
   if (is_uploaded_file($userfile)) 
  {
     if (!move_uploaded_file($userfile, $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
    exit;
  }

$userfile=$as[$c-1];

 //mysql_query("UPDATE `records` SET `r_category`='".$_POST['page_category']."', `r_pic`='".$userfile."', `r_title_".$lan."` = '".$_POST['page_title']."', `r_short_".$lan."`='".$_POST['page_short']."', `r_text_".$lan."` = '".$_POST['page_content']."', `r_keywords_".$lan."` = '".$_POST['page_keywords']."', `r_video_".$lan."` = '".$_POST['page_video']."', `r_show_".$lan."` = '".$_POST['page_show']."', `r_top` = '".$_POST['page_top']."', `r_top_plus` = '".$_POST['page_top_plus']."'  WHERE `id` = '".$id."' ");

 mysql_query("UPDATE `records` SET `r_category`='".$b_page_category."', `r_pic`='".$userfile."', `r_title_".$lan."` = '".$b_page_title."', `r_short_".$lan."`='".$b_page_short."',  `r_text_".$lan."` = '".$b_page_content."', `r_keywords_".$lan."` = '".$b_page_keywords."', `r_video_".$lan."` = '".$b_page_video."', `r_show_".$lan."` = '".$b_page_show."', `r_top` = '".$b_page_top."', `r_top_plus` = '".$b_page_top_plus."', `r_trans`='".$b_page_trans."', `r_ord`=".$b_page_ord."  WHERE `id` = '".$id."' ");
	
include"rssXML.php";
}//u_pic

else{


 mysql_query("UPDATE `records` SET `r_category`='".$b_page_category."', `r_title_".$lan."` = '".$b_page_title."', `r_short_".$lan."`='".$b_page_short."',  `r_text_".$lan."` = '".$b_page_content."', `r_keywords_".$lan."` = '".$b_page_keywords."', `r_video_".$lan."` = '".$b_page_video."', `r_show_".$lan."` = '".$b_page_show."', `r_top` = '".$b_page_top."', `r_top_plus` = '".$b_page_top_plus."', `r_trans` = '".$b_page_trans."', `r_ord`=".$b_page_ord."  WHERE `id` = '".$id."' ");
	
include"rssXML.php";

// mysql_query("UPDATE `records` SET `r_category`='".$_POST['page_category']."', `r_title_".$lan."` = '".$_POST['page_title']."', `r_short_".$lan."`='".$_POST['page_short']."',  `r_text_".$lan."` = '".$_POST['page_content']."', `r_keywords_".$lan."` = '".$_POST['page_keywords']."', `r_video_".$lan."` = '".$_POST['page_video']."', `r_show_".$lan."` = '".$_POST['page_show']."', `r_top` = '".$_POST['page_top']."', `r_top_plus` = '".$_POST['page_top_plus']."'  WHERE `id` = '".$id."' ");
}
if($lan=="hy") {//
  mysql_query("UPDATE `records` SET `r_date` = '".$_POST['page_date']."'  WHERE `id` = '".$id."' ");
}

header("Location: header.php?act=$act&id=$id&lan=$lan");
}//id

}









elseif($act=="films"){

if($HTTP_POST_FILES["f_nkar"]['tmp_name'])
{
  $userfile = $HTTP_POST_FILES["f_nkar"]['tmp_name'];
  $userfile_name = $HTTP_POST_FILES["f_nkar"]['name'];
  $userfile_size = $HTTP_POST_FILES["f_nkar"]['size'];
  $userfile_type = $HTTP_POST_FILES["f_nkar"]['type'];
  $userfile_error = $HTTP_POST_FILES["f_nkar"]['error'];
  
if ($userfile_error > 0)
  {
    echo 'Problem: ';
    switch ($userfile_error)
    {
      case 1:  echo 'File exceeded upload_max_filesize';  break;
      case 2:  echo 'File exceeded max_file_size';  break;
      case 3:  echo 'File only partially uploaded';  break;
      case 4:  echo 'No file uploaded';  break;
    }
    exit;
  }
  $as=$userfile_name;
  $as = explode('.', $as);
  $c= count($as);
  $xx=mt_rand(10,10100);
  $xx= date("d.m.y")."-".$xx;
	
  $allow_array = array("jpg","jpeg","gif","png");
  if(!in_array(strtolower($as[$c-1]), $allow_array)) exit;

  $as[$c-1]=$xx.$as[$c-2].".".$as[$c-1];
  $upfile = '../userfiles/'.$as[$c-1];
  
   if (is_uploaded_file($userfile)) 
  {
     if (!move_uploaded_file($userfile, $upfile))
     {
        echo 'Problem: Could not move file to destination directory';
        exit;
     }
  } 
  else 
  {
    echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
    exit;
  }

$userfile=$as[$c-1];

}//u_pic

if(!$id){
 mysql_query("INSERT INTO `filmer` (f_nkar, f_name_hy, f_text_hy, f_desc_hy) VALUES ('".$userfile."', '".$_POST['name_hy']."', '".$_POST['text_hy']."', '".$_POST['desc_hy']."')");
header("Location: header.php?act=$act");
}
else{
mysql_query("UPDATE `filmer` SET `f_name_hy`='".$_POST['name_hy']."', `f_text_hy`='".$_POST['text_hy']."',  `f_desc_hy`='".$_POST['desc_hy']."' WHERE `id` = '".$id."' ");

if($userfile){
	mysql_query("UPDATE `filmer` SET `f_nkar`='".$userfile."' WHERE `id` = '".$id."' ");
}

header("Location: header.php?act=$act&id=$id");
}

}

?>