#!/usr/bin/php
<?php
function validateWeekday($day) {
	$day = lcfirst($day);
	$array = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
	$i = 0;
	while ($i < 7) {
		if ($day == $array[$i]) {
			return ($i);
		}
		$i++;
	}
	return (-1);
}
function validateMonth($month) {
	$month = lcfirst($month);
	if ($month == "janvier")
		return (1);
	if ($month == "février")
		return (2);
	if ($month == "mars")
		return (3);
	if ($month == "avril")
		return (4);
	if ($month == "mai")
		return (5);
	if ($month == "juin")
		return (6);
	if ($month == "juillet")
		return (7);
	if ($month == "août")
		return (8);
	if ($month == "septembre")
		return (9);
	if ($month == "octobre")
		return (10);
	if ($month == "novembre")
		return (11);
	if ($month == "décembre")
		return (12);
	else
		return (0);
}
if ($argc == 2) {
	$calendar = preg_split("/ /", $argv[1]);
	$weekday = validateWeekday($calendar[0]);
	$day = $calendar[1];
	$month = validateMonth($calendar[2]);
	$year = $calendar[3];
	$time = $calendar[4];
	if ($weekday == -1 || $month == 0 || preg_match("/\b(0?[1-9]|[12]\d|3[01])\b/", $day) == 0
		|| preg_match("/\b\d{4}\b/", $year) == 0 || preg_match("/^([0-1]\d|2[0-3]):([0-5]\d):([0-5]\d)$/", $time) == 0) {
		echo "Wrong Format\n";
		exit (-1);
	}
	if (checkdate($month, $day, $year)) {
		$dateString = $year . "-" . $month . "-" . $day . " " . $time;
		date_default_timezone_set('Europe/Paris');
		$timeDifference = strtotime($dateString);
		echo $timeDifference . "\n";
		if (date('w', $timeDifference) != $weekday) {
			echo "(Wrong weekday, though)" . "\n";
		}
	} else {
		echo "Incorrect Date\n";
	}
}
?>