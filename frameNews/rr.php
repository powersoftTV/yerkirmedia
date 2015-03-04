<?php

/**
 * @author aaaaa
 * @copyright 2015
 */
ini_set('user_agent', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:16.0) Gecko/20100101 Firefox/16.0');
$xml = simplexml_load_file('http://lurer.com/?l=am&to=rss');
 
print_r($xml);

?>