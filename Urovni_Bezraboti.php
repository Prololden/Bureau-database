<HTML><HEAD>
<?PHP
// ����������� � ����������� ���� ������
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
require("on_podkl_db.php");
/* ���������� ������������ ������ ���� ������ */
$tbname1 = "Urovni";
$tbname2 = "Bezraboti";
$tbname3 = "Urovni_Bezraboti";


// ������������ ���������� �������� ��� ��������� �����
// ����������� ������ �������� ���������
// �������-���������� zapchast
$murovni = array();
$zapurovni = "SELECT * FROM ".$tbname1.";";
$resurovni = @mysql_query($zapurovni);	
$rowsurovni = @mysql_num_rows($resurovni);
$colsurovni = @mysql_num_fields($resurovni);
	if ($rowsurovni==0)
	{
	// echo "\n<FONT color=red><B>����������� ������ � �������-����������� books ����������� ���� ������ ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>����������� ������ � �������-����������� books!</B></FONT>";
	// echo "\n</DIV>";
	}
	else
	{
	// echo "\n<FONT color=red><B>������� ������� ������ �� �������-����������� books ����������� ���� ������ ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>������� ������� ������ � �������-����������� books!</B></FONT>";
	// echo "\n</DIV>";
		while ($rowurovni = @mysql_fetch_array($resurovni))
		{
		// �������� ������������ ������
		$murovni[$rowurovni['Kod_urovni']-1] = $rowurovni['Name'];
		}
	}


// ����������� ������ ����
// �������-���������� postavchik
$mbezraboti = array();
$zapbezraboti = "SELECT * FROM ".$tbname2.";";
$resbezraboti = @mysql_query($zapbezraboti);	
$rowsbezraboti = @mysql_num_rows($resbezraboti);
$colsbezraboti = @mysql_num_fields($resbezraboti);
	if ($rowsbezraboti==0)
	{
	// echo "\n<FONT color=red><B>����������� ������ � �������-����������� autors ����������� ���� ������ ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>����������� ������ � �������-����������� autors!</B></FONT>";
	// echo "\n</DIV>";
	}
	else
	{
	// echo "\n<FONT color=red><B>������� ������� ������ �� �������-����������� autors ����������� ���� ������ ".$dbname."!</B></FONT>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>������� ������� ������ � �������-����������� autors!</B></FONT>";
	// echo "\n</DIV>";
		while ($rowbezraboti = @mysql_fetch_array($resbezraboti))
		{
		// �������� ������������ ������
		$mbezraboti[$rowbezraboti['Kod_bezraboti']-1] = $rowbezraboti['FIO']." ".$rowbezraboti['Data_rogdenia'];
		}
	}


?>
<HR color=green size=2>
<DIV align=center>
<FONT color=blue><B>���������� �����������</B></FONT>
</DIV>
<HR color=green size=2>
<DIV align=justify>
<!-- ����� ����� ��� ���������� ���������� � ������������ ����������� � ��������� -->
<FORM name=fba method=POST>
<TABLE border=0 bordercolor=green cellspacing=0>

<TR valign=top>
<TD>������������ �������</TD>
<TD>
<SELECT name=fbks[]>
<OPTION value=-1>�������� �������</OPTION>
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
<TD>����������</TD>
<TD>
<SELECT name=fauts[]>
<OPTION value=-1>�������� �����������</OPTION>
<?PHP
	for ($i=0;$i<count($mbezraboti);$i++)
	{
	echo "<OPTION value=".$i.">".$mbezraboti[$i]."</OPTION>\n";
	}
?>
</SELECT></TD></TR>

<TR align=center>
<TD><INPUT type=submit name=addbkauts value="���������� �����������"></INPUT></TD>
<TD><INPUT type=reset value="������"></INPUT></TD></TR>
</TABLE></FORM>
</DIV>
<?PHP
// ���������� ������ ������ � ������� post_zap ���� ������ ".$dbname."
	if (isset($_POST['addbkauts']))
	{
	// ��������� ������ �� ������������ ������ ������������ ���������
	$vbooks = 0;
		for ($i=0;$i<count($_POST['fbks']);$i++)
		{
		$vbooks++;
		settype($_POST['fbks'][$i], integer);
		$addurovni = $_POST['fbks'][$i]+1;
		}
	// ��������� ������ �� ������������ ������ ����� �������� ����� �������
	$vautors = 0;
		for ($i=0;$i<count($_POST['fauts']);$i++)
		{
		$vautors++;
		settype($_POST['fauts'][$i], integer);
		$addbezraboti = $_POST['fauts'][$i]+1;
		}
	// ���������� ������ ������ � ������� post_zap ���� ������ ".$dbname."
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
	

// ����� ������� ������ �� ������� post_zap ���� ������ ".$dbname."
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);

$zapbkauts = "SELECT * FROM ".$tbname3.";";
$resbkauts = @mysql_query($zapbkauts);
	if (!$resbkauts)
	{
	// echo "\n<FONT color=red><B>������ ������ �� ������� books_authors ����������� ���� ������ ".$dbname." �� ����� ���� ��������!</B></FONT><BR>";
	echo "\n<HR color=green size=2>";
	echo "\n<DIV align=center>";
	echo "\n<FONT color=red><B>������ ������ �� ������ �� ����� ���� ��������!</B></FONT>";
	echo "\n</DIV>";
	}
	else
	{
	$rowsbkauts = @mysql_num_rows($resbkauts);
	$colsbkauts = @mysql_num_fields($resbkauts);
		if ($rowsbkauts==0)
		{
		// echo "\n<FONT color=red><B>����������� ������ � ������� post_zap ����������� ���� ������ ".$dbname."!</B></FONT>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		echo "\n<FONT color=red><B>����������� ������ � ������� �����������!</B></FONT>";
		echo "\n</DIV>";
		}
		else
		{
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		// echo "\n<FONT color=red><B>����� ������� ������ �� ������� post_zap ����������� ���� ������ ".$dbname."!</B></FONT>";
		echo "\n<FONT color=blue><B>����� ������� ������ �� ������� �����������</B></FONT>";
		echo "\n</DIV>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=justify>";
		echo "\n<TABLE border=1 bordercolor=green cellspacing=0 cellpadding=2 width=100%>";
		// ����� ������ ��������� ������� ������
		echo "\n<TR valign=top align=center width=100% bgcolor=#7FFFD4>";
		echo "\n<TD><B>�</B></TD>";
		echo "\n<TD><B>����</B></TD>";
		echo "\n<TD><B>�������� ������ �����������</B></TD>";
		echo "\n<TD><B>��� ���� �������� ������������</B></TD>";
		echo "\n</TR>";
		// ����� ������� ������ �� ��������������� ������ ����������� ���� ������ ".$dbname."
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
			
			// ����� ������ �� ��������� ���� ������� post_zap ����������� ���� ������ ".$dbname."!
			settype($rowbkauts['Kod_Urovni_Bezraboti'], integer);
			echo "\n<TD>".$rowbkauts['Kod_Urovni_Bezraboti']."</TD>";
			
			// ����� ������ �� ������������ ������ �������� ������� zap ����������� ���� ������
			$zapurovni = "SELECT ".$tbname1.".Name FROM ".$tbname1." WHERE ".$tbname1.".Kod_urovni=".$rowbkauts['Kod_urovni'].";";
			$resurovni = @mysql_query($zapurovni);	
			$rowsurovni = @mysql_num_rows($resurovni);
			$colsurovni = @mysql_num_fields($resurovni);
			echo "\n<TD>";
				if ($rowsurovni==0)
				{
				// echo "����������� ������ � ������� zap ����������� ���� ������ ".$dbname."!";
				echo "�� ������� ������������ ������ �����������";
				}
				else
				{
				//echo "������ �� ������� zap ����������� ���� ������ ".$dbname." ������� �������!";
					while ($rowurovni = @mysql_fetch_array($resurovni))
					{
					settype($rowurovni['Name'], string);
					echo trim($rowurovni['Name']);
					}
				}
			echo "</TD>";
			
			// ����� ������ �� ������������ ������ �������� ������� postavchik ����������� ���� ������
			$zapbezraboti = "SELECT ".$tbname2.".FIO, ".$tbname2.".Data_rogdenia FROM ".$tbname2." 
			WHERE ".$tbname2.".Kod_bezraboti=".$rowbkauts['Kod_bezraboti'].";";
			$resbezraboti = @mysql_query($zapbezraboti);	
			$rowsbezraboti = @mysql_num_rows($resbezraboti);
			$colsbezraboti = @mysql_num_fields($resbezraboti);
			echo "\n<TD>";
				if ($rowsbezraboti==0)
				{
				// echo "����������� ������ � ������� postavchik ����������� ���� ������ ".$dbname."!";
				echo "�� ������ �����������";
				}
				else
				{
				//echo "������ �� ������� postavchik ����������� ���� ������ ".$dbname." ������� �������!";
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