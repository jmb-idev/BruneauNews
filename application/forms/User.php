<?php
class Application_Form_User extends Zend_Form {
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
														'required' => true
												)
						);
		$this->addElement('submit', 'Save', array(
													'label' => 'Save',
													'ignore' => true
													)
						);
	}
}
