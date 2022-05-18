<?php

class Tyrion extends Lannister
{
	public function sleepWith($person)
	{
		if ($person instanceof Jaime) {
			print("Not even if I'm drunk !" . PHP_EOL);
		} else if ($person instanceof Sansa) {
			print("Let's do this." . PHP_EOL);
		} else if ($person instanceof Cersei) {
			print("Not even if I'm drunk !" . PHP_EOL);
		}	else {
			print("Don't know him, but I'm drunk enough to consider the option." . PHP_EOL);
		}
	}
}

?>