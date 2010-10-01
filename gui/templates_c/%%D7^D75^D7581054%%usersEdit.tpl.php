<?php /* Smarty version 2.6.26, created on 2010-09-28 10:20:16
         compiled from usermanagement/usersEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'usermanagement/usersEdit.tpl', 9, false),array('function', 'lang_get', 'usermanagement/usersEdit.tpl', 14, false),array('function', 'html_options', 'usermanagement/usersEdit.tpl', 235, false),array('modifier', 'escape', 'usermanagement/usersEdit.tpl', 170, false),array('modifier', 'count_characters', 'usermanagement/usersEdit.tpl', 230, false),)), $this); ?>

<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'login'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('jsValidate' => 'yes','openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'warning_empty_login,warning_empty_first_name,warning,btn_save,
             warning_empty_pwd,warning_different_pwd,empty_email_address,
             title_user_mgmt,title_account_settings,menu_edit_user,menu_new_user,
             menu_view_users,menu_define_roles,menu_view_roles,no_good_email_address,
             menu_assign_testproject_roles,warning_empty_last_name,
             menu_assign_testplan_roles,caption_user_details,show_event_history,
             th_login,th_first_name,th_last_name,th_password,th_email,
             th_role,th_locale,th_active,password_mgmt_is_external,
             btn_upd_user_data,btn_add,btn_cancel,button_reset_password'), $this);?>


<?php echo '
<script type="text/javascript">
'; ?>

var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_login      = "<?php echo $this->_tpl_vars['labels']['warning_empty_login']; ?>
";
var warning_empty_first_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_first_name']; ?>
";
var warning_empty_last_name  = "<?php echo $this->_tpl_vars['labels']['warning_empty_last_name']; ?>
";
var warning_empty_pwd = "<?php echo $this->_tpl_vars['labels']['warning_empty_pwd']; ?>
";
var warning_different_pwd = "<?php echo $this->_tpl_vars['labels']['warning_different_pwd']; ?>
";
var warning_empty_email_address = "<?php echo $this->_tpl_vars['labels']['empty_email_address']; ?>
";
var warning_no_good_email_address = "<?php echo $this->_tpl_vars['labels']['no_good_email_address']; ?>
"; 


<?php echo '
function validateForm(f,check_password)
{
  '; ?>

   var email_check = <?php echo $this->_tpl_vars['tlCfg']->validation_cfg->user_email_valid_regex_js; ?>
;

  <?php echo '
  var email_warning;
  var show_email_warning=false;

  if (isWhitespace(f.login.value))
  {
      alert_message(alert_box_title,warning_empty_login);
      selectField(f, \'login\');
      return false;
  }

  if (isWhitespace(f.firstName.value))
  {
      alert_message(alert_box_title,warning_empty_first_name);
      selectField(f, \'firstName\');
      return false;
  }

  if (isWhitespace(f.lastName.value))
  {
      alert_message(alert_box_title,warning_empty_last_name);
      selectField(f, \'lastName\');
      return false;
  }

  if( check_password )
  {
    if (isWhitespace(f.password.value))
    {
        alert_message(alert_box_title,warning_empty_pwd);
        selectField(f, \'password\');
        return false;
    }
  }

  if (isWhitespace(f.emailAddress.value))
  {
      show_email_warning=true;
      email_warning=warning_empty_email_address;
  }
  else 
  { 
      if(!email_check.test(f.emailAddress.value))
      {
          show_email_warning=true;
          email_warning=warning_no_good_email_address;
      }
  }

  if( show_email_warning )
  {
      alert_message(alert_box_title,email_warning);
      selectField(f, \'emailAddress\');
      return false;
  }

  return true;
}
</script>
'; ?>

<?php $this->assign('ext_location', @TL_EXTJS_RELATIVE_PATH); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/css/ext-all.css" />
</head>

<body>

<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_user_mgmt']; ?>
 - <?php echo $this->_tpl_vars['labels']['title_account_settings']; ?>
 </h1>

<?php $this->assign('user_id', ''); ?>
<?php $this->assign('user_login', ''); ?>
<?php $this->assign('user_login_readonly', ''); ?>
<?php $this->assign('reset_password_enabled', 0); ?>
<?php $this->assign('show_password_field', 1); ?>


<?php if ($this->_tpl_vars['operation'] == 'doCreate'): ?>
   <?php $this->assign('check_password', 1); ?>
   <?php if ($this->_tpl_vars['userData'] != null): ?>
       <?php $this->assign('user_login', $this->_tpl_vars['userData']->login); ?>
   <?php endif; ?>
<?php else: ?>
   <?php $this->assign('check_password', 0); ?>
   <?php $this->assign('user_id', $this->_tpl_vars['userData']->dbID); ?>
   <?php $this->assign('user_login', $this->_tpl_vars['userData']->login); ?>
   <?php $this->assign('user_login_readonly', 'readonly="readonly" disabled="disabled"'); ?>
   <?php $this->assign('reset_password_enabled', 1); ?>
   <?php $this->assign('show_password_field', 0); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['external_password_mgmt'] == 1): ?>
  <?php $this->assign('check_password', 0); ?>
  <?php $this->assign('reset_password_enabled', 0); ?>
  <?php $this->assign('show_password_field', 0); ?>
<?php endif; ?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "usermanagement/tabsmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['result'],'item' => 'user','action' => ($this->_tpl_vars['action']),'user_feedback' => $this->_tpl_vars['user_feedback'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="workBack">
<form method="post" action="lib/usermanagement/usersEdit.php" class="x-form" name="useredit" 
	<?php if ($this->_tpl_vars['tlCfg']->demoMode): ?>
		onsubmit="alert('<?php echo lang_get_smarty(array('s' => 'warn_demo'), $this);?>
'); return false;">
	<?php else: ?>
		onSubmit="javascript:return validateForm(this,<?php echo $this->_tpl_vars['check_password']; ?>
);">
	<?php endif; ?>

	<input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['user_id']; ?>
" />
	<input type="hidden" id="user_login" name="user_login" value="<?php echo $this->_tpl_vars['user_login']; ?>
" />

  <fieldset class="x-fieldset x-form-label-left" style="width:50%;">
  <legend class="x-fieldset-header x-unselectable" style="-moz-user-select: none;">
  <?php echo $this->_tpl_vars['labels']['caption_user_details']; ?>

  <?php if ($this->_tpl_vars['mgt_view_events'] == 'yes' && $this->_tpl_vars['user_id']): ?>
	<img style="margin-left:5px;" class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" 
	     onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['user_id']; ?>
','users')"
	     alt="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
" title="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
"/>
	<?php endif; ?>
  </legend>
	<table class="common">
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_login']; ?>
</th>
			<td><input type="text" name="login" size="<?php echo $this->_config[0]['vars']['LOGIN_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['LOGIN_MAXLEN']; ?>
"
			<?php echo $this->_tpl_vars['user_login_readonly']; ?>
 value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userData']->login)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'login')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			 </td>
		</tr>
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_first_name']; ?>
</th>
			<td><input type="text" name="firstName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userData']->firstName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
			     size="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" />
			     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'firstName')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td></tr>
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_last_name']; ?>
</th>
			<td><input type="text" name="lastName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userData']->lastName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
			     size="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" />
 			     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'lastName')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			     </td>
		</tr>

		<?php if ($this->_tpl_vars['show_password_field']): ?>
		     <tr>
			    <?php if ($this->_tpl_vars['external_password_mgmt'] == 0): ?>
 			      <th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_password']; ?>
</th>
		        <td><input type="password" id="password" name="password"
		                   size="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
"
		                   maxlength="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" />
		            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'password')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		        </td>
		      <?php endif; ?>
		     </tr>
   <?php endif; ?>


		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_email']; ?>
</th>
			<td><input type="text" id="email" name="emailAddress" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userData']->emailAddress)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
			           size="<?php echo $this->_config[0]['vars']['EMAIL_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['EMAIL_MAXLEN']; ?>
" />
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'emailAddress')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_role']; ?>
</th>
			<td>
		  	<?php $this->assign('selected_role', $this->_tpl_vars['userData']->globalRoleID); ?>
			  <?php if ($this->_tpl_vars['userData']->globalRoleID == 0): ?>
 			      <?php $this->assign('selected_role', $this->_tpl_vars['tlCfg']->default_roleid); ?>
			  <?php endif; ?>
				<select name="rights_id">
				<?php $_from = $this->_tpl_vars['optRights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role_id'] => $this->_tpl_vars['role']):
?>
		        <option value="<?php echo $this->_tpl_vars['role_id']; ?>
" <?php if ($this->_tpl_vars['role_id'] == $this->_tpl_vars['selected_role']): ?> selected="selected" <?php endif; ?>>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['role']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>

		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_locale']; ?>
</th>
			<td>
        <?php $this->assign('selected_locale', $this->_tpl_vars['userData']->locale); ?>
        <?php if (((is_array($_tmp=$this->_tpl_vars['userData']->locale)) ? $this->_run_mod_handler('count_characters', true, $_tmp) : smarty_modifier_count_characters($_tmp)) == 0): ?>
           <?php $this->assign('selected_locale', $this->_tpl_vars['locale']); ?>
        <?php endif; ?>

				<select name="locale">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optLocale'],'selected' => $this->_tpl_vars['selected_locale']), $this);?>

				</select>
			</td>
		</tr>

		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['th_active']; ?>
</th>
			<td>
			  <input type="checkbox"  name="user_is_active" <?php if ($this->_tpl_vars['userData']->isActive == 1): ?> checked <?php endif; ?> />
			</td>
		</tr>

    <?php if ($this->_tpl_vars['external_password_mgmt'] == 1): ?>
      <td><?php echo $this->_tpl_vars['labels']['password_mgmt_is_external']; ?>
</td>
    <?php endif; ?>

	</table>

	<div class="groupBtn">
	<input type="hidden" name="doAction" id="doActionUserEdit" value="<?php echo $this->_tpl_vars['operation']; ?>
" />
	<input type="submit" name="do_update"   value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
" />
	<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
			onclick="javascript: location.href=fRoot+'lib/usermanagement/usersView.php';" />

	</div>
</fieldset>
</form>

<?php if ($this->_tpl_vars['reset_password_enabled']): ?>
<br />
<form method="post" action="lib/usermanagement/usersEdit.php" name="user_reset_password"
	<?php if ($this->_tpl_vars['tlCfg']->demoMode): ?>
		onsubmit="alert('<?php echo lang_get_smarty(array('s' => 'warn_demo'), $this);?>
'); return false;"
	<?php endif; ?>>
	<input type="hidden" name="doAction" id="doActionResetPassword" value="resetPassword" />
	<input type="hidden" name="user_id" value="<?php echo $this->_tpl_vars['user_id']; ?>
" />
	<input type="submit" id="do_reset_password" name="do_reset_password" value="<?php echo $this->_tpl_vars['labels']['button_reset_password']; ?>
" />
</form>
<?php endif; ?>

</div>

</body>
</html>