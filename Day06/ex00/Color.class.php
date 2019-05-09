<?php 
	class Color { 
		public $red; 
		public $green;
		public $blue;
		public static $verbose = false;
		
		function __construct($array) {
			if (array_key_exists('red', $array) 
			&& array_key_exists('green', $array)
			&& array_key_exists('blue', $array))
			{
				$this->red = intval($array['red']);			//Red, green, blue constitutives and RGB values are converted to intergers.
				$this->green = intval($array['green']);		//Negative or > to 255 color constitutives are left as is.
				$this->blue = intval($array['blue']);			//Any other use is undefined behaviour.
			} else if (array_key_exists('rgb', $array))
			{ 
				$this->red = intval($array['rgb'] >> 16) & 0xff;
				$this->green = intval($array['rgb'] >> 8 )& 0xff;
				$this->blue = intval($array['rgb'] ) & 0xff;
			}
			if (self::$verbose == true)
				print("$this constructed.".PHP_EOL);
		}

		function __destruct()
		{
		if (self::$verbose == true)
			print("$this destructed.".PHP_EOL);
		return;
		}

		function add(Color $rhs)
		{
			return new Color (array('red' => $this->red + $rhs->red,
			'green' => $this->green + $rhs->green,
			'blue' => $this->blue + $rhs->blue));
		}
	
		function sub(Color $rhs)
		{
			return new Color (array('red' => $this->red - $rhs->red,
			'green' => $this->green - $rhs->green,
			'blue' => $this->blue - $rhs->blue));
		}
	
		function mult($f)
		{
			return new Color (array('red' => $this->red * $f,
			'green' => $this->green * $f,
			'blue' => $this->blue * $f));
		}

		function __toString()
		{
			return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
		}
		
		public static function doc()
		{
			return (file_get_contents("Color.doc.txt"));
		}
	}