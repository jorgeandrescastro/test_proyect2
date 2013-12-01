<?php
/**
 * Class to render the assign Ad link form
 * 
 *
 */
class Application_Form_AdlinkForm extends Zend_Form {
	
	public function __construct($options = null, $partners, $languages){
		parent::__construct($options);
		
		$this->setName('adlinkform');
		$this->setMethod('POST');
		$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/index/adlink/');
		
		
		$partnersOptions = array();
		foreach ($partners as $partner){
			$partnersOptions[$partner->getName()] = $partner->getName();
		}
		array_unshift($partnersOptions, "");
						
		$partnerField = new Zend_Form_Element_Select('partner');
		$partnerField->setLabel('Partner: ')		
			          ->setMultiOptions($partnersOptions)
			          ->setRequired(true);		
		
		$partnerField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		
		
		$languagesOptions = array();
		foreach ($languages as $language){
			$languagesOptions[$language->getCode()] = $language->getLanguage();
		}
		array_unshift($languagesOptions, "");
		
		$languageField = new Zend_Form_Element_Select('language');
		$languageField->setLabel('Language: ')		
			          ->setMultiOptions($languagesOptions)
			          ->setRequired(true);		
		
		$languageField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$adField = new Zend_Form_Element_Checkbox("ad");
		$adField->setLabel('Ad Enabled: ');
		
		$adField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));

		$this->addElements(array($partnerField, $languageField, $adField));
		
		
		$this->setDecorators(array(
               'FormElements',
               array(array('data'=>'HtmlTag'),array('tag'=>'table')),
               'Form'
       ));
		
	}
}