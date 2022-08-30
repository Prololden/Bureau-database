<HTML><HEAD>
<?PHP
// Подключение к реляционной базе данных
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
require("on_podkl_db.php");
/* Справочник наименований таблиы базы данных */
$tbname1 = "Urovni";
$tbname2 = "Bezraboti";
$tbname3 = "Urovni_Bezraboti";


// Формирование одномерных массивов для элементов формы
// Однозначный список названий запчастей
// Таблица-справочник zapchast
$murovni = array();
$zapurovni = "SELECT * FROM ".$tbname1.";";
$resurovni = @mysql_query($zapurovni);	
$rowsurovni = @mysql_num_rows($resurovni);
$colsurovni = @mysql_num_fields($resurovni);
	if ($rowsurovni==0)
	{
	// echo "\n<FONT color=red><B>Отсутствуют данные в таблице-справочнике books реляционной базы данных ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>Отсутствуют данные в таблице-справочнике books!</B></FONT>";
	// echo "\n</DIV>";
	}
	else
	{
	// echo "\n<FONT color=red><B>Успешно выбраны данные из таблицы-справочника books реляционной базы данных ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>Успешно выбраны данные в таблице-справочнике books!</B></FONT>";
	// echo "\n</DIV>";
		while ($rowurovni = @mysql_fetch_array($resurovni))
		{
		// Элементы однозначного списка
		$murovni[$rowurovni['Kod_urovni']-1] = $rowurovni['Name'];
		}
	}


// Однозначный список фирм
// Таблица-справочник postavchik
$mbezraboti = array();
$zapbezraboti = "SELECT * FROM ".$tbname2.";";
$resbezraboti = @mysql_query($zapbezraboti);	
$rowsbezraboti = @mysql_num_rows($resbezraboti);
$colsbezraboti = @mysql_num_fields($resbezraboti);
	if ($rowsbezraboti==0)
	{
	// echo "\n<FONT color=red><B>Отсутствуют данные в таблице-справочнике autors реляционной базы данных ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>Отсутствуют данные в таблице-справочнике autors!</B></FONT>";
	// echo "\n</DIV>";
	}
	else
	{
	// echo "\n<FONT color=red><B>Успешно выбраны данные из таблицы-справочника autors реляционной базы данных ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>Успешно выбраны данные в таблице-справочнике autors!</B></FONT>";
	// echo "\n</DIV>";
		while ($rowbezraboti = @mysql_fetch_array($resbezraboti))
		{
		// Элементы однозначного списка
		$mbezraboti[$rowbezraboti['Kod_bezraboti']-1] = $rowbezraboti['FIO']." ".$rowbezraboti['Data_rogdenia'];
		}
	}


?>
<HR color=green size=2>
<DIV align=center>
<FONT color=blue><B>Добавление безработных</B></FONT>
</DIV>
<HR color=green size=2>
<DIV align=justify>
<!-- Вывод формы для добавления информации о соответствия поставщиков и запчастей -->
<FORM name=fba method=POST>
<TABLE border=0 bordercolor=green cellspacing=0>

<TR valign=top>
<TD>Наименование уровеня</TD>
<TD>
<SELECT name=fbks[]>
<OPTION value=-1>Выберите уровень</OPTION>
<?PHP
	for ($i=0;$i<count($murovni);$i++)
	{
	echo "<OPTION value=".$i.">".$murovni[$i]."</OPTION>\n";
	}
?>
</SELECT>
</TD>
</TR>

<TR valign=top>
<TD>Безрабтные</TD>
<TD>
<SELECT name=fauts[]>
<OPTION value=-1>Выберите безработных</OPTION>
<?PHP
	for ($i=0;$i<count($mbezraboti);$i++)
	{
	echo "<OPTION value=".$i.">".$mbezraboti[$i]."</OPTION>\n";
	}
?>
</SELECT></TD></TR>

<TR align=center>
<TD><INPUT type=submit name=addbkauts value="Добавление безработных"></INPUT></TD>
<TD><INPUT type=reset value="Отмена"></INPUT></TD></TR>
</TABLE></FORM>
</DIV>
<?PHP
// Добавление записи данных в таблицу post_zap базы данных ".$dbname."
	if (isset($_POST['addbkauts']))
	{
	// Получение данных из однозначного списка наименований запчастей
	$vbooks = 0;
		for ($i=0;$i<count($_POST['fbks']);$i++)
		{
		$vbooks++;
		settype($_POST['fbks'][$i], integer);
		$addurovni = $_POST['fbks'][$i]+1;
		}
	// Получение данных из однозначного списка Фирма Директор Адрес Телефон
	$vautors = 0;
		for ($i=0;$i<count($_POST['fauts']);$i++)
		{
		$vautors++;
		settype($_POST['fauts'][$i], integer);
		$addbezraboti = $_POST['fauts'][$i]+1;
		}
	// Добавление записи данных в таблицу post_zap базы данных ".$dbname."
	$zapaddbkauts = "INSERT INTO ".$tbname3."
	(
	Kod_Urovni_Bezraboti,Kod_urovni,Kod_bezraboti
	)
	VALUES
	(
	NULL, '".$addurovni."', '".$addbezraboti."'
	);";
	$resaddbkauts = @mysql_query($zapaddbkauts);
	}
	

// Вывод записей данных из таблицы post_zap базы данных ".$dbname."
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);

$zapbkauts = "SELECT * FROM ".$tbname3.";";
$resbkauts = @mysql_query($zapbkauts);
	if (!$resbkauts)
	{
	// echo "\n<FONT color=red><B>Записи данных из таблицы books_authors реляционной базы данных ".$dbname." не могут быть выведены!</B></FONT><BR>";
	echo "\n<HR color=green size=2>";
	echo "\n<DIV align=center>";
	echo "\n<FONT color=red><B>Записи данных из таблиц не могут быть выведены!</B></FONT>";
	echo "\n</DIV>";
	}
	else
	{
	$rowsbkauts = @mysql_num_rows($resbkauts);
	$colsbkauts = @mysql_num_fields($resbkauts);
		if ($rowsbkauts==0)
		{
		// echo "\n<FONT color=red><B>Отсутствуют данные в таблице post_zap реляционной базы данных ".$dbname."!</B></FONT>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		echo "\n<FONT color=red><B>Отсутствуют данные в таблице безработных!</B></FONT>";
		echo "\n</DIV>";
		}
		else
		{
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		// echo "\n<FONT color=red><B>Вывод записей данных из таблицы post_zap реляционной базы данных ".$dbname."!</B></FONT>";
		echo "\n<FONT color=blue><B>Вывод записей данных из таблицы безработных</B></FONT>";
		echo "\n</DIV>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=justify>";
		echo "\n<TABLE border=1 bordercolor=green cellspacing=0 cellpadding=2 width=100%>";
		// Вывод строки заголовка записей данных
		echo "\n<TR valign=top align=center width=100% bgcolor=#7FFFD4>";
		echo "\n<TD><B>№</B></TD>";
		echo "\n<TD><B>Ключ</B></TD>";
		echo "\n<TD><B>Название уровня образования</B></TD>";
		echo "\n<TD><B>ФИО Дата рождения безработного</B></TD>";
		echo "\n</TR>";
		// Вывод записей данных из взаимосвязанных таблиц реляционной базы данных ".$dbname."
		$n = 0;
			while ($rowbkauts = @mysql_fetch_array($resbkauts))
			{
			echo "\n<TR valign=top width=100% ";
				if ($n%2 == 0)
				{
				echo "bgcolor=#FFFFFF";
				}
				else
				{
				echo "bgcolor=#E0FFFF";
				}
			echo ">\n<TD align=center><B>".($n+1)."</B></TD>";
			
			// Вывод данных из ключевого поля таблицы post_zap реляционной базы данных ".$dbname."!
			settype($rowbkauts['Kod_Urovni_Bezraboti'], integer);
			echo "\n<TD>".$rowbkauts['Kod_Urovni_Bezraboti']."</TD>";
			
			// Вывод данных из однозначного списка согласно таблице zap реляционной базы данных
			$zapurovni = "SELECT ".$tbname1.".Name FROM ".$tbname1." WHERE ".$tbname1.".Kod_urovni=".$rowbkauts['Kod_urovni'].";";
			$resurovni = @mysql_query($zapurovni);	
			$rowsurovni = @mysql_num_rows($resurovni);
			$colsurovni = @mysql_num_fields($resurovni);
			echo "\n<TD>";
				if ($rowsurovni==0)
				{
				// echo "Отсутствуют данные в таблице zap реляционной базы данных ".$dbname."!";
				echo "Не выбрано наименование уровня образования";
				}
				else
				{
				//echo "Данные из таблицы zap реляционной базы данных ".$dbname." успешно выбраны!";
					while ($rowurovni = @mysql_fetch_array($resurovni))
					{
					settype($rowurovni['Name'], string);
					echo trim($rowurovni['Name']);
					}
				}
			echo "</TD>";
			
			// Вывод данных из однозначного списка согласно таблице postavchik реляционной базы данных
			$zapbezraboti = "SELECT ".$tbname2.".FIO, ".$tbname2.".Data_rogdenia FROM ".$tbname2." 
			WHERE ".$tbname2.".Kod_bezraboti=".$rowbkauts['Kod_bezraboti'].";";
			$resbezraboti = @mysql_query($zapbezraboti);	
			$rowsbezraboti = @mysql_num_rows($resbezraboti);
			$colsbezraboti = @mysql_num_fields($resbezraboti);
			echo "\n<TD>";
				if ($rowsbezraboti==0)
				{
				// echo "Отсутствуют данные в таблице postavchik реляционной базы данных ".$dbname."!";
				echo "Не выбран безработный";
				}
				else
				{
				//echo "Данные из таблицы postavchik реляционной базы данных ".$dbname." успешно выбраны!";
					while ($rowbezraboti = @mysql_fetch_array($resbezraboti))
					{
					settype($rowbezraboti['FIO'], string);
					settype($rowbezraboti['Data_rogdenia'], string);
					echo trim($rowbezraboti['FIO']." ".$rowbezraboti['Data_rogdenia']);
					}
				}
			echo "</TD>";
			echo "\n</TR>";
			}
		$n++;
		}
	echo "\n</TABLE>";
	echo "\n</DIV>";
	}

@mysql_close($MyLink);		
?>
<HR color=green size=2>
</BODY>
</HTML>