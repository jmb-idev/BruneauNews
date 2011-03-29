<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		$this->_forward('list');
	}

    public function listAction()
    {
		$news = new Application_Model_Db_Table_News();
		$this->view->test = $news->getList();
    }

    public function detailAction()
    {
        // action body
		$detail = 'tekst';
		$this->view->tekst = $detail;
		$this->_forward('index', 'comment');
    }

	public function logoutAction() {
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		$this->_redirect('/');
	}

}


