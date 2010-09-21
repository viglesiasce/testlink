<?php /* Smarty version 2.6.26, created on 2010-09-13 17:46:58
         compiled from execute/getExecNotes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'execute/getExecNotes.tpl', 18, false),)), $this); ?>
<html>
<head>
</head>
<body>
<?php if ($this->_tpl_vars['webeditorType'] == 'none'): ?>
<textarea <?php echo $this->_tpl_vars['readonly']; ?>
 name="notes" cols="70" rows="10" style="background:transparent;">
<?php echo ((is_array($_tmp=$this->_tpl_vars['notes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</textarea>
<?php else: ?>
<?php echo $this->_tpl_vars['notes']; ?>

<?php endif; ?>
</body>
</html>