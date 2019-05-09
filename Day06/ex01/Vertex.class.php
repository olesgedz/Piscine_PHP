<?php
	require_once('Color.class.php');
	class Vertex
	{

		public static $verbose = false;
		private $_w = 1.0;
		private $_x = 0;
		private $_y = 0;
		private $_z = 0;
		private $_color;

		function __construct(array $kwargs)
		{
		if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs)){
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];}
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = ( new Color( array( 'red' => 255, 'green' => 255, 'blue' => 255 )));

		if (self::$verbose == true)
			print("$this constructed".PHP_EOL);
		return;
	}

		public static function doc()
		{
			return (file_get_contents("Vertex.doc.txt"));
		}

		function __toString()
		{
			if (self::$verbose == true)
				return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
			else
				return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);;
		}

		function __destruct()
		{
			if (self::$verbose == true)
				print("$this destructed".PHP_EOL);
			return;
		}
		public function getColor()
		{
			return $this->_color;
		}
		public function getX() {
			return $this->_x;
		}
		public function getY() {
			return $this->_y;
		}
		public function getZ() {
			return $this->_z;
		}
		public function getW() {
			return $this->_w;
		}
	}
