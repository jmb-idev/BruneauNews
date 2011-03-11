<?php
class Application_Model_Db_Table_User extends Zend_Db_Table_Abstract{
	protected $_name = 'user';
	protected $_rowClass = 'Application_Model_Db_Row_User';

	public function init() {
		//Zend_Debug::dump($this->info()); die();
	}

	public function isValidUser(array $data) {
		//$adapter = new Zend_Auth_Adapter_DbTable($this->getDefaultAdapter(), 'user', 'email', 'passwd', 'sha256(?)');
		$adapter = new Zend_Auth_Adapter_DbTable($this->getDefaultAdapter(), 'user', 'email', 'passwd');
		$adapter->setIdentity($data['email'])->setCredential($data['passwd']);

		$auth = Zend_Auth::getInstance();
		$result = $auth->authenticate($adapter);
		if($result->isValid()) {
			$storage = $auth->getStorage();
			$storage->write($adapter->getResultRowObject(null, array('passwd', 'passwdVerify')));
			return true;
		}
		return false;
	}

	public function getList() {
		$select = $this->getDefaultAdapter()->select();
		$select->from('user');
		return $this->getDefaultAdapter()->fetchAll($select);
	}
	
	public function getUser($id){
		return $this->find($id)->current();
	}
}