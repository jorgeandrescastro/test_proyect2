<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDoctype() {
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');
	}
	
	protected function _initConfig() {
		$config = new Zend_Config($this->getOptions(), true);
		Zend_Registry::set('config', $config);
		
		if(!defined('GAME_IMG_PATH'))
			define('GAME_IMG_PATH', $config->game->img->folder->path);
		
		if(!defined('GAME_SRC_CODE_PATH'))
			define('GAME_SRC_CODE_PATH', $config->game->source->code->path);
	}
	
	protected function _initDbRegistry()
	{
		$this->bootstrap('multidb');
		$resource = $this->getPluginResource('multidb');
		Zend_Registry::set('dbtestproyect', $resource->getDb('testproyect'));
		Zend_Registry::set('dbOpenx', $resource->getDb('openx'));
	}
	
}

