#!/usr/bin/php
<?php

	function main ($argc, $argv)
	{
		if ($argc != 4)
		{
			echo "Incorrect Parameters\n";
			return 0;
		}

		foreach ($argv as $elem) {
			$elem = trim($elem);
		}

		if ($argv[2] == "+")
			echo ($argv[1] + $argv[3]);
		else if ($argv[2] == "-")
			echo ($argv[1] - $argv[3]);
		else if ($argv[2] == "*")
			echo ($argv[1] * $argv[3]);
		else if ($argv[2] == "/")
			echo ($argv[1] / $argv[3]);
		else if ($argv[2] == "%")
			echo ($argv[1] % $argv[3]);
		echo "\n";
	}

	main($argc,  $argv);
?>