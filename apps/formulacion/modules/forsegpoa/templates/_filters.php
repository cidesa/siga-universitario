<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/25 11:56:21
?>
<?php use_helper('Object', 'Javascript') ?>
<?php echo javascript_include_tag('dFilter', 'tools') ?>
<div class="sf_admin_filters">
<?php echo form_tag('forsegpoa/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="codpro"><?php echo __('Proyecto o Acción') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codpro]', isset($filters['codpro']) ? $filters['codpro'] : null, array (
  'size' => 15,
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('filters_codpro').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraproyecto')",
)) ?>
    </div>
<br>
    <label for="codaccesp"><?php echo __('Acción Específica') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codaccesp]', isset($filters['codaccesp']) ? $filters['codaccesp'] : null, array (
  'size' => 15,
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('filters_codaccesp').value=cadena;",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraaccion')",
)) ?>
    </div>
<br>
    <label for="codmet"><?php echo __('Meta') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codmet]', isset($filters['codmet']) ? $filters['codmet'] : null, array (
  'size' => 5,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(5, '0',0);document.getElementById('filters_codmet').value=valor;",
)) ?>
    </div>
    </div>

      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'forsegpoa/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>