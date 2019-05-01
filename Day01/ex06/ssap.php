#!/usr/bin/php
<?php
	$tab = implode(" ", $argv);							// add all element of array to string
	$tab = preg_replace('/\s+/', ' ', $tab);
	$tab = trim($tab);
	$tab = explode(" ", $tab);							// make array
 	array_shift($tab);									// delete first elemt 
	sort($tab);
	foreach ($tab as $elem)
	{
		echo $elem."\n";
	}
?>