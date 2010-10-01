<?php /* Smarty version 2.6.26, created on 2010-09-29 14:18:31
         compiled from results/resultsMoreBuilds.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/resultsMoreBuilds.tpl', 12, false),array('function', 'cycle', 'results/resultsMoreBuilds.tpl', 229, false),array('modifier', 'escape', 'results/resultsMoreBuilds.tpl', 54, false),array('modifier', 'strip_tags', 'results/resultsMoreBuilds.tpl', 245, false),array('modifier', 'date_format', 'results/resultsMoreBuilds.tpl', 281, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "query_metrics_report,th_test_plan,th_builds,th_test_suites,th_keyword,
             assigned_to,th_last_result,th_start_time,th_end_time,th_executor,results_all,
             th_total_cases,th_total_pass,th_total_fail,th_total_block,th_total_not_run,
             generated_by_TestLink_on,test_status_not_run,display_results_tc,results_latest,
             th_test_case_id,th_build,th_tester_id,th_execution_ts,th_status,th_notes,th_bugs,
             th_test_case,th_platform,
             th_search_notes_string,any,caption_user_selected_query_parameters"), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','enableTableSorting' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
var bAllShown = false;
var g_progress = null;
var g_pCount = 0;
progress();
</script>
</head>
<body>
<?php $this->assign('depth', '0'); ?>
<h1 class="title"><?php echo $this->_tpl_vars['labels']['query_metrics_report']; ?>
</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => $this->_tpl_vars['gui']->tplan_name)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui']->display->query_params): ?>
	<h2><?php echo $this->_tpl_vars['labels']['caption_user_selected_query_parameters']; ?>
</h2>
	<table class="simple" style="width: 100%; text-align:center; margin-left: 0px;" border="0">
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_test_plan']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_builds']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_test_suites']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_keyword']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['assigned_to']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_last_result']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_start_time']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_end_time']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_executor']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_search_notes_string']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['display_results_tc']; ?>
</th>
		</tr>
		<tr>
			<td>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tplan_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			</td>
			<td>
				<?php $_from = $this->_tpl_vars['gui']->buildsSelected; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['build_id']):
?>
				    <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->builds_html[$this->_tpl_vars['build_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <br />
				<?php endforeach; endif; unset($_from); ?>
			</td>
			<td>
				<?php $_from = $this->_tpl_vars['gui']->testsuitesSelected; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tsuite_name']):
?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['tsuite_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <br />
				<?php endforeach; endif; unset($_from); ?>
			</td>
			<td>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->keywordSelected)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
	<br />
			</td>

			<td>
			  <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->ownerSelected)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				&nbsp;
			</td>
      <td>
				<?php $_from = $this->_tpl_vars['gui']->lastStatus; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['status_localized']):
?>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['status_localized'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <br />
				<?php endforeach; endif; unset($_from); ?>
      </td>

			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->startTime)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->endTime)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
			<td>
			  <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->executorSelected)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				&nbsp;
			</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->search_notes_string)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
			<?php if (( $this->_tpl_vars['gui']->display->latest_results == 0 )): ?>
			<td><?php echo $this->_tpl_vars['labels']['results_latest']; ?>
</td>
			<?php else: ?>
			<td><?php echo $this->_tpl_vars['labels']['results_all']; ?>
</td>
			<?php endif; ?>
		</tr>
	</table>
<?php endif; ?>


<?php if ($this->_tpl_vars['gui']->display->totals): ?>
	<table class="simple" style="color: blue; width: 100%; text-align:center; margin-left: 0px;" border="0">
		<tr>
		  <?php $_from = $this->_tpl_vars['gui']->totals->labels; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l18n']):
?>
			<th><?php echo $this->_tpl_vars['l18n']; ?>
</th>
      <?php endforeach; endif; unset($_from); ?>
		</tr>
		<tr>
		  <?php $_from = $this->_tpl_vars['gui']->totals->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['figure']):
?>
			<td><?php echo $this->_tpl_vars['figure']; ?>
</td>
      <?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
<?php endif; ?>

	<?php if (! $this->_tpl_vars['gui']->display->suite_summaries): ?>
		<table class="simple sortable" style="color:blue; width: 100%; margin-left: 0px;" border="0">
			<tr>
				<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_test_case']; ?>
</th>
				<?php if ($this->_tpl_vars['gui']->showPlatforms): ?>
					<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_platform']; ?>
</th>
				<?php endif; ?>
				<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_build']; ?>
</th>
				<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_tester_id']; ?>
</th>
				<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_execution_ts']; ?>
</th>
				<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_status']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_notes']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_bugs']; ?>
</th>
				<th>Attachments</th>
			</tr>
	<?php endif; ?>

	<?php $_from = $this->_tpl_vars['gui']->flatArray; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['array']):
?>
		<?php if (( $this->_tpl_vars['id'] % 3 ) == 0): ?>
			<?php $this->assign('depthChange', $this->_tpl_vars['gui']->flatArray[$this->_tpl_vars['id']]); ?>
		<?php elseif (( $this->_tpl_vars['id'] % 3 ) == 1): ?>
			<?php $this->assign('suiteNameText', $this->_tpl_vars['gui']->flatArray[$this->_tpl_vars['id']]); ?>
		<?php elseif (( $this->_tpl_vars['id'] % 3 ) == 2): ?>
			<?php $this->assign('currentSuiteId', $this->_tpl_vars['gui']->flatArray[$this->_tpl_vars['id']]); ?>

			<!-- KL - 20061021 - make sure  suite is even in mapOfSuiteSummary -->
			<?php if (( $this->_tpl_vars['depthChange'] == 0 ) && ( $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>
			<?php elseif (( $this->_tpl_vars['depthChange'] > 0 ) && ( $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>
				<?php unset($this->_sections['loopOutDivs']);
$this->_sections['loopOutDivs']['name'] = 'loopOutDivs';
$this->_sections['loopOutDivs']['loop'] = is_array($_loop=($this->_tpl_vars['gui'])."->flatArray") ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loopOutDivs']['max'] = (int)($this->_tpl_vars['depthChange']);
$this->_sections['loopOutDivs']['show'] = true;
if ($this->_sections['loopOutDivs']['max'] < 0)
    $this->_sections['loopOutDivs']['max'] = $this->_sections['loopOutDivs']['loop'];
$this->_sections['loopOutDivs']['step'] = 1;
$this->_sections['loopOutDivs']['start'] = $this->_sections['loopOutDivs']['step'] > 0 ? 0 : $this->_sections['loopOutDivs']['loop']-1;
if ($this->_sections['loopOutDivs']['show']) {
    $this->_sections['loopOutDivs']['total'] = min(ceil(($this->_sections['loopOutDivs']['step'] > 0 ? $this->_sections['loopOutDivs']['loop'] - $this->_sections['loopOutDivs']['start'] : $this->_sections['loopOutDivs']['start']+1)/abs($this->_sections['loopOutDivs']['step'])), $this->_sections['loopOutDivs']['max']);
    if ($this->_sections['loopOutDivs']['total'] == 0)
        $this->_sections['loopOutDivs']['show'] = false;
} else
    $this->_sections['loopOutDivs']['total'] = 0;
if ($this->_sections['loopOutDivs']['show']):

            for ($this->_sections['loopOutDivs']['index'] = $this->_sections['loopOutDivs']['start'], $this->_sections['loopOutDivs']['iteration'] = 1;
                 $this->_sections['loopOutDivs']['iteration'] <= $this->_sections['loopOutDivs']['total'];
                 $this->_sections['loopOutDivs']['index'] += $this->_sections['loopOutDivs']['step'], $this->_sections['loopOutDivs']['iteration']++):
$this->_sections['loopOutDivs']['rownum'] = $this->_sections['loopOutDivs']['iteration'];
$this->_sections['loopOutDivs']['index_prev'] = $this->_sections['loopOutDivs']['index'] - $this->_sections['loopOutDivs']['step'];
$this->_sections['loopOutDivs']['index_next'] = $this->_sections['loopOutDivs']['index'] + $this->_sections['loopOutDivs']['step'];
$this->_sections['loopOutDivs']['first']      = ($this->_sections['loopOutDivs']['iteration'] == 1);
$this->_sections['loopOutDivs']['last']       = ($this->_sections['loopOutDivs']['iteration'] == $this->_sections['loopOutDivs']['total']);
?>
				<?php if ($this->_tpl_vars['gui']->display->suite_summaries): ?>
					<div class="workBack">
				<?php endif; ?>
				<?php endfor; endif; ?>
			<?php elseif (( $this->_tpl_vars['depthChange'] == -1 ) && ( $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>
					</div>
			<?php elseif (( $this->_tpl_vars['depthChange'] == -2 ) && ( $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>
					</div></div>
			<?php elseif (( $this->_tpl_vars['depthChange'] == -3 ) && ( $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>
					</div></div></div>
			<?php elseif (( $this->_tpl_vars['depthChange'] == -4 ) && ( $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>
				 </div></div></div></div>
			<?php elseif (( $this->_tpl_vars['depthChange'] == -5 ) && ( $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>
				</div></div></div></div></div>
			<!-- handle scenario where suite is not in test plan -->
			<?php elseif (( ! $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']] )): ?>

			<?php endif; ?>

			<?php $this->assign('previousDepth', $this->_tpl_vars['depth']); ?>
			<?php if ($this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']]): ?>
			    			    
			<?php if ($this->_tpl_vars['gui']->display->suite_summaries): ?>
			<h2><?php echo $this->_tpl_vars['suiteNameText']; ?>
</h2>
			<table class="simple" style="color:blue; width: 100%; text-align:center; margin-left: 0px;" border="0">
				<tr>
				  <?php $_from = $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['status'] => $this->_tpl_vars['figure']):
?>
              <?php if ($this->_tpl_vars['status'] == 'total'): ?> 
                  <th><?php echo $this->_tpl_vars['labels']['th_total_cases']; ?>
</th>
              <?php else: ?>
                  <th><?php echo lang_get_smarty(array('s' => $this->_tpl_vars['gui']->resultsCfg['status_label'][$this->_tpl_vars['status']]), $this);?>
</th>
              <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?>
				</tr>
				<tr>
				  <?php $_from = $this->_tpl_vars['gui']->mapOfSuiteSummary[$this->_tpl_vars['currentSuiteId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['status'] => $this->_tpl_vars['figure']):
?>
					    <td><?php echo $this->_tpl_vars['figure']; ?>
</td>
          <?php endforeach; endif; unset($_from); ?>
          				</tr>
			</table>
			<?php endif; ?>
			<?php else: ?>
				<?php if ($this->_tpl_vars['gui']->display->suite_summaries): ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
      
      <?php if ($this->_tpl_vars['gui']->display->test_cases): ?>
			
	        <?php $_from = $this->_tpl_vars['gui']->suiteList; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['suiteId'] => $this->_tpl_vars['array']):
?>
			    				    	<?php if (( $this->_tpl_vars['suiteId'] == $this->_tpl_vars['currentSuiteId'] )): ?>
			    				    	<?php if ($this->_tpl_vars['gui']->suiteList[$this->_tpl_vars['suiteId']]): ?>
			    		<?php if ($this->_tpl_vars['gui']->display->suite_summaries): ?>
			    			<table class="simple sortable" style="width: 100%;margin-left: 0px;" border="0">
			    		<?php endif; ?>
			    
			    		<?php if ($this->_tpl_vars['gui']->display->suite_summaries): ?>
			    		<tr>
			    			<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_test_case']; ?>
</th>
			    			<?php if ($this->_tpl_vars['gui']->showPlatforms): ?>
			    			  <th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_platform']; ?>
</th>
			    			<?php endif; ?>
			    			<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_build']; ?>
</th>
			    			<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_tester_id']; ?>
</th>
			    			<th><?php echo $this->_tpl_vars['labels']['th_execution_ts']; ?>
</th>
			    			<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_status']; ?>
</th>
			    			<th><?php echo $this->_tpl_vars['labels']['th_notes']; ?>
</th>
			    			<th><?php echo $this->_tpl_vars['labels']['th_bugs']; ?>
</th>
						<th>Attachments</th>
			    		</tr>
			    		<?php endif; ?>
			    		<?php $_from = $this->_tpl_vars['gui']->suiteList[$this->_tpl_vars['suiteId']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['executionInstance'] => $this->_tpl_vars['array']):
?>
			    			<?php $this->assign('inst', $this->_tpl_vars['gui']->suiteList[$this->_tpl_vars['suiteId']][$this->_tpl_vars['executionInstance']]); ?>

			    			<?php if ($this->_tpl_vars['gui']->displayResults[$this->_tpl_vars['inst']['status']]): ?>
			    			<tr style="background-color:<?php echo smarty_function_cycle(array('values' => '#eeeeee,#d0d0d0'), $this);?>
">
								  <?php if ($this->_tpl_vars['inst']['status'] == $this->_tpl_vars['gui']->resultsCfg['status_code']['not_run']): ?>
								  	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['inst']['testcasePrefix'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['inst']['external_id']; ?>
:&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['inst']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								  	<?php if ($this->_tpl_vars['gui']->showPlatforms): ?>
								  	  <td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->platformSet[$this->_sections['inst']['platform_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								  	<?php endif; ?>
								  	<td>&nbsp;</td>
								  	<td>&nbsp;</td>
								  	<td>&nbsp;</td>
								  <?php else: ?>
								  	<td><?php echo $this->_tpl_vars['inst']['execute_link']; ?>
</td>
									<?php if ($this->_tpl_vars['gui']->showPlatforms): ?>
										<td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->platformSet[$this->_tpl_vars['inst']['platform_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
									<?php endif; ?>
								  	<td style="text-align:center;"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->builds_html[$this->_tpl_vars['inst']['build_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								  	<td style="text-align:center;"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->users[$this->_tpl_vars['inst']['tester_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								  	<td style="text-align:center;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['inst']['execution_ts'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
								  <?php endif; ?>
									
									<td class="<?php echo $this->_tpl_vars['gui']->resultsCfg['code_status'][$this->_tpl_vars['inst']['status']]; ?>
" style="text-align:center;"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->statusLabels[$this->_tpl_vars['inst']['status']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
								  
								  <?php if ($this->_tpl_vars['inst']['status'] == $this->_tpl_vars['gui']->resultsCfg['status_code']['not_run']): ?>
								  	<td>&nbsp;</td>
								  	<td>&nbsp;</td>
								  	<td style="text-align:center;">No&nbsp;</td>
								  <?php else: ?>
								  	<td><?php echo $this->_tpl_vars['inst']['notes']; ?>
&nbsp;</td>
								  	<td style="text-align:center;"><?php echo $this->_tpl_vars['inst']['bugString']; ?>
&nbsp;</td>
                                                                        <?php if ($this->_tpl_vars['inst']['has_attach'] == 1): ?>
                                                                        <td style="text-align:center;">Yes&nbsp;</td>
									<?php else: ?>
                                                                        <td style="text-align:center;">No&nbsp;</td>
									<?php endif; ?>
                                                                  <?php endif; ?>          
							</tr>
			    			<?php endif; ?>

			    		<?php endforeach; endif; unset($_from); ?>
			    		<?php if ($this->_tpl_vars['gui']->display->suite_summaries): ?>
			    			</table>
			    		<?php endif; ?>
			    	<?php endif; ?>
			    	<?php endif; ?>
			    <?php endforeach; endif; unset($_from); ?>
			 <?php endif; ?>   
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>

		<?php if (! $this->_tpl_vars['gui']->display->suite_summaries): ?>
			</table>
		<?php endif; ?>

  <?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

</body>
</html>