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
		$this->view->test = 'Test';
    }

    public function detailAction()
    {
        // action body
    }


}





