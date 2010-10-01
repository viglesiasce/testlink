<?php /* Smarty version 2.6.26, created on 2010-09-27 14:44:26
         compiled from requirements/reqSpecView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/reqSpecView.tpl', 13, false),array('function', 'config_load', 'requirements/reqSpecView.tpl', 17, false),array('function', 'localize_timestamp', 'requirements/reqSpecView.tpl', 119, false),array('modifier', 'basename', 'requirements/reqSpecView.tpl', 16, false),array('modifier', 'replace', 'requirements/reqSpecView.tpl', 16, false),array('modifier', 'escape', 'requirements/reqSpecView.tpl', 71, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "type_not_configured,type,scope,req_total,by,title,
							            title_last_mod,title_created,no_records_found"), $this);?>


<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='requirements/reqSpecView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $this->assign('bn', ((is_array($_tmp='requirements/reqSpecView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp))); ?>
<?php $this->assign('buttons_template', ((is_array($_tmp='requirements/reqSpecView.tpl')) ? $this->_run_mod_handler('replace', true, $_tmp, ($this->_tpl_vars['bn']), "inc_btn_".($this->_tpl_vars['bn'])) : smarty_modifier_replace($_tmp, ($this->_tpl_vars['bn']), "inc_btn_".($this->_tpl_vars['bn'])))); ?>

<?php $this->assign('reqSpecID', $this->_tpl_vars['gui']->req_spec_id); ?>
<?php $this->assign('req_module', 'lib/requirements/'); ?>
<?php $this->assign('url_args', "reqEdit.php?doAction=create&amp;req_spec_id="); ?>
<?php $this->assign('req_edit_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqImport.php?req_spec_id="); ?>
<?php $this->assign('req_import_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqExport.php?req_spec_id="); ?>
<?php $this->assign('req_export_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqImport.php?scope=branch&req_spec_id="); ?>
<?php $this->assign('req_spec_import_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqExport.php?scope=branch&req_spec_id="); ?>
<?php $this->assign('req_spec_export_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqEdit.php?doAction=reorder&amp;req_spec_id="); ?>
<?php $this->assign('req_reorder_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqEdit.php?doAction=createTestCases&amp;req_spec_id="); ?>
<?php $this->assign('req_create_tc_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqSpecEdit.php?doAction=createChild&amp;reqParentID="); ?>
<?php $this->assign('req_spec_new_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqSpecEdit.php?doAction=copyRequirements&amp;req_spec_id="); ?>
<?php $this->assign('req_spec_copy_req_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>

<?php $this->assign('url_args', "reqSpecEdit.php?doAction=copy&amp;req_spec_id="); ?>
<?php $this->assign('req_spec_copy_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['reqSpecID'])); ?>


<?php echo lang_get_smarty(array('s' => 'warning_delete_req_spec','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
	/* All this stuff is needed for logic contained in inc_del_onclick.tpl */
	var del_action=fRoot+'<?php echo $this->_tpl_vars['req_module']; ?>
reqSpecEdit.php?doAction=doDelete&req_spec_id=';
</script>
</head>

<body <?php echo $this->_tpl_vars['body_onload']; ?>
>
<h1 class="title">
  <?php echo $this->_tpl_vars['toggle_direct_link_img']; ?>
 &nbsp;
	<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_requirementsCoverage','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>

<div class="workBack">
   <div class="direct_link" style='display:none'><a href="<?php echo $this->_tpl_vars['gui']->direct_link; ?>
" target="_blank"><?php echo $this->_tpl_vars['gui']->direct_link; ?>
</a></div>

<?php if ($this->_tpl_vars['gui']->req_spec['id']): ?>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['buttons_template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table class="simple" style="width: 90%">
	<tr>
		<th><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
	</tr>
	<tr>
	  <td><?php echo $this->_tpl_vars['labels']['type']; ?>
<?php echo @TITLE_SEP; ?>

	  <?php $this->assign('req_spec_type', $this->_tpl_vars['gui']->req_spec['type']); ?>
	  <?php if (isset ( $this->_tpl_vars['gui']->reqSpecTypeDomain[$this->_tpl_vars['req_spec_type']] )): ?>
	    <?php echo $this->_tpl_vars['gui']->reqSpecTypeDomain[$this->_tpl_vars['req_spec_type']]; ?>

	  <?php else: ?>
	    <?php echo $this->_tpl_vars['labels']['type_not_configured']; ?>
  
	  <?php endif; ?>
	  </td>
	</tr>
	<tr>
		<td>
			<fieldset class="x-fieldset x-form-label-left"><legend class="legend_container"><?php echo $this->_tpl_vars['labels']['scope']; ?>
</legend>
			<?php echo $this->_tpl_vars['gui']->req_spec['scope']; ?>

			</fieldset>
		</td>
	</tr>
  <?php if ($this->_tpl_vars['gui']->external_req_management && $this->_tpl_vars['gui']->req_spec['total_req'] != 0): ?>
  	<tr>
  		<td><?php echo $this->_tpl_vars['labels']['req_total']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo $this->_tpl_vars['gui']->req_spec['total_req']; ?>
</td>
   	</tr>
  <?php endif; ?>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>
  			<?php echo $this->_tpl_vars['gui']->cfields; ?>

  		</td>
	</tr>
	<tr class="time_stamp_creation">
		<td colspan="2">
	    	  <?php echo $this->_tpl_vars['labels']['title_created']; ?>
&nbsp;<?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['gui']->req_spec['creation_ts']), $this);?>
&nbsp;
	      	<?php echo $this->_tpl_vars['labels']['by']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->req_spec['author'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	  	</td>
	 </tr>
  <?php if ($this->_tpl_vars['gui']->req_spec['modifier'] != ""): ?>
    <tr class="time_stamp_creation">
    	<td colspan="2">
    		<?php echo $this->_tpl_vars['labels']['title_last_mod']; ?>
&nbsp;<?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['gui']->req_spec['modification_ts']), $this);?>

		  	&nbsp;<?php echo $this->_tpl_vars['labels']['by']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->req_spec['modifier'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

    	</td>
    </tr>
  <?php endif; ?>
</table>

<?php $this->assign('bDownloadOnly', true); ?>
<?php if ($this->_tpl_vars['gui']->grants->req_mgmt == 'yes'): ?>
	<?php $this->assign('bDownloadOnly', false); ?>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_attachments.tpl", 'smarty_include_vars' => array('attach_id' => $this->_tpl_vars['gui']->req_spec['id'],'attach_tableName' => 'req_specs','attach_attachmentInfos' => $this->_tpl_vars['gui']->attachments,'attach_downloadOnly' => $this->_tpl_vars['bDownloadOnly'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php else: ?>
	<?php echo $this->_tpl_vars['labels']['no_records_found']; ?>

<?php endif; ?>

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