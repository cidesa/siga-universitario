<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/02/06 12:18:19
?>
<?php echo form_tag('presnomasitrabcont/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npasiempcont, 'getId') ?>

<?php use_helper('Javascript','wait','Grid','PopUp','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Definiciones Generales')?></legend>
<br>
<div class="form-row">
  <?php echo label_for('npasiempcont[codtipcon]', __($labels['npasiempcont{codtipcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npasiempcont{codtipcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npasiempcont{codtipcon}')): ?>
    <?php echo form_error('npasiempcont{codtipcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?//javascript: valor=this.value; valor=valor.pad(3, '0',0)?>
  <?php $value = object_input_tag($npasiempcont, 'getCodtipcon', array (
  'size' => 6,
  'maxlength' => 3,
  'control_name' => 'npasiempcont[codtipcon]',
  'readonly' => $npasiempcont->getId()!='' ? true : false ,
  'onBlur'=>  $npasiempcont->getId()!='' ? '' : remote_function(array(
  		  //'before' => '  if(this.value!="") {alert(this.value); var valor=this.value; valor=valor.pad(3, "0",0);$("npasiempcont_codtipcon").value=valor;}',
          //'condition' =>  "$('id').value == ''",
          'update'   => 'mensaje',
          'url'      => 'presnomasitrabcont/ajax',
          'complete' => 'AjaxJSON(request, json)',
          'script' => true,
          'with' => "'ajax=1&cajtexmos=npasiempcont_destipcon&cajtexcom=npasiempcont_codtipcon&codigo='+this.value",
        )),
  )); echo $value ? $value : '&nbsp;'?>

  &nbsp;&nbsp;&nbsp;
 <?php  echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nptipcon_Presnomasitrabcont/clase/Nptipcon/frame/sf_admin_edit_form/obj1/npasiempcont_codtipcon/obj2/npasiempcont_destipcon/campo1/codtipcon/campo2/destipcon')?>
&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($npasiempcont, 'getDestipcon', array (
  'size' => 50	,
  //'readonly' => true,
  'control_name' => 'npasiempcont[destipcon]',
)); echo $value ? $value : '&nbsp;' ?>
<br>
<br>
<br>
<?php echo radiobutton_tag('marca', '1', false, array('onClick'=> 'marcarTodo();'))."Marcar Todo ".'&nbsp;&nbsp;';
      echo radiobutton_tag('marca', '4', false, array('onClick'=> 'desmarcarTodo();'))."Desmarcar Todo".'&nbsp;&nbsp;';	?>
</div>
</div>

</fieldset>
<br>
<div id="mensaje">
<?
echo grid_tag($obj);
echo input_hidden_tag('totalfilas', $totfil)
?>
</div>
<?php include_partial('edit_actions', array('npasiempcont' => $npasiempcont)) ?>

</form>


<script language="JavaScript" type="text/javascript">

  ocutaricono();

  function marcarTodo()
  {
  	 var am=parseInt($('totalfilas').value);
     var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_1";
	  $(id).checked=1;
	  fil++;
	 }
  }

  function desmarcarTodo()
  {
    var am=parseInt($('totalfilas').value);
     var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_1";
	  $(id).checked=0;
	  fil++;
	 }
  }
  function ocutaricono()
  {
  	var am=parseInt($('totalfilas').value);
     var fil=0;
	 while (fil<am)
	 {
	  var id="ax"+"_"+fil+"_6";
	  $('trigger_'+id).hide();
	  fil++;
	 }
  }
</script>
