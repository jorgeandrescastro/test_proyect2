<?php
/**
 *	Db_Table class for game categories
 *  
 *
 */

class Application_Model_DbTable_Gamecategory extends Zend_Db_Table_Abstract
{
    protected $_name    = 'games_categories';
    protected $_primary = 'game_id';
}