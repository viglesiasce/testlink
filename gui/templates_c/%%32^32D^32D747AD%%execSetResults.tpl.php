<?php /* Smarty version 2.6.26, created on 2010-09-27 15:50:41
         compiled from execute/execSetResults.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'execute/execSetResults.tpl', 32, false),array('modifier', 'basename', 'execute/execSetResults.tpl', 55, false),array('modifier', 'replace', 'execute/execSetResults.tpl', 55, false),array('function', 'lang_get', 'execute/execSetResults.tpl', 34, false),array('function', 'config_load', 'execute/execSetResults.tpl', 56, false),array('function', 'cycle', 'execute/execSetResults.tpl', 396, false),array('function', 'html_options', 'execute/execSetResults.tpl', 407, false),)), $this); ?>
<?php $this->assign('attachment_model', $this->_tpl_vars['cfg']->exec_cfg->att_model); ?>
<?php $this->assign('title_sep', @TITLE_SEP); ?>
<?php $this->assign('title_sep_type3', @TITLE_SEP_TYPE3); ?>

<?php $this->assign('input_enabled_disabled', 'disabled'); ?>
<?php $this->assign('att_download_only', true); ?>
<?php $this->assign('enable_custom_fields', false); ?>
<?php $this->assign('draw_submit_button', false); ?>

<?php $this->assign('show_current_build', 0); ?>
<?php $this->assign('my_build_name', ((is_array($_tmp=$this->_tpl_vars['gui']->build_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>

<?php echo lang_get_smarty(array('s' => 'build','var' => 'build_title'), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => 'edit_notes,build_is_closed,test_cases_cannot_be_executed,test_exec_notes,test_exec_result,
             th_testsuite,details,warning_delete_execution,title_test_case,th_test_case_id,
             version,has_no_assignment,assigned_to,execution_history,exec_notes,step_actions,
             execution_type_short_descr,expected_results,testcase_customfields,
             last_execution,exec_any_build,date_time_run,test_exec_by,build,exec_status,
             test_status_not_run,tc_not_tested_yet,last_execution,exec_current_build,
	           attachment_mgmt,bug_mgmt,delete,closed_build,alt_notes,alt_attachment_mgmt,
	           img_title_bug_mgmt,img_title_delete_execution,test_exec_summary,title_t_r_on_build,
	           execution_type_manual,execution_type_auto,run_mode,or_unassigned_test_cases,
	           no_data_available,import_xml_results,btn_save_all_tests_results,execution_type,
	           testcaseversion,btn_print,execute_and_save_results,warning,warning_nothing_will_be_saved,
	           test_exec_steps,test_exec_expected_r,btn_save_tc_exec_results,only_test_cases_assigned_to,
             deleted_user,click_to_open,reqs,requirement,show_tcase_spec,edit_execution, 
             btn_save_exec_and_movetonext,step_number,
             preconditions,platform,platform_description,exec_not_run_result_note'), $this);?>




<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='execute/execSetResults.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('popup' => 'yes','openHead' => 'yes','jsValidate' => 'yes','editorType' => $this->_tpl_vars['gui']->editorType)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript" src="gui/javascript/radio_utils.js" type="text/javascript"></script>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>

<?php if ($this->_config[0]['vars']['ROUND_EXEC_HISTORY'] || $this->_config[0]['vars']['ROUND_TC_TITLE'] || $this->_config[0]['vars']['ROUND_TC_SPEC']): ?>
  <?php $this->assign('round_enabled', 1); ?>
  <script language="JavaScript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/niftycube/niftycube.js" type="text/javascript"></script>
<?php endif; ?>

<script language="JavaScript" type="text/javascript">
var msg="<?php echo $this->_tpl_vars['labels']['warning_delete_execution']; ?>
";
var import_xml_results="<?php echo $this->_tpl_vars['labels']['import_xml_results']; ?>
";
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script language="JavaScript" type="text/javascript">
<?php echo '

function load_notes(panel,exec_id)
{
  // 20100129 - BUGID 3113 - franciscom   -  solved ONLY for  $webeditorType == \'none\'
  var url2load=fRoot+\'lib/execute/getExecNotes.php?readonly=1&exec_id=\' + exec_id;
  panel.load({url:url2load});
}
'; ?>

</script>

<script language="JavaScript" type="text/javascript">
<?php echo '
/*
Set value for a group of combo (have same prefix).
*/
function set_combo_group(formid,combo_id_prefix,value_to_assign)
{
  var f=document.getElementById(formid);
	var all_comboboxes = f.getElementsByTagName(\'select\');
	var input_element;
	var idx=0;
		
	for(idx = 0; idx < all_comboboxes.length; idx++)
	{
	  input_element=all_comboboxes[idx];
		if( input_element.type == "select-one" && 
		    input_element.id.indexOf(combo_id_prefix)==0 &&
		   !input_element.disabled)
		{
       input_element.value=value_to_assign;
		}	
	}
}
'; ?>

</script>



<?php echo '
<script type="text/javascript">
'; ?>

var alert_box_title="<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_nothing_will_be_saved="<?php echo $this->_tpl_vars['labels']['warning_nothing_will_be_saved']; ?>
";
<?php echo '
function validateForm(f)
{
  var status_ok=true;
  var cfields_inputs=\'\';
  var cfValidityChecks;
  var cfield_container;
  var access_key;
  cfield_container=document.getElementById(\'save_button_clicked\').value;
  access_key=\'cfields_exec_time_tcversionid_\'+cfield_container; 
    
  if( document.getElementById(access_key) != null )
  {    
 	    cfields_inputs = document.getElementById(access_key).getElementsByTagName(\'input\');
      cfValidityChecks=validateCustomFields(cfields_inputs);
      if( !cfValidityChecks.status_ok )
      {
          var warning_msg=cfMessages[cfValidityChecks.msg_id];
          alert_message(alert_box_title,warning_msg.replace(/%s/, cfValidityChecks.cfield_label));
          return false;
      }
  }
  return true;
}

/*
  function: checkSubmitForStatus
            if a radio (with a particular id, see code for details)
            with $statusCode has been checked, then false is returned to block form submit().
            
            Dev. Note - remember this:
            
            KO:
               onclick="foo();checkSubmitForStatus(\'n\')"
            OK
               onclick="foo();return checkSubmitForStatus(\'n\')"
                              ^^^^^^ 
            

  args :
  
  returns: 

*/
function checkSubmitForStatus($statusCode)
{
  var button_clicked;
  var access_key;
  var isChecked;
  
  button_clicked=document.getElementById(\'save_button_clicked\').value;
  access_key=\'status_\'+button_clicked+\'_\'+$statusCode; 
 	isChecked = document.getElementById(access_key).checked;
  if(isChecked)
  {
      alert_message(alert_box_title,warning_nothing_will_be_saved);
      return false;
  }
  return true;
}
</script>
'; ?>



<script>
<?php echo '
panel_init_functions = new Array();
Ext.onReady(function() {
	for(var i=0;i<panel_init_functions.length;i++) {
		panel_init_functions[i]();
	}
});
'; ?>


</script>


</head>
<?php $this->assign('tplan_notes_view_memory_id', 'tpn_view_status'); ?>
<?php $this->assign('build_notes_view_memory_id', 'bn_view_status'); ?>
<?php $this->assign('bulk_controls_view_memory_id', 'bc_view_status'); ?>
<?php $this->assign('platform_notes_view_memory_id', 'platform_notes_view_status'); ?>


<body onLoad="show_hide('tplan_notes','<?php echo $this->_tpl_vars['tplan_notes_view_memory_id']; ?>
',<?php echo $this->_tpl_vars['gui']->tpn_view_status; ?>
);
              show_hide('build_notes','<?php echo $this->_tpl_vars['build_notes_view_memory_id']; ?>
',<?php echo $this->_tpl_vars['gui']->bn_view_status; ?>
);
              show_hide('bulk_controls','<?php echo $this->_tpl_vars['bulk_controls_view_memory_id']; ?>
',<?php echo $this->_tpl_vars['gui']->bc_view_status; ?>
);
              show_hide('platform_notes','<?php echo $this->_tpl_vars['platform_notes_view_memory_id']; ?>
',<?php echo $this->_tpl_vars['gui']->platform_notes_view_status; ?>
);
              multiple_show_hide('<?php echo $this->_tpl_vars['tsd_div_id_list']; ?>
','<?php echo $this->_tpl_vars['tsd_hidden_id_list']; ?>
',
                                 '<?php echo $this->_tpl_vars['tsd_val_for_hidden_list']; ?>
');
              <?php if ($this->_tpl_vars['round_enabled']): ?>Nifty('div.exec_additional_info');<?php endif; ?>
              <?php if ($this->_config[0]['vars']['ROUND_TC_SPEC']): ?>Nifty('div.exec_test_spec');<?php endif; ?>
              <?php if ($this->_config[0]['vars']['ROUND_EXEC_HISTORY']): ?>Nifty('div.exec_history');<?php endif; ?>
              <?php if ($this->_config[0]['vars']['ROUND_TC_TITLE']): ?>Nifty('div.exec_tc_title');<?php endif; ?>">

<h1 class="title">
	<?php echo $this->_tpl_vars['labels']['title_t_r_on_build']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->build_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php if ($this->_tpl_vars['gui']->platform_info['name'] != ""): ?>
	  <?php echo $this->_tpl_vars['title_sep_type3']; ?>
<?php echo $this->_tpl_vars['labels']['platform']; ?>
<?php echo $this->_tpl_vars['title_sep']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->platform_info['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php endif; ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_executeMain','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>
<h1 class="title">
	<?php if ($this->_tpl_vars['gui']->ownerDisplayName != ""): ?>
    <?php echo $this->_tpl_vars['labels']['only_test_cases_assigned_to']; ?>
<?php echo $this->_tpl_vars['title_sep']; ?>

	  <?php $_from = $this->_tpl_vars['gui']->ownerDisplayName; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['assignedUser']):
?>
	    <?php echo ((is_array($_tmp=$this->_tpl_vars['assignedUser'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	  <?php endforeach; endif; unset($_from); ?>
	  <?php if ($this->_tpl_vars['gui']->include_unassigned): ?>
	    <br /><?php echo $this->_tpl_vars['labels']['or_unassigned_test_cases']; ?>

	  <?php endif; ?>
	<?php endif; ?>
</h1>


<div id="main_content" class="workBack">
  <?php if ($this->_tpl_vars['gui']->build_is_open == 0): ?>
  <div class="messages" style="align:center;">
     <?php echo $this->_tpl_vars['labels']['build_is_closed']; ?>
<br />
     <?php echo $this->_tpl_vars['labels']['test_cases_cannot_be_executed']; ?>

  </div>
  <br />
  <?php endif; ?>


<form method="post" id="execSetResults" name="execSetResults" 
      onSubmit="javascript:return validateForm(this);">

  <input type="hidden" id="save_button_clicked"  name="save_button_clicked" value="0" />
  <input type="hidden" id="do_delete"  name="do_delete" value="0" />
  <input type="hidden" id="exec_to_delete"  name="exec_to_delete" value="0" />

        <?php echo lang_get_smarty(array('s' => 'test_plan_notes','var' => 'container_title'), $this);?>

  <?php $this->assign('div_id', 'tplan_notes'); ?>
  <?php $this->assign('memstatus_id', $this->_tpl_vars['tplan_notes_view_memory_id']); ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_hide_mgmt.tpl", 'smarty_include_vars' => array('show_hide_container_title' => $this->_tpl_vars['container_title'],'show_hide_container_id' => $this->_tpl_vars['div_id'],'show_hide_container_draw' => false,'show_hide_container_class' => 'exec_additional_info','show_hide_container_view_status_id' => $this->_tpl_vars['memstatus_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <div id="<?php echo $this->_tpl_vars['div_id']; ?>
" class="exec_additional_info">
    <?php echo $this->_tpl_vars['gui']->testplan_notes; ?>

    <?php if ($this->_tpl_vars['gui']->testplan_cfields != ''): ?> <div id="cfields_testplan" class="custom_field_container"><?php echo $this->_tpl_vars['gui']->testplan_cfields; ?>
</div><?php endif; ?>
  </div>
  
        <?php if ($this->_tpl_vars['gui']->platform_info['id'] > 0): ?>
  <?php echo lang_get_smarty(array('s' => 'platform_description','var' => 'container_title'), $this);?>

  <?php $this->assign('div_id', 'platform_notes'); ?>
  <?php $this->assign('memstatus_id', $this->_tpl_vars['platform_notes_view_memory_id']); ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_hide_mgmt.tpl", 'smarty_include_vars' => array('show_hide_container_title' => $this->_tpl_vars['container_title'],'show_hide_container_id' => $this->_tpl_vars['div_id'],'show_hide_container_view_status_id' => $this->_tpl_vars['memstatus_id'],'show_hide_container_draw' => true,'show_hide_container_class' => 'exec_additional_info','show_hide_container_html' => $this->_tpl_vars['gui']->platform_info['notes'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>         
  
        <?php echo lang_get_smarty(array('s' => 'builds_notes','var' => 'container_title'), $this);?>

  <?php $this->assign('div_id', 'build_notes'); ?>
  <?php $this->assign('memstatus_id', $this->_tpl_vars['build_notes_view_memory_id']); ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_hide_mgmt.tpl", 'smarty_include_vars' => array('show_hide_container_title' => $this->_tpl_vars['container_title'],'show_hide_container_id' => $this->_tpl_vars['div_id'],'show_hide_container_view_status_id' => $this->_tpl_vars['memstatus_id'],'show_hide_container_draw' => true,'show_hide_container_class' => 'exec_additional_info','show_hide_container_html' => $this->_tpl_vars['gui']->build_notes)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  


  <?php if ($this->_tpl_vars['gui']->map_last_exec == ""): ?>
     <div class="messages" style="text-align:center"> <?php echo $this->_tpl_vars['labels']['no_data_available']; ?>
</div>
  <?php else: ?>
      <?php if ($this->_tpl_vars['gui']->grants->execute == 1 && $this->_tpl_vars['gui']->build_is_open == 1): ?>
        <?php $this->assign('input_enabled_disabled', ""); ?>
        <?php $this->assign('att_download_only', false); ?>
        <?php $this->assign('enable_custom_fields', true); ?>
        <?php $this->assign('draw_submit_button', true); ?>


        <?php if ($this->_tpl_vars['cfg']->exec_cfg->show_testsuite_contents && $this->_tpl_vars['gui']->can_use_bulk_op): ?>
            <?php echo lang_get_smarty(array('s' => 'bulk_tc_status_management','var' => 'container_title'), $this);?>

            <?php $this->assign('div_id', 'bulk_controls'); ?>
            <?php $this->assign('memstatus_id', $this->_tpl_vars['bulk_controls_view_memory_id']); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_hide_mgmt.tpl", 'smarty_include_vars' => array('show_hide_container_title' => $this->_tpl_vars['container_title'],'show_hide_container_id' => $this->_tpl_vars['div_id'],'show_hide_container_draw' => false,'show_hide_container_class' => 'exec_additional_info','show_hide_container_view_status_id' => $this->_tpl_vars['memstatus_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <div id="<?php echo $this->_tpl_vars['div_id']; ?>
" name="<?php echo $this->_tpl_vars['div_id']; ?>
">
              <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "execute/inc_exec_controls.tpl", 'smarty_include_vars' => array('args_save_type' => 'bulk','args_input_enable_mgmt' => $this->_tpl_vars['input_enabled_disabled'],'args_tcversion_id' => 'bulk','args_webeditor' => $this->_tpl_vars['gui']->bulk_exec_notes_editor,'args_execution_time_cfields' => $this->_tpl_vars['gui']->execution_time_cfields,'args_labels' => $this->_tpl_vars['labels'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
        <?php endif; ?>
    	<?php endif; ?>

      <?php if (! ( $this->_tpl_vars['cfg']->exec_cfg->show_testsuite_contents && $this->_tpl_vars['gui']->can_use_bulk_op )): ?>
          <hr />
          <div class="groupBtn">
    	    	  <input type="button" name="print" id="print" value="<?php echo $this->_tpl_vars['labels']['btn_print']; ?>
"
    	    	         onclick="javascript:window.print();" />
    	    	  <input type="submit" id="toggle_history_on_off"
    	    	         name="<?php echo $this->_tpl_vars['gui']->history_status_btn_name; ?>
"
    	    	         value="<?php echo lang_get_smarty(array('s' => $this->_tpl_vars['gui']->history_status_btn_name), $this);?>
" />
    	    	  <input type="button" id="pop_up_import_button" name="import_xml_button"
    	    	         value="<?php echo $this->_tpl_vars['labels']['import_xml_results']; ?>
"
    	    	         onclick="javascript: openImportResult('import_xml_results',<?php echo $this->_tpl_vars['gui']->tproject_id; ?>
,<?php echo $this->_tpl_vars['gui']->tplan_id; ?>
,<?php echo $this->_tpl_vars['gui']->build_id; ?>
,<?php echo $this->_tpl_vars['gui']->platform_id; ?>
);" />
          
              		          <?php if ($this->_tpl_vars['tlCfg']->exec_cfg->enable_test_automation): ?>
		          <input type="submit" id="execute_cases" name="execute_cases"
		                 value="<?php echo $this->_tpl_vars['labels']['execute_and_save_results']; ?>
"/>
		          <?php endif; ?>
    	    	  <input type="hidden" id="history_on"
    	    	         name="history_on" value="<?php echo $this->_tpl_vars['gui']->history_on; ?>
" />
          </div>
      <?php endif; ?>
      <hr />
	<?php endif; ?>

  <?php if ($this->_tpl_vars['cfg']->exec_cfg->show_testsuite_contents && $this->_tpl_vars['gui']->can_use_bulk_op): ?>
            <div>
      <br />
 	    <table class="mainTable-x" width="100%">
 	    <tr>
 	    <th><?php echo $this->_tpl_vars['labels']['th_testsuite']; ?>
</th><th><?php echo $this->_tpl_vars['labels']['title_test_case']; ?>
</th>
 	    <th><?php echo $this->_tpl_vars['labels']['exec_status']; ?>
</th><th><?php echo $this->_tpl_vars['labels']['test_exec_result']; ?>
</th>
 	    </tr>
 	    <?php $_from = $this->_tpl_vars['gui']->map_last_exec; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tcSet'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tcSet']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['tc_exec']):
        $this->_foreach['tcSet']['iteration']++;
?>
      
        <?php $this->assign('tc_id', $this->_tpl_vars['tc_exec']['testcase_id']); ?>
	      <?php $this->assign('tcversion_id', $this->_tpl_vars['tc_exec']['id']); ?>
	      	      <?php $this->assign('version_number', $this->_tpl_vars['tc_exec']['version']); ?>
	      
	    	<input type="hidden" id="tc_version_<?php echo $this->_tpl_vars['tcversion_id']; ?>
" name="tc_version[<?php echo $this->_tpl_vars['tcversion_id']; ?>
]" value='<?php echo $this->_tpl_vars['tc_id']; ?>
' />
	    	<input type="hidden" id="version_number_<?php echo $this->_tpl_vars['tcversion_id']; ?>
" name="version_number[<?php echo $this->_tpl_vars['tcversion_id']; ?>
]" value='<?php echo $this->_tpl_vars['version_number']; ?>
' />
      
                <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#eeeeee,#d0d0d0"), $this);?>
">       
        <td><?php echo $this->_tpl_vars['tsuite_info'][$this->_tpl_vars['tc_id']]['tsuite_name']; ?>
</td>        <td>
        <a href="javascript:openTCaseWindow(<?php echo $this->_tpl_vars['tc_exec']['testcase_id']; ?>
,<?php echo $this->_tpl_vars['tc_exec']['id']; ?>
,'editOnExec')" title="<?php echo $this->_tpl_vars['labels']['show_tcase_spec']; ?>
">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tcasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['cfg']->testcase_cfg->glue_character; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tc_exec']['tc_external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
::<?php echo $this->_tpl_vars['labels']['version']; ?>
: <?php echo $this->_tpl_vars['tc_exec']['version']; ?>
::<?php echo ((is_array($_tmp=$this->_tpl_vars['tc_exec']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

        </a>
        </td>
        <td class="<?php echo $this->_tpl_vars['tlCfg']->results['code_status'][$this->_tpl_vars['tc_exec']['status']]; ?>
">
        <?php echo $this->_tpl_vars['gui']->execStatusValues[$this->_tpl_vars['tc_exec']['status']]; ?>

        </td>
   			<td><select name="status[<?php echo $this->_tpl_vars['tcversion_id']; ?>
]" id="status_<?php echo $this->_tpl_vars['tcversion_id']; ?>
">
				    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->execStatusValues), $this);?>

				</select>
			   </td>
        </tr>
      <?php endforeach; endif; unset($_from); ?>
      </table>
      </div>
  <?php else: ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "execute/inc_exec_show_tc_exec.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if (isset ( $this->_tpl_vars['gui']->refreshTree ) && $this->_tpl_vars['gui']->refreshTree): ?>
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	        <?php endif; ?>
  <?php endif; ?>
  
</form>
</div>
</body>
</html>