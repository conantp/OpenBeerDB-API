<?php

class AppController extends Lvc_PageController
{
	protected $layout = 'default';
	
	protected function beforeAction()
	{
		$this->setLayoutVar('pageTitle', 'Untitled');
		$this->requireCss('reset.css');
		$this->requireCss('master.css');
		$this->requireJs('jquery-1.4.4.min.js');
	}
	
	public function requireCss($cssFile)
	{
		$this->layoutVars['requiredCss'][$cssFile] = true;
	}
	
	public function requireJs($jsFile)
	{
		$this->layoutVars['requiredJs'][$jsFile] = true;
	}
	
}

?>