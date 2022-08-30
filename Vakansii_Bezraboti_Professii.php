<HTML><HEAD>
<?PHP
// Подключение к реляционной базе данных
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
require("on_podkl_db.php");
/* Справочник наименований таблиы базы данных */
$tbname1 = "Vakansii";
$tbname2 = "Bezraboti";
$tbname3 = "Professii";
$tbname4 = "Vakansii_Bezraboti_Professii";


// Формирование одномерных массивов для элементов формы
// Однозначный список названий запчастей
// Таблица-справочник zapchast
$mvakansii = array();
$zapvakansii = "SELECT * FROM ".$tbname1.";";
$resvakansii = @mysql_query($zapvakansii);	
$rowsvakansii = @mysql_num_rows($resvakansii);
$colsvakansii = @mysql_num_fields($resvakansii);
	if ($rowsvakansii==0)
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
		while ($rowvakansii = @mysql_fetch_array($resvakansii))
		{
		// Элементы однозначного списка
		$mvakansii[$rowvakansii['Kod_vakansii']-1] = $rowvakansii['Stag'];
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

// Однозначный список фирм
// Таблица-справочник postavchik
$mprofessii = array();
$zapprofessii  = "SELECT * FROM ".$tbname3.";";
$resprofessii  = @mysql_query($zapprofessii );	
$rowsprofessii  = @mysql_num_rows($resprofessii );
$colsprofessii  = @mysql_num_fields($resprofessii );
	if ($rowsprofessii ==0)
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
		while ($rowprofessii  = @mysql_fetch_array($resprofessii ))
		{
		// Элементы однозначного списка
		$mprofessii [$rowprofessii ['Kod_professii']-1] = $rowprofessii ['Nazvanie'];
		}
	}

?>
<HR color=green size=2>
<DIV align=center>
<FONT color=blue><B>Добавление вакансий</B></FONT>
</DIV>
<HR color=green size=2>
<DIV align=justify>
<!-- Вывод формы для добавления информации о соответствия поставщиков и запчастей -->
<FORM name=fba method=POST>
<TABLE border=0 bordercolor=green cellspacing=0>

<TR valign=top>
<TD>Наименование вакансий</TD>
<TD>
<SELECT name=fbks[]>
<OPTION value=-1>Выберите вакансию</OPTION>
<?PHP
	for ($i=0;$i<count($mvakansii);$i++)
	{
	echo "<OPTION value=".$i.">".$mvakansii[$i]."</OPTION>\n";
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
</SELECT>
</TD>
</TR>

<TR valign=top>
<TD>Профессии</TD>
<TD>
<SELECT name=flks[]>
<OPTION value=-1>Выберите профессию</OPTION>
<?PHP
	for ($i=0;$i<count($mprofessii);$i++)
	{
	echo "<OPTION value=".$i.">".$mprofessii[$i]."</OPTION>\n";
	}
?>
</SELECT>
</TD>
</TR>

<TR align=center>
<TD><INPUT type=submit name=addbkauts value="Добавление вакансий"></INPUT></TD>
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
		$addvakansii = $_POST['fbks'][$i]+1;
		}
	// Получение данных из однозначного списка Фирма Директор Адрес Телефон
	$vautors = 0;
		for ($i=0;$i<count($_POST['fauts']);$i++)
		{
		$vautors++;
		settype($_POST['fauts'][$i], integer);
		$addbezraboti = $_POST['fauts'][$i]+1;
		}
		// Получение данных из однозначного списка Фирма Директор Адрес Телефон
	$vadapt = 0;
		for ($i=0;$i<count($_POST['fauts']);$i++)
		{
		$vadapt++;
		settype($_POST['flks'][$i], integer);
		$addprofessii = $_POST['flks'][$i]+1;
		}
	// Добавление записи данных в таблицу post_zap базы данных ".$dbname."
	$zapaddbkauts = "INSERT INTO ".$tbname4."
	(
	Kod_Vakansii_Bezraboti_Professii, Kod_vakansii, Kod_bezraboti, Kod_professii
	)
	VALUES
	(
	NULL, '".$addvakansii."', '".$addbezraboti."', '".$addprofessii."'
	);";
	$resaddbkauts = @mysql_query($zapaddbkauts);
	}
	

// Вывод записей данных из таблицы post_zap базы данных ".$dbname."
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);

$zapbkauts = "SELECT * FROM ".$tbname4.";";
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
		echo "\n<FONT color=red><B>Отсутствуют данные в таблице вакансий!</B></FONT>";
		echo "\n</DIV>";
		}
		else
		{
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		// echo "\n<FONT color=red><B>Вывод записей данных из таблицы post_zap реляционной базы данных ".$dbname."!</B></FONT>";
		echo "\n<FONT color=blue><B>Вывод записей данных из таблицы вакансий</B></FONT>";
		echo "\n</DIV>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=justify>";
		echo "\n<TABLE border=1 bordercolor=green cellspacing=0 cellpadding=2 width=100%>";
		// Вывод строки заголовка записей данных
		echo "\n<TR valign=top align=center width=100% bgcolor=#7FFFD4>";
		echo "\n<TD><B>№</B></TD>";
		echo "\n<TD><B>Ключ</B></TD>";
		echo "\n<TD><B>Необходимый стаж вакансии</B></TD>";
		echo "\n<TD><B>ФИО Дата рождения безработного</B></TD>";
		echo "\n<TD><B>Наименование профессии</B></TD>";
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
			settype($rowbkauts['Kod_Vakansii_Bezraboti_Professii'], integer);
			echo "\n<TD>".$rowbkauts['Kod_Vakansii_Bezraboti_Professii']."</TD>";
			
			// Вывод данных из однозначного списка согласно таблице zap реляционной базы данных
			$zapvakansii = "SELECT ".$tbname1.".Stag FROM ".$tbname1." WHERE ".$tbname1.".Kod_vakansii=".$rowbkauts['Kod_vakansii'].";";
			$resvakansii = @mysql_query($zapvakansii);	
			$rowsvakansii = @mysql_num_rows($resvakansii);
			$colsvakansii = @mysql_num_fields($resvakansii);
			echo "\n<TD>";
				if ($rowsvakansii==0)
				{
				// echo "Отсутствуют данные в таблице zap реляционной базы данных ".$dbname."!";
				echo "Не выбран стаж вакансии";
				}
				else
				{
				//echo "Данные из таблицы zap реляционной базы данных ".$dbname." успешно выбраны!";
					while ($rowvakansii = @mysql_fetch_array($resvakansii))
					{
					settype($rowvakansii['Stag'], string);
					echo trim($rowvakansii['Stag']);
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
			
						// Вывод данных из однозначного списка согласно таблице postavchik реляционной базы данных
			$zapprofessii = "SELECT ".$tbname3.".Nazvanie FROM ".$tbname3." 
			WHERE ".$tbname3.".Kod_professii=".$rowbkauts['Kod_professii'].";";
			$resprofessii = @mysql_query($zapprofessii);	
			$rowsprofessii = @mysql_num_rows($resprofessii);
			$colsprofessii = @mysql_num_fields($resprofessii);
			echo "\n<TD>";
				if ($rowsprofessii==0)
				{
				// echo "Отсутствуют данные в таблице postavchik реляционной базы данных ".$dbname."!";
				echo "Не выбрана профессия";
				}
				else
				{
				//echo "Данные из таблицы postavchik реляционной базы данных ".$dbname." успешно выбраны!";
					while ($rowprofessii = @mysql_fetch_array($resprofessii))
					{
					settype($rowprofessii['Nazvanie'], string);
					echo trim($rowprofessii['Nazvanie']);
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