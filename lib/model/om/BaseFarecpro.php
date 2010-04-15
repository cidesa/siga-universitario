<?php


abstract class BaseFarecpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codrec;


	
	protected $fecent;


	
	protected $fecven;


	
	protected $id;

	
	protected $aFacliente;

	
	protected $aCarecaud;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodrec()
  {

    return trim($this->codrec);

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FarecproPeer::CODPRO;
      }
  
		if ($this->aFacliente !== null && $this->aFacliente->getCodpro() !== $v) {
			$this->aFacliente = null;
		}

	} 
	
	public function setCodrec($v)
	{

    if ($this->codrec !== $v) {
        $this->codrec = $v;
        $this->modifiedColumns[] = FarecproPeer::CODREC;
      }
  
		if ($this->aCarecaud !== null && $this->aCarecaud->getCodrec() !== $v) {
			$this->aCarecaud = null;
		}

	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = FarecproPeer::FECENT;
    }

	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = FarecproPeer::FECVEN;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FarecproPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codrec = $rs->getString($startcol + 1);

      $this->fecent = $rs->getDate($startcol + 2, null);

      $this->fecven = $rs->getDate($startcol + 3, null);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Farecpro object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FarecproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FarecproPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FarecproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aFacliente !== null) {
				if ($this->aFacliente->isModified()) {
					$affectedRows += $this->aFacliente->save($con);
				}
				$this->setFacliente($this->aFacliente);
			}

			if ($this->aCarecaud !== null) {
				if ($this->aCarecaud->isModified()) {
					$affectedRows += $this->aCarecaud->save($con);
				}
				$this->setCarecaud($this->aCarecaud);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FarecproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FarecproPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aFacliente !== null) {
				if (!$this->aFacliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFacliente->getValidationFailures());
				}
			}

			if ($this->aCarecaud !== null) {
				if (!$this->aCarecaud->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCarecaud->getValidationFailures());
				}
			}


			if (($retval = FarecproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodrec();
				break;
			case 2:
				return $this->getFecent();
				break;
			case 3:
				return $this->getFecven();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FarecproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodrec(),
			$keys[2] => $this->getFecent(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodrec($value);
				break;
			case 2:
				$this->setFecent($value);
				break;
			case 3:
				$this->setFecven($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FarecproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecent($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FarecproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FarecproPeer::CODPRO)) $criteria->add(FarecproPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FarecproPeer::CODREC)) $criteria->add(FarecproPeer::CODREC, $this->codrec);
		if ($this->isColumnModified(FarecproPeer::FECENT)) $criteria->add(FarecproPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(FarecproPeer::FECVEN)) $criteria->add(FarecproPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(FarecproPeer::ID)) $criteria->add(FarecproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FarecproPeer::DATABASE_NAME);

		$criteria->add(FarecproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodrec($this->codrec);

		$copyObj->setFecent($this->fecent);

		$copyObj->setFecven($this->fecven);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new FarecproPeer();
		}
		return self::$peer;
	}

	
	public function setFacliente($v)
	{


		if ($v === null) {
			$this->setCodpro(NULL);
		} else {
			$this->setCodpro($v->getCodpro());
		}


		$this->aFacliente = $v;
	}


	
	public function getFacliente($con = null)
	{
		if ($this->aFacliente === null && (($this->codpro !== "" && $this->codpro !== null))) {
						include_once 'lib/model/om/BaseFaclientePeer.php';

			$this->aFacliente = FaclientePeer::retrieveByPK($this->codpro, $con);

			
		}
		return $this->aFacliente;
	}

	
	public function setCarecaud($v)
	{


		if ($v === null) {
			$this->setCodrec(NULL);
		} else {
			$this->setCodrec($v->getCodrec());
		}


		$this->aCarecaud = $v;
	}


	
	public function getCarecaud($con = null)
	{
		if ($this->aCarecaud === null && (($this->codrec !== "" && $this->codrec !== null))) {
						include_once 'lib/model/om/BaseCarecaudPeer.php';

			$this->aCarecaud = CarecaudPeer::retrieveByPK($this->codrec, $con);

			
		}
		return $this->aCarecaud;
	}

} 