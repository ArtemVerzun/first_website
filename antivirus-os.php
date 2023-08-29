<html>
<head>
	<title>Anti-virus</title>
	<link rel="icon" type="image/x-icon" href="img/logo.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css">
</head>

<style>
	.main-content {
		margin: auto;
		width: 85%;
	}
</style>

<script>
		function closePopup() {
			document.getElementById("text-notify").innerHTML = '';
			document.getElementById("notify").style.visibility  = 'hidden';
		}
		
		function showPopup(text) {
			document.getElementById("text-notify").innerHTML = text;
			document.getElementById("notify").style.visibility  = 'visible';
		}

        getTables();

        function getTables() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '/lab7/table.php', true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        document.getElementById('table').innerHTML = '';
                        document.getElementById('table').innerHTML = xhr.responseText;
                    } else {
                        alert('Ошибка подключения!');
                    }
                }
            }
            xhr.send(null);
        }

		function notify(id) {
			var xhr = new XMLHttpRequest();
            xhr.open("POST", '/lab7/notify.php', true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
						console.log(xhr.responseText);
						showPopup(xhr.responseText);
                    } else {
                        alert('Ошибка подключения!');
                    }
                }
            }

            xhr.send(
                "{\"id\": " + '\"' + parseInt(id, 10) + '\"' + "}"
            );
		}

        function send() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/lab7/input.php', true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
						console.log(xhr.responseText);
						notify(xhr.responseText)
                        getTables();
                    } else {
                        alert('Ошибка подключения!');
                    }
                }
            }

            xhr.send(
                "{\"name\": " + '\"' + document.getElementsByName('name')[0].value + '\"' +
                ",\"developer\": " + '\"' + document.getElementsByName('developer')[0].value + '\"' +
                ",\"year\": " + '\"' + document.getElementsByName('year')[0].value + '\"' +
                ",\"version\": " + '\"' + document.getElementsByName('version')[0].value + '\"' +
                ",\"site\": " + '\"' + document.getElementsByName('site')[0].value + '\"' +
                ",\"oss\": " + getOSs() + "}"
            );

        }

        function getOSs() {
            let oss = '['
            var ele = document.getElementsByName('os');
                for(let i = 0; i < ele.length; i++) {
                    if (ele[i].checked) oss += ele[i].value + ','
                }
            oss = oss.slice(0, -1);
            oss += ']';
            return oss;
        }

</script>

<body>
	<header>
		<table class="table-nav">
			<tr>
				<td><img src="img/logo.png"></td>
				<td width=50%><h2><a href="index.html">Антивирус</a></h2></td>
				<td><h3><a href="form.html">Анкета</a></h3></td>
				<td><h3><a href="lr3.html">ЛР3</a></h3></td>
				<td><h3><a href="info.html">Основная информация</a></h3></td>
				<td><h3><a href="antivirus-os.php">Антивирусы</a></h3></td>
				<td><h3><a href="sources.html">Источники</a></h3></td>
			</tr>
			<tr height=5%></tr>
		</table>
	</header>
	<div class="spacer"></div>
	<div class="main-content">
		<div class="content-center">
		
		<br><br>
        <h1>Добавление антивируса:</h1>
        <h3>Заполните форму</h3>
		
		<TABLE align=center>
			<TR>
				<TH align=right>Название антивируса:
				<TD><input placeholder="Название антивируса" type=text name=name>
			<TR>
				<TH align=right>Разработчик:
				<TD><input placeholder="Разработчик" type=text name=developer>
			<TR>
				<TH align=right>Год создания:
				<TD><input type=number name=year value=2000 min=1950 max=2022>
			<TR>
				<TH align=right>Последняя версия:
				<TD><input placeholder="Последняя версия" type=text name=version>
			<TR>
				<TH align=right>Сайт:
				<TD><input placeholder="Сайт" type=text name=site>
			<TR>
				<TH align=right>Поддерживаемые OS:
				<TD>
				<table>
					<tr>
						<td><input class="lm3" type=checkbox name="os" value=1>Windows 7 x32
						<td><input class="lm3" type=checkbox name="os" value=2>Windows 7 x64
						<td><input class="lm3" type=checkbox name="os" value=3>Windows 10 x32
					<tr>
						<td><input class="lm3" type=checkbox name="os" value=4>Windows 10 x64
						<td><input class="lm3" type=checkbox name="os" value=5>Windows 8.1 x32
						<td><input class="lm3" type=checkbox name="os" value=6>Windows 8.1 x64
					<tr>
						<td><input class="lm3" type=checkbox name="os" value=7>GNU/Linux x64
						<td><input class="lm3" type=checkbox name="os" value=8>GNU/Linux x32
						<td><input class="lm3" type=checkbox name="os" value=9>Android 7.0
					<tr>
						<td><input class="lm3" type=checkbox name="os" value=10>MacOS x32
						<td><input class="lm3" type=checkbox name="os" value=11>MacOS x64
				</table>
			<TR>
				<TD colspan=2 align=center>
				<button class="myButton" onclick='send()'>Добавить</button>
		</TABLE>
		
		<br><br>
		<hr>
        <br><br>
		
		<div id="table"></div>
		
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

	<div id="notify">
	
		<table>
			<tr>
				<td align=center width=90%><strong>Добавлена новая запись</strong>
				<td align=center><span class="dismiss"><a title="dismiss this notification" onclick="closePopup()">x</a></span>
		</table>
		<div class="notify-content">
			<p id="text-notify"></p>
		</div>
	</div>
</body> 
</html>