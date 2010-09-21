<?php /* Smarty version 2.6.26, created on 2010-09-03 15:35:46
         compiled from platforms/platformsEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'platforms/platformsEdit.tpl', 12, false),array('function', 'config_load', 'platforms/platformsEdit.tpl', 42, false),array('modifier', 'basename', 'platforms/platformsEdit.tpl', 41, false),array('modifier', 'replace', 'platforms/platformsEdit.tpl', 41, false),array('modifier', 'escape', 'platforms/platformsEdit.tpl', 44, false),)), $this); ?>
<?php $this->assign('url_args', "lib/platforms/platformsEdit.php"); ?>
<?php $this->assign('platform_edit_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['url_args'])); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "warning,warning_empty_platform,show_event_history,
             th_platform,th_notes,btn_cancel"), $this);?>



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

var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_platform = "<?php echo $this->_tpl_vars['labels']['warning_empty_platform']; ?>
";
<?php echo '
function validateForm(f)
{
	if (isWhitespace(f.name.value))
  	{
    	alert_message(alert_box_title,warning_empty_platform);
      	selectField(f, \'name\');
      	return false;
  	}
	return true;
}
</script>
'; ?>

</head>

<body>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='platforms/platformsEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->action_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_feedback.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui']->canManage != ""): ?>
  <div class="workBack">
  
  <div>
	<?php if ($this->_tpl_vars['gui']->mgt_view_events == 'yes' && $this->_tpl_vars['gui']->platformID > 0): ?>
			<img style="margin-left:5px;" class="clickable" 
			     src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" 
			     onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['gui']->platformID; ?>
','platforms')" 
			     alt="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
" title="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
"/>
	<?php endif; ?>
  
  </div><br />

  	<form id="addPlatform" name="addPlatform" method="post" action="<?php echo $this->_tpl_vars['platform_edit_url']; ?>
"
 		      onsubmit="javascript:return validateForm(this);">

  	<table class="common" style="width:50%">
  		<tr>
  			<th><?php echo $this->_tpl_vars['labels']['th_platform']; ?>
</th>
  			<?php $this->assign('input_name', 'name'); ?>
  			<td><input type="text" name="<?php echo $this->_tpl_vars['input_name']; ?>
"
  			           size="<?php echo $this->_config[0]['vars']['PLATFORM_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PLATFORM_MAXLEN']; ?>
"
  				         value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
			  		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => ($this->_tpl_vars['input_name']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			  </td>
  		</tr>
  		<tr>
  			<th><?php echo $this->_tpl_vars['labels']['th_notes']; ?>
</th>
  			<td><textarea name="notes" rows="<?php echo $this->_config[0]['vars']['NOTES_ROWS']; ?>
" cols="<?php echo $this->_config[0]['vars']['NOTES_COLS']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->notes)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
  		</tr>
  	</table>
  	<div class="groupBtn">	
	  	<input type="hidden" name="doAction" value="" />
	    <input type="submit" id="submitButton" name="submitButton" value="<?php echo $this->_tpl_vars['gui']->submit_button_label; ?>
"
		         onclick="doAction.value='<?php echo $this->_tpl_vars['gui']->submit_button_action; ?>
'" />
	  	<input type="button" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
		         onclick="javascript:location.href=fRoot+'lib/platforms/platformsView.php'" />
  	</div>
  	</form>
  </div>
<?php endif; ?>

</body>
</html>