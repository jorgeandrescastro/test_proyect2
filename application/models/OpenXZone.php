<?php
/**
 *	Model Class for Open X Zones
 *  
 */
class Application_Model_OpenXZone
{
	/**
	 * Id of the record in the DB
	 * @var int
	 */
	private $_id;
	
	/**
	 * Type of the Zone
	 * @var string
	 */
	private $_type;
	
	/**
	 * Actual Zone ID (Comes from the OX DB)
	 * @var int
	 */
	private $_zoneId;
	
	/**
	 * Zone hash
	 * @var string 
	 */
	private $_hash;

	/**
	 * Constructor of the class
	 */
	public function __construct()
	{
	}

	/**
	 * Sets ID
	 * @param int $id
	 * @return Application_Model_OpenXZone
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
	 * Sets Zone type
	 * @param string $type
	 * @return Application_Model_OpenXZone
	 */
	public function setType($type)
	{
		$this->_type = $type;
		return $this;
	}

	/**
	 * Gets Zone type
	 * @return string
	 */
	public function getType()
	{
		return $this->_type;
	}
	
	/**
	 * Sets Zone ID
	 * @param int
	 * @return Application_Model_OpenXZone
	 */
	public function setZoneId($zoneId)
	{
		$this->_zoneId = $zoneId;
		return $this;
	}

	/**
	 * Gets Zone ID
	 * @return int
	 */
	public function getZoneId()
	{
		return $this->_zoneId;
	}
	
	/**
	 * Sets hash
	 * @param string $hash
	 * @return Application_Model_OpenXZone
	 */
	public function setHash($hash)
	{
		$this->_hash = $hash;
		return $this;
	}
	
	/**
	 * Gets Hash
	 * @return string
	 */
	public function getHash()
	{
		return $this->_hash;
	}

}