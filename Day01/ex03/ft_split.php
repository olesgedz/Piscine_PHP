#!/usr/bin/php
<?php

	function ft_split($str)
	{
		$str = trim($str);
		$tab = explode(" ", $str);
		$tab = array_filter($tab, function ($var){ 
			return $var != ' ';});
		sort($tab);
		return $tab;
	}
?>