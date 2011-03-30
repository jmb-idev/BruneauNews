<?php

class Admin_CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		$content = "<a href='/admin' title='admin'>admin</a>";
		$this->view->placeholder('menu')->set($content);
    }

    public function indexAction()
    {
        // action body
    }


}

