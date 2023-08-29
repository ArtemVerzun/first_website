<?php
	
	$data = file_get_contents("php://input");
    $data = json_decode($data);

    $id = $data->id;
	
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
	
	$result = mysqli_query($link, 'SELECT * FROM antivirus WHERE id='.$id.';');
	if ($result) {
		while($row = mysqli_fetch_assoc($result)) {
			echo
			"
				Название: ".$row['name']."
				Разработчик: ".$row['developer']."
				...
			";
		}
	}
?>