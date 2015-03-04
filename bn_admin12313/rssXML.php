<?
$xml='<?xml version="1.0" encoding="UTF-8"?>';

//include "../baza.php";

$xml.='<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>';

$xml.='<channel>
		<title>Երկիր Մեդիա - Նորություններ</title>
		<atom:link href="http://www.yerkirmedia.am/rss.php" rel="self" type="application/rss+xml" />
		<link>http://www.yerkirmedia.am</link>
		<lastBuildDate>'.date("c").'</lastBuildDate>
		<generator>http://www.biznet.am/</generator>
		<language>hy</language>
		<sy:updatePeriod>hourly</sy:updatePeriod>
		<sy:updateFrequency>1</sy:updateFrequency>';

$resh = mysql_query("SELECT records.*,categories.c_name_hy FROM `records` LEFT JOIN `categories` ON records.r_category=categories.id WHERE `r_category`>0 AND `r_show_hy`>0 Order by id desc LIMIT 0,80");
	while($item = @mysql_fetch_array($resh)) {
		$xml.='<item> 
			<title>'.$item['r_title_hy'].'</title>
			<link>http://www.yerkirmedia.am/?act=news&amp;lan=hy&amp;id='.$item['id'].'</link>
			<pubDate>'.$item['r_date'].'</pubDate>
			<category>'.$item['c_name_hy'].'</category>
			<description><![CDATA['.$item['r_short_hy'].']]></description>
			<content:encoded><![CDATA['.$item['r_short_hy'].']]></content:encoded>
		</item>';
	}//r_text_hy
	
$xml.='</channel>
</rss>';

$fh = fopen('../rss.xml', 'w');
fwrite($fh, $xml);
fclose($fh);
?>