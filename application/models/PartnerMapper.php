<?php
/**
 *	Mapper Class for partner
 *  
 */
class Application_Model_PartnerMapper
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
	 * @return Application_Model_PartnerMapper
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
			$this->setDbTable('Application_Model_DbTable_Partner');
		}
		return $this->_dbTable;
	}

	/**
	 * Fetches all the partners
	 * @return array
	 */
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_Partner();
			
			$entry->setId($row->id)
			 ->setName($row->partner);
			
			$entries[] = $entry;
		}
		return $entries;
	}
}