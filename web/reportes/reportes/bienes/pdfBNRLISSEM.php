<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/mc_table.php");
	
	class pdfreporte extends PDF_MC_Table
	{
		var $acum=0;		
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codact1;
		var $codact2;
		var $codsem1;
		var $codsem2;
		var $fecreg1;
		var $fecreg2;
		var $feccom1;
		var $feccom2;		
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;
						
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codsem1=$_POST["codsem1"];
			$this->codsem2=$_POST["codsem2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];
			$this->fecreg1=$_POST["feccom1"];
			$this->fecreg2=$_POST["feccom2"];			
			$this->prenom=$_POST["prenom"];
			$this->precar=$_POST["precar"];
			$this->confnom=$_POST["confnom"];
			$this->confcar=$_POST["confcar"];
			$this->apronom=$_POST["apronom"];
			$this->aprocar=$_POST["aprocar"];						
						

									
						
	
				$this->sql="SELECT RTRIM(A.CODACT) as acodact,A.CODSEM as acodsem,A.DESSEM as adessem,A.RAZSEM as arazsem,
							A.SEXSEM as asexsem,A.HERSEM as ahersem, A.CODUBI as acodubi, A.STASEM as astasem FROM BNREGSEM A
							WHERE RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND
							RTRIM(A.CODSEM) >= RTRIM('".$this->codsem1."') AND RTRIM(A.CODSEM) <= RTRIM('".$this->codsem2."') AND
							A.FECCOM >= to_date('".$this->feccom1."','dd/mm/yyyy') AND A.FECCOM <= to_date('".$this->feccom2."','dd/mm/yyyy') AND
							A.FECREG >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECREG <= to_date('".$this->fecreg2."','dd/mm/yyyy') ORDER BY  A.CODSEM, A.CODACT "; 	

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,52);
			
		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DEL ACTIVO";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="RAZA";
				$this->titulos[3]="SEXO";
				$this->titulos[4]="HERRETE";
				$this->titulos[5]="UBICACION";
	
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(); 
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln(); 
			$this->Line(10,50,270,50);
		}

		
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4],$this->anchos[5],$this->anchos[6]));
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

//			if(!$tb->EOF)
	//		{
			while(!$tb->EOF)
			{
	
				$this->setFont("Arial","",8); 
				 $aux=$tb->fields["adessem"];				
				 $this->Row(array($tb->fields["acodact"]."       ".$tb->fields["acodsem"],$tb->fields["adessem"],$tb->fields["arazsem"],$tb->fields["asexsem"],$tb->fields["ahersem"],$tb->fields["acodubi"],$tb->fields["adesubi"]));
/*
				 $this->cell($this->anchos[0],7,$tb->fields["acodact"]."       ".$tb->fields["acodsem"]);
				 $this->cell($this->anchos[1],7,substr($aux,0,20));				 
				 $this->cell($this->anchos[2],7,$tb->fields["arazsem"]);
				 $this->cell($this->anchos[3],7,$tb->fields["asexsem"]);
				 $this->cell($this->anchos[4],7,$tb->fields["ahersem"]);
				 $this->cell($this->anchos[5],7,$tb->fields["acodubi"]);
				 $this->cell($this->anchos[5],7,$tb->fields["adesubi"]);				 
*/
				 $this->ln();
				$tb->MoveNext();
				}
		//	}	
		}

		function Footer()
		{
			
			$this->SetY(-30);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY(),10,$this->GetY()+25);
			$this->Line(100,$this->GetY(),100,$this->GetY()+25);
			$this->Line(180,$this->GetY(),180,$this->GetY()+25);
			$this->Line(270,$this->GetY(),270,$this->GetY()+25);												
			$this->cell(0,5,"Preparación                                                                                                 Conformación                                                                               Aprobación");
			$this->ln();
			$this->setFont("Arial","",8);						
			$this->cell(20,5,"Nombre:     ".$this->prenom);
			$this->cell(20,5,"                                                                                           ".$this->confnom);
			$this->cell(20,5,"                                                                                                                                                                       ".$this->apronom);
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());			
			$this->cell(20,7,"Cargo:        ".$this->precar);
			$this->cell(20,7,"                                                                                           ".$this->confcar);
			$this->cell(20,7,"                                                                                                                                                                       ".$this->aprocar);
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());			
			$this->cell(0,8,"Firma:");
			$this->ln();						
			$this->Line(10,$this->GetY(),270,$this->GetY());			
		}
		
	}
?>