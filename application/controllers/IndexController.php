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
		//$this->listAction();
		$this->_forward('list');
    }

    public function listAction()
    {
		// build some dummy data

		/*$dummydata = array(*/
			//array(
				//'title' => 'test 1',
				//'author' => 'myTest',
				//'date' => '2010-03-07 16:28:25',
				//'content' => 'Dit is een test 1',
			//),
			//array(
				//'title' => 'test 2',
				//'author' => 'myTest',
				//'date' => '2010-03-07 16:28:36',
				//'content' => 'Dit is een test 2',
			//),
		//);
		/*$this->view->test = $dummydata;*/

		$news = new Application_Model_Db_Table_News();
		$this->view->test = $news->getList();
		//Zend_Debug::dump($news->getList()->toArray());
		//die();
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


