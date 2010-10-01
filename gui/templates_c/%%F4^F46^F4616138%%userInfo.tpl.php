<?php /* Smarty version 2.6.26, created on 2010-09-28 13:27:12
         compiled from usermanagement/userInfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'usermanagement/userInfo.tpl', 8, false),array('function', 'lang_get', 'usermanagement/userInfo.tpl', 10, false),array('function', 'html_options', 'usermanagement/userInfo.tpl', 159, false),array('function', 'localize_timestamp', 'usermanagement/userInfo.tpl', 223, false),array('modifier', 'escape', 'usermanagement/userInfo.tpl', 136, false),)), $this); ?>
<?php $this->assign('cfg_section', 'login'); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => 'title_account_settings,warning_empty_pwd,warning_different_pwd,never_logged,
             warning_enter_less1,warning_enter_at_least1,warning_enter_at_least2,
             warning_enter_less2,th_login,th_first_name,th_last_name,
             th_email,th_locale,btn_save,th_old_passwd,audit_login_history,none,
             th_new_passwd,th_new_passwd_again,btn_change_passwd,audit_last_failed_logins,
             your_password_is_external,user_api_key,btn_apikey_generate,empty_email_address,
             audit_last_succesful_logins,warning,warning_empty_first_name,no_good_email_address,
             warning_empty_last_name,passwd_dont_match,empty_old_passwd,show_event_history'), $this);?>


<?php $this->assign('action_mgmt', "lib/usermanagement/userInfo.php"); ?>

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


<?php echo '
<script type="text/javascript">
'; ?>

var warning_empty_pwd = "<?php echo $this->_tpl_vars['labels']['warning_empty_pwd']; ?>
";
var warning_different_pwd = "<?php echo $this->_tpl_vars['labels']['warning_different_pwd']; ?>
";
var warning_enter_less1 = "<?php echo $this->_tpl_vars['labels']['warning_enter_less1']; ?>
";
var warning_enter_at_least1 = "<?php echo $this->_tpl_vars['labels']['warning_enter_at_least1']; ?>
";
var warning_enter_at_least2 = "<?php echo $this->_tpl_vars['labels']['warning_enter_at_least2']; ?>
";
var warning_enter_less2 = "<?php echo $this->_tpl_vars['labels']['warning_enter_less2']; ?>
";
var names_max_len=<?php echo $this->_config[0]['vars']['NAMES_MAXLEN']; ?>
;
var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_first_name']; ?>
";
var warning_empty_last = "<?php echo $this->_tpl_vars['labels']['warning_empty_last_name']; ?>
";
var warning_passwd_dont_match = "<?php echo $this->_tpl_vars['labels']['passwd_dont_match']; ?>
";
var warning_empty_old_password = "<?php echo $this->_tpl_vars['labels']['empty_old_passwd']; ?>
";
var warning_empty_email_address = "<?php echo $this->_tpl_vars['labels']['empty_email_address']; ?>
";
var warning_no_good_email_address = "<?php echo $this->_tpl_vars['labels']['no_good_email_address']; ?>
"; 

<?php echo '
function validatePersonalData(f)
{
  var email_warning;
  var show_email_warning=false;
  
  if (isWhitespace(f.firstName.value))
  {
      alert_message(alert_box_title,warning_empty_name);
      selectField(f, \'firstName\');
      return false;
  }

  if (isWhitespace(f.lastName.value))
  {
      alert_message(alert_box_title,warning_empty_last);
      selectField(f, \'lastName\');
      return false;
  }

  if (isWhitespace(f.emailAddress.value))
  {
      show_email_warning=true;
      email_warning=warning_empty_email_address;
  }
  else 
  { 
      if (!/\\w{1,}[@][\\w\\-]{1,}([.]([\\w\\-]{1,})){1,3}$/.test(f.emailAddress.value))
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

function checkPasswords(oldp,newp,newp_check)
{

    var oldvalue=document.getElementById(oldp).value;

    if (isWhitespace(oldvalue))
    {
        alert_message(alert_box_title,warning_empty_old_password);
        return false;
    }

    if( !validatePassword(newp,newp_check) )
    {
      alert_message(alert_box_title,warning_passwd_dont_match);
      return false;
    }
    return true;
}


</script>
'; ?>

</head>

<body>

<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_account_settings']; ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['user_feedback'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="workBack">


<h2><?php echo lang_get_smarty(array('s' => 'title_personal_data'), $this);?>
</h2>
<form method="post" action="<?php echo $this->_tpl_vars['action_mgmt']; ?>
"
	<?php if ($this->_tpl_vars['tlCfg']->demoMode): ?>
		onsubmit="alert('<?php echo lang_get_smarty(array('s' => 'warn_demo'), $this);?>
'); return false;">
	<?php else: ?>
		onsubmit="return validatePersonalData(this)">
	<?php endif; ?>
	<input type="hidden" name="doAction" value="editUser" />
	<table class="common">
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_login']; ?>
</th>
			<td><?php echo $this->_tpl_vars['user']->login; ?>
</td>
		</tr>
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_first_name']; ?>
</th>
			<td><input type="text" name="firstName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->firstName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
			           size="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['NAMES_MAXLEN']; ?>
" />
			  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'firstName')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_last_name']; ?>
</th>
			<td><input type="text" name="lastName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->lastName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
			           size="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['NAMES_MAXLEN']; ?>
" />
						  	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'lastName')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_email']; ?>
</th>
			<td><input type="text" name="emailAddress" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->emailAddress)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
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
			<th><?php echo $this->_tpl_vars['labels']['th_locale']; ?>
</th>
			<td>
				<select name="locale">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['optLocale'],'selected' => $this->_tpl_vars['user']->locale), $this);?>

				</select>
			</td>
		</tr>
	</table>
	<div class="groupBtn">
		<input type="submit" value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
" />
	</div>
</form>

<hr />
<h2><?php echo lang_get_smarty(array('s' => 'title_personal_passwd'), $this);?>
</h2>
<?php if ($this->_tpl_vars['external_password_mgmt'] == 0): ?>
	<form name="changePass" method="post" action="<?php echo $this->_tpl_vars['action_mgmt']; ?>
"
		<?php if ($this->_tpl_vars['tlCfg']->demoMode): ?>
		onsubmit="alert('<?php echo lang_get_smarty(array('s' => 'warn_demo'), $this);?>
'); return false;">
		<?php else: ?>
		onsubmit="return checkPasswords('oldpassword','newpassword','newpassword_check');">
		<?php endif; ?>
		<input type="hidden" name="doAction" value="changePassword" />
		<table class="common">
			<tr><th><?php echo $this->_tpl_vars['labels']['th_old_passwd']; ?>
</th>
				<td><input type="password" name="oldpassword"  id="oldpassword"
				           size="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" /></td></tr>
			<tr><th><?php echo $this->_tpl_vars['labels']['th_new_passwd']; ?>
</th>
				<td><input type="password" name="newpassword" id="newpassword"
				           size="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" /></td></tr>
			<tr><th><?php echo $this->_tpl_vars['labels']['th_new_passwd_again']; ?>
</th>
				<td><input type="password" name="newpassword_check" id="newpassword_check"
				           size="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" /></td></tr>
		</table>
		<div class="groupBtn">
			<input type="submit" value="<?php echo $this->_tpl_vars['labels']['btn_change_passwd']; ?>
" />
		</div>
	</form>
<?php else: ?>
   <p><?php echo $this->_tpl_vars['labels']['your_password_is_external']; ?>
<p>
<?php endif; ?>

<?php if ($this->_tpl_vars['tlCfg']->api->enabled): ?>
<hr />
<h2><?php echo lang_get_smarty(array('s' => 'title_api_interface'), $this);?>
</h2>
<div>
	<form name="genApi" method="post" action="<?php echo $this->_tpl_vars['action_mgmt']; ?>
">
		<input type="hidden" name="doAction" value="genAPIKey" />
		<p><?php echo $this->_tpl_vars['labels']['user_api_key']; ?>
 = <?php echo ((is_array($_tmp=$this->_tpl_vars['user']->userApiKey)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
		<div class="groupBtn">
			<input type="submit" value="<?php echo $this->_tpl_vars['labels']['btn_apikey_generate']; ?>
" />
		</div>
	</form>
</div>
<?php endif; ?>


<hr />
<h2><?php echo $this->_tpl_vars['labels']['audit_login_history']; ?>

	<?php if ($this->_tpl_vars['mgt_view_events'] == 'yes'): ?>
	<img style="margin-left:5px;" class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['user']->dbID; ?>
','users')" alt="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
" title="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
"/>
</h2>
<?php endif; ?>
<div>
	<h3><?php echo $this->_tpl_vars['labels']['audit_last_succesful_logins']; ?>
</h3>
	<?php if ($this->_tpl_vars['loginHistory']->ok != ''): ?>
	<?php $_from = $this->_tpl_vars['loginHistory']->ok; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['event']):
?>
	<span><?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['event']->timestamp), $this);?>
</span>
	<span><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->description)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
	<br/>
	<?php endforeach; endif; unset($_from); ?>
	<?php else: ?>
	  <?php echo $this->_tpl_vars['labels']['never_logged']; ?>

	<?php endif; ?>
</div>
  <?php if ($this->_tpl_vars['loginHistory']->failed != ''): ?>
	<div>
	  <h3><?php echo $this->_tpl_vars['labels']['audit_last_failed_logins']; ?>
</h3>
	  <?php $_from = $this->_tpl_vars['loginHistory']->failed; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['event']):
?>
	  <span><?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['event']->timestamp), $this);?>
</span>
	  <span><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->description)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
	  <br/>
	  <?php endforeach; endif; unset($_from); ?>
	</div>
  <?php endif; ?>

</div>
<?php if ($this->_tpl_vars['update_title_bar'] == 1): ?>
<?php echo '
<script type="text/javascript">
	parent.titlebar.location.reload();
</script>
'; ?>

<?php endif; ?>
</body>
</html>