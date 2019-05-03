#!/usr/bin/php
<?php
	function main($argc, $argv)
	{
		if ($argc < 2)
			return (0);
		$argv[1] = trim($argv[1]);
		$argv[1] = preg_filter("/[\s,\t]+/", " ", $argv[1]);
		echo $argv[1]."\n";
	}

	main($argc, $argv);