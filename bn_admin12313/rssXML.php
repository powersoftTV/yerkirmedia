<?
date_default_timezone_set('Asia/Yerevan');
//include_once "../baza.php";
function strtotimestamp($str){
	$temp=explode(":",$str);
	$hour=trim($temp[0]);
	$temp2=explode(".",$temp[1]);
	$minut=trim($temp2[0]);
	$date=trim($temp2[1]);
	$temp=explode("/",$date);
	$day=trim($temp[0]);
	$month=trim($temp[1]);
	$year=trim($temp[2]);
	$year=2000+$year;
	$string=$year."-".$month."-".$day." ".$hour.":".$minut;
	$t=strtotime($string);
	return $t;
}
$xml='<?xml version="1.0" encoding="UTF-8"?><!--  Generated on '.date(DATE_RSS).'  --><rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
$xml.='<channel>
        <atom:link href="http://www.yerkirmedia.am/rss.xml" rel="self" type="application/rss+xml" />
		<title>Երկիր Մեդիա - Նորություններ</title>
		<link>http://www.yerkirmedia.am</link>
        <description>Երկիր Մեդիա - Նորություններ</description>
        <generator>yerkirmedia.am RSS Feed Generator</generator>
		<lastBuildDate>'.date(DATE_RSS).'</lastBuildDate>        
		<language>hy</language>';
        

$resh = mysql_query("SELECT records.*,categories.c_name_hy FROM `records` LEFT JOIN `categories` ON records.r_category=categories.id WHERE `r_category`>0 AND `r_show_hy`>0 Order by id desc LIMIT 0,80");
	while($item = @mysql_fetch_array($resh)) {
        $url=urlencode($item['r_pic']);
        $url=str_replace("+","%20",$url);
		$xml.='<item>
                 <title><![CDATA['.$item['r_title_hy'].']]></title>
                 <link>http://www.yerkirmedia.am/?act=news&amp;lan=hy&amp;id='.$item['id'].'</link>
                 <description><![CDATA['.$item['r_short_hy'].']]></description>
                 <pubDate>'.date(DATE_RSS, strtotimestamp($item['r_date'])).'</pubDate>
                 <guid  isPermaLink="true">http://www.yerkirmedia.am/?act=news&amp;lan=hy&amp;id='.$item['id'].'</guid>
			     <enclosure url="http://www.yerkirmedia.am/userfiles/'.$url.'" length="'.filesize("../userfiles/".$item['r_pic']).'" type="image/jpeg" />
			     </item>';
	}//r_text_hy
	
$xml.='</channel>
</rss>';

$fh = fopen('../rss.xml', 'w');
fwrite($fh, $xml);
fclose($fh);
$xml='<?xml version="1.0" encoding="UTF-8"?><!--  Generated on '.date(DATE_RSS).'  --><rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
$xml.='<channel>
        <atom:link href="http://www.yerkirmedia.am/ru_rss.xml" rel="self" type="application/rss+xml"/>
		<title>Еркир Медиа - новости</title>
		<link>http://www.yerkirmedia.am/lan=ru</link>
	    <description>Еркир Медиа - новости</description>
        <generator>yerkirmedia.am RSS Feed Generator</generator>
        <lastBuildDate>'.date(DATE_RSS).'</lastBuildDate>
		<language>ru</language>';

$resh = mysql_query("SELECT records.*,categories.c_name_ru FROM `records` LEFT JOIN `categories` ON records.r_category=categories.id WHERE `r_category`>0 AND `r_show_ru`>0 Order by id desc LIMIT 0,80");
	while($item = @mysql_fetch_array($resh)) {
        $url=urlencode($item['r_pic']);
        $url=str_replace("+","%20",$url);
		$xml.='<item> 
			<title><![CDATA['.$item['r_title_ru'].']]></title>
			<link>http://www.yerkirmedia.am/?act=news&amp;lan=ru&amp;id='.$item['id'].'</link>
            <description><![CDATA['.$item['r_short_ru'].']]></description>
            <pubDate>'.date(DATE_RSS, strtotimestamp($item['r_date'])).'</pubDate>
			<guid  isPermaLink="true">http://www.yerkirmedia.am/?act=news&amp;lan=ru&amp;id='.$item['id'].'</guid>
            <enclosure url="http://www.yerkirmedia.am/userfiles/'.$url.'" length="'.filesize("../userfiles/".$item['r_pic']).'" type="image/jpeg" />
            </item>';
	}//r_text_RU
	
$xml.='</channel>
</rss>';
$fh = fopen('../ru_rss.xml', 'w');
fwrite($fh, $xml);
fclose($fh);

$xml='<?xml version="1.0" encoding="UTF-8"?><!--  Generated on '.date(DATE_RSS).'  --><rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
$xml.='<channel>
        <atom:link href="http://www.yerkirmedia.am/en_rss.xml" rel="self" type="application/rss+xml" />
		<title>Yerkir media - news</title>
		<link>http://www.yerkirmedia.am/lan=en</link>
        <description>Yerkir media - news</description>
        <generator>yerkirmedia.am RSS Feed Generator</generator>
        <lastBuildDate>'.date(DATE_RSS).'</lastBuildDate>
		<language>en</language>';

$resh = mysql_query("SELECT records.*,categories.c_name_en FROM `records` LEFT JOIN `categories` ON records.r_category=categories.id WHERE `r_category`>0 AND `r_show_en`>0 Order by id desc LIMIT 0,80");
	while($item = @mysql_fetch_array($resh)) {
	    $url=urlencode($item['r_pic']);
        $url=str_replace("+","%20",$url);
		$xml.='<item> 
			<title><![CDATA['.$item['r_title_en'].']]></title>
			<link>http://www.yerkirmedia.am/?act=news&amp;lan=en&amp;id='.$item['id'].'</link>
            <description><![CDATA['.$item['r_short_en'].']]></description>
            <pubDate>'.date(DATE_RSS, strtotimestamp($item['r_date'])).'</pubDate>
			<guid  isPermaLink="true">http://www.yerkirmedia.am/?act=news&amp;lan=en&amp;id='.$item['id'].'</guid>
            <enclosure url="http://www.yerkirmedia.am/userfiles/'.$url.'" length="'.filesize("../userfiles/".$item['r_pic']).'" type="image/jpeg" />
			</item>';
	}//r_text_hy
	
$xml.='</channel>
</rss>';
$fh = fopen('../en_rss.xml', 'w');
fwrite($fh, $xml);
fclose($fh);
?>