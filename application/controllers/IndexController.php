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
		$this->listAction();
    }

    public function listAction()
    {
        // action body
		// build some dummy data
		$dummydata = array(
			array(
				'title' => 'test 1',
				'author' => 'myTest',
				'date' => '2010-03-07 16:28:25',
				'content' => 'Dit is een test 1',
			),
			array(
				'title' => 'test 2',
				'author' => 'myTest',
				'date' => '2010-03-07 16:28:36',
				'content' => 'Dit is een test 2',
			),
		);
		$this->view->test = $dummydata;
    }

    public function detailAction()
    {
        // action body
    }


}





