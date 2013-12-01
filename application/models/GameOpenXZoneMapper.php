<?php
/**
 *	Mapper Class for Game openx zones
 *  
 */
class Application_Model_GameOpenXZoneMapper
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
	 * @return Application_Model_GameOpenXZoneMapper
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
			$this->setDbTable('Application_Model_DbTable_GameOpenXZone');
		}
		return $this->_dbTable;
	}

	/**
	 * Fetches all the Game openx zones for a game id 
	 * @param int $gameId
	 * @return array
	 */
	public function fetchGameOpenXZonesByGameId($gameId)
	{
		$select = $this->getDbTable()
					   ->select()->where('game_id = ?', $gameId);
		
		$resultSet = $this->getDbTable()->getAdapter()->fetchAll($select);
		$rows = array();
		
		foreach($resultSet as $row) {
			$gameopenxzone = new Application_Model_GameOpenXZone();
			$gameopenxzone->setId($row['id']);
			$gameopenxzone->setGameId($row['game_id']);
			$gameopenxzone->setOpenxzoneId($row['openx_zone_id']);
			
			$rows[] = $gameopenxzone;
		}
		
		return $rows;
	}
	
	/**
	 * Fetches all the Openx zones for a game id
	 * @param int $gameId
	 * @return array
	 */
	public function fetchOpenXZonesByGameId($gameId)
	{
		$gameOpenxZones = $this->fetchGameOpenXZonesByGameId($gameId);
		$rows = array();
	
		foreach($gameOpenxZones as $zone) {
			$openxzoneMapper = new Application_Model_OpenXZoneMapper();
			$openXzone = $openxzoneMapper->find($zone->getOpenxzoneId());
				
			$rows[] = $openXzone;
		}
	
		return $rows;
	}
	
	/**
	 * Inserts the game openx zone in the database
	 * @param Application_Model_GameOpenXZone $game
	 * @return int
	 */
	public function save(Application_Model_GameOpenXZone $game)
	{
		$data = array(
				'game_id' => $game->getGameId(),
				'openx_zone_id' => $game->getOpenxzoneId(),
		);
	
		return $this->getDbTable()->insert($data);
	}
}