<?php
// Подключение к базе данных
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
require("on_podkl_db.php");
$tbname = "Urovni";
?>
<HR color=green size=2>
<DIV align=center>
<FONT color=blue><B>Добавление уровня образования</B></FONT>
</DIV>
<HR color=green size=2>
<DIV align=justify>
<!-- Вывод формы для добавления информации о запчасти -->
<FORM name=fnam method=POST>
<TABLE border=0 bordercolor=green cellspacing=0>
<TR valign=top>
<TD>Название</TD>
<TD><INPUT type=text name=name size=50 value=""></INPUT></TD>
</TR>
<TR align=center>
<TD><INPUT type=submit name=addzap value="Добавление уровня образования"></INPUT></TD>
<TD><INPUT type=reset value="Отмена"></INPUT></TD></TR>
</TABLE></FORM>
</DIV>
<?PHP

	if (isset($_POST['addzap']))
	{
	settype($_POST['name'], string);
	$addname = trim(strip_tags($_POST['name']));
	
	$zaptbadd = "INSERT INTO ".$tbname."
	(
	Kod_urovni, Name
	)
	VALUES
	(
	NULL, '".$addname."'
	);";
	$restbadd = @mysql_query($zaptbadd);
		if (!$restbadd)
		{
		// echo "\n<FONT color=red><B>Запись данных в таблицу ".$tbname." базы данных ".$dbname." не может быть добавлена!</B></FONT><BR>";
		}
		else
		{
		// echo "\n<FONT color=blue><B>Запись данных в таблицу ".$tbname." базы данных ".$dbname." успешно добавлена!</B></FONT><BR>";
		}
	}
	
	// Вывод записей данных из таблицы Zapchast базы данных AvtoPan
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
$zaptbrd = "SELECT * FROM ".$tbname.";";
$restbrd = @mysql_query($zaptbrd);
	if (!$restbrd)
	{
	// echo "\n<FONT color=red><B>Записи данных из таблицы ".$tbname." базы данных ".$dbname." не могут быть выведены!</B></FONT><BR>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>Записи данных из таблицы не могут быть выведены!</B></FONT>";
	// echo "\n</DIV>";
	}
	else
	{
	$rowstbrd = @mysql_num_rows($restbrd); // получение количества строк таблицы
	$colstbrd = @mysql_num_fields($restbrd); // получение количества столбцов таблицы
		if ($rowstbrd==0)
		{		
		// echo "\n<FONT color=red><B>Отсутствуют данные в таблице ".$tbname." базы данных ".$dbname."!</B></FONT>";
		// echo "\n<HR color=green size=2>";
		// echo "\n<DIV align=center>";
		echo "\n<FONT color=red><B>Отсутствуют уровни образования!</B></FONT>";
		// echo "\n<FONT color=red><B>Отсутствуют данные в таблице!</B></FONT>";
		// echo "\n</DIV>";
		}
		else
		{
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		// echo "\n<FONT color=blue><B>Вывод записей данных из таблицы ".$tbname." базы данных ".$dbname."!</B></FONT>";
		echo "\n<FONT color=blue><B>Вывод информации об уровнях образования!</B></FONT>";
		echo "\n</DIV>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=justify>";
		echo "\n<TABLE border=0 bordercolor=green cellspacing=0 cellpadding=2 width=100%>";
		// Вывод строки заголовка записей данных
		echo "\n<THEAD valign=top align=center width=100% bgcolor=#7FFFD4>";
		echo "\n<TH><B>№</B></TH>";
		echo "\n<TH><B>Ключ</B></TH>";
		echo "\n<TH><B>Название</B></TH>";
		echo "\n</THEAD>";
		// Вывод записей данных из таблицы Zapchast базы данных AvtoPan
		$n = 0;
			while ($rowtbrd = @mysql_fetch_array($restbrd))
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
			// Вывод данных для ключевого поля таблицы Zapchast базы данных AvtoPan
			settype($rowtbrd['Kod_urovni'], integer);
			echo "\n<TD>".$rowtbrd['Kod_urovni']."</TD>";
			// Вывод данных о названии
			settype($rowtbrd['Name'], string);
				if ($rowtbrd['Name']=="")
				{
				echo "\n<TD>Информация о названии отсутствует!</TD>";
				}
				else
				{
				echo "\n<TD>".$rowtbrd['Name']."</TD>";
				}
			echo "\n</TR>";
			$n++;
			}
		echo "\n</TABLE>";
		echo "\n</DIV>";
		}
	}

@mysql_close($MyLink);
?>
<HR color=green size=2>