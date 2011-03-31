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
        // action body
		$form = new Application_Form_Comment();
		if($this->_request->isPost()){
			//if($form->isValid($this->_request->getPost())) {
				//$commentTable = new Application_Model_Db_Table_Comment();
				//$commentTable->insert($form->getValues());
			//}
		}

		$this->view->form = $form;
		$this->renderScript('index/detail.phtml');
    }

}

