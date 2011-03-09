<?php

class Admin_NewsController extends Zend_Controller_Action
{
	private $flashMessenger;

    public function init()
    {
        /* Initialize action controller here */
		$this->flashMessenger = new Zend_Controller_Action_Helper_FlashMessenger();
		$this->view->messages = $this->flashMessenger->getMessages();
    }

    public function indexAction()
    {
        // action body
		$form = new Application_Form_NewsItem();

		if($this->_request->isPost()) {
			$data = $this->_request->getPost();
			if($form->isValid($data)) {
				$newstable = new Application_Model_Db_Table_News();
				if($newstable->insert($form->getValues()))
					$this->flashMessenger->addMessage('your article has ben saved');
				else
					$this->flashMessenger->addMessage('there went something wrong with your article');

				$this->_redirect('/admin/news');
			}
		}

		$this->view->form = $form;
    }


}

