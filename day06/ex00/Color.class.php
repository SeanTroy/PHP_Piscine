<?php
class Color {
	public $red;
	public $green;
	public $blue;
	public static $verbose = False;

	public function __construct(array $values) {
		if (isset($values['rgb'])) {
			$this->red = intval($values['rgb']) >> 16 & 0xFF;
			$this->green = intval($values['rgb']) >> 8 & 0xFF;
			$this->blue = intval($values['rgb']) & 0xFF;
		}	else {
			$this->red = intval($values['red']);
			$this->green = intval($values['green']);
			$this->blue = intval($values['blue']);
		}
		if (self::$verbose === True) {
			printf($this . " constructed.\n");
		}
	}

	public function __destruct() {
		if (self::$verbose === True) {
			printf($this . " destructed.\n");
		}
	}

	public function __toString (){
		$str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
		return $str;
	}

	static function doc () {
		$str = file_get_contents("./Color.doc.txt");
		return $str;
	}

	public function add ( Color $rhs ) {
		$new = new Color (array (
		"red" => $this->red + $rhs->red,
		"green" => $this->green + $rhs->green,
		"blue" => $this->blue + $rhs->blue,
		));
		return $new;
	}

	public function sub ( Color $rhs ) {
		$new = new Color (array (
			"red" => $this->red - $rhs->red,
			"green" => $this->green - $rhs->green,
			"blue" => $this->blue - $rhs->blue,
			));
			return $new;
	}

	public function mult ( $f ) {
		$new = new Color (array (
			"red" => $this->red * $f,
			"green" => $this->green * $f,
			"blue" => $this->blue * $f,
			));
			return $new;
	}

}
?>