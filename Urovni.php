<?php
// ����������� � ���� ������
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
require("on_podkl_db.php");
$tbname = "Urovni";
?>
<HR color=green size=2>
<DIV align=center>
<FONT color=blue><B>���������� ������ �����������</B></FONT>
</DIV>
<HR color=green size=2>
<DIV align=justify>
<!-- ����� ����� ��� ���������� ���������� � �������� -->
<FORM name=fnam method=POST>
<TABLE border=0 bordercolor=green cellspacing=0>
<TR valign=top>
<TD>��������</TD>
<TD><INPUT type=text name=name size=50 value=""></INPUT></TD>
</TR>
<TR align=center>
<TD><INPUT type=submit name=addzap value="���������� ������ �����������"></INPUT></TD>
<TD><INPUT type=reset value="������"></INPUT></TD></TR>
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
		// echo "\n<FONT color=red><B>������ ������ � ������� ".$tbname." ���� ������ ".$dbname." �� ����� ���� ���������!</B></FONT><BR>";
		}
		else
		{
		// echo "\n<FONT color=blue><B>������ ������ � ������� ".$tbname." ���� ������ ".$dbname." ������� ���������!</B></FONT><BR>";
		}
	}
	
	// ����� ������� ������ �� ������� Zapchast ���� ������ AvtoPan
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
$zaptbrd = "SELECT * FROM ".$tbname.";";
$restbrd = @mysql_query($zaptbrd);
	if (!$restbrd)
	{
	// echo "\n<FONT color=red><B>������ ������ �� ������� ".$tbname." ���� ������ ".$dbname." �� ����� ���� ��������!</B></FONT><BR>";
	// echo "\n<HR color=green size=2>";
	// echo "\n<DIV align=center>";
	// echo "\n<FONT color=red><B>������ ������ �� ������� �� ����� ���� ��������!</B></FONT>";
	// echo "\n</DIV>";
	}
	else
	{
	$rowstbrd = @mysql_num_rows($restbrd); // ��������� ���������� ����� �������
	$colstbrd = @mysql_num_fields($restbrd); // ��������� ���������� �������� �������
		if ($rowstbrd==0)
		{		
		// echo "\n<FONT color=red><B>����������� ������ � ������� ".$tbname." ���� ������ ".$dbname."!</B></FONT>";
		// echo "\n<HR color=green size=2>";
		// echo "\n<DIV align=center>";
		echo "\n<FONT color=red><B>����������� ������ �����������!</B></FONT>";
		// echo "\n<FONT color=red><B>����������� ������ � �������!</B></FONT>";
		// echo "\n</DIV>";
		}
		else
		{
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		// echo "\n<FONT color=blue><B>����� ������� ������ �� ������� ".$tbname." ���� ������ ".$dbname."!</B></FONT>";
		echo "\n<FONT color=blue><B>����� ���������� �� ������� �����������!</B></FONT>";
		echo "\n</DIV>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=justify>";
		echo "\n<TABLE border=0 bordercolor=green cellspacing=0 cellpadding=2 width=100%>";
		// ����� ������ ��������� ������� ������
		echo "\n<THEAD valign=top align=center width=100% bgcolor=#7FFFD4>";
		echo "\n<TH><B>�</B></TH>";
		echo "\n<TH><B>����</B></TH>";
		echo "\n<TH><B>��������</B></TH>";
		echo "\n</THEAD>";
		// ����� ������� ������ �� ������� Zapchast ���� ������ AvtoPan
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
			// ����� ������ ��� ��������� ���� ������� Zapchast ���� ������ AvtoPan
			settype($rowtbrd['Kod_urovni'], integer);
			echo "\n<TD>".$rowtbrd['Kod_urovni']."</TD>";
			// ����� ������ � ��������
			settype($rowtbrd['Name'], string);
				if ($rowtbrd['Name']=="")
				{
				echo "\n<TD>���������� � �������� �����������!</TD>";
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