<?php
	require_once("Lannister.class.php");
	class Jaime extends Lannister 
	{
		public function sleepWith($partner)
		{
			if ($partner instanceof Lannister && get_class($partner) == "Cersei")
			{
				print("With pleasure, but only in a tower in Winterfell, then.\n");
			}
			else if ($partner instanceof Lannister) //&& get_class($partner) == "Cersei")
				print("Not even if I'm drunk !\n");
			else
				print("Let's do this.\n");

		}
	}