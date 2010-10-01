<?php /* Smarty version 2.6.26, created on 2010-09-27 13:33:13
         compiled from testcases/tcEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcEdit.tpl', 16, false),array('function', 'config_load', 'testcases/tcEdit.tpl', 108, false),array('modifier', 'escape', 'testcases/tcEdit.tpl', 109, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "warning,warning_empty_tc_title,btn_save,
             version,title_edit_tc,cancel,warning_unsaved"), $this);?>


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
<script language="JavaScript" src="gui/javascript/OptionTransfer.js" type="text/javascript"></script>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>
<script language="javascript" src="gui/javascript/ext_extensions.js" type="text/javascript"></script>

<?php $this->assign('opt_cfg', $this->_tpl_vars['gui']->opt_cfg); ?>
<script type="text/javascript" language="JavaScript">
var <?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
 = new OptionTransfer("<?php echo $this->_tpl_vars['opt_cfg']->from->name; ?>
","<?php echo $this->_tpl_vars['opt_cfg']->to->name; ?>
");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveRemovedLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveRemovedRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedRight");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveAddedLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveAddedRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedRight");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveNewLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveNewRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newRight");
</script>

<script type="text/javascript">
var warning_empty_testcase_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_tc_title']; ?>
";
var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";

<?php echo '
function validateForm(the_form)
{
    var status_ok = true;
	
	if (isWhitespace(the_form.testcase_name.value))
	{
		alert_message(alert_box_title,warning_empty_testcase_name);
		selectField(the_form,\'testcase_name\');
		return false;
	}
	var cf_designTime = document.getElementById(\'cfields_design_time\');
	if (cf_designTime)
 	{
 		var cfields_container = cf_designTime.getElementsByTagName(\'input\');
 		var cfieldsChecks = validateCustomFields(cfields_container);
		if(!cfieldsChecks.status_ok)
	  	{
	    	var warning_msg = cfMessages[cfieldsChecks.msg_id];
	      	alert_message(alert_box_title,warning_msg.replace(/%s/, cfieldsChecks.cfield_label));
	      	return false;
		}

        // 20090421 - franciscom - BUGID 
 		cfields_container = cf_designTime.getElementsByTagName(\'textarea\');
 		cfieldsChecks = validateCustomFields(cfields_container);
		if(!cfieldsChecks.status_ok)
	  	{
	    	var warning_msg = cfMessages[cfieldsChecks.msg_id];
	      	alert_message(alert_box_title,warning_msg.replace(/%s/, cfieldsChecks.cfield_label));
	      	return false;
		}
	}
	show_modified_warning=false;
	return Ext.ux.requireSessionAndSubmit(the_form);
}

function checkDuplicateName() {
	Ext.Ajax.request({
		url: \'lib/ajax/checkDuplicateName.php\',
		method: \'GET\',
		params: {
			testcase_id: $(\'testcase_id\').value,
			name: $(\'testcase_name\').value
		},
		success: function(result, request) {
			var obj = Ext.util.JSON.decode(result.responseText);
			$("testcase_name_warning").innerHTML = obj[\'message\'];
		},
		failure: function (result, request) {
		}
	});
}

'; ?>

</script>
<?php if ($this->_tpl_vars['tlCfg']->gui->checkNotSaved): ?>
<script type="text/javascript">
var unload_msg = "<?php echo $this->_tpl_vars['labels']['warning_unsaved']; ?>
";
var tc_editor = "<?php echo $this->_tpl_vars['tlCfg']->gui->text_editor['all']['type']; ?>
";
</script>
<script src="gui/javascript/checkmodified.js" type="text/javascript"></script>
<?php endif; ?>
</head>

<body onLoad="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.init(document.forms[0]);focusInputField('testcase_name')">
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'tcNew'), $this);?>

<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_edit_tc']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tc['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php echo @TITLE_SEP_TYPE3; ?>
<?php echo $this->_tpl_vars['labels']['version']; ?>
 <?php echo $this->_tpl_vars['gui']->tc['version']; ?>
</h1> 

<div class="workBack" style="width:97%;">

<?php if ($this->_tpl_vars['gui']->has_been_executed): ?>
    <?php echo lang_get_smarty(array('s' => 'warning_editing_executed_tc','var' => 'warning_edit_msg'), $this);?>

    <div class="messages" align="center"><?php echo $this->_tpl_vars['warning_edit_msg']; ?>
</div>
<?php endif; ?>

<form method="post" action="lib/testcases/tcEdit.php" name="tc_edit"
      onSubmit="return validateForm(this);">

	<input type="hidden" name="testcase_id" id="testcase_id" value="<?php echo $this->_tpl_vars['gui']->tc['testcase_id']; ?>
" />
	<input type="hidden" name="tcversion_id" value="<?php echo $this->_tpl_vars['gui']->tc['id']; ?>
" />
	<input type="hidden" name="version" value="<?php echo $this->_tpl_vars['gui']->tc['version']; ?>
" />
	<input type="hidden" name="doAction" value="" />
  	<input type="hidden" name="show_mode" value="<?php echo $this->_tpl_vars['gui']->show_mode; ?>
" />

	<div class="groupBtn">
		<input id="do_update" type="submit" name="do_update" 
		       onclick="doAction.value='doUpdate'" value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
" />
		
		<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
" 
		       onclick="history.back();"/>
	</div>	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "testcases/tcEdit_New_viewer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<div class="groupBtn">
		<input id="do_update" type="submit" name="do_update" 
		       onclick="doAction.value='doUpdate'" value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
" />
		<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
" 
		       onclick="history.back();"/>
	</div>	
</form>

<script type="text/javascript" defer="1">
   	document.forms[0].testcase_name.focus();
</script>

<?php if (isset ( $this->_tpl_vars['gui']->refreshTree ) && $this->_tpl_vars['gui']->refreshTree): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

</div>
</body>
</html>