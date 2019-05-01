#!/usr/bin/php
<?php
	$str = implode(" ", $argv);							// add all element of array to string
	$str = preg_replace('/\s+/', ' ', $str);
	$str = trim($str);
	$tab = explode(" ", $str);							// make array
 	array_shift($tab);									// delete first elemt 
	sort($tab);
	foreach ($tab as $elem)
	{
		echo $elem."\n";
	}
?>