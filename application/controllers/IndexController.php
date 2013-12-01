<?php

/**
 * Index Controller 
 * 
 *
 */
class IndexController extends Zend_Controller_Action
{
	private $_userAuth;
	
	public function init()
	{
		/* Initialize action controller here */
		if(!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('authentication/login');
		}
		$this->_userAuth = Zend_Auth::getInstance()->getIdentity();
		 
	}

    public function indexAction()
    {
		$mapper 			= new Application_Model_GamedataMapper();
		$games 				= $mapper->fetchAll();
		$this->view->games	= $games;
    }
    
    public function createAction()
    {
    	//Gets all the categories
    	$catMapper 			= new Application_Model_CategoryMapper();
    	$categories 		= $catMapper->fetchAll();
    	
    	$form 				= new Application_Form_CreateForm(null, $categories);
    	$this->view->form 	= $form;
    	
    	$request = $this->getRequest();
    	if($request->isPost()) {
    		if($form->isValid($this->_request->getPost())) {
				$game = new Application_Model_Gamedata();
    			
				$name = str_replace(' ', '-', trim($form->getValue('name')));
				
				$game->setProject($name);
    			$game->setSrc(GAME_IMG_PATH . $form->getValue('image'));
    			$game->setString3(GAME_SRC_CODE_PATH . $form->getValue('src'));
    			$game->setAlt($form->getValue('alt'));
    			$game->setString1($form->getValue('string1'));
    			$game->setString2($form->getValue('string2'));
    			
    			if($form->getValue('src'))
    			{
    				$game->setString3('');
    			}
    			
    			$game->setGameType($form->getValue('gametype'));
    			$game->setMarket($form->getValue('market'));
    			$game->setUrl($form->getValue('url'));
    			$game->setCategory($catMapper->find($form->getValue('category')));
    			$categories = $form->getValue('categories');
    			$game->setComingSoon($form->getValue('comingsoon'));
    			$game->setOnline($form->getValue('online'));
    			$game->setHeader($form->getValue('header'));
    			$game->setStartPage($form->getValue('startpage'));
    			$game->setHaveHeader($form->getValue('haveheader'));
    			$game->setPriority($form->getValue('priority'));
    			
    			$cats = array();
    			foreach ($categories as $cat) 
    			{
    				$cats[] = $catMapper->find($cat);
    			}
    			$game->setCategories($cats);
    			
    			$gameMapper = new Application_Model_GamedataMapper();
    			    			
				$new_gameId = $gameMapper->save($game);
    			if($new_gameId > 0) {
    				$this->view->message = "The game " . $game->getProject() . " was successfully created with ID: " . $new_gameId;
    				$this->view->success = true;
    			} else {
    				$this->view->message = "There has been a problem saving the game, please try again";
    				$this->view->success = false;
    			}
    		}
    	}
    }
    
    
    public function editAction()
    {
    	$request = $this->getRequest();
    	$gameId = $request->getParam('id');
    	
    	$catMapper = new Application_Model_CategoryMapper();
    	$categories = $catMapper->fetchAll();
    	
    	$gameMapper = new Application_Model_GamedataMapper();
    	$game = $gameMapper->find($gameId);
    	
    	$form = new Application_Form_EditForm(null, $categories, $game);
    	$this->view->form = $form;
    	
    	if($request->isPost()) {
    		if($form->isValid($this->_request->getPost())) {
    			$game = new Application_Model_Gamedata();
    			 
    			$game->setId($form->getValue('gameid'));
    			$game->setProject($form->getValue('name'));
    			$game->setSrc(GAME_IMG_PATH . $form->getValue('file'));
    			$game->setString3(GAME_SRC_CODE_PATH . $form->getValue('file'));
    			$game->setAlt($form->getValue('alt'));
    			$game->setString1($form->getValue('string1'));
    			$game->setString2($form->getValue('string2'));
    			$game->setGameType($form->getValue('gametype'));
    			$game->setMarket($form->getValue('market'));
    			$game->setUrl($form->getValue('url'));
    			$game->setCategory($catMapper->find($form->getValue('category')));
    			$categories = $form->getValue('categories');
    			$game->setComingSoon($form->getValue('comingsoon'));
    			$game->setOnline($form->getValue('online'));
    			$game->setHeader($form->getValue('header'));
    			$game->setStartPage($form->getValue('startpage'));
    			$game->setHaveHeader($form->getValue('haveheader'));
    			$game->setPriority($form->getValue('priority'));
    			 
    			$cats = array();
    			foreach ($categories as $cat) {
    				$cats[] = $catMapper->find($cat);
    			}
    			$game->setCategories($cats);
    			 
    			$gameMapper = new Application_Model_GamedataMapper();
    			
    			$new_gameId = $gameMapper->save($game);
    			if($new_gameId > 0) {
    				$this->view->message = "The game " . $game->getProject() . " was successfully edited";
    				$this->view->success = true;
    			} else {
    				$this->view->message = "There has been a problem editing the game, please try again";
    				$this->view->success = false;
    			}
    		}
    	}
    }
    
    public function openxzoneAction() {
    	$request = $this->getRequest();
    	$gameId = $request->getParam('id');
    	 
    	$affMapper = new Application_Model_OXAffiliateMapper();
    	$affiliates = $affMapper->fetchAll();
    	 
    	$gameMapper = new Application_Model_GamedataMapper();
    	$game = $gameMapper->find($gameId);
    	$this->view->gamename = $game->getProject();
    	 
    	$gameopenxMapper = new Application_Model_GameOpenXZoneMapper();
    	$openxzones = $gameopenxMapper->fetchOpenXZonesByGameId($game->getId());
    	$this->view->openxzones = $openxzones;
    	 
    	$nullAffiliate = new Application_Model_OXAffiliate();
    	$nullAffiliate->setId(0);
    	$nullAffiliate->setName('-');
    	array_unshift($affiliates, $nullAffiliate);
    	 
    	$form = new Application_Form_AssignForm(null, $affiliates, $gameId);
    	$this->view->form = $form;
    	 
    	if($request->isPost()) {
    		if($form->isValid($this->_request->getPost())) {
    			 
    			$zones = $form->getValue('zones');
    			
    			$openxMapper = new Application_Model_OpenXZoneMapper();
    			
    			foreach ($zones as $zone) {
    				$game = new Application_Model_GameOpenXZone();
    				
    				$openXZone = $openxMapper->fetchByZoneId($zone);
    				
					$game->setOpenxzoneId($openXZone[0]->getId());
					$game->setGameId($form->getValue('gameid'));
					$gameOXId = $gameopenxMapper->save($game);
    			}
    
    			if($gameOXId > 0) {
    				$this->view->message = "The Openx Zone was successfully assigned to the game";
    				$this->view->success = true;
    			} else {
    				$this->view->message = "There has been a problem assigning the open x zone, please try again";
    				$this->view->success = false;
    			}
    		}
    	}
    	 
    }
    
    public function configurationAction() {
    	$request = $this->getRequest();
    	$gameId = $request->getParam('id');
    	
    	$gameMapper = new Application_Model_GamedataMapper();
    	$game = $gameMapper->find($gameId);
    	$this->view->gamename = $game->getProject();
    	
    	$this->view->deployScripts = "
    	deploy_".$game->getProject().":<br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rm -R -f /var/www/static/".$game->getProject().".testproyect.de/*<br/>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;svn export --force project/games/".$game->getProject()." /var/www/static/".$game->getProject().".testproyect.de<br/>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;svn export --force project/games/common /var/www/static/".$game->getProject().".testproyect.de/common";
    	
    	$this->view->vhostScripts = '
    	if (req.http.host ~ "^'.$game->getProject().'.testproyect.de$") {<br/>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;set req.backend = static;<br/>
    	}';
    }
    
    public function adlinkAction() {
    	$request = $this->getRequest();
    	$gameId = $request->getParam('id');
    	
    	$gameMapper = new Application_Model_GamedataMapper();
    	$game = $gameMapper->find($gameId);
    	$this->view->gamename = $game->getProject();
    	
    	$url = $game->getUrl();
		
    	if(stripos($url, '?')) {
    		$url = substr($url,0,stripos($url, '?'));
    	} 
    	
    	$this->view->url = $url;

    	$partMapper = new Application_Model_PartnerMapper();
    	$partners = $partMapper->fetchAll();
    	
    	$langMapper = new Application_Model_LanguageMapper();
    	$languages = $langMapper->fetchAll();
    	
    	$form = new Application_Form_AdlinkForm(null, $partners, $languages);
    	$this->view->form = $form;
    }
}

