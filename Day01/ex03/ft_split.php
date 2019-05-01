#!/usr/bin/php
<?php

	
	function ft_split($str)
	{
		print($str);
		$str = trim($str);
		$str = preg_replace('/\s+/', ' ', $str);
		$tab = explode(" ", $str);
		sort($tab);
		return $tab;
	}


?>