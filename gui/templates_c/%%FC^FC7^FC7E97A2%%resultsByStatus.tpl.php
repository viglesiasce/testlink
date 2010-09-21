<?php /* Smarty version 2.6.26, created on 2010-09-09 13:52:58
         compiled from results/resultsByStatus.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/resultsByStatus.tpl', 14, false),array('modifier', 'escape', 'results/resultsByStatus.tpl', 22, false),array('modifier', 'date_format', 'results/resultsByStatus.tpl', 58, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'th_test_suite,test_case,version,th_build,th_run_by,th_bugs_not_linked,
          th_date,title_execution_notes,th_bugs,summary,generated_by_TestLink_on,
          th_assigned_to,th_platform,platform,info_failed_tc_report,
          info_blocked_tc_report,info_notrun_tc_report'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->title)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => $this->_tpl_vars['gui']->tplan_name)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui']->warning_msg == ''): ?>
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
	
	<?php if ($this->_tpl_vars['gui']->bugInterfaceOn && $this->_tpl_vars['gui']->type != 'n'): ?>
	  <h2 class="simple"><?php echo $this->_tpl_vars['labels']['th_bugs_not_linked']; ?>
<?php echo $this->_tpl_vars['gui']->without_bugs_counter; ?>
</h2>
	  <br />
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['gui']->type == 'f'): ?>
		<p class="italic"><?php echo $this->_tpl_vars['labels']['info_failed_tc_report']; ?>
</p>
		<br />
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['gui']->type == 'b'): ?>
		<p class="italic"><?php echo $this->_tpl_vars['labels']['info_blocked_tc_report']; ?>
</p>
		<br />
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['gui']->type == 'n'): ?>
		<p class="italic"><?php echo $this->_tpl_vars['labels']['info_notrun_tc_report']; ?>
</p>
		<br />
	<?php endif; ?>
	
	<?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

<?php else: ?>
	<br \>
	<?php echo $this->_tpl_vars['gui']->warning_msg; ?>

<?php endif; ?>
</div>
</body>
</html>