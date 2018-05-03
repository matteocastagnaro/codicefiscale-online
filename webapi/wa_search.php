<?php

	include "wa_database.php";

	$query = "SELECT * FROM lista_comuni";

	$res = $mysqli->query($query);

	$array[] = array();

	while($row = $res->fetch_array(MYSQL_ASSOC)){
		$str = $row['Comune'] . " (" . $row['Provincia'] . ")";
		array_push($array, $str);
	}

	echo json_encode($array);


?>