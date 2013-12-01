<?php
/**
 *	Model Class for Game Categories
 *  
 */
class Application_Model_Gamecategory
{
	/**
	 * Id of the game
	 * @var int
	 */
	private $_gameId;
	
	/**
	 * Id of the category
	 * @var int
	 */
	private $_categoryId;
	
	/**
	 * Constructor of the class
	 */
	public function __construct()
	{
	}

	/**
	 * Sets game Id
	 * @param int $id
	 * @return Application_Model_Gamecategory
	 */
	public function setGameId($id)
	{
		$this->_gameId = $id;
		return $this;
	}
	
	/**
	 * Gets game ID
	 * @return int
	 */
	public function getGameId()
	{
		return $this->_gameId;
	}

	/**
	 * Sets category Id
	 * @param int $id
	 * @return Application_Model_Gamecategory
	 */
	public function setCategoryId($id)
	{
		$this->_categoryId = $id;
		return $this;
	}
	
	/**
	 * Gets category ID
	 * @return int
	 */
	public function getCategoryId()
	{
		return $this->_categoryId;
	}

}