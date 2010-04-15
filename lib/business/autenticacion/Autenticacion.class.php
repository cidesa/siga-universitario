<?php

/**
 * Autenticacion: Clase para el manejo de usuarios y grupos dentro de la aplicacion
 *
 * @package    Roraima
 * @subpackage autenticacion
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Autenticacion {

  public static function salvarUsuarios($usuario)
  {
    /* if($usuario->getId()==''){

      $apliuser= new ApliUser();
      $apliuser->setLoguse($usuario->getLoguse());
      $apliuser->setCodemp(sfContext::getInstance()->getUser()->getAttribute('empresa'));
      $apliuser->setCodapl('CI0');
      $apliuser->setNomopc('menu');
      $apliuser->setPriuse('15');
      $apliuser->save();

      $apliuser= new ApliUser();
      $apliuser->setLoguse($usuario->getLoguse());
      $apliuser->setCodemp(sfContext::getInstance()->getUser()->getAttribute('empresa'));
      $apliuser->setCodapl('CI0');
      $apliuser->setNomopc('catalogo');
      $apliuser->setPriuse('15');
      $apliuser->save();

     }*/

     $usuario->setPasuse('md5'.md5(strtoupper($usuario->getLoguse()).$usuario->getPasuse()));

     $usuario->save();

  }


  public static function salvarApliuser($apli_user,$grid,$empresa)
  {
    $login=$apli_user->getLoguse();
    $codigoapli=explode('_',$apli_user->getCodapl());
    $c= new Criteria();
    $c->add(ApliUserPeer::LOGUSE,$login);
    $c->add(ApliUserPeer::CODEMP,$empresa);
    $c->add(ApliUserPeer::CODAPL,$codigoapli[1]);
    ApliUserPeer::doDelete($c);

    $priv=false;
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['priuse']!='')
      {
       $apliuser= new ApliUser();
       $apliuser->setLoguse($login);
       $apliuser->setCodemp($empresa);
       $apliuser->setCodapl($codigoapli[1]);
       $apliuser->setNomopc($x[$j]['nomopc']);
       $apliuser->setPriuse($x[$j]['priuse']);
       $apliuser->save();
       $priv=true;
      }
      $j++;
    }

   // Agregando los privilegios minimos

    if ($apli_user->getAdministrador()=='')
    {
     if ($priv==true)
    {

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('menu');
    $apliuser->setPriuse('15');
    $apliuser->save();

    $apliuser= new ApliUser();
    $apliuser->setLoguse($login);
    $apliuser->setCodemp($empresa);
    $apliuser->setCodapl($codigoapli[1]);
    $apliuser->setNomopc('catalogo');
    $apliuser->setPriuse('15');
    $apliuser->save();
    }
    }
   else
   {

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('admin');
   $apliuser->setPriuse('15');
   $apliuser->save();

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('menu');
   $apliuser->setPriuse('15');
   $apliuser->save();

   $apliuser= new ApliUser();
   $apliuser->setLoguse($login);
   $apliuser->setCodemp($empresa);
   $apliuser->setCodapl($codigoapli[1]);
   $apliuser->setNomopc('catalogo');
   $apliuser->setPriuse('15');
   $apliuser->save();
   }

  }

  public static function validadNivelAprobacion($login,$monto,&$error)
  {
  	$error=-1;

  	$c= new Criteria();
  	$reg=OpdefempPeer::doSelectOne($c);
  	if ($reg)
  	{
  		if ($reg->getUnitri()>0)
  		{
  		  $unitrireal=$monto/$reg->getUnitri();
  		}else {
  			$error=533;
  			return $error;
  		}
  	}

    $u= new Criteria();
    $u->add(UsuariosPeer::LOGUSE,$login);
    $result= UsuariosPeer::doSelectOne($u);
    if ($result)
    {
      $p= new Criteria();
      $p->add(SegranaprPeer::CODNIV,$result->getCodniv());
      $registro= SegranaprPeer::doSelectOne($p);
      if ($registro)
      {
      	if ($unitrireal<=$registro->getRanhas() && $unitrireal>=$registro->getRandes())
      	{
         $error=-1;
      	}else{
      		$error=534;
      	}
      }
    }
    return $error;
  }

}

?>