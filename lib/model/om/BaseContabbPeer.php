<?php


abstract class BaseContabbPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'contabb';

	
	const CLASS_DEFAULT = 'lib.model.Contabb';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCTA = 'contabb.CODCTA';

	
	const DESCTA = 'contabb.DESCTA';

	
	const FECINI = 'contabb.FECINI';

	
	const FECCIE = 'contabb.FECCIE';

	
	const SALANT = 'contabb.SALANT';

	
	const DEBCRE = 'contabb.DEBCRE';

	
	const CARGAB = 'contabb.CARGAB';

	
	const SALPRGPER = 'contabb.SALPRGPER';

	
	const SALACUPER = 'contabb.SALACUPER';

	
	const SALPRGPERFOR = 'contabb.SALPRGPERFOR';

	
	const ID = 'contabb.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta', 'Descta', 'Fecini', 'Feccie', 'Salant', 'Debcre', 'Cargab', 'Salprgper', 'Salacuper', 'Salprgperfor', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ContabbPeer::CODCTA, ContabbPeer::DESCTA, ContabbPeer::FECINI, ContabbPeer::FECCIE, ContabbPeer::SALANT, ContabbPeer::DEBCRE, ContabbPeer::CARGAB, ContabbPeer::SALPRGPER, ContabbPeer::SALACUPER, ContabbPeer::SALPRGPERFOR, ContabbPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta', 'descta', 'fecini', 'feccie', 'salant', 'debcre', 'cargab', 'salprgper', 'salacuper', 'salprgperfor', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcta' => 0, 'Descta' => 1, 'Fecini' => 2, 'Feccie' => 3, 'Salant' => 4, 'Debcre' => 5, 'Cargab' => 6, 'Salprgper' => 7, 'Salacuper' => 8, 'Salprgperfor' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (ContabbPeer::CODCTA => 0, ContabbPeer::DESCTA => 1, ContabbPeer::FECINI => 2, ContabbPeer::FECCIE => 3, ContabbPeer::SALANT => 4, ContabbPeer::DEBCRE => 5, ContabbPeer::CARGAB => 6, ContabbPeer::SALPRGPER => 7, ContabbPeer::SALACUPER => 8, ContabbPeer::SALPRGPERFOR => 9, ContabbPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codcta' => 0, 'descta' => 1, 'fecini' => 2, 'feccie' => 3, 'salant' => 4, 'debcre' => 5, 'cargab' => 6, 'salprgper' => 7, 'salacuper' => 8, 'salprgperfor' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ContabbMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ContabbMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContabbPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ContabbPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContabbPeer::CODCTA);

		$criteria->addSelectColumn(ContabbPeer::DESCTA);

		$criteria->addSelectColumn(ContabbPeer::FECINI);

		$criteria->addSelectColumn(ContabbPeer::FECCIE);

		$criteria->addSelectColumn(ContabbPeer::SALANT);

		$criteria->addSelectColumn(ContabbPeer::DEBCRE);

		$criteria->addSelectColumn(ContabbPeer::CARGAB);

		$criteria->addSelectColumn(ContabbPeer::SALPRGPER);

		$criteria->addSelectColumn(ContabbPeer::SALACUPER);

		$criteria->addSelectColumn(ContabbPeer::SALPRGPERFOR);

		$criteria->addSelectColumn(ContabbPeer::ID);

	}

	const COUNT = 'COUNT(contabb.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT contabb.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContabbPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContabbPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContabbPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ContabbPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContabbPeer::populateObjects(ContabbPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContabbPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContabbPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ContabbPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ContabbPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ContabbPeer::ID);
			$selectCriteria->add(ContabbPeer::ID, $criteria->remove(ContabbPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(ContabbPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ContabbPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Contabb) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContabbPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Contabb $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContabbPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContabbPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ContabbPeer::DATABASE_NAME, ContabbPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContabbPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ContabbPeer::DATABASE_NAME);

		$criteria->add(ContabbPeer::ID, $pk);


		$v = ContabbPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(ContabbPeer::ID, $pks, Criteria::IN);
			$objs = ContabbPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContabbPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ContabbMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ContabbMapBuilder');
}
