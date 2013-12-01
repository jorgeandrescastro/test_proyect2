<?php
/**
 *	Mapper Class for Gamedata
 *  
 */
class Application_Model_GamedataMapper
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
	 * @return Application_Model_GamedataMapper
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
			$this->setDbTable('Application_Model_DbTable_Gamedata');
		}
		return $this->_dbTable;
	}

	/**
	 * Inserts or updates the game in the database 
	 * @param Application_Model_Gamedata $game
	 */
	public function save(Application_Model_Gamedata $game)
	{
		$data = array(
				'id'   => $game->getId(),
				'project' => $game->getProject(),
				'src' => $game->getSrc(),
				'alt' => $game->getAlt(),
				'string1' => $game->getString1(),
				'string2' => $game->getString2(),
				'string3' => $game->getString3(),
				'game_typ' => $game->getGameType(),
				'market' => $game->getMarket(),
				'coming_soon' => $game->getComingSoon(),
				'online' => $game->getOnline(),
				'header' => $game->getHeader(),
				'url' => $game->getUrl(),
				'category' => $game->getCategoryId(),
				'startpage' => $game->getStartPage(),
				'have_header' => $game->getHaveHeader(),
				'priority' => $game->getPriority(),
		);

		if (null === ($id = $game->getId())) {
			unset($data['id']);
			$gameId = $this->getDbTable()->insert($data);

			foreach($game->getCategories() as $category){
				$gamecategory = new Application_Model_Gamecategory();
				$gamecategory->setGameId($gameId);
				$gamecategory->setCategoryId($category->getId());
				
				$mapper = new Application_Model_GamecategoryMapper();
				$mapper->save($gamecategory);
			}
			
			return $gameId;
			
		} else {
			return $this->getDbTable()->update($data, array('id = ?' => $id));
		}
	}

	/**
	 * Finds a category by ID
	 * @param int $id
	 * @return void|Application_Model_Gamedata
	 */
	public function find($id)
	{
		$result = $this->getDbTable()->find($id);
		if (0 == count($result)) {
			return;
		}
		$row = $result->current();
		
		$mapperCategory = new Application_Model_CategoryMapper();
		$category = $mapperCategory->find($row->category);
		
		$mapper = new Application_Model_GamecategoryMapper();
		$gamecategories = $mapper->fetchByGameId($id);
		
		$categories = array();
		foreach($gamecategories as $gamecategory) {
			$categories[] = $mapperCategory->find($gamecategory->getCategoryId());
		}
		
		$game = new Application_Model_Gamedata();
		
		$game->setId($row->id)
			->setProject($row->project)
			->setSrc($row->src)
			->setAlt($row->alt)
			->setString1($row->string1)
			->setString2($row->string2)
			->setString3($row->string3)
			->setGameType($row->game_typ)
			->setMarket($row->market)
			->setComingSoon($row->coming_soon)
			->setOnline($row->online)
			->setHeader($row->header)
			->setUrl($row->url)
			->setCategory($category)
			->setCategoryId($row->category)
			->setCategories($categories)
			->setStartPage($row->startpage)
			->setHaveHeader($row->have_header)
			->setPriority($row->priority);
		
		return $game;
	}

	/**
	 * Fetches all the games
	 * @return array
	 */
	public function fetchAll()
	{
		$resultSet = $this->getDbTable()->fetchAll();
		$entries   = array();
		foreach ($resultSet as $row) {
			$entry = new Application_Model_Gamedata();
			
			$mapper = new Application_Model_CategoryMapper();
			$category = $mapper->find($row->category);
								
			$entry->setId($row->id)
				->setProject($row->project)
				->setSrc($row->src)
				->setAlt($row->alt)
				->setString1($row->string1)
				->setString2($row->string2)
				->setString3($row->string3)
				->setGameType($row->game_typ)
				->setMarket($row->market)
				->setComingSoon($row->coming_soon)
				->setOnline($row->online)
				->setHeader($row->header)
				->setUrl($row->url)
				->setCategory($category)
				->setCategoryId($row->category)
				->setStartPage($row->startpage)
				->setHaveHeader($row->have_header)
				->setPriority($row->priority);
			
			$entries[] = $entry;
		}
		return $entries;
	}
}