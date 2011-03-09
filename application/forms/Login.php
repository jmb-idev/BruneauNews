<?php
class Application_Form_Login extends Zend_Form {
	public function init() {
		$this->addElement('hidden', 'loginForm', array('value' => 'BrunewsLoginForm'));
		$this->addElement('text', 'email', array(
			'label' => 'email',
			'validators' => array( array(
				'EmailAddress', false
			)),
			'required' => true
		));
		$this->addElement('password', 'passwd', array(
			'label' => 'password',
			'required' => true
		));
		$this->addElement('submit', 'login', array('label' => 'login', 'ignore' => true));
	}
}
