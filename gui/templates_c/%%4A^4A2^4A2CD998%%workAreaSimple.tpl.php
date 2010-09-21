<?php /* Smarty version 2.6.26, created on 2010-09-07 23:02:05
         compiled from workAreaSimple.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'workAreaSimple.tpl', 11, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>

<?php if (isset ( $this->_tpl_vars['title'] ) && $this->_tpl_vars['title'] != ''): ?>
	<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<?php endif; ?>

<div class="workBack">

<?php if ($this->_tpl_vars['content'] != ''): ?>
	<?php echo $this->_tpl_vars['content']; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['link_to_op'] != ''): ?>
  <p><a href="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['link_to_op']; ?>
"><?php echo $this->_tpl_vars['hint_text']; ?>
</a>
<?php endif; ?>
	
</div>

</body>
</html>