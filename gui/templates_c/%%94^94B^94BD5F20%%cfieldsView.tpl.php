<?php /* Smarty version 2.6.26, created on 2010-10-09 10:41:39
         compiled from cfields/cfieldsView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'cfields/cfieldsView.tpl', 11, false),array('modifier', 'replace', 'cfields/cfieldsView.tpl', 11, false),array('modifier', 'escape', 'cfields/cfieldsView.tpl', 49, false),array('function', 'config_load', 'cfields/cfieldsView.tpl', 12, false),array('function', 'lang_get', 'cfields/cfieldsView.tpl', 23, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='cfields/cfieldsView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $this->assign('cfViewAction', "lib/cfields/cfieldsView.php"); ?>

<?php $this->assign('cfImportAction', "lib/cfields/cfieldsImport.php?goback_url="); ?>
<?php $this->assign('importCfieldsAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['cfImportAction']).($this->_tpl_vars['basehref']).($this->_tpl_vars['cfViewAction'])); ?>

<?php $this->assign('cfExportAction', "lib/cfields/cfieldsExport.php?goback_url="); ?>
<?php $this->assign('exportCfieldsAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['cfExportAction']).($this->_tpl_vars['basehref']).($this->_tpl_vars['cfViewAction'])); ?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => "name,label,type,title_cfields_mgmt,manage_cfield,btn_cfields_create,
             show_on_design,enable_on_design,show_on_exec,enable_on_exec,btn_export,
             btn_import,btn_goback,
             show_on_testplan_design,enable_on_testplan_design,available_on"), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_cfields_mgmt']; ?>
</h1>
<div class="workBack">
<?php if ($this->_tpl_vars['gui']->cf_map != ''): ?>
  <table class="simple" style="width: 90%">
  	<tr>
  		<th><?php echo $this->_tpl_vars['labels']['name']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['label']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['type']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['enable_on_design']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['show_on_exec']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['enable_on_exec']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['enable_on_testplan_design']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['available_on']; ?>
</th>
  	</tr>
  
   	<?php $_from = $this->_tpl_vars['gui']->cf_map; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cf_id'] => $this->_tpl_vars['cf_def']):
?>
   	<tr>
   	<td class="bold"><a href="lib/cfields/cfieldsEdit.php?do_action=edit&cfield_id=<?php echo $this->_tpl_vars['cf_def']['id']; ?>
"
   	                    title="<?php echo $this->_tpl_vars['labels']['manage_cfield']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['cf_def']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
   	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['cf_def']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
   	<td><?php echo $this->_tpl_vars['gui']->cf_types[$this->_tpl_vars['cf_def']['type']]; ?>
</td>
   	<td align="center"><?php if ($this->_tpl_vars['cf_def']['enable_on_design'] == 1): ?><img src="<?php echo $this->_tpl_vars['checked_img']; ?>
"><?php endif; ?> </td>
   	<td align="center"><?php if ($this->_tpl_vars['cf_def']['show_on_execution'] == 1): ?><img src="<?php echo $this->_tpl_vars['checked_img']; ?>
"><?php endif; ?> </td>
   	<td align="center"><?php if ($this->_tpl_vars['cf_def']['enable_on_execution'] == 1): ?><img src="<?php echo $this->_tpl_vars['checked_img']; ?>
"><?php endif; ?> </td>
   	<td align="center"><?php if ($this->_tpl_vars['cf_def']['enable_on_testplan_design'] == 1): ?><img src="<?php echo $this->_tpl_vars['checked_img']; ?>
"><?php endif; ?> </td>
   	<td><?php echo lang_get_smarty(array('s' => $this->_tpl_vars['cf_def']['node_description']), $this);?>
</td>
   	
   	</tr>
   	<?php endforeach; endif; unset($_from); ?>
  </table>
<?php endif; ?>   
  <div class="groupBtn">
    <span style="float: left">
    <form method="post" action="lib/cfields/cfieldsEdit.php?do_action=create">
      <input type="submit" name="create_cfield" value="<?php echo $this->_tpl_vars['labels']['btn_cfields_create']; ?>
" />
    </form>
    </span>
    <span>
	  <form method="post" action="<?php echo $this->_tpl_vars['exportCfieldsAction']; ?>
" name="cfieldsExport">
		  <input type="submit" name="export_cf" id="export_cf"
		         style="margin-left: 3px;" value="<?php echo $this->_tpl_vars['labels']['btn_export']; ?>
" />
		         
		  <input type="button" name="import_cf" id="import_cf" 
		         onclick="location='<?php echo $this->_tpl_vars['importCfieldsAction']; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_import']; ?>
" />
       
	  </form>
	  </span>
  </div>

</div>
</body>
</html>