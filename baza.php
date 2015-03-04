<?PHP

	define('DB_CLASS', 'db_mysql');
	define('DB_HOST', 'localhost');
	define('DB_USER', 'yerkir_karen');
	define('DB_PASSWORD', 'Power2013');
	define('DB_BASE_NAME', 'yerkir_yerkirtv');
	define('DB_SELECT', 'yerkir_yerkirtv');
	define('DB_DUMP_FILE', 'D:\AppServ\MySQL\bin\mysqldump.exe');
	define('DB_CACHE', FALSE);


$link = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die(mysql_error());
$db=mysql_select_db(DB_SELECT, $link);
if(!mysql_query("SET NAMES UTF8"))die(mysql_error());

?>
