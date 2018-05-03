<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$mysqli = new mysqli($server, $username, $password, $db);

// verifica su eventuali errori di connessione
if ($mysqli->connect_errno) {
		echo "Connessione fallita: ". $mysqli->connect_error . ".";
		exit();
} else {
		echo "Connected.";
}

echo getenv("CLEARDB_DATABASE_URL")

?>
