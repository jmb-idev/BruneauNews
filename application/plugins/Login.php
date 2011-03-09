<?php

class Application_Plugin_Login extends Zend_Controller_Plugin_Abstract {
	public function routeShutdown(Zend_Controller_Request_Abstract $request) {
		$table = new Application_Model_Db_Table_User();

		$requestRoute = array(
			'module' => $request->getModuleName(),
			'controller' => $request->getControllerName(),
			'action' => $request->getActionName()
		);
		$layout = Zend_Layout::getMvcInstance();
		$view = $layout->getView();
		$auth = Zend_Auth::getInstance();
		if($auth->hasIdentity()) {
			$ident = $auth->getIdentity();
			$content = 'welcome '.$ident->surName;
			$content .= "&nbsp;<a href='/index/logout'>logout</a>";
		} else {
			$form = new Application_Form_Login();
			if($request->isPost() && $request->getPost('loginForm') == 'BrunewsLoginForm') {
				$data = $request->getPost();
				if($form->isValid($data)) {
					$table = new Application_Model_Db_Table_User();
					$table->isValidUser($data);
					header("Location: /".implode('/',array_values($requestRoute)));
				}
			}
			$content = $form;
		}
		$view->placeholder('login')->set($content);
	}
}
