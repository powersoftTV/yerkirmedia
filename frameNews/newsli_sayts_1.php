<?php
$tRss = "" ;

if ( $config['lang'] == "am" )
    $tRss = 'http://hetq.am/arm/rss/news/' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://hetq.am/eng/rss/news/' ;
    else
        $tRss = 'http://hetq.am/rus/rss/news/' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.hetq.am" ;
    $rssI[] = "hetqam.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://panorama.am/rss/?lang=am' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://panorama.am/rss/?lang=en' ;
    else
        $tRss = 'http://panorama.am/rss/?lang=ru' ;

if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.panorama.am" ;
    $rssI[] = "panoramaam.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://news.am/arm/rss/' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://news.am/eng/rss/' ;
    else
        $tRss = 'http://news.am/rus/rss/' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.news.am" ;
    $rssI[] = "newsam.jpg" ;
    $menu[] = 1 ;
}




$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://www.azatutyun.am/rss/?count=50' ;
else
    $tRss = 'http://rus.azatutyun.am/rss/?count=50' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.azatutyunam.am" ;
    $rssI[] = "azatutyunam.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://www.yerkir.am/rss/rss.php?lang=am' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.yerkir.am" ;
    $rssI[] = "yerkiram.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://www.aravot.am/feed/' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://www.aravot.am/en/feed/' ;
    else
        $tRss = 'http://www.aravot.am/ru/feed/' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.aravot.am" ;
    $rssI[] = "mamul/aravotam.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://report.am/?external=1$itpl=default/rss.tpl.html$type=rss' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.report.am" ;
    $rssI[] = "reportam.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://kinoashkharh.am/feed' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.kinoashkharh.am" ;
    $rssI[] = "kinoashkharham.jpg" ;
    $menu[] = 1 ;
}

$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://www.tert.am/rss/' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://www.tert.am/rss/?language=en' ;
    else
        $tRss = 'http://www.tert.am/rss/?language=ru' ;

if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.tert.am" ;
    $rssI[] = "tertam.jpg" ;
    $menu[] = 1 ;
}



$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://1in.am/arm/rss_.html' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://1in.am/eng/rss_.html' ;
    else
        $tRss = 'http://1in.am/rus/rss_.html' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.1in.am" ;
    $rssI[] = "1inam.jpg" ;
    $menu[] = 1 ;
}


$tRss = "" ;

if ( $config['lang'] == "am" )
    $tRss = 'http://hetq.am/arm/rss/news/' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://hetq.am/eng/rss/news/' ;
    else
        $tRss = 'http://hetq.am/rus/rss/news/' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.hetq.am" ;
    $rssI[] = "hetqam.jpg" ;
    $menu[] = 1 ;
}

$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://www.a1plus.am/am/rss' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://www.a1plus.am/en/rss' ;
    else
        $tRss = 'http://www.a1plus.am/ru/rss' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.a1plus.am" ;
    $rssI[] = "a1plusam.jpg" ;
    $menu[] = 1 ;
}



$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://lurer.com/?l=am$to=rss' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://lurer.com/?l=en$to=rss' ;
    else
        $tRss = 'http://lurer.com/?l=ru$to=rss' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.lurer.com" ;
    $rssI[] = "lurercom.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://168.am/feed' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.168.am" ;
    $rssI[] = "mamul/168am.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://7or.am/am/feed' ;
else
    if ( $config['lang'] == "en" )
        $tRss = 'http://7or.am/en/feed' ;
    else
        $tRss = 'http://7or.am/ru/feed' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.7or.am" ;
    $rssI[] = "7oram.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://www.hraparak.am/feed/' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.hraparak.am" ;
    $rssI[] = "mamul/hraparakam.jpg" ;
    $menu[] = 1 ;
}
$tRss = "" ;
if ( $config['lang'] == "am" )
    $tRss = 'http://www.golosarmenii.am/rss/' ;
else
    if ( $config['lang'] == "ru" )
        $tRss = 'http://www.golosarmenii.am/rss/' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.golosarmenii.am" ;
    $rssI[] = "mamul/golosarmeniiam.jpg" ;
    $menu[] = 1 ;
}


$tRss = "" ;
$tRss = 'http://www.regnum.ru/rss/index.xml' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.regnum.ru" ;
    $rssI[] = "regnumru.jpg" ;
    $menu[] = 2 ;
}

$tRss = "" ;
$tRss = 'http://news.day.az/rss/all.rss' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.day.az" ;
    $rssI[] = "dayaz.jpg" ;
    $menu[] = 2 ;
}

$tRss = "" ;
$tRss = 'http://lenta.ru/rss/' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.lenta.ru" ;
    $rssI[] = "lentaru.jpg" ;
    $menu[] = 2 ;
}

$tRss = "" ;
$tRss = 'http://www.apsny.ge/RSS.xml' ;
if ( $tRss )
{
    $rss[] = $tRss ;
    $rssT[] = "www.apsny.ge" ;
    $rssI[] = "apsnyge.jpg" ;
    $menu[] = 2 ;
}

?>