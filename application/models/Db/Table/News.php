<?php
class Application_Model_Db_Table_News extends Zend_Db_Table_Abstract{
	//protected $_primary = 'id'; //-> default
	//protected $_primary = array('id', 'lang'); //-> combined primary
	//protected $_dependantTable = array('refcols'); //-> dependant table
	protected $_name = 'news';
	protected $_rowClass = 'Application_Model_Db_Row_News';

	public function getList() {
		$select = $this->getDefaultAdapter()->select();
		$select->from('news')->joinLeft('user', 'news.userId = user.id', array('firstName', 'surName'));
		return $this->getDefaultAdapter()->fetchAll($select);
	}

	public function getEditList() {
		$select = $this->getDefaultAdapter()->select();
		$select->from('news', array('id', 'title'));
		return $this->getDefaultAdapter()->fetchAll($select);
	}

	public function getDetail($id) {
		$select = $this->getDefaultAdapter()->select();
		$select->from('news')
			->where('news.id = '.$id)
			->joinLeft('user', 'news.userId = user.id', array('firstName', 'surName'));
		return $this->getDefaultAdapter()->fetchRow($select);
	}

	public function storeNews() {
	}
}
