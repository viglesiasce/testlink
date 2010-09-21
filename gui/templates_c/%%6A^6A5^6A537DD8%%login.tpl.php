<?php /* Smarty version 2.6.26, created on 2010-09-03 15:28:23
         compiled from login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'login.tpl', 6, false),array('function', 'config_load', 'login.tpl', 7, false),array('modifier', 'escape', 'login.tpl', 34, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'login_name,password,btn_login,new_user_q,lost_password_q'), $this);?>

<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'login'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('title' => "TestLink - Login",'openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script language="JavaScript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/niftycube/niftycube.js" 
		type="text/javascript"></script>
<?php echo '
<script type="text/javascript">
window.onload=function()
{
	Nifty("div#login_div","big");
	Nifty("div.messages","normal");
 
	// set focus on login text box
	focusInputField(\'login\');
}
</script>
'; ?>


</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_login_title.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="forms" id="login_div">

	<form method="post" name="login_form" action="login.php">
    <?php if ($this->_tpl_vars['gui']->login_disabled == 0): ?>		
  		<div class="messages" style="width:100%;text-align:center;"><?php echo $this->_tpl_vars['gui']->note; ?>
</div>
		<input type="hidden" name="reqURI" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->reqURI)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"/>
  		<p class="label"><?php echo $this->_tpl_vars['labels']['login_name']; ?>
<br />
			<input type="text" name="tl_login" id="login" size="<?php echo $this->_config[0]['vars']['LOGIN_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['LOGIN_MAXLEN']; ?>
" />
		</p>
  		<p class="label"><?php echo $this->_tpl_vars['labels']['password']; ?>
<br />
			<input type="password" name="tl_password" size="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PASSWD_SIZE']; ?>
" />
		</p>
		<input type="submit" name="login_submit" value="<?php echo $this->_tpl_vars['labels']['btn_login']; ?>
" />
	<?php endif; ?>
	</form>
	
	<p>
	<?php if ($this->_tpl_vars['gui']->user_self_signup): ?>
		<a href="firstLogin.php"><?php echo $this->_tpl_vars['labels']['new_user_q']; ?>
</a><br />
	<?php endif; ?>
	
			
	<?php if ($this->_tpl_vars['gui']->external_password_mgmt == 0): ?>
		<a href="lostPassword.php"><?php echo $this->_tpl_vars['labels']['lost_password_q']; ?>
</a>
	</p>
	<?php endif; ?>
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_copyrightnotice.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php if ($this->_tpl_vars['gui']->securityNotes): ?>
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_msg_from_array.tpl", 'smarty_include_vars' => array('array_of_msg' => $this->_tpl_vars['gui']->securityNotes,'arg_css_class' => 'messages')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['tlCfg']->login_info != ""): ?>
		<div><?php echo $this->_tpl_vars['tlCfg']->login_info; ?>
</div>
	<?php endif; ?>

</div>
</body>
</html>