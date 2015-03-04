<?php


if ($config['lang'] == "ru")
{
        $errorInfoMsgnewsli = "На данный момент информация этого сайта недоступна";
}
else  if ($config['lang'] == "en")
{
        $errorInfoMsgnewsli = "Currently the information of this website is not available";
}
else
{
        $errorInfoMsgnewsli = "Ընտրված կայքի տեղեկատվությունը տվյալ պահին անհասանելի է";
}


$rss_url = (isset($_POST['rss_url'])) ? $_POST['rss_url'] : $rss[$defaultSaytNumber];
ini_set('user_agent', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko/20100101 Firefox/16.0');
if($rss_url=="http://lurer.com/?l=am" || $rss_url=="http://lurer.com/?l=en" || $rss_url=="http://lurer.com/?l=ru")$rss_url=$rss_url."&to=rss";

$rss_li =@simplexml_load_file($rss_url);

$idNewsli = 0;
if($rss_li ->channel->item != "null")
{
        foreach ($rss_li ->channel->item as $item){

                $image_src =  $image_src_temp = "";
                $att = "url";
                if(isset($item->enclosure))
                        $image_src_temp = (string) $item->enclosure->attributes()->$att;

                if( $image_src_temp != "")  //delete-> $idC == 0
                {
                        if(substr($image_src_temp, 0, 4) != "http")
                                $image_src_temp = "http://".$rssT[$idC]."".$image_src_temp;

                        //$strPicSize = resize($image_src_temp, 100, 80);
                        $strPicSize = "width='60px' height='50px'";

                        $image_src = "<img align='left' src='".$image_src_temp."' ".$strPicSize." hspace='5' vspace='2'>";
                }



                $linkPr = (string) $item->link;

                $DatePr   = (string) $item->pubDate; // Data
                $DatePr = date('d.m.Y H:i', strtotime( $DatePr ));

                $TitlePr = strip_tags((string) $item->title);

                $DescriptionPr = strip_tags((string) $item->description);

                echo "<div id=newsli_".$idNewsli." class='newsli' >";
                echo $image_src." <span class='newsli_Date'>".$DatePr."</span><br /><span class='newsli_Title'>".$TitlePr."</span>";
                echo "</div>";
                echo "<div id='block_newsli_".$idNewsli."' style='display:none; text-align:left;'>";
                echo "<span class='newsli_Description'>".$DescriptionPr." <a href='".$linkPr."' target='_blank'><img title='more...' src='img/cont_right.gif' width='10px' height='7px' alt='more...' border='0'></a></span>";
                echo "</div>";
                echo "<div class='newsli_hr' ></div>";

                $idNewsli++;
                if($idNewsli > 12)
                        break;
        }
}

if($idNewsli == 0)
        echo "<span class='newsli_error'>".$errorInfoMsgnewsli."</span>";
?>

<script type="text/javascript">
jQuery(".newsli").click(function () {


        if (jQuery("#block_" + this.id).is(":hidden")) {

                jQuery("#block_" + this.id).fadeIn("normal");

        } else {

                jQuery("#block_" + this.id).fadeOut("normal");

        }

});
</script>