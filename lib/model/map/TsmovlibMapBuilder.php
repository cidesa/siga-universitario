<?php



class TsmovlibMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsmovlibMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('tsmovlib');
		$tMap->setPhpName('Tsmovlib');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsmovlib_SEQ');

		$tMap->addForeignKey('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, 'tsdefban', 'NUMCUE', true, 20);

		$tMap->addColumn('REFLIB', 'Reflib', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECLIB', 'Feclib', 'int', CreoleTypes::DATE, true, null);

		$tMap->addForeignKey('TIPMOV', 'Tipmov', 'string', CreoleTypes::VARCHAR, 'tstipmov', 'CODTIP', true, 4);

		$tMap->addColumn('DESLIB', 'Deslib', 'string', CreoleTypes::VARCHAR, true, 4000);

		$tMap->addColumn('MONMOV', 'Monmov', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addForeignKey('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, 'contabb', 'CODCTA', false, 32);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECING', 'Fecing', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPMOVPAD', 'Tipmovpad', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFLIBPAD', 'Reflibpad', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TRANSITO', 'Transito', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOMADI', 'Numcomadi', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECCOMADI', 'Feccomadi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMBENSUS', 'Nombensus', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ORDEN', 'Orden', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('HORING', 'Horing', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('STACON1', 'Stacon1', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MOTANU', 'Motanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 