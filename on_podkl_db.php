<HTML><HEAD>
<?PHP
// ��������� ���������
$zapkod = "SET NAMES 'cp1251'";
$reskod = @mysql_query($zapkod);
// ����������� � C��� MySQL
$Host = 'localhost';
$User = 'root';
$Password = '';
	if (!@mysql_connect($Host, $User, $Password))
	{
	//echo "\n<FONT color=red><B>C��� MySQL �� ����� ���� ����������!</B></FONT><BR>";
	exit;
	}
	else
	{
	$MyLink = @mysql_connect($Host, $User, $Password);
	//echo "\n<FONT color=blue><B>C��� MySQL ������� ����������!</B></FONT><BR>";
	// ������ � ����������� ����� ������
	global $dbname;
	$dbname = 'Buro';
	// ����������� � ����������� ���� ������
	$zapdb03 = "USE ".$dbname.";";
	$resdb03 = @mysql_query($zapdb03);
		if (!$resdb03)
		{
		//echo "\n<FONT color=red><B>���������� ���������� ����������� ���� ������ ".$dbname."!</B></FONT><BR>";
		exit;
		}
		else
		{
		//echo "\n<FONT color=blue><B>����������� ���� ������ ".$dbname." ������� ����������!</B></FONT><BR>";
		// ��������� ���������
		$zapkod = "SET NAMES 'cp1251'";
		$reskod = @mysql_query($zapkod);
			if (!$reskod)
			{
			//echo "\n<FONT color=red><B>���������� ���������� ��������� ��� ����������� ���� ������ ".$dbname."!</B></FONT><BR>";
			exit;
			}
			else
			{
			//echo "\n<FONT color=blue><B>��������� ��� ����������� ���� ������ ".$dbname." ������� �����������!</B></FONT><BR>";
			}
		}
	}
?>
</BODY>
</HTML>