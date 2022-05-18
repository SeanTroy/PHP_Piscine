#!/usr/bin/php
<?php
function ssap2cmp($a, $b) {
	$i = 0;
	$order = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	while ($i < strlen($a) || $i < strlen($b)) {
		$first = stripos($order, $a[$i]);
		$second = stripos($order, $b[$i]);
		if ($first < $second) {
			return (-1);
		} else if ($first > $second) {
			return (1);
		} $i++;
	}
	return (0);
}
$array = [];
for ($i = 1; $i < $argc; $i++) {
	$argv[$i] = trim($argv[$i]);
	$argument = preg_split('/\s+/', $argv[$i]);
	$array = array_merge($array, $argument);
}
usort($array, "ssap2cmp");
for ($i = 0; $array[$i]; $i++) {
	echo "$array[$i]\n";
}
?>