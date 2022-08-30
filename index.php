<HTML>
<HEAD>
<TITLE>
<?php
// 1. Вывод наименования раздела Интернет-сайта в зависимости от активации соответствующей гиперссылки
	if ($_GET['razd']=='Urovni')
	{ echo "Информация об уровнях образования"; }
	if ($_GET['razd']=='Urovni_Bezraboti')
	{ echo "Связка"; }
	if ($_GET['razd']=='Professii')
	{ echo "Информация о профессии"; }
	if ($_GET['razd']=='Vakansii_Bezraboti_Professii')
	{ echo "Информация о вакансиях"; }

?>
</TITLE>
</HEAD>
<BODY>
<TABLE border=0 bordercolor=red cellspacing=0 cellpadding=0 width=100% height=100%>
<TR valign=top height=400>
<!-- 2.Вывод навигационного меню с указанием гиперссылок на разделы Интернет-сайта с указанием соотвествующей гиперссылки -->
	<TD width=200>Меню навигации бюро<BR>
	<UL type=circle>
	<LI>
	<A href="?razd=Urovni">Уровни образования</A>
	</LI>
	<LI>
	<A href="?razd=Urovni_Bezraboti">Безработные</A>
	</LI>
	<LI>
	<A href="?razd=Professii">Профессии</A>
	</LI>
	<LI>
	<A href="?razd=Vakansii_Bezraboti_Professii">Вакансии</A>
	</LI>
	</UL>
	</TD>
	<TD>
<?php
// 3. Вывод содержимого файла раздела Интернет-сайта в зависимости от активации соответствующей гиперссылки
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