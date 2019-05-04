<?php

	session_start();

	if ($_SESSION[logged_in_user])
		echo $_SESSION[logged_in_user]."\n";
	else
		echo "ERROR\n";