<?php /* Smarty version 2.6.26, created on 2010-09-27 14:03:55
         compiled from testcases/tcNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'testcases/tcNew.tpl', 13, false),array('modifier', 'replace', 'testcases/tcNew.tpl', 13, false),array('modifier', 'escape', 'testcases/tcNew.tpl', 62, false),array('function', 'config_load', 'testcases/tcNew.tpl', 14, false),array('function', 'lang_get', 'testcases/tcNew.tpl', 16, false),)), $this); ?>

<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='testcases/tcNew.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => 'btn_create,cancel,warning,title_new_tc,
                          warning_empty_tc_title'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes')));
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

<?php $this->assign('opt_cfg', $this->_tpl_vars['gui']->opt_cfg); ?>
<script language="JavaScript" type="text/javascript">
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

<?php echo '
<script type="text/javascript">
'; ?>

var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_testcase_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_tc_title']; ?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.testcase_name.value)) 
  {
      alert_message(alert_box_title,warning_empty_testcase_name);
      selectField(f, \'testcase_name\');
      return false;
  }
  return true;
}
</script>
'; ?>


</head>

<body onLoad="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.init(document.forms[0]);focusInputField('testcase_name')">

<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['gui']->sqlResult,'item' => 'testcase','name' => $this->_tpl_vars['gui']->name,'user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form method="post" action="lib/testcases/tcEdit.php?containerID=<?php echo $this->_tpl_vars['gui']->containerID; ?>
"
      name="tc_new" id="tc_new"
      onSubmit="javascript:return validateForm(this);">


  <?php if ($this->_tpl_vars['gui']->steps != ''): ?>
  <table class="simple">
  	<tr>
  		<th width="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['labels']['step_number']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['step_details']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['expected_results']; ?>
</th>
  		<th width="25"><?php echo $this->_tpl_vars['labels']['execution_type_short_descr']; ?>
</th>
  	</tr>
  
   	<?php $_from = $this->_tpl_vars['gui']->steps; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['step_info']):
?>
  	<tr>
  		<td style="text-align:righ;"><?php echo $this->_tpl_vars['step_info']['step_number']; ?>
</td>
  		<td ><?php echo $this->_tpl_vars['step_info']['actions']; ?>
</td>
  		<td ><?php echo $this->_tpl_vars['step_info']['expected_results']; ?>
</td>
  		<td><?php echo $this->_tpl_vars['gui']->execution_types[$this->_tpl_vars['step_info']['execution_type']]; ?>
</td>
  	</tr>
    <?php endforeach; endif; unset($_from); ?>	
  </table>	
  <p>
  <hr>
  <?php endif; ?>



	<div class="groupBtn">
	    			<input type="hidden" id="do_create"  name="do_create" value="do_create" />
			<input type="submit" id="do_create_button"  name="do_create_button" value="<?php echo $this->_tpl_vars['labels']['btn_create']; ?>
" />
			<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
" onclick="javascript: history.back();"/>
	</div>	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "testcases/tcEdit_New_viewer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div class="groupBtn">
	    			<input type="hidden" id="do_create_2"  name="do_create" value="do_create" />
			<input type="submit" id="do_create_button_2"  name="do_create_button" value="<?php echo $this->_tpl_vars['labels']['btn_create']; ?>
" />
			<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
" onclick="javascript: history.back();"/>
	</div>	
  
</form>
</div>

<?php if ($this->_tpl_vars['gui']->sqlResult == 'ok'): ?>
	<?php if (( $_SESSION['setting_refresh_tree_on_action'] )): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
<?php endif; ?>

</body>
</html>