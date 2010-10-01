<?php /* Smarty version 2.6.26, created on 2010-09-27 15:37:19
         compiled from results/testCasesWithoutTester.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/testCasesWithoutTester.tpl', 12, false),array('modifier', 'escape', 'results/testCasesWithoutTester.tpl', 19, false),array('modifier', 'date_format', 'results/testCasesWithoutTester.tpl', 39, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'no_uncovered_testcases,testproject_has_no_reqspec,
             testproject_has_no_requirements,generated_by_TestLink_on,
             testCasesWithoutTester_info'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->pageTitle)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<div class="workBack" style="overflow-y: auto;">

 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => $this->_tpl_vars['gui']->tplan_name)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	

<?php if ($this->_tpl_vars['gui']->warning_msg == ''): ?>
	<?php if ($this->_tpl_vars['gui']->tableSet): ?>
		<?php echo $this->_tpl_vars['gui']->tableSet[0]->renderCommonGlobals(); ?>

		<?php if ($this->_tpl_vars['gui']->tableSet[0] instanceof tlExtTable): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array('bResetEXTCss' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_table.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		<?php echo $this->_tpl_vars['gui']->tableSet[0]->renderHeadSection(); ?>

		<?php echo $this->_tpl_vars['gui']->tableSet[0]->renderBodySection(); ?>

		
		<br />
		<p class="italic"><?php echo $this->_tpl_vars['labels']['testCasesWithoutTester_info']; ?>
</p>
		<br />
		
		<?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

		
	<?php else: ?>
		<h2><?php echo $this->_tpl_vars['labels']['no_testcases_without_tester']; ?>
</h2>
	<?php endif; ?>
<?php else: ?>
	<br />
    <?php echo $this->_tpl_vars['gui']->warning_msg; ?>

<?php endif; ?>
</div>
</body>
</html>