<?php

class Admin_UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		$user = new Application_Model_Db_Table_User();
		$this->view->userlist = $user->getList();
		Zend_Debug::dump($this->view->userlist);
    }

    public function createAction()
    {
        // action body
    }

    public function updateAction()
    {
        // action body
    }


}





