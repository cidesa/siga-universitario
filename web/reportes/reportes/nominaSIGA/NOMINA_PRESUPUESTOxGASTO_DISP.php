<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
$bd=new basedatosAdo();
?>
<form name="form1" method="post" action="">
  <table width="760" height="40"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
    <tr> 
      <td width="190" rowspan="2" bgcolor="#003399" class="cell_left_line02"><img src="../../img/tl_logo_01.gif" width="190" height="40" border="0"></a></td>
      <td colspan="2" class="cell_date" align="right">
		<? 
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S&aacute;bado");
		$mes = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$me=$mes[date('n')];
		echo $dias[date('w')].strftime(", %d de $me del %Y")."<br>"; 
		?>          
		</td>
    </tr>
    <tr> 
      <td width="313">&nbsp; </td>
      <td width="257" align="right" valign="middle" class="cell_logout">&nbsp;</td>
    </tr>
  </table>
  <table width="760"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr> 
      <td width="6" align="left" valign="top" class="cell_left_line02"><img src="../../img/center02_tl.gif" width="6" height="6"></td>
      <td rowspan="2" valign="top" class="cell_padding_01"> <p class="breadcrumb">Reportes 
        </p>
        <fieldset>
       
        <div align="left">&nbsp; 
          <table width="689"  border="1" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"> <font color="#000066" size="4"><strong>RELACION 
                  NOMINA PRESUPUESTO 
                  <input name="titulo" type="hidden" id="titulo">
                  </strong></font></div></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td>&nbsp;</td>
              <td><font color="#00FFCC">&nbsp; </font></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td width="186" class="form_label_01"><strong>Tama&ntilde;o Hoja:</strong></td>
              <td width="174"> <input name="tamano" type="text" class="breadcrumb" id="tamano" readonly="true"></td>
              <td width="238">&nbsp;</td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td height="24" class="form_label_01"><strong>Orientaci&oacute;n:</strong></td>
              <td> <input name="orientacion" type="text" class="breadcrumb" id="orientacion" readonly="true"></td>
              <td> <div align="right"> </div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td class="form_label_01"> <div align="left"><strong>Salida del 
                  Reporte:</strong></div></td>
              <td> <div align="left"> </div>
                <div align="left"> <strong> 
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
                  PANTALLA</strong></div></td>
              <td> <strong> 
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
                IMPRESORA</strong></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td colspan="3" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios 
                  de Selecci&oacute;n</em></strong></font></div></td>
            </tr>
            <tr bordercolor="#6699CC"> 
              <td bordercolor="#FFFFFF" class="form_label_01">&nbsp;</td>
              <td><strong>DESDE</strong></td>
              <td><strong>HASTA</strong></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo 
                  Empleado:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct a.codemp,b.nomemp from nphiscon a, nphojint b
							where a.codemp=b.codemp order by a.codemp");
			  ?>
                  <select name="emp1" class="breadcrumb" id="emp1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codemp"];?>"><? print $tb->fields["codemp"]."- ".$tb->fields["nomemp"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select distinct a.codemp,b.nomemp from nphiscon a, nphojint b
							where a.codemp=b.codemp order by a.codemp desc");
			  ?>
                <select name="emp2" class="breadcrumb" id="emp2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codemp"];?>"><? print $tb2->fields["codemp"]."- ".$tb2->fields["nomemp"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo 
                  Cargo:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("SELECT distinct(codcar),nomcar 
								FROM NPASICAREMP order by codcar");
			  ?>
                  <select name="car1" class="breadcrumb" id="car1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codcar"];?>"><? print $tb->fields["codcar"]." - ".$tb->fields["nomcar"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("SELECT distinct(codcar),nomcar 
								FROM NPASICAREMP order by codcar desc");
			  ?>
                <select name="car2" class="breadcrumb" id="car2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codcar"];?>"><? print $tb2->fields["codcar"]." - ".$tb2->fields["nomcar"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>C&oacute;digo 
                  Concepto:</strong></div></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct a.codcon,b.nomcon from nphiscon a, npdefcpt b
								where a.codcon=b.codcon order by a.codcon");
			  ?>
                  <select name="con1" class="breadcrumb" id="con1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codcon"];?>"><? print $tb->fields["codcon"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select distinct a.codcon,b.nomcon from nphiscon a, npdefcpt b
								where a.codcon=b.codcon order by a.codcon desc");
			  ?>
                <select name="con2" class="breadcrumb" id="con2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codcon"];?>"><? print $tb2->fields["codcon"];?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Tipo de Gasto:</strong></td>
              <td> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select codtipgas,destipgas from nptipgas order by codtipgas asc");
			  ?>
                  <select name="gas1" class="breadcrumb" id="gas1">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codtipgas"];?>"><? print $tb->fields["codtipgas"]." - ".substr(strtoupper($tb->fields["destipgas"]),0,36);?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
              <td> 
                <?
			  	
			  	$tb2=$bd->select("select codtipgas,destipgas from nptipgas order by codtipgas desc");
			  ?>
                <select name="gas2" class="breadcrumb" id="gas2">
                  <?
				  while(!$tb2->EOF)	
				{
			  ?>
                  <option value="<? print $tb2->fields["codtipgas"];?>"><? print $tb2->fields["codtipgas"]." - ".substr(strtoupper($tb2->fields["destipgas"]),0,36);?></option>
                  <?
				  $tb2->MoveNext();
					}
				?>
                </select></td>
            </tr>
            <tr> 
              <td class="form_label_01"> <div align="left"><strong>Tipo de N&oacute;mina:</strong></div></td>
              <td colspan="2"> <div align="left"> 
                  <?
			  	
			  	$tb=$bd->select("select distinct a.codnom,b.nomnom from nphiscon a, npnomina b
							where a.codnom=b.codnom order by a.codnom");
			  ?>
                  <select name="nom" class="breadcrumb" id="nom">
                    <?
				  	while(!$tb->EOF)	
					{
				  ?>
                    <option value="<? print $tb->fields["codnom"];?>"><? print $tb->fields["codnom"]." - ".$tb->fields["nomnom"];?></option>
                    <?
					$tb->MoveNext();
					}
				?>
                  </select>
                </div></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Elaborado por:</strong></td>
              <td colspan="2"><input name="elab" type="text" class="breadcrumb" id="elab" size="80"></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Revisado por:</strong></td>
              <td colspan="2"><input name="rev" type="text" class="breadcrumb" id="rev" size="80"></td>
            </tr>
            <tr> 
              <td class="form_label_01"><strong>Autorizado por:</strong></td>
              <td colspan="2"><input name="auto" type="text" class="breadcrumb" id="auto" size="80"></td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01"><input name="sqls" type="hidden" id="sqls"></td>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr bordercolor="#FFFFFF"> 
              <td class="form_label_01">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table>
        </div>
        <div align="left">&nbsp; </div>
        </fieldset>
        <table width="356"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#EEEEEE">
          <tr> 
            <td width="38" rowspan="3" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="258"><img src="../../img/box01_tl.gif" width="6" height="6"></td>
            <td width="60" align="right"><img src="../../img/box01_tr.gif" width="6" height="6"></td>
          </tr>
          <tr> 
            <td colspan="2" align="center"><input name="Button" type="button" class="form_button01" value="Generar" onClick="enviar()"> 
              <input name="Button" type="button" class="form_button01" value="   Salir    " onClick="cerrar()"> </td>
          </tr>
          <tr> 
            <td><img src="../../img/box01_bl.gif" width="6" height="6"></td>
            <td align="right"><img src="../../img/box01_br.gif" width="6" height="6"></td>
          </tr>
        </table></td>
      <td width="6" align="right" valign="top"><img src="../../img/center01_tr.gif" width="6" height="6"></td>
      <td width="40" rowspan="2" align="center" bgcolor="#EEEEEE">&nbsp;</td>
    </tr>
    <tr> 
      <td align="left" valign="bottom" class="cell_left_line02"><img src="../../img/center02_bl.gif" width="6" height="6"></td>
      <td align="right" valign="bottom"><img src="../../img/center01_br.gif" width="6" height="6"></td>
    </tr>
  </table>
</form>
</body>
<script language="javascript">
function enviar()
{
	f=document.form1;
	f.titulo.value="RELACION NOMINA PRESUPUESTO";
	f.action="rNOMINA_PRESUPUESTOxGASTO_DISP.php";
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1()
{
 	pagina="catalogoform.php?campo=codpre1&sql=select codpre as campo1 from cpimpcom order by codpre asc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
function catalogo2()
{
 	pagina="catalogoform.php?campo=codpre2&sql=select codpre as campo1 from cpimpcom order by codpre desc";
	window.open(pagina,"catalogo","menubar=no,toolbar=no,scrollbars=yes,width=300,height=200,rezizable=yes, left=100,top=100");
}
</script>
</html>
