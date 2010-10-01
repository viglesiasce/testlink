<?php /* Smarty version 2.6.26, created on 2010-09-30 14:28:04
         compiled from requirements/reqOverview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/reqOverview.tpl', 17, false),array('modifier', 'escape', 'requirements/reqOverview.tpl', 75, false),array('modifier', 'date_format', 'requirements/reqOverview.tpl', 106, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'testproject_has_no_reqspec, testproject_has_no_requirements, generated_by_TestLink_on,
             all_versions_displayed, latest_version_displayed, show_all_versions_btn, 
             dont_show_all_versions_btn'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
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

		<?php if ($this->_tpl_vars['matrix'] instanceof tlExtTable): ?>
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
	<?php endif; ?>
	<?php echo $this->_tpl_vars['matrix']->renderHeadSection($this->_tpl_vars['tableID']); ?>

<?php endforeach; endif; unset($_from); ?>



</head>

<body>

<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->pageTitle)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack" style="overflow-y: auto;">

<?php if ($this->_tpl_vars['gui']->warning_msg == ''): ?>
	
	<p><form method="post">
	<input type="checkbox" name="all_versions" value="all_versions"
	       <?php if ($this->_tpl_vars['gui']->all_versions): ?> checked="checked" <?php endif; ?>
	       onclick="this.form.submit();" /> <?php echo $this->_tpl_vars['labels']['show_all_versions_btn']; ?>

	<input type="hidden"
	       name="all_versions_hidden"
	       value="<?php echo $this->_tpl_vars['gui']->all_versions; ?>
" />
	</form></p><br/>
	
	<?php $_from = $this->_tpl_vars['gui']->tableSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['matrix']):
?>
		<?php $this->assign('tableID', "table_".($this->_tpl_vars['idx'])); ?>
   		<?php echo $this->_tpl_vars['matrix']->renderBodySection($this->_tpl_vars['tableID']); ?>

	<?php endforeach; endif; unset($_from); ?>
	
	<br/>
	
	<p><?php echo lang_get_smarty(array('s' => 'hlp_req_coverage_table'), $this);?>
</p>
<?php else: ?>
	<div class="user_feedback">
    <?php echo $this->_tpl_vars['gui']->warning_msg; ?>

    </div>
<?php endif; ?>    

</div>

<?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>


</body>

</html>