<?php /* Smarty version 2.6.26, created on 2010-09-24 17:53:37
         compiled from firstLogin.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'firstLogin.tpl', 8, false),array('function', 'config_load', 'firstLogin.tpl', 26, false),array('modifier', 'escape', 'firstLogin.tpl', 36, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('title' => "TestLink - New Account",'openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'login_name,password,password_again,first_name,last_name,e_mail,
             password_mgmt_is_external,btn_add_user_data,link_back_to_login'), $this);?>


<script language="JavaScript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/niftycube/niftycube.js" type="text/javascript"></script>
<?php echo '
<script type="text/javascript">
window.onload=function(){
 Nifty("div#login_div","big");
 Nifty("div.messages","normal");
 // set focus on login text box
 focusInputField(\'login\');
}
</script>
'; ?>

</head>

<body>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'login'), $this);?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_login_title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="forms" id="login_div">
<div class="messages" style="text-align:center;"><?php echo $this->_tpl_vars['gui']->message; ?>
</div>

<form method="post" action="firstLogin.php">

	<p class="label"><?php echo $this->_tpl_vars['labels']['login_name']; ?>
<br />
	<input type="text" name="login" id="login" 
	       size="<?php echo $this->_config[0]['vars']['LOGIN_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['LOGIN_MAXLEN']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->login)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/></p>

  <?php if ($this->_tpl_vars['external_password_mgmt'] == 0): ?>
  	<p class="label"><?php echo $this->_tpl_vars['labels']['password']; ?>
<br />
  	<input type="password" name="password" size="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" /></p>
  	<p class="label"><?php echo $this->_tpl_vars['labels']['password_again']; ?>
<br />
  	<input type="password" name="password2" size="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" /></p>
  <?php endif; ?>
  
	<p class="label"><?php echo $this->_tpl_vars['labels']['first_name']; ?>
<br />
	<input type="text" name="first" size="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->firstName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/></p>
	<p class="label"><?php echo $this->_tpl_vars['labels']['last_name']; ?>
<br />
	<input type="text" name="last" size="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['NAMES_SIZE']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->lastName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/></p>
	<p class="label"><?php echo $this->_tpl_vars['labels']['e_mail']; ?>
<br />
	<input type="text" name="email" size="<?php echo $this->_config[0]['vars']['EMAIL_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['EMAIL_MAXLEN']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->email)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/></p>

  <?php if ($this->_tpl_vars['gui']->external_password_mgmt == 1): ?>
     <p><?php echo $this->_tpl_vars['labels']['password_mgmt_is_external']; ?>
<p>
	<?php endif; ?>

	<br /><input type="submit" name="doEditUser" value="<?php echo $this->_tpl_vars['labels']['btn_add_user_data']; ?>
" />
</form>
<hr />
<p><a href="login.php"><?php echo $this->_tpl_vars['labels']['link_back_to_login']; ?>
</a></p>
</div>
</body>
</html>