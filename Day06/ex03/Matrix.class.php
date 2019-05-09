<?php
require_once('Vertex.class.php');
require_once('Vector.class.php');
class Matrix
{
	const IDENTITY 			= "IDENTITY";
	const SCALE 			= "SCALE";
	const RX 				= "Ox ROTATION";
	const RY 				= "Oy ROTATION";
	const RZ 				= "Oz ROTATION";
	const TRANSLATION 		= "TRANSLATION";
	const PROJECTION 		= "PROJECTION";
	private $matrix 		= [ 0, 0, 0, 0,
								0, 0, 0, 0,
								0, 0, 0, 0,
								0, 0, 0, 0];
	private $_preset;
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_fov;
	private $_ratio;
	private $_near;
	private $_far;
	
	static $verbose = false;
	public function __construct(array $array = null)
	{
		if (isset($array)) {
			if (isset($array['preset']))
				$this->_preset = $array['preset'];
			if (isset($array['scale']))
				$this->_scale = $array['scale'];
			if (isset($array['angle']))
				$this->_angle = $array['angle'];
			if (isset($array['vtc']))
				$this->_vtc = $array['vtc'];
			if (isset($array['fov']))
				$this->_fov = $array['fov'];
			if (isset($array['ratio']))
				$this->_ratio = $array['ratio'];
			if (isset($array['near']))
				$this->_near = $array['near'];
			if (isset($array['far']))
				$this->_far = $array['far'];
			if (Self::$verbose) {
				if ($this->_preset == Self::IDENTITY)
					echo "Matrix " . $this->_preset . " instance constructed\n";
				else
					echo "Matrix " . $this->_preset . " preset instance constructed\n";
			}
			$this->matinit();
		}
	}
	
	function __destruct()
	{
		if (Self::$verbose)
			printf("Matrix instance destructed\n");
	}
	function __toString()
	{
		$tmp = "M | vtcX | vtcY | vtcZ | vtxO\n";
		$tmp .= "-----------------------------\n";
		$tmp .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "w | %0.2f | %0.2f | %0.2f | %0.2f";
		return (sprintf($tmp, $this->matrix[0], $this->matrix[1], $this->matrix[2],
			$this->matrix[3], $this->matrix[4], $this->matrix[5], $this->matrix[6],
			$this->matrix[7], $this->matrix[8], $this->matrix[9], $this->matrix[10],
			$this->matrix[11], $this->matrix[12], $this->matrix[13], $this->matrix[14],
			$this->matrix[15]));
	}
	public static function doc()
	{
		if (file_exists('Matrix.doc.txt'))
			return file_get_contents('Matrix.doc.txt');
	}
	private function matinit()
	{
		switch ($this->_preset) {
			case (self::IDENTITY) :
				$this->identity(1);
				break;
			case (self::TRANSLATION) :
				$this->translation();
				break;
			case (self::SCALE) :
				$this->identity($this->_scale);
				break;
			case (self::RX) :
				$this->rotation_x();
				break;
			case (self::RY) :
				$this->rotation_y();
				break;
			case (self::RZ) :
				$this->rotation_z();
				break;
			case (self::PROJECTION) :
				$this->projection();
				break;
		}
	}
	private function identity($scale)
	{
		$this->matrix[0] = $scale;
		$this->matrix[5] = $scale;
		$this->matrix[10] = $scale;
		$this->matrix[15] = 1;
	}
	private function translation()
	{
		$this->identity(1);
		$this->matrix[3] = $this->_vtc->getX();
		$this->matrix[7] = $this->_vtc->getY();
		$this->matrix[11] = $this->_vtc->getZ();
		$this->matrix[3] = 20;
		$this->matrix[7] = 20;
	}
	private function rotation_x()
	{
		$this->identity(1);
		$this->matrix[0] = 1;
		$this->matrix[5] = cos($this->_angle);
		$this->matrix[6] = -sin($this->_angle);
		$this->matrix[9] = sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}
	private function rotation_y()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[2] = sin($this->_angle);
		$this->matrix[5] = 1;
		$this->matrix[8] = -sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}
	private function rotation_z()
	{
		$this->identity(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[1] = -sin($this->_angle);
		$this->matrix[4] = sin($this->_angle);
		$this->matrix[5] = cos($this->_angle);
		$this->matrix[10] = 1;
	}
	private function projection()
	{
		$this->identity(1);
		$this->matrix[5] = 1 / tan(0.5 * deg2rad($this->_fov));
		$this->matrix[0] = $this->matrix[5] / $this->_ratio;
		$this->matrix[10] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
		$this->matrix[14] = -1;
		$this->matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
		$this->matrix[15] = 0;
	}
	public function mult(Matrix $rhs)
	{
		$tmp = array();
		for ($i = 0; $i < 16; $i += 4) {
			for ($j = 0; $j < 4; $j++) {
				$tmp[$i + $j] = 0;
				$tmp[$i + $j] += $this->matrix[$i + 0] * $rhs->matrix[$j + 0];
				$tmp[$i + $j] += $this->matrix[$i + 1] * $rhs->matrix[$j + 4];
				$tmp[$i + $j] += $this->matrix[$i + 2] * $rhs->matrix[$j + 8];
				$tmp[$i + $j] += $this->matrix[$i + 3] * $rhs->matrix[$j + 12];
			}
		}
		$matrice = new Matrix();
		$matrice->matrix = $tmp;
		return $matrice;
	}
	public function transformVertex(Vertex $vtx)
	{
		$tmp = array();
		$tmp['x'] = ($vtx->getX() * $this->matrix[0]) + ($vtx->getY() * $this->matrix[1]) +
					($vtx->getZ() * $this->matrix[2]) + ($vtx->getW() * $this->matrix[3]);
		$tmp['y'] = ($vtx->getX() * $this->matrix[4]) + ($vtx->getY() * $this->matrix[5]) +
					($vtx->getZ() * $this->matrix[6]) + ($vtx->getW() * $this->matrix[7]);
		$tmp['z'] = ($vtx->getX() * $this->matrix[8]) + ($vtx->getY() * $this->matrix[9]) +
					($vtx->getZ() * $this->matrix[10]) + ($vtx->getW() * $this->matrix[11]);
		$tmp['w'] = ($vtx->getX() * $this->matrix[11]) + ($vtx->getY() * $this->matrix[13]) +
					($vtx->getZ() * $this->matrix[14]) + ($vtx->getW() * $this->matrix[15]);
		$tmp['color'] = $vtx->getColor();
		$vertex = new Vertex($tmp);
		return $vertex;
	}
}
?>
