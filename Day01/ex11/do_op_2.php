#!/usr/bin/php
<?php

	function ft_issign ($c)
	{
		if ($tab[2] = "+" && $tab[2] = "-" &&
			$tab[2] = "/" && $tab[2] = "*" && $tab[2] = "%")
			return (TRUE);
		return(FALSE);
	}

	function main($argc, $argv)
	{
		if ($argc != 2)
		{
			echo "Incorrect Parameters\n";
			return 0;
		}

		$str = trim($argv[1]);
		$check = 0;
		$space = 0;
		$i = 0;
		while ($str[$i])
		{
			if (($str[$i] < '0' || $str[$i] > '9') && $str[$i] != ' ')
			{
				if ($i > 0)
					$check++;
				if (($check > 1 || $i == 0) && ($str[$i + 1] < '0' || $str[$i] > '9'))
				{
					echo "Syntax Error\n";
					return 0;
				}
			}
			else if ($str[$i] > '0' && $str[$i] < '9' && $str[$i + 1] == ' ')
				$space++;
			$i++;
		}

		if ($space > 1)
		{
			echo "Syntax Error\n";
			return 0;
		}

		$str = preg_replace('/\s+/', '', $str);
		$needles = array("+", "-", "*", "/", "%");

		foreach ($needles as $needle)
		{
			$index = strpos($str, $needle, 1);
			if ($index > 0)
				break;
		}

		$tab[1] = substr($str, 0, $index);
		$tab[2] = $str[$index];
		$tab[3] = substr($str, $index + 1);
		if ((!is_numeric($tab[1])) || (!is_numeric($tab[3])) || !ft_issign(tab))
		{
			echo "Syntax Error\n";
			return 0;
		}
		
		if ($tab[2] == "+")
			echo ($tab[1] + $tab[3]);
		else if ($tab[2] == "-")
			echo ($tab[1] - $tab[3]);
		else if ($tab[2] == "*")
			echo ($tab[1] * $tab[3]);
		else if ($tab[2] == "/")
			echo ($tab[1] / $tab[3]);
		else if ($tab[2] == "%")
			echo ($tab[1] % $tab[3]);
		echo "\n";
	}

	main ($argc, $argv);
?>