<?php

class Application_Model_Acl extends Zend_Acl {
	public function __construct() {
		$this->setupRoles();
		$this->setupResources();
		$this->setupRules();
	}

	public function setupRules() {
		$this->deny();
		$this->allow(); //...
	}

}
