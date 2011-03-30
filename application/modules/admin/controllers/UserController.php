<?php

class Admin_UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		$content = "<a href='/admin' title='admin'>admin</a>";
		$this->view->placeholder('menu')->set($content);
		$this->flashMessenger = new Zend_Controller_Action_Helper_FlashMessenger();
		$this->view->messages = $this->flashMessenger->getMessages();    	
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
		$form =$this->view->form = new Application_Form_User();
		$this->renderScript('/user/edit.phtml');    	
    }

    public function editAction()
    {
        $form =$this->view->form = new Application_Form_User();

        $userTable = new Application_Model_Db_Table_User();
    	
		if($this->_request->isPost()){
        	if($form->isValid($this->_request->getPost())){
     			$id = $this->_request->getParam('id',0);
        	    if($id<=0) {
					$this->flashMessenger->addMessage('wrong id');
					$this->_redirect('/admin/user');
				}
				else{
					$userTable->update($form->getValues(), 'id = '.$id);	
				}    			
	        }
        }
        else{
        	$id = intval($this->_request->getParam('id', 0));
        	if($id<=0) {
				$this->flashMessenger->addMessage('wrong id');
				$this->_redirect('/admin/user');
			}
			else{
		    	if($row = $userTable->getUser($id)){
    				$form->populate($row->toArray());
    			}
			}  	
        }
    }    
    
    public function updateAction()
    {
    	// action body
    	
    	
    	if($this->_request->isPost()) {
			$data = $this->_request->getPost();
			if($form->isValid($data)) {
				$userTable = new Application_Model_Db_Table_User();
				if($userTable->insert($form->getValues()))
					$this->flashMessenger->addMessage('your article has ben saved');
				else
					$this->flashMessenger->addMessage('there went something wrong with your article');

				$this->_redirect('/admin/news');
			}
		}    	
    	
    }


}





