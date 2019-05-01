#!/usr/bin/php
<?php

	function main ($argc, $argv)
	{
		if ($argc > 2)
		{
			foreach ($argv as $elem)
			{
				$index = strpos($elem, ":");
				$tmp = substr($elem, 0, $index);
				if (!strcmp($tmp, $argv[1]))
					$ret = substr($elem, $index + 1);
			}
			if ($ret != NULL)
				echo $ret."\n";
		}
	}

	main($argc,  $argv);

	// $tab = explode(" ", $tab);
	// $tab =  array_filter($tab, function ($var){ 
	// return $var != ' ';});
?>

