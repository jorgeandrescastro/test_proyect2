<?php

/**
 * Controller to handle all the asyncronous requests
 * 
 *
 */
class AsyncController extends Zend_Controller_Action
{
	public function init() {
		$this->_helper->viewRenderer->setNoRender();
		$this->_helper->getHelper('layout')->disableLayout();
	}
    
	public function getzonesbyaffiliateAction()
	{
		$request = $this->getRequest();
		$affId = $request->getParam('id');
		
		$oxAffMapper = new Application_Model_OXAffiliateMapper();
		$affiliate = $oxAffMapper->find($affId);
		
		$oxzonesMapper = new Application_Model_OXZoneMapper();
		$oxzones = $oxzonesMapper->fetchByAffiliate($affiliate);
		
		$zoneSelectHtml = "";
		foreach ($oxzones as $oxzone) {
			$zoneSelectHtml .= '<option value="'.$oxzone->getId().'">' . $oxzone->getName() . '</option>';
		}
		
		echo $zoneSelectHtml;
	}
}

