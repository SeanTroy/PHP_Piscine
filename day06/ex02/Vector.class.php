<?php

require_once 'Color.class.php';
require_once 'Vertex.class.php';

class Vector
{
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	static $verbose = False;

	public function __construct(array $vertexes)
	{
		if (isset($vertexes['orig'])) {
			$orig = $vertexes['orig'];
		} else {
			$orig = new Vertex (array ('x' => 0, 'y' => 0, 'z' => 0));
		}
		if (isset($vertexes['dest'])) {
			$dest = $vertexes['dest'];
			$this->_x = $dest->getX() - $orig->getX();
			$this->_y = $dest->getY() - $orig->getY();
			$this->_z = $dest->getZ() - $orig->getZ();
		}	else {
			echo "Please provide a destination vertex.\n";
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
		$str = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
		return ($str);
	}

	static function doc()
	{
		$str = file_get_contents("./Vector.doc.txt");
		return $str;
	}

	public function magnitude() {
		$magn = sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
		return $magn;
	}

	public function normalize() {
		$magn = $this->magnitude();
		$norm = new Vector (array ("dest" => new Vertex (array (
			"x" => $this->_x / $magn,
			"y" => $this->_y / $magn,
			"z" => $this->_z / $magn,
		))));
		return $norm;
	}

	public function add(Vector $rhs) {
		$resultant = new Vector (array ("dest" => new Vertex (array (
			"x" => $this->_x + $rhs->getX(),
			"y" => $this->_y + $rhs->getY(),
			"z" => $this->_z + $rhs->getZ()
		))));
		return $resultant;
	}

	public function sub(Vector $rhs) {
		$difference = new Vector (array ("dest" => new Vertex (array (
			"x" => $this->_x - $rhs->getX(),
			"y" => $this->_y - $rhs->getY(),
			"z" => $this->_z - $rhs->getZ()
		))));
		return $difference;
	}

	public function opposite() {
		$opposite = new Vector (array ("dest" => new Vertex (array (
			"x" => -$this->_x,
			"y" => -$this->_y,
			"z" => -$this->_z
		))));
		return $opposite;
	}

	public function scalarProduct($k) {
		$scalar = new Vector (array ("dest" => new Vertex (array (
			"x" => $this->_x * $k,
			"y" => $this->_y * $k,
			"z" => $this->_z * $k
		))));
		return $scalar;
	}

	public function dotProduct(Vector $rhs) {
		$dot = (float) (
			$this->_x * $rhs->getX() +
			$this->_y * $rhs->getY() +
			$this->_z * $rhs->getZ());
		return $dot;
	}

	public function cos(Vector $rhs) {
		$cosine = $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
		return $cosine;
	}

	public function crossProduct(Vector $rhs) {
		$cross = new Vector (array ("dest" => new Vertex (array (
			"x" => $this->_y * $rhs->getZ($rhs) - $this->_z * $rhs->getY($rhs),
			"y" => $this->_z * $rhs->getX($rhs) - $this->_x * $rhs->getZ($rhs),
			"z" => $this->_x * $rhs->getY($rhs) - $this->_y * $rhs->getX($rhs)
		))));
		return $cross;
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
}
