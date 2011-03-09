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

	public function indexAction() {
		$table = new Application_Model_Db_Table_News();
		//Zend_Debug::dump($table->getEditList()); die();
		$this->view->articleList = $table->getEditList();
	}

    public function newAction()
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

	public function editAction() {
		$id = intval($this->_request->getParam('id', 0));
		if($id<=0) {
			$this->flashMessenger->addMessage('wrong id');
			$this->_redirect('/admin/news');
		}
		$form = new Application_Form_NewsItem();
		$table = new Application_Model_Db_Table_News();
		if($this->_request->isPost()) {
			$data = $this->_request->getPost();
			if($form->isValid($data)) {
				if($table->update( $form->getValues(), 'id = '.$id))
					$this->flashMessenger->addMessage('your article has ben updated');
				else
					$this->flashMessenger->addMessage('there went something wrong with your article');

				$this->_redirect('/admin/news');
			}
		}
		$content = $table->getDetail($id);
		//Zend_Debug::dump($content); die();
		$form->populate($content->toArray());
		$this->view->form = $form;
		$this->renderScript('news/new.phtml');
	}

	public function deleteAction() {
		$id = intval($this->_request->getParam('id', 0));
		if($id<=0) {
			$this->flashMessenger->addMessage('wrong id');
			$this->_redirect('/admin/news');
		}
		$table = new Application_Model_Db_Table_News();
		if($table->delete('id = ' . $id)) {
			$this->flashMessenger->addMessage('Deleted '.$id);
		}
		$this->_redirect('/admin/news');
	}
}

