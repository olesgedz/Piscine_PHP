#!/usr/bin/php
<?php
	while(TRUE)
	{
		echo "Enter a number: ";
		$line = fgets(STDIN);
		if (empty($line))
		{
			echo "\n";
			break;
		}
		$line = substr($line, 0, -1);
		if (is_numeric($line))
		{
			if (intval($line) % 2 == 1)
				echo "The number $line is odd\n";
			else
				echo "The number $line is even\n";
		}
		else
			echo "'$line' is not a number\n";
	}
?>