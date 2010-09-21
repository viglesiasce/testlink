<?php /* Smarty version 2.6.26, created on 2010-09-09 13:52:21
         compiled from results/charts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/charts.tpl', 13, false),array('modifier', 'escape', 'results/charts.tpl', 23, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>
<h1 class="title"><?php echo lang_get_smarty(array('s' => 'graphical_reports'), $this);?>
</h1>

<?php if ($this->_tpl_vars['gui']->can_use_charts == 'OK'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => $this->_tpl_vars['gui']->tplan_name)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
<?php endif; ?>

<div class="workBack">
<?php if ($this->_tpl_vars['gui']->can_use_charts == 'OK'): ?>
    <?php $_from = $this->_tpl_vars['gui']->charts; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['code']):
?>
    <h3><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
    	<img src="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['code']; ?>
">
    <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
    <?php echo $this->_tpl_vars['gui']->can_use_charts; ?>

<?php endif; ?>
</div>
</body>
</html>