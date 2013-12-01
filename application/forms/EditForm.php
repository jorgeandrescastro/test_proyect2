<?php
/**
 * Class to render the edit game form
 * 
 *
 */
class Application_Form_EditForm extends Zend_Form {
	
	public function __construct($options = null, $categories, Application_Model_Gamedata $game){
		parent::__construct($options);
		
		$this->setName('edit');
		$this->setMethod('POST');
		$this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/index/edit/id/'.$game->getId());
		
		$idField = new Zend_Form_Element_Hidden('gameid');
		$idField->setValue($game->getId());
		
		$nameField = new Zend_Form_Element_Text('name');
		$nameField->setLabel('Name of the game *: ')
				  ->setRequired(true)
				  ->setValue($game->getProject())
				  ->addErrorMessage('Please, type the name of the game');
		
		$nameField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td', 'align' => 'center')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$commitedToSvn = true;
		$location = 'The game source code is already under Control Version';
		if(strlen($game->getString3()) > 0) 
		{
			$commitedToSvn = false;
			$location = 'The game source code is located in: ' . $game->getString3() . '. Has it been commited to SVN?';
		}
		
		$srcField = new Zend_Form_Element_Checkbox('src');
		$srcField->setLabel($location)
				 ->setValue($commitedToSvn);
		
		if($commitedToSvn) 
		{
			$srcField->setAttrib('disabled', 'disabled');
		}
		
		$srcField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td', 'align' => 'center')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$altField = new Zend_Form_Element_Text('alt');
		$altField->setLabel('Alt text: ')
				 ->setValue($game->getAlt());
		
		$altField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$string1Field = new Zend_Form_Element_Text('string1');
		$string1Field->setLabel('String Text 1: ')
					 ->setValue($game->getString1());
		
		$string1Field->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$string2Field = new Zend_Form_Element_Text('string2');
		$string2Field->setLabel('String Text 2: ')
					 ->setValue($game->getString2());
		
		$string2Field->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$gametypeField = new Zend_Form_Element_Select('gametype');
		$gametypeField->setLabel('Game type *: ')		
			          ->setMultiOptions(array('free'=>'Free', 'sgds'=>'Sgds'))
			          ->setValue($game->getGameType())
			          ->setRequired(true);		
		
		$gametypeField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$marketField = new Zend_Form_Element_Text('market');
		$marketField->setLabel('Market: ')
					->setValue($game->getMarket()) ;
		
		$marketField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$urlField = new Zend_Form_Element_Text('url');
		$urlField->setLabel('URL of the game: ')
				 ->setValue($game->getUrl());
		
		$urlField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$categoryOptions = array();
		foreach ($categories as $category){
			$categoryOptions[$category->getId()] = $category->getCategory();
		}
		
		$categoryField = new Zend_Form_Element_Select('category');
		$categoryField->setLabel('Game Category *: ')
					  ->setMultiOptions($categoryOptions)
					  ->setValue($game->getCategoryId())
					  ->setRequired(true);
		
		$categoryField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$selectedCat = array();
		foreach ($game->getCategories() as $cat) {
			$selectedCat[] = $cat->getId();
		}
		
		$categoriesField = new Zend_Form_Element_Multiselect('categories');
		$categoriesField->setLabel('Game Categories *: You can select more than one')
						->setMultiOptions($categoryOptions)
						->setValue($selectedCat);
		
		$categoriesField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		
		$comingsoonField = new Zend_Form_Element_Checkbox("comingsoon");
		$comingsoonField->setLabel('Coming Soon: ')
						->setValue($game->getComingSoon());
		
		$comingsoonField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$onlineField = new Zend_Form_Element_Checkbox("online");
		$onlineField->setLabel('Online: ')
					->setValue($game->getOnline());;
		
		$onlineField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$headerField = new Zend_Form_Element_Checkbox("header");
		$headerField->setLabel('Header: ')
					->setValue($game->getHeader());;
		
		$headerField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$startpageField = new Zend_Form_Element_Checkbox("startpage");
		$startpageField->setLabel('Startpage: ')
					   ->setValue($game->getStartPage());
		
		$startpageField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$haveHeaderField = new Zend_Form_Element_Checkbox('haveheader');
		$haveHeaderField->setLabel('Have Header: ')
						->setValue($game->getHaveHeader());
		
		$haveHeaderField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$priorityField = new Zend_Form_Element_Text('priority');
		$priorityField->setLabel('Priority: ')
					  ->setRequired(true)
					  ->setValue($game->getPriority())
					  ->addErrorMessage('Please, set a priority for the game');
		
		$priorityField->setDecorators(array(
				'ViewHelper',
				'Description',
				'Errors',
				array(array('data'=>'HtmlTag'), array('tag' => 'td')),
				array('Label', array('tag' => 'td')),
				array(array('row'=>'HtmlTag'),array('tag'=>'tr'))
		));
		
		$submitButton = new Zend_Form_Element_Submit('create');
		$submitButton->setLabel('Edit Game');
		
		$submitButton->setDecorators(array(
               'ViewHelper',
               'Description',
               'Errors', 
			   array(array('data'=>'HtmlTag'), array('tag' => 'td','colspan'=>'2','class'=>'center')),
               array(array('row'=>'HtmlTag'),array('tag'=>'tr', 'closeOnly'=>'true'))
       ));

		$this->addElements(array($idField, $nameField, $srcField, $altField, $string1Field, $string2Field,
								 $gametypeField, $urlField, $marketField, $categoryField, $categoriesField, $comingsoonField, 
								 $onlineField, $headerField, $startpageField, $haveHeaderField, $priorityField, $submitButton));
		
		
		$this->setDecorators(array(
               'FormElements',
               array(array('data'=>'HtmlTag'),array('tag'=>'table')),
               'Form'
       ));
		
	}
	
}