<?php
class Application_Form_Comment extends Zend_Form {
	private $_id = null;
	private $_userId = null;
	private $_newsId = null;

	public function __construct($options = null) {
		if(isset($options['id']) && !empty($options['id'])) {
			$this->_id = $options['id'];
			unset($options['id']);
		}

		if(isset($options['userId']) && !empty($options['userId'])) {
			$this->_userId = $options['userId'];
			unset($options['userId']);
		}

		if(isset($options['newsId']) && !empty($options['newsId'])) {
			$this->_newsId = $options['newsId'];
			unset($options['newsId']);
		}

		parent::__construct($options);
	}

	public function init() {
		$this->addElement('hidden', 'commentForm', array('value' => 'BrunewsCommentForm'));
		$this->addElement('hidden', 'id', array('value' => $this->_id));
		$this->addElement('hidden', 'userId', array('value' => $this->_userId));
		$this->addElement('hidden', 'newsId', array('value' => $this->_newsId));
		/*
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
		 */
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
