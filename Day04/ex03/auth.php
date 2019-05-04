<?php

	function  auth($login, $passwd)
	{
		if (empty($login) || empty($passwd))
			return(0);
		if (file_exists("../private/passwd"))
		{
			$users = unserialize(file_get_contents("../private/passwd"));
			foreach ($users as $key => $value)
			{
				if ($value[login] == $login && hash(sha512, $passwd) == $value[passwd])
					return (1);
			}
		}
		return (0);
	}
