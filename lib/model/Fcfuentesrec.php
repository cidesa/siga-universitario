<?php

/**
 * Subclass for representing a row from the 'fcfuentesrec'.
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
class Fcfuentesrec extends BaseFcfuentesrec
{
	protected $nomfue="";
	protected $nomfuegen="";

    public function getNomfue()
    {
        return Herramientas::getX_vacio('codfue','FCfuepre','nomfue',self::getCodfue());
    }

    public function getNomfuegen()
    {
        return Herramientas::getX_vacio('codfue','FCfuepre','nomfue',self::getCodfuegen());
    }

}
