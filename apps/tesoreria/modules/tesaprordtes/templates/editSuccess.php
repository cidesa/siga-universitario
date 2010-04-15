<?php
// auto-generated by PropelCidesa
// date: 2009/09/18 17:24:51
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas

 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: editSuccess.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1>
<?php if ($cambiaretiapr!="S") {?>
<?php echo __('Recepción de Órdenes Aprobadas',
array()) ?>
<?php }else {?>
<?php echo __($nometiaprts,
array()) ?>
<?php }?>
</h1>


<div id="sf_admin_header">
<?php include_partial('tesaprordtes/edit_header', array('opordpag' => $opordpag, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('tesaprordtes/edit_messages', array('opordpag' => $opordpag, 'labels' => $labels, 'params' => $params)) ?>
<?php include_partial('tesaprordtes/edit_form', array('opordpag' => $opordpag, 'labels' => $labels, 'params' => $params)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('tesaprordtes/edit_footer', array('opordpag' => $opordpag, 'labels' => $labels, 'params' => $params)) ?>
</div>

</div>
