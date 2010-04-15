<?php

/**
 * Subclass for representing a row from the 'fordefaccesp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fordefaccesp extends BaseFordefaccesp
{
	public function getNompro()
	{
		return Herramientas::getX('CodPro','ForDefPry','NomPro',self::getCodpro());
	}

	public function getProacc()
	{
  		$sw = Herramientas::getX('CodPro','Fordefpry','Proacc',self::getCodpro());
  		if (!empty($sw)){
		    if($sw=="P")
	    	{
		    	return 'Proyecto';
	    	}
	    	elseif($sw=="A")
	    	{
		    	return 'Acción Centralizada';
	    	}
	  	}
	}

	public function getNomemp()
	{
		return Herramientas::getX('codemp','NpHojInt','Nomemp',self::getCodempres());
	}

   public function getNomest()
   {
     return Herramientas::getX('CODEST','Fordefest','Desest',self::getCodest());
   }

   public function getNommun()
   {
  	$c = new Criteria();
  	$c->add(FordefmunPeer::CODEST,self::getCodest());
    $c->add(FordefmunPeer::CODMUN,self::getCodmun());
    $nommun = FordefmunPeer::doSelectone($c);
    if ($nommun)
    return $nommun->getDesmun();
	else
	return ' ';
  }
  public function getNompar()
  {
  	$c = new Criteria();
  	$c->add(FordefparPeer::CODEST,self::getCodest());
    $c->add(FordefparPeer::CODMUN,self::getCodmun());
    $c->add(FordefparPeer::CODPAR,self::getCodpar());
    $nompar = FordefparPeer::doSelectone($c);
    if ($nompar)
    return $nompar->getDespar();
	else
	return ' ';
  }

}
