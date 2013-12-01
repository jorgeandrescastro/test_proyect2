<?php
/**
 *	Model Class for games
 *  
 */
class Application_Model_Gamedata
{
	/**
	 * Id of the game
	 * @var int
	 */
	private $_id;
	
	/**
	 * Name of the game
	 * @var string
	 */	
	private $_project;
	
	/**
	 * Path of the game image
	 * @var string	
	 */
	private $_src;
	
	/**
	 * Alt text
	 * @var string
	 */
	private $_alt;
	
	/**
	 * String 1
	 * @var string
	 */
	private $_string1;
	
	/**
	 * String 2
	 * @var string
	 */
	private $_string2;
	
	/**
	 * String 3
	 * @var string
	 */
	private $_string3;
	
	/**
	 * Game type
	 * @var string
	 */
	private $_gameType;
	
	/**
	 * Market
	 * @var sring
	 */
	private $_market;
	
	/**
	 * Coming Soon flag
	 * @var int
	 */
	private $_comingSoon;
	
	/**
	 * Online flag
	 * @var int
	 */
	private $_online;
	
	/**
	 * Header
	 * @var int
	 */
	private $_header;
	
	/**
	 * URL of the game
	 * @var string
	 */
	private $_url;
	
	/**
	 * Game's Category's ID
	 * @var int
	 */
	private $_categoryId;
	
	/**
	 * Game's category
	 * @var Application_Model_Category
	 */
	private $_category;
	
	/**
	 * Alternative categories of the game
	 * @var array
	 */
	private $_categories;
	
	/**
	 * Startpage
	 * @var int
	 */
	private $_startpage;
	
	/**
	 * Have header
	 * @var int
	 */
	private $_haveHeader;
	
	/**
	 * Priority of the game
	 * @var int
	 */
	private $_priority;
	

	/**
	 * Constructor of the class
	 */
	public function __construct()
	{
	}

	/**
	 * Sets Id
	 * @param int $id
	 * @return Application_Model_Category
	 */
	public function setId($id)
	{
		$this->_id = (int) $id;
		return $this;
	}
	
	/**
	 * Gets ID
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
	 * Sets Project
	 * @param string $project
	 * @return Application_Model_Gamedata
	 */
	public function setProject($project)
	{
		$this->_project = $project;
		return $this;
	}
	
	/**
	 * Gets Project
	 * @return string
	 */
	public function getProject()
	{
		return $this->_project;
	}

	/**
	 * Sets Src
	 * @param string $src
	 * @return Application_Model_Gamedata
	 */
	public function setSrc($src)
	{
		$this->_src = $src;
		return $this;
	}
	
	/**
	 * Gets Src
	 * @return string
	 */
	public function getSrc()
	{
		return $this->_src;
	}
	
	/**
	 * Sets alt
	 * @param string $alt
	 * @return Application_Model_Gamedata
	 */
	public function setAlt($alt)
	{
		$this->_alt = $alt;
		return $this;
	}
	
	/**
	 * Gets Alt
	 * @return string
	 */
	public function getAlt()
	{
		return $this->_alt;
	}
	
	/**
	 * Sets String 1
	 * @param string $str
	 * @return Application_Model_Gamedata
	 */
	public function setString1($str)
	{
		$this->_string1 = $str;
		return $this;
	}
	
	/**
	 * Gets String 1
	 * @return string
	 */
	public function getString1()
	{
		return $this->_string1;
	}
	
	/**
	 * Sets String 2
	 * @param string $str
	 * @return Application_Model_Gamedata
	 */
	public function setString2($str)
	{
		$this->_string2 = $str;
		return $this;
	}
	
	/**
	 * Gets String 2
	 * @return string
	 */
	public function getString2()
	{
		return $this->_string2;
	}
	
	/**
	 * Sets String 3
	 * @param string $str
	 * @return Application_Model_Gamedata
	 */
	public function setString3($str)
	{
		$this->_string3 = $str;
		return $this;
	}
	
	/**
	 * Gets String 3
	 * @return string
	 */
	public function getString3()
	{
		return $this->_string3;
	}
	
	/**
	 * Sets Game type
	 * @param string $str
	 * @return Application_Model_Gamedata
	 */
	public function setGameType($type)
	{
		$this->_gameType = $type;
		return $this;
	}
	
	/**
	 * Gets game type
	 * @return string
	 */
	public function getGameType()
	{
		return $this->_gameType;
	}
	
	/**
	 * Sets Market
	 * @param string $market
	 * @return Application_Model_Gamedata
	 */
	public function setMarket($market)
	{
		$this->_market = $market;
		return $this;
	}
	
	/**
	 * Gets Market
	 * @return string
	 */
	public function getMarket()
	{
		return $this->_market;
	}
	
	/**
	 * Sets Coming soon
	 * @param int $val
	 * @return Application_Model_Gamedata
	 */
	public function setComingSoon($val)
	{
		$this->_comingSoon = $val;
		return $this;
	}
	
	/**
	 * Gets Coming soon
	 * @return int
	 */
	public function getComingSoon()
	{
		return $this->_comingSoon;
	}
	
	/**
	 * Sets online
	 * @param int $val
	 * @return Application_Model_Gamedata
	 */
	public function setOnline($val)
	{
		$this->_online = $val;
		return $this;
	}
	
	/**
	 * Gets Online
	 * @return int
	 */
	public function getOnline()
	{
		return $this->_online;
	}
	
	/**
	 * Sets header
	 * @param int $val
	 * @return Application_Model_Gamedata
	 */
	public function setHeader($val)
	{
		$this->_header = $val;
		return $this;
	}
	
	/**
	 * Gets header
	 * @return int
	 */
	public function getHeader()
	{
		return $this->_header;
	}
	
	/**
	 * Sets Url
	 * @param strin $url
	 * @return Application_Model_Gamedata
	 */
	public function setUrl($url)
	{
		$this->_url = $url;
		return $this;
	}
	
	/**
	 * Gets Url
	 * @return string
	 */
	public function getUrl()
	{
		return $this->_url;
	}
	
	/**
	 * Sets Category Id
	 * @param int $id
	 * @return Application_Model_Gamedata
	 */
	public function setCategoryId($id)
	{
		$this->_categoryId = $id;
		return $this;
	}
	
	/**
	 * Gets Category Id
	 * @return int
	 */
	public function getCategoryId()
	{
		return $this->_categoryId;
	}
	
	/**
	 * Sets Category and category id 
	 * @param Application_Model_Category $category
	 * @return Application_Model_Gamedata
	 */
	public function setCategory($category)
	{
		if(isset($category)) {
			$this->_category = $category;
			$this->setCategoryId($category->getId());
		}
		return $this;
	}
	
	/**
	 * Gets Category
	 * @return Application_Model_Category
	 */
	public function getCategory()
	{
		return $this->_category;
	}
	
	/**
	 * Sets Categories
	 * @param array $cats
	 * @return Application_Model_Gamedata
	 */
	public function setCategories($cats)
	{
		$this->_categories = $cats;
		return $this;
	}
	
	/**
	 * Gets Categories
	 * @return array
	 */
	public function getCategories()
	{
		return $this->_categories;
	}
	
	/**
	 * Sets startpage
	 * @param int $val
	 * @return Application_Model_Gamedata
	 */
	public function setStartPage($val)
	{
		$this->_startPage = $val;
		return $this;
	}
	
	/**
	 * Gets startpage
	 * @return int
	 */
	public function getStartPage()
	{
		return $this->_startPage;
	}
	
	/**
	 * Sets have header
	 * @param int $val
	 * @return Application_Model_Gamedata
	 */
	public function setHaveHeader($val)
	{
		$this->_haveHeader = $val;
		return $this;
	}
	
	/**
	 * Gets have header
	 * @return int
	 */
	public function getHaveHeader()
	{
		return $this->_haveHeader;
	}
	
	/**
	 * Sets priority
	 * @param int $val
	 * @return Application_Model_Gamedata
	 */
	public function setPriority($val)
	{
		$this->_priority = $val;
		return $this;
	}
	
	/**
	 * Gets priority
	 * @return int
	 */
	public function getPriority()
	{
		return $this->_priority;
	}
}