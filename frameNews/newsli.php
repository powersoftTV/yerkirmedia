<?

$config['lang'] = (isset($_GET['l'])) ? $_GET['l'] : "am";

if($config['lang']=='hy') $config['lang']='am';

//if(!isset($config['lang']))
//        $config['lang'] = "am";




$defaultSaytNumber = 0;
include 'newsli_sayts.php';


echo "<div id='divContainerNewsli'>";

//if ($config['lang'] == "ru")
//	echo  "<img src='./img/rus.png' width='26px' height='26px' border='0'>&nbsp;&nbsp;<a href='?l=am'><img src='./img/arm.png' width='26px' height='26px' title='arm' alt='arm' border='0'></a>&nbsp;&nbsp;<a href='?l=en'><img src='./img/eng.png' width='26px' height='26px' title='eng' alt='eng' border='0'></a><br />";
//else if ($config['lang'] == "en")
//	echo  "<a href='?l=ru'><img src='./img/rus.png' width='26px' height='26px' title='rus' alt='rus' border='0'></a>&nbsp;&nbsp;<a href='?l=am'><img src='./img/arm.png' width='26px' height='26px' title='arm' alt='arm' border='0'></a>&nbsp;&nbsp;<img src='./img/eng.png' width='26px' height='26px' title='eng' alt='eng' border='0'><br />";
//else if ($config['lang'] == "am")
//	echo  "<a href='?l=ru'><img src='./img/rus.png' width='26px' height='26px' title='rus' alt='rus' border='0'></a>&nbsp;&nbsp;<img src='./img/arm.png' width='26px' height='26px'  border='0'>&nbsp;&nbsp;<a href='?l=en'><img src='./img/eng.png' width='26px' height='26px' title='eng' alt='eng' border='0'></a><br />";


if ($config['lang'] == "ru")
{
        $modulenewsliTitle = 'Последние новости ведущих информационных сайтов';
        $categorynewsliTitle_Haykakan = 'Армянские информационные сайты';
        $categorynewsliTitle_Taracashrjanayin = 'Региональные информационные сайты';
        $categorynewsliTitle_Mamul = 'Пресса';
}
else  if ($config['lang'] == "en")
{
        $modulenewsliTitle = 'The last news from the leading informative sites';
        $categorynewsliTitle_Haykakan = 'Informative sites of Armenia';
        $categorynewsliTitle_Taracashrjanayin = 'Informative sites of Region';
        $categorynewsliTitle_Mamul = 'Press';
}
else
{
        $modulenewsliTitle = 'Առաջատար տեղեկատվական կայքերի վերջին նորությունները';
        $categorynewsliTitle_Haykakan = 'Հայկական լրատվական կայքեր';
        $categorynewsliTitle_Taracashrjanayin = 'Տարածաշրջանային լրատվական կայքեր';
        $categorynewsliTitle_Mamul = 'Մամուլ';
}

echo "<span class='module_newsli_title'>$modulenewsliTitle</span>";
echo "<div id='divSaytsNewsli'>";
echo "<select id='comboNews' name='comboNews'  onchange='change_category(this.value);'>";

for($i = 0; $i < count($rss); $i++) {

/*
	    if($rssT[$i] == "www.azatutyun.am")
        {
                echo '<option value=\'\' title=\''.$categorynewsliTitle_Haykakan.'\' disabled  class="comboNews_item"> - '.$categorynewsliTitle_Haykakan.'</option>';
        }
        else 
		*/
		if($rssT[$i] == "www.regnum.ru")
        {
                echo '<option value=\'\' title=\''.$categorynewsliTitle_Taracashrjanayin.'\' disabled class="comboNews_item"> - '.$categorynewsliTitle_Taracashrjanayin.'</option>';
        }
		/*
        else if($rssT[$i] == "www.aravot.am")
        {
                echo '<option value=\'\' title=\''.$categorynewsliTitle_Mamul.'\' disabled  class="comboNews_item"> - '.$categorynewsliTitle_Mamul.'</option>';
        }
		*/


        if($i == $defaultSaytNumber)
        {
                echo '<option value="'.$rss[$i].'" title=\''.$rssT[$i].'\' selected >'.$rssT[$i].'</option>';
        }
        else
                echo '<option value="'.$rss[$i].'" title=\''.$rssT[$i].'\' >'.$rssT[$i].'</option>';
}

echo "</select>";
echo "</div><br />";





echo "<div id='divContentNewsli'>";
include "newsli_content.php";
echo "</div>";

echo "<div id='imgLoading' style='display: none'>";
echo "<img align='center' src='img/loadingB.gif'>";
echo "</div>";




echo "</div>";


?>


<script src="js/newsli.js" type="text/javascript"></script>
