<?php
	//require_once("Lannister.class.php")
	class Tyrion extends Lannister
	{
		public function __construct() {
			print("A Lannister is born !\nMy name is ". get_class($this) . PHP_EOL); 
		}
		public function getSize()
		{
			return "Short";
		}
	} 