<?php
	require_once('Vertex.class.php');
	class Vector extends Vertex
	{
		public static $verbose = false;
		private $_w = 0.0;
		private $_x = 0;
		private $_y = 0;
		private $_z = 0;
		private $_color;

		public function __construct($array)
		{
			if (isset($array['dest']) && $array['dest'] instanceof Vertex) {
				if (isset($array['orig']) && $array['orig'] instanceof Vertex) {
					$orig = new Vertex(array('x' => $array['orig']->getX(), 'y' => $array['orig']->getY(), 'z' => $array['orig']->getZ()));
				} else {
					$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
				}
				$this->_x = $array['dest']->getX() - $orig->getX();
				$this->_y = $array['dest']->getY() - $orig->getY();
				$this->_z = $array['dest']->getZ() - $orig->getZ();
				$this->_w = 0;
			}
			if (Self::$verbose)
				printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
		// public function magnitude()
		// {
		// 	return (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
		// }
		// public function normalize()
		// {
		// 	$length = $this->magnitude();
		// 	if ($length == 1) {
		// 		return clone $this;
		// 	}
		// 	return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $length, 'y' => $this->_y / $length, 'z' => $this->_z / $length))));
		// }
		// public function add(Vector $vect)
		// {
		// 	return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $vect->_x, 'y' => $this->_y + $vect->_y, 'z' => $this->_z + $vect->_z))));
		// }
		// public function sub(Vector $vect)
		// {
		// 	return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $vect->_x, 'y' => $this->_y - $vect->_y, 'z' => $this->_z - $vect->_z))));
		// }
		// public function opposite()
		// {
		// 	return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
		// }
		// public function scalarProduct($k)
		// {
		// 	return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
		// }
		// public function dotProduct(Vector $vect)
		// {
		// 	return (float)(($this->_x * $vect->_x) + ($this->_y * $vect->_y) + ($this->_z * $vect->_z));
		// }

		// public function crossProduct(Vector $vect)
		// {
		// 	return new Vector(array('dest' => new Vertex(array(
		// 		'x' => $this->_y * $vect->getZ() - $this->_z * $vect->getY(),
		// 		'y' => $this->_z * $vect->getX() - $this->_x * $vect->getZ(),
		// 		'z' => $this->_x * $vect->getY() - $this->_y * $vect->getX()
		// 	))));
		// }

		// public function cos(Vector $vect)
		// {
		// 	return ((($this->_x * $vect->_x) + ($this->_y * $vect->_y) + ($this->_z * $vect->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($vect->_x * $vect->_x) + ($vect->_y * $vect->_y) + ($vect->_z * $vect->_z))));
		// }




		public function magnitude() {
			$magn = (float)sqrt(
				($this->_x - $orig->x) ** 2 +
				($this->_y - $orig->y) ** 2 +
				($this->_z - $orig->z) ** 2
			);
			if ($magn == 1) {
				return ("norm");
			} else {
				return ($magn);
			}
		}
		public function normalize() {
			$len = $this->magnitude();
			if ($len == 1) {
				return clone $this;
			}
			$norm = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x / $len,
				'y' => $this->_y / $len,
				'z' => $this->_z / $len
			))));
			return ($norm);
		}
		public function add(Vector $vect) {
			$add = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x + $vect->_x,
				'y' => $this->_y + $vect->_y,
				'z' => $this->_z + $vect->_z
			))));
			return ($add);
		}
		public function sub(Vector $vect) {
			$sub = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x - $vect->_x,
				'y' => $this->_y - $vect->_y,
				'z' => $this->_z - $vect->_z
			))));
			return ($sub);
		}
		public function opposite() {
			$opp = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * (-1),
				'y' => $this->_y * (-1),
				'z' => $this->_z * (-1)
			))));
			return ($opp);
		}
		public function scalarProduct($k) {
			$scl = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_x * $k,
				'y' => $this->_y * $k,
				'z' => $this->_z * $k
			))));
			return ($scl);
		}
		public function dotProduct(Vector $vect) {
			$dot = (float)(
				$this->_x * $vect->_x +
				$this->_y * $vect->_y +
				$this->_z * $vect->_z
			);
			return ($dot);
		}
		public function crossProduct(Vector $vect) {
			$cross = new Vector(array('dest' => new Vertex(array(
				'x' => $this->_y * $vect->_z - $this->_z * $vect->_y,
				'y' => $this->_z * $vect->_x - $this->_x * $vect->_z,
				'z' => $this->_x * $vect->_y - $this->_y * $vect->_x
			))));
			return ($cross);
		}
		public function cos(Vector $vect) {
			if ($this->magnitude() == "norm"|| $vect->magnitude() == "norm") {
					return (0);
			} else {
				$multilen = $this->magnitude() * $vect->magnitude();
				return ($this->dotProduct($vect) / $multilen);
			}
		}

		function __toString()
		{
			return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}

		public static function doc()
		{
			return (file_get_contents("Vector.doc.txt"));
		}

		function __destruct()
		{
			if (self::$verbose == true)
				print("$this destructed".PHP_EOL);
			return;
		}
	}