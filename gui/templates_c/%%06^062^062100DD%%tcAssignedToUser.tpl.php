<?php /* Smarty version 2.6.26, created on 2010-09-09 13:32:55
         compiled from testcases/tcAssignedToUser.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'dirname', 'testcases/tcAssignedToUser.tpl', 31, false),array('function', 'lang_get', 'testcases/tcAssignedToUser.tpl', 32, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','enableTableSorting' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_from = $this->_tpl_vars['gui']->tableSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['initializer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['initializer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['matrix']):
        $this->_foreach['initializer']['iteration']++;
?>
	<?php $this->assign('tableID', "table_".($this->_tpl_vars['idx'])); ?>
	<?php if (($this->_foreach['initializer']['iteration'] <= 1)): ?>
		<?php echo $this->_tpl_vars['matrix']->renderCommonGlobals(); ?>

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_table.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	<?php echo $this->_tpl_vars['matrix']->renderHeadSection($this->_tpl_vars['tableID']); ?>

<?php endforeach; endif; unset($_from); ?>

</head>

<?php $this->assign('this_template_dir', ((is_array($_tmp='testcases/tcAssignedToUser.tpl')) ? $this->_run_mod_handler('dirname', true, $_tmp) : dirname($_tmp))); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'no_records_found,testplan,testcase,version,assigned_on,due_since,platform,goto_testspec,priority,
             high_priority,medium_priority,low_priority,build,testsuite'), $this);?>


<body>
<h1 class="title"><?php echo $this->_tpl_vars['gui']->pageTitle; ?>
</h1>
<div class="workBack">
<?php if ($this->_tpl_vars['gui']->warning_msg == ''): ?>

	<?php if ($this->_tpl_vars['gui']->resultSet): ?>

		<?php $_from = $this->_tpl_vars['gui']->tableSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['matrix']):
?>
		
			<p>
			<?php $this->assign('tableID', "table_".($this->_tpl_vars['idx'])); ?>
			<?php echo $this->_tpl_vars['matrix']->renderBodySection($this->_tpl_vars['tableID']); ?>

			</p>
		
		<?php endforeach; endif; unset($_from); ?>
	


	    <?php else: ?>
        	<?php echo $this->_tpl_vars['labels']['no_records_found']; ?>

    <?php endif; ?>
<?php else: ?>
    <?php echo $this->_tpl_vars['gui']->warning_msg; ?>

<?php endif; ?>   
</div>
</body>
</html>