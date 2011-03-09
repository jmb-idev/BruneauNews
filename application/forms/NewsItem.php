<?php

class Application_Form_NewsItem extends Zend_Form {
	public function init() {
		$this->addElement('hidden', 'id');
		$this->addElement('hidden', 'userId', array('value' => 1));
		$this->addElement('text', 'title', array('label' => 'title', 'validators' => array( array('Alnum', false, array('allowWhiteSpace' => true) ), array('StringLength', false, array( 10, 250 ) )), 'required' => true));
		$this->addElement('textarea', 'content', array('label' => 'text', 'required' => true));
		$this->addElement('select', 'categoryId', array('multiOptions' => array(0 => '--kies--', 1 =>'category1'), 'label' => 'category', 'required' => true, 'validators' => array(array('GreaterThan', false, array(0)))));
		$this->addElement('submit', 'send', array('label' => 'send', 'ignore' => true));

		$this->setElementFilters(array('StringTrim','StripTags'));
	}
}
