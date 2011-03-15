<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	protected function _initCacheDir() {
		$options = $this->getOption('resources');
		if(isset($options['cachemanager']) &&
			isset($options['cachemanager']['database']) &&
			isset($options['cachemanager']['database']['backend']) &&
			isset($options['cachemanager']['database']['backend']['options']) &&
			isset($options['cachemanager']['database']['backend']['options']['cache_dir']))
		{
			if(!file_exists($options['cachemanager']['database']['backend']['options']['cache_dir']))
				mkdir($options['cachemanager']['database']['backend']['options']['cache_dir'], 0755, true);
		}
	}
	
	protected function _initHtml(){
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$options = $this->getOption('resources');
		if(isset($options['view']['encoding'])){
			$view->setEncoding($options['view']['encoding']);
		}
		if(isset($options['view']['doctype'])){
			$view->doctype($options['view']['doctype']);
		}
		if(isset($options['view']['contentType'])){
			//$view->headMeta()->appendHttpEquiv('Content-Type',$options['view']['contentType']);
		}	
	}

}

