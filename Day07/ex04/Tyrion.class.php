<?php 
	class Tyrion extends Lannister 
	{
		public function sleepWith($partner)
		{
			if ($partner instanceof Lannister) //&& get_class($partner) == "Cersei")
				print("Not even if I'm drunk !\n");
			else
				print("Let's do this.\n");

		}
	}