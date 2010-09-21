<?php /* Smarty version 2.6.26, created on 2010-09-20 11:41:20
         compiled from emailSent.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'emailSent.tpl', 7, false),array('function', 'lang_get', 'emailSent.tpl', 7, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>

<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo lang_get_smarty(array('s' => 'send_test_report'), $this);?>
</h1>
<?php if ($this->_tpl_vars['message'] != ""): ?>
	<p class='info'><?php echo $this->_tpl_vars['message']; ?>
</p>
<?php endif; ?>

</body>
</html>