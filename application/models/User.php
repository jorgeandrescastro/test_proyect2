<?php
/**
 *	Model Class for the users
 *  
 */
class Application_Model_User
{
	/**
	 * Id of the user
	 * @var int
	 */
	protected $_id;
	
	/**
	 * Name of the user
	 * @var string
	 */
	protected $_name;
	
	/**
	 * Username of the user
	 * @var string
	 */
	protected $_username;

	public function __construct(array $options = null)
	{
	}

	/**
	 * Sets Id of the user
	 * @param int $id
	 * @return Application_Model_User
	 */
	public function setId($id)
	{
		$this->_id = (int) $id;
		return $this;
	}
	
	/**
	 * Gets Id of the user
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * Sets the name of user
	 * @param string $name
	 * @return Application_Model_User
	 */
	public function setName($name)
	{
		$this->_name = (string) $name;
		return $this;
	}

	/**
	 * Gets Id of the user
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}

	/**
	 * Sets the username of the user
	 * @param string $username
	 * @return Application_Model_User
	 */
	public function setUsername($username)
	{
		$this->_username= (string) $username;
		return $this;
	}

	/**
	 * Gets Id of the user
	 * @return string
	 */
	public function getUsername()
	{
		return $this->_username;
	}
}