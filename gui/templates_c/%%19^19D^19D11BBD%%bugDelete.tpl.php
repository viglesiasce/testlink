<?php /* Smarty version 2.6.26, created on 2010-09-20 11:40:05
         compiled from execute/bugDelete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'execute/bugDelete.tpl', 9, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body onunload="dialog_onUnload(bug_dialog)" onload="dialog_onLoad(bug_dialog)">
<h1 class="title"><?php echo lang_get_smarty(array('s' => 'title_delete_bug'), $this);?>
</h1>
<p class='info'>
<?php echo $this->_tpl_vars['msg']; ?>

</p>

<div class="workBack">
		<div class="groupBtn" style="text-align:right">
			<input align="right" type="button" value="<?php echo lang_get_smarty(array('s' => 'btn_close'), $this);?>
" onclick="window.close()" />
		</div>
</div>

</body>
</html>