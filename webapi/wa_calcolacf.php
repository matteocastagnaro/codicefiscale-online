<?php

	session_start();

	$cognome = $_POST['cognome'];
	$nome = $_POST['nome'];
	$giorno_nascita = $_POST['giorno_nascita'];
	$mese_nascita = $_POST['mese_nascita'];
	$anno_nascita = $_POST['anno_nascita'];
	$sesso = $_POST['sesso'];
	$cod_fisico = $_POST['cod_fisico'];

	$vocali = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', ' ');

	/* DIVIDO LE VOCALI E LE CONSONANTI DA NOME E COGNOME */

	$cognome_CONS = strtoupper(str_replace($vocali, "", $cognome));
	$cognome_VOC = strtoupper(preg_replace('/[^aeiou]/i','',$cognome));

	$nome_CONS = strtoupper(str_replace($vocali, "", $nome));
	$nome_VOC = strtoupper(preg_replace('/[^aeiou]/i','',$nome));

	/* ++++++++++++++ */

	/* COSTRUZIONE CODICE COGNOME */

	if(strlen($cognome_CONS) >= 3)
		$cognome_COD = substr($cognome_CONS, 0, 3);
	else if(strlen($cognome_CONS) == 2)
		$cognome_COD = $cognome_CONS . substr($cognome_VOC, 0, 1);
	else if(strlen($cognome_CONS) == 1)
		$cognome_COD = $cognome_CONS . substr($cognome_VOC, 0, 2);
	else
		$cognome_COD = substr($cognome_VOC, 0, 3);

	/* +++++++++++++++ */

	/* COSTRUZIONE CODICE NOME */

	if(strlen($nome_CONS) > 3)
		$nome_COD = $nome_CONS[0] . $nome_CONS[2] . $nome_CONS[3];
	else if(strlen($nome_CONS) == 3)
		$nome_COD = $nome_CONS;
	else if(strlen($nome_CONS) == 2)
		$nome_COD = $nome_CONS . substr($nome_VOC, 0, 1);
	else if(strlen($nome_CONS) == 1)
		$nome_COD = $nome_CONS . substr($nome_VOC, 0, 2);
	else
		$nome_COD = substr($nome_VOC, 0, 3);

	/* +++++++++++++++ */

	/* COSTRUZIONE ANNO NASCITA */

	$anno_COD = substr($anno_nascita, 2);

	/* ++++++++++++++++++ */

	/* COSTRUZIONE MESE NASCITA */

	switch ($mese_nascita) {
		case 1: $mese_COD = "A"; break;
		case 2: $mese_COD = "B"; break;
		case 3: $mese_COD = "C"; break;
		case 4: $mese_COD = "D"; break;
		case 5: $mese_COD = "E"; break;
		case 6: $mese_COD = "H"; break;
		case 7: $mese_COD = "L"; break;
		case 8: $mese_COD = "M"; break;
		case 9: $mese_COD = "P"; break;
		case 10: $mese_COD = "R"; break;
		case 11: $mese_COD = "S"; break;
		case 12: $mese_COD = "T"; break;
	}

	/* ++++++++++++++++++ */

	/* COSTRUZIONE CODICE GIORNO NASCITA */

	if($sesso == "F")
		$giorno_nascita += 40;

	if($giorno_nascita <= 9)
		$giorno_nascita = "0".$giorno_nascita;

	$giorno_COD = $giorno_nascita;

	/* ++++++++++++++++++++ */

	/* COSTRUZIONE CODICE COMPLETO PER CODICE DI CONTROLLO */

	$temp_COD = $cognome_COD . $nome_COD . $anno_COD . $mese_COD . $giorno_COD . $cod_fisico;

	/* +++++++++++++++++++ */

	/* COSTRUZIONE CODICE DI CONTROLLO */

	$tempcod_pari = "";
	$tempcod_dispari = "";
	$counter = 0;

	// giusto così perchè per l'algoritmo la stringa inizia da 1 e non da 0
	for($j = 0; $j < strlen($temp_COD); $j++){
		if($j & 1)
			$tempcod_pari = $tempcod_pari . $temp_COD[$j];
		else
			$tempcod_dispari = $tempcod_dispari . $temp_COD[$j];
	}

	for($j = 0; $j < strlen($tempcod_dispari); $j++){
		switch($tempcod_dispari[$j]){
			case '0': $counter+=1;break;
			case '1': $counter+=0;break;
			case '2': $counter+=5;break;
			case '3': $counter+=7;break;
			case '4': $counter+=9;break;
			case '5': $counter+=13;break;
			case '6': $counter+=15;break;
			case '7': $counter+=17;break;
			case '8': $counter+=19;break;
			case '9': $counter+=21;break;
			case 'A': $counter+=1;break;
			case 'B': $counter+=0;break;
			case 'C': $counter+=5;break;
			case 'D': $counter+=7;break;
			case 'E': $counter+=9;break;
			case 'F': $counter+=13;break;
			case 'G': $counter+=15;break;
			case 'H': $counter+=17;break;
			case 'I': $counter+=19;break;
			case 'J': $counter+=21;break;
			case 'K': $counter+=2;break;
			case 'L': $counter+=4;break;
			case 'M': $counter+=18;break;
			case 'N': $counter+=20;break;
			case 'O': $counter+=11;break;
			case 'P': $counter+=3;break;
			case 'Q': $counter+=6;break;
			case 'R': $counter+=8;break;
			case 'S': $counter+=12;break;
			case 'T': $counter+=14;break;
			case 'U': $counter+=16;break;
			case 'V': $counter+=10;break;
			case 'W': $counter+=22;break;
			case 'X': $counter+=25;break;
			case 'Y': $counter+=24;break;
			case 'Z': $counter+=23;break;
		}
	}

	for($j = 0; $j < strlen($tempcod_pari); $j++){
		switch($tempcod_pari[$j]){
			case '0': $counter+=0;break;
			case '1': $counter+=1;break;
			case '2': $counter+=2;break;
			case '3': $counter+=3;break;
			case '4': $counter+=4;break;
			case '5': $counter+=5;break;
			case '6': $counter+=6;break;
			case '7': $counter+=7;break;
			case '8': $counter+=8;break;
			case '9': $counter+=9;break;
			case 'A': $counter+=0;break;
			case 'B': $counter+=1;break;
			case 'C': $counter+=2;break;
			case 'D': $counter+=3;break;
			case 'E': $counter+=4;break;
			case 'F': $counter+=5;break;
			case 'G': $counter+=6;break;
			case 'H': $counter+=7;break;
			case 'I': $counter+=8;break;
			case 'J': $counter+=9;break;
			case 'K': $counter+=10;break;
			case 'L': $counter+=11;break;
			case 'M': $counter+=12;break;
			case 'N': $counter+=13;break;
			case 'O': $counter+=14;break;
			case 'P': $counter+=15;break;
			case 'Q': $counter+=16;break;
			case 'R': $counter+=17;break;
			case 'S': $counter+=18;break;
			case 'T': $counter+=19;break;
			case 'U': $counter+=20;break;
			case 'V': $counter+=21;break;
			case 'W': $counter+=22;break;
			case 'X': $counter+=23;break;
			case 'Y': $counter+=24;break;
			case 'Z': $counter+=25;break;
		}
	}

	switch($counter % 26){
		case 0: $control_COD="A";break;
		case 1: $control_COD="B";break;
		case 2: $control_COD="C";break;
		case 3: $control_COD="D";break;
		case 4: $control_COD="E";break;
		case 5: $control_COD="F";break;
		case 6: $control_COD="G";break;
		case 7: $control_COD="H";break;
		case 8: $control_COD="I";break;
		case 9: $control_COD="J";break;
		case 10: $control_COD="K";break;
		case 11: $control_COD="L";break;
		case 12: $control_COD="M";break;
		case 13: $control_COD="N";break;
		case 14: $control_COD="O";break;
		case 15: $control_COD="P";break;
		case 16: $control_COD="Q";break;
		case 17: $control_COD="R";break;
		case 18: $control_COD="S";break;
		case 19: $control_COD="T";break;
		case 20: $control_COD="U";break;
		case 21: $control_COD="V";break;
		case 22: $control_COD="W";break;
		case 23: $control_COD="X";break;
		case 24: $control_COD="Y";break;
		case 25: $control_COD="Z";break;
	}

	/* +++++++++++++++++ */

	$CF = $temp_COD . $control_COD;

	$_SESSION['s_cf'] = $CF;

	header("location: ../");
?>

