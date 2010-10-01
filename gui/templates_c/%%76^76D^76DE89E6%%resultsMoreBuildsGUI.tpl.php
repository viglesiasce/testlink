<?php /* Smarty version 2.6.26, created on 2010-09-27 15:50:04
         compiled from results/resultsMoreBuildsGUI.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/resultsMoreBuildsGUI.tpl', 15, false),array('function', 'config_load', 'results/resultsMoreBuildsGUI.tpl', 23, false),array('function', 'html_select_date', 'results/resultsMoreBuildsGUI.tpl', 113, false),array('function', 'html_select_time', 'results/resultsMoreBuildsGUI.tpl', 119, false),array('modifier', 'basename', 'results/resultsMoreBuildsGUI.tpl', 22, false),array('modifier', 'replace', 'results/resultsMoreBuildsGUI.tpl', 22, false),array('modifier', 'escape', 'results/resultsMoreBuildsGUI.tpl', 70, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'enter_start_time,enter_end_time,date,hour,Yes,submit_query,
			   select_builds_header,select_components_header,report_display_options,
			   display_suite_summaries,display_test_cases,display_query_params,
			   display_totals,display_results_tc,results_latest,results_all,
			   search_in_notes,executor,No,query_metrics_report'), $this);?>


<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='results/resultsMoreBuildsGUI.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<h1 class="title"> <?php echo $this->_tpl_vars['labels']['query_metrics_report']; ?>
</h1>
<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => $this->_tpl_vars['gui']->tplan_name)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	


<?php if ($this->_tpl_vars['gui']->builds->qty > $this->_config[0]['vars']['BUILDS_COMBO_NUM_ITEMS']): ?>
  <?php $this->assign('build_qty', $this->_config[0]['vars']['BUILDS_COMBO_NUM_ITEMS']); ?>
<?php else: ?>
  <?php $this->assign('build_qty', $this->_tpl_vars['gui']->builds->qty); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->testsuites->qty > $this->_config[0]['vars']['TSUITES_COMBO_NUM_ITEMS']): ?>
  <?php $this->assign('testsuite_qty', $this->_config[0]['vars']['TSUITES_COMBO_NUM_ITEMS']); ?>
<?php else: ?>
  <?php $this->assign('testsuite_qty', $this->_tpl_vars['gui']->testsuites->qty); ?>
<?php endif; ?>

<?php $this->assign('keyword_qty', 1); ?>

<form action="lib/results/resultsMoreBuilds.php?report_type=<?php echo $this->_tpl_vars['gui']->report_type; ?>
" method="post">
  <input type="hidden" id="tplan_id" name="tplan_id" value="<?php echo $this->_tpl_vars['gui']->tplan_id; ?>
" />
  <div>
	<table class="simple" style="width: 100%; text-align: center; margin-left: 0px;">
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['select_builds_header']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['select_components_header']; ?>
</th>
		</tr>
		<tr>
			<td>
				<select name="build[]" size="<?php echo $this->_tpl_vars['build_qty']; ?>
" multiple="multiple">
					<?php $_from = $this->_tpl_vars['gui']->builds->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['buildid']):
?>
						<option value="<?php echo $this->_tpl_vars['gui']->builds->items[$this->_tpl_vars['row']]['id']; ?>
" selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->builds->items[$this->_tpl_vars['row']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
			<td>
       <select name="testsuite[]" size="<?php echo $this->_tpl_vars['testsuite_qty']; ?>
" multiple="multiple">
					<?php $_from = $this->_tpl_vars['gui']->testsuites->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row'] => $this->_tpl_vars['tsuite_name']):
?>
						<option value="<?php echo $this->_tpl_vars['gui']->testsuites->items[$this->_tpl_vars['row']]['id']; ?>
,<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testsuites->items[$this->_tpl_vars['row']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" 
						        selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testsuites->items[$this->_tpl_vars['row']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>
		<tr>
			<th><?php echo lang_get_smarty(array('s' => 'select_keyword_header'), $this);?>
</th>
			<th><?php echo lang_get_smarty(array('s' => 'select_last_result_header'), $this);?>
</th>
		</tr>
		<tr>
			<td>
				<select name="keyword" size="<?php echo $this->_tpl_vars['keyword_qty']; ?>
" >
					<?php $_from = $this->_tpl_vars['gui']->keywords->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword_id'] => $this->_tpl_vars['keyword_name']):
?>
						<option value="<?php echo $this->_tpl_vars['keyword_id']; ?>
" ><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->keywords->items[$this->_tpl_vars['keyword_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
				<td>
					<select name="lastStatus[]" size="<?php echo $this->_config[0]['vars']['TCSTATUS_COMBO_NUM_ITEMS']; ?>
" multiple="multiple">
					<?php $_from = $this->_tpl_vars['gui']->status_code_label; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['status_code'] => $this->_tpl_vars['status_label']):
?>
						<option selected="selected" value="<?php echo $this->_tpl_vars['status_code']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['status_label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>

		</tr>
		
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['enter_start_time']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['enter_end_time']; ?>
</th>
		</tr>
		<tr>
			<td align="center">
       <table border='0'>
       <tr>
       <td><?php echo $this->_tpl_vars['labels']['date']; ?>
</td><td><?php echo smarty_function_html_select_date(array('prefix' => 'start_','time' => $this->_tpl_vars['gui']->selected_start_date,'month_format' => '%m','start_year' => "-1",'end_year' => "+1",'field_order' => $this->_tpl_vars['gsmarty_html_select_date_field_order']), $this);?>
</td>
       </tr>
       <tr>
       <td><?php echo $this->_tpl_vars['labels']['hour']; ?>
</td>
       <td align='left'><?php echo smarty_function_html_select_time(array('prefix' => 'start_','display_minutes' => false,'time' => $this->_tpl_vars['gui']->selected_start_time,'display_seconds' => false,'use_24_hours' => true), $this);?>
</td>
       </tr>
			 </table>
			</td>

			<td align="center">
       <table border='0'>
       <tr>
       <td><?php echo $this->_tpl_vars['labels']['date']; ?>
</td><td><?php echo smarty_function_html_select_date(array('prefix' => 'end_','time' => $this->_tpl_vars['gui']->selected_end_date,'month_format' => '%m','start_year' => "-1",'end_year' => "+1",'field_order' => $this->_tpl_vars['gsmarty_html_select_date_field_order']), $this);?>
</td>
       </tr>
       <tr>
       <td><?php echo $this->_tpl_vars['labels']['hour']; ?>
</td>
       <td align='left'><?php echo smarty_function_html_select_time(array('prefix' => 'end_','display_minutes' => false,'time' => $this->_tpl_vars['gui']->selected_end_time,'display_seconds' => false,'use_24_hours' => true), $this);?>
</td>
       </tr>
			 </table>
			</td>


		</tr>
		<!-- 
		KL - 20070627 -Functionality to allow query by executor or grep the notes field
		     Allows user to change what data / results are displayed in report 
		-->
			<tr>
			  <th><?php echo lang_get_smarty(array('s' => 'select_owner_header'), $this);?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['executor']; ?>
</th>
			</tr>
			<tr>
			<td>
				<select name="owner">
					<?php $_from = $this->_tpl_vars['gui']->assigned_users->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['owner'] => $this->_tpl_vars['ownerid']):
?>
												<option value="<?php echo $this->_tpl_vars['owner']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['ownerid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
				<td>
					<select name="executor">
						<?php $_from = $this->_tpl_vars['gui']->assigned_users->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['executor'] => $this->_tpl_vars['executorid']):
?>
														<option value="<?php echo $this->_tpl_vars['executor']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['executorid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
			</tr>
  		<tr>
				<th><?php echo $this->_tpl_vars['labels']['search_in_notes']; ?>
</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td>
					<input type="text" name="search_notes_string"/>
				</td>
				<td>&nbsp;</td>
			</tr>
	    </table>
    </div>
    
    <div>
    <table border cellspacing=0 cellpadding=5 rules=groups width="100%">
     <caption align="top"><?php echo $this->_tpl_vars['labels']['report_display_options']; ?>
</caption>
      <tr>
      <td>
        <table>
         <tr>
         <td><?php echo $this->_tpl_vars['labels']['display_suite_summaries']; ?>
</td>
         <td><select name="display_suite_summaries">
		    				<option value="1"><?php echo $this->_tpl_vars['labels']['Yes']; ?>
</option>
		    				<option value="0" selected="selected"><?php echo $this->_tpl_vars['labels']['No']; ?>
</option>
		    			</select>
		     </td>
         <td><?php echo $this->_tpl_vars['labels']['display_test_cases']; ?>
</td>
         <td><select name="display_test_cases">
		    				<option value="1" selected="selected"><?php echo $this->_tpl_vars['labels']['Yes']; ?>
</option>
		    				<option value="0"><?php echo $this->_tpl_vars['labels']['No']; ?>
</option>
		    			</select>
		     </td>
		     		     <td><?php echo $this->_tpl_vars['labels']['display_results_tc']; ?>
</td>
		     <td><select name="display_latest_results">
		    				<option value="0"><?php echo $this->_tpl_vars['labels']['results_latest']; ?>
</option>
		    				<option value="1" selected="selected"><?php echo $this->_tpl_vars['labels']['results_all']; ?>
</option>
		    			</select>
		     </td>
		    </tr>
		    <tr>		
     		<td><?php echo $this->_tpl_vars['labels']['display_query_params']; ?>
</td>
     		<td><select name="display_query_params">
		    				<option value="1"><?php echo $this->_tpl_vars['labels']['Yes']; ?>
</option>
		    				<option value="0" selected="selected"><?php echo $this->_tpl_vars['labels']['No']; ?>
</option>
		    			</select>
    		</td>
		     <td><?php echo $this->_tpl_vars['labels']['display_totals']; ?>
</td>
		     <td><select name="display_totals">
		    				<option value="1"><?php echo $this->_tpl_vars['labels']['Yes']; ?>
</option>
		    				<option value="0" selected="selected"><?php echo $this->_tpl_vars['labels']['No']; ?>
</option>
		    			</select>
		    		</td>
	    	</tr>
		    </table>
		  </td>
		  <td>&nbsp;</td>
			<td>
				<input type="submit" value="<?php echo $this->_tpl_vars['labels']['submit_query']; ?>
"/>
			</td>
			</tr>
    </table>

</div>
</form>
</div>
</body>
</html>