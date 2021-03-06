<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 39564 2010-07-21 15:44:04Z cramirez $
 */
// date: 2007/03/29 17:49:48
?>
<?php echo form_tag('nomasicarconnom/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npasicaremp, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools','observe') ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Datos')?></legend>
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('npasicaremp[codemp]', __($labels['npasicaremp{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codemp}')): ?>
    <?php echo form_error('npasicaremp{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php echo input_auto_complete_tag('npasicaremp[codemp]', $npasicaremp->getCodemp(),
    'nomasicarconnom/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 16,
    'readonly'  =>  $npasicaremp->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
        'url'      => 'nomasicarconnom/ajax',
        'complete' => 'AjaxJSON(request, json)',
		'condition' => "$(this.id).value!='' && $('id').value=='' ",
          'with' => "'ajax=1&cajtexmos=npasicaremp_nomemp&cajtexcom=npasicaremp_codemp&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
    ?>
 </div>
</th>
<th>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nphojint_Nomasicarconnom/clase/Nphojint/frame/sf_admin_edit_form/obj1/npasicaremp_codemp/obj2/npasicaremp_nomemp/campo1/codemp/campo2/nomemp','','','botoncat')?>
  </th>
<th>
<?php $value = object_input_tag($npasicaremp, 'getNomemp', array (
  'readonly' => true,
  'size'=> 60,
  'control_name' => 'npasicaremp[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
</div>

<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('npasicaremp[codnom]', __($labels['npasicaremp{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codnom}')): ?>
    <?php echo form_error('npasicaremp{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php echo input_auto_complete_tag('npasicaremp[codnom]', $npasicaremp->getCodnom(),
    'nomasicarconnom/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 3,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npasicaremp_codnom').value=cadena",
  'readonly'  =>  $npasicaremp->getId()!='' ? true : false ,
   'onBlur'=> remote_function(array(
        'url'      => 'nomasicarconnom/ajax',
        'complete' => 'AjaxJSON(request, json)',
		'condition' => "$(this.id).value!='' && $('id').value=='' ",
          'with' => "'ajax=2&cajtexmos=npasicaremp_nomnom&cajtexcom=npasicaremp_codnom&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
    ?>
 </div>
</th>
<th>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npnomina_nomdefespvar/clase/Npnomina/frame/sf_admin_edit_form/obj1/npasicaremp_codnom/obj2/npasicaremp_nomnom/obj3/frecuencal/campo1/codnom/campo2/nomnom/campo3/frecal','','','botoncat')?>
  </th>
<th>
<?php $value = object_input_tag($npasicaremp, 'getNomnom', array (
  'readonly' => true,
  'size'=> 60,
  'control_name' => 'npasicaremp[nomnom]',
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('frecuencal', '') ?>
</th>
</tr>
</table>
</div>

<div class="form-row" >
<table>
<tr>
<th>
<?php echo label_for('npasicaremp[codcar]', __($labels['npasicaremp{codcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codcar}')): ?>
    <?php echo form_error('npasicaremp{codcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php echo input_auto_complete_tag('npasicaremp[codcar]', $npasicaremp->getCodcar(),
    'nomasicarconnom/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 16,
    'readonly'  =>  $npasicaremp->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
  		'update'  => 'divGrid',
        'url'      => 'nomasicarconnom/ajax',
        'complete' => 'AjaxJSON(request, json)',
		'condition' => "$(this.id).value!='' && $('id').value=='' ",
        'with' => "'ajax=3&cajtexmos=npasicaremp_nomcar&cajtexcom=npasicaremp_codcar&codemp='+$('npasicaremp_codemp').value+'&codnom='+$('npasicaremp_codnom').value+'&frecuen='+$('frecuencal').value+'&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
    ?>
 </div>
</th>
<th>
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Nomasicarconnom_Npasicarnom/clase/Npcargos/frame/sf_admin_edit_form/obj1/npasicaremp_codcar/obj2/npasicaremp_nomcar/obj3/sueldo/campo1/codcar/campo2/nomcar/campo3/sueldo/param1/'+$('npasicaremp_codnom').value+'/param2/".$filvac) ?>   </div>
<th>
<?php $value = object_input_tag($npasicaremp, 'getNomcar', array (
  'readonly' => true,
  'size'=> 60,
  'control_name' => 'npasicaremp[nomcar]',
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('sueldo', '') ?>
</th>
</tr>
</table>
<table>
<tr>
    <th colspan="2">
<?php echo label_for('npasicaremp[nivel]', __($labels['npasicaremp{nivel}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{nivel}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{nivel}')): ?>
    <?php echo form_error('npasicaremp{nivel}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getNivel', array (
  'size' => 87,
  'readonly' => true,
  'control_name' => 'npasicaremp[nivel]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>

</tr>
</table>
</div>

<?php if($sf_user->getAttribute('varforma','','nomasicarconnom')!='S') {?>
<div class="form-row">
<?php echo label_for('npasicaremp[paso]', __($labels['npasicaremp{paso}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{paso}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{paso}')): ?>
    <?php echo form_error('npasicaremp{paso}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getPaso', array (
  'size' => 20,
  //'readonly' => true,
  'control_name' => 'npasicaremp[paso]',
  'maxlength' => 3,
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</div>
<?php }else{ ?>
<?php if($sf_user->getAttribute('codcar','','nomasicarconnom')==$npasicaremp->getCodtipcar() && $sf_user->getAttribute('codcar','','nomasicarconnom')!='') {?>
	<div class="form-row" id="gridcatded">
<?php }else{?>
 	<div class="form-row" id="gridcatded" style="display:none">
<?php }?>
  <?php echo label_for('npasicaremp[codtipded]', __($labels['npasicaremp{codtipded}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipded}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipded}')): ?>
    <?php echo form_error('npasicaremp{codtipded}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('npasicaremp[codtipded]', options_for_select($listadedicacion,$npasicaremp->getCodtipded(),'include_custom=Seleccione Uno')) ?>
    </div>
<br>
  <?php echo label_for('npasicaremp[codtipcat]', __($labels['npasicaremp{codtipcat}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipcat}')): ?>
    <?php echo form_error('npasicaremp{codtipcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('npasicaremp[codtipcat]', options_for_select($listacategoria,$npasicaremp->getCodtipcat(),'include_custom=Seleccione Uno')) ?>
    </div>
</div>

<?php } ?>
</fieldset>




<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Especificaciones del Cargo') ?></legend>

<div class="form-row"><?php echo label_for('npasicaremp[fecasi]', __($labels['npasicaremp{fecasi}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('npasicaremp{fecasi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('npasicaremp{fecasi}')): ?> <?php echo form_error('npasicaremp{fecasi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_date_tag($npasicaremp, 'getFecasi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npasicaremp[fecasi]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?></div>
</div>

<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('npasicaremp[codtipgas]', __($labels['npasicaremp{codtipgas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtipgas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtipgas}')): ?>
    <?php echo form_error('npasicaremp{codtipgas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php //echo select_tag('npasicaremp[tipgas]', options_for_select($tipos,$npasicaremp->getCodtipgas(),'include_custom=Seleccione Uno')); ?>
 <?php if ($npasicaremp->getCodtipgas()!='') $tipos=$npasicaremp->getCodtipgas(); ?>
 <?php echo select_tag('npasicaremp[codtipgas]', objects_for_select(NptipgasPeer::doSelect(new Criteria()),'getCodtipgas','getDestipgas',$tipos,'include_custom=Seleccione Uno')) ?>
<br>
<br>
</th>
</tr>
<tr>
<th>
<?php if($sf_user->getAttribute('varforma','','nomasicarconnom') == 'S') {?>
<?php echo label_for('npasicaremp[codtie]', __($labels['npasicaremp{codtie}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codtie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codtie}')): ?>
    <?php echo form_error('npasicaremp{codtie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('npasicaremp[codtie]', options_for_select($listatiempo,$npasicaremp->getCodtie(),'include_custom=Seleccione Uno')) ?>
    </div>
<?php }?>
</th>
</tr>
</table>
</div>


<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('npasicaremp[codcat]', __($labels['npasicaremp{codcat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codcat}')): ?>
    <?php echo form_error('npasicaremp{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npasicaremp, 'getCodcat', array (
  'size' => 32,
  'maxlength' => $lonfor,
  'control_name' => 'npasicaremp[codcat]',
  'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById('npasicaremp_codcat').value=cadena;}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$formato')",
  'onBlur'=> remote_function(array(
        'url'      => 'nomasicarconnom/ajax',
        'complete' => 'AjaxJSON(request, json)',
		'condition' => "$(this.id).value!='' && $('id').value=='' ",
          'with' => "'ajax=6&cajtexmos=npasicaremp_nomcat&cajtexcom=npasicaremp_codcat&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcatpre_Almreq/clase/Npcatpre/frame/sf_admin_edit_form/obj1/npasicaremp_codcat/obj2/npasicaremp_nomcat/campo1/codcat/campo2/nomcat')?>
  </th>
<th>
<?php $value = object_input_tag($npasicaremp, 'getNomcat', array (
  'readonly' => true,
  'size'=> 60,
  'control_name' => 'npasicaremp[nomcat]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>

<div id="divcencos" style="display:none">
<br>
<?php echo label_for('npasicaremp[codcen]', __($labels['npasicaremp{codcen}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasicaremp{codcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasicaremp{codcen}')): ?>
    <?php echo form_error('npasicaremp{codcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($npasicaremp, 'getCodcen', array (
  'size' => 20,
  'control_name' => 'npasicaremp[codcen]',
  'maxlength' => 4,
  'readonly'  =>  $npasicaremp->getId()!='' ? true : false,
  'onBlur'=> remote_function(array(
       'url'      => 'nomasicarconnom/ajax',
       'script'   => true,
       'condition' => "$('npasicaremp_codcen').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=7&cajtexmos=npasicaremp_descen&cajtexcom=npasicaremp_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/npasicaremp_codcen/obj2/npasicaremp_descen/campo1/codcen/campo2/descen','','','botoncat')?>
&nbsp;&nbsp;
 <?php $value = object_input_tag($npasicaremp, 'getDescen', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'npasicaremp[descen]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>

</fieldset>

<div id="divGrid">
<form name="form1" id="form1">


<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="3" face="Verdana, Arial, Helvetica, sans-serif"> <? echo __('Si el Empleado no tiene asociado ningun concepto el sistema por defecto traera marcado todos los conceptos')?></font></strong></th>
  </tr>
</table>
<? echo grid_tag($obj); ?>
</form>
</div>

</fieldset>


<?php include_partial('edit_actions', array('npasicaremp' => $npasicaremp)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npasicaremp->getId()): ?>
 <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
  function eliminar()
  {
    var empleado=$('npasicaremp_codemp').value;
    var cargo=$('npasicaremp_codcar').value;
    var nomina=$('npasicaremp_codnom').value;
    var fecha=$('npasicaremp_fecasi').value;
    var id=$('id').value;

    if (confirm('¿Realmente desea eliminar este cargo a este Trabajador, recuerde que se eliminaran los conceptos asignados con sus respectivos valores?'))
    {
	  if (confirm('¿Desea Grabar en Histórico esta Información?'))
        var explab='si';
	  else
	    var explab='no';
	  location.href=getUrlModulo()+'eliminar?empleado='+empleado+'&cargo='+cargo+'&nomina='+nomina+'&fecha='+fecha+'&explab='+explab;
    }
  }

  var id='<?php echo $npasicaremp->getId()?>';
  if (id!="")
    {
	    $$('.botoncat')[0].disabled=true;
	    $$('.botoncat')[1].disabled=true;
            $$('.botoncat')[2].disabled=true;
   }
   var mancencos='<?php echo $npasicaremp->getMancencos(); ?>';
   if (mancencos=='S')
   {
       $('divcencos').show();
   }
</script>