<?php
/**
 *	Model Class for Game openx zones
 *  
 */
class Application_Model_GameOpenXZone
{
	/**
	 * Id
	 * @var int
	 */
	private $_id;
	
	/**
	 * Id of the game
	 * @var int
	 */
	private $_gameId;
	
	/**
	 * Id of the openxzone
	 * @var int
	 */
	private $_openxzoneId;
	
	/**
	 * Constructor of the class
	 */
	public function __construct()
	{
	}
	
	/**
	 * Sets  Id
	 * @param int $id
	 * @return Application_Model_GameOpenXZone
	 */
	public function setId($id)
	{
		$this->_id = $id;
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
	 * Sets game Id
	 * @param int $id
	 * @return Application_Model_GameOpenXZone
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
	 * Sets openx zone Id
	 * @param int $id
	 * @return Application_Model_GameOpenXZone
	 */
	public function setOpenxzoneId($id)
	{
		$this->_openxzoneId = $id;
		return $this;
	}
	
	/**
	 * Gets open x zone ID
	 * @return int
	 */
	public function getOpenxzoneId()
	{
		return $this->_openxzoneId;
	}

}