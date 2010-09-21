<?php /* Smarty version 2.6.26, created on 2010-09-03 15:29:17
         compiled from project/projectEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'project/projectEdit.tpl', 23, false),array('modifier', 'replace', 'project/projectEdit.tpl', 23, false),array('modifier', 'escape', 'project/projectEdit.tpl', 73, false),array('function', 'config_load', 'project/projectEdit.tpl', 24, false),array('function', 'lang_get', 'project/projectEdit.tpl', 30, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='project/projectEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $this->assign('managerURL', "lib/project/projectEdit.php"); ?>
<?php $this->assign('editAction', ($this->_tpl_vars['managerURL'])."?doAction=edit&tprojectID="); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'show_event_history,th_active,cancel,info_failed_loc_prod,invalid_query,
	create_from_existent_tproject,opt_no,caption_edit_tproject,caption_new_tproject,name,
	title_testproject_management,testproject_enable_priority, testproject_enable_automation,
    public,testproject_color,testproject_alt_color,testproject_enable_requirements,
    testproject_enable_inventory,testproject_features,testproject_description,
    testproject_prefix,availability,mandatory'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes','editorType' => $this->_tpl_vars['editorType'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui_cfg']->testproject_coloring != 'none'): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_jsPicker.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<script type="text/javascript">
	var alert_box_title = "<?php echo lang_get_smarty(array('s' => 'warning'), $this);?>
";
	var warning_empty_tcase_prefix = "<?php echo lang_get_smarty(array('s' => 'warning_empty_tcase_prefix'), $this);?>
";
	var warning_empty_tproject_name = "<?php echo lang_get_smarty(array('s' => 'warning_empty_tproject_name'), $this);?>
";
	<?php echo '
	function validateForm(f)
	{
	  if (isWhitespace(f.tprojectName.value))
	  {
	      alert_message(alert_box_title,warning_empty_tproject_name);
	      selectField(f, \'tprojectName\');
	      return false;
	  }
	  if (isWhitespace(f.tcasePrefix.value))
	  {
	      alert_message(alert_box_title,warning_empty_tcase_prefix);
	      selectField(f, \'tcasePrefix\');
	      return false;
	  }
	
	  return true;
	}
	'; ?>

	</script>
</head>

<body>
<h1 class="title">
	<?php echo ((is_array($_tmp=$this->_tpl_vars['main_descr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
  <?php echo $this->_tpl_vars['tlCfg']->gui_title_separator_1; ?>

	<?php echo ((is_array($_tmp=$this->_tpl_vars['caption'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php if ($this->_tpl_vars['mgt_view_events'] == 'yes' && $this->_tpl_vars['gui']->tprojectID): ?>
		<img style="margin-left:5px;" class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" 
			     onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['gui']->tprojectID; ?>
','testprojects')" 
			     alt="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
" title="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
"/>
	<?php endif; ?>
</h1>

<?php if ($this->_tpl_vars['user_feedback'] != ''): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['user_feedback'],'feedback_type' => $this->_tpl_vars['feedback_type'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<div class="workBack">
	<?php if ($this->_tpl_vars['gui']->found == 'yes'): ?>
		<div style="width:80%; margin: auto;">
		<form name="edit_testproject" id="edit_testproject"
		      method="post" action="<?php echo $this->_tpl_vars['managerURL']; ?>
"
		      onSubmit="javascript:return validateForm(this);">

		<table id="item_view" class="common" style="width:100%; padding:3px;">

			<?php if ($this->_tpl_vars['gui']->tprojectID == 0): ?>
		    <?php if ($this->_tpl_vars['gui']->testprojects != ''): ?>
	 		<tr>
	 			<td><?php echo $this->_tpl_vars['labels']['create_from_existent_tproject']; ?>
</td>
		 		<td>
			 		<select name="copy_from_tproject_id">
			 		<option value="0"><?php echo $this->_tpl_vars['labels']['opt_no']; ?>
</option>
			 		<?php $_from = $this->_tpl_vars['gui']->testprojects; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['testproject']):
?>
			 			<option value="<?php echo $this->_tpl_vars['testproject']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['testproject']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
			 		<?php endforeach; endif; unset($_from); ?>
			 		</select>
		 		</td>
	 		</tr>
		 	<?php endif; ?>
			<?php endif; ?>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['name']; ?>
 *</td>
				<td><input type="text" name="tprojectName" size="<?php echo $this->_config[0]['vars']['TESTPROJECT_NAME_SIZE']; ?>
"
						value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tprojectName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" maxlength="<?php echo $this->_config[0]['vars']['TESTPROJECT_NAME_MAXLEN']; ?>
" />
				  	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'tprojectName')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</td>
			</tr>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['testproject_prefix']; ?>
 *</td>
				<td><input type="text" name="tcasePrefix" size="<?php echo $this->_config[0]['vars']['TESTCASE_PREFIX_SIZE']; ?>
"
	  		           value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tcasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" maxlength="<?php echo $this->_config[0]['vars']['TESTCASE_PREFIX_MAXLEN']; ?>
" />
				  	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'tcasePrefix')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</td>
			</tr>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['testproject_description']; ?>
</td>
				<td style="width:80%"><?php echo $this->_tpl_vars['notes']; ?>
</td>
			</tr>
			<?php if ($this->_tpl_vars['gui_cfg']->testproject_coloring != 'none'): ?>
			<tr>
				<th style="background:none;"><?php echo $this->_tpl_vars['labels']['testproject_color']; ?>
</th>
				<td>
					<input type="text" name="color" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['color'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" maxlength="12" />
										<a href="javascript: TCP.popup(document.forms['edit_testproject'].elements['color'], '<?php echo $this->_tpl_vars['basehref']; ?>
third_party/color_picker/picker.html');">
						<img width="15" height="13" border="0" alt="<?php echo $this->_tpl_vars['labels']['testproject_alt_color']; ?>
"
						src="third_party/color_picker/img/sel.gif" />
					</a>
				</td>
			</tr>
			<?php endif; ?>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['testproject_features']; ?>
</td><td></td>
			</tr>
			<tr>
				<td></td><td>
				  	<input type="checkbox" name="optReq" 
				  			<?php if ($this->_tpl_vars['gui']->projectOptions->requirementsEnabled): ?> checked="checked"	<?php endif; ?> />
					<?php echo $this->_tpl_vars['labels']['testproject_enable_requirements']; ?>

				</td>
			</tr>
			<tr>
				<td></td><td>
					<input type="checkbox" name="optPriority" 
							<?php if ($this->_tpl_vars['gui']->projectOptions->testPriorityEnabled): ?> checked="checked"	<?php endif; ?> />
					<?php echo $this->_tpl_vars['labels']['testproject_enable_priority']; ?>

				</td>
			</tr>
			<tr>
				<td></td><td>
					<input type="checkbox" name="optAutomation" 
				  			<?php if ($this->_tpl_vars['gui']->projectOptions->automationEnabled): ?> checked="checked" <?php endif; ?> />
					<?php echo $this->_tpl_vars['labels']['testproject_enable_automation']; ?>

				</td>
			</tr>
			<tr>
				<td></td><td>
					<input type="checkbox" name="optInventory" 
				  			<?php if ($this->_tpl_vars['gui']->projectOptions->inventoryEnabled): ?> checked="checked" <?php endif; ?> />
					<?php echo $this->_tpl_vars['labels']['testproject_enable_inventory']; ?>

				</td>
			</tr>

			<tr>
				<td><?php echo $this->_tpl_vars['labels']['availability']; ?>
</td><td></td>
			</tr>
			<tr>
				<td></td><td>
			    	<input type="checkbox" name="active" <?php if ($this->_tpl_vars['gui']->active == 1): ?> checked="checked" <?php endif; ?> />
			    	<?php echo $this->_tpl_vars['labels']['th_active']; ?>

			    </td>
      		</tr>

			<input type="hidden" name="is_public" value="1" />

			<tr><td cols="2">
		    <?php if ($this->_tpl_vars['gui']->canManage == 'yes'): ?>
				<div class="groupBtn">
		    	    			<input type="hidden" name="doAction" value="<?php echo $this->_tpl_vars['doActionValue']; ?>
" />
				<input type="hidden" name="tprojectID" value="<?php echo $this->_tpl_vars['gui']->tprojectID; ?>
" />
			    <input type="submit" name="doActionButton" value="<?php echo $this->_tpl_vars['buttonValue']; ?>
" />
				<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
" onclick="javascript:history.back();"/>
				</div>
			<?php endif; ?>
			</td></tr>

		</table>
		</form>
		<p>* <?php echo $this->_tpl_vars['labels']['mandatory']; ?>
</p>
	</div>
	<?php else: ?>
		<p class="info">
		<?php if ($this->_tpl_vars['gui']->tprojectName != ''): ?>
			<?php echo $this->_tpl_vars['labels']['info_failed_loc_prod']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tprojectName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
!<br />
		<?php endif; ?>
		<?php echo $this->_tpl_vars['labels']['invalid_query']; ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['sqlResult'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
	<?php endif; ?>
</div>
</body>
</html>