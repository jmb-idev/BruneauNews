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
}

