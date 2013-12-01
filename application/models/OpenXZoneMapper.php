<?php
/**
 *	Mapper Class for open x zones 
 *  
 */
class Application_Model_OpenXZoneMapper
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
	 * @return Application_Model_OpenXZoneMapper
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
			$this->setDbTable('Application_Model_DbTable_OpenXZone');
		}
		return $this->_dbTable;
	}

	/**
	 * Finds a OpenXZone by ID
	 * @param int $id
	 * @return void|Application_Model_OpenXZone
	 */
	public function find($id)
	{
		$result = $this->getDbTable()->find($id);
		if (0 == count($result)) {
			return;
		}
		$row = $result->current();
		
		$zone = new Application_Model_OpenXZone();
				
		$zone->setId($row->id)
			 ->setType($row->type)
			 ->setZoneId($row->zone_id)
			 ->setHash($row->zone_hash);
		
		return $zone;
	}
	
	/**
	 * Fetches the Openx zone by the zone id
	 * @param int $zoneId
	 * @return array
	 */
	public function fetchByZoneId($zoneId)
	{
		$select = $this->getDbTable()
		->select()->where('zone_id = ?', $zoneId);
	
		$resultSet = $this->getDbTable()->getAdapter()->fetchAll($select);
		$rows = array();
		
		foreach($resultSet as $row) {
			$openXZone = new Application_Model_OpenXZone();
			$openXZone->setId($row['id'])
				      ->setType($row['type'])
					  ->setZoneId($row['zone_id'])
					  ->setHash($row['zone_hash']);
				
			$rows[] = $openXZone;
		}
	
		return $rows;
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
			$entry = new Application_Model_OpenXZone();
			
			$entry->setId($row->id)
				 ->setType($row->type)
				 ->setZoneId($row->zone_id)
				 ->setHash($row->zone_hash);
			
			$entries[] = $entry;
		}
		return $entries;
	}
	
	/**
	 * Inserts a new Openx zone in the database
	 * @param Application_Model_OpenXZone $zone
	 */
	public function save(Application_Model_OpenXZone $zone)
	{
		$data = array(
				'id'   => $zone->getId(),
				'zone_id' => $zone->getZoneId(),
				'zone_hash' => $zone->getHash(),
				'type' => $zone->getType(),
		);
	
		if (null === ($id = $zone->getId())) {
			unset($data['id']);
			
			return $this->getDbTable()->insert($data);
	
		} else {
			return $this->getDbTable()->update($data, array('id = ?' => $id));
		}
	}

}