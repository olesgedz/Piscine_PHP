#!/usr/bin/php
<?php

	function ft_ctype_alpha($c)
	{
		if ('A' <= $c && $c <= 'z')
			return (TRUE);
		return (FALSE);
	}

	function ft_ctype_digit($c)
	{
		if ('0' <= $c && $c <= '9')
			return (TRUE);
		return (FALSE);
	}

	function ft_ctype_punct($c)
	{
		if (('!' <= $c && $c <= '/') || (':' <= $c && $c <= '@') || ('[' <= $c && $c <= 96) ||
		('{' <= $c && $c <= '~'))
			return (TRUE);
		return (FALSE);
	}

	function sametype($a, $b)
	{
		if (ft_ctype_alpha($a) && ft_ctype_alpha($b))
			return (TRUE);
		if (ft_ctype_digit($a) && ft_ctype_digit($b))
			return (TRUE);
		if (ft_ctype_punct($a) && ft_ctype_punct($b))
			return(TRUE);
		return (FALSE);
	}

	function mycmp($str1, $str2)
	{
		$first = 0;
		$second = 0;

		$str1 = strtolower($str1);
		$str2 = strtolower($str2);
		for ($i = 0; $str1[$i] && $str2[$i]; $i++)
		{
			if ($str1[$i] != $str2[$i])
			{
				if (sametype($str1[$i], $str2[$i]))
					return (strcmp($str1[$i], $str2[$i]));
				else
				{
					if (ft_ctype_alpha($str1[$i]) && ft_ctype_digit($str2[$i]))
						return	(-1);
					elseif (ft_ctype_alpha($str1[$i])  && ft_ctype_digit($str1[$i]))
						return	(1);
					else
						return(strcmp($a, $b));
				}
			}
		}
		return (0);
	}

	function main($argc, $argv)
	{
		if ($argc < 2)
			return (0);
		$tab = implode(" ", $argv);
		$tab = preg_replace('/\s+/', ' ', $tab);
		$tab = trim($tab);
		$tab = explode(" ", $tab);
		array_shift($tab);
		foreach ($tab as $elem) {
			if (($elem[0] >= 'a' && $elem[0] <= 'z') || ($elem[0] >='A' && $elem[0] <= 'Z'))
				$alpha[] = $elem;
			else if ($elem[0] >= '0' && $elem[0] <= '9')
				$number[] = $elem;
			else
				$other[] = $elem;
		}
		
		if ($alpha != NULL) 
			usort($alpha, mycmp);
		if ($number != NULL) 
			sort($number, SORT_STRING);
		if ($other != NULL) 	
			sort($other);
		if ($alpha != NULL) 
		{
			foreach ($alpha as $elem) {
				echo $elem."\n";
			}
		}
		if ($number != NULL) 
		{
			foreach ($number as $elem) {
				echo $elem."\n";
			}
		}
		if ($other != NULL)
		{
			foreach ($other as $elem) {
				echo $elem."\n";
			}
		}
	}

	main($argc, $argv);
?>