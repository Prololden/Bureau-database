<HTML>
<HEAD>
<TITLE>
<?php
// 1. ����� ������������ ������� ��������-����� � ����������� �� ��������� ��������������� �����������
	if ($_GET['razd']=='Urovni')
	{ echo "���������� �� ������� �����������"; }
	if ($_GET['razd']=='Urovni_Bezraboti')
	{ echo "������"; }
	if ($_GET['razd']=='Professii')
	{ echo "���������� � ���������"; }
	if ($_GET['razd']=='Vakansii_Bezraboti_Professii')
	{ echo "���������� � ���������"; }

?>
</TITLE>
</HEAD>
<BODY>
<TABLE border=0 bordercolor=red cellspacing=0 cellpadding=0 width=100% height=100%>
<TR valign=top height=400>
<!-- 2.����� �������������� ���� � ��������� ����������� �� ������� ��������-����� � ��������� �������������� ����������� -->
	<TD width=200>���� ��������� ����<BR>
	<UL type=circle>
	<LI>
	<A href="?razd=Urovni">������ �����������</A>
	</LI>
	<LI>
	<A href="?razd=Urovni_Bezraboti">�����������</A>
	</LI>
	<LI>
	<A href="?razd=Professii">���������</A>
	</LI>
	<LI>
	<A href="?razd=Vakansii_Bezraboti_Professii">��������</A>
	</LI>
	</UL>
	</TD>
	<TD>
<?php
// 3. ����� ����������� ����� ������� ��������-����� � ����������� �� ��������� ��������������� �����������
	if ($_GET['razd']=='Urovni')
	{ require("Urovni.php"); }
	if ($_GET['razd']=='Urovni_Bezraboti')
	{ require("Urovni_Bezraboti.php"); }
	if ($_GET['razd']=='Professii')
	{ require("Professii.php"); }
	if ($_GET['razd']=='Vakansii_Bezraboti_Professii')
	{ require("Vakansii_Bezraboti_Professii.php"); }
?>
</TD>
</TR>
</TABLE>
</BODY>
</HTML>