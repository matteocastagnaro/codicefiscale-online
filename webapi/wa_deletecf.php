<?php

	session_start();

	unset($_SESSION['s_cf']);

	header("location: ../");

?>