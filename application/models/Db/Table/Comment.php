<?php

class Application_Model_Db_Table_Comment extends Zend_Db_Table_Abstract {
	protected $_name = 'comment';
	protected $_rowClass = 'Application_Model_Db_Row_News';

	public function getList($newsId) {
		$select = $this->getDefaultAdapter()->select();
		$select->from('comment')
			->where('comment.newsId = '.$newsId)
			->joinLeft('user', 'comment.userId = user.id', array('firstName', 'surName'));
		return $this->getDefaultAdapter()->fetchAll($select);
	}

}
