<?php
/**
 *	Model Class for the language
 *  
 */
class Application_Model_Language
{
	/**
	 * Id of the language
	 * @var int
	 */
	protected $_id;
	
	/**
	 * English name of the language
	 * @var string
	 */
	protected $_language;
	
	/**
	 * Code name of the language
	 * @var string
	 */
	protected $_code;
	
	public function __construct(array $options = null)
	{
	}

	/**
	 * Sets Id of the language
	 * @param int $id
	 * @return Application_Model_Language
	 */
	public function setId($id)
	{
		$this->_id = (int) $id;
		return $this;
	}
	
	/**
	 * Gets Id of the Language
	 * @return int
	 */
	public function getId()
	{
		return $this->_id;
	}

	/**
	 * Sets the english name of the language
	 * @param string $language
	 * @return Application_Model_Language
	 */
	public function setLanguage($language)
	{
		$this->_language = (string) $language;
		return $this;
	}

	/**
	 * Gets the english Name of the language
	 * @return string
	 */
	public function getLanguage()
	{
		return $this->_language;
	}
	
	/**
	 * Sets the code name of the language
	 * @param string $code
	 * @return Application_Model_Language
	 */
	public function setCode($code)
	{
		$this->_code = (string) $code;
		return $this;
	}
	
	/**
	 * Gets the code Name of the language
	 * @return string
	 */
	public function getCode()
	{
		return $this->_code;
	}
}