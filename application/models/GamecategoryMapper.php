<?php
/**
 *	Mapper Class for Game categories
 *  
 */
class Application_Model_GamecategoryMapper
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
	 * @return Application_Model_GamecategoryMapper
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
			$this->setDbTable('Application_Model_DbTable_Gamecategory');
		}
		return $this->_dbTable;
	}

	/**
	 * Fetches all the Game categories for a game id 
	 * @param int $gameId
	 * @return array
	 */
	public function fetchByGameId($gameId)
	{
		$select = $this->getDbTable()
					   ->select()->where('game_id = ?', $gameId);
		
		$resultSet = $this->getDbTable()->getAdapter()->fetchAll($select);
		$rows = array();
		
		foreach($resultSet as $row) {
			$gamecategory = new Application_Model_Gamecategory();
			$gamecategory->setGameId($row['game_id']);
			$gamecategory->setCategoryId($row['category_id']);
			
			$rows[] = $gamecategory;
		}
		
		return $rows;
	}
	
	/**
	 * Inserts or updates the game category in the database
	 * @param Application_Model_Gamedata $gamecategory
	 */
	public function save(Application_Model_Gamecategory $gamecategory)
	{
		$data = array(
				'game_id' => $gamecategory->getGameId(),
				'category_id' => $gamecategory->getCategoryId(),
		);
	
		return $this->getDbTable()->insert($data);
	}
}