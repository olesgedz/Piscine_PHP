#!/usr/bin/php
<?php
	$tab = implode(" ", $argv);							// add all element of array to string
	$tab = trim($tab);
	$tab = explode(" ", $tab);
	$tab =  array_filter($tab, function ($var){ 
		return $var != ' ';});							// make array
 	array_shift($tab);									// delete first elemt 
	sort($tab);
	foreach ($tab as $elem)
	{
		echo $elem."\n";
	}
?>