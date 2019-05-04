<?php
	function check_user($login, $array_users)
	{
		foreach ($array_users as $user)
			if ($user['login'] == $login)
				return (1);
		return (0);
	}
	function main()
	{
		if (empty($_POST[login]) || empty($_POST[oldpw]) || empty($_POST[newpw]) || $_POST[submit] != OK)
			die("ERROR\n");
		if (file_exists("../private/passwd"))
		{
		  $users = unserialize(file_get_contents("../private/passwd"));
		  foreach ($users as $key => $value)
			if ($value[login] == $_POST[login] && hash(sha512, $_POST[oldpw]) == $value[passwd])
			{
				$users[$key][passwd] = hash(sha512, $_POST[newpw]);
				file_put_contents("../private/passwd", serialize($users));
				echo "OK\n";
				exit();
			}
		  }
		  die("ERROR\n");
	}
	main();