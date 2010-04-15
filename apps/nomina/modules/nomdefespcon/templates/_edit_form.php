<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/21 16:57:12
?>
<?php echo form_tag('nomdefespcon/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npdefcpt, 'getId') ?>
<?php echo javascript_include_tag('tools','observe','dFilter','ajax') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('npdefcpt[codcon]', __($labels['npdefcpt{codcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefcpt{codcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefcpt{codcon}')): ?>
    <?php echo form_error('npdefcpt{codcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefcpt, 'getCodcon', array (
  'size' => 3,
  'control_name' => 'npdefcpt[codcon]',
  'maxlength' => '3',
  'readonly'  =>  $npdefcpt->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npdefcpt_codcon').value=cadena",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);document.getElementById('npdefcpt_codcon').value=valor;document.getElementById('npdefcpt_codcon').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?> </div>

<br>

  <?php echo label_for('npdefcpt[nomcon]', __($labels['npdefcpt{nomcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefcpt{nomcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefcpt{nomcon}')): ?>
    <?php echo form_error('npdefcpt{nomcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npdefcpt, 'getNomcon', array (
  'size' => 100,
  'maxlength' => '100',
  'control_name' => 'npdefcpt[nomcon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table>
<tr>
<th>
<?php echo label_for('npdefcpt[codpar]', __($labels['npdefcpt{codpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npdefcpt{codpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npdefcpt{codpar}')): ?>
    <?php echo form_error('npdefcpt{codpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($npdefcpt, 'getCodpar', array (
  'size' => 20,
  'maxlength' => $longitud,
  'control_name' => 'npdefcpt[codpar]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$formato')",
   'onBlur'=> remote_function(array(
        'url'      => 'nomdefespcon/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=npdefcpt_nompar&cajtexcom=npdefcpt_codpar&codigo='+this.value"
        )),
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefcpt_nomdefespcon2/clase/Nppartidas/frame/sf_admin_edit_form/obj1/npdefcpt_codpar/obj2/npdefcpt_nompar/campo1/codpar/campo2/nompar/param1/1')?>
  </th>
<th>
<?php $value = object_input_tag($npdefcpt, 'getNompar', array (
  'disabled' => true,
  'size'=> 60,
  'control_name' => 'npdefcpt[nompar]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
</div>
</fieldset>
</div>

<br>

<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Operación Contable') ?> </legend>
<div class="form-row">

 <?  if ($npdefcpt->getOpecon()=='A'){
  echo radiobutton_tag('npdefcpt[opecon]','A', true) .'&nbsp;&nbsp;'. "Asignación" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','D', false) .'&nbsp;&nbsp;'. "Deducción" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','P', false) .'&nbsp;&nbsp;'. "Aporte Patronal" .'&nbsp;&nbsp;&nbsp;&nbsp;';

}elseif ($npdefcpt->getOpecon()=='D'){
  echo radiobutton_tag('npdefcpt[opecon]','A', false) .'&nbsp;&nbsp;'. "Asignación" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','D', true) .'&nbsp;&nbsp;'. "Deducción" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','P', false) .'&nbsp;&nbsp;'. "Aporte Patronal" .'&nbsp;&nbsp;&nbsp;&nbsp;';

}elseif ($npdefcpt->getOpecon()=='P'){
  echo radiobutton_tag('npdefcpt[opecon]','A', false) .'&nbsp;&nbsp;'. "Asignación".'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','D', false) .'&nbsp;&nbsp;'. "Deducción" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','P', true) .'&nbsp;&nbsp;'. "Aporte Patronal" .'&nbsp;&nbsp;&nbsp;&nbsp;';

}else{
  echo radiobutton_tag('npdefcpt[opecon]','A', false) .'&nbsp;&nbsp;'. "Asignación" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','D', false) .'&nbsp;&nbsp;'. "Deducción" .'&nbsp;&nbsp;&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[opecon]','P', false) .'&nbsp;&nbsp;'. "Aporte Patronal" .'&nbsp;&nbsp;&nbsp;&nbsp;';

}
?>
</div>
</fieldset>
</div>

<br>

<div class="form-row">
<table>
<tr>
<th>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Concepto Activo') ?> </legend>
<div class="form-row">
<?  if ($npdefcpt->getConact()=='S'){
  echo radiobutton_tag('npdefcpt[conact]','S', true) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[conact]','N', false) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}elseif ($npdefcpt->getConact()=='N'){
  echo radiobutton_tag('npdefcpt[conact]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[conact]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}else{
  echo radiobutton_tag('npdefcpt[conact]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[conact]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}
?></div>
</fieldset>


</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Inicializar Montos') ?></legend>
<div class="form-row"><?  if ($npdefcpt->getInimon()=='S'){
  echo radiobutton_tag('npdefcpt[inimon]','S', true) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[inimon]','N', false) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}elseif ($npdefcpt->getInimon()=='N'){
  echo radiobutton_tag('npdefcpt[inimon]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[inimon]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}else{
  echo radiobutton_tag('npdefcpt[inimon]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[inimon]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}
?></div>
</fieldset>


</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Genera Orden de Pago') ?></legend>
<div class="form-row"><?  if ($npdefcpt->getOrdpag()=='S'){
  echo radiobutton_tag('npdefcpt[ordpag]','S', true) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[ordpag]','N', false) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}elseif ($npdefcpt->getOrdpag()=='N'){
  echo radiobutton_tag('npdefcpt[ordpag]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[ordpag]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}else{
  echo radiobutton_tag('npdefcpt[ordpag]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[ordpag]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}
?></div>
</fieldset>

</th>
</tr>

<tr>
</tr>

<tr>
<th>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Concepto Imprimible') ?></legend>
<div class="form-row"><?  if ($npdefcpt->getImpcpt()=='S'){
  echo radiobutton_tag('npdefcpt[impcpt]','S', true) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[impcpt]','N', false) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}elseif ($npdefcpt->getImpcpt()=='N'){
  echo radiobutton_tag('npdefcpt[impcpt]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[impcpt]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}else{
  echo radiobutton_tag('npdefcpt[impcpt]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[impcpt]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}
?></div>
</fieldset>

</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Acumula Histórico') ?></legend>
<div class="form-row"><?  if ($npdefcpt->getAcuhis()=='S'){
  echo radiobutton_tag('npdefcpt[acuhis]','S', true) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[acuhis]','N', false) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}elseif ($npdefcpt->getAcuhis()=='N'){
  echo radiobutton_tag('npdefcpt[acuhis]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[acuhis]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}else{
  echo radiobutton_tag('npdefcpt[acuhis]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[acuhis]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}
?></div>
</fieldset>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Afecta Presupuesto') ?></legend>
<div class="form-row"><?  if ($npdefcpt->getAfepre()=='S'){
  echo radiobutton_tag('npdefcpt[afepre]','S', true) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[afepre]','N', false) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}elseif ($npdefcpt->getAfepre()=='N'){
  echo radiobutton_tag('npdefcpt[afepre]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[afepre]','N', true) .'&nbsp;&nbsp;'. "No"."<br>";

}else{
  echo radiobutton_tag('npdefcpt[afepre]','S', false) .'&nbsp;&nbsp;'. "Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('npdefcpt[afepre]','N', true) .'&nbsp;&nbsp;'. "No".'&nbsp;&nbsp;';

}
?></div>
</fieldset>
</th>

</tr>
</table>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npdefcpt' => $npdefcpt)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npdefcpt->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefespcon/delete?id='.$npdefcpt->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
