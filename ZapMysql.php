<HTML>
<HEAD>
<TITLE>MySQL ����������</TITLE>
</HEAD>
<BODY>
<H1>���������� ������� ��� ������ ���� ������ MySQL</h1>
<P>
<?PHP
	if ($Mydbase<>'') 
	{
	echo "<HR>".$Mydbase;
	}
	if ($_POST['MyConn']<>1)
	{
	?>
	<FORM action="ZapMysql.php" method="post" name="zapsql">
	<TABLE border="0" bordercolor="black" cellspacing="0" cellpadding="3" align="center">
	<TR>
	<TD>������� ��� �����:</TD>
	<TD><INPUT name="MyHost" type="text" value="localhost"></INPUT></TD>
	</TR>
	<TR>
	<TD>������� ��� ������������:</TD>
	<TD><INPUT name="MyUser" type="password" value="root"></INPUT></TD>
	</TR>
	<TR>
	<TD>������� ������:</TD>
	<TD><INPUT name="MyPass" type="password" value=""></INPUT></TD>
	</TR>
	<TR>
	<TD rowspan=2 valign="top">������� �������� �������:</TD>
	<TD>
	<INPUT name="MyIst" type="radio" value="1" checked>���������������� ����:</INPUT><BR>
	<TEXTAREA name="MyZapText" rows=20 cols=120 wrap="on"></TEXTAREA>
	</TD></TR>
	<TR>
	<TD>
	<INPUT name="MyIst" type="radio" value="2">�������� ����� �����:</INPUT><BR>
	<INPUT type=file name="MyZapFile"></INPUT>
	</TD>
	</TR>
	<TR align="center">
	<TD><INPUT type="submit" value="��������� ������"></INPUT></TD>
	<TD><INPUT type="reset" value="��������"></INPUT></TD>
	</TR>
	</TABLE>
	<INPUT type="hidden" name="MyConn" value=1></INPUT>
	</FORM>
	<?PHP
	}
	else
	{
	$Host = $_POST['MyHost'];
	$User = $_POST['MyUser'];
	$Password = $_POST['MyPass'];
		if (!@mysql_connect($Host, $User, $Password))
		{
		echo "C����� MySQL �� ��������";
		}
		else
		{
		$MyLink = @mysql_connect($Host, $User, $Password);
			if ($_POST['MyIst'] == 1)
			{
			$fzap = $_POST['MyZapText'];
			}
			else
			if ($_POST['MyIst'] == 2)
			{
			$fzap = file_get_contents($_POST['MyZapFile']);
			}
			$fzap = preg_replace('#^--.*?$#im','',$fzap);
			$arr = array();
			$regexp = '#(.*?);#is';
			preg_match_all($regexp,$fzap,$arr);
				foreach ($arr[1] as $fzap)
				{
				$fzap = str_replace("\\'","'",$fzap);
				$res = @mysql_query($fzap);
					if ($res)
					{
					echo "<FONT color=blue><B>������:</B> ".$fzap." ��������!</FONT><BR>";
					}
					else
					{
					echo "<FONT color=red><B>������:</B> ".$fzap." �� ������� ���������!</FONT><BR>";
					}
				}
		@mysql_close($MyLink);
		}
	}
?>
</BODY>
</HTML>
