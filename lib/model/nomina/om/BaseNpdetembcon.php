<?php


abstract class BaseNpdetembcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemb;


	
	protected $codemp;


	
	protected $codcon;


	
	protected $porcon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemb()
  {

    return trim($this->codemb);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getPorcon($val=false)
  {

    if($val) return number_format($this->porcon,2,',','.');
    else return $this->porcon;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemb($v)
	{

    if ($this->codemb !== $v) {
        $this->codemb = $v;
        $this->modifiedColumns[] = NpdetembconPeer::CODEMB;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpdetembconPeer::CODEMP;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpdetembconPeer::CODCON;
      }
  
	} 
	
	public function setPorcon($v)
	{

    if ($this->porcon !== $v) {
        $this->porcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdetembconPeer::PORCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdetembconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemb = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->codcon = $rs->getString($startcol + 2);

      $this->porcon = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdetembcon object", $e);
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
			$con = Propel::getConnection(NpdetembconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdetembconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdetembconPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NpdetembconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdetembconPeer::doUpdate($this, $con);
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


			if (($retval = NpdetembconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetembconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemb();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodcon();
				break;
			case 3:
				return $this->getPorcon();
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
		$keys = NpdetembconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemb(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcon(),
			$keys[3] => $this->getPorcon(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdetembconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemb($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
			case 3:
				$this->setPorcon($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdetembconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemb($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPorcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdetembconPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdetembconPeer::CODEMB)) $criteria->add(NpdetembconPeer::CODEMB, $this->codemb);
		if ($this->isColumnModified(NpdetembconPeer::CODEMP)) $criteria->add(NpdetembconPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpdetembconPeer::CODCON)) $criteria->add(NpdetembconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpdetembconPeer::PORCON)) $criteria->add(NpdetembconPeer::PORCON, $this->porcon);
		if ($this->isColumnModified(NpdetembconPeer::ID)) $criteria->add(NpdetembconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdetembconPeer::DATABASE_NAME);

		$criteria->add(NpdetembconPeer::ID, $this->id);

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

		$copyObj->setCodemb($this->codemb);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setPorcon($this->porcon);


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
			self::$peer = new NpdetembconPeer();
		}
		return self::$peer;
	}

} 