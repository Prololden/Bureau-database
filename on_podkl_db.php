<HTML><HEAD>
<?PHP
// Установка кодировки
$zapkod = "SET NAMES 'cp1251'";
$reskod = @mysql_query($zapkod);
// Подключение с CУБД MySQL
$Host = 'localhost';
$User = 'root';
$Password = '';
	if (!@mysql_connect($Host, $User, $Password))
	{
	//echo "\n<FONT color=red><B>CУБД MySQL не может быть подключена!</B></FONT><BR>";
	exit;
	}
	else
	{
	$MyLink = @mysql_connect($Host, $User, $Password);
	//echo "\n<FONT color=blue><B>CУБД MySQL успешно подключена!</B></FONT><BR>";
	// Работа с реляционной базой данных
	global $dbname;
	$dbname = 'Buro';
	// Подключение к реляционной базе данных
	$zapdb03 = "USE ".$dbname.";";
	$resdb03 = @mysql_query($zapdb03);
		if (!$resdb03)
		{
		//echo "\n<FONT color=red><B>Невозможно подключить реляционную базу данных ".$dbname."!</B></FONT><BR>";
		exit;
		}
		else
		{
		//echo "\n<FONT color=blue><B>Реляционная база данных ".$dbname." успешно подключена!</B></FONT><BR>";
		// Установка кодировки
		$zapkod = "SET NAMES 'cp1251'";
		$reskod = @mysql_query($zapkod);
			if (!$reskod)
			{
			//echo "\n<FONT color=red><B>Невозможно установить кодировку для реляционной базы данных ".$dbname."!</B></FONT><BR>";
			exit;
			}
			else
			{
			//echo "\n<FONT color=blue><B>Кодировка для реляционной базы данных ".$dbname." успешно установлена!</B></FONT><BR>";
			}
		}
	}
?>
</BODY>
</HTML>