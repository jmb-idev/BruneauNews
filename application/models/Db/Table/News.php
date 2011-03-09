<?php
class Application_Model_Db_Table_News extends Zend_Db_Table_Abstract{
	//protected $_primary = 'id'; //-> default
	//protected $_primary = array('id', 'lang'); //-> combined primary
	//protected $_dependantTable = array('refcols'); //-> dependant table
	protected $_name = 'news';
	protected $_rowClass = 'Application_Model_Db_Row_News';

	public function getList() {
		//$select = $this->select(true);
		//echo $select; die();
		$select = $this->getDefaultAdapter()->select();
		$select->from('news')->joinLeft('user', 'news.userId = user.id', array('firstName', 'surName'));
		//echo $select; die();
		//Zend_Debug::dump($this->fetchAll('SELECT `news`.* FROM `news`')); die();
		return $this->getDefaultAdapter()->fetchAll($select);
		//Zend_Debug::dump($this->fetchAll()); die();
	}

	public function getEditList() {
		$select = $this->getDefaultAdapter()->select();
		$select->from('news', array('id', 'title'));
		//Zend_Debug::dump($this->getDefaultAdapter()->fetchAll($select)); die();
		return $this->getDefaultAdapter()->fetchAll($select);
	}

	public function getDetail($id) {
		return $this->find($id)->current();
		//return $this->fetchRow('id = '.$id);
	}

	public function storeNews() {
	}
}
