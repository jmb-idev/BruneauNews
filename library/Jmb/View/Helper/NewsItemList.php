<?php
class Jmb_View_Helper_NewsItemList extends Zend_View_Helper_Abstract {
	public function newsItemList(array $newsItems) {
		$newsItemList = "<div class='newsItemList'>";
		foreach($newsItems as $newsItem) {
			$newsItemList .= $this->view->newsItemSummary($newsItem);
		}
		$newsItemList .= "</div>";
		return $newsItemList;
	}
}
