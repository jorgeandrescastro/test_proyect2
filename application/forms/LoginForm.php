<?php
/**
 * Class to render the login form
 * 
 *
 */
class Application_Form_LoginForm extends Zend_Form {
	
	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('login');
		
		$usernameField = new Zend_Form_Element_Text('username');
		$usernameField->setLabel('Enter your Username: ')
					  ->setRequired(true);
		
		$usernameField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td', 'align' => 'center')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$passwordField = new Zend_Form_Element_Password('password');
		$passwordField->setLabel('Enter your Password: ')
					   ->setRequired(true);
		
		$passwordField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td', 'align' => 'center')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$submitButton = new Zend_Form_Element_Submit('login');
		$submitButton->setLabel('Enter');
		
		$submitButton->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td','colspan'=>'2','class'=>'center')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr', 'closeOnly'=>'true'))
		));

		$this->addElements(array($usernameField, $passwordField, $submitButton));
		$this->setMethod('POST');
		
		$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/authentication/login');
	}
	
}