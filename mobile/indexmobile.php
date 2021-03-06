<?
include"../baza.php";

$_PATH = "/mobile/";

$page = isset($_GET['page'])?$_GET['page']:"";

if(isset($_GET['id'])) $ip=intval($_GET['id']);

$lan = "hy";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="hy" lang="hy">
<head> 
<title>Երկիր Մեդիա</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?=$_PATH?>css/jquery.mobile-1.2.1.min.css" />
<link rel="stylesheet" href="<?=$_PATH?>css/jqm-docs.css"/>

<script src="<?=$_PATH?>js/jquery-1.8.3.min.js"></script>
<script src="<?=$_PATH?>js/jquery.mobile-1.2.1.min.js"></script>
<script src="<?=$_PATH?>js/main.js"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">

	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<script>
function toggleTopNews() {
	$(".moreTopNews").toggle("slow");
	$("#topNewsDiv .more").toggleClass("active");
}
</script>
<style>
	@font-face
	{
		font-family: arnamu;
		src: url('arnamu.ttf');
	}
	*{
		font-family: arnamu;
	}
	body{
		margin:0;
		padding:0;	
		padding-bottom:30px;
	}
	#logoBorder{
		height:6px;
		width:100%;
		background:url('/s/i/menu_bg.png') repeat-x 0px -22px
	}
	#headerDiv img{
		max-width:100%;
	}
	#homePage {
	/*	background:#fff !important;*/
		
	}

	a.activeAFooter {
		color:#ff7c00 !important;
		
	}
	span.time, span.sep, span.date {
		margin:0 5px;
		display:inline-block;
		color:#888;
	}

	a.titleNews{
		/*width:60%;*/
	}
	#newsUL li span, #newsUL li a {
		font-size:13px !important;
	}

	h1.titleNews {
		padding:10px; 
		font-size:18px;
	}

	img.newsMainImage{
		max-width:90%;
		margin:5%;
	}
	div.newsContent{
		padding:10px;
		text-align:justify;
		text-indent:20px;
	}

	#footerDiv{
		position: fixed;
		bottom: 0px;
		width: 100%;
		z-index: 9;
	}
	
	.titleDiv{
		height:33px;
		width:100%;
		background:url('images/rigth_header_bg.png') no-repeat bottom left #e4e4e4
	}
	.titleDiv h2{
		height:23px;
		line-height:23px;
		font-size:18px;
		text-indent:20px;
		margin:0;
		padding:0;
	}
	
	#topVideosDiv {
		margin-top:20px;
	}

	#topNewsDiv .topNewsDiv{
		width:100%;
		clear:both;
		margin-top:10px;
		padding-bottom:10px;
		overflow:hidden;
		border-bottom:1px solid #e4e4e4;
	}
	
	#topNewsDiv .topNewsDiv .topNewsImage{
		width:30%;
		margin-left:2%;
		margin-right:3%;
		float:left;
	}
	#topNewsDiv .topNewsDiv .topNewsImage img{
		max-width:100%;
	}
	#topNewsDiv .topNewsDiv .topNewsContent{
		width:63%;
		float:left;
	}
	#topNewsDiv .topNewsDiv .topNewsContent p.TopN_p{
		text-align: right;
		margin: 0;
		padding: 0;
		outline: none;
		font-size: 12px;
		color:#aaaaaa;
	}
	#topNewsDiv .topNewsDiv .topNewsContent h2{
		margin:0;
		padding:0;
		font-size:16px;
	}
	#topNewsDiv .topNewsDiv .topNewsContent h2 a{
		text-decoration:none;
		color:#000;

	}
	#topNewsDiv .topNewsDiv .topNewsContent h2 a:hover{
		text-decoration:none
	}

	#topNewsDiv .more{display:block;width:100%;height:14px;background:url('images/cat_more.png') no-repeat center 0px;cursor:pointer;text-indent:-9999px;margin-top:5px;}
	#topNewsDiv .more:hover{background-position:center -14px;}
	#topNewsDiv .more.active{background-position:center -28px;}
	#topNewsDiv .more.active:hover{background-position:center -42px;}
	.moreTopNews {
		display:none;
	}
	
	div.liVideoDescDiv {
		position:absolute;height:70px;margin:-70px 0 0 -5px;width:200px;background:#ff7c00;overflow:hidden;
	}
	a.liVideoA{
		width:196px;margin:auto;display:block;color:white !important;font-size:11px;font-weight: normal !important;text-align: center;text-decoration: none;
	}
</style>

<!-- liquid carusel -->
<link type='text/css' rel='stylesheet' href='css/liquidcarousel.css' />
<script type="text/javascript" src="js/jquery.liquidcarousel.js"></script>
<script type="text/javascript">
<!--
	$(document).ready(function() {
		$('#liquid1').liquidcarousel({height:152, duration:100, hidearrows:false});
	});
-->
</script>
	
</head>
<body>
<div data-role="page" id="homePage" data-theme="d">
	
	<div id="headerDiv">
		<a href="<?=$_PATH?>"><img src="/s/i/logohy.png" alt=""></a>
		<div id="logoBorder"></div>
	</div>

	<?PHP
	
		if($page=="") {
			
			echo'<div class="titleDiv"><h2>Թոփ լուրեր</h2></div>';
			$resh = mysql_query("SELECT * FROM `records` WHERE `r_category` > 0 AND `r_top` = 1 AND `r_show_$lan` = 1 Order by `r_ord` desc LIMIT 10 ");
			echo'<div id="topNewsDiv">';
				for($i=0;$i<10;$i++) {
					$r_id = mysql_result($resh, $i, "id");
					$r_pic = mysql_result($resh, $i, "r_pic");
					$r_title = mysql_result($resh, $i, "r_title_$lan");
					$r_video = mysql_result($resh, $i, "r_video_$lan");
					$r_date = mysql_result($resh, $i, "r_date");
					echo'<div class="topNewsDiv">
							<div class="topNewsImage"><img src="../userfiles/'.$r_pic.'"/></div>
							<div class="topNewsContent"><h2><a href="?page=news&amp;id='.$r_id.'">'.$r_title.'</a></h2>
							<p class="TopN_p"><span class="p_time">'.$r_date.'</span> '.($r_video>0?'<a href="?page=news&amp;id='.$r_id.'#video" class="video"></a>':"").'</p></div>
						</div>';

					if($i==2)
						echo'<div class="moreTopNews">';
				}
				echo"</div>";
				echo'<div class="more" onclick="toggleTopNews()"></div>';

			echo'</div>';


			echo'<div id="topVideosDiv">
				<div class="titleDiv"><h2>Տեսանյութեր <img src="/s/i/video_f.png" style="margin-left:10px;" alt=""></h2></div>

				<div id="liquid1" class="liquid">
					<span class="previous"></span>
					<div class="wrapper">
						<ul>';

							$resh = mysql_query("SELECT `id`, `r_pic`, `r_title_".$lan."` FROM `records` WHERE `r_category` > 0 AND `r_video_".$lan."`!='' AND `r_show_$lan` = 1 AND `id` NOT IN (1,2) Order by `r_ord` desc LIMIT 18 ");
							$count = @mysql_num_rows($resh);
							
							for($i=0;$i<$count;$i++){
								$v_id = mysql_result($resh, $i, "id");
								$v_pic = mysql_result($resh, $i, "r_pic");
								$v_title = mysql_result($resh, $i, "r_title_".$lan);
								echo'<li>
										<div style="position:relative;width:200px;">
											<img src="../userfiles/'.$v_pic.'" style="width:190px;height:152px;" alt="" />
											<div class="liVideoDescDiv"><a href="?page=news&amp;lan='.$lan.'&amp;id='.$v_id.'" class="liVideoA">'.$v_title.'</a></div>
										</div>										
									</li>';
							}
						echo'</ul>
					</div>
					<span class="next"></span>
				</div>
			</div>';



		
		}

		elseif($page=="news" && !$id) {
			echo'<div class="titleDiv"><h2>Լրահոս</h2></div>';

			echo'<ul data-role="listview" data-inset="false" data-filter="false" id="newsUL" data-theme="c">';

			$resh = mysql_query("SELECT * FROM `records` WHERE `r_category` > 0 AND `r_show_hy` > 0 Order by `r_ord` desc LIMIT 50");
			$count = @mysql_num_rows($resh);
			 for($i=0;$i<$count;$i++){

				$r_id_r = mysql_result($resh, $i, "id");
				$r_title_r = mysql_result($resh, $i, "r_title_hy");
    			$r_video_r = mysql_result($resh, $i, "r_video_hy");
    			$r_date_r = mysql_result($resh, $i, "r_date");
				$r_date_r = trim($r_date_r);
				$r_date_r = explode(".", $r_date_r);

				echo'<li>
					<span class="time">'.$r_date_r[0].'</span>
					<span class="sep"> . </span>
					<span class="date">'.$r_date_r[1].'</span>
					<a href="?page=news&amp;id='.$r_id_r.'" class="titleNews';
					if($r_video_r) echo' titleNewsVideo ';
					echo'" title="'.$r_title_r.'">'.$r_title_r.'</a>'; 
					
				echo'</li>';
			}

			echo'</ul>';
		} 

		elseif($page=="news" && $id) {
			$resh = mysql_query("SELECT * FROM `records` WHERE `id` = '".$id."' AND `r_show_hy` = 1 ");
			 $r_id_r = mysql_result($resh, 0, "id");
			 $r_pic_r = mysql_result($resh, 0, "r_pic");
			 $r_title_r = mysql_result($resh, 0, "r_title_hy");
			 $r_short_r = mysql_result($resh, 0, "r_short_hy");
			 $r_text_r = mysql_result($resh, 0, "r_text_hy");
			 $r_video_r = mysql_result($resh, 0, "r_video_hy");
			 $r_keywords_r = mysql_result($resh, 0, "r_keywords_hy");

			 echo'<h1 class="titleNews">'.$r_title_r.'</h1>';
			 echo'<img src="/userfiles/'.$r_pic_r.'" class="newsMainImage" />';
			 echo'<div class="newsContent">'.$r_text_r.'
				<p style="text-align:center;">'.$r_video_r.'</p>
			 </div>';
		}


		elseif($page=="stream") {
			echo'<div class="titleDiv"><h2>Ուղիղ եթեր</h2></div>';
			echo'<center> <iframe src="http://new.livestream.com/accounts/11401270/events/3666818/player?width=640&height=360&autoPlay=true&mute=false" width="640" height="360" frameborder="0" scrolling="no"> </iframe></center>';
		}

	?>


	<div data-role="footer" id="footerDiv" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="/mobile/" <?=($page==""?" class='activeAFooter' ":"")?>>Գլխավոր</a></li>
				<li><a href="/mobile/?page=news" <?=($page=="news"?" class='activeAFooter' ":"")?>>Լրահոս</a></li>
				<li><a href="/mobile/?page=stream" <?=($page=="stream"?" class='activeAFooter' ":"")?>>Ուղիղ եթեր</a></li>
				<!-- <li><a href="/mobile/?page=reports" <?=($page=="reports"?" class='activeAFooter' ":"")?>>Հաղորդումներ</a></li> -->
			</ul>
		</div><!-- /navbar -->
	</div>
</div>
</body>
</html>