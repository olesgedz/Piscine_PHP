#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$argv[1] = trim($argv[1]);
		$argv[1] = explode(" ", $argv[1]);
		$argv[1] =  array_filter($argv[1], function ($var){ 
			return $var != ' ';});
		$argv[1] = implode($argv[1], ' ');
		echo $argv[1]."\n";
	}
?>