<?php
/**
 *	Mapper Class for open x affiliates 
 *  
 */
class Application_Model_OXAffiliateMapper
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
	 * @return Application_Model_OXAffiliateMapper
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
			$this->setDbTable('Application_Model_DbTable_OXAffiliate');
		}
		return $this->_dbTable;
	}

	/**
	 * Finds a OXAffilaite by ID
	 * @param int $id
	 * @return void|Application_Model_OXAffiliate
	 */
	public function find($id)
	{
		$result = $this->getDbTable()->find($id);
		if (0 == count($result)) {
			return;
		}
		$row = $result->current();
		
		$affiliate = new Application_Model_OXAffiliate();
		
		$affiliate->setId($row->affiliateid)
				->setName($row->name);
		
		return $affiliate;
	}

	/**
	 * Fetches all the affiliates
	 * @return array
	 */
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_OXAffiliate();
			
			$entry->setId($row->affiliateid)
				  ->setName($row->name);
			
			$entries[] = $entry;
		}
		return $entries;
	}
}