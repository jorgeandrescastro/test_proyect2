<?php
/**
 *	Mapper Class for open x zones 
 *  
 */
class Application_Model_OXZoneMapper
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
	 * @return Application_Model_OXZoneMapper
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
			$this->setDbTable('Application_Model_DbTable_OXZone');
		}
		return $this->_dbTable;
	}

	/**
	 * Finds a OXZone by ID
	 * @param int $id
	 * @return void|Application_Model_OXZone
	 */
	public function find($id)
	{
		$result = $this->getDbTable()->find($id);
		if (0 == count($result)) {
			return;
		}
		$row = $result->current();
		
		$affMapper = new Application_Model_OXAffiliateMapper();
		$affiliate = $affMapper->find($row->affiliateid);
		
		$zone = new Application_Model_OXZone();
				
		$zone->setId($row->zoneid)
			 ->setName($row->zonename)
			 ->setAffiliate($affiliate);
		
		return $zone;
	}

	/**
	 * Fetches all the Zones
	 * @return array
	 */
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_OXZone();
			
			$affMapper = new Application_Model_OXAffiliateMapper();
			$affiliate = $affMapper->find($row->affiliateid);
			
			$entry->setId($row->zoneid)
			 ->setName($row->zonename)
			 ->setAffiliate($affiliate);
			
			$entries[] = $entry;
		}
		return $entries;
	}
	
	/**
	 * Fetches all the Zones by Affiliate
	 * @param Application_Model_OXAffiliate $aff
	 * @return array
	 */
	public function fetchByAffiliate($aff)
	{
		$select = $this->getDbTable()
		->select()->where('affiliateid = ?', $aff->getID());
	
		$resultSet = $this->getDbTable()->getAdapter()->fetchAll($select);
		$rows = array();
	
		foreach($resultSet as $row) {
			$zone = new Application_Model_OXZone();
			$zone->setId($row['zoneid'])
				 ->setName($row['zonename'])
				 ->setAffiliate($aff);
				
			$rows[] = $zone;
		}
	
		return $rows;
	}
}