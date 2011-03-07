<?php

class Admin_NewsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		$form = new Zend_Form();
		$form->addElement('text', 'title');
		$form->addElement('textarea', 'article');
		$this->view->form = $form;
    }


}

