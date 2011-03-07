<?php
/**
 * Jmb_View_Helper_Date.
 * Date view helper, put a string in it, retreive it always in the same format
 *
 * @uses Zend_View_Helper_Abstract
 * @author Ike Devolder <ike DOT devolder AT gmail DOT com>
 */
class Jmb_View_Helper_Date extends Zend_View_Helper_Abstract {
	/**
	 * give the date
	 *
	 * @param string $date
	 * @access public
	 * @return formatted date
	 */
	public function date($date) {
		$zndDate = new Zend_Date($date);
		return $zndDate->get('d MMM y HH:mm:ss');
	}
}
