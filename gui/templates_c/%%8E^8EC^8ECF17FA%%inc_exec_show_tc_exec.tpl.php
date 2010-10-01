<?php /* Smarty version 2.6.26, created on 2010-09-27 15:50:41
         compiled from execute/inc_exec_show_tc_exec.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'execute/inc_exec_show_tc_exec.tpl', 45, false),array('function', 'localize_timestamp', 'execute/inc_exec_show_tc_exec.tpl', 131, false),array('function', 'localize_tc_status', 'execute/inc_exec_show_tc_exec.tpl', 144, false),array('function', 'cycle', 'execute/inc_exec_show_tc_exec.tpl', 204, false),array('modifier', 'escape', 'execute/inc_exec_show_tc_exec.tpl', 94, false),array('modifier', 'replace', 'execute/inc_exec_show_tc_exec.tpl', 138, false),)), $this); ?>
	
 	<?php $_from = $this->_tpl_vars['gui']->map_last_exec; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tc_exec']):
?>

    <?php $this->assign('tc_id', $this->_tpl_vars['tc_exec']['testcase_id']); ?>
	  <?php $this->assign('tcversion_id', $this->_tpl_vars['tc_exec']['id']); ?>
	  	  <?php $this->assign('version_number', $this->_tpl_vars['tc_exec']['version']); ?>
	  
		<input type='hidden' name='tc_version[<?php echo $this->_tpl_vars['tcversion_id']; ?>
]' value='<?php echo $this->_tpl_vars['tc_id']; ?>
' />
		<input type='hidden' name='version_number[<?php echo $this->_tpl_vars['tcversion_id']; ?>
]' value='<?php echo $this->_tpl_vars['version_number']; ?>
' />

        <?php echo lang_get_smarty(array('s' => 'th_testsuite','var' => 'container_title'), $this);?>

    <?php $this->assign('div_id', "tsdetails_".($this->_tpl_vars['tc_id'])); ?>
    <?php $this->assign('memstatus_id', "tsdetails_view_status_".($this->_tpl_vars['tc_id'])); ?>
    <?php $this->assign('ts_name', $this->_tpl_vars['tsuite_info'][$this->_tpl_vars['tc_id']]['tsuite_name']); ?>
    <?php $this->assign('container_title', ($this->_tpl_vars['container_title']).($this->_tpl_vars['title_sep']).($this->_tpl_vars['ts_name'])); ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_hide_mgmt.tpl", 'smarty_include_vars' => array('show_hide_container_title' => $this->_tpl_vars['container_title'],'show_hide_container_id' => $this->_tpl_vars['div_id'],'show_hide_container_draw' => false,'show_hide_container_class' => 'exec_additional_info','show_hide_container_view_status_id' => $this->_tpl_vars['memstatus_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<div id="<?php echo $this->_tpl_vars['div_id']; ?>
" name="<?php echo $this->_tpl_vars['div_id']; ?>
" class="exec_additional_info">
      <br />
      <div class="exec_testsuite_details" style="width:95%;">
      <span class="legend_container"><?php echo $this->_tpl_vars['labels']['details']; ?>
</span><br />
		  <?php echo $this->_tpl_vars['tsuite_info'][$this->_tpl_vars['tc_id']]['details']; ?>

		  </div>

		  <?php if ($this->_tpl_vars['ts_cf_smarty'][$this->_tpl_vars['tc_id']] != ''): ?>
		    <br />
		    <div class="custom_field_container" style="border-color:black;width:95%;">
         <?php echo $this->_tpl_vars['ts_cf_smarty'][$this->_tpl_vars['tc_id']]; ?>

        </div>
		  <?php endif; ?>

  		<?php if ($this->_tpl_vars['gui']->tSuiteAttachments != null && $this->_tpl_vars['gui']->tSuiteAttachments[$this->_tpl_vars['tc_exec']['tsuite_id']] != null): ?>
  		  <br />
		    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_attachments.tpl", 'smarty_include_vars' => array('attach_tableName' => 'nodes_hierarchy','attach_downloadOnly' => true,'attach_attachmentInfos' => $this->_tpl_vars['gui']->tSuiteAttachments[$this->_tpl_vars['tc_exec']['tsuite_id']],'attach_inheritStyle' => 1,'attach_tableClassName' => 'none','attach_tableStyles' => "background-color:#ffffcc;width:100%")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <?php endif; ?>
	    <br />
    </div>


		<div class="exec_tc_title">
				<?php if ($this->_tpl_vars['gui']->grants->edit_testcase): ?>
		<a href="javascript:openTCaseWindow(<?php echo $this->_tpl_vars['tc_exec']['testcase_id']; ?>
,<?php echo $this->_tpl_vars['tc_exec']['id']; ?>
,'editOnExec')">
		<img src="<?php echo @TL_THEME_IMG_DIR; ?>
/note_edit.png"  title="<?php echo $this->_tpl_vars['labels']['show_tcase_spec']; ?>
">
		</a>
		<?php endif; ?>
		
    <?php echo $this->_tpl_vars['labels']['title_test_case']; ?>
&nbsp;<?php echo $this->_tpl_vars['labels']['th_test_case_id']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tcasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['cfg']->testcase_cfg->glue_character; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tc_exec']['tc_external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 :: <?php echo $this->_tpl_vars['labels']['version']; ?>
: <?php echo $this->_tpl_vars['tc_exec']['version']; ?>

		<br />
		    <?php echo ((is_array($_tmp=$this->_tpl_vars['tc_exec']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
		    <?php if ($this->_tpl_vars['tc_exec']['assigned_user'] == ''): ?>
		      <?php echo $this->_tpl_vars['labels']['has_no_assignment']; ?>

		    <?php else: ?>
          <?php echo $this->_tpl_vars['labels']['assigned_to']; ?>
<?php echo $this->_tpl_vars['title_sep']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tc_exec']['assigned_user'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

        <?php endif; ?>
    </div>

 		<?php if ($this->_tpl_vars['cfg']->exec_cfg->show_last_exec_any_build): ?>
   		<?php $this->assign('abs_last_exec', $this->_tpl_vars['gui']->map_last_exec_any_build[$this->_tpl_vars['tcversion_id']]); ?>
 		  <?php $this->assign('my_build_name', ((is_array($_tmp=$this->_tpl_vars['abs_last_exec']['build_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
 		  <?php $this->assign('show_current_build', 1); ?>
    <?php endif; ?>
    <?php $this->assign('exec_build_title', ($this->_tpl_vars['build_title'])." ".($this->_tpl_vars['title_sep'])." ".($this->_tpl_vars['my_build_name'])); ?>


		<div id="execution_history" class="exec_history">
  		<div class="exec_history_title">
  		<?php if ($this->_tpl_vars['gui']->history_on): ?>
  		    <?php echo $this->_tpl_vars['labels']['execution_history']; ?>
 <?php echo $this->_tpl_vars['title_sep_type3']; ?>

  		    <?php if (! $this->_tpl_vars['cfg']->exec_cfg->show_history_all_builds): ?>
  		      <?php echo $this->_tpl_vars['exec_build_title']; ?>

  		    <?php endif; ?>
  		<?php else: ?>
  			  <?php echo $this->_tpl_vars['labels']['last_execution']; ?>

  			  <?php if ($this->_tpl_vars['show_current_build']): ?> <?php echo $this->_tpl_vars['labels']['exec_any_build']; ?>
 <?php endif; ?>
  			  <?php echo $this->_tpl_vars['title_sep_type3']; ?>
 <?php echo $this->_tpl_vars['exec_build_title']; ?>

  		<?php endif; ?>
  		</div>

				<?php if ($this->_tpl_vars['cfg']->exec_cfg->show_last_exec_any_build && $this->_tpl_vars['gui']->history_on == 0): ?>
        <?php if ($this->_tpl_vars['abs_last_exec']['status'] != '' && $this->_tpl_vars['abs_last_exec']['status'] != $this->_tpl_vars['tlCfg']->results['status_code']['not_run']): ?>
			    <?php $this->assign('status_code', $this->_tpl_vars['abs_last_exec']['status']); ?>
     			<div class="<?php echo $this->_tpl_vars['tlCfg']->results['code_status'][$this->_tpl_vars['status_code']]; ?>
">
     			<?php echo $this->_tpl_vars['labels']['date_time_run']; ?>
 <?php echo $this->_tpl_vars['title_sep']; ?>
 <?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['abs_last_exec']['execution_ts']), $this);?>

     			<?php echo $this->_tpl_vars['title_sep_type3']; ?>

     			<?php echo $this->_tpl_vars['labels']['test_exec_by']; ?>
 <?php echo $this->_tpl_vars['title_sep']; ?>
 
  				<?php if (isset ( $this->_tpl_vars['users'][$this->_tpl_vars['abs_last_exec']['tester_id']] )): ?>
  				  <?php echo ((is_array($_tmp=$this->_tpl_vars['users'][$this->_tpl_vars['abs_last_exec']['tester_id']]->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  				<?php else: ?>
  				  <?php $this->assign('deletedTester', $this->_tpl_vars['abs_last_exec']['tester_id']); ?>
            <?php $this->assign('deletedUserString', ((is_array($_tmp=$this->_tpl_vars['labels']['deleted_user'])) ? $this->_run_mod_handler('replace', true, $_tmp, "%s", $this->_tpl_vars['deletedTester']) : smarty_modifier_replace($_tmp, "%s", $this->_tpl_vars['deletedTester']))); ?>
            <?php echo $this->_tpl_vars['deletedUserString']; ?>

  				<?php endif; ?>  
     			<?php echo $this->_tpl_vars['title_sep_type3']; ?>

     			<?php echo $this->_tpl_vars['labels']['build']; ?>
<?php echo $this->_tpl_vars['title_sep']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['abs_last_exec']['build_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

     			<?php echo $this->_tpl_vars['title_sep_type3']; ?>

     			<?php echo $this->_tpl_vars['labels']['exec_status']; ?>
 <?php echo $this->_tpl_vars['title_sep']; ?>
 <?php echo translate_tc_status_smarty(array('s' => $this->_tpl_vars['status_code']), $this);?>

     			</div>

  		  <?php else: ?>
    		   <div class="not_run"><?php echo $this->_tpl_vars['labels']['test_status_not_run']; ?>
</div>
    			   <?php echo $this->_tpl_vars['labels']['tc_not_tested_yet']; ?>

   		  <?php endif; ?>
    <?php endif; ?>

        <?php if ($this->_tpl_vars['gui']->other_execs[$this->_tpl_vars['tcversion_id']]): ?>
      <?php $this->assign('my_colspan', $this->_tpl_vars['attachment_model']->num_cols); ?>
      
      <?php if ($this->_tpl_vars['gui']->history_on == 0 && $this->_tpl_vars['show_current_build']): ?>
   		   <div class="exec_history_title">
  			    <?php echo $this->_tpl_vars['labels']['last_execution']; ?>
 <?php echo $this->_tpl_vars['labels']['exec_current_build']; ?>

  			    <?php echo $this->_tpl_vars['title_sep_type3']; ?>
 <?php echo $this->_tpl_vars['exec_build_title']; ?>

  			 </div>
		  <?php endif; ?>

		  <table cellspacing="0" class="exec_history">
			 <tr>
				<th style="text-align:left"><?php echo $this->_tpl_vars['labels']['date_time_run']; ?>
</th>
        
				<?php if ($this->_tpl_vars['gui']->history_on == 0 || $this->_tpl_vars['cfg']->exec_cfg->show_history_all_builds): ?>
				  <th style="text-align:left"><?php echo $this->_tpl_vars['labels']['build']; ?>
</th>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['gui']->has_platforms && ( $this->_tpl_vars['gui']->history_on == 0 || $this->_tpl_vars['cfg']->exec_cfg->show_history_all_platforms )): ?>
					<?php $this->assign('my_colspan', $this->_tpl_vars['my_colspan']+1); ?>
				  <th style="text-align:left"><?php echo $this->_tpl_vars['labels']['platform']; ?>
</th>
				<?php endif; ?>
				<th style="text-align:left"><?php echo $this->_tpl_vars['labels']['test_exec_by']; ?>
</th>
				<th style="text-align:center"><?php echo $this->_tpl_vars['labels']['exec_status']; ?>
</th>
				<th style="text-align:center"><?php echo $this->_tpl_vars['labels']['testcaseversion']; ?>
</th>
				
								<?php if ($this->_tpl_vars['attachment_model']->show_upload_column && $this->_tpl_vars['gsmarty_attachments']->enabled): ?>
						<th style="text-align:center"><?php echo $this->_tpl_vars['labels']['attachment_mgmt']; ?>
</th>
				<?php else: ?>		
            <?php $this->assign('my_colspan', $this->_tpl_vars['my_colspan']-1); ?>
        <?php endif; ?>

				<?php if ($this->_tpl_vars['gsmarty_bugInterfaceOn']): ?>
          <th style="text-align:left"><?php echo $this->_tpl_vars['labels']['bug_mgmt']; ?>
</th>
          <?php $this->assign('my_colspan', $this->_tpl_vars['my_colspan']+1); ?>
        <?php endif; ?>

				<?php if ($this->_tpl_vars['gui']->grants->delete_execution): ?>
          <th style="text-align:left"><?php echo $this->_tpl_vars['labels']['delete']; ?>
</th>
          <?php $this->assign('my_colspan', $this->_tpl_vars['my_colspan']+1); ?>
        <?php endif; ?>

        <th style="text-align:left"><?php echo $this->_tpl_vars['labels']['run_mode']; ?>
</th>
        <?php $this->assign('my_colspan', $this->_tpl_vars['my_colspan']+2); ?>
			 </tr>

						<?php $_from = $this->_tpl_vars['gui']->other_execs[$this->_tpl_vars['tcversion_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tc_old_exec']):
?>
  	     <?php $this->assign('tc_status_code', $this->_tpl_vars['tc_old_exec']['status']); ?>
			<?php echo smarty_function_cycle(array('values' => '#eeeeee,#d0d0d0','assign' => 'bg_color'), $this);?>

			<tr style="border-top:1px solid black; background-color: <?php echo $this->_tpl_vars['bg_color']; ?>
">
  			  <td>
            			  <?php if ($this->_tpl_vars['gui']->grants->edit_exec_notes && $this->_tpl_vars['tc_old_exec']['build_is_open']): ?>
  		      <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/note_edit.png" style="vertical-align:middle" 
  		           title="<?php echo $this->_tpl_vars['labels']['edit_execution']; ?>
" onclick="javascript: openExecEditWindow(
  		           <?php echo $this->_tpl_vars['tc_old_exec']['execution_id']; ?>
,<?php echo $this->_tpl_vars['tc_old_exec']['id']; ?>
,<?php echo $this->_tpl_vars['gui']->tplan_id; ?>
,<?php echo $this->_tpl_vars['gui']->tproject_id; ?>
);">
  		      <?php else: ?>
  		         <?php if ($this->_tpl_vars['gui']->grants->edit_exec_notes): ?>
  		            <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/note_edit_greyed.png" 
  		                 style="vertical-align:middle" title="<?php echo $this->_tpl_vars['labels']['closed_build']; ?>
">
  		         <?php endif; ?>
 			  <?php endif; ?>
  			  <?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['tc_old_exec']['execution_ts']), $this);?>

  			  </td>
				  <?php if ($this->_tpl_vars['gui']->history_on == 0 || $this->_tpl_vars['cfg']->exec_cfg->show_history_all_builds): ?>
  				<td><?php if (! $this->_tpl_vars['tc_old_exec']['build_is_open']): ?>
  				    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/lock.png" title="<?php echo $this->_tpl_vars['labels']['closed_build']; ?>
"><?php endif; ?>
  				    <?php echo ((is_array($_tmp=$this->_tpl_vars['tc_old_exec']['build_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  				</td>
  				<?php endif; ?>

				  <?php if ($this->_tpl_vars['gui']->has_platforms && ( $this->_tpl_vars['gui']->history_on == 0 || $this->_tpl_vars['cfg']->exec_cfg->show_history_all_platforms )): ?>
  				  <td>
					  <?php echo $this->_tpl_vars['tc_old_exec']['platform_name']; ?>

  				  </td>
  				<?php endif; ?>

  				<td>
  				<?php if (isset ( $this->_tpl_vars['users'][$this->_tpl_vars['tc_old_exec']['tester_id']] )): ?>
  				  <?php echo ((is_array($_tmp=$this->_tpl_vars['users'][$this->_tpl_vars['tc_old_exec']['tester_id']]->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  				<?php else: ?>
  				  <?php $this->assign('deletedTester', $this->_tpl_vars['tc_old_exec']['tester_id']); ?>
            <?php $this->assign('deletedUserString', ((is_array($_tmp=$this->_tpl_vars['labels']['deleted_user'])) ? $this->_run_mod_handler('replace', true, $_tmp, "%s", $this->_tpl_vars['deletedTester']) : smarty_modifier_replace($_tmp, "%s", $this->_tpl_vars['deletedTester']))); ?>
            <?php echo $this->_tpl_vars['deletedUserString']; ?>

  				<?php endif; ?>  
  				</td>
  				<td class="<?php echo $this->_tpl_vars['tlCfg']->results['code_status'][$this->_tpl_vars['tc_status_code']]; ?>
" style="text-align:center">
  				    <?php echo translate_tc_status_smarty(array('s' => $this->_tpl_vars['tc_old_exec']['status']), $this);?>

  				</td>
  				
  		   
  				<td  style="text-align:center"><?php echo $this->_tpl_vars['tc_old_exec']['tcversion_number']; ?>
</td>

		            <?php if (( $this->_tpl_vars['attachment_model']->show_upload_column && ! $this->_tpl_vars['att_download_only'] && $this->_tpl_vars['tc_old_exec']['build_is_open'] && $this->_tpl_vars['gsmarty_attachments']->enabled ) || ( $this->_tpl_vars['attachment_model']->show_upload_column && $this->_tpl_vars['gui']->history_on == 1 && $this->_tpl_vars['tc_old_exec']['build_is_open'] && $this->_tpl_vars['gsmarty_attachments']->enabled )): ?>
      			  <td align="center"><a href="javascript:openFileUploadWindow(<?php echo $this->_tpl_vars['tc_old_exec']['execution_id']; ?>
,'executions')">
      			    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/upload_16.png" title="<?php echo $this->_tpl_vars['labels']['alt_attachment_mgmt']; ?>
"
      			         alt="<?php echo $this->_tpl_vars['labels']['alt_attachment_mgmt']; ?>
"
      			         style="border:none" /></a>
              </td>
			  			  <?php else: ?>
			  	<?php if ($this->_tpl_vars['attachment_model']->show_upload_column && $this->_tpl_vars['gsmarty_attachments']->enabled): ?>
					<td align="center">
						<img src="<?php echo @TL_THEME_IMG_DIR; ?>
/upload_16_greyed.png" title="<?php echo $this->_tpl_vars['labels']['closed_build']; ?>
">
					</td>
				<?php endif; ?>
			    	      	  <?php endif; ?>
				
				    			<?php if ($this->_tpl_vars['gsmarty_bugInterfaceOn'] && $this->_tpl_vars['tc_old_exec']['build_is_open']): ?>
       		  	<td align="center"><a href="javascript:open_bug_add_window(<?php echo $this->_tpl_vars['tc_old_exec']['execution_id']; ?>
)">
      			    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/bug1.gif" title="<?php echo $this->_tpl_vars['labels']['img_title_bug_mgmt']; ?>
"
      			         style="border:none" /></a>
                </td>
                <?php else: ?>
                	<?php if ($this->_tpl_vars['gsmarty_bugInterfaceOn']): ?>
                		<td align="center">
							<img src="<?php echo @TL_THEME_IMG_DIR; ?>
/bug1_greyed.gif" title="<?php echo $this->_tpl_vars['labels']['closed_build']; ?>
">
						</td>
                	<?php endif; ?>
          		<?php endif; ?>

				    			<?php if ($this->_tpl_vars['gui']->grants->delete_execution && $this->_tpl_vars['tc_old_exec']['build_is_open']): ?>
       		  	<td align="center">
             	<a href="javascript:confirm_and_submit(msg,'execSetResults','exec_to_delete',
             	                                       <?php echo $this->_tpl_vars['tc_old_exec']['execution_id']; ?>
,'do_delete',1);">
      			    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash.png" title="<?php echo $this->_tpl_vars['labels']['img_title_delete_execution']; ?>
"
      			         style="border:none" /></a>
      			 </td>
      			<?php else: ?>
      				<?php if ($this->_tpl_vars['gui']->grants->delete_execution): ?>
      					<td align="center">
      						<img src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash_greyed.png" title="<?php echo $this->_tpl_vars['labels']['closed_build']; ?>
">
      					</td>
      				<?php endif; ?>
          		<?php endif; ?>

       		<td class="icon_cell" align="center">
       		  <?php if ($this->_tpl_vars['tc_old_exec']['execution_run_type'] == @TESTCASE_EXECUTION_TYPE_MANUAL): ?>
      		    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/user.png" title="<?php echo $this->_tpl_vars['labels']['execution_type_manual']; ?>
"
      		            style="border:none" />
       		  <?php else: ?>
      		    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/bullet_wrench.png" title="<?php echo $this->_tpl_vars['labels']['execution_type_auto']; ?>
"
      		            style="border:none" />
       		  <?php endif; ?>
          </td>



  			</tr>
 			  <?php if ($this->_tpl_vars['tc_old_exec']['execution_notes'] != ""): ?>
  			<script>
		        <?php echo '
        var panel_init = function(){
            var p = new Ext.Panel({
            title: '; ?>
'<?php echo $this->_tpl_vars['labels']['exec_notes']; ?>
'<?php echo ',
            collapsible:true,
            collapsed: true,
            baseCls: \'x-tl-panel\',
            renderTo: '; ?>
'exec_notes_container_<?php echo $this->_tpl_vars['tc_old_exec']['execution_id']; ?>
'<?php echo ',
            width:\'100%\',
            html:\'\'
            });

            p.on({\'expand\' : function(){load_notes(this,'; ?>
<?php echo $this->_tpl_vars['tc_old_exec']['execution_id']; ?>
<?php echo ');}});
        };
        panel_init_functions.push(panel_init);
        '; ?>


  			</script>
			<tr style="background-color: <?php echo $this->_tpl_vars['bg_color']; ?>
">
  			 <td colspan="<?php echo $this->_tpl_vars['my_colspan']; ?>
" id="exec_notes_container_<?php echo $this->_tpl_vars['tc_old_exec']['execution_id']; ?>
"
  			     style="padding:5px 5px 5px 5px;">
  			 </td>
   			</tr>
 			  <?php endif; ?>

  						<tr style="background-color: <?php echo $this->_tpl_vars['bg_color']; ?>
">
  			<td colspan="<?php echo $this->_tpl_vars['my_colspan']; ?>
">
  				<?php $this->assign('execID', $this->_tpl_vars['tc_old_exec']['execution_id']); ?>
  				<?php $this->assign('cf_value_info', $this->_tpl_vars['gui']->other_exec_cfields[$this->_tpl_vars['execID']]); ?>
          <?php echo $this->_tpl_vars['cf_value_info']; ?>

  			</td>
  			</tr>



  						<tr style="background-color: <?php echo $this->_tpl_vars['bg_color']; ?>
">
  			<td colspan="<?php echo $this->_tpl_vars['my_colspan']; ?>
">
  				<?php $this->assign('execID', $this->_tpl_vars['tc_old_exec']['execution_id']); ?>

  				<?php $this->assign('attach_info', $this->_tpl_vars['gui']->attachments[$this->_tpl_vars['execID']]); ?>
  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_attachments.tpl", 'smarty_include_vars' => array('attach_attachmentInfos' => $this->_tpl_vars['attach_info'],'attach_id' => $this->_tpl_vars['execID'],'attach_tableName' => 'executions','attach_show_upload_btn' => $this->_tpl_vars['attachment_model']->show_upload_btn,'attach_show_title' => $this->_tpl_vars['attachment_model']->show_title,'attach_downloadOnly' => $this->_tpl_vars['att_download_only'],'attach_tableClassName' => null,'attach_inheritStyle' => 0,'attach_tableStyles' => null)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  			</td>
  			</tr>

                <?php if ($this->_tpl_vars['gui']->bugs[$this->_tpl_vars['execID']] != ""): ?>
		<tr style="background-color: <?php echo $this->_tpl_vars['bg_color']; ?>
">
   			<td colspan="<?php echo $this->_tpl_vars['my_colspan']; ?>
">
   				   				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_bug_table.tpl", 'smarty_include_vars' => array('bugs_map' => $this->_tpl_vars['gui']->bugs[$this->_tpl_vars['execID']],'can_delete' => $this->_tpl_vars['tc_old_exec']['build_is_open'],'exec_id' => $this->_tpl_vars['execID'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   			</td>
   		</tr>
   		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
			
			</table>
		<?php endif; ?>
  </div>

  <br />
    <div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "execute/inc_exec_test_spec.tpl", 'smarty_include_vars' => array('args_tc_exec' => $this->_tpl_vars['tc_exec'],'args_labels' => $this->_tpl_vars['labels'],'args_enable_custom_field' => $this->_tpl_vars['enable_custom_fields'],'args_execution_time_cf' => $this->_tpl_vars['gui']->execution_time_cfields,'args_design_time_cf' => $this->_tpl_vars['gui']->design_time_cfields,'args_testplan_design_time_cf' => $this->_tpl_vars['gui']->testplan_design_time_cfields,'args_execution_types' => $this->_tpl_vars['gui']->execution_types,'args_tcAttachments' => $this->_tpl_vars['gui']->tcAttachments,'args_req_details' => $this->_tpl_vars['gui']->req_details,'args_cfg' => $this->_tpl_vars['cfg'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php if ($this->_tpl_vars['tc_exec']['can_be_executed']): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "execute/inc_exec_controls.tpl", 'smarty_include_vars' => array('args_save_type' => 'single','args_input_enable_mgmt' => $this->_tpl_vars['input_enabled_disabled'],'args_tcversion_id' => $this->_tpl_vars['tcversion_id'],'args_webeditor' => $this->_tpl_vars['gui']->exec_notes_editors[$this->_tpl_vars['tc_id']],'args_labels' => $this->_tpl_vars['labels'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  <?php endif; ?>
 	  <?php if ($this->_tpl_vars['tc_exec']['active'] == 0): ?>
 	   <h1 class="title"><center><?php echo $this->_tpl_vars['labels']['testcase_version_is_inactive_on_exec']; ?>
</center></h1>
 	  <?php endif; ?>
	<hr />
	</div>
  
	<?php endforeach; endif; unset($_from); ?>