<?php
/**
 *	Model Class for the partners
 *  
 */
class Application_Model_Partner
{
	/**
	 * Id of the partner
	 * @var int
	 */
	protected $_id;
	
	/**
	 * Name of the partner
	 * @var string
	 */
	protected $_name;
	
	public function __construct(array $options = null)
	{
	}

	/**
	 * Sets Id of the partner
	 * @param int $id
	 * @return Application_Model_Partner
	 */
	public function setId($id)
	{
		$this->_id = (int) $id;
		return $this;
	}
	
	/**
	 * Gets Id of the Partner
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * Sets the name of partner
	 * @param string $name
	 * @return Application_Model_Partner
	 */
	public function setName($name)
	{
		$this->_name = (string) $name;
		return $this;
	}

	/**
	 * Gets Name of the partner
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}
}