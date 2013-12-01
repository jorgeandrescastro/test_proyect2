<?php
/**
 *	Db_Table class for the Ox_affiliates table in the OPENX ZONES database
 *  
 *
 */

class Application_Model_DbTable_OXAffiliate extends Zend_Db_Table_Abstract
{
    protected $_name    = 'ox_affiliates';
    
    public function init() {
    	//Change the database for the Openx Zones
    	$this->_db = Zend_Registry::get('dbOpenx');
    }
}