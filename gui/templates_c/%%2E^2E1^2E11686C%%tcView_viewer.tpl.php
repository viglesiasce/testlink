<?php /* Smarty version 2.6.26, created on 2010-09-07 23:03:54
         compiled from testcases/tcView_viewer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcView_viewer.tpl', 33, false),array('function', 'localize_timestamp', 'testcases/tcView_viewer.tpl', 263, false),array('modifier', 'escape', 'testcases/tcView_viewer.tpl', 74, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'tcView_viewer_labels','s' => "requirement_spec,Requirements,tcversion_is_inactive_msg,
             btn_edit,btn_delete,btn_mv_cp,btn_del_this_version,btn_new_version,
             btn_export,btn_execute_automatic_testcase,version,testplan_usage,
             testproject,testsuite,title_test_case,summary,steps,btn_add_to_testplans,
             title_last_mod,title_created,by,expected_results,keywords,
             btn_create_step,step_number,btn_reorder_steps,step_actions,
             execution_type_short_descr,delete_step,show_hide_reorder,
             test_plan,platform,
             execution_type,test_importance,none,preconditions,btn_compare_versions"), $this);?>


<?php echo lang_get_smarty(array('s' => 'warning_delete_step','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php $this->assign('tableColspan', $this->_tpl_vars['gui']->tableColspan); ?> 
<?php $this->assign('addInfoDivStyle', 'style="padding: 5px 3px 4px 10px;"'); ?>


<?php $this->assign('module', 'lib/testcases/'); ?>
<?php $this->assign('tcase_id', $this->_tpl_vars['args_testcase']['testcase_id']); ?>
<?php $this->assign('tcversion_id', $this->_tpl_vars['args_testcase']['id']); ?>
<?php $this->assign('showMode', $this->_tpl_vars['gui']->show_mode); ?> 

<?php $this->assign('tcViewAction', "lib/testcases/archiveData.php?tcase_id=".($this->_tpl_vars['tcase_id'])."&show_mode=".($this->_tpl_vars['showMode'])); ?>
             
<?php $this->assign('hrefReqSpecMgmt', "lib/general/frmWorkArea.php?feature=reqSpecMgmt"); ?>
<?php $this->assign('hrefReqSpecMgmt', ($this->_tpl_vars['basehref']).($this->_tpl_vars['hrefReqSpecMgmt'])); ?>

<?php $this->assign('hrefReqMgmt', "lib/requirements/reqView.php?showReqSpecTitle=1&requirement_id="); ?>
<?php $this->assign('hrefReqMgmt', ($this->_tpl_vars['basehref']).($this->_tpl_vars['hrefReqMgmt'])); ?>

<?php $this->assign('url_args', "tcAssign2Tplan.php?tcase_id=".($this->_tpl_vars['tcase_id'])."&tcversion_id=".($this->_tpl_vars['tcversion_id'])); ?>
<?php $this->assign('hrefAddTc2Tplan', ($this->_tpl_vars['basehref']).($this->_tpl_vars['module']).($this->_tpl_vars['url_args'])); ?>


<?php $this->assign('url_args', "tcEdit.php?doAction=editStep&testcase_id=".($this->_tpl_vars['tcase_id'])."&tcversion_id=".($this->_tpl_vars['tcversion_id'])); ?>
<?php $this->assign('goBackAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcViewAction'])); ?>
<?php $this->assign('goBackActionURLencoded', ((is_array($_tmp=$this->_tpl_vars['goBackAction'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'))); ?>
<?php $this->assign('url_args', ($this->_tpl_vars['url_args'])."&goback_url=".($this->_tpl_vars['goBackActionURLencoded'])."&show_mode=".($this->_tpl_vars['showMode'])."&step_id="); ?>
<?php $this->assign('hrefEditStep', ($this->_tpl_vars['basehref']).($this->_tpl_vars['module']).($this->_tpl_vars['url_args'])); ?>


<?php $this->assign('tcExportAction', "lib/testcases/tcExport.php?goback_url=".($this->_tpl_vars['goBackActionURLencoded'])."&show_mode=".($this->_tpl_vars['showMode'])); ?>
<?php $this->assign('exportTestCaseAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcExportAction'])); ?>


<?php $this->assign('author_userinfo', $this->_tpl_vars['args_users'][$this->_tpl_vars['args_testcase']['author_id']]); ?>
<?php $this->assign('updater_userinfo', ""); ?>
<?php if ($this->_tpl_vars['args_testcase']['updater_id'] != ''): ?>
  <?php $this->assign('updater_userinfo', $this->_tpl_vars['args_users'][$this->_tpl_vars['args_testcase']['updater_id']]); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['args_show_title'] == 'yes'): ?>
    <?php if ($this->_tpl_vars['args_tproject_name'] != ''): ?>
     <h2><?php echo $this->_tpl_vars['tcView_viewer_labels']['testproject']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['args_tproject_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h2>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['args_tsuite_name'] != ''): ?>
     <h2><?php echo $this->_tpl_vars['tcView_viewer_labels']['testsuite']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['args_tsuite_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h2>
    <?php endif; ?>
	  <h2><?php echo $this->_tpl_vars['tcView_viewer_labels']['title_test_case']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['args_testcase']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h2>
<?php endif; ?>
<?php $this->assign('warning_edit_msg', ""); ?>

<?php if ($this->_tpl_vars['args_can_do']->edit == 'yes'): ?>

  <?php $this->assign('edit_enabled', 0); ?>
    <?php $this->assign('active_status_op_enabled', 1); ?>
  <?php $this->assign('has_been_executed', 0); ?>
  <?php echo lang_get_smarty(array('s' => 'can_not_edit_tc','var' => 'warning_edit_msg'), $this);?>

  <?php if ($this->_tpl_vars['args_status_quo'] == null || $this->_tpl_vars['args_status_quo'][$this->_tpl_vars['args_testcase']['id']]['executed'] == null): ?>
      <?php $this->assign('edit_enabled', 1); ?>
      <?php $this->assign('warning_edit_msg', ""); ?>
  <?php else: ?> 
    <?php if (isset ( $this->_tpl_vars['args_tcase_cfg'] ) && $this->_tpl_vars['args_tcase_cfg']->can_edit_executed == 1): ?>
      <?php $this->assign('edit_enabled', 1); ?> 
      <?php $this->assign('has_been_executed', 1); ?> 
      <?php echo lang_get_smarty(array('s' => 'warning_editing_executed_tc','var' => 'warning_edit_msg'), $this);?>

    <?php endif; ?> 
  <?php endif; ?>

  <div class="groupBtn">
	<div style="margin-bottom: 5px;">
	<span style="float: left">
	  <form id="topControls" name="topControls" method="post" action="lib/testcases/tcEdit.php">
	  <input type="hidden" name="testcase_id" value="<?php echo $this->_tpl_vars['args_testcase']['testcase_id']; ?>
" />
	  <input type="hidden" name="tcversion_id" value="<?php echo $this->_tpl_vars['args_testcase']['id']; ?>
" />
	  <input type="hidden" name="has_been_executed" value="<?php echo $this->_tpl_vars['has_been_executed']; ?>
" />
	  <input type="hidden" name="doAction" value="" />
	  <input type="hidden" name="show_mode" value="<?php echo $this->_tpl_vars['gui']->show_mode; ?>
" />


	  <?php $this->assign('go_newline', ""); ?>
	  <?php if ($this->_tpl_vars['edit_enabled']): ?>
	 	    <input type="submit" name="edit_tc" 
	 	           onclick="doAction.value='edit';<?php echo $this->_tpl_vars['gui']->submitCode; ?>
" value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_edit']; ?>
" />
	  <?php endif; ?>
	
	  		<?php if ($this->_tpl_vars['args_can_do']->delete_testcase == 'yes' && $this->_tpl_vars['args_can_delete_testcase'] == 'yes'): ?>
			<input type="submit" name="delete_tc" value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_delete']; ?>
" />
	  <?php endif; ?>
	
	  	  <?php if ($this->_tpl_vars['args_can_do']->copy == 'yes' && $this->_tpl_vars['args_can_move_copy'] == 'yes'): ?>
	   		<input type="submit" name="move_copy_tc"   value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_mv_cp']; ?>
" />
	     	<?php $this->assign('go_newline', "<br />"); ?>
	  <?php endif; ?>
	
	 	<?php if ($this->_tpl_vars['args_can_do']->delete_version == 'yes' && $this->_tpl_vars['args_can_delete_version'] == 'yes'): ?>
			 <input type="submit" name="delete_tc_version" value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_del_this_version']; ?>
" />
	  <?php endif; ?>

	 	<?php if ($this->_tpl_vars['args_can_do']->create_new_version == 'yes'): ?>
  		<input type="submit" name="do_create_new_version"   value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_new_version']; ?>
" />
	  <?php endif; ?>

	
				<?php if ($this->_tpl_vars['active_status_op_enabled'] == 1 && $this->_tpl_vars['args_can_do']->deactivate == 'yes'): ?>
	        <?php if ($this->_tpl_vars['args_testcase']['active'] == 0): ?>
				      <?php $this->assign('act_deact_btn', 'activate_this_tcversion'); ?>
				      <?php $this->assign('act_deact_value', 'activate_this_tcversion'); ?>
				      <?php $this->assign('version_title_class', 'inactivate_version'); ?>
	      	<?php else: ?>
				      <?php $this->assign('act_deact_btn', 'deactivate_this_tcversion'); ?>
				      <?php $this->assign('act_deact_value', 'deactivate_this_tcversion'); ?>
				      <?php $this->assign('version_title_class', 'activate_version'); ?>
	      	<?php endif; ?>
	      	<input type="submit" name="<?php echo $this->_tpl_vars['act_deact_btn']; ?>
"
	                           value="<?php echo lang_get_smarty(array('s' => $this->_tpl_vars['act_deact_value']), $this);?>
" />
	  <?php endif; ?>

    <?php if ($this->_tpl_vars['args_can_do']->add2tplan == 'yes' && $this->_tpl_vars['args_has_testplans']): ?>
  <input type="button" id="addTc2Tplan_<?php echo $this->_tpl_vars['args_testcase']['id']; ?>
"  name="addTc2Tplan_<?php echo $this->_tpl_vars['args_testcase']['id']; ?>
" 
         value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_add_to_testplans']; ?>
" onclick="location='<?php echo $this->_tpl_vars['hrefAddTc2Tplan']; ?>
'" />

  <?php endif; ?>
	</form>
	</span>

	<span>
	<form id="tcexport" name="tcexport" method="post" action="<?php echo $this->_tpl_vars['exportTestCaseAction']; ?>
" >
		<input type="hidden" name="testcase_id" value="<?php echo $this->_tpl_vars['args_testcase']['testcase_id']; ?>
" />
		<input type="hidden" name="tcversion_id" value="<?php echo $this->_tpl_vars['args_testcase']['id']; ?>
" />
		<input type="submit" name="export_tc" style="margin-left: 3px;" value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_export']; ?>
" />
					</form>
	</span>
	
	</div>
<?php endif; ?> 
	<div>
	<span>
		<?php if ($this->_tpl_vars['args_testcase']['version'] > 1): ?>
	  <form id="version_compare" name="version_compare" method="post" action="lib/testcases/tcCompareVersions.php">
	  		<input type="hidden" name="testcase_id" value="<?php echo $this->_tpl_vars['args_testcase']['testcase_id']; ?>
" />
	  		<input type="submit" name="compare_versions" value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_compare_versions']; ?>
" />
	  </form>
	<?php endif; ?>
	</span>
  </div> 


  <?php if ($this->_tpl_vars['args_testcase']['active'] == 0): ?>
    <br /><div class="messages" align="center"><?php echo $this->_tpl_vars['tcView_viewer_labels']['tcversion_is_inactive_msg']; ?>
</div>
  <?php endif; ?>
 	<?php if ($this->_tpl_vars['warning_edit_msg'] != ""): ?>
 	    <br /><div class="messages" align="center"><?php echo $this->_tpl_vars['warning_edit_msg']; ?>
</div>
 	<?php endif; ?>

<?php echo '
<script type="text/javascript">
/**
 * used instead of window.open().
 *
 */
function launchEditStep(step_id)
{
  document.getElementById(\'stepsControls_step_id\').value=step_id;
  document.getElementById(\'stepsControls_doAction\').value=\'editStep\';
  document.getElementById(\'stepsControls\').submit();
}
</script>
'; ?>


<form id="stepsControls" name="stepsControls" method="post" action="lib/testcases/tcEdit.php">
  <input type="hidden" name="goback_url" value="<?php echo $this->_tpl_vars['goBackAction']; ?>
" />
  <input type="hidden" id="stepsControls_doAction" name="doAction" value="" />
  <input type="hidden" name="testcase_id" value="<?php echo $this->_tpl_vars['args_testcase']['testcase_id']; ?>
" />
  <input type="hidden" name="tcversion_id" value="<?php echo $this->_tpl_vars['args_testcase']['id']; ?>
" />
  <input type="hidden" name="has_been_executed" value="<?php echo $this->_tpl_vars['has_been_executed']; ?>
" />
  <input type="hidden" id="stepsControls_step_id" name="step_id" value="0" />
	<input type="hidden" id="stepsControls_show_mode" name="show_mode" value="<?php echo $this->_tpl_vars['gui']->show_mode; ?>
" />

<table class="simple">
  <?php if ($this->_tpl_vars['args_show_title'] == 'yes'): ?>
	<tr>
		<th colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
">
		<?php echo $this->_tpl_vars['args_testcase']['tc_external_id']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['args_testcase']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
	</tr>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['args_show_version'] == 'yes'): ?>
	  <tr>
	  	<td class="bold" colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['tcView_viewer_labels']['version']; ?>

	  	<?php echo ((is_array($_tmp=$this->_tpl_vars['args_testcase']['version'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	  	</td>
	  </tr>
	<?php endif; ?>

	<tr class="time_stamp_creation">
  		<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
">
      		<?php echo $this->_tpl_vars['tcView_viewer_labels']['title_created']; ?>
&nbsp;<?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['args_testcase']['creation_ts']), $this);?>
&nbsp;
      		<?php echo $this->_tpl_vars['tcView_viewer_labels']['by']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['author_userinfo']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  		</td>
  </tr>

 <?php if ($this->_tpl_vars['args_testcase']['updater_last_name'] != "" || $this->_tpl_vars['args_testcase']['updater_first_name'] != ""): ?>
	<tr class="time_stamp_creation">
  		<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
">
    		<?php echo $this->_tpl_vars['tcView_viewer_labels']['title_last_mod']; ?>
&nbsp;<?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['args_testcase']['modification_ts']), $this);?>

		  	&nbsp;<?php echo $this->_tpl_vars['tcView_viewer_labels']['by']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['updater_userinfo']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

    	</td>
  </tr>
 <?php endif; ?>
 


	<tr>
		<td class="bold" colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['tcView_viewer_labels']['summary']; ?>
</td>
	</tr>
	<tr>
		<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['args_testcase']['summary']; ?>
</td>
	</tr>

	<tr>
		<td class="bold" colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['tcView_viewer_labels']['preconditions']; ?>
</td>
	</tr>
	<tr>
		<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['args_testcase']['preconditions']; ?>
</td>
	</tr>

		<?php if ($this->_tpl_vars['args_cf']['before_steps_results'] != ''): ?>
	<tr>
	  <td>
    <?php echo $this->_tpl_vars['args_cf']['before_steps_results']; ?>

    </td>
	</tr>
	<?php endif; ?>


	<?php if ($this->_tpl_vars['args_testcase']['steps'] != ''): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_steps.tpl", 'smarty_include_vars' => array('layout' => $this->_tpl_vars['gui']->steps_results_layout,'edit_enabled' => $this->_tpl_vars['edit_enabled'],'steps' => $this->_tpl_vars['args_testcase']['steps'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
</table>

<div <?php echo $this->_tpl_vars['addInfoDivStyle']; ?>
>
  <?php if ($this->_tpl_vars['edit_enabled']): ?>
  <input type="submit" name="create_step" 
  	 	   onclick="doAction.value='createStep';<?php echo $this->_tpl_vars['gui']->submitCode; ?>
" value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_create_step']; ?>
" />

  <span class="order_info" style='display:none'>
  <input type="submit" name="renumber_step" 
  	 	   onclick="doAction.value='doReorderSteps';<?php echo $this->_tpl_vars['gui']->submitCode; ?>
;validateStepsReorder('stepsControls');" 
  	 	   value="<?php echo $this->_tpl_vars['tcView_viewer_labels']['btn_reorder_steps']; ?>
" />
  </span>
  <?php endif; ?>
</div>
</form>

<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->automationEnabled): ?>
  <div <?php echo $this->_tpl_vars['addInfoDivStyle']; ?>
>
		<span class="labelHolder"><?php echo $this->_tpl_vars['tcView_viewer_labels']['execution_type']; ?>
 <?php echo @TITLE_SEP; ?>
</span>
		<?php echo $this->_tpl_vars['gui']->execution_types[$this->_tpl_vars['args_testcase']['execution_type']]; ?>

	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
   <div <?php echo $this->_tpl_vars['addInfoDivStyle']; ?>
>
		<span class="labelHolder"><?php echo $this->_tpl_vars['tcView_viewer_labels']['test_importance']; ?>
 <?php echo @TITLE_SEP; ?>
</span>
		<?php echo $this->_tpl_vars['gsmarty_option_importance'][$this->_tpl_vars['args_testcase']['importance']]; ?>

	</div>
<?php endif; ?>

  	<?php if ($this->_tpl_vars['args_cf']['standard_location'] != ''): ?>
	<div <?php echo $this->_tpl_vars['addInfoDivStyle']; ?>
>
        <div id="cfields_design_time" class="custom_field_container"><?php echo $this->_tpl_vars['args_cf']['standard_location']; ?>
</div>
	</div>
	<?php endif; ?>

	<div <?php echo $this->_tpl_vars['addInfoDivStyle']; ?>
>
		<table cellpadding="0" cellspacing="0" style="font-size:100%;">
			    <tr>
			     	<td width="35%" style="vertical-align:top;"><a href=<?php echo $this->_tpl_vars['gsmarty_href_keywordsView']; ?>
><?php echo $this->_tpl_vars['tcView_viewer_labels']['keywords']; ?>
</a>: &nbsp;
					</td>
				 	<td style="vertical-align:top;">
				 	  	<?php $_from = $this->_tpl_vars['args_keywords_map']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword_item']):
?>
						    <?php echo ((is_array($_tmp=$this->_tpl_vars['keyword_item']['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

						    <br />
	      				<?php endforeach; else: ?>
    	  					<?php echo $this->_tpl_vars['tcView_viewer_labels']['none']; ?>

						<?php endif; unset($_from); ?>
					</td>
				</tr>
				</table>
	</div>

	<?php if ($this->_tpl_vars['gui']->opt_requirements == TRUE && $this->_tpl_vars['gui']->view_req_rights == 'yes'): ?>
	<div <?php echo $this->_tpl_vars['addInfoDivStyle']; ?>
>
		<table cellpadding="0" cellspacing="0" style="font-size:100%;">
     			  <tr>
       			  <td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
" style="vertical-align:text-top;"><span><a title="<?php echo $this->_tpl_vars['tcView_viewer_labels']['requirement_spec']; ?>
" href="<?php echo $this->_tpl_vars['hrefReqSpecMgmt']; ?>
"
      				target="mainframe" class="bold"><?php echo $this->_tpl_vars['tcView_viewer_labels']['Requirements']; ?>
</a>
      				: &nbsp;</span>
      			  </td>
      			  <td>
      				<?php unset($this->_sections['item']);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['args_reqs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
      					<span onclick="javascript: open_top('<?php echo $this->_tpl_vars['hrefReqMgmt']; ?>
<?php echo $this->_tpl_vars['args_reqs'][$this->_sections['item']['index']]['id']; ?>
');"
      					style="cursor:  pointer;  color: #059; ">[<?php echo ((is_array($_tmp=$this->_tpl_vars['args_reqs'][$this->_sections['item']['index']]['req_spec_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
]&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['args_reqs'][$this->_sections['item']['index']]['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['args_reqs'][$this->_sections['item']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
      					<?php if (! $this->_sections['item']['last']): ?><br /><?php endif; ?>
      				<?php endfor; else: ?>
      					<?php echo $this->_tpl_vars['tcView_viewer_labels']['none']; ?>

      				<?php endif; ?>
      			  </td>
    		    </tr>
	  </table>
	</div>
	<?php endif; ?>
	
<?php if ($this->_tpl_vars['args_linked_versions'] != null): ?>
    <br />
	<div <?php echo $this->_tpl_vars['addInfoDivStyle']; ?>
>
	  <span class="bold"> <?php echo $this->_tpl_vars['tcView_viewer_labels']['testplan_usage']; ?>
 </span>
		<table class="simple sortable">
    <th><?php echo $this->_tpl_vars['tcView_viewer_labels']['version']; ?>
</th>
    <th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['tcView_viewer_labels']['test_plan']; ?>
</th>
    <th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['tcView_viewer_labels']['platform']; ?>
</th>
    <?php $_from = $this->_tpl_vars['args_linked_versions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link2tplan_platform']):
?>
      <?php $_from = $this->_tpl_vars['link2tplan_platform']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tplan_id'] => $this->_tpl_vars['link2platform']):
?>
        <?php $_from = $this->_tpl_vars['link2platform']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['version_info']):
?>
          <tr>
          <td style="width:10%;text-align:center;"><?php echo $this->_tpl_vars['version_info']['version']; ?>
</td>
          <td><?php echo ((is_array($_tmp=$this->_tpl_vars['version_info']['tplan_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
          <td>
                    <?php if ($this->_tpl_vars['version_info']['platform_id'] > 0): ?>
            <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->platforms[$this->_tpl_vars['version_info']['platform_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

          <?php endif; ?>          
          </td>
          </tr>
        <?php endforeach; endif; unset($_from); ?>
      <?php endforeach; endif; unset($_from); ?>
    <?php endforeach; endif; unset($_from); ?>
	  </table>
	</div>
<?php endif; ?>