<?php /* Smarty version 2.6.26, created on 2010-09-09 15:13:35
         compiled from requirements/reqSpecEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/reqSpecEdit.tpl', 13, false),array('function', 'config_load', 'requirements/reqSpecEdit.tpl', 17, false),array('function', 'html_options', 'requirements/reqSpecEdit.tpl', 118, false),array('modifier', 'basename', 'requirements/reqSpecEdit.tpl', 16, false),array('modifier', 'replace', 'requirements/reqSpecEdit.tpl', 16, false),array('modifier', 'escape', 'requirements/reqSpecEdit.tpl', 66, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'warning,warning_empty_req_spec_title,title,scope,req_total,type,
             doc_id,cancel,show_event_history,warning_empty_doc_id,warning_countreq_numeric'), $this);?>

<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='requirements/reqSpecEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


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

<script type="text/javascript">
	var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
	var warning_empty_req_spec_title = "<?php echo $this->_tpl_vars['labels']['warning_empty_req_spec_title']; ?>
";
	var warning_empty_doc_id = "<?php echo $this->_tpl_vars['labels']['warning_empty_doc_id']; ?>
";
	var warning_countreq_numeric = "<?php echo $this->_tpl_vars['labels']['warning_countreq_numeric']; ?>
";
	<?php echo '
	function validateForm(f)
	{
   
		if (isWhitespace(f.doc_id.value)) 
  	{
    	alert_message(alert_box_title,warning_empty_doc_id);
			selectField(f, \'doc_id\');
			return false;
		}

		if (isWhitespace(f.title.value))
		{
			alert_message(alert_box_title,warning_empty_req_spec_title);
			selectField(f,\'title\');
			return false;
		}

		'; ?>

		<?php if ($this->_tpl_vars['gui']->external_req_management): ?>
		<?php echo '
		if (isNaN(parseInt(f.countReq.value)))
		{
			alert_message(alert_box_title,warning_countreq_numeric);
			selectField(f,\'countReq\');
			return false;
		}
		'; ?>

		<?php endif; ?>
		<?php echo '
		
		return true;
	}
	'; ?>

	</script>
</head>

<body>
<h1 class="title">
	<?php if ($this->_tpl_vars['gui']->action_descr != ''): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->action_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_requirementsCoverage','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="workBack">
	<form name="reqSpecEdit" id="reqSpecEdit" method="post" onSubmit="javascript:return validateForm(this);">
	    <input type="hidden" name="req_spec_id" value="<?php echo $this->_tpl_vars['gui']->req_spec_id; ?>
" />

  	<div class="labelHolder"><label for="doc_id"><?php echo $this->_tpl_vars['labels']['doc_id']; ?>
</label>
  	</div>
	  <div><input type="text" name="doc_id" id="doc_id"
  		        size="<?php echo $this->_config[0]['vars']['REQSPEC_DOCID_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['REQSPEC_DOCID_MAXLEN']; ?>
"
  		        value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->req_spec_doc_id)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'doc_id')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	</div>
	
		<div class="labelHolder"><label for="req_spec_title"><?php echo $this->_tpl_vars['labels']['title']; ?>
</label>
	   		<?php if ($this->_tpl_vars['mgt_view_events'] == 'yes' && $this->_tpl_vars['gui']->req_spec_id): ?>
				<img style="margin-left:5px;" class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" 
				     onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['gui']->req_spec_id; ?>
','req_specs')" 
				     alt="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
" title="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
"/>
			<?php endif; ?>
	   	</div>
	   	<div>
		    <input type="text" id="title" name="title"
		           size="<?php echo $this->_config[0]['vars']['REQ_SPEC_TITLE_SIZE']; ?>
"
				   maxlength="<?php echo $this->_config[0]['vars']['REQ_SPEC_TITLE_MAXLEN']; ?>
"
		           value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->req_spec_title)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
		  	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'req_spec_title')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	   	</div>
	   	<br />
		<div class="labelHolder">
			<label for="scope"><?php echo $this->_tpl_vars['labels']['scope']; ?>
</label>
		</div>
		<div>
			<?php echo $this->_tpl_vars['gui']->scope; ?>

	   	</div>
	   	
	   	<?php if ($this->_tpl_vars['gui']->external_req_management): ?>
	   	<br />
	   	<div class="labelHolder"><label for="countReq"><?php echo $this->_tpl_vars['labels']['req_total']; ?>
</label>
			<input type="text" id="countReq" name="countReq" size="<?php echo $this->_config[0]['vars']['REQ_COUNTER_SIZE']; ?>
" 
			      maxlength="<?php echo $this->_config[0]['vars']['REQ_COUNTER_MAXLEN']; ?>
" value="<?php echo $this->_tpl_vars['gui']->total_req_counter; ?>
" />
		</div>
		<?php endif; ?>
		
	  <br />
		
  	<div class="labelHolder"> <label for="reqSpecType"><?php echo $this->_tpl_vars['labels']['type']; ?>
</label>
     	<select name="reqSpecType">
  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->reqSpecTypeDomain,'selected' => $this->_tpl_vars['gui']->req_spec['type']), $this);?>

  		</select>
  	</div>

		
	    <br />
		<?php if ($this->_tpl_vars['gui']->cfields != ""): ?>
			<div class="custom_field_container">
		    	<?php echo $this->_tpl_vars['gui']->cfields; ?>

		    </div>
		<br />
		<?php endif; ?>
	
		<div class="groupBtn">
			<input type="hidden" name="doAction" value="" />
			<input type="submit" name="createSRS" value="<?php echo $this->_tpl_vars['gui']->submit_button_label; ?>
"
		       onclick="doAction.value='<?php echo $this->_tpl_vars['gui']->operation; ?>
'" />
			<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
" 
				onclick="javascript: history.back();"/>
		</div>
	</form>
</div>

<script type="text/javascript" defer="1">
   	document.forms[0].doc_id.focus()
</script>

<?php if (isset ( $this->_tpl_vars['gui']->refreshTree ) && $this->_tpl_vars['gui']->refreshTree): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

</body>
</html>