<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atactacom extends baseClases
{
	function Sqlp($codexpdes)
	{
		$sql="
		select
		 b.nroexp,
		 c.nompro as proveedor,
		 c.telpro as telprov,
		 b.atbenefi,
		 a.apeciu||', '||a.nomciu as nombresol,
		 a.apeciu||', '||a.nomciu as nombreben,
		 a.cedciu,
		 a.dirhab,
		 b.motayu,
		 g.desmun,
		 (d.canapr*d.precio) as totart,
		 e.coddon,e.desdon,d.unidad,d.canapr, f.desayu as tipo, usucre as usuario, atsolici as soli, atbenefi as bene, dirhab as dir, telhab as tel
		 from
		 atciudadano a,
		 atayudas b ,
		 caprovee c,
		 atdetayu d, atdonaciones e,  attipayu f,atmunicipios g
		 where
		 b.nroexp='".$codexpdes."'
		 and d.aprobado=true
		 and a.id=b.atsolici
		 and c.id=b.caprovee_id
		 and d.atdonaciones_id=e.id
		 and d.atayudas_id=b.id
		 and f.id=b.attipayu_id
		 and a.atmunicipios_id=g.id
		 group by
		 b.atbenefi,
		 c.telpro,
		 b.nroexp,
		 c.nompro,
		 c.rifpro,
		 a.nomciu,
		 a.cedciu,
		 a.apeciu,
		 g.desmun,
		 b.motayu,d.canapr,d.precio,
		 e.coddon,e.desdon,d.unidad,d.canapr,f.desayu,usucre , atsolici,atbenefi , dirhab , telhab";
		 /*print '<pre>';
						print_r($sql);
						 print '</pre>';
						exit;*/
		return $this->select($sql);
	}

	function Sqlbenefi($id)
	{
		$sql="
		select
		 a.nomciu,
		 a.cedciu
		 from
		 atciudadano a
		 where
		 a.id='".$id."'";

		/* print '<pre>';
						print_r($sql);
						 print '</pre>';
						exit;*/
				return $this->select($sql);
	}





}