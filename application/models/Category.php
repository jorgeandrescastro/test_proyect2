<?php
/**
 *	Model Class for categories
 *  
 */
class Application_Model_Category
{
	/**
	 * Id of the category
	 * @var int
	 */
	private $_id;
	
	/**
	 * Name of the category
	 * @var string
	 */
	private $_category;
	
	/**
	 * Description of the category
	 * @var string
	 */
	private $_description;

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
	 * Sets Category name
	 * @param Application_Model_Category
	 */
	public function setCategory($category)
	{
		$this->_category = $category;
		return $this;
	}

	/**
	 * Gets Category name
	 * @return string
	 */
	public function getCategory()
	{
		return $this->_category;
	}
	
	/**
	 * Sets Description
	 * @param Application_Model_Category
	 */
	public function setDescription($description)
	{
		$this->_description = $description;
		return $this;
	}

	/**
	 * Gets Description
	 * @param string
	 */
	public function getDescription()
	{
		return $this->_description;
	}
	

}