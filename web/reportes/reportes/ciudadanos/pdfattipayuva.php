<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/ciudadanos/Atatipayuva.class.php");
    require_once("../../lib/general/funciones.php");



	class pdfreporte extends fpdf
	{

	var $bd;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddes=H::GetPost("codmin");
			$this->codhas=H::GetPost("codmax");

			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");

			$this->bd=new basedatosAdo();
			$this->atatipayuva = new Atatipayuva();
		    $this->arrp = $this->atatipayuva->sqlp($this->coddes,$this->codhas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

			    $this->titulosm[100]="TOTAL POR TIPO DE AYUDA";
			    $this->titulosm[200]="";
			    $this->titulosm[300]="TOTA GENERAL";

				$this->titulosm[0]="TIPO DE AYUDA";
				$this->titulosm[1]="Nº EXP ";
				$this->titulosm[2]="NOMBRES Y APELLIDOS";
				$this->titulosm[4]="NOMBRES DEL PROVEEDOR";
				$this->titulosm[3]="TOTAL";


		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=100;
		$this->anchos[1]=90;
		$this->anchos[2]=80;
		$this->anchos[3]=70;
		$this->anchos[4]=50;
		$this->anchos[5]=40;
		$this->anchos[6]=30;
		$this->anchos[7]=25;
        $this->anchos[8]=20;
        $this->anchos[9]=15;
        $this->anchos[10]=10;
        $this->anchos[11]=8;

	}

		function Header()
		{
                $this->cab->poner_cabecera($this,$_POST["titulo"],"p");

				$this->setFont("Arial","",6);
				$this->SetWidths(array($this->anchos[5]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder(1);
                $this->Row(array($this->titulosm[0]));
		}

function Cuerpo()

		{


		$tipo="";
		$registro=count($this->arrp);
        $monto=0;
        $total=0;
		foreach($this->arrp as $dato)
            {

			 if($dato["tipo"]!=$tipo)

               {
                $this->Ln(2);
                $this->setFont("Arial","",8);
               	$this->SetWidths(array($this->anchos[3]));
    	        $this->SetAligns(array("L"));
    	        $this->setBorder();
                $this->Row(array($dato["tipo"]));

               	$this->arrp1 = $this->atatipayuva->sqlp1($dato["tipo"]);
                $this->Ln(2);
                $this->SetWidths(array($this->anchos[5],$this->anchos[4],$this->anchos[4],$this->anchos[5]));
    	        $this->SetAligns(array("C","L","L","R"));
    	        $this->setBorder(1);
                $this->Row(array($this->titulosm[1],$this->titulosm[2],$this->titulosm[4],$this->titulosm[3]));

                $tipo=$dato["tipo"];
                $monto=0;
                foreach($this->arrp1 as $dato1)
                       {

                $monto=$monto+$dato1["monto"];
                $this->Ln(1);
               	$this->setFont("Arial","",8);
               	$this->SetWidths(array($this->anchos[5],$this->anchos[4],$this->anchos[4],$this->anchos[5]));
    	        $this->SetAligns(array("C","L","L","R"));
    	        $this->setBorder();
                $this->Row(array($dato1["expediente"],$dato1["nombre"].'   '.$dato1["apellido"],$dato1["proveedor"],H::Formatomonto($dato1["monto"])));

                       }
                $total=$total+$monto;
                $this->Ln(8);
                $this->setFont("Arial","B",9);
                	$this->SetWidths(array($this->anchos[5],$this->anchos[4],$this->anchos[4],$this->anchos[5]));
    	        $this->SetAligns(array("R","R","R","R"));
    	        $this->setBorder();
                $this->Row(array($this->titulosm[200],$this->titulosm[200],$this->titulosm[100],H::Formatomonto($monto).''));

				}
		}

		        $this->Ln(2);
                $this->setFont("Arial","B",9);
                	$this->SetWidths(array($this->anchos[5],$this->anchos[4],$this->anchos[4],$this->anchos[5]));
    	        $this->SetAligns(array("R","R","R","R"));
    	        $this->setBorder();
                $this->Row(array($this->titulosm[200],$this->titulosm[200],$this->titulosm[300],H::Formatomonto($total).''));

}
}