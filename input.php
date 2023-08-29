<?php

	$data = file_get_contents("php://input");
    $data = json_decode($data);

    $name = $data->name;
    $developer = $data->developer;
    $year = $data->year;
    $version = $data->version;
    $site = $data->site;
    $oss = $data->oss;


    $link = mysqli_connect(
                'localhost',  /* Хост, к которому мы подключаемся */
                'root',       /* Имя пользователя */
                '',       /* Используемый пароль */
                'web',		  /* База данных для запросов по умолчанию */
				3333);       

    if (!$link) {
       echo "<h5>Невозможно подключиться к базе данных. Код ошибки: " . mysqli_connect_error();
       exit;
    }
	
	$sql = "INSERT INTO antivirus (name, developer, first_release_year, last_version, url)
    VALUES ('{$name}', '{$developer}', '{$year}', '{$version}', '{$site}')";


    if ($link->query($sql) === TRUE) {
	
      $id_antivirus = $link->insert_id;
      foreach ($oss as &$value) {
            $sql = "INSERT INTO anti_oc (id_antivirus, id_oc)
            VALUES ({$id_antivirus}, {$value})";
            $link->query($sql);
      }
	  echo $id_antivirus;
    } 
	else {
      echo "Error: " . $sql . "\n" . $link->error;
    }
?>