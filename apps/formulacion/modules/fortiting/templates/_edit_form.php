<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/29 11:41:38
?>
<?php echo form_tag('fortiting/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript', 'Grid', 'PopUp') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'formulacion/fortiting') ?>


<?php echo object_input_hidden_tag($forparing, 'getId') ?>
<?php echo input_hidden_tag('escero', '') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Partida de Ingreso')?></legend>
<div class="form-row">
  <?php echo label_for('forparing[codparing]', __($labels['forparing{codparing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forparing{codparing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forparing{codparing}')): ?>
    <?php echo form_error('forparing{codparing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forparing, 'getCodparing', array (
  'size' => $lonpar,
  'maxlength' => $lonpar,
  'readonly'  =>  $forparing->getId()!='' ? true : false ,
  'control_name' => 'forparing[codparing]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forpar')",
  'onBlur'=> remote_function(array(
        'url'      => 'fortiting/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('forparing_codparing').value != ''",
        'with' => "'ajax=1&cajtexmos=forparing_despar&cajtexcom=forparing_codparing&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>

<? //// NO SE DE DONDE SACARON ESTE CODIGO ///
/*
$sql="select a.codparing as codigo , a.nomparing as nombre from fordefparing a
where length(a.codparing)=".$lonpar." and a.codparing not in (select b.codparing from forparing b)";
    $url=cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/forparing_codparing-forparing_despar/campos/codigo-nombre';
 */ ?>
 <?php //echo  button_to_popup('...',$url,$sql,'catalogo1')?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefparing_Fortiting/clase/fordefparing/frame/sf_admin_edit_form/obj1/forparing_codparing/obj2/forparing_despar/campo1/codparing/campo2/nomparing/param1/'.$lonpar)?></th>

  <?php $value = object_input_tag($forparing, 'getDespar', array (
  'disabled' => true,
  'control_name' => 'forparing[despar]',
  'size' => 80,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>

    </div>

<br>

<table>
  <tr>
	<th><?php echo label_for('forparing[montoing]', __($labels['forparing{montoing}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('forparing{montoing}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forparing{montoing}')): ?>
    <?php echo form_error('forparing{montoing}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($forparing, array('getMontoing',true), array (
  'size' => 10,
  'control_name' => 'forparing[montoing]',
  'onblur' => 'distribuirPeriodos()',
  'onKeypress' => 'entermontootro(event,this.id)',
)); echo $value ? $value : '&nbsp;' ?></div> </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th><input type="button" value="Distribución Mensual" onClick="javascript:$('distribucion').toggle(); "></th>
  </tr>
</table>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Tipo de Financiamiento')?></legend>
<div class="form-row">
  <?php echo label_for('forparing[codtipfin]', __($labels['forparing{codtipfin}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('forparing{codtipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('forparing{codtipfin}')): ?>
    <?php echo form_error('forparing{codtipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('forparing[codtipfin]', $forparing->getCodtipfin(),
    'fortiting/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 6, 'maxlength' => 4, 'onBlur'=> remote_function(array(
			  'url'      => 'fortiting/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('forparing_codtipfin').value != ''",
  			  'with' => "'ajax=2&cajtexmos=forparing_desfin&cajtexcom=forparing_codtipfin&codigo='+this.value",
			  ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fortipfin_Fortiting/clase/Fortipfin/frame/sf_admin_edit_form/obj1/forparing_codtipfin/obj2/forparing_desfin/campo1/codfin/campo2/nomext')?>

  <?php $value = object_input_tag($forparing, 'getDesfin', array (
  'disabled' => true,
  'control_name' => 'forparing[desfin]',
  'maxlength' => 100, 'size' => 60,
)); echo $value ? $value : '&nbsp;' ?>

    </div>

</div>
</fieldset>

<br>

<div id="distribucion" style="display:none">
<?
echo grid_tag($obj);
?>

<div id="distribucion_monto" style="display:none">
<?
echo grid_tag($objMonto);
?>
<br>

<table>
 <tr>
 <th>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('',__('Total') , 'class="required"') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo input_tag('suma','0,00', 'size=15 class=grid_txtright readonly=true') ?>
</th>
<th>
&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo input_tag('suma2','0,00', 'size=15 class=grid_txtright readonly=true') ?>
</th>
 </tr>
</table>

</div>

</div>
</fieldset>

<script type="text/javascript">
var id='<?php echo $forparing->getId()?>';
if (id!="")
{
  actualizarsaldos();
}
</script>

<?php include_partial('edit_actions', array('forparing' => $forparing)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($forparing->getId()): ?>
<?php echo button_to(__('delete'), 'fortiting/delete?id='.$forparing->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>