<?php
// ����������� � ���� ������
$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
require("on_podkl_db.php");
$tbname = "Bezraboti";
?>
<HR color=green size=2>
<DIV align=center>
<FONT color=blue><B>���������� �����������</B></FONT>
</DIV>
<HR color=green size=2>
<DIV align=justify>

<FORM name=fnam method=POST>
<TABLE border=0 bordercolor=green cellspacing=0>
<TR valign=top>
<TD>���</TD>
<TD><INPUT type=text name=FIO size=50 value=""></INPUT></TD>
</TR>
<TR valign=top>
<TD>��� ������</TD>
<TD><INPUT type=integer name=Kod size=50 value=""></INPUT></TD>
</TR>
<TR valign=top>
<TD>���� ��������</TD>
<TD><INPUT type=text name=Dat size=50 value=""></INPUT></TD>
</TR>
<TR align=center>
<TD><INPUT type=submit name=addzap value="���������� �����������"></INPUT></TD>
<TD><INPUT type=reset value="������"></INPUT></TD></TR>
</TABLE></FORM>
</DIV>
<?PHP

	if (isset($_POST['addzap']))
	{
	settype($_POST['FIO'], string);
	$addfio = trim(strip_tags($_POST['FIO']));
	settype($_POST['Kod'], integer);
	$addkod = trim(strip_tags($_POST['Kod']));
	settype($_POST['Dat'], string);
	$adddata = trim(strip_tags($_POST['Dat']));
	
	$zaptbadd = "INSERT INTO ".$tbname."
	(
	Kod_bezraboti, FIO, Kod_urovni, Data_rogdenia
	)
	VALUES
	(
	NULL, '".$addfio."','".$addkod."','".$adddata."'
	);";
	$restbadd = @mysql_query($zaptbadd);
		if (!$restbadd)
		{
		
		}
		else
		{

		}
	}
	

$zaptb = "SET NAMES 'cp1251'";
$restb = @mysql_query($zaptb);
$zaptbrd = "SELECT * FROM ".$tbname.";";
$restbrd = @mysql_query($zaptbrd);
	if (!$restbrd)
	{
	}
	else
	{
	$rowstbrd = @mysql_num_rows($restbrd);
	$colstbrd = @mysql_num_fields($restbrd);
		if ($rowstbrd==0)
		{		
		echo "\n<FONT color=red><B>����������� �����������!</B></FONT>";
		}
		else
		{
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=center>";
		echo "\n<FONT color=blue><B>����� ���������� � �����������!</B></FONT>";
		echo "\n</DIV>";
		echo "\n<HR color=green size=2>";
		echo "\n<DIV align=justify>";
		echo "\n<TABLE border=0 bordercolor=green cellspacing=0 cellpadding=2 width=100%>";

		echo "\n<THEAD valign=top align=center width=100% bgcolor=#7FFFD4>";
		echo "\n<TH><B>�</B></TH>";
		echo "\n<TH><B>����</B></TH>";
		echo "\n<TH><B>���</B></TH>";
		echo "\n<TH><B>��� ������</B></TH>";
		echo "\n<TH><B>���� ��������</B></TH>";
		echo "\n</THEAD>";
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
			settype($rowtbrd['Kod_bezraboti'], integer);
			echo "\n<TD>".$rowtbrd['Kod_bezraboti']."</TD>";
			settype($rowtbrd['FIO'], string);
				if ($rowtbrd['FIO']=="")
				{
				echo "\n<TD>���������� � ��� �����������!</TD>";
				}
				else
				{
				echo "\n<TD>".$rowtbrd['FIO']."</TD>";
				}
				settype($rowtbrd['Kod'], integer);
				if ($rowtbrd['Kod']=="")
				{
				echo "\n<TD>���������� � ���� �����������!</TD>";
				}
				else
				{
				echo "\n<TD>".$rowtbrd['Kod']."</TD>";
				}
				settype($rowtbrd['Dat'], string);
				if ($rowtbrd['Dat']=="")
				{
				echo "\n<TD>���������� � ���� �������� �����������!</TD>";
				}
				else
				{
				echo "\n<TD>".$rowtbrd['Dat']."</TD>";
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