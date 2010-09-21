<?php /* Smarty version 2.6.26, created on 2010-09-20 09:53:55
         compiled from execute/bugAdd.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'execute/bugAdd.tpl', 10, false),array('modifier', 'replace', 'execute/bugAdd.tpl', 10, false),array('modifier', 'lower', 'execute/bugAdd.tpl', 25, false),array('modifier', 'capitalize', 'execute/bugAdd.tpl', 25, false),array('function', 'config_load', 'execute/bugAdd.tpl', 11, false),array('function', 'lang_get', 'execute/bugAdd.tpl', 15, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='execute/bugAdd.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<body onunload="dialog_onUnload(bug_dialog)" onload="dialog_onLoad(bug_dialog)">
<h1 class="title">
	<?php echo lang_get_smarty(array('s' => 'title_bug_add'), $this);?>
 
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_btsIntegration','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['msg'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="workBack">
	<form action="lib/execute/bugAdd.php" method="post">
	  	<p>
			<a style="font-weight:normal" target="_blank" href="<?php echo $this->_tpl_vars['bts_url']; ?>
">
			<?php echo lang_get_smarty(array('s' => 'link_bts_create_bug'), $this);?>
(<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->interface_bugs)) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
)</a>
		</p>	
	  	<p class="label"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gsmarty_interface_bugs'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo lang_get_smarty(array('s' => 'bug_id'), $this);?>

  	 		<input type="text" id="bug_id" name="bug_id" size="<?php echo $this->_config[0]['vars']['BUGID_SIZE']; ?>
" maxlength="<?php echo $this->_tpl_vars['bugIDMaxLength']; ?>
"/>
		</p>	
		<div class="groupBtn">
			<input type="submit" value="<?php echo lang_get_smarty(array('s' => 'btn_add_bug'), $this);?>
" onclick="return dialog_onSubmit(bug_dialog)" />
			<input type="button" value="<?php echo lang_get_smarty(array('s' => 'btn_close'), $this);?>
" onclick="window.close()" />
		</div>
	</form>
</div>

</body>
</html>