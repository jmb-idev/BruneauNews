<?php

class CommentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		/*
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
        $db = $bootstrap->getResource('db');

        $select=$db->select();
        $select->from('comment');

        $result = $db->query($select);

		$comments = new Application_Model_Db_Table_Comment($db);

		$rowset = $comments->fetchAll();




        foreach($rowset as $row){
			Zend_Debug::dump($row, $label=null, $echo=true);
        }
		 */
    }

    public function indexAction()
    {
		// auth stuff
		$auth = Zend_Auth::getInstance();
		$ident = null;
		if($auth->hasIdentity())
			$ident = $auth->getIdentity();

		// comments
		$commentTable = new Application_Model_Db_Table_Comment();
		//Zend_Debug::dump($commentTable->getList($this->view->newsId));
		$this->view->comments = $commentTable->getList($this->view->newsId);

		// new comment
		$form = new Application_Form_Comment(array(
			'userId' => !empty($ident) ? $ident->id : $ident,
			'newsId' => $this->view->newsId,
		));
		if($this->_request->isPost()){
			//Zend_Debug::dump('you posted a comment');
			if($form->isValid($this->_request->getPost())) {
				$commentTable->insert($form->getValues());
			}
		}

		$this->view->form = $form;
		$this->renderScript('index/detail.phtml');
    }

}

