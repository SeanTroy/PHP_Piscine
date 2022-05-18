<?php
function ft_split($string) {
	$string = trim($string);
	$array = preg_split('/\s+/', $string);
	sort($array);
	return $array;
}
?>