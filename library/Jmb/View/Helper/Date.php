<?php

class Jmb_View_Helper_Date extends Zend_View_Helper_Abstract {
	public function date($date) {
		$zndDate = new Zend_Date($date);
		return $zndDate->get('d MMM y HH:mm:ss');
	}
}
