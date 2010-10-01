<?php /* Smarty version 2.6.26, created on 2010-09-27 13:22:21
         compiled from keywords/keywordsEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'keywords/keywordsEdit.tpl', 13, false),array('function', 'config_load', 'keywords/keywordsEdit.tpl', 31, false),array('modifier', 'basename', 'keywords/keywordsEdit.tpl', 30, false),array('modifier', 'replace', 'keywords/keywordsEdit.tpl', 30, false),array('modifier', 'escape', 'keywords/keywordsEdit.tpl', 33, false),)), $this); ?>
<?php $this->assign('url_args', "lib/keywords/keywordsEdit.php"); ?>
<?php $this->assign('keyword_edit_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['url_args'])); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('jsValidate' => 'yes','openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
'; ?>

var warning_empty_keyword = "<?php echo lang_get_smarty(array('s' => 'warning_empty_keyword'), $this);?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.keyword.value))
  {
      alert(warning_empty_keyword);
      selectField(f, \'keyword\');
      return false;
  }
  return true;
}
</script>
'; ?>

</head>

<body>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='keywords/keywordsEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['main_descr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php if ($this->_tpl_vars['canManage'] != ""): ?>
  <div class="workBack">
  
  <div class="action_descr"><?php echo ((is_array($_tmp=$this->_tpl_vars['action_descr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  	<?php if ($this->_tpl_vars['mgt_view_events'] == 'yes' && $this->_tpl_vars['keywordID'] > 0): ?>
			<img style="margin-left:5px;" class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['keywordID']; ?>
','keywords')" alt="<?php echo lang_get_smarty(array('s' => 'show_event_history'), $this);?>
" title="<?php echo lang_get_smarty(array('s' => 'show_event_history'), $this);?>
"/>
	<?php endif; ?>
  
  </div><br />
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['user_feedback'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  	<form name="addKey" method="post" action="<?php echo $this->_tpl_vars['keyword_edit_url']; ?>
"
 		      onSubmit="javascript:return validateForm(this);">

  	<table class="common" style="width:50%">
  		<tr>
  			<th><?php echo lang_get_smarty(array('s' => 'th_keyword'), $this);?>
</th>
  			<td><input type="text" name="keyword" 
  			           size="<?php echo $this->_config[0]['vars']['KEYWORD_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['KEYWORD_MAXLEN']; ?>
" 
  				         value="<?php echo ((is_array($_tmp=$this->_tpl_vars['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
			  		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'keyword')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			  </td>				
  		</tr>
  		<tr>
  			<th><?php echo lang_get_smarty(array('s' => 'th_notes'), $this);?>
</th>
  			<td><textarea name="notes" rows="<?php echo $this->_config[0]['vars']['NOTES_ROWS']; ?>
" cols="<?php echo $this->_config[0]['vars']['NOTES_COLS']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['notes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea></td>
  		</tr>
  	</table>
  	<div class="groupBtn">	
  	<input type="hidden" name="doAction" value="" />
    <input type="submit" name="create_req" value="<?php echo $this->_tpl_vars['submit_button_label']; ?>
"
	         onclick="doAction.value='<?php echo $this->_tpl_vars['submit_button_action']; ?>
'" />
  	<input type="button" value="<?php echo lang_get_smarty(array('s' => 'btn_cancel'), $this);?>
"
	         onclick="javascript:location.href=fRoot+'lib/keywords/keywordsView.php'" />
  	</div>
  	</form>
  </div>
<?php endif; ?>

</body>
</html>