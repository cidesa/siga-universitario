<?php


abstract class BaseFordefpryaccact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codact;


	
	protected $desact;


	
	protected $codunimed;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodaccesp()
  {

    return trim($this->codaccesp);

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getCodunimed()
  {

    return trim($this->codunimed);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FordefpryaccactPeer::CODPRO;
      }
  
	} 
	
	public function setCodaccesp($v)
	{

    if ($this->codaccesp !== $v) {
        $this->codaccesp = $v;
        $this->modifiedColumns[] = FordefpryaccactPeer::CODACCESP;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FordefpryaccactPeer::CODACT;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = FordefpryaccactPeer::DESACT;
      }
  
	} 
	
	public function setCodunimed($v)
	{

    if ($this->codunimed !== $v) {
        $this->codunimed = $v;
        $this->modifiedColumns[] = FordefpryaccactPeer::CODUNIMED;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefpryaccactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codaccesp = $rs->getString($startcol + 1);

      $this->codact = $rs->getString($startcol + 2);

      $this->desact = $rs->getString($startcol + 3);

      $this->codunimed = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefpryaccact object", $e);
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
			$con = Propel::getConnection(FordefpryaccactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefpryaccactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefpryaccactPeer::DATABASE_NAME);
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
					$pk = FordefpryaccactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefpryaccactPeer::doUpdate($this, $con);
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


			if (($retval = FordefpryaccactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefpryaccactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodaccesp();
				break;
			case 2:
				return $this->getCodact();
				break;
			case 3:
				return $this->getDesact();
				break;
			case 4:
				return $this->getCodunimed();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefpryaccactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getDesact(),
			$keys[4] => $this->getCodunimed(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefpryaccactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodaccesp($value);
				break;
			case 2:
				$this->setCodact($value);
				break;
			case 3:
				$this->setDesact($value);
				break;
			case 4:
				$this->setCodunimed($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefpryaccactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodunimed($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefpryaccactPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefpryaccactPeer::CODPRO)) $criteria->add(FordefpryaccactPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordefpryaccactPeer::CODACCESP)) $criteria->add(FordefpryaccactPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordefpryaccactPeer::CODACT)) $criteria->add(FordefpryaccactPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FordefpryaccactPeer::DESACT)) $criteria->add(FordefpryaccactPeer::DESACT, $this->desact);
		if ($this->isColumnModified(FordefpryaccactPeer::CODUNIMED)) $criteria->add(FordefpryaccactPeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(FordefpryaccactPeer::ID)) $criteria->add(FordefpryaccactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefpryaccactPeer::DATABASE_NAME);

		$criteria->add(FordefpryaccactPeer::ID, $this->id);

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

		$copyObj->setCodaccesp($this->codaccesp);

		$copyObj->setCodact($this->codact);

		$copyObj->setDesact($this->desact);

		$copyObj->setCodunimed($this->codunimed);


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
			self::$peer = new FordefpryaccactPeer();
		}
		return self::$peer;
	}

} 