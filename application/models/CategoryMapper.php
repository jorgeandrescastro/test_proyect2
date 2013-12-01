<?php
/**
 *	Mapper Class for categories
 *  
 */
class Application_Model_CategoryMapper
{
	/**
	 * DB table
	 * @var Zend_Db_Table_Abstract
	 */
	protected $_dbTable;

	/**
	 * Sets DB table
	 * @param Zend_Db_Table_Abstract $dbTable
	 * @throws Exception
	 * @return Application_Model_CategoryMapper
	 */
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}

	/**
	 * Gets DB table
	 * @return Zend_Db_Table_Abstract
	 */
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Application_Model_DbTable_Category');
		}
		return $this->_dbTable;
	}

	/**
	 * Finds a category by ID
	 * @param int $id
	 * @return void|Application_Model_Category
	 */
	public function find($id)
	{
		$result = $this->getDbTable()->find($id);
		if (0 == count($result)) {
			return;
		}
		$row = $result->current();
		
		$category = new Application_Model_Category();
		
		$category->setId($row->id)
				->setCategory($row->category)
				->setDescription($row->page_title);
		
		return $category;
	}

	/**
	 * Fetches all the categories
	 * @return array
	 */
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_Category();
			
			$entry->setId($row->id)
				->setCategory($row->category)
				->setDescription($row->page_title);
			
			$entries[] = $entry;
		}
		return $entries;
	}
}