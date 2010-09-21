<?php /* Smarty version 2.6.26, created on 2010-09-08 16:12:01
         compiled from testcases/tcStepEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'testcases/tcStepEdit.tpl', 19, false),array('modifier', 'replace', 'testcases/tcStepEdit.tpl', 19, false),array('function', 'config_load', 'testcases/tcStepEdit.tpl', 20, false),array('function', 'lang_get', 'testcases/tcStepEdit.tpl', 38, false),array('function', 'html_options', 'testcases/tcStepEdit.tpl', 173, false),)), $this); ?>

<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='testcases/tcStepEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>



<?php $this->assign('module', 'lib/testcases/'); ?>
<?php $this->assign('tcase_id', $this->_tpl_vars['gui']->tcase_id); ?>
<?php $this->assign('tcversion_id', $this->_tpl_vars['gui']->tcversion_id); ?>

<?php $this->assign('showMode', $this->_tpl_vars['gui']->show_mode); ?> 

<?php $this->assign('tcViewAction', "lib/testcases/archiveData.php?tcase_id=".($this->_tpl_vars['tcase_id'])."&show_mode=".($this->_tpl_vars['showMode'])); ?>
<?php $this->assign('goBackAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcViewAction'])); ?>
<?php $this->assign('goBackActionURLencoded', ($this->_tpl_vars['goBackAction'])."|escape:'url'"); ?>
<?php $this->assign('url_args', "tcEdit.php?doAction=editStep&testcase_id=".($this->_tpl_vars['tcase_id'])."&tcversion_id=".($this->_tpl_vars['tcversion_id'])); ?>
<?php $this->assign('url_args', ($this->_tpl_vars['url_args'])."&goback_url=".($this->_tpl_vars['goBackActionURLencoded'])."&step_id="); ?>
<?php $this->assign('hrefEditStep', ($this->_tpl_vars['basehref']).($this->_tpl_vars['module']).($this->_tpl_vars['url_args'])); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "warning_step_number_already_exists,warning,warning_step_number,
             expected_results,step_actions,step_number_verbose,btn_cancel,btn_create_step,
             btn_copy_step,btn_save,cancel,warning_unsaved,step_number,execution_type_short_descr"), $this);?>


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

<script type="text/javascript" src="gui/javascript/ext_extensions.js" language="javascript"></script>
<script type="text/javascript">
var warning_step_number = "<?php echo $this->_tpl_vars['labels']['warning_step_number']; ?>
";
var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_step_number_already_exists = "<?php echo $this->_tpl_vars['labels']['warning_step_number_already_exists']; ?>
";

<?php echo '
function validateForm(the_form,step_set,step_number_on_edit)
{
	var value = \'\';
	var status_ok = true;
	var feedback = \'\';
	var value_found_on_set=false;
	var value_step_mistmatch=false;
	value = parseInt(the_form.step_number.value);

	if( isNaN(value) || value <= 0)
	{
		alert_message(alert_box_title,warning_step_number);
		selectField(the_form,\'step_number\');
		return false;
	}

  // check is step number is free/available
  // alert(\'#1# - step_set:\' + step_set + \' - step_set.length:\' + step_set.length);
  // alert(\'#2# - step_numver.value:\' + value + \' - step_number_on_edit:\' + step_number_on_edit);
  if( step_set.length > 0 )
  {
    value_found_on_set = (step_set.indexOf(value) >= 0);
    value_step_mistmatch = (value != step_number_on_edit);
    // alert(\'#3# - value_found_on_set:\' + value_found_on_set + \' - value_step_mistmatch:\' + value_step_mistmatch);

    if(value_found_on_set && value_step_mistmatch)
    {
      feedback = warning_step_number_already_exists.replace(\'%s\',value);
 	    alert_message(alert_box_title,feedback);
		  selectField(the_form,\'step_number\');
		  return false;
		}
  }
	show_modified_warning=false;
	return Ext.ux.requireSessionAndSubmit(the_form);
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

<body onLoad="focusInputField('step')">
<h1 class="title"><?php echo $this->_tpl_vars['gui']->main_descr; ?>
</h1> 

<div class="workBack" style="width:98.6%;">

<?php if ($this->_tpl_vars['gui']->user_feedback != ''): ?>
	<div>
		<p class="info"><?php echo $this->_tpl_vars['gui']->user_feedback; ?>
</p>
	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->has_been_executed): ?>
    <?php echo lang_get_smarty(array('s' => 'warning_editing_executed_step','var' => 'warning_edit_msg'), $this);?>

    <div class="messages" align="center"><?php echo $this->_tpl_vars['warning_edit_msg']; ?>
</div>
<?php endif; ?>


<form method="post" action="lib/testcases/tcEdit.php" name="tcStepEdit"
      onSubmit="return validateForm(this,'<?php echo $this->_tpl_vars['gui']->step_set; ?>
',<?php echo $this->_tpl_vars['gui']->step_number; ?>
);">

	<input type="hidden" name="testcase_id" value="<?php echo $this->_tpl_vars['gui']->tcase_id; ?>
" />
	<input type="hidden" name="tcversion_id" value="<?php echo $this->_tpl_vars['gui']->tcversion_id; ?>
" />
	<input type="hidden" name="doAction" value="" />
 	<input type="hidden" name="show_mode" value="<?php echo $this->_tpl_vars['gui']->show_mode; ?>
" />
	<input type="hidden" name="step_id" value="<?php echo $this->_tpl_vars['gui']->step_id; ?>
" />
	<input type="hidden" name="step_number" value="<?php echo $this->_tpl_vars['gui']->step_number; ?>
" />
	<input type="hidden" name="goback_url" value="<?php echo $this->_tpl_vars['goBackAction']; ?>
" />
	<div class="groupBtn">
		<input id="do_update_step" type="submit" name="do_update_step" 
		       onclick="doAction.value='<?php echo $this->_tpl_vars['gui']->operation; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
" />

    <?php if ($this->_tpl_vars['gui']->operation == 'doUpdateStep'): ?>
		  <input id="do_create_step" type="submit" name="do_create_step" 
		         onclick="doAction.value='createStep'" value="<?php echo $this->_tpl_vars['labels']['btn_create_step']; ?>
" />

		  <input id="do_copy_step" type="submit" name="do_copy_step" 
		         onclick="doAction.value='doCopyStep'" value="<?php echo $this->_tpl_vars['labels']['btn_copy_step']; ?>
" />
    <?php endif; ?>

  	<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
    	     <?php if ($this->_tpl_vars['gui']->goback_url != ''): ?>  onclick="location='<?php echo $this->_tpl_vars['gui']->goback_url; ?>
'"
    	     <?php else: ?>  onclick="javascript:history.back();" <?php endif; ?> />
	</div>	

  <table class="simple" style="width:99%;">
	<?php if ($this->_tpl_vars['gui']->steps_results_layout == 'horizontal'): ?>
  	<tr>
  		<th width="<?php echo $this->_tpl_vars['gui']->tableColspan; ?>
"><?php echo $this->_tpl_vars['labels']['step_number']; ?>
</th>
  				<th width="45%"><?php echo $this->_tpl_vars['labels']['step_actions']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['expected_results']; ?>
</th>
      <?php if ($this->_tpl_vars['session'] ['testprojectOptions']->automationEnabled): ?>
  		  <th width="25"><?php echo $this->_tpl_vars['labels']['execution_type_short_descr']; ?>
</th>
  		<?php endif; ?>  
  	</tr>
  
  <?php if ($this->_tpl_vars['gui']->tcaseSteps != ''): ?>
   	<?php $_from = $this->_tpl_vars['gui']->tcaseSteps; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['step_info']):
?>
  	  <tr>
      <?php if ($this->_tpl_vars['step_info']['step_number'] == $this->_tpl_vars['gui']->step_number): ?>
		    <td style="text-align:left;"><?php echo $this->_tpl_vars['gui']->step_number; ?>
</td>
  		  <td><?php echo $this->_tpl_vars['steps']; ?>
</td>
  		  <td><?php echo $this->_tpl_vars['expected_results']; ?>
</td>
		    <?php if ($this->_tpl_vars['session'] ['testprojectOptions']->automationEnabled): ?>
		    <td>
		    	<select name="exec_type" onchange="content_modified = true">
        	  	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->execution_types,'selected' => $this->_tpl_vars['gui']->step_exec_type), $this);?>

	        </select>
      	</td>
      	<?php endif; ?>
      <?php else: ?>
        <td style="text-align:left;"><a href="<?php echo $this->_tpl_vars['hrefEditStep']; ?>
<?php echo $this->_tpl_vars['step_info']['id']; ?>
"><?php echo $this->_tpl_vars['step_info']['step_number']; ?>
</a></td>
  	  	<td ><a href="<?php echo $this->_tpl_vars['hrefEditStep']; ?>
<?php echo $this->_tpl_vars['step_info']['id']; ?>
"><?php echo $this->_tpl_vars['step_info']['actions']; ?>
</a></td>
  	  	<td ><a href="<?php echo $this->_tpl_vars['hrefEditStep']; ?>
<?php echo $this->_tpl_vars['step_info']['id']; ?>
"><?php echo $this->_tpl_vars['step_info']['expected_results']; ?>
</a></td>
        <?php if ($this->_tpl_vars['session'] ['testprojectOptions']->automationEnabled): ?>
  	  	  <td><a href="<?php echo $this->_tpl_vars['hrefEditStep']; ?>
<?php echo $this->_tpl_vars['step_info']['id']; ?>
"><?php echo $this->_tpl_vars['gui']->execution_types[$this->_tpl_vars['step_info']['execution_type']]; ?>
</a></td>
  	  	<?php endif; ?>  
      <?php endif; ?>
  	  </tr>
    <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
  <?php else: ?> 	<?php $_from = $this->_tpl_vars['gui']->tcaseSteps; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['step_info']):
?>
	<tr>
		<th width="20"><?php echo $this->_tpl_vars['args_labels']['step_number']; ?>
 <?php echo $this->_tpl_vars['step_info']['step_number']; ?>
</th>
		<th><?php echo $this->_tpl_vars['labels']['step_actions']; ?>
</th>
		<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->automationEnabled): ?>
		<?php if ($this->_tpl_vars['step_info']['step_number'] == $this->_tpl_vars['gui']->step_number): ?>
		<th width="200"><?php echo $this->_tpl_vars['labels']['execution_type_short_descr']; ?>
:
			<select name="exec_type" onchange="content_modified = true">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->execution_types,'selected' => $this->_tpl_vars['gui']->step_exec_type), $this);?>

	        </select>
		</th>
		<?php else: ?>
			<th><?php echo $this->_tpl_vars['labels']['execution_type_short_descr']; ?>
:
				<?php echo $this->_tpl_vars['gui']->execution_types[$this->_tpl_vars['step_info']['execution_type']]; ?>
</th>
		<?php endif; ?>
		<?php else: ?>
		<th>&nbsp;</th>
		<?php endif; ?> 		<?php if ($this->_tpl_vars['edit_enabled']): ?>
		<th>&nbsp;</th>
		<?php endif; ?>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<?php if ($this->_tpl_vars['step_info']['step_number'] == $this->_tpl_vars['gui']->step_number): ?>
		<td colspan="2"><?php echo $this->_tpl_vars['steps']; ?>
</td>
		<?php else: ?>
		<td colspan="2"><a href="<?php echo $this->_tpl_vars['hrefEditStep']; ?>
<?php echo $this->_tpl_vars['step_info']['id']; ?>
"><?php echo $this->_tpl_vars['step_info']['actions']; ?>
</a></td>
		<?php endif; ?>
	</tr>
	<tr>
		<th style="background: transparent; border: none"></th>
		<th colspan="2"><?php echo $this->_tpl_vars['labels']['expected_results']; ?>
</th>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<?php if ($this->_tpl_vars['step_info']['step_number'] == $this->_tpl_vars['gui']->step_number): ?>
		<td colspan="2"><?php echo $this->_tpl_vars['expected_results']; ?>
</td>
		<?php else: ?>
		<td colspan="2" style="padding: 0.5em 0.5em 2em 0.5em"><a href="<?php echo $this->_tpl_vars['hrefEditStep']; ?>
<?php echo $this->_tpl_vars['step_info']['id']; ?>
"><?php echo $this->_tpl_vars['step_info']['expected_results']; ?>
</a></td>
		<?php endif; ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['gui']->action == 'createStep' || $this->_tpl_vars['gui']->action == 'doCreateStep'): ?>
  	<tr>
		  <td style="text-align:left;"><?php echo $this->_tpl_vars['gui']->step_number; ?>
</td>
  		<td><?php echo $this->_tpl_vars['steps']; ?>
</td>
  		<td><?php echo $this->_tpl_vars['expected_results']; ?>
</td>
		    <?php if ($this->_tpl_vars['session'] ['testprojectOptions']->automationEnabled): ?>
		    <td>
		    	<select name="exec_type" onchange="content_modified = true">
        	  	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->execution_types,'selected' => $this->_tpl_vars['gui']->step_exec_type), $this);?>

	        </select>
      	</td>
      	<?php endif; ?>
  	</tr>
  <?php endif; ?>
  </table>	
  <p>
	<div class="groupBtn">
		<input id="do_update_step" type="submit" name="do_update_step" 
		       onclick="doAction.value='<?php echo $this->_tpl_vars['gui']->operation; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
" />

    <?php if ($this->_tpl_vars['gui']->operation == 'doUpdateStep'): ?>
		  <input id="do_create_step" type="submit" name="do_create_step" 
		         onclick="doAction.value='createStep'" value="<?php echo $this->_tpl_vars['labels']['btn_create_step']; ?>
" />

		  <input id="do_copy_step" type="submit" name="do_copy_step" 
		         onclick="doAction.value='doCopyStep'" value="<?php echo $this->_tpl_vars['labels']['btn_copy_step']; ?>
" />
    <?php endif; ?>

  	<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
    	     <?php if ($this->_tpl_vars['gui']->goback_url != ''): ?>  onclick="location='<?php echo $this->_tpl_vars['gui']->goback_url; ?>
'"
    	     <?php else: ?>  onclick="javascript:history.back();" <?php endif; ?> />
	</div>	
</form>

<script type="text/javascript" defer="1">
   	document.forms[0].step_number.focus();
</script>

</div>
</body>
</html>