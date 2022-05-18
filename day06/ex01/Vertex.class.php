<?php

require_once 'Color.class.php';

class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	static $verbose = False;

	public function __construct(array $values)
	{
		if (isset($values['w'])) {
			$this->_w = $values['w'];
		}
		if (isset($values['color'])) {
			$this->_color = $values['color'];
		} else {
			$this->_color = new Color(array(
				'red' => 255, 'green' => 255, 'blue' => 255
			));
		}
		if (isset($values['x']) && isset($values['y']) && isset($values['z'])) {
			$this->_x = $values['x'];
			$this->_y = $values['y'];
			$this->_z = $values['z'];
		}	else {
			echo "Please provide x, y and z values.\n";
			exit;
		}
		if (self::$verbose === True) {
			printf($this . " constructed\n");
		}
	}

	public function __destruct()
	{
		if (self::$verbose === True) {
			printf($this . " destructed\n");
		}
	}

	public function __toString()
	{
		$strvertex = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%0.2f", $this->_x, $this->_y, $this->_z, $this->_w);
		$strcolor = sprintf("%s", $this->_color);
		if (self::$verbose === True) {
			return ($strvertex . ", " . $strcolor . " )");
		} else {
			return ($strvertex . " )");
		}
	}

	static function doc()
	{
		$str = file_get_contents("./Vertex.doc.txt");
		return $str;
	}

	public function getX()
	{
		return $this->_x;
	}

	public function getY()
	{
		return $this->_y;
	}

	public function getZ()
	{
		return $this->_z;
	}

	public function getW()
	{
		return $this->_w;
	}

	public function getColor()
	{
		return $this->_color;
	}

	public function setX($value)
	{
		$this->_x = $value;
	}

	public function setY($value)
	{
		$this->_y = $value;
	}

	public function setZ($value)
	{
		$this->_z = $value;
	}

	public function setW($value)
	{
		$this->_w = $value;
	}

	public function setColor($value)
	{
		$this->_color = $value;
	}
}
