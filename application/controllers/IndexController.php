<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		$this->news = new Application_Model_Db_Table_News();

		$content = "<a href='/admin' title='admin'>admin</a>";
		$this->view->placeholder('menu')->set($content);
    }

    public function indexAction()
    {
        // action body
		$this->_forward('list');
	}

    public function listAction()
    {
		$this->view->test = $this->news->getList();
    }

    public function detailAction()
    {
		$id = intval($this->_request->getParam('id', 0));
		$this->view->articleId = $id;
		$this->view->detail = $this->news->getDetail($id);
		$this->_forward('index', 'comment');
    }

	public function logoutAction() {
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		$this->_redirect('/');
	}

}


