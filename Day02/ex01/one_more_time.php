#!/usr/bin/php
<?php
	function main($argc, $argv)
	{
		if ($argc < 2)
			return (0);
		if (!preg_match('/^([Ll]undi||[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) [0-9][0-9]? ([Jj]anvier|[Ff][eé]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]o[uû]t|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd][ée]cembre) [0-9]{4} [0-2]{1}[0-3]{1}:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/', $argv[1]))
		{
			echo "Wrong Format\n";
			return 0;
		}
		date_default_timezone_set("Europe/Paris");
		$argv[1] = trim($argv[1]);
		$argv[1] = preg_split("/\s/", $argv[1]);
		$patterns = array('/[Jj]anvier/', '/[Ff][eé]vrier/', '/[Mm]ars/', '/[Aa]vril/', '/[Mm]ai/', '/[Jj]uin/', '/[Jj]uillet/', '/[Aa]o[uû]t/', '/[Ss]eptembre/', '/[Oo]ctobre/', '/[Nn]ovembre/', '/[Dd][ée]cembre/');
		$replacements = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
		$tab = preg_replace($patterns, $replacements, $argv[1]);
		$leap_years = "2028, 2024, 2020, 2016, 2012, 2008, 2004, 2000, 1996, 1992, 1988, 1984, 1980, 1976, 1972";
		if (!preg_match("/$tab[3]/", $leap_years) && $tab[2] == 2 && $tab[1] > 28)
		{
			echo "Wrong Format\n";
			return 0;
		}
		$seconds = strtotime("$tab[3]-$tab[2]-$tab[1] $tab[4]");
		if (!$seconds){
			echo "Wrong Format\n";
			return 0;
		}
		echo $seconds."\n";
	}

	main($argc, $argv);


	// lundi (Monday), mardi (Tuesday), mercredi (Wednesday), jeudi (Thursday), vendredi (Friday), samedi (Saturday) and dimanche (Sunday).
	// the number of seconds past since January 1, 1970.