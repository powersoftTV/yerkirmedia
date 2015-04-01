<?PHP
error_reporting( 0 ) ;
session_start() ;
include "baza.php" ;
//include"graber_currency.php";
if ( isset( $_GET['act'] ) && $_GET['act'] == "pages" || $_GET['act'] == "news" ||
    $_GET['act'] == "archive_programs" || $_GET['act'] == "archive_news" || $_GET['act'] ==
    "cat" || $_GET['act'] == "ether" || $_GET['act'] == "online" || $_GET['act'] ==
    "yerkir" || $_GET['act'] == "films" || $_GET['act'] == "search" || $_GET['act'] ==
    "polls" || $_GET['act'] == "spec" || $_GET['act'] == "prog" )
    $act = $_GET['act'] ;
else
    $act = '' ;
if ( isset( $_GET['lan'] ) )
{
    if ( $_GET['lan'] == "ru" )
        $lan = "ru" ;
    elseif ( $_GET['lan'] == "en" )
        $lan = "en" ;
    else
        $lan = "hy" ;
} else
    $lan = "hy" ;
include "langs.php" ;
if ( isset( $_GET['id'] ) )
    $id = intval( $_GET['id'] ) ;
if ( ! empty( $id ) && empty( $act ) )
    $act = "news" ;
if ( isset( $_GET['p'] ) )
    $p = intval( $_GET['p'] ) ;
if ( ! $p )
    $p = 1 ;
$useragent = $_SERVER['HTTP_USER_AGENT'] ;
if ( preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',
    $useragent ) || preg_match( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
    substr( $useragent, 0, 4 ) ) ){
       if(!isset( $_GET['act'])) header( 'Location: http://yerkirmedia.am/mobile/?lan='.$lan ) ;
       if($act == 'news' && !empty( $id )) header( 'Location: http://yerkirmedia.am/mobile/?lan='.$lan.'&page=news&id='.$id ) ;       
    }
///select
if ( $act == "pages" && $id )
{


    $resh = mysql_query( "SELECT * FROM `records` WHERE `r_category` = '0' AND `id` = '" .
        $id . "' " ) ;


    $r_title_r = mysql_result( $resh, $i, "r_title_$lan" ) ;


    $r_text_r = mysql_result( $resh, $i, "r_text_$lan" ) ;


    $r_keywords_r = mysql_result( $resh, $i, "r_keywords_$lan" ) ;


    $ym_title = $r_title_r ;


} elseif ( $act == "news" && $id )
{


    $resh = mysql_query( "SELECT * FROM `records` WHERE `r_category` > 0 AND `r_show_$lan` = 1 AND `id` = '" .
        $id . "' Order by `id` desc " ) ;


    $r_id_r = mysql_result( $resh, 0, "id" ) ;


    $r_pic_r = mysql_result( $resh, 0, "r_pic" ) ;


    $r_title_r = mysql_result( $resh, 0, "r_title_$lan" ) ;


    $r_short_r = mysql_result( $resh, 0, "r_short_$lan" ) ;


    $r_text_r = mysql_result( $resh, 0, "r_text_$lan" ) ;


    $r_video_r = mysql_result( $resh, 0, "r_video_$lan" ) ;


    $r_keywords_r = mysql_result( $resh, 0, "r_keywords_$lan" ) ;


    $r_date_r = mysql_result( $resh, 0, "r_date" ) ;


    if ( $_GET['se'] )
    {


        $search = $_GET['se'] ;


        $search = trim( $search ) ;


        $search = stripslashes( $search ) ;


        $search = htmlspecialchars( $search ) ;


        $search = mb_substr( $search, 0, 128, 'utf-8' ) ;


        $search_hilights = preg_replace( "/ +/", " ", $search ) ;


        $tempp = explode( " ", $search_hilights ) ;


        $temp = array() ;


        foreach ( $tempp as $f )
        {


            if ( mb_strlen( $f, 'UTF-8' ) > 2 )
                $temp[] = $f ;


        }


        $rowarray = explode( " ", $r_title_r ) ;


        $i = 0 ;


        foreach ( $rowarray as $e )
        {


            foreach ( $temp as $f )
            {


                if ( mb_strrichr( $e, $f, true, 'utf-8' ) !== false )
                {


                    $skizb = mb_strrichr( $e, $f, true, 'utf-8' ) ;


                    $verch = mb_strrichr( $e, $f, false, 'utf-8' ) ;


                    $sovpadenie = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ), mb_strlen( $f,
                        'utf-8' ), 'utf-8' ) ;


                    $ostatok = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ) + mb_strlen( $f, 'utf-8' ),
                        mb_strlen( $e, 'utf-8' ) - mb_strlen( $skizb, 'utf-8' ) - mb_strlen( $f, 'utf-8' ),
                        'utf-8' ) ;


                    $sovpadenie = "<span style='font-weight:900; font-size:20px'>" . $sovpadenie .
                        "</span>" ;


                    $rowarray[$i] = $skizb . $sovpadenie . $ostatok ;


                }


            }


            $i++ ;


        }


        $r_title_r = implode( " ", $rowarray ) ;


        $rowarray = explode( " ", $r_short_r ) ;


        $i = 0 ;


        foreach ( $rowarray as $e )
        {


            foreach ( $temp as $f )
            {


                if ( mb_strrichr( $e, $f, true, 'utf-8' ) !== false )
                {


                    $skizb = mb_strrichr( $e, $f, true, 'utf-8' ) ;


                    $verch = mb_strrichr( $e, $f, false, 'utf-8' ) ;


                    $sovpadenie = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ), mb_strlen( $f,
                        'utf-8' ), 'utf-8' ) ;


                    $ostatok = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ) + mb_strlen( $f, 'utf-8' ),
                        mb_strlen( $e, 'utf-8' ) - mb_strlen( $skizb, 'utf-8' ) - mb_strlen( $f, 'utf-8' ),
                        'utf-8' ) ;


                    $sovpadenie = "<span style='font-weight:800; font-size:16px'>" . $sovpadenie .
                        "</span>" ;


                    $rowarray[$i] = $skizb . $sovpadenie . $ostatok ;


                }


            }


            $i++ ;


        }


        $r_short_r = implode( " ", $rowarray ) ;


        $rowarray = explode( " ", $r_text_r ) ;


        $i = 0 ;


        foreach ( $rowarray as $e )
        {


            foreach ( $temp as $f )
            {


                if ( mb_strrichr( $e, $f, true, 'utf-8' ) !== false )
                {


                    $skizb = mb_strrichr( $e, $f, true, 'utf-8' ) ;


                    $verch = mb_strrichr( $e, $f, false, 'utf-8' ) ;


                    $sovpadenie = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ), mb_strlen( $f,
                        'utf-8' ), 'utf-8' ) ;


                    $ostatok = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ) + mb_strlen( $f, 'utf-8' ),
                        mb_strlen( $e, 'utf-8' ) - mb_strlen( $skizb, 'utf-8' ) - mb_strlen( $f, 'utf-8' ),
                        'utf-8' ) ;


                    $sovpadenie = "<span style='font-weight:800; font-size:16px'>" . $sovpadenie .
                        "</span>" ;


                    $rowarray[$i] = $skizb . $sovpadenie . $ostatok ;


                }


            }


            $i++ ;


        }


        $r_text_r = implode( " ", $rowarray ) ;


    }


    if ( $lan == "hy" )
        $ym_title = $r_title_r . " | Նորություններ" ;


    elseif ( $lan == "en" )
        $ym_title = $r_title_r . " | News" ;


    elseif ( $lan == "ru" )
        $ym_title = $r_title_r . " | Новости" ;


} elseif ( $act == "prog" && $id )
{


    $resh = mysql_query( "SELECT * FROM `haxordumner` WHERE id = '" . $id . "' " ) ;


    $r_pic_r = mysql_result( $resh, 0, "h_nkar" ) ;


    $ym_title = @mysql_result( $resh, 0, "h_name_$lan" ) ;


    $ym_title1 = @mysql_result( $resh, 0, "h_desc_$lan" ) ;


} elseif ( $act == "yerkir" )
{


    $resh = mysql_query( "SELECT * FROM `haxordumner` WHERE id = '5' " ) ;


    $r_pic_r = mysql_result( $resh, 0, "h_nkar" ) ;


    $ym_title = @mysql_result( $resh, 0, "h_name_$lan" ) ;


    $ym_title1 = @mysql_result( $resh, 0, "h_desc_$lan" ) ;


} elseif ( $act == "films" && $id )
{


    $resh_h = mysql_query( "SELECT * FROM `filmer` WHERE `id` = '" . $id . "' " ) ;


    $f_name = mysql_result( $resh_h, 0, "f_name_$lan" ) ;


    $r_pic_r = mysql_result( $resh_h, 0, "f_nkar" ) ;


    $f_desc = mysql_result( $resh_h, 0, "f_desc_$lan" ) ;


    $ym_title = mysql_result( $resh_h, 0, "f_name_$lan" ) ;


    $ym_title1 = mysql_result( $resh_h, 0, "f_desc_$lan" ) ;


}


if ( isset( $_SESSION['ym_poll'] ) && intval( $_SESSION['ym_poll'] ) )
    setcookie( "ym_poll", $q_id, time() + 28000 ) ;


$r_keywords_r .= $yerkir_media ;


///select end


if ( isset( $ym_title ) )
    $ym_title .= " |" ;

?>







<?

echo '<?xml version="1.0" encoding="utf-8"?>' ;

?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">







<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">







<head>


<?

if ( $lan == "ru" )
{

?>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22969388-2', 'auto');
  ga('send', 'pageview');

</script>
<?

} elseif ( $lan == "en" )
{

?>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22969388-3', 'auto');
  ga('send', 'pageview');

</script>
<?

} else
{

?>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22969388-1', 'auto');
  ga('send', 'pageview');

</script>
<?

}

?>












<link rel="icon" href="favicon.ico" type="image/x-icon" />







<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />







<meta http-equiv="content-Type" content="text/html; charset=utf-8" />







<link href="s/s.css" type="text/css" rel="stylesheet" />







<meta name="page-topic" content="" />







<meta name="description" content="<?=

str_replace( '"', "&quot;", $r_title_r ) ; //$r_title_r

?>" />







<!--DESCRIPTIONS-->







<meta name="keywords" content="<?=

$r_keywords_r

?>" />







<!--KEYWORDS-->







<meta name="revisit-after" content="1 hour" />







<meta name="distribution" content="Global" />







<meta charset="utf-8">







<!-- AM -->







<link rel="stylesheet" type="text/css" media="all" href="/s/jsDatePick_ltr.min.css" />







<script type="text/javascript" src="/js/jquery.1.4.2.js"></script>







<script type="text/javascript" src="/js/jsDatePick.jquery.min.1.3.js"></script>







<div id="fb-root"></div>







<script>(function(d, s, id) {







  var js, fjs = d.getElementsByTagName(s)[0];







  if (d.getElementById(id)) return;







  js = d.createElement(s); js.id = id;







  js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";







  fjs.parentNode.insertBefore(js, fjs);







}(document, 'script', 'facebook-jssdk'));</script>







<script type="text/javascript">

	function getSelectedDate(){		

		g_globalObject2 = new JsDatePick({

		useMode:1,

		isStripped:false,

			target:"calendar_archive",

			cellColorScheme:"orange"

		});

		g_globalObject2.setOnSelectedDelegate(function(){

			var obj = g_globalObject2.getSelectedDay();

			if (obj.day <10)

				obj.day = '0'+obj.day;

			if (obj.month <10)

				obj.month = '0'+obj.month;

				obj.year = obj.year - 2000;

			document.getElementsByName('news_day')[0].value = obj.day;

			document.getElementsByName('news_month')[0].value = obj.month;

			document.getElementsByName('news_year')[0].value = obj.year;

			document.getElementById('archive_news_search').submit();

		});		

	};

	<!-- ссылка на первоисточник -->

// < ![CDATA[

// < ![CDATA[

// < ![CDATA[

// < ![CDATA[

// < ![CDATA[

//< ![CDATA[

function addLink() {

    var body_element = document.getElementsByTagName('body')[0];

    var selection = window.getSelection();

    // Вы можете изменить текст в этой строчке

    var pagelink = "<br><br>Ամբողջական հոդվածը կարող եք կարդալ այս հասցեով՝ <a href='"+document.location.href+"'>"+document.location.href+"<br><pre>© Երկիրմեդիա </pre>";

    var copytext = selection + pagelink;

    var newdiv = document.createElement('div');

    newdiv.style.position = 'absolute';

    newdiv.style.left = '-99999px';

    body_element.appendChild(newdiv);

    newdiv.innerHTML = copytext;

    selection.selectAllChildren(newdiv);

    window.setTimeout( function() {

    body_element.removeChild(newdiv);

    }, 0);

}

document.oncopy = addLink;

// ]]></script>

<!-- /ссылка на первоисточник -->

</script>



<?

if ( isset( $r_pic_r ) && $r_pic_r )
{

?>







<meta property="og:title" content="<?=

    str_replace( '"', "&quot;", $ym_title )

?> <?=

    $yerkir_media

?>" /> 







<meta property="og:type" content="article">







<!--<meta property="og:url" content="http://www.yerkirmedia.am/">-->







<meta property="og:site_name" content="Yerkir Media">







<meta property="og:image" content="http://www.yerkirmedia.am/userfiles/<?=

    $r_pic_r

?>" />







<link rel="image_src" href="/userfiles/<?=

    $r_pic_r

?>"/>







<meta property="og:description" content="<?=

    str_replace( '"', "&quot;", $ym_title1 )

?>" /> 







<!--<link rel="canonical" href="http://www.yerkirmedia.am/?id=<?=

    $ip

?>"/>-->







<?

} else
{

?>







<meta property="og:title" content="Yerkirmedia TV" /> 







<meta property="og:type" content="article">







<meta property="og:url" content="http://www.yerkirmedia.am/">







<meta property="og:site_name" content="Yerkir Media">







<meta property="og:image" content="http://www.yerkirmedia.am/ym.jpg" />







<meta property="og:description" content="Երկիր Մեդիա հեռուստաընկերություն" />







<link rel="image_src" href="/ym.jpg" />







	







<?

}

?>







<meta name="robots" content="index,follow" />







<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>







<script type="text/javascript" src="js/jquery.rating.js"></script>







<script type="text/javascript" src="js/jquery.MetaData.js"></script>







<script type="text/javascript" src="js/niceforms.js"></script>







<script type="text/javascript" src="js/accordion.js"></script>







<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>







<script type="text/javascript" src="js/main.js"></script>







<script type="text/javascript" src="js/JsHttpRequest.js"></script>















<script src="js/jquery.swfobject.1-1-1.min.js"></script>







<script src="js/youTubeEmbed/youTubeEmbed-jquery-1.0.js"></script>















<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>















<?

if ( ! $act && ! $id )
{

?>







<script type="text/javascript">







    $(window).load(function() {







         setTimeout('fade123()', 4000);







    });

	var TN_counter = 2;



	function fade123() {

		$(".img_123").fadeOut("slow");

		$(".h2_123").css("opacity","1");

		setTimeout($("#img_"+TN_counter).fadeIn("slow"), 100);

		setTimeout($("#h2_"+TN_counter).fadeTo("slow", 0.55), 100);

		if(TN_counter==1) {

			$("#TopN_IM_content").css("background-position","0 0");

		} else if (TN_counter==2) {

			$("#TopN_IM_content").css("background-position","0 80px");

		} else if(TN_counter==3) {

			$("#TopN_IM_content").css("background-position","0 160px");

		}

		TN_counter = TN_counter + 1;

		if(TN_counter>3) TN_counter = 1;

		setTimeout('fade123()', 4000);

	}

</script>

<?

}

?>















<script type="text/javascript">







    $(window).load(function() {







        $('#slider').nivoSlider();







    });















    $(window).load(function() {







        $('#gorcynkerner_1').nivoSlider();







    });















    $(window).load(function() {







        $('#hatuk_txtakic').nivoSlider();







    });















    $(window).load(function() {







        $('#films').nivoSlider();







    });



	$(window).load(function() {







        $('#news_feed_b').nivoSlider();







    });















    $(window).load(function() {







        $('#after_top_b').nivoSlider();







    });







    







</script>























<?

if ( $act == 'pages' && $id == 44 )
{


    $resh = mysql_query( "SELECT * FROM `serv_videos` Order by id desc LIMIT 1" ) ;


    $v_url = @mysql_result( $resh, 0, "v_url" ) ;

?>







<script type="text/javascript">







							  $(document).ready(function(){







					              document.getElementById('player').innerHTML = '';







								  $('#player').youTubeEmbed({







											video			: '<?=

    $v_url

?>',







											width			: 207,







											progressBar	: false		







												}); return false;







							  });







</script>







<?

}

?>















<link rel="stylesheet" href="s/nivo-slider.css" type="text/css" media="screen" />















<style>







	div.asVideoDiv{







		position:absolute;height:70px;margin:-70px 0 0 4px;width:200px;background:#e4e4e4;overflow:hidden;







	}







	div.asVideoDiv a:link{







		width:196px;margin:auto;display:block;color:#000;				







	}















	td.gsc-search-button input{







		margin: 0px !important;







		border: 0px !important;







		padding: 3px !important;







		background: #ff7c00 !important;







		width: 13px !important;







		height: 13px !important;







	}







	td.gsc-search-button input:hover{







		background:#ec5e00 !important;







	}







  	.gsc-input-box{







		height:22px !important;







		border-left:1px solid #D9D9D9 !important;







		border-right:0px !important;







		border-top:0px !important;







		border-bottom:0px !important;







	}







	.gsc-search-box-tools .gsc-search-box .gsc-input{







		font-size:11px !important;







	}







	.gsc-search-box, td.gsc-input{







		margin:0px !important;







		padding:0px !important;







		height:20px !important;







	}







	td.gsib_a{







		margin:0px;







		padding:0 2px;







	}







	div.asSearchDiv{







		width:200px;







		height:22px;







		overflow:hidden;







	}







	div.gsc-control-cse, form.gsc-search-box{







		padding:0px;







		margin:0px;







		border:0px;







	}
#top .video_screenshots .carousel-wrap {
    width: 835px;
    margin: 0 auto;
    }

</style>
<title><?=

$ym_title

?> <?=

$yerkir_media

?></title>














</head>







<body>















<!--HEADER START-->







<div id="header" style="margin-top:5px;">







<a href="/<?

if ( $lan == "en" )
    echo "?lan=en" ;

?>" id="logo"><img src='s/i/logo<?=

$lan

?>.png' title='<?=

$yerkir_media

?>' alt='<?=

$yerkir_media

?>' style='border:0px;' /></a>







<pre align="right">



<embed src="viva_cell.swf" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" width="688px" height="131px">





<!--<a href="http://www.vbet.com/#/" >







<img src="s/i/vivarobet.jpg" height="130px" width="300px"></a>







<img src="s/i/arbanyakayin.jpg" height="130px" width="300px"></pre>-->







<div id="top_b">















	<!--<?

$resh_banners = mysql_query( "SELECT * FROM `banners` WHERE `b_type`='1' ORDER BY id LIMIT 3" ) ;


$count_banners = @mysql_num_rows( $resh_banners ) ;


if ( $count_banners )
{


    $count = $count_banners - 1 ;


    $i = rand( 0, $count ) ;


    $b_pic = mysql_result( $resh_banners, $i, "b_pic" ) ;


    $b_link = mysql_result( $resh_banners, $i, "b_link" ) ;


    if ( $b_link )
        echo "<a href='$b_link'>" ;


    if ( $b_pic )
        echo "<img src='userfiles/$b_pic' alt='' />" ;


    if ( $b_link )
        echo "</a>" ;


}

?> -->







</div>







</div>







<!--HEADER END-->















<!--MENU START-->



<div id="menu">



	<ul>



		<li><a href="/mobile/" target='_blank' id="menu_WAP">Mobile</a></li>



		<?

echo "<li><a href='/' class='menu'" ;


if ( ! $act == "pages" )
    echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;


echo "><img style='border:0px;margin-top:2px;' src='/s/i/home_menu_icon.png'></a></li>" ;


echo "<li><a href='?act=pages&amp;lan=$lan&amp;id=3' class='menu'" ;


if ( isset( $id ) && $id == 3 && $act == "pages" )
    echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;


echo ">" . $_LANG[2][$lan] . "</a></li>" ;


if ( $lan == "hy" )
{

?>



			<li><a href='?act=ether' class='menu' <?

    if ( $act == "ether" )
        echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;

?>>Ծրագիր</a></li>



			<li><a href='?act=films' class='menu' <?

    if ( $act == "films" )
        echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;

?>>Ֆիլմեր</a></li>



		<?

}


echo "<li><a href='?act=pages&amp;lan=$lan&amp;id=4' class='menu'" ;


if ( isset( $id ) && $id == 4 && $act == "pages" )
    echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;


echo ">" . $_LANG[6][$lan] . "</a></li>" ;


echo "<li><a href='?act=pages&amp;lan=$lan&amp;id=2' class='menu'" ;


if ( isset( $id ) && $id == 2 && $act == "pages" )
    echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;


echo ">" . $_LANG[7][$lan] . "</a></li>" ;


echo "<li><a href='?act=pages&amp;lan=$lan&amp;id=5' class='menu'" ;


if ( isset( $id ) && $id == 5 && $act == "pages" )
    echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;


echo ">" . $_LANG[8][$lan] . "</a></li>" ;


$count = 0 ;


for ( $i = 0; $i < $count; $i++ )
{


    $id_r = mysql_result( $resh, $i, "id" ) ;


    $r_title_arm_r = mysql_result( $resh, $i, "r_title_hy" ) ;


    echo "<li><a href='?act=pages&amp;lan=$lan&amp;id=$id_r' class='menu' " ;


    if ( isset( $id ) && $id == $id_r && $act == "pages" )
        echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;


    echo ">" . $r_title_arm_r . "</a></li>" ;


    if ( $i == 2 )
    {

?>



				<li><a href='?act=films' class='menu' <?

        if ( $act == "films" )
            echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;

?>>Ֆիլմեր</a></li>



				<li><a href='?act=ether' class='menu' <?

        if ( $act == "ether" )
            echo "style='background-color:#ff7c02;color:#000;text-decoration:none;'" ;

?>>Ծրագիր</a></li>



				<?

    }


}

?>







		



		<!-- <li><span class="inactive">Բլոգ</span></li> -->



		<style>



		.newmenu{



			position:absolute;



		}



		#li2{



			top:30px;



			z-index:1000;



			width:110px;



		}



		#li1{



			z-index:1000;



			width:110px;



			border-bottom:#ff7c02 solid 1px;



		}



		.newcolor{



			background-color:#fff !important;



			line-height:25px !important;



		}



		</style>



		<!-- AM-->

	<?

if ( $lan == "hy" )
{

?>

		<li id="menu_archive" style="width:65px"><a class='menu' href="#" target='_blank'>Արխիվ</a>



			<ul id="menu_archive_list" class="newmenu">



				<li id="li1" class="newmenu"><a class='newcolor menu' href="?act=archive_programs" target='_blank'>հաղորդումներ</a></li>



				<li id="li2" class="newmenu"><a class='newcolor menu' href="?act=archive_news" target='_blank' >լուրեր</a></li>



			</ul>



		</li>

			<?

}

?>

		<li>



			<!-- <div class="asSearchDiv"><script>



				  (function() {



					var cx = '006178856606366791676:7kszill7vq0';



					var gcse = document.createElement('script');



					gcse.type = 'text/javascript';



					gcse.async = true;



					gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +



						'//www.google.com/cse/cse.js?cx=' + cx;



					var s = document.getElementsByTagName('script')[0];



					s.parentNode.insertBefore(gcse, s);



				  })();



				</script>



				<gcse:search></gcse:search></div> -->



			<form>



				<input type='hidden' name='act' value='search' />



				<span style="width:140px; padding:0 5px; background:none" class="search">



					<input  type="text" id="search" name='w' value="<?=

$_LANG[9][$lan]

?>" onfocus="hideInp(this,'<?=

$_LANG[9][$lan]

?>')" />



					<input style="margin:-19px 0px 0px 126px;" type="submit" value="&nbsp;" id="search_button" />



				</span>



			</form>



		</li>



        <li style="float:right; margin-right:9px;">

        <? if ( $lan == "en" ){?>
            <a href='http://www.yerkirmedia.am/en_rss.xml' target='_blank'>
            <img src='s/i/rssIcon.jpg' alt='' style='border:0px;margin:2px;width:18px;'></a>
        <?

		} elseif ( $lan == "ru" ){?>
            <a href='http://www.yerkirmedia.am/ru_rss.xml' target='_blank'>
            <img src='s/i/rssIcon.jpg' alt='' style='border:0px;margin:2px;width:18px;'></a>
        <?

		} else{?>
            <a href='http://www.yerkirmedia.am/rss.xml' target='_blank'>
            <img src='s/i/rssIcon.jpg' alt='' style='border:0px;margin:2px;width:18px;'></a>
        <? } ?>

        </li>



	   <li  style="float:right; padding-right:7px;">



		<span class='lang' style='float:left;  padding:0 4px 0 4px; background:none' ><a href="?lan=hy" <?

if ( $lan == "hy" )
    echo " class='active'" ;

?>>Հայ</a></span>



		<span class='lang' style='float:left;  padding:0 4px 0 4px;'><a href="?lan=ru" <?

if ( $lan == "ru" )
    echo " class='active'" ;

?>>Рус</a></span>



		<span class='lang' style='float:left;  padding:0 4px 0 4px;'> <a href="?lan=en" <?

if ( $lan == "en" )
    echo " class='active'" ;

?>>Eng</a></span></li>



		



       



		



		



	</ul>



		



	







</div>



<!--MENU END-->















<!--CRAWL LINE START-->















<div id="crawl">







<?

$resh = mysql_query( "SELECT * FROM `vazox_tox` WHERE `id` = 1" ) ;


$i = 0 ;


$m_text_1 = mysql_result( $resh, $i, "text_1_$lan" ) ;


$m_link_1 = mysql_result( $resh, $i, "link_1_$lan" ) ;


$m_text_2 = mysql_result( $resh, $i, "text_2_$lan" ) ;


$m_link_2 = mysql_result( $resh, $i, "link_2_$lan" ) ;


$m_text_3 = mysql_result( $resh, $i, "text_3_$lan" ) ;


$m_link_3 = mysql_result( $resh, $i, "link_3_$lan" ) ;


$m_text_4 = mysql_result( $resh, $i, "text_4_$lan" ) ;


$m_link_4 = mysql_result( $resh, $i, "link_4_$lan" ) ;


$m_text_5 = mysql_result( $resh, $i, "text_5_$lan" ) ;


$m_link_5 = mysql_result( $resh, $i, "link_5_$lan" ) ;


if ( $m_text_1 )
{
    if ( $m_link_1 )
        echo "<a href='$m_link_1'>$m_text_1</a>" ;
    else
        echo "<span style='padding-right:50px;'>$m_text_1</span>" ;
}


if ( $m_text_2 )
{
    if ( $m_link_2 )
        echo "<a href='$m_link_2'>$m_text_2</a>" ;
    else
        echo "<span style='padding-right:50px;'>$m_text_2</span>" ;
}


if ( $m_text_3 )
{
    if ( $m_link_3 )
        echo "<a href='$m_link_3'>$m_text_3</a>" ;
    else
        echo "<span style='padding-right:50px;'>$m_text_3</span>" ;
}


if ( $m_text_4 )
{
    if ( $m_link_4 )
        echo "<a href='$m_link_4'>$m_text_4</a>" ;
    else
        echo "<span style='padding-right:50px;'>$m_text_4</span>" ;
}


if ( $m_text_5 )
{
    if ( $m_link_5 )
        echo "<a href='$m_link_5'>$m_text_5</a>" ;
    else
        echo "<span style='padding-right:50px;'>$m_text_5</span>" ;
}

?>







</div>







<!--CRAWL LINE END-->















<!--BODY START-->







<div id="body">















	<!--LEFT BLOCK START-->







	<div id="left">















		<!--SATELITE START-->







		<!-- <div class="header">







			<h2><?=

$_LANG[0][$lan]

?></h2>







		</div>







		<div id="satelite">







			<h3>Satellite - HOTBIRD 6  13</h3>







			<p>Frequency - 11585 Mhz  Polarization - Vertical</p>







			<p>S/R - 27500 FEC - 3/4</p>







		</div> -->







		<!--SATELITE START-->















		<!-- <div class="separator"></div> -->















		







		<!--LIVE STREAM START-->
		<div class="header">
			<h2><?=$_LANG[1][$lan]?></h2> 
		</div>
	<div id="live_stream">
<!--		<iframe width="276" height="167" src="http://cdn.livestream.com/embed/yerkirmedia?layout=4&amp;autoplay=false" style="border:0;outline:0" frameborder="0" scrolling="no"></iframe>
-->		
 	<iframe width="276" height="167" src="http://cdn.livestream.com/embed/yerkirmedia?layout=4&amp;autoplay=false" style="border:0;outline:0" frameborder="0" scrolling="no"></iframe>

     <!--<a href="?act=online"><img src="s/i/live_stream.png" alt="Ուղիղ եթեր" /></a> -->
	</div>
<!--LIVE STREAM END-->
		<div class="">
			<!-- widget start -->
	<!--	<iframe width="276" height="286" src="/inlobby.php" style="border:0;outline:0" frameborder="0" scrolling="no"></iframe>			
			<!-- widget end -->
				<a href="https://www.youtube.com/watch?v=BHwb_aGfEs8&list=PLffuHBHoz5dp8TEZG6p0rQ_yoD7ViggSP&index=1" style="background-color:white;">
                <img src="eluyt.jpg" width="275px"></a>
				<a href="http://aparaj.am/" style="background-color:white;">
                <img src="userfiles/27.03.15-691aparaj.jpg" width="275px"></a>
		</div>

		
		


		
		
<?
if ( $lan == "hy" )
{


    $resultt = mysql_query( "SELECT * FROM `n_conf`" ) or die( mysql_error() ) ;


    $roww = mysql_fetch_array( $resultt ) ;


    if ( $roww['question'] == 1 )
    {

?>







		<!--POLL START-->







		<div class="header">







			<h2>Հարցում</h2><img src='s/i/loading.gif' style='display:none;' />







		</div>







		<div id="poll">







		<?

        $resh = mysql_query( "SELECT * FROM `ym_poll_q` ORDER BY id desc LIMIT 1" ) ;


        $id_q = mysql_result( $resh, 0, "id" ) ;


        $poll_q = mysql_result( $resh, 0, "poll_q" ) ;


        if ( $_SESSION['ym_poll'] == $id_q || $_COOKIE['ym_poll'] == $id_q )
        {


            if ( ! $_COOKIE['ym_poll'] )
                $_COOKIE['ym_poll'] = $id_q ;


            $GLOBALS = "<div class='q'>$poll_q</div><div class='a'><ul>" ;


            $resh = mysql_query( "SELECT * FROM `ym_poll_a` WHERE `q_id` = '" . $id_q .
                "' AND `poll_a` != ''  ORDER by `id` " ) ;


            $count = @mysql_num_rows( $resh ) ;


            $sum = 0 ;


            for ( $i = 0; $i < $count; $i++ )
            {


                $poll_a_v = mysql_result( $resh, $i, "poll_a_v" ) ;


                $sum += $poll_a_v ;


            }


            for ( $i = 0; $i < $count; $i++ )
            {


                $id_a = mysql_result( $resh, $i, "id" ) ;


                $poll_a = mysql_result( $resh, $i, "poll_a" ) ;


                $poll_a_v = mysql_result( $resh, $i, "poll_a_v" ) ;


                $width = intval( 2.2 * $poll_a_v / $sum * 100 ) ;


                $tok = $poll_a_v / $sum * 100 ;


                $tok = sprintf( "%.2f", $tok ) ;


                $GLOBALS .= "<li><label>" . $poll_a . " <span style='font-size:9px;'>(" . $tok .
                    "%, " . $poll_a_v . " անգամ)</span></label><br /><p style='width:" . $width .
                    "px;height:8px;background:url(s/i/background_orange.png)'></p></li>" ;


            }


            $GLOBALS .= "</ul><br />







		<a href='?act=polls'>Դիտել նախորդ հարցումները</a><br /><br />







		</div>" ;


            echo $GLOBALS ;


        } else
        {

?>







			<div class="q">







			<?=

            $poll_q

?>







			</div>







			<div class="a"><form name='pollform'>







				<ul>







				<?

            $resh = mysql_query( "SELECT * FROM `ym_poll_a` WHERE `q_id` = '" . $id_q .
                "' AND `poll_a` != ''  ORDER by `id` " ) ;


            $count = @mysql_num_rows( $resh ) ;


            for ( $i = 0; $i < $count; $i++ )
            {


                $id_a = mysql_result( $resh, $i, "id" ) ;


                $poll_a = mysql_result( $resh, $i, "poll_a" ) ;


                echo "<li><label><input type='radio' name='poll_a' value='" . $id_a . "' /> " .
                    $poll_a . "</label></li>" ;


            }

?>







				</ul><br /><input type='hidden' id='poll_in' value='' /></form>







			</div>







			<!-- <div class="captcha">







				<img src="s/i/rand.png" alt="" />







				<input type="text" name="captcha" />







			</div> -->







			<div class="button">







				<input type="submit" value="< Քվեարկել >" onmouseover="this.style.backgroundColor='#aaaaaa'; return false;" onclick="dopoll();" onmouseout="this.style.backgroundColor='#CCCCCC'"/>







			</div>







		<?

        }

?>















		</div>







        <?

    }

?>







		<!--POLL END-->







		







		







		<!--YERKRI HARC START-->







		<div class="header">

			<h2>Երկրի հարցը</h2>

		</div>
		<div id="yerkri_harc">
		<?

    $resh = mysql_query( "SELECT * FROM `e_harc_videos` ORDER BY `id` desc LIMIT 1" ) ;
    $v_eter = mysql_result( $resh, 0, "v_eter" ) ;
    $v_name = mysql_result( $resh, 0, "v_name" ) ;


    $v_desc = mysql_result( $resh, 0, "v_desc" ) ;

?>















			<div id='yh_top'>&nbsp;&nbsp;<?=

    $v_eter

?></div>







			<a href='?act=yerkir'><img src="s/i/yerkri_harc.png" alt="Երկրի հարցը" style='border:0px;' /></a>







			







			







			<div id='yh_marquee'><marquee scrollamount='3'><?=

    $v_desc

?></marquee></div>







            <?=

    $v_name

?>







		</div>







		<!--YERKRI HARC END-->







		<?

}

?>























		<!--GORCYNKERNER 1 START-->

<div id="gorcynkerner_11">

			<?

$resh_banners = mysql_query( "SELECT * FROM `banners` WHERE `id`=126" ) ;

$count_banners = @mysql_num_rows( $resh_banners ) ;

for ( $i = 0; $i < $count_banners; $i++ )
{

    $b_pic_1 = mysql_result( $resh_banners, $i, "b_pic" ) ;

    $b_link_1 = mysql_result( $resh_banners, $i, "b_link" ) ;

    if ( $b_pic_1 )
        echo "<a href='$b_link_1' target='_blank'><img src='userfiles/$b_pic_1' alt='' style='border:0px;width:276px;'/></a>" ;

}

?>

</div>
		
		
		<!-- ankexc asac -->
		<div class="header">
		<h2><a class="ankexcAsacA" href="?act=cat&lan=<?=$lan?>&id=21"><?=$programslist['6']?></a></h2>
		</div>
		<div>
		<?

$resh_ank = mysql_query( "SELECT * FROM `records` WHERE `r_category` = 21 AND `r_show_" .
    $lan . "` > 0 Order by `r_ord` desc LIMIT 2" ) ;


$count_ank = @mysql_num_rows( $resh_ank ) ;


for ( $ii = 0; $ii < $count_ank; $ii++ )
{
    $r_id_ank = mysql_result( $resh_ank, $ii, "id" ) ;
    $r_title_ank = mysql_result( $resh_ank, $ii, "r_title_$lan" ) ;
    $r_date_ank = mysql_result( $resh_ank, $ii, "r_date" ) ;
    $r_short_ank = mysql_result( $resh_ank, $ii, "r_short_$lan" ) ;

?>
<div class="ankAsacDiv">
	<h3 class="ankAsacH3"><a href="?act=news&amp;lan=<?=$lan?>&amp;id=<?= $r_id_ank?>"><?=$r_title_ank?></a></h3>
								<p><?=$r_short_ank?></p>
								<p><nobr class='p_time'><?=  $r_date_ank?></nobr></p>
</div>
<?

}

?>
</div>
<!-- end -->
<div id="gorcynkerner_11">

			<?

$resh_banners = mysql_query( "SELECT * FROM `banners` WHERE  `id`=121 " ) ;

$count_banners = @mysql_num_rows( $resh_banners ) ;

for ( $i = 0; $i < $count_banners; $i++ )
{

    $b_pic_1 = mysql_result( $resh_banners, $i, "b_pic" ) ;

    $b_link_1 = mysql_result( $resh_banners, $i, "b_link" ) ;

    if ( $b_pic_1 )
        echo "<a href='$b_link_1' target='_blank'><img src='userfiles/$b_pic_1' alt='' style='border:0px;width:276px;'/></a>" ;

}

?>

		<a href="https://www.youtube.com/watch?v=lPYUZ2SGmns&list=PLffuHBHoz5doNbdBGpAL2mNO8kCKoJE7e" style="background-color:white;"><img src="yerkirmedia10.jpg" width="275px"></a>

</div>




		<!-- <div class="header">
			<h2>Մեր գործընկերներից</h2>
		</div> -->

		<div class="header">

			<h2><?

if ( $lan == "hy" )
    echo "Տեղեկատվական այլ կայքեր" ;

elseif ( $lan == "ru" )
    echo "Другие информационные сайты" ;

else
    echo "Other news sites" ;

?>

            </h2>

		</div>

		

        <div class='gorcynkerner_1'>

			<iframe id="frameNews" src="/frameNews/index.php?l=<?=$lan?>" name="frameName"  style="width:276px;height:280px;overflow:hidden;" frameBorder='0'></iframe>

		</div>

<div id="gorcynkerner_1">

			<?

$resh_banners = mysql_query( "SELECT * FROM `banners` WHERE `id`=82 OR `id`=104" ) ;

$count_banners = @mysql_num_rows( $resh_banners ) ;

for ( $i = 0; $i < $count_banners; $i++ )
{

    $b_pic_1 = mysql_result( $resh_banners, $i, "b_pic" ) ;

    $b_link_1 = mysql_result( $resh_banners, $i, "b_link" ) ;

    if ( $b_pic_1 )
        echo "<a href='$b_link_1' target='_blank'><img src='userfiles/$b_pic_1' alt='' style='border:0px;width:276px;'/></a>" ;

}

?>

		</div>















		<div id="gorcynkerner_2">







		<?

$resh_banners_14 = mysql_query( "SELECT * FROM `banners` WHERE `b_type`=4 AND `id`!=82 AND `id`!=126 AND `id`!=121  ORDER BY id" ) ;

$count_banners_14 = @mysql_num_rows( $resh_banners_14 ) ;

for ( $i = 0; $i < $count_banners_14; $i++ )
{

    $b_type_b = mysql_result( $resh_banners_14, $i, "b_type" ) ;

    $b_pic_1 = mysql_result( $resh_banners_14, $i, "b_pic" ) ;

    $b_link_1 = mysql_result( $resh_banners_14, $i, "b_link" ) ;

    if ( $b_pic_1 )
    {

        echo "<a href='$b_link_1'><img src='userfiles/$b_pic_1' alt='' style='border:0px;width:276px;'/></a>" ;

        //$breakfor = 1;

    }
}

?>

		    



		</div>

		<!--<div class='gorcynkerner_1'>

		  <embed width="276" height="230" name="plugin" src="s/i/tsovasar1(3).swf" type="application/x-shockwave-flash">

		</div>-->

		<!--GORCYNKERNER 1 END-->



	

		<!--PROGRAMS LIST START-->

		<div class="header">

			<h2><?=

$_LANG[2][$lan]

?></h2>

		</div>

		<div id="programs">

		<?

$resh = mysql_query( "SELECT * FROM `haxordumner`   ORDER BY id " ) ;

$count = @mysql_num_rows( $resh ) ;


for ( $j = 0; $j < 6; $j++ )
{


    echo "<div class=\"btn\">" . $programslist[$j] . "</div>" ;


    echo "<div class=\"content\">" ;


    for ( $i = 0; $i < $count; $i++ )
    {


        $id_h = mysql_result( $resh, $i, "id" ) ;


        $h_nkar = mysql_result( $resh, $i, "h_nkar" ) ;


        $h_name = mysql_result( $resh, $i, "h_name_$lan" ) ;


        $h_text = mysql_result( $resh, $i, "h_text_$lan" ) ;


        $h_bajin = mysql_result( $resh, $i, "h_bajin" ) ;


        if ( $id_h == "5" )
            $href = "?act=yerkir" ;
        else
            $href = "?lan=$lan&act=prog&id=$id_h" ;


        if ( $h_bajin == $j )
            echo "<a href='" . $href . "'><img src='userfiles/" . $h_nkar . "' title='" . $h_name .
                "' alt='" . $h_name .
                "' style='width:300px;border:0px;' usemap='' alt=''/></a><p style='margin-bottom:5px;padding-left:3px;padding-right:3px;'>'" .
                $h_name . "' - " . $h_text . "<a href='" . $href . "' class='video'></a></p>" ;


    }


    echo "</div>" ;


}

?>















		</div>







		<!--PROGRAMS LIST END-->







		<div style="clear:both;margin-top:5px;">

			<embed width="276" height="36" wmode="transparent" name="plugin" src="/s/i/02.02.12.swf" type="application/x-shockwave-flash">

		</div>



		<!--<div style="clear:both;margin-top:5px;">

			<embed width="276" height="101" wmode="transparent" name="plugin" src="/s/i/anitour_yerkir_media.swf" type="application/x-shockwave-flash">

		</div>-->







		<?php

/*?><div style="clear:both;margin-top:5px;">







<a href="http://www.youtube.com/channel/UCk71QAE_f8vVZO1haBHvb0A" target="_blank"><img src="s/i/haydzmerpap.jpg" alt='' border="0"/></a>







</div><?php */

?>







		<?

if ( $lan == "hy" )
{

?>







		<!--HATUK TXTAKIC START







		<div class="header">







			<h2>Հատուկ թղթակից</h2>







		</div>-->







		







		<div id="hatuk_txtakic" style='overflow:hidden;height:122px;display:none;'>







		<?

    /*







    $resh = mysql_query("SELECT * FROM `hatuk_txtakic` ORDER BY `id` desc");







    $count = @mysql_num_rows($resh);







    







    for($i=0;$i<$count;$i++){







    $h_nkar = mysql_result($resh, $i, "h_nkar");







    echo"<a href='?act=spec'><img src='userfiles/".$h_nkar."' alt='Երկրի հարցը' style='border:0px;width:276px;' width='276'/></a>";







    }







    */

?>







		</div>







			







		<!--HATUK TXTAKIC END-->







		<?

}

?>























		















		<?

if ( $lan == "hy" )
{

?>







		<!--FILM START-->







		<!-- <div class="header">







			<h2>Ֆիլմեր</h2>







		</div>







		<div id="films" style='overflow:hidden;height:122px;'>







		<?

    $resh_h = mysql_query( "SELECT * FROM `filmer` Order by id LIMIT 20" ) ;


    $count_h = @mysql_num_rows( $resh_h ) ;


    for ( $i = 0; $i < $count_h; $i++ )
    {


        $f_nkar_b = mysql_result( $resh_h, $i, "f_nkar" ) ;

?>







			<a href='?act=films'><img src="userfiles/<?=

        $f_nkar_b

?>" alt="Ցուցադրվելիք ֆիլմերը" style='border:0px;width:276px;' width='276'/></a>







			<?

    }

?>















		</div> -->







		<!--FILM END-->







		<?

}

?>















		<?

if ( $lan == "hy" )
{

?>







		<!--CURRENCY AND WEATHER START-->







		<!-- <div class="header">







			<h2>Փոխարժեք</h2>







		</div> -->







		<div id="curency">







			<!-- <ul>







				<li><b>USD</b> <i><?=

    $_SESSION['USD']

?></i> <img src="s/i/cur_down.png" alt="" /></li>







				<li class="even"><b>EUR</b> <i><?=

    $_SESSION['EUR']

?></i></li>







				<li><b>RUR</b> <i><?=

    $_SESSION['RUR']

?></i></li>







			</ul> -->















			<!-- <div class="header noborder">







				<h2>Եղանակը Երևանում</h2>







			</div>







			<div id="weather">







				<script type="text/javascript" src="http://weather.copypaste.am/widget.php?width=276&height=92&BGCOLOR=FFFFFF&BGCOLORDAY=f6f6ee&BGCOLORNIGHT=ebebeb&title=0"></script>







			</div> -->















		</div>







		<!--CURRENCY AND WEATHER START-->







		<?

}

?>















		<!-- BizNet -->		







		<?

if ( $lan == "hy" )
{

?>

		<?php

    /*?><div id="BizNet" style='margin:6px 0px;height:94px;overflow:hidden;'>

    <a href='http://www.biznet.am' title='Վեբ կայքերի պատրաստում' alt='Ինտերնետ մարկետինգ' target='_blank'><img src='s/i/biznet_1.png' alt='Վեբ կայքերի պատրաստում' /></a>

    <a href='http://www.biznet.am' title='Վեբ կայքերի պատրաստում' alt='Ինտերնետ մարկետինգ' target='_blank'><img src='s/i/biznet_2.png' alt='Կայքերի առաջխաղացում' /></a>

    <a href='http://www.biznet.am' title='Վեբ կայքերի պատրաստում' alt='Ինտերնետ մարկետինգ' target='_blank'><img src='s/i/biznet_3.png' alt='Ինտերնետ մարկետինգ' /></a>

    </div><?php */

?>

		<?

}

?>

		<!--FB like START-->







		<div class="header">







			<h2><?=

$_LANG[3][$lan]

?></h2>







		</div>







		<div id='fb_like'>







		<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FYerkir-Media%2F309735964196&amp;width=276&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:276px; height:260px;margin-top:-1px;" allowTransparency="false"></iframe>







		 <!-- <a href='http://www.facebook.com/group.php?gid=311013308403' target='_blank' rel='nofollow'><img src='s/i/facebook_grup.png' style='margin:0px;border:0px;width:268px' /></a> -->







		</div>







		<!--FB like  END-->







		<?

if ( empty( $act ) )
{

?>







		<!-- AddThis Button BEGIN -->







				<div class="addthis_toolbox addthis_default_style" style='margin-top:13px;'>







				   <a class="addthis_button_facebook"></a> 







				   <a class="addthis_button_twitter"></a> 







				   <a class="addthis_button_vk"></a> 







				   <a class="addthis_button_yahoobkm"></a> 







				   <a class="addthis_button_favorites"></a> 







				   <a class="addthis_button_mymailru"></a> 







				   <a class="addthis_button_compact"></a> 







				<a class="addthis_counter addthis_bubble_style"></a>







				</div>







				<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>







				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=narekmarkosyan"></script>







		<!-- AddThis Button END -->







		<?

}

?>















	</div>







	<!--LEFT BLOCK END-->















	<!--RIGHT BLOCK START-->







	<div id="right">







		<!--SUPER TOP START-->















		<?

if ( ! $act && ! $id )
{


    echo '<div id="supertop" style="background:#e9e9e9;">' ;


    $resh = mysql_query( "SELECT * FROM `records` WHERE `r_category` > 0 AND `r_top` = 1 AND `r_show_$lan` = 1 Order by `r_ord` desc LIMIT 3 " ) ;


    $r_id_r_1 = mysql_result( $resh, 0, "id" ) ;


    $r_pic_r_1 = mysql_result( $resh, 0, "r_pic" ) ;


    $r_title_r_1 = mysql_result( $resh, 0, "r_title_$lan" ) ;


    $r_video_r_1 = mysql_result( $resh, 0, "r_video_$lan" ) ;


    $r_date_r_1 = mysql_result( $resh, 0, "r_date" ) ;


    $r_id_r_2 = mysql_result( $resh, 1, "id" ) ;


    $r_pic_r_2 = mysql_result( $resh, 1, "r_pic" ) ;


    $r_title_r_2 = mysql_result( $resh, 1, "r_title_$lan" ) ;


    $r_video_r_2 = mysql_result( $resh, 1, "r_video_$lan" ) ;


    $r_date_r_2 = mysql_result( $resh, 1, "r_date" ) ;


    $r_id_r_3 = mysql_result( $resh, 2, "id" ) ;


    $r_pic_r_3 = mysql_result( $resh, 2, "r_pic" ) ;


    $r_title_r_3 = mysql_result( $resh, 2, "r_title_$lan" ) ;


    $r_video_r_3 = mysql_result( $resh, 2, "r_video_$lan" ) ;


    $r_date_r_3 = mysql_result( $resh, 2, "r_date" ) ;

?>







		







			<div id="TopN_IM">







				<img src="userfiles/<?=

    $r_pic_r_1

?>" style="width:300px;" id="img_1" class="img_123"/>







				<img src="userfiles/<?=

    $r_pic_r_2

?>" style="width:300px;display:none;" id="img_2" class="img_123"/>







				<img src="userfiles/<?=

    $r_pic_r_3

?>" style="width:300px;display:none;" id="img_3" class="img_123"/>







			</div>















			<div id="TopN_IM_content" style="height:240px;">















				<div class="short_TopN">







					<h2 class="h2_123" id="h2_1" style="opacity:0.55;"><a href="?act=news&amp;lan=<?=

    $lan

?>&amp;id=<?=

    $r_id_r_1

?>" style="font-size:14px;"><?=

    $r_title_r_1

?></a></h2>







					<p class="TopN_p"><span class='p_time'><?=

    $r_date_r_1

?></span> <?

    if ( $r_video_r_1 )
    {

?><a href="?act=news&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $r_id_r_1

?>#video" class="video"></a><?

    }

?></p>







				</div>















				<div class="short_TopN">







					<h2 class="h2_123" id="h2_2"><a href="?act=news&amp;lan=<?=

    $lan

?>&amp;id=<?=

    $r_id_r_2

?>" style="font-size:14px;"><?=

    $r_title_r_2

?></a></h2>







					<p class="TopN_p"><span class='p_time'><?=

    $r_date_r_2

?></span> <?

    if ( $r_video_r_2 )
    {

?><a href="?act=news&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $r_id_r_2

?>#video" class="video"></a><?

    }

?></p>







				</div>







				<div class="short_TopN" style="height:76px;">







					<h2 class="h2_123" id="h2_3"><a href="?act=news&amp;lan=<?=

    $lan

?>&amp;id=<?=

    $r_id_r_3

?>" style="font-size:14px;"><?=

    $r_title_r_3

?></a></h2>







					<p class="TopN_p"><span class='p_time'><?=

    $r_date_r_3

?></span> <?

    if ( $r_video_r_3 )
    {

?><a href="?act=news&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $r_id_r_3

?>#video" class="video"></a><?

    }

?></p>







				</div>















			</div>























		</div>







		<!--SUPER TOP END-->















		<!--TOP START-->














<!--FREE SPACE-->



		
<!--END OF FREE SPACE-->
		<?

} elseif ( $act == "archive_programs" )
{


    $resh = mysql_query( "SELECT * FROM `records` WHERE `r_category` = '0' AND `id` = '" .
        $id . "' " ) ;


    $r_title_r = mysql_result( $resh, 0, "r_title_$lan" ) ;


    $r_text_r = mysql_result( $resh, 0, "r_text_$lan" ) ;


    $r_keywords_r = mysql_result( $resh, 0, "r_keywords_$lan" ) ;


    if ( $id == 4 )
    {
        $st = "style='background: url(s/i/Plazma.png) no-repeat top left;'" ;
    }


    if ( $r_text_r )
        echo "<div id='supertop' " . $st . ">" . $r_text_r . "<br /><br />" ;


    else
        echo "<div id=\"supertop\">" ;


    $resh_h = mysql_query( "SELECT * FROM `haxordumner` where  statuss='archive' Order by `id` " ) ;


    $count_h = @mysql_num_rows( $resh_h ) ;


    for ( $i = 0; $i < $count_h; $i++ )
    {


        $h_id_b = mysql_result( $resh_h, $i, "id" ) ;


        $h_nkar_b = mysql_result( $resh_h, $i, "h_nkar" ) ;


        $c_name_b = mysql_result( $resh_h, $i, "h_name_$lan" ) ;


        $c_text_b = mysql_result( $resh_h, $i, "h_text_$lan" ) ;


        $c_desc_b = mysql_result( $resh_h, $i, "h_desc_$lan" ) ;

?>







		







					<div class="haxordumner_top"><p><?=

        $c_name_b

?></p></div>







					<div class="image_h">







					<?

        if ( $h_nkar_b )
        {


            if ( $h_id_b == 5 )
                $actNN = "act=yerkir" ;


            else
                $actNN = "lan=" . $lan . "&act=prog&id=" . $h_id_b ;

?>







						<a href='?<?=

            $actNN

?>'><img src="userfiles/<?=

            $h_nkar_b

?>" alt="" style='border:0px;' usemap='' title="Դիտել '<?=

            $c_name_b

?>' հաղորդաշարի տեսգրությունները"/></a>







						







					<?

        }

?>







				







					</div>







					<!-- AM -->







					<div class="content_h">







						<p><?=

        $c_desc_b

?>  <a href='?<?=

        $actNN

?>' class='video'> դիտել </a></p>







					</div>







			







					<div style="clear:both;"></div>







					<br /><br /><br />







			







				<?

    }


} elseif ( $act == "archive_news" )
{

?>







				<div id="calendar_archive" style="width:230px; height:250px;" >







					<script type="text/javascript">







					getSelectedDate();







					</script>







				</div>







				







		<form method = 'get' id="archive_news_search" action='?'>







			<input type="hidden" value="archive_news" name="act" />







			<input type='hidden' name='news_day' value='' />







			<input type='hidden' name='news_month' value=''  /> 







			<input type='hidden' name='news_year' value=''  />







			<input type='submit' style='display:none;'>







		</form>







			<?

    if ( $_GET['news_day'] )
        $getDateNews = $_GET['news_day'] ;


    $getDateNews .= "." ;


    if ( $_GET['news_month'] )
        $getDateNews .= $_GET['news_month'] ;


    $getDateNews .= "." ;


    if ( $_GET['news_year'] )
        $getDateNews .= $_GET['news_year'] ;


    if ( $getDateNews == ".." )
        $getDateNews = '' ;


    $getDateNews = mysql_real_escape_string( str_replace( "..", ".%.", $getDateNews ) ) ;


    if ( $getDateNews )
        $querySearchNews = "SELECT * FROM `records` WHERE `r_show_$lan` = '1' AND `r_fullDate` LIKE '%" .
            $getDateNews . "%' Order by `r_ord` desc" ;


    if ( $querySearchNews )
        $resh = mysql_query( $querySearchNews ) ;


    $count = @mysql_num_rows( $resh ) ;


    if ( $getDateNews != '' )
    {

?>







			







			<div id="search_top" ><p>Արդյունքները</p></div>







			  <?

        if ( ! $count )
            echo "Փնտրման արդյունքը դատարկ է: <br/><br/>" ;


        for ( $i = 0; $i < $count; $i++ )
        {


            $r_id_r = mysql_result( $resh, $i, "id" ) ;


            $r_pic_r = mysql_result( $resh, $i, "r_pic" ) ;


            $r_title_r = mysql_result( $resh, $i, "r_title_$lan" ) ;


            $r_short_r = mysql_result( $resh, $i, "r_short_$lan" ) ;


            $r_date_r = mysql_result( $resh, $i, "r_date" ) ;

?>







				







					<div class="image_c">







						<?

            if ( $r_pic_r )
            {

?><img src="userfiles/<?=

                $r_pic_r

?>" alt="" /><?

            }

?>







					</div>







					<div class="content_c">







						<h2><a href="?act=news&amp;lan=<?=

            $lan

?>&amp;id=<?=

            $r_id_r

?>"><?=

            $r_title_r

?></a> 







						<?

            if ( $r_video_r )
            {

?><a href="?act=news&amp;lan=<?=

                $lan

?>&amp;id=<?=

                $r_id_r

?>" class="video"><?=

                $_LANG[4][$lan]

?></a><?

            }

?>







						</h2>







						<p><span class='p_time'><?=

            $r_date_r

?></span><br /><?=

            $r_short_r

?> <a href="?act=news&amp;lan=<?=

            $lan

?>&amp;id=<?=

            $r_id_r

?>"><?=

            $_LANG[5][$lan]

?></a></p>







					</div>







					<div style="clear:both;"></div>







					<br /><br /><br />

			  <?

        }

    }

?>



		

		<?

} elseif ( $act == "pages" && $id )
{


    $resh = mysql_query( "SELECT * FROM `records` WHERE `r_category` = '0' AND `id` = '" .
        $id . "' " ) ;


    $r_title_r = mysql_result( $resh, 0, "r_title_$lan" ) ;


    $r_text_r = mysql_result( $resh, 0, "r_text_$lan" ) ;


    $r_keywords_r = mysql_result( $resh, 0, "r_keywords_$lan" ) ;


    if ( $id == 4 )
    {
        $st = "style='background: url(s/i/Plazma.png) no-repeat top left;'" ;
    }


    if ( $r_text_r )
        echo "<div id='supertop' " . $st . ">" . $r_text_r . "<br /><br />" ;


    else
        echo "<div id=\"supertop\">" ;


    if ( $id == 4 )
    { //ծառայություններ


        echo "<div id='top' style='margin-top:5px;'>" ;


        echo "<div class='serv_top'><p>" . $_LANG[11][$lan] . "</p></div>" ;


        //echo"<div class='youtube_video_player'><div id=\"player\"></div></div>";


        echo "<div class='video_screenshots'>" ;


        //videoner


?>







				  <ul>







						







						















					<?

        $resh = mysql_query( "SELECT * FROM `serv_videos` Order by id desc" ) ;


        $count = @mysql_num_rows( $resh ) ;


        for ( $i = 0; $i < $count; $i++ )
        {


            $v_url = mysql_result( $resh, $i, "v_url" ) ;

?>







						<li><?=

            $v_url

?></li>







						







					<?

        }

?>







				  </ul>















				 







					<?

        echo "</div>" ;


        echo "</div><br /><br /><br />" ;


    }


    if ( $id == 2 )
    { //մեր մասին


        echo "<div id='top' style='margin-top:5px;'>" ;


        echo "<div class='serv_top'><p>" . $_LANG[12][$lan] . "</p></div>" ;


        echo "<div class='video_screenshots'>" ;


        //videoner


?>







				  <ul>







					<?

        $resh = mysql_query( "SELECT * FROM `iwach_videos` Order by id desc" ) ;


        $count = @mysql_num_rows( $resh ) ;


        for ( $i = 0; $i < $count; $i++ )
        {


            $v_url = mysql_result( $resh, $i, "v_url" ) ;

?>







						<li><?=

            $v_url

?></li>







						







					<?

        }

?>







				  </ul>				 







					<?

        echo "</div>" ;


        echo "<div class='serv_top' style='margin-top:260px;color:white;font-size:16px;font-weight:bold;padding-top:2px;'>Երկիրը երկրից</div>" ;


        echo "<div class='video_screenshots'>" ;


        //videoner


?>







				  <ul>







					<?

        $resh = mysql_query( "SELECT * FROM `eem_videos` Order by id desc" ) ;


        $count = @mysql_num_rows( $resh ) ;


        for ( $i = 0; $i < $count; $i++ )
        {


            $v_url = mysql_result( $resh, $i, "v_url" ) ;

?>







						<li><?=

            $v_url

?></li>







						







					<?

        }

?>







				  </ul>				 







					<?

        echo "</div>" ;


        echo "</div><br /><br /><br />" ;


    }


    if ( $id == 3 )
    {


        $resh_h = mysql_query( "SELECT * FROM `haxordumner` where  statuss='active' Order by `id` " ) ;


        $count_h = @mysql_num_rows( $resh_h ) ;


        for ( $i = 0; $i < $count_h; $i++ )
        {


            $h_id_b = mysql_result( $resh_h, $i, "id" ) ;


            $h_nkar_b = mysql_result( $resh_h, $i, "h_nkar" ) ;


            $c_name_b = mysql_result( $resh_h, $i, "h_name_$lan" ) ;


            $c_text_b = mysql_result( $resh_h, $i, "h_text_$lan" ) ;


            $c_desc_b = mysql_result( $resh_h, $i, "h_desc_$lan" ) ;

?>







		







					<div class="haxordumner_top"><p><?=

            $c_name_b

?></p></div>







					<div class="image_h">







					<?

            if ( $h_nkar_b )
            {


                if ( $h_id_b == 5 )
                    $actNN = "act=yerkir" ;


                else
                    $actNN = "lan=" . $lan . "&act=prog&id=" . $h_id_b ;

?>







						<a href='?<?=

                $actNN

?>'><img src="userfiles/<?=

                $h_nkar_b

?>" alt="" style='border:0px;' usemap='' title="Դիտել '<?=

                $c_name_b

?>' հաղորդաշարի տեսգրությունները"/></a>







					<?

            }

?>







					</div>







					







					<div class="content_h">







						<p><?=

            $c_desc_b

?> <a href='?<?=

            $actNN

?>' class='video'></a></p>







					</div>







			







					<div style="clear:both;"></div>







					<br /><br /><br />







			







				<?

        }


    }


    echo "</div>" ;


} //pages


elseif ( $act == "spec" )
{


    if ( empty( $id ) )
    {


        echo "<div id=\"supertop\">" ;


        $resh_h = mysql_query( "SELECT * FROM `hatuk_txtakic` Order by `id` " ) ;


        $count_h = @mysql_num_rows( $resh_h ) ;


        for ( $i = 0; $i < $count_h; $i++ )
        {


            $h_id = mysql_result( $resh_h, $i, "id" ) ;


            $h_nkar_b = mysql_result( $resh_h, $i, "h_nkar" ) ;


            $c_name_b = mysql_result( $resh_h, $i, "h_name_$lan" ) ;


            $c_text_b = mysql_result( $resh_h, $i, "h_text_$lan" ) ;


            $c_desc_b = mysql_result( $resh_h, $i, "h_desc_$lan" ) ;

?>







		







					<div class="haxordumner_top"><p><?=

            $c_name_b

?></p></div>







					<div class="image_h">







					<?

            if ( $h_nkar_b )
            {

?><a href="?act=spec&id=<?=

                $h_id

?>"><img src="userfiles/<?=

                $h_nkar_b

?>" alt="" style='border:0px;'/></a><?

            }

?>







					</div>







					







					<div class="content_h">







						<p><?=

            $c_desc_b

?></p>







					</div>







			







					<div style="clear:both;"></div>







					<br /><br /><br />







			







				<?

        }


        echo "</div>" ;


    } elseif ( $id )
    {


        echo "<div id=\"supertop\">" ;


        $resh_h = mysql_query( "SELECT * FROM `hatuk_txtakic` WHERE `id` = '" . $id .
            "'" ) ;


        $c_name_b = mysql_result( $resh_h, 0, "h_name_$lan" ) ;

?><div class="haxordumner_top"><p><?=

        $c_name_b

?></p></div><?

        $resh_h = mysql_query( "SELECT * FROM `ht_videos` WHERE `b_id` = '" . $id .
            "' Order by `id` desc " ) ;


        $count_h = @mysql_num_rows( $resh_h ) ;


        for ( $i = ( $p - 1 ) * 10; $i < $count_h && $i < ( 10 * $p ); $i++ )
        {


            $v_name_b = mysql_result( $resh_h, $i, "v_name" ) ;


            $v_url_b = mysql_result( $resh_h, $i, "v_url" ) ;


            $v_desc_b = mysql_result( $resh_h, $i, "v_desc" ) ;


            $v_eter_b = mysql_result( $resh_h, $i, "v_eter" ) ;

?>







		







					







					<div class="image_h">







					<?=

            $v_url_b

?>







					</div>







					







					<div class="content_h">







						<p><b><?=

            $v_name_b

?></b></p>







						<p><br /><?=

            $v_eter_b

?></p>







						<p><br /><?=

            $v_desc_b

?></p>







					</div>







			







					<div style="clear:both;"></div>







					<br /><br /><br />







			







				<?

            //echo"</div>";


        }


        //new paging


        if ( $count_h % 10 == 0 && $count_h )
            $p_all = intval( $count_h / 10 ) ;
        else
            $p_all = intval( $count_h / 10 ) + 1 ;


        if ( ! $p )
            $p = 1 ;


        echo "<p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; " ;


        echo " <a href='?act=$act&lan=$lan&id=$id&p=1'>1</a> " ;


        $i = 2 ;


        if ( $p_all <= 10 )
        {


            while ( $p_all >= $i )
            {


                if ( $p == $i )
                    $st = "style='text-decoration:underline;'" ;
                else
                    $st = '' ;


                echo " <a href='?act=$act&lan=$lan&id=$id&p=$i' $st>$i</a> " ;


                $i++ ;


            }


        } elseif ( $p_all > 10 )
        {


            if ( $p > 7 )
            {
                echo "..." ;
                $i = $p - 5 ;


                while ( ( $p_all >= ( $i + 1 ) ) && ( $i < ( $p + 5 ) ) )
                {


                    echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;


                    $i++ ;


                }


                if ( $p_all > $i + 1 )
                    echo " ... " ;


            } elseif ( $p <= 7 )
            {


                $i = 2 ;


                while ( $p_all >= $i && $i < 12 )
                {


                    echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;


                    $i++ ;


                }


                if ( $p_all > 12 )
                    echo " ... " ;


            }


            echo " <a href='?act=$act&lan=$lan&id=$id&p=$p_all'>$p_all</a> " ;


        }


        echo "</p>" ;


        // end new paging


        echo "</div>" ;


    }


} // spec end


elseif ( $act == "yerkir" )
{


    echo "<div id=\"supertop\">" ;


    $resh_h = mysql_query( "SELECT * FROM `e_harc_videos` Order by `id` desc " ) ;


    $count_h = @mysql_num_rows( $resh_h ) ;

?><div class="haxordumner_top"><p>Երկրի հարցը</p></div><?

    for ( $i = ( $p - 1 ) * 10; $i < $count_h && $i < ( 10 * $p ); $i++ )
    {


        $v_name_b = mysql_result( $resh_h, $i, "v_name" ) ;


        $v_url_b = mysql_result( $resh_h, $i, "v_url" ) ;


        $v_desc_b = mysql_result( $resh_h, $i, "v_desc" ) ;


        $v_eter_b = mysql_result( $resh_h, $i, "v_eter" ) ;

?>







		







					







					<div class="image_h">







					<?=

        $v_url_b

?>







					</div>







					







					<div class="content_h">







						<p><b><?=

        $v_name_b

?></b></p>







						<p><br /><?=

        $v_eter_b

?></p>







						<p><br /><?=

        $v_desc_b

?></p>







					</div>







			







					<div style="clear:both;"></div>







					<br /><br /><br />







			







				<?

    }


    //new paging


    if ( $count_h % 10 == 0 && $count_h )
        $p_all = intval( $count_h / 10 ) ;
    else
        $p_all = intval( $count_h / 10 ) + 1 ;


    if ( ! $p )
        $p = 1 ;


    echo "<p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; " ;


    echo " <a href='?act=$act&lan=$lan&id=$id&p=1'>1</a> " ;


    $i = 2 ;


    if ( $p_all <= 10 )
    {


        while ( $p_all >= $i )
        {


            if ( $p == $i )
                $st = "style='text-decoration:underline;'" ;
            else
                $st = '' ;


            echo " <a href='?act=$act&lan=$lan&id=$id&p=$i' $st>$i</a> " ;


            $i++ ;


        }


    } elseif ( $p_all > 10 )
    {


        if ( $p > 7 )
        {
            echo "..." ;
            $i = $p - 5 ;


            while ( ( $p_all >= ( $i + 1 ) ) && ( $i < ( $p + 5 ) ) )
            {


                echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;


                $i++ ;


            }


            if ( $p_all > $i + 1 )
                echo " ... " ;


        } elseif ( $p <= 7 )
        {


            $i = 2 ;


            while ( $p_all >= $i && $i < 12 )
            {


                echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;


                $i++ ;


            }


            if ( $p_all > 12 )
                echo " ... " ;


        }


        echo " <a href='?act=$act&lan=$lan&id=$id&p=$p_all'>$p_all</a> " ;


    }


    echo "</p>" ;


    // end new paging


    echo "</div>" ;


}


// prog


elseif ( $act == "prog" )
{


    $resh = mysql_query( "SELECT * FROM `haxordumner` WHERE id = '" . $id . "'" ) ;


    //$h_nkar_b = mysql_result($resh,0, "h_nkar");


    $h_name = @mysql_result( $resh, 0, "h_name_$lan" ) ;


    //$h_text = mysql_result($resh, $i, "h_text_$lan");


    //$h_bajin = mysql_result($resh, $i, "h_bajin");


    echo "<div id=\"supertop\">" ;


    $resh_h = mysql_query( "SELECT * FROM `haxordumner_videos` WHERE `h_id`='" . $id .
        "' Order by `id` desc " ) ;


    $count_h = @mysql_num_rows( $resh_h ) ;

?><div class="haxordumner_top"><p><?=

    $h_name

?></p></div><?

    $iMN = 0 ;


    for ( $i = ( $p - 1 ) * 10; $i < $count_h && $i < ( 10 * $p ); $i++ )
    {


        $v_name_b = mysql_result( $resh_h, $i, "v_name" ) ;


        $v_url_b = mysql_result( $resh_h, $i, "v_url" ) ;


        $iMN++ //$v_desc_b = mysql_result($resh_h, $i, "v_desc");


        //$v_eter_b = mysql_result($resh_h, $i, "v_eter");


?>







					<div class="image_h" style='margin-right:40px;'>







					<?=

        $v_url_b

?>







					<p style='text-align:left;'><b><?=

        $v_name_b

?></b></p>







					</div>







				<?

        if ( $iMN % 2 == 0 && $i > 0 )
            echo "<div style='clear:both;'></div><br /><br /><br />" ;


    }


    if ( $iMN % 2 == 1 )
        echo "<div style='clear:both;'></div><br /><br /><br />" ;


    //new paging


    if ( $count_h % 10 == 0 && $count_h )
        $p_all = intval( $count_h / 10 ) ;
    else
        $p_all = intval( $count_h / 10 ) + 1 ;


    if ( ! $p )
        $p = 1 ;


    echo "<p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; " ;


    echo " <a href='?act=$act&lan=$lan&id=$id&p=1'>1</a> " ;


    $i = 2 ;


    if ( $p_all <= 10 )
    {


        while ( $p_all >= $i )
        {


            if ( $p == $i )
                $st = "style='text-decoration:underline;'" ;
            else
                $st = '' ;


            echo " <a href='?act=$act&lan=$lan&id=$id&p=$i' $st>$i</a> " ;


            $i++ ;


        }


    } elseif ( $p_all > 10 )
    {


        if ( $p > 7 )
        {
            echo "..." ;
            $i = $p - 5 ;


            while ( ( $p_all >= ( $i + 1 ) ) && ( $i < ( $p + 5 ) ) )
            {


                echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;


                $i++ ;


            }


            if ( $p_all > $i + 1 )
                echo " ... " ;


        } elseif ( $p <= 7 )
        {


            $i = 2 ;


            while ( $p_all >= $i && $i < 12 )
            {


                echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;


                $i++ ;


            }


            if ( $p_all > 12 )
                echo " ... " ;


        }


        echo " <a href='?act=$act&lan=$lan&id=$id&p=$p_all'>$p_all</a> " ;


    }


    echo "</p>" ;


    // end new paging


    echo "</div>" ;


}


/// prog end


/// search


elseif ( $act == "search" )
{


    echo "<div id=\"supertop\">" ;


    if ( $_GET['day'] )
        $getDate = $_GET['day'] ;


    $getDate .= "." ;


    if ( $_GET['month'] )
        $getDate .= $_GET['month'] ;


    $getDate .= "." ;


    if ( $_GET['year'] )
        $getDate .= $_GET['year'] ;


    if ( $getDate == ".." )
        $getDate = '' ;


    $getDate = mysql_real_escape_string( str_replace( "..", ".%.", $getDate ) ) ;


    $num = 10 ;


    if ( $_GET[p] )
    {


        $page = $_GET[p] ;


        $start = $num * $page - $num ;


    } else
    {


        $page = 1 ;


        $start = 0 ;


    }


    if ( $_GET['w'] && $_GET['w'] != $_LANG[19][$lan] && $_GET['w'] != "" )
    {


        $search = $_GET['w'] ;


        $search = trim( $search ) ;


        $search = stripslashes( $search ) ;


        $search = htmlspecialchars( $search ) ;


        $search = mb_substr( $search, 0, 128, 'utf-8' ) ;


        $search_hilights = preg_replace( '/([,.; ])/', " ", $search ) ;


        //$search_hilights = preg_replace("/\s+/", " ", $search);


        //$search_hilights = preg_replace("/ +/", " ", $search);


        $tempp = explode( " ", $search_hilights ) ;


        $temp = array() ;


        $tegs = array(
            "span",
            "spa",
            "pan",
            "fon",
            "ont",
            "font",
            "sty",
            "tyl",
            "yle",
            "styl",
            "tyle",
            "style",
            "siz",
            "ize",
            "size",
            "medium",
            "med",
            "edi",
            "diu",
            "ium",
            "medi",
            "ediu",
            "dium",
            "img",
            "src",
            "href",
            "hre",
            "ref" ) ;


        $flag = true ;


        foreach ( $tempp as $f )
        {


            if ( mb_strlen( $f, 'UTF-8' ) > 2 )
            {


                foreach ( $tegs as $ff )
                {


                    if ( $f == $ff )
                        $flag = false ;


                }


                if ( $flag )
                    $temp[] = $f ;


            }


        }


        $search_hilights = implode( " ", $temp ) ;


        $search = mysql_real_escape_string( $search_hilights ) ;


        if ( $search != "" )
        {


            if ( $getDate && $getDate != "" )
            {


                $query = "SELECT * FROM `records` WHERE  `r_show_$lan` AND (`r_title_$lan`  LIKE '%" .
                    str_replace( " ", "%' AND `r_title_$lan` LIKE '%", $search ) . "%' OR `r_text_$lan` LIKE '%" .
                    str_replace( " ", "%' AND `r_text_$lan` LIKE '%", $search ) .
                    "%') AND `r_fullDate` LIKE '%" . $getDate . "%' ORDER BY `r_ord` DESC " ;


            } else
                $query = "SELECT * FROM `records` WHERE  `r_show_$lan` AND (`r_title_$lan`  LIKE '%" .
                    str_replace( " ", "%' AND `r_title_$lan` LIKE '%", $search ) . "%' OR `r_text_$lan` LIKE '%" .
                    str_replace( " ", "%' AND `r_text_$lan` LIKE '%", $search ) .
                    "%') ORDER BY `r_ord` DESC " ;


        }


    } else
    {


        if ( $getDate && $getDate != "" )
            $query = "SELECT * FROM `records` WHERE  `r_show_$lan`  AND `r_fullDate` LIKE '%" .
                $getDate . "%' ORDER BY `r_ord` DESC " ;


    }


    if ( $query )
    {


        $result = mysql_query( $query ) or die( mysql_error() ) ;


        $total = mysql_num_rows( $result ) ;


        $pages = ceil( $total / $num ) ;


    }

?>







				<div style="overflow:hidden;margin:8px 0;">







					<h3 style="margin:0 0 5px 0;"><?=

    $_LANG[14][$lan]

?></h3>







					<form action="?" method="Get">







						<input type="hidden" value="search" name="act" />







						<span style="float:left;margin-right:30px;">







							<?=

    $_LANG[15][$lan]

?> <input type="text"  name="w" value="<?=

    $search

?>" style="width:200px;"/>







						</span>







						<span style="float:left;margin-right:5px;">







							<?=

    $_LANG[22][$lan]

?> <select name="day">







												<option value="0"> <?=

    $_LANG[16][$lan]

?> </option>







												<?

    for ( $i = 1; $i <= 31; $i++ )
    {


        $ij = ( strlen( $i ) == 1 ? "0" . $i : $i ) ;


        echo "<option value='" . $ij . "' " . ( $_GET['day'] == $ij ? " SELECTED " : "" ) .
            ">" . $ij . "</option>" ;


    }

?>







										   </select>







										   <select name="month">







												<option value="0"> <?=

    $_LANG[17][$lan]

?> </option>







												<?

    for ( $i = 1; $i <= 12; $i++ )
    {


        $ij = ( strlen( $i ) == 1 ? "0" . $i : $i ) ;


        echo "<option value='" . $ij . "' " . ( $_GET['month'] == $ij ? " SELECTED " :
            "" ) . ">" . $ij . "</option>" ;


    }

?>







										   </select>







										   <select name="year">







                                           		<option value="0"> <?=

    $_LANG[18][$lan]

?> </option>







                                           		<?

    for ( $i = 2011; $i <= date( 'Y' ); $i++ )
    {


        $j = $i - 2000 ;

?>







													<option value=<?=

        $j

?> <?=

        ( $_GET['year'] == $j ? " SELECTED " : "" )

?>> <?=

        $i

?> </option>







                                                    <?

    }

?>







										   </select>







						</span>















						<span style="float:left;margin-right:15px;">







							<input type="submit" value=<?=

    $_LANG[19][$lan]

?> />







						</span>						







					<form>







				</div>















				<div id="search_top" style='margin-bottom:8px;'><p><?=

    $_LANG[20][$lan]

?></p></div>







			  <?

    //echo $count;


    if ( ! $total )
        echo $_LANG[21][$lan] ;


    else
    {


        if ( $total > $num )
            $query = $query . " LIMIT $start,$num" ;


        $result = mysql_query( $query ) or die( mysql_error() ) ;


        while ( $row = mysql_fetch_array( $result ) )
        {


            $r_id_r = $row['id'] ;


            $r_pic_r = $row['r_pic'] ;


            $r_title_r = $row['r_title_' . $lan] ;


            $r_short_r = $row['r_short_' . $lan] ;


            $r_date_r = $row['r_date'] ;


            $r_fulldate = $row['r_fullDate'] ;


            $rowarray = explode( " ", $r_title_r ) ;


            $i = 0 ;


            foreach ( $rowarray as $e )
            {


                foreach ( $temp as $f )
                {


                    if ( mb_strrichr( $e, $f, true, 'utf-8' ) !== false )
                    {


                        $skizb = mb_strrichr( $e, $f, true, 'utf-8' ) ;


                        $verch = mb_strrichr( $e, $f, false, 'utf-8' ) ;


                        $sovpadenie = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ), mb_strlen( $f,
                            'utf-8' ), 'utf-8' ) ;


                        $ostatok = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ) + mb_strlen( $f, 'utf-8' ),
                            mb_strlen( $e, 'utf-8' ) - mb_strlen( $skizb, 'utf-8' ) - mb_strlen( $f, 'utf-8' ),
                            'utf-8' ) ;


                        $sovpadenie = "<span style='font-weight:900; font-size:20px'>" . $sovpadenie .
                            "</span>" ;


                        $rowarray[$i] = $skizb . $sovpadenie . $ostatok ;


                    }


                }


                $i++ ;


            }


            $r_title_r = implode( " ", $rowarray ) ;


            $rowarray = explode( " ", $r_short_r ) ;


            $i = 0 ;


            foreach ( $rowarray as $e )
            {


                foreach ( $temp as $f )
                {


                    if ( mb_strrichr( $e, $f, true, 'utf-8' ) !== false )
                    {


                        $skizb = mb_strrichr( $e, $f, true, 'utf-8' ) ;


                        $verch = mb_strrichr( $e, $f, false, 'utf-8' ) ;


                        $sovpadenie = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ), mb_strlen( $f,
                            'utf-8' ), 'utf-8' ) ;


                        $ostatok = mb_substr( $e, mb_strlen( $skizb, 'utf-8' ) + mb_strlen( $f, 'utf-8' ),
                            mb_strlen( $e, 'utf-8' ) - mb_strlen( $skizb, 'utf-8' ) - mb_strlen( $f, 'utf-8' ),
                            'utf-8' ) ;


                        $sovpadenie = "<span style='font-weight:800; font-size:16px'>" . $sovpadenie .
                            "</span>" ;


                        $rowarray[$i] = $skizb . $sovpadenie . $ostatok ;


                    }


                }


                $i++ ;


            }


            $r_short_r = implode( " ", $rowarray ) ;

?>







				







					<div class="image_c">







						<?

            if ( $r_pic_r )
            {

?><img src="userfiles/<?=

                $r_pic_r

?>" alt="" /><?

            }

?>







					</div>







					<div class="content_c">







                    	<?

            if ( $search && $search != "" )
            {

?>







						<h2><a href="?act=news&amp;lan=<?=

                $lan

?>&amp;se=<?=

                $search

?>&amp;id=<?=

                $r_id_r

?>"><?=

                $r_title_r

?></a>







                        <?

            } else
            {

?>







                        <h2><a href="?act=news&amp;lan=<?=

                $lan

?>&amp;id=<?=

                $r_id_r

?>"><?=

                $r_title_r

?></a>







                        <?

            }


            if ( $r_video_r )
            {

?><a href="?act=news&amp;lan=<?=

                $lan

?>&amp;id=<?=

                $r_id_r

?>" class="video"><?=

                $_LANG[4][$lan]

?></a><?

            }

?>







						</h2>







                        <?

            if ( $search && $search != "" )
            {

?>







						<p><span class='p_time'><?=

                substr( $r_date_r, 0, 6 ) . " " . $r_fulldate ;

?></span><br /><?=

                $r_short_r

?> <a href="?act=news&amp;lan=<?=

                $lan

?>&amp;se=<?=

                $search

?>&amp;id=<?=

                $r_id_r

?>"><?=

                $_LANG[5][$lan]

?></a></p>







                        <?

            } else
            {

?>







                        <p><span class='p_time'><?=

                substr( $r_date_r, 0, 6 ) . " " . $r_fulldate ;

?></span><br /><?=

                $r_short_r

?> <a href="?act=news&amp;lan=<?=

                $lan

?>&amp;id=<?=

                $r_id_r

?>"><?=

                $_LANG[5][$lan]

?></a></p>







                        <?

            }

?>







					</div>







					<div style="clear:both;"></div>







					<br /><br /><br />







					







			  <?

        }


    }


    if ( $total > $num )
    {


        //new paging


        echo "<p id='paging'>" . $_LANG[13][$lan] . " &nbsp;" . $page . "/" . $pages .
            " &nbsp;&nbsp; " ;


        if ( $_GET['day'] && $_GET['day'] != "" )
            $day = $_GET['day'] ;


        if ( $_GET['month'] && $_GET['month'] != "" )
            $month = $_GET['month'] ;


        if ( $_GET['year'] && $_GET['year'] != "" )
            $year = $_GET['year'] ;


        $dest = "?act=$act&lan=$lan" ;


        if ( $search && $search != "" )
            $dest = $dest . "&w=$search" ;


        if ( $day && $day != "" )
            $dest = $dest . "&day=$day" ;


        if ( $month && $month != "" )
            $dest = $dest . "&month=$month" ;


        if ( $year && $year != "" )
            $dest = $dest . "&year=$year" ;


        $dest = $dest . "&" ;


        $pre = "<span style='color:#F00; font-size:16px; font-weight:600'>" ;


        $pos = "</span>" ;


        $next = "&nbsp;>&nbsp;" ;


        $prev = "&nbsp;<&nbsp;" ;


        if ( $page == 1 )
        {


            echo "&nbsp;" ;


        } else
        {

?>







         	<a href="<?=

            $dest

?>p=<?=

            $page - 1

?>"><?=

            $prev

?></a>







         <?

        }


        for ( $i = 1; $i < $pages + 1; $i++ )
        {


            if ( $pages < 12 )
            {


                if ( $i == $page )
                    echo $pre . $i . $pos ;


                else
                {

?>







				 	<a href="<?=

                    $dest

?>p=<?=

                    $i

?>"><?=

                    $i

?></a>







				 <?

                }


            } else
            {


                if ( $page < 7 )
                {


                    if ( $i == $page )
                        echo $pre . $i . $pos ;


                    if ( ( $i == 1 && $i != $page ) || ( $i == $pages && $page != $pages ) || ( $i <
                        10 && $i != $page ) )
                    {

?>







				 	<a href="<?=

                        $dest

?>p=<?=

                        $i

?>"><?=

                        $i

?></a> 	<?

                    }


                    if ( ( $i == $page + 4 && ( $page + 4 < $pages ) && $page > 5 ) || ( $pages > 10 &&
                        $i == 10 ) )
                        echo "..." ;


                } elseif ( $page > $pages - 6 )
                {


                    if ( $i == $page )
                        echo $pre . $i . $pos ;


                    if ( ( $i == 1 && $i != $page ) || ( $i == $pages && $page != $pages ) || ( $i >
                        $pages - 9 && $i != $page ) )
                    {

?>







				 	<a href="<?=

                        $dest

?>p=<?=

                        $i

?>"><?=

                        $i

?></a> 	<?

                    }


                    if ( ( $i == $page - 4 && ( $page - 4 < $pages ) && $page < $pages - 9 ) || ( $pages >
                        10 && $i == 1 ) )
                        echo "..." ;


                } else
                {


                    if ( $i == $page )
                        echo $pre . $i . $pos ;


                    if ( ( $i == 1 && $i != $page ) || ( $i == $pages && $page != $pages ) || ( $i >
                        $page - 4 && $i < $page + 4 && $i != $page ) )
                    {

?>







				 		<a href="<?=

                        $dest

?>p=<?=

                        $i

?>"><?=

                        $i

?></a> 	<?

                    }


                    if ( ( $i == $page + 3 && ( $page + 4 < $pages ) ) || ( $i == $page - 4 ) && ( $page -
                        4 > 1 ) )
                        echo "..." ;


                }


            }


        }


        if ( $page == $pages || $page > $pages - 1 )
            echo "&nbsp;" ;


        else
        {

?>







         	<a href="<?=

            $dest

?>p=<?=

            $page + 1

?>"><?=

            $next

?></a>







         <?

        }


        // end new paging


        echo "</div>" ;


    }
}


/// search end


/// search calendar news


elseif ( $act == "news_search" )
{


    echo "<div id=\"supertop\">" ;


    if ( $_GET['day'] )
        $getDate = $_GET['day'] ;


    $getDate .= "." ;


    if ( $_GET['month'] )
        $getDate .= $_GET['month'] ;


    $getDate .= "." ;


    if ( $_GET['year'] )
        $getDate .= $_GET['year'] ;


    if ( $getDate == ".." )
        $getDate = '' ;


    if ( $w == "Փնտրել" )
        $w = "" ;


    $getDate = mysql_real_escape_string( str_replace( "..", ".%.", $getDate ) ) ;


    if ( $getDate && $w )
        $querySearch = "SELECT * FROM `records` WHERE `r_show_$lan` = '1' AND (`r_title_$lan` like '%" .
            $w . "%' OR `r_text_$lan` like '%" . $w . "%') AND `r_fullDate` LIKE '%" . $getDate .
            "%' Order by `r_ord` desc" ;


    elseif ( $w )
        $querySearch = "SELECT * FROM `records` WHERE `r_show_$lan` = '1' AND (`r_title_$lan` like '%" .
            $w . "%' OR `r_text_$lan` like '%" . $w . "%') Order by `r_ord` desc" ;


    elseif ( $getDate )
        $querySearch = "SELECT * FROM `records` WHERE `r_show_$lan` = '1' AND `r_fullDate` LIKE '%" .
            $getDate . "%' Order by `r_ord` desc" ;


    if ( $querySearch )
        $resh = mysql_query( $querySearch ) ;


    $count = @mysql_num_rows( $resh ) ;

?>







				<div style="overflow:hidden;margin:8px 0;">







					<h3 style="margin:0 0 5px 0;">Ընդլայնված որոնում</h3>







					<form action="?" method="Get">







						<input type="hidden" value="search" name="act" />







						<span style="float:left;margin-right:30px;">







							Բանալի բառ <input type="text"  name="w" value="<?=

    $_GET['w']

?>" style="width:200px;"/>







						</span>







						<span style="float:left;margin-right:5px;">







							Ըստ ամսաթվի <select name="day">







												<option value=""> օր </option>







												<?

    for ( $i = 1; $i <= 31; $i++ )
    {


        $ij = ( strlen( $i ) == 1 ? "0" . $i : $i ) ;


        echo "<option value='" . $ij . "' " . ( $_GET['day'] == $ij ? " SELECTED " : "" ) .
            ">" . $ij . "</option>" ;


    }

?>







										   </select>







										   <select name="month">







												<option value=""> ամիս </option>







												<?

    for ( $i = 1; $i <= 12; $i++ )
    {


        $ij = ( strlen( $i ) == 1 ? "0" . $i : $i ) ;


        echo "<option value='" . $ij . "' " . ( $_GET['month'] == $ij ? " SELECTED " :
            "" ) . ">" . $ij . "</option>" ;


    }

?>







										   </select>







										   <select name="year">







												<option value=""> տարի </option>







												<option value="11" <?=

    ( $_GET['year'] == '11' ? " SELECTED " : "" )

?>> 2011 </option>







												<option value="12" <?=

    ( $_GET['year'] == '12' ? " SELECTED " : "" )

?>> 2012 </option>







												<option value="13" <?=

    ( $_GET['year'] == '13' ? " SELECTED " : "" )

?>> 2013 </option>







										   </select>







						</span>















						<span style="float:left;margin-right:15px;">







							<input type="submit" value="Փնտրել" />







						</span>						







					<form>







				</div>















				<div id="search_top" style='margin-bottom:8px;'><p>Արդյունքները</p></div>







			  <?

    //echo $count;


    if ( ! $count )
        echo "Փնտրման արդյունքը դատարկ է:" ;


    exit() ;


    if ( ! $w = "" )
        $w = "" ;


    if ( ! $day = "" )
        $day = "" ;


    if ( ! $month = "" )
        $month = "" ;


    if ( ! $year = "" )
        $month = "" ;


    for ( $i = ( $p - 1 ) * 10; $i < $count && $i < ( 10 * $p ); $i++ )
    {


        $r_id_r = mysql_result( $resh, $i, "id" ) ;


        $r_pic_r = mysql_result( $resh, $i, "r_pic" ) ;


        $r_title_r = mysql_result( $resh, $i, "r_title_$lan" ) ;


        $r_short_r = mysql_result( $resh, $i, "r_short_$lan" ) ;


        $r_date_r = mysql_result( $resh, $i, "r_date" ) ;

?>







				







					<div class="image_c">







						<?

        if ( $r_pic_r )
        {

?><img src="userfiles/<?=

            $r_pic_r

?>" alt="" /><?

        }

?>







					</div>







					<div class="content_c">







						<h2><a href="?act=news&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $r_id_r

?>"><?=

        $r_title_r

?></a> 







						<?

        if ( $r_video_r )
        {

?><a href="?act=news&amp;lan=<?=

            $lan

?>&amp;id=<?=

            $r_id_r

?>" class="video"><?=

            $_LANG[4][$lan]

?></a><?

        }

?>







						</h2>







						<p><span class='p_time'><?=

        $r_date_r

?></span><br /><?=

        $r_short_r

?> <a href="?act=news&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $r_id_r

?>"><?=

        $_LANG[5][$lan]

?></a></p>







					</div>







					<div style="clear:both;"></div>







					<br /><br /><br />







					







			  <?

    }

?>















			  <?

    $count_h = $count ;


    //new paging


    if ( $count_h % 10 == 0 && $count_h )
        $p_all = intval( $count_h / 10 ) ;
    else
        $p_all = intval( $count_h / 10 ) + 1 ;


    if ( ! $p )
        $p = 1 ;


    echo "<p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; " ;


    echo " <a href='?act=$act&lan=$lan&w=$w&p=1'>1</a> " ;


    $i = 2 ;


    if ( $p_all <= 10 )
    {


        while ( $p_all >= $i )
        {


            if ( $p == $i )
                $st = "style='text-decoration:underline;'" ;
            else
                $st = '' ;


            echo " <a href='?act=$act&lan=$lan&w=$w&p=$i' $st>$i</a> " ;


            $i++ ;


        }


    } elseif ( $p_all > 10 )
    {


        if ( $p > 7 )
        {
            echo "..." ;
            $i = $p - 5 ;


            while ( ( $p_all >= ( $i + 1 ) ) && ( $i < ( $p + 5 ) ) )
            {


                echo " <a href='?act=$act&lan=$lan&w=$w&p=$i'>$i</a> " ;


                $i++ ;


            }


            if ( $p_all > $i + 1 )
                echo " ... " ;


        } elseif ( $p <= 7 )
        {


            $i = 2 ;


            while ( $p_all >= $i && $i < 12 )
            {


                echo " <a href='?act=$act&lan=$lan&w=$w&p=$i'>$i</a> " ;


                $i++ ;


            }


            if ( $p_all > 12 )
                echo " ... " ;


        }


        echo " <a href='?act=$act&lan=$lan&w=$w&p=$p_all'>$p_all</a> " ;


    }


    echo "</p>" ;


    // end new paging


    echo "</div>" ;


}


/// search end


elseif ( $act == "films" )
{


    if ( empty( $id ) )
    {


        echo "<div id=\"supertop\">" ;


        $resh_h = mysql_query( "SELECT * FROM `filmer` Order by `id` desc " ) ;


        $count_h = @mysql_num_rows( $resh_h ) ;


        for ( $i = ( $p - 1 ) * 10; $i < $count_h && $i < ( 10 * $p ); $i++ )
        {


            $h_id = mysql_result( $resh_h, $i, "id" ) ;


            $h_nkar_b = mysql_result( $resh_h, $i, "f_nkar" ) ;


            $c_name_b = mysql_result( $resh_h, $i, "f_name_$lan" ) ;


            $c_text_b = mysql_result( $resh_h, $i, "f_text_$lan" ) ;


            $c_desc_b = mysql_result( $resh_h, $i, "f_desc_$lan" ) ;

?>







					<div class="haxordumner_top"><p><?=

            $c_name_b

?></p></div>







					<div class="image_h">







					<?

            if ( $h_nkar_b )
            {

?><a href="?act=films&id=<?=

                $h_id

?>"><img src="userfiles/<?=

                $h_nkar_b

?>" alt="" style='border:0px;'/></a><?

            }

?>







					</div>







					







					<div class="content_h">







						<p><?=

            $c_desc_b

?> <a href="?act=films&id=<?=

            $h_id

?>" class="video"><?=

            $_LANG[4][$lan]

?></a></p>







					</div>







			







					<div style="clear:both;"></div>







					<br /><br /><br />







			







				<?

        }


        //new paging


        if ( $count_h % 10 == 0 && $count_h )
            $p_all = intval( $count_h / 10 ) ;
        else
            $p_all = intval( $count_h / 10 ) + 1 ;


        if ( ! $p )
            $p = 1 ;


        echo "<p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; " ;


        echo " <a href='?act=$act&p=1'>1</a> " ;


        $i = 2 ;


        if ( $p_all <= 10 )
        {


            while ( $p_all >= $i )
            {


                if ( $p == $i )
                    $st = "style='text-decoration:underline;'" ;
                else
                    $st = '' ;


                echo " <a href='?act=$act&p=$i' $st>$i</a> " ;


                $i++ ;


            }


        } elseif ( $p_all > 10 )
        {


            if ( $p > 7 )
            {
                echo "..." ;
                $i = $p - 5 ;


                while ( ( $p_all >= ( $i + 1 ) ) && ( $i < ( $p + 5 ) ) )
                {


                    echo " <a href='?act=$act&p=$i'>$i</a> " ;


                    $i++ ;


                }


                if ( $p_all > $i + 1 )
                    echo " ... " ;


            } elseif ( $p <= 7 )
            {


                $i = 2 ;


                while ( $p_all >= $i && $i < 12 )
                {


                    echo " <a href='?act=$act&p=$i'>$i</a> " ;


                    $i++ ;


                }


                if ( $p_all > 12 )
                    echo " ... " ;


            }


            echo "<a href='?act=$act&p=$p_all'>$p_all</a> " ;


        }


        echo "</p>" ;


        // end new paging


        echo "</div>" ;


    } elseif ( $id )
    {


        echo "<div id=\"supertop\">" ;

?><div class="haxordumner_top"><p><?=

        $f_name

?></p></div><?

        $resh_h = mysql_query( "SELECT * FROM `f_videos` WHERE `b_id` = '" . $id .
            "' Order by `id` desc " ) ;


        $v_name_b = mysql_result( $resh_h, 0, "v_name" ) ;


        $v_url_b = mysql_result( $resh_h, 0, "v_url" ) ;


        $v_desc_b = mysql_result( $resh_h, 0, "v_desc" ) ;


        $v_eter_b = mysql_result( $resh_h, 0, "v_eter" ) ;

?>







					<div class="image_h">







						<?=

        $v_url_b

?>







					</div>







					<div class="content_h">







						<p><b><?=

        $v_name_b

?></b></p>







						<p><br /><?=

        $v_eter_b

?></p>







						<p><br /><?=

        $f_desc

?></p>







                        <img src="userfiles/<?=

        $f_nkar

?>" alt="" style="display:none;" />







					</div>







			 	







					<div style="clear:both;"></div>







					<br /><br /><br />







			







				<?

        echo "</div>" ;


    }


} // films end


elseif ( $act == "polls" )
{


    echo "<div id=\"supertop\">" ;

?><div class="haxordumner_top"><p>Հարցումների արխիվ</p></div><?

    $resh_j = mysql_query( "SELECT * FROM `ym_poll_q` ORDER BY id desc" ) ;


    $count_j = @mysql_num_rows( $resh_j ) ;


    for ( $j = 0; $j < $count_j; $j++ )
    {


        $id_q = mysql_result( $resh_j, $j, "id" ) ;


        $poll_q = mysql_result( $resh_j, $j, "poll_q" ) ;


        $GLOBALS = "<br /><br /><div class='q'>$poll_q</div><div class='a'><ul>" ;


        $resh = mysql_query( "SELECT * FROM `ym_poll_a` WHERE `q_id` = '" . $id_q .
            "' AND `poll_a` != ''  ORDER by `id` " ) ;


        $count = @mysql_num_rows( $resh ) ;


        $sum = 0 ;


        for ( $i = 0; $i < $count; $i++ )
        {


            $poll_a_v = mysql_result( $resh, $i, "poll_a_v" ) ;


            $sum += $poll_a_v ;


        }


        for ( $i = 0; $i < $count; $i++ )
        {


            $id_a = mysql_result( $resh, $i, "id" ) ;


            $poll_a = mysql_result( $resh, $i, "poll_a" ) ;


            $poll_a_v = mysql_result( $resh, $i, "poll_a_v" ) ;


            $width = intval( 2.2 * $poll_a_v / $sum * 100 ) ;


            $tok = $poll_a_v / $sum * 100 ;


            $tok = sprintf( "%.2f", $tok ) ;


            $GLOBALS .= "<li><label>" . $poll_a . " <span style='font-size:9px;'>(" . $tok .
                "%, " . $poll_a_v . " անգամ)</span></label><br /><p style='width:" . $width .
                "px;height:8px;background:url(s/i/background_orange.png)'></p></li>" ;


        }


        $GLOBALS .= "</ul><br /></div>" ;


        echo $GLOBALS ;


    }


    echo "</div>" ;


} //polls


elseif ( $act == "ether" )
{


    echo "<div id=\"supertop\">" ;


    echo '<div class="haxordumner_top"><p>Շաբաթվա ծրագիրը</p></div>' ;


    $resh = mysql_query( "SELECT * FROM `ether` ORDER by `id` desc" ) ;


    $count = @mysql_num_rows( $resh ) ;


    while ( $resultEter = mysql_fetch_array( $resh ) )
    {


        echo "<p style='margin:10px 0px;width:40%;float:left;'><img src='/s/i/WordIcons.png' alt='' style='border:0px;width:20px;float: left;margin:0 5px 0 0'/> <a href='/userfiles/" .
            $resultEter['e_name_simple'] . "' style='height:20px;line-height:20px;'> " . $resultEter['e_name_simple'] .
            "</a></p>" ;


    }


    echo "</div>" ;


} //ether


elseif ( $act == "cat" && $id )
{
    $resh = mysql_query( "SELECT * FROM `categories` ORDER BY orderCode " ) ;
  	$count = @mysql_num_rows( $resh ) ;
    echo "<div id=\"top\">" ;
    for ( $i = 0; $i < $count; $i++ )
    {
        $c_id = mysql_result( $resh, $i, "id" ) ;
        $c_name = mysql_result( $resh, $i, "c_name_$lan" ) ;
        echo "<div style='float:left;width:180px;height:30px;margin-left:30px;'><a href='?act=cat&amp;lan=$lan&amp;id=$c_id' " ;
        if ( $c_id == $id )
            echo "style='text-decoration:underline;' " ;
        echo ">" . $c_name . "</a></div>" ;
    }
    echo "</div>" ;
    $resh = mysql_query( "SELECT * FROM `records` WHERE `r_category` = '" . $id .
       "' AND `r_show_$lan` = 1 Order by `r_ord` desc " ) ;
    $count = @mysql_num_rows( $resh ) ;
    echo "<div id='supertop'>" ;
    for ( $i = ( $p - 1 ) * 10; $i < $count && $i < ( 10 * $p ); $i++ )
    {
        $r_id_r = mysql_result( $resh, $i, "id" ) ;
        $r_pic_r = mysql_result( $resh, $i, "r_pic" ) ;
        $r_title_r = mysql_result( $resh, $i, "r_title_$lan" ) ;
        $r_short_r = mysql_result( $resh, $i, "r_short_$lan" ) ;
        $r_text_r = mysql_result( $resh, $i, "r_text_$lan" ) ;
        $r_video_r = mysql_result( $resh, $i, "r_video_$lan" ) ;
        $r_keywords_r = mysql_result( $resh, $i, "r_keywords_$lan" ) ;
?>
	<div class="image_c">
<? 
	if ( $r_pic_r ){?>
    <img src="userfiles/<?=$r_pic_r?>" alt="" />
<? } ?>
	</div>

	<div class="content_c">
		<h2><a href="?act=news&amp;lan=<?=$lan?>&amp;id=<?=$r_id_r?>"><?=$r_title_r?></a> 
		<? if ( $r_video_r ){?>
			<a href="?act=news&amp;lan=<?=$lan?>&amp;id=<?=$r_id_r?>" class="video"><?=$_LANG[4][$lan]?></a><?
        }?>
		</h2>
		<p><?=$r_short_r?> <a href="?act=news&amp;lan=<?=$lan?>&amp;id=<?=$r_id_r?>"><?=$_LANG[5][$lan]?></a></p>
	</div>
	<div style="clear:both;"></div>
	<br /><br /><br />
<? }
    $count_h = $count ;
    //new paging
    if ( $count_h % 10 == 0 && $count_h )
        $p_all = intval( $count_h / 10 ) ;
    else
        $p_all = intval( $count_h / 10 ) + 1 ;
    if ( ! $p )
       $p = 1 ;
    echo "<p id='paging'>Էջեր` $p/$p_all &nbsp;&nbsp; " ;
    echo " <a href='?act=$act&lan=$lan&id=$id&p=1'>1</a> " ;
    $i = 2 ;
    if ( $p_all <= 10 )
    {  
		while ( $p_all >= $i ){
            if ( $p == $i )
                $st = "style='text-decoration:underline;'" ;
            else
                $st = '' ;
            echo " <a href='?act=$act&lan=$lan&id=$id&p=$i' $st>$i</a> " ;
            $i++ ;
     	}
    } elseif ( $p_all > 10 )
    {
		if ( $p > 7 )
        {
            echo "..." ;
            $i = $p - 5 ;
            while ( ( $p_all >= ( $i + 1 ) ) && ( $i < ( $p + 5 ) ) )
            {
				 echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;
	             $i++ ;
            }
            if ( $p_all > $i + 1 )
               echo " ... " ;
        } elseif ( $p <= 7 )
        { $i = 2 ;
            while ( $p_all >= $i && $i < 12 )
            {
               echo " <a href='?act=$act&lan=$lan&id=$id&p=$i'>$i</a> " ;
              $i++ ;
            }
            if ( $p_all > 12 )
                echo " ... " ;
        }
        echo " <a href='?act=$act&lan=$lan&id=$id&p=$p_all'>$p_all</a> " ;
	   }
    echo "</p>" ;
    // end new paging
    echo "</div>" ; //supertop
} //categories


elseif ( $act == "news" && $id )
{

?>







		 <div id="supertop">







			







			<div class="content_all">







			<?

    if ( $r_pic_r )
    {

?><img src="userfiles/<?=

        $r_pic_r

?>" alt="" style='float:left;max-width:400px;margin-right: 20px; margin-bottom: 20px;' /><?

    }

?>















				<h2><a href="?act=news&amp;lan=<?=

    $lan

?>&amp;id=<?=

    $r_id_r

?>"><?=

    $r_title_r

?></a> 







				<?

    if ( $r_video_r )
    {

?><a href="?act=news&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $r_id_r

?>#video" class="video"><?=

        $_LANG[4][$lan]

?></a><?

    }

?>







				</h2>







				<p><span class='p_time'><?=

    $r_date_r

?></span><br /><?=

    $r_text_r

?><br /><br /><a name="video"> </a></p>







				<p style='text-align:center;'><?=

    $r_video_r

?></p>







				







				<!-- AddThis Button BEGIN -->







				<div class="addthis_toolbox addthis_default_style" style='margin-top:13px;'>







				   <a class="addthis_button_facebook"></a> 







				   <a class="addthis_button_twitter"></a> 







				   <a class="addthis_button_vk"></a> 







				   <a class="addthis_button_yahoobkm"></a> 







				   <a class="addthis_button_favorites"></a> 







				   <a class="addthis_button_mymailru"></a> 







				   <a class="addthis_button_compact"></a> 







				   <a class="addthis_counter addthis_bubble_style"></a>







				</div>







				<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>







				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=narekmarkosyan"></script>







				<!-- AddThis Button END -->























				<?

    if ( $lan == "hy" )
    {

?>







				<!-- comments start -->







				<?

        $resh_com = mysql_query( "SELECT * FROM ` records_comments` WHERE `record_id` = '" .
            $id . "' AND `c_approve` = 1 ORDER BY id " ) ;


        $count_com = @mysql_num_rows( $resh_com ) ;


        if ( $count_com )
        {


            echo "<p>Մեկնաբանություններ` $count_com</p>" ;


            for ( $ic = 0; $ic < $count_com; $ic++ )
            {


                $c_name_b = mysql_result( $resh_com, $ic, "c_name" ) ;


                $c_com_b = mysql_result( $resh_com, $ic, "c_com" ) ;


                $c_date_b = mysql_result( $resh_com, $ic, "c_date" ) ;


                echo "<div style='border-bottom:1px solid #AAA;padding-bottom:5px;'>







							<p><span class='c_name'>" . $c_name_b .
                    "</span> <span class='c_separate'> | </span> <span class='c_date'>" . $c_date_b .
                    "</span></p>







							<p>" . $c_com_b . "</p></div>" ;


            }


        }

?>







					<div id='author_comment'><br /><input type='hidden' id='com_post_id' value='<?=

        $id

?>'>







						<div class='hid_div_author'>







							<div id='c_name_div'><input name='c_name' id='c_name_id' class='c_name_input' onfocus='unborder("c_name_id")'/> Անուն (պարտադիր է)</div>







							<div id='c_email_div'><input name='c_email' id='c_email_id' class='c_name_input' onfocus='unborder("c_email_id")' /> E-mail (չի հրապարակվելու) (պարտադիր է)</div>







						</div>















						<div id='c_textatea_div'><textarea class='c_textarea' id='c_com' name='c_com' onclick='com_activ()' onfocus='unborder("c_com")' >Թողնել մեկնաբանություն</textarea></div>















						<div class='hid_div_author'>







						 <div id='c_buttons'><input type='button' value='Մաքրել մեկնաբանությունը' onclick='com_cansel()'/> <input type='button' value='Թողնել մեկնաբանություն' onclick='com_submit()' /></div>







						</div>







					</div>







				<!-- comments end -->







				<?

    }

?>















			</div>







		 </div>







			<?

} //news id > 0


?>

		<!--TOP END-->

	<!--BANNER AFTER TOP START-->

		<div id="after_top_b" style='clear:both;'>



<!-- <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="680" height="106"> 

     <param name="movie" value="s/i/EURASIA_15_06.swf" /> 

     <param name="quality" value="high" /> 

     <embed src="s/i/EURASIA_15_06.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="680" height="106"></embed> 

     </object> -->

	<!-- <a href="#"><img src="s/i/banner1.png" alt="" /></a> -->

			







			<?

$ii = rand( 0, 1 ) ;

if ( $ii == 0 )
{


    for ( $i = 0; $i < $count_banners; $i++ )
    {
        continue ;

        $b_type_b = mysql_result( $resh_banners, $i, "b_type" ) ;

        if ( $b_type_b == 2 )
        {

            $b_pic_1 = mysql_result( $resh_banners, $i, "b_pic" ) ;


            $b_link_1 = mysql_result( $resh_banners, $i, "b_link" ) ;


            if ( $b_pic_1 )
                echo "<a href='$b_link_1' target='_blank'><img src='userfiles/$b_pic_1' alt='' style='border:0px;'/></a>" ;


            //$breakfor = 1;


        } else
            continue ;


        //if($breakfor == 1) break 1;


    }


} else
{


    for ( $i = $count_banners - 1; $i >= 0; $i-- )
    {


        $b_type_b = mysql_result( $resh_banners, $i, "b_type" ) ;


        if ( $b_type_b == 2 )
        {


            $b_pic_1 = mysql_result( $resh_banners, $i, "b_pic" ) ;


            $b_link_1 = mysql_result( $resh_banners, $i, "b_link" ) ;


            if ( $b_pic_1 )
                echo "<a href='$b_link_1' target='_blank'><img src='userfiles/$b_pic_1' alt='' style='border:0px;'/></a>" ;


            //$breakfor = 1;


        } else
            continue ;


        //if($breakfor == 1) break 1;


    }


}


/*







$resh = mysql_query("SELECT * FROM `banners` WHERE `b_type` = '2' ORDER BY id LIMIT 4");







$count = @mysql_num_rows($resh);







if($count){















$ii = rand(0, 1);







if($ii==0){















for($i=0;$i<$count;$i++){















$b_pic = mysql_result($resh, $i, "b_pic");







$b_link = mysql_result($resh, $i, "b_link");















if($b_pic) echo"<a href='$b_link'><img src='userfiles/$b_pic' alt='' /></a>";







}







}







else{







for($i=$count-1;$i>=0;$i--){















$b_pic = mysql_result($resh, $i, "b_pic");







$b_link = mysql_result($resh, $i, "b_link");















if($b_pic) echo"<a href='$b_link'><img src='userfiles/$b_pic' alt='' /></a>";







}







}















}







*/

?>







		</div>







		<!--BANNER AFTER TOP END-->















<!--NEWS FEED START-->







		<div class="header noborder"><h2><?=

$_LANG[10][$lan]

?></h2></div>







		<div id="news_feed">







			<ul>















			<?

$resh = mysql_query( "SELECT * FROM `records` WHERE `r_category` > 0 AND `r_show_" .
    $lan . "` > 0 Order by `r_ord` desc LIMIT 50" ) ;


$count = @mysql_num_rows( $resh ) ;


for ( $i = 0; $i < $count; $i++ )
{


    $r_id_r = mysql_result( $resh, $i, "id" ) ;


    $r_title_r = mysql_result( $resh, $i, "r_title_$lan" ) ;


    $r_video_r = mysql_result( $resh, $i, "r_video_$lan" ) ;


    $r_date_r = mysql_result( $resh, $i, "r_date" ) ;


    $r_date_r = trim( $r_date_r ) ;


    $r_date_r = explode( ".", $r_date_r ) ;

?>







				<li><span class="time"><?=

    $r_date_r[0]

?></span><span class="sep"> . </span><span class="date"><?=

    $r_date_r[1]

?></span> <a href="?act=news&amp;lan=<?=

    $lan

?>&amp;id=<?=

    $r_id_r

?>" class="title"><?=

    $r_title_r

?></a> <?

    if ( $r_video_r )
    {

?><a href="?act=news&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $r_id_r

?>#video" class="video"><?=

        $_LANG[4][$lan]

?></a><?

    }

?></li>







				







			<?

}

?>







			</ul>







		</div>







		<!--NEWS FEED END-->







	







		<!--BANNER AFTER NEWS FEED STAR-->







<!--		<embed src="viva_cell.swf" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" width="688px" height="131px">

-->





<!--		<div id="news_feed_b" style="height:112px;">	

			<?

$resh_banners = mysql_query( "SELECT * FROM `banners` WHERE `b_type` = '3' ORDER BY id desc" ) ;

$count_banners = @mysql_num_rows( $resh_banners ) ;

for ( $i = 0; $i < $count_banners; $i++ )
{

    $b_pic_1 = mysql_result( $resh_banners, $i, "b_pic" ) ;

    $b_link_1 = mysql_result( $resh_banners, $i, "b_link" ) ;

    if ( $b_pic_1 )
        echo "<a href='$b_link_1' target='_blank' rel='nofollow'><img src='userfiles/$b_pic_1' alt='' style='border:0px;'/></a>" ;

}

?>

			</div> -->







		<!--BANNER AFTER NEWS FEED END-->

		<!--BY CATEGORY START-->

		<?

if ( $act != "news" && $act != "pages" && $act != "prog" )
{

?>

		<div id="by_cat">

			<!--CATEGORIES LEFT START-->

			<div class="left">

				<?

    $resh = mysql_query( "SELECT * FROM `categories` WHERE `id`!=21 ORDER BY orderCode " ) ;

    $count = @mysql_num_rows( $resh ) ;

    for ( $i = 0; $i < $count; $i++ )
    {

        $c_id = mysql_result( $resh, $i, "id" ) ;

        $c_name = mysql_result( $resh, $i, "c_name_$lan" ) ;

        if ( $i == intval( $count / 2 ) && $i )
        {

?>

             </div>

					<!--CATEGORIES LEFT END-->

					<!--CATEGORIES RIGHT START-->

					<div class="right">

					<?

        }

?>

					<div class="cat">

						<div class="header">

							<h2><a href="?act=cat&amp;lan=<?=

        $lan

?>&amp;id=<?=

        $c_id

?>" class="cat_title"><?=

        $c_name

?></a></h2>

						</div>

						<ul>

						<?

        $resh_i = mysql_query( "SELECT * FROM `records` WHERE `r_category` = " . $c_id .
            " AND `r_show_" . $lan . "` > 0 Order by `r_ord` desc LIMIT 7" ) ;

        $count_i = @mysql_num_rows( $resh_i ) ;

        for ( $ii = 0; $ii < $count_i; $ii++ )
        {

            $r_id_r = mysql_result( $resh_i, $ii, "id" ) ;

            $r_title_r = mysql_result( $resh_i, $ii, "r_title_$lan" ) ;

            $r_pic_r = mysql_result( $resh_i, $ii, "r_pic" ) ;

            $r_short = mysql_result( $resh_i, $ii, "r_short_$lan" ) ;

            $r_video_r = mysql_result( $resh_i, $ii, "r_video_$lan" ) ;

            $r_date_r = mysql_result( $resh_i, $ii, "r_date" ) ;

            $r_date_r = trim( $r_date_r ) ;

            //$r_date_r = explode(".", $r_date_r);

            if ( $ii < 3 )
            {

?>

										<li><div class="image">

											 <a href="?act=news&amp;lan=<?=

                $lan

?>&amp;id=<?=

                $r_id_r

?>" rel="nofollow">

											 <?

                if ( $r_pic_r )
                {

?> <img src="userfiles/<?=

                    $r_pic_r

?>" alt="" /><?

                } else
                {

?>

											 <img src="s/i/no_image.png" alt="" />

											 <?

                }

?>

											 </a>

											</div>

										<h3><a href="?act=news&amp;lan=<?=

                $lan

?>&amp;id=<?=

                $r_id_r

?>"><?=

                $r_title_r

?></a>

											<nobr class='p_time'><?=

                $r_date_r

?></nobr></h3>

											<p><?=

                $r_short

?></p>

										</li>

									<?

            } elseif ( $ii == 3 )
            {

?></ul><ul class="older c<?=

                $i

?>"> <?

            }

            if ( $ii >= 3 )
            {

?><li><a href="?act=news&amp;lan=<?=

                $lan

?>&amp;id=<?=

                $r_id_r

?>"><?=

                $r_title_r

?></a></li>

                                <?

            }
        }

?>

					</ul>

						<div class="more mc<?=

        $i

?>">more</div>

						</div>

					<?

    }

?>			

			</div>

			<!--CATEGORIES RIGHT END-->

		</div>

		<?

}

?>

		<!--BY CATEGORY END-->

		<!--BOTTOM FLASH START-->







		<div id="bottom_flash">

		  <div id="slider-wrapper">

           <div id="slider" class="nivoSlider">

                <!-- <img src="userfiles/toystory.jpg" alt="" />

                <img src="userfiles/up.jpg" alt="" title="This is an example of a caption" />

                <img src="userfiles/walle.jpg" alt="" />

                <img src="userfiles/nemo.jpg" alt="" title="#htmlcaption" /> -->

			 <?

$resh = mysql_query( "SELECT * FROM `haxordumner` where  statuss='active' ORDER BY id " ) ;

$count = @mysql_num_rows( $resh ) ;

for ( $i = 0; $i < $count; $i++ )
{

    $id_h = mysql_result( $resh, $i, "id" ) ;

    $h_nkar = mysql_result( $resh, $i, "h_nkar" ) ;

?>



			 <img src="userfiles/<?=

    $h_nkar

?>" style='border: 1px solid #333333;'  alt=""/>

				<?

}

?>

           </div>

        </div>

			<!-- <img src="s/i/flash.png" alt="" /> -->

		</div>

		<!--BOTTOM FLASH END-->

	</div>

	<!--RIGHT BLOCK END-->

</div>

<!--BODY END-->

<div id="bottom_ban">

<?

$resh_banners = mysql_query( "SELECT * FROM `banners` WHERE `b_type` = '5' ORDER BY id desc" ) ;

$count_banners = @mysql_num_rows( $resh_banners ) ;

for ( $i = 0; $i < $count_banners; $i++ )
{

    $b_pic_1 = mysql_result( $resh_banners, $i, "b_pic" ) ;

    $b_link_1 = mysql_result( $resh_banners, $i, "b_link" ) ;

    if ( $b_pic_1 )
        echo "<a href='$b_link_1' target='_blank' rel='nofollow'><img src='userfiles/$b_pic_1' alt='' style='border:0px;'/></a>" ;

}



?>
<!-- VIDEO BLOG -->
		<div class="header noborder" style="background:#e4e4e4;border:1px solid #bfbfbf;height:18px;margin-top:20px;">
        <h2 <? if ( $lan == "en" )echo "Video" ;
               elseif( $lan == "ru" )echo "Видео" ;
               else echo 'onclick="document.location="http://www.youtube.com/user/yerkirmediatv?feature=results_main"" style="cursor:pointer;">Տեսանյութեր';?>
           <img src="s/i/video_f.png" style="margin-left:10px;" alt=''/></h2></div>
           <div id="top" style="margin-top:0px;">
           <div class='video_screenshots' style="margin:20px auto;width:895px;float:none">
           
				<ul>
    			<?
      $resh = mysql_query( "SELECT `id`, `r_pic`, `r_title_" . $lan .
        "` FROM `records` WHERE `r_category` > 0 AND `r_video_" . $lan .
        "`!='' AND `r_show_$lan` = 1 AND `id` NOT IN (" . $r_id_r_1 . "," . $r_id_r_2 .
        "," . $r_id_r_3 . ") Order by `r_ord` desc LIMIT 18 " ) ;
      $count = @mysql_num_rows( $resh ) ;
        for ( $i = 0; $i < $count; $i++ )
            {
                $v_id = mysql_result( $resh, $i, "id" ) ;
                $v_pic = mysql_result( $resh, $i, "r_pic" ) ;
                $v_title = mysql_result( $resh, $i, "r_title_". $lan ) ;
                echo '<li style="height:152px;">
    					<div><img src="userfiles/'.$v_pic.'" style="width:190px;height:152px;" alt="" /></div>
						<div class="asVideoDiv"><a href="?act=news&amp;lan='.$lan.'&amp;id='.$v_id.'#video">'.$v_title.'</a></div>
					  </li>' ;
               }
                ?>
				</ul>
         
			</div>
		</div>
        <!--END OF VIDEO BLOG-->
</div>



<? @mysql_close( $link ) ;?>

<!--FOOTER START-->

<?

if ( $lan == "en" )
{

?>

<div id="footer">

	<div class="left" style='height:56px;'>

		<p><i>&copy;</i> <?=

    date( "Y" )

?> Yerkir Media TV Company</p>

		<p>Republic of Armenia, Yerevan, N 94 Charents</p>

		<p>Phone. + 374 10 576512, Fax + 374 10 576540, <a href="?act=pages&amp;lan=<?=

    $lan

?>&amp;id=5">Contact Us</a></p>

	</div>

	<div class="right" style='height:56px;'>

		<p>News department:</p>

		<p>Phone. + 374 10 576498, <a href="?act=pages&amp;lan=<?=

    $lan

?>&amp;id=5">Contact Us</a></p>

	</div>



  <div class="developer"><a href="http://www.biznet.am/web-development/" title="Website development" target="_blank">Website development - Biznet</a></div>

  </div>



<?

} elseif ( $lan == "ru" )
{

?>

	<div id="footer">

  		<div class="left" style='height:56px;'>

		<p><i>&copy;</i> <?=

    date( "Y" )

?> Yerkir Media телевидение</p>

		<p>Республика Армении, г. Ерерван, ул.Чаренца,94</p>

		<p>Тел.: + 374 10 576512, Факс: + 374 10 576540, <a href="?act=pages&amp;lan=<?=

    $lan

?>&amp;id=5">Связаться с Нами</a></p>

	</div>

	<div class="right" style='height:56px;'>

		<p>Раздел новостей</p>

		<p>Тел.: + 374 10 576498, <a href="?act=pages&amp;lan=<?=

    $lan

?>&amp;id=5">Связаться с Нами</a></p>

	</div>

	<div class="developer"><a href='http://www.biznet.am/разработка-веб-сайтов/' target="_blank" title='Разработка ВЕБ сайтов'>Разработка сайтa - BizNet</a></div>

</div>



<?

} else
{

?>



<div id="footer">

<style type="text/css">

#responsive_map {height: 1080px; width: 100%;}

#responsive_map div {-webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;}

.gm-style-iw {max-width: none !important; min-width: none !important; max-height: none !important; min-height: none !important; overflow-y: hidden !important; overflow-x: hidden !important; line-height: normal !important; padding: 5px !important; }

</style>

	<div class="left" style='height:56px;'>

		<p><i>&copy;</i> <?=

    date( "Y" )

?> Yerkir Media Հեռուստաընկերություն</p>

		<p>Հայաստանի Հանրապետություն, Երեւան, Չարենցի N94</p>

		<p>Հեռ. + 374 10 576512, Ֆաքս + 374 10 576540, <a href="?act=pages&amp;lan=<?=

    $lan

?>&amp;id=5">Կապ</a></p>

	</div>

	<div class="right" style='height:56px;'>

		<p>Նորությունների բաժին:</p>

		<p>Հեռ. + 374 10 576498, <a href="?act=pages&amp;lan=<?=

    $lan

?>&amp;id=5">Կապ</a></p>

	</div>



    <img src="ym.jpg" alt="" style="display:none;" />

	<div class="developer"><a href='http://www.biznet.am/' target="_blank" title='Վեբ կայքերի պատրաստում'>Կայքի պատրաստում և սպասարկում` BizNet</a></div>



</div>

<?

}

?>







<!--FOOTER END-->















</body>
</html>
