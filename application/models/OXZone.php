<?php
/**
 *	Model Class for Open X Zones 
 *  
 */
class Application_Model_OXZone
{
	/**
	 * Id of the Zone
	 * @var int
	 */
	private $_id;
	
	/**
	 * Name of the Zone
	 * @var string
	 */
	private $_name;
	
	/**
	 * Affiliate ID
	 * @var int
	 */
	private $_affiliateId;
	
	/**
	 * Affiliate
	 * @var Application_Model_OXAffiliate
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
	 * @return Application_Model_OXZone
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
	 * Sets Zone name
	 * @param Application_Model_OXZone
	 */
	public function setName($name)
	{
		$this->_name = $name;
		return $this;
	}

	/**
	 * Gets Zone name
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}
	
	/**
	 * Sets Affiliate ID
	 * @param Application_Model_OXZone
	 */
	public function setAffiliateID($affId)
	{
		$this->_affiliateId = $affId;
		return $this;
	}

	/**
	 * Gets Affiliate ID
	 * @return int
	 */
	public function getAffiliateId()
	{
		return $this->_affiliateId;
	}
	
	/**
	 * Sets Affiliate and Affiliate id
	 * @param Application_Model_OXAffiliate $affiliate
	 * @return Application_Model_OXZone
	 */
	public function setAffiliate($affiliate)
	{
		if(isset($affiliate)) {
			$this->_affiliate = $affiliate;
			$this->setAffiliateId($affiliate->getId());
		}
		return $this;
	}
	
	/**
	 * Gets Affiliate
	 * @return Application_Model_OXAffiliate
	 */
	public function getAffiliate()
	{
		return $this->_affiliate;
	}

}