<?php

class Jmb_View_Helper_NewsItemSummary extends Zend_View_Helper_Abstract {
	public function newsItemSummary(array $newsItem) {
		/* newsItem contains:: title, author, date, content */
		$newsItemSummary = "<div class='newsItemSummary'>";
		$newsItemSummary .= "<div class='titlebar'>".
			"<div class='title'>".$newsItem['title']."</div>".
			"<div class='author'>".$newsItem['author']."</div>".
			"<div class='date'>".$this->date($newsItem['date'])."</div>".
			"</div>";
		$newsItemSummary .= "<div class='content'>".$newsItem['content']."</div>";
		$newsItemSummary .= "</div>";
		return $newsItemSummary;
	}

	public function date($date) {
		$zndDate = new Zend_Date($date);
		return $zndDate->get('d MMM y HH:mm:ss');
	}
}
