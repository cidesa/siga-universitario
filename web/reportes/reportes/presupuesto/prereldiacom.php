<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SIGA Reportes</title>
<link  href="../../lib/css/siga.css" rel="stylesheet" type="text/css">
<link  href="../../lib/css/datepickercontrol.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../lib/general/datepickercontrol.js"></script>
<script language="JavaScript" src="../../lib/general/fecha.js"></script>

</head>
<body>
<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/funciones.php");
$bd=new basedatosAdo();
$bd=new basedatosAdo();
$bd->validar();
?>
<form name="form1" method="post" action="rpredetcom.php">
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


          <table width="612" align="center" cellspacing="0" bordercolor="#6699CC" class="grid_line01_tl">
            <!--DWLayoutTable-->
            <tr>
              <td width="179" height="10"></td>
              <td width="160"></td>
              <td width="252"></td>
              <td width="4"></td>
            </tr>
            <!--DWLayoutTable-->
            <tr bordercolor="#FFFFFF">
              <td colspan="3"  align="center">  <font color="#000066" size="4"><strong>RELACION DIARIA DE COMPROMISOS</strong></font><input name="titulo" type="hidden" id="titulo"></td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="15"></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr bordercolor="#FFFFFF">
              <td height="25" valign="top" class="form_label_01"> <div align="left"><strong>Salida del
              Reporte:</strong></div></td>
              <td valign="top"> <div align="left"> </div>                <div align="left"> <strong>
                  <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton" checked>
              PANTALLA</strong></div></td>
              <td valign="top"> <strong>
                <input name="radiobutton" type="radio" class="breadcrumb" value="radiobutton">
              IMPRESORA</strong></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20" colspan="3" valign="top" class="form_label_01"> <div align="center"><font color="#000066" size="3"><strong><em>Criterios
              de Selecci&oacute;n</em></strong></font></div></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="20"></td>
              <td valign="top"><strong>DESDE</strong></td>
              <td valign="top"><strong>HASTA</strong></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="26" valign="top" class="form_label_01"><strong>N&ordm; del Compromiso:</strong></td>
              <td valign="top">
			  <?
			  $tb1=$bd->select("SELECT min(refcom) as valor FROM cpcompro");
			  ?>

			  <input type="text" name="refcompdesd" class="breadcrumb" id="refcompdesd" value="<? print $tb1->fields["valor"];?>"
			  <input type="button" name="Button" value="..." onclick="catalogo1('refcompdesd')"/>

				</td>
              <td valign="top"><font color="#00FFCC">
			  <?
			  $tb1=$bd->select("SELECT max(refcom) as valor FROM cpcompro");
			  ?>

			  <input type="text" name="refcomphast" class="breadcrumb" id="refcomphast" value="<? print $tb1->fields["valor"];?>"
			  <input type="button" name="Button" value="..." onclick="catalogo1('refcomphast')"/>

			  </td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="26" valign="top" class="form_label_01"><strong>Fecha del Compromiso :</strong></td>
              <td valign="top">
			  <?
			  $tb1=$bd->select("SELECT to_char(min(feccom),'dd/mm/yyyy') as feccom FROM cpcompro");
			  ?>
			  <input name="fecdes" class="breadcrumb" id="fecdes" datepicker="true" size="12" value="<? print $tb1->fields["feccom"];?>"/>
			  </td>
              <td valign="top">

                  <?
			  $tb1=$bd->select("SELECT to_char(max(feccom),'dd/mm/yyyy') as feccom FROM cpcompro");
			  ?>
                  <input name="fechast" class="breadcrumb" id="fechast" datepicker="true" size="12" value="<? print $tb1->fields["feccom"];?>"/>
			  </td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top" bordercolor="#FFFFFF" class="form_label_01"> <strong>Tipo de Compromiso :</strong></td>
              <td valign="top">
			    <?
			  	$tb1=$bd->select("SELECT DISTINCT(tipcom) as tipcom, nomabr FROM cpdoccom ORDER BY tipcom ASC");
			  ?>
                  <select name="tipocomdes" class="breadcrumb" id="tipocomdes">
                  <?
				  	while(!$tb1->EOF)
					{
				  ?>
                    <option value="<? print $tb1->fields["tipcom"];?>"><? print $tb1->fields["tipcom"];?></option>
                    <?
					$tb1->MoveNext();
					}
				?>
                  </select>              </td>
              <td valign="top">
                <?
			  	$tb1=$bd->select("SELECT DISTINCT(tipcom) as tipcom, nomabr FROM cpdoccom ORDER BY tipcom desc");
			  ?>
                <select name="tipocomhas" class="breadcrumb" id="tipocomhas">
                  <?
				  	while(!$tb1->EOF)
					{
				  ?>
                  <option value="<? print $tb1->fields["tipcom"];?>"><? print $tb1->fields["tipcom"];?></option>
                  <?
					$tb1->MoveNext();
					}
				?>
                </select></td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td height="28" valign="top"><strong class="form_label_01">Status :</strong></td>
              <td valign="top">
			  <?
			  $tb1=$bd->select("SELECT DISTINCT(stacom), (case when stacom='A' then 'Activo' else 'Anulado' end) as stac FROM cpcompro");
			  ?>
			  <select name="status" class="breadcrumb" id="status">
			  <?
			  while(!$tb1->EOF)
			  {
			  	?>
				<option value="<? print $tb1->fields["stacom"];?>"><? print $tb1->fields["stac"];?></option>
				<?
				$tb1->MoveNext();
			  }
			  ?>
              </select></td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
                 <td class="form_label_01">
                <div align="left"><strong>Beneficiario Desde:</strong></div></td>
              <td colspan=]"2">
                <div align="left">
                  <?
			  	$tb=$bd->select("select min(cedrif) as valor from opbenefi");
			  ?>
			  	<input size="40" type="text" name="cedrifdes" class="breadcrumb" id="cedrifdes" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onclick="catalogo3('cedrifdes')"/>

              </div></td>
              </tr>
              <tr>
              <td class="form_label_01">
                <div align="left"><strong>Beneficiario Hasta:</strong></div></td>
              <td colspan="2">
                <div align="left">
                       <?
			  	$tb=$bd->select("select max(cedrif) as valor from opbenefi");
			  ?>
			  	<input size="40" type="text" name="cedrifhas" class="breadcrumb" id="cedrifhas" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onclick="catalogo3('cedrifhas')"/>
              </div></td>
            </tr>
            <tr bordercolor="#6699CC">
                 <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo Presupuestario Desde:</strong></div></td>
              <td colspan=]"2">
                <div align="left">
                  <?
			  	$tb=$bd->select("select min(codpre) as valor from cpimpcau");
			  ?>
			  	<input size="40" type="text" name="codpredesde" class="breadcrumb" id="codpredesde" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onclick="catalogo2('codpredesde')"/>

              </div></td>
              </tr>
              <tr>
              <td class="form_label_01">
                <div align="left"><strong>C&oacute;digo Presupuestario Hasta:</strong></div></td>
              <td colspan="2">
                <div align="left">
                       <?
			  	$tb=$bd->select("select max(codpre) as valor from cpimpcau");
			  ?>
			  	<input size="40" type="text" name="codprehasta" class="breadcrumb" id="codprehasta" value="<? print $tb->fields["valor"];?>"
				<input type="button" name="Button" value="..." onclick="catalogo2('codprehasta')"/>
              </div></td>
            </tr>
           <tr bordercolor="#6699CC">
              <td class="form_label_01"> <strong>Filtro:</strong></td>
              <td colspan="2">

                  <input name="comodin" type="text" class="breadcrumb" id="comodin" value="%%" size="70">
                  <input name="sqls" type="hidden" id="sqls">               </td>
              <td></td>
            </tr>
            <tr bordercolor="#6699CC">
              <td colspan="3" class="form_label_01">Orientaci&oacute;n del Reporte: Carta/Horizontal </td>
              <td></td>
            </tr>
          </table>


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
	f.titulo.value="  ";
	  f.action="r.php?m=<?php echo TraerModuloReporte()?>&r=<?php echo TraerNombreReporte()?>";                                    //CAMBIAR NOMBRE DEL REPORTE
	f.submit();
}
function cerrar()
{
	window.close();
}
function catalogo1(campo)
{

    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=SELECT distinct(refcom) FROM cpcompro order by refcom asc";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}

function catalogo2(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select distinct(codpre) as codpre from cpimpcau order by codpre";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
function catalogo3(campo)
{
    pagina="../../lib/general/catalogoobj.php?campo="+campo+"&sql=select cedrif , nomben from opbenefi order by cedrif";
	window.open(pagina,"Catalogo","menubar=no,toolbar=no,scrollbars=yes,width=500,heigth=400,resizable=yes,left=50,top=50");
}
</script>
<? $bd->closed(); ?>
<?$bd->closed();?>
	</html>

