<?php

	session_start();
	if ($_SESSION === NULL)
		session_start();
	if ($_GET['login'] !== "" && $_GET['passwd'] !== "" && $_GET['submit'] == 'OK')
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}

?>
<html><body>
<form action="index.php" method="get">
	login: <input type="text" name="login"/>
	<br/>
	password: <input type="password" name="passwd"/>
	<button type="submit" name="submit" value="OK">Submit</button>
</form>
</body></html>