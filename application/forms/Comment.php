<?php
class Application_Form_Comment extends Zend_Form {
	public function init() {
		$this->addElement('hidden', 'commentForm', array('value' => 'BrunewsCommentForm'));
		$this->addElement('text',
			'title',
			array(
				'label' => 'title',
				'validators' => array(
					array(
						'Alnum',
						false,
						array('allowWhiteSpace' => true)
					),
					array('StringLength', false, array( 10, 250 ) )
				),
				'required' => true
			)
		);
		$this->addElement('textarea',
			'content',
			array(
				'label' => 'text',
				'required' => true
			)
		);
		$this->addElement('submit',
			'add comment',
			array(
				'label' => 'add comment',
				'ignore' => true
			)
		);
	}
}
