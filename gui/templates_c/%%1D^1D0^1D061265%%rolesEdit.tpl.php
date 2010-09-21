<?php /* Smarty version 2.6.26, created on 2010-09-07 08:18:17
         compiled from usermanagement/rolesEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'usermanagement/rolesEdit.tpl', 28, false),array('function', 'config_load', 'usermanagement/rolesEdit.tpl', 65, false),array('modifier', 'basename', 'usermanagement/rolesEdit.tpl', 64, false),array('modifier', 'replace', 'usermanagement/rolesEdit.tpl', 64, false),array('modifier', 'escape', 'usermanagement/rolesEdit.tpl', 98, false),)), $this); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes','editorType' => $this->_tpl_vars['gui']->editorType)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_jsCheckboxes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
'; ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'btn_save,warning,warning_modify_role,warning_empty_role_name,th_rights,
             error_role_no_rights,caption_possible_affected_users,enter_role_notes,
             title_user_mgmt,caption_define_role,th_mgttc_rights,th_req_rights,
             th_product_rights,th_user_rights,th_kw_rights,th_cf_rights,th_system_rights,
             th_platform_rights,
             th_rolename,th_tp_rights,btn_cancel'), $this);?>


var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_modify_role = "<?php echo $this->_tpl_vars['labels']['warning_modify_role']; ?>
";
var warning_empty_role_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_role_name']; ?>
";
var warning_error_role_no_rights = "<?php echo $this->_tpl_vars['labels']['error_role_no_rights']; ?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.rolename.value))
  {
      alert_message(alert_box_title,warning_empty_role_name);
      selectField(f, \'rolename\');
      return false;
  }

  if( checkbox_count_checked(f.id) == 0)
  {
      alert_message(alert_box_title,warning_error_role_no_rights);
      return false;
  }

  return true;
}
</script>
'; ?>

</head>


<body>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='usermanagement/rolesEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>



<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_user_mgmt']; ?>
 - <?php echo $this->_tpl_vars['labels']['caption_define_role']; ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "usermanagement/tabsmenu.tpl", 'smarty_include_vars' => array('grants' => $this->_tpl_vars['gui']->grants,'highlight' => $this->_tpl_vars['gui']->highlight)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->userFeedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="workBack">

	<form name="rolesedit" id="rolesedit"
		method="post" action="lib/usermanagement/rolesEdit.php"
	<?php if ($this->_tpl_vars['tlCfg']->demoMode): ?>
		onsubmit="alert('<?php echo lang_get_smarty(array('s' => 'warn_demo'), $this);?>
'); return false;">
	<?php else: ?>
		<?php if ($this->_tpl_vars['gui']->grants->role_mgmt == 'yes'): ?>
		onSubmit="javascript:return validateForm(this);"
		<?php else: ?>
		onsubmit="return false"
		<?php endif; ?>
	<?php endif; ?>
	>
	<input type="hidden" name="roleid" value="<?php echo $this->_tpl_vars['gui']->role->dbID; ?>
" />
	<table class="common">
		<tr><th><?php echo $this->_tpl_vars['labels']['th_rolename']; ?>

			<?php if ($this->_tpl_vars['gui']->mgt_view_events == 'yes' && $this->_tpl_vars['gui']->role->dbID): ?>
				<img style="margin-left:5px;" class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['gui']->role->dbID; ?>
','roles')" alt="<?php echo lang_get_smarty(array('s' => 'show_event_history'), $this);?>
" title="<?php echo lang_get_smarty(array('s' => 'show_event_history'), $this);?>
"/>
			<?php endif; ?>
		</th></tr>
		<tr><td>
			   <input type="text" name="rolename"
			          size="<?php echo $this->_config[0]['vars']['ROLENAME_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['ROLENAME_MAXLEN']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->role->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
 				 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'rolename')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		    </td></tr>
		<tr><th><?php echo $this->_tpl_vars['labels']['th_rights']; ?>
</th></tr>
		<tr>
			<td>
				<table>
				<tr>
					<td><fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_tp_rights']; ?>
</legend>
							<?php $_from = $this->_tpl_vars['gui']->rightsCfg->tplan_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
							<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
/><?php echo $this->_tpl_vars['id']; ?>
<br />
							<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
					<td>
						<fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_mgttc_rights']; ?>
</legend>
						<?php $_from = $this->_tpl_vars['gui']->rightsCfg->tcase_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
						<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
						<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
					<td>
						<fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_req_rights']; ?>
</legend>
						<?php $_from = $this->_tpl_vars['gui']->rightsCfg->req_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
						<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
						<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
					<td>
						<fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_product_rights']; ?>
</legend>
						<?php $_from = $this->_tpl_vars['gui']->rightsCfg->tproject_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
						<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
						<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td><fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_user_rights']; ?>
</legend>
							<?php $_from = $this->_tpl_vars['gui']->rightsCfg->user_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
							<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
							<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
					<td><fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_kw_rights']; ?>
</legend>
							<?php $_from = $this->_tpl_vars['gui']->rightsCfg->kword_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
							<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
							<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
					<td><fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_cf_rights']; ?>
</legend>
							<?php $_from = $this->_tpl_vars['gui']->rightsCfg->cfield_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
							<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
							<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
					<td><fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_system_rights']; ?>
</legend>
							<?php $_from = $this->_tpl_vars['gui']->rightsCfg->system_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
							<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
							<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td><fieldset class="x-fieldset x-form-label-left"><legend ><?php echo $this->_tpl_vars['labels']['th_platform_rights']; ?>
</legend>
							<?php $_from = $this->_tpl_vars['gui']->rightsCfg->platform_mgmt; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['id']):
?>
							<input class="tl-input" type="checkbox" name="grant[<?php echo $this->_tpl_vars['k']; ?>
]" <?php echo $this->_tpl_vars['gui']->checkboxStatus[$this->_tpl_vars['k']]; ?>
 /><?php echo $this->_tpl_vars['id']; ?>
<br />
							<?php endforeach; endif; unset($_from); ?>
						</fieldset>
					</td>
				</tr>

			</table>
			</td>
		</tr>
		<tr><th><?php echo $this->_tpl_vars['labels']['enter_role_notes']; ?>
</th></tr>
		<tr>
			<td width="80%"><?php echo $this->_tpl_vars['gui']->notes; ?>
</td>
		</tr>

	</table>
	<div class="groupBtn">
	<?php if ($this->_tpl_vars['gui']->grants->role_mgmt == 'yes' && $this->_tpl_vars['gui']->role->dbID != @TL_ROLES_NO_RIGHTS): ?>

		<input type="hidden" name="doAction" value="<?php echo $this->_tpl_vars['gui']->operation; ?>
" />
		<input type="submit" name="role_mgmt" value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
"
		         <?php if ($this->_tpl_vars['gui']->role != null && $this->_tpl_vars['gui']->affectedUsers != null): ?> onClick="return modifyRoles_warning()"<?php endif; ?>
		/>
	<?php endif; ?>
		<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
			onclick="javascript: location.href=fRoot+'lib/usermanagement/rolesView.php';" />
	</div>
	<br />
	<?php if ($this->_tpl_vars['gui']->affectedUsers != null): ?>
		<table class="common" style="width:50%">
		<caption><?php echo $this->_tpl_vars['labels']['caption_possible_affected_users']; ?>
</caption>
		<?php $_from = $this->_tpl_vars['gui']->affectedUsers; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
		<tr>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		</table>
	<?php endif; ?>
	</form>

</div>

</body>
</html>