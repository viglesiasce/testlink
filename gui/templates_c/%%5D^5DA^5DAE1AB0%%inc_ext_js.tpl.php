<?php /* Smarty version 2.6.26, created on 2010-09-24 15:21:51
         compiled from inc_ext_js.tpl */ ?>

<?php if (guard_header_smarty ( __FILE__ )): ?>

<?php $this->assign(($this->_tpl_vars['css_only']), ($this->_tpl_vars['css_only'])."|default:0"); ?>
<?php $this->assign('ext_location', @TL_EXTJS_RELATIVE_PATH); ?>
<?php if (isset ( $this->_tpl_vars['bResetEXTCss'] ) && $this->_tpl_vars['bResetEXTCss']): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/css/reset-min.css" />
<?php endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/css/ext-all.css" />

<?php if ($this->_tpl_vars['css_only'] == 0): ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/adapter/ext/ext-base.js" language="javascript"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/ext-all.js" language="javascript"></script>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/ux/Reorderer.js" language="javascript"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/ux/ToolbarReorderer.js" language="javascript"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/ux/ToolbarDroppable.js" language="javascript"></script>

<?php endif; ?>

<?php endif; ?>