<?php
/**
 * Class to render the assign Openx zone form
 * 
 *
 */
class Application_Form_AssignForm extends Zend_Form {
	
	public function __construct($options = null, $affiliates, $gameid){
		parent::__construct($options);
		
		$this->setName('assign');
		$this->setMethod('POST');
		$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/index/openxzone/id/'.$gameid);
		
		$idField = new Zend_Form_Element_Hidden('gameid');
		$idField->setValue($gameid);
		
		$affOptions = array();
		foreach ($affiliates as $affiliate){
			$affOptions[$affiliate->getId()] = $affiliate->getName();
		}
						
		$affiliateField = new Zend_Form_Element_Select('affiliate');
		$affiliateField->setLabel('Affiliate: ')		
			          ->setMultiOptions($affOptions)
			          ->setRequired(true);		
		
		$affiliateField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		
		
		$zonesField = new Zend_Form_Element_Multiselect('zones');
		$zonesField->setLabel('Zones (First select an affiliate)')
						->setMultiOptions(array())
						->setRegisterInArrayValidator(false);;
		
		$zonesField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$submitButton = new Zend_Form_Element_Submit('assignBtn');
		$submitButton->setLabel('Assign OpenX Zone');
		
		$submitButton->setDecorators(array(
               'ViewHelper',
               'Description',
               'Errors', 
			   array(array('data'=>'HtmlTag'), array('tag' => 'td','colspan'=>'2','class'=>'center')),
               array(array('row'=>'HtmlTag'),array('tag'=>'tr', 'closeOnly'=>'true'))
       ));

		$this->addElements(array($idField, $affiliateField, $zonesField, $submitButton));
		
		
		$this->setDecorators(array(
               'FormElements',
               array(array('data'=>'HtmlTag'),array('tag'=>'table')),
               'Form'
       ));
		
	}
}