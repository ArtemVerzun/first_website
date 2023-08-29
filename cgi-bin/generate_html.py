import sys

html_begin = """
<!DOCTYPE html>
<html>
<head>
	<title>Anti-virus</title>
	<link rel="icon" type="image/x-icon" href="../img/logo.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../style.css">
</head>

<style>
	.main-content {
		margin: auto;
		width: 85%;
	}
</style>

<body>
	<header>
		<table class="table-nav">
			<tr>
				<td><img src="../img/logo.png"></td>
				<td width=30%><h2><a href="../index.html">Антивирус</a></h2></td>
				<td><h3><a href="../form.html">Анкета</a></h3></td>
				<td><h3><a href="../lr3.html">ЛР3</a></h3></td>
				<td><h3><a href="../info.html">Основная информация</a></h3></td>
				<td><h3><a href="../sources.html">Использованные источники</a></h3></td>
			</tr>
			<tr height=5%></tr>
		</table>
	</header>
	<div class="spacer"></div>
	<div class="main-content">
		<div class="content-center">
""";

html_end = """
	</div>
	</div>

	<div class="spacer"></div>
	<footer>
		<table width=100%>
			<tr>
				<td align=center onclick="alert('Зинатов Р.Г. 4936')">Zinatov R.G.</td>
				<td width=50%></td>
				<td align=center>Group 4936</td>
			</tr>
		</table>
	</footer>
</body> 
</html>
""";
