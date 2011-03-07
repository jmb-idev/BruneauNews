<?php
/**
 * Jmb_View_Helper_NewsItemSummary.
 * Div box with news item summary, to use in a list
 *
 * @uses Zend_View_Helper_Abstract
 * @author Ike Devolder <ike DOT devolder AT gmail DOT com>
 */
class Jmb_View_Helper_NewsItemSummary extends Zend_View_Helper_Abstract {
	/**
	 * the function called as viewhelper
	 *
	 * @param array $newsItem
	 * @access public
	 * @return htmlstring
	 */
	public function newsItemSummary(array $newsItem) {
		/* newsItem contains:: title, author, date, content */
		$newsItemSummary = "<div class='newsItemSummary'>";
		$newsItemSummary .= "<div class='titlebar'>".
			"<div class='title'>".$newsItem['title']."</div>".
			"<div class='author'>".$newsItem['author']."</div>".
			"<div class='date'>".$this->view->date($newsItem['date'])."</div>".
			"</div>";
		$newsItemSummary .= "<div class='content'>".$newsItem['content']."</div>";
		$newsItemSummary .= "</div>";
		return $newsItemSummary;
	}
}
