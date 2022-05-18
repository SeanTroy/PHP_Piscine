<?php

class Nightswatch
{
	private $_fighters = [];

	public function recruit($person)
	{
		$this->_fighters[] = $person;
	}
	public function fight()
	{
		foreach ($this->_fighters as $person) {
			if ($person instanceof IFighter) {
				$person->fight();
			}
		}
	}
}

?>