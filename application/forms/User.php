<?php
class Application_Form_User extends Zend_Form {
	private $_edit = false;

	public function __construct($options = null) {
		if(isset($options['edit']) && $options['edit'] == true) {
			$this->_edit = true;
			unset($options['edit']);
		}
		parent::__construct($options);
	}

	public function init() {
		$this->addElement('hidden', 'id');
		$this->addElement('text', 'userName', array(
				'label' => 'User Name',
				'validators' => array(
					array('Alnum', false)
				),
				'required' => true
			)
		);
		$this->addElement('text', 'firstName', array(
				'label' => 'First name',
				'validators' => array(
					array('Alnum', array('allowWhiteSpace' => false) ),
					array('StringLength', array( 10, 250 ))
				),
				'required' => true
			)
		);
		$this->addElement('text', 'surName', array(
				'label' => 'Surname',
				'validators' => array(
					array('Alnum', array('allowWhiteSpace' => false) ),
					array('StringLength', array( 10, 250 ))
				),
				'required' => true
			)
		);
		$this->addElement('text', 'email', array(
				'label' => 'email',
				'validators' => array(array('EmailAddress', false)),
				'required' => true
			)
		);
		$this->addElement('password', 'passwd', array(
				'label' => 'password',
				'required' => $this->_edit ? false : true
			)
		);
		$this->addElement('password', 'verifyPasswd', array(
				'label' => 'verify password',
				'required' => $this->_edit ? false : true
			)
		);
		$this->addElement('submit', 'Save', array(
				'label' => 'Save',
				'ignore' => true
			)
		);
	}
}
