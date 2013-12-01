<?php
/**
 *	Model Class for Affiliates 
 *  
 */
class Application_Model_OXAffiliate
{
	/**
	 * Id of the Affiliate
	 * @var int
	 */
	private $_id;
	
	/**
	 * Name of the Affiliate
	 * @var string
	 */
	private $_affiliate;
	
	/**
	 * Constructor of the class
	 */
	public function __construct()
	{
	}

	/**
	 * Sets Id
	 * @param int $id
	 * @return Application_Model_OXAffiliate
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
	 * Sets Affiliate name
	 * @param Application_Model_OXAffiliate
	 */
	public function setName($affiliate)
	{
		$this->_affiliate = $affiliate;
		return $this;
	}

	/**
	 * Gets Affiliate name
	 * @param string
	 */
	public function getName()
	{
		return $this->_affiliate;
	}
}