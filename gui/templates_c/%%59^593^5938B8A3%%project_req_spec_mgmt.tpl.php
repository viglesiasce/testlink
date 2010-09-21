<?php /* Smarty version 2.6.26, created on 2010-09-09 15:12:12
         compiled from requirements/project_req_spec_mgmt.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/project_req_spec_mgmt.tpl', 9, false),array('modifier', 'escape', 'requirements/project_req_spec_mgmt.tpl', 28, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "btn_reorder_req_spec,btn_new_req_spec,btn_import,btn_export_all_reqspec"), $this);?>

<?php $this->assign('req_module', 'lib/requirements/'); ?>
<?php $this->assign('url_args', "reqSpecEdit.php?doAction=create&amp;tproject_id="); ?>
<?php $this->assign('req_spec_new_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args'])); ?>

<?php $this->assign('url_args', "reqSpecEdit.php?doAction=reorder&amp;tproject_id="); ?>
<?php $this->assign('req_spec_reorder_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args'])); ?>

<?php $this->assign('url_args', "reqExport.php?scope=tree&tproject_id="); ?>
<?php $this->assign('req_export_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args'])); ?>

<?php $this->assign('url_args', "reqImport.php?scope=tree&tproject_id="); ?>
<?php $this->assign('req_import_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args'])); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<div class="workBack">
	<div class="groupBtn">
		<form method="post">
			<input type="button" id="new_req_spec" name="new_req_spec"
			       value="<?php echo $this->_tpl_vars['labels']['btn_new_req_spec']; ?>
"
			       onclick="location='<?php echo $this->_tpl_vars['req_spec_new_url']; ?>
<?php echo $this->_tpl_vars['gui']->tproject_id; ?>
'" />

			<input type="button" id="export_all" name="export_all"
			       value="<?php echo $this->_tpl_vars['labels']['btn_export_all_reqspec']; ?>
"
			       onclick="location='<?php echo $this->_tpl_vars['req_export_url']; ?>
<?php echo $this->_tpl_vars['gui']->tproject_id; ?>
'" />

			<input type="button" id="import_all" name="import_all"
			       value="<?php echo $this->_tpl_vars['labels']['btn_import']; ?>
"
			       onclick="location='<?php echo $this->_tpl_vars['req_import_url']; ?>
<?php echo $this->_tpl_vars['gui']->tproject_id; ?>
'" />
		</form>
	</div>
</div>

<?php if ($this->_tpl_vars['gui']->refresh_tree == 'yes'): ?>
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTree.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

</body>
</html>