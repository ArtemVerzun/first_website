<?php
	
	$link = mysqli_connect(
				'localhost',
				'root',
				'',
				'web',
				3333);
	
	if (!$link) {
		echo "<h5>Невозможно подключится к базе данных. Код ошибки: " . mysqli_connect_error();
		exit;
	}
	
	$result = mysqli_query($link, 'SELECT * FROM antivirus;');
	if ($result) {
		echo "<table class='table-container'>";
		echo 
		"
			<thead>
				<tr><th colspan=6 style='text-align:center'>Антивирусы</th></tr>
				<tr>
					<th>Название</th>
					<th>Разработчик</th>
					<th>Год создания</th>
					<th>Последняя версия</th>
					<th>Сайт</th>
					<th>Поддерживаемые OC</th>
				</tr>
			</thead>
			<tbody>
		";
		while($row = mysqli_fetch_assoc($result)) {
			echo
			"
			<tr>
				<td><strong>" . $row['name'] . " </strong></td>
				<td>" . $row['developer'] . "</td>
				<td>" . $row['first_release_year'] . "</td>
				<td>" . $row['last_version'] . "</td>
				<td><a href=\"" . $row['url'] . "\">" . $row['name'] . "</a></td>
				<td>
			";
			
			$oc_ids = mysqli_query($link, 
						"SELECT id_oc FROM anti_oc WHERE id_antivirus=" .$row['id']. ";");
			if ($oc_ids) {
				echo 
				"
				<table><thead>
					<tr>
						<th>Название</th>
						<th>Версия</th>
						<th>Разрядность</th>
						<th>Разработчик</th>
					</tr>
				</thead>
				<tbody>
				";
				
				while ($oc_ids_row = mysqli_fetch_assoc($oc_ids)) {
					$oc_result = mysqli_query($link, "SELECT * FROM oc WHERE id=".$oc_ids_row['id_oc'].";");
					if ($oc_result) {
						while($oc_result_row = mysqli_fetch_assoc($oc_result)) {
							echo
							"
								<tr>
									<td><strong>" . $oc_result_row['name'] . " </strong></td>
									<td>" . $oc_result_row['version'] . "</td>
									<td>" . $oc_result_row['bitness'] . "</td>
									<td>" . $oc_result_row['developer'] . "</td>
								</tr>
							";
						}
					}
				}
				echo
				"
				</tbody></table></td>
				";
			}
		}
		echo "</tbody></table>";
		mysqli_free_result($result);
	}
			mysqli_close($link);
?>