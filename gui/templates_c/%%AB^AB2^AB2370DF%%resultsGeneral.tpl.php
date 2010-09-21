<?php /* Smarty version 2.6.26, created on 2010-09-09 13:55:27
         compiled from results/resultsGeneral.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/resultsGeneral.tpl', 11, false),array('modifier', 'escape', 'results/resultsGeneral.tpl', 54, false),array('modifier', 'date_format', 'results/resultsGeneral.tpl', 197, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'trep_kw,trep_owner,trep_comp,generated_by_TestLink_on, priority,
       	 th_overall_priority, th_progress, th_expected, th_overall, th_milestone,
       	 th_tc_priority_high, th_tc_priority_medium, th_tc_priority_low,
         title_res_by_kw,title_res_by_owner,title_res_by_top_level_suites,
         title_report_tc_priorities,title_report_milestones,
         title_metrics_x_build,title_res_by_platform,th_platform,important_notice,
         report_tcase_platorm_relationship, th_tc_total, th_completed, th_goal,
         th_build, th_tc_assigned, th_perc_completed'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<h1 class="title"><?php echo $this->_tpl_vars['gui']->title; ?>
</h1>

<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['session']['testprojectName'],'arg_tplan_name' => $this->_tpl_vars['gui']->tplan_name)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	

<?php if ($this->_tpl_vars['gui']->do_report['status_ok']): ?>

  <?php if ($this->_tpl_vars['gui']->showPlatforms): ?>
   <hr>
   <h2> <?php echo $this->_tpl_vars['labels']['important_notice']; ?>
</h2>
   <?php echo $this->_tpl_vars['labels']['report_tcase_platorm_relationship']; ?>

   <hr>
  <?php endif; ?>  
  		<h2><?php echo $this->_tpl_vars['labels']['title_metrics_x_build']; ?>
</h1>

	<table class="simple" style="width: 100%; text-align: center; margin-left: 0px;">
  	<tr>
  		<th style="width: 10%;"><?php echo $this->_tpl_vars['labels']['th_build']; ?>
</th>
    	    	<th><?php echo $this->_tpl_vars['labels']['th_tc_assigned']; ?>
</th>
      	<?php $_from = $this->_tpl_vars['buildColDefinition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['the_column']):
?>
        	<th><?php echo $this->_tpl_vars['the_column']['qty']; ?>
</th>
        	<th><?php echo $this->_tpl_vars['the_column']['percentage']; ?>
</th>
    	<?php endforeach; endif; unset($_from); ?>
    	<th><?php echo $this->_tpl_vars['labels']['th_perc_completed']; ?>
</th>
  	</tr>

	<?php $_from = $this->_tpl_vars['buildResults']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['res']):
?>
  	<tr>
  		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['res']['build_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  		<?php if (isset ( $this->_tpl_vars['res']['total_tc'] )): ?>
	  		<td><?php echo $this->_tpl_vars['res']['total_tc']; ?>
</td>
	    	<?php $_from = $this->_tpl_vars['buildColDefinition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['status'] => $this->_tpl_vars['the_column']):
?>
	        	<td><?php echo $this->_tpl_vars['res']['details'][$this->_tpl_vars['status']]['qty']; ?>
</td>
	        	<td><?php echo $this->_tpl_vars['res']['details'][$this->_tpl_vars['status']]['percentage']; ?>
</td>
	    	<?php endforeach; endif; unset($_from); ?>
	  		<td><?php echo $this->_tpl_vars['res']['percentage_completed']; ?>
</td>
	  	<?php else: ?>
	  		<?php $_from = $this->_tpl_vars['buildColDefinition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['the_column']):
?>
	  		<td>&nbsp;</td>
	  		<?php endforeach; endif; unset($_from); ?>
	  	<?php endif; ?>
  	</tr>
	<?php endforeach; endif; unset($_from); ?>
	
	</table>

  	
  	  	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "results/inc_results_show_table.tpl", 'smarty_include_vars' => array('args_title' => $this->_tpl_vars['labels']['title_res_by_top_level_suites'],'args_first_column_header' => $this->_tpl_vars['labels']['trep_comp'],'args_first_column_key' => 'tsuite_name','args_show_percentage' => false,'args_column_definition' => $this->_tpl_vars['gui']->columnsDefinition->testsuites,'args_column_data' => $this->_tpl_vars['gui']->statistics->testsuites)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  
  	
    <?php if ($this->_tpl_vars['gui']->showPlatforms): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "results/inc_results_show_table.tpl", 'smarty_include_vars' => array('args_title' => $this->_tpl_vars['labels']['title_res_by_platform'],'args_first_column_header' => $this->_tpl_vars['labels']['th_platform'],'args_first_column_key' => 'name','args_show_percentage' => true,'args_column_definition' => $this->_tpl_vars['gui']->columnsDefinition->platform,'args_column_data' => $this->_tpl_vars['gui']->statistics->platform)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "results/inc_results_show_table.tpl", 'smarty_include_vars' => array('args_title' => $this->_tpl_vars['labels']['title_report_tc_priorities'],'args_first_column_header' => $this->_tpl_vars['labels']['priority'],'args_first_column_key' => 'name','args_show_percentage' => true,'args_column_definition' => $this->_tpl_vars['gui']->columnsDefinition->platform,'args_column_data' => $this->_tpl_vars['gui']->statistics->priorities)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
  
  	  	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "results/inc_results_show_table.tpl", 'smarty_include_vars' => array('args_title' => $this->_tpl_vars['labels']['title_res_by_kw'],'args_first_column_header' => $this->_tpl_vars['labels']['trep_kw'],'args_first_column_key' => 'name','args_show_percentage' => true,'args_column_definition' => $this->_tpl_vars['gui']->columnsDefinition->keywords,'args_column_data' => $this->_tpl_vars['gui']->statistics->keywords)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


  	
	<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
		<?php if ($this->_tpl_vars['gui']->statistics->milestones != ""): ?>

			<h2><?php echo $this->_tpl_vars['labels']['title_report_milestones']; ?>
</h2>

			<table class="simple" style="width: 100%; text-align: center; margin-left: 0px;">
			<tr>
				<th><?php echo $this->_tpl_vars['labels']['th_milestone']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_tc_priority_high']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_expected']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_tc_priority_medium']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_expected']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_tc_priority_low']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_expected']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_overall']; ?>
</th>
			</tr>
 			<?php $_from = $this->_tpl_vars['gui']->statistics->milestones; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['res']):
?>
  			<tr>
  				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['res']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_open; ?>
 
  						<?php echo ((is_array($_tmp=$this->_tpl_vars['res']['target_date'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_close; ?>
</td>
	  			<td class="<?php if ($this->_tpl_vars['res']['high_incomplete']): ?>failed<?php else: ?>passed<?php endif; ?>">
	  					<?php echo $this->_tpl_vars['res']['result_high_percentage']; ?>
 % <?php echo $this->_tpl_vars['tlCfg']->gui_separator_open; ?>
 
	  					<?php echo $this->_tpl_vars['res']['results']['3']; ?>
 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_close; ?>
</td>
	  			<td><?php echo $this->_tpl_vars['res']['high_percentage']; ?>
 %</td>
	  			<td class="<?php if ($this->_tpl_vars['res']['medium_incomplete']): ?>failed<?php else: ?>passed<?php endif; ?>">
	  					<?php echo $this->_tpl_vars['res']['result_medium_percentage']; ?>
 % <?php echo $this->_tpl_vars['tlCfg']->gui_separator_open; ?>
 
	  					<?php echo $this->_tpl_vars['res']['results']['2']; ?>
 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_close; ?>
</td>
	  			<td><?php echo $this->_tpl_vars['res']['medium_percentage']; ?>
 %</td>
	  			<td class="<?php if ($this->_tpl_vars['res']['low_incomplete']): ?>failed<?php else: ?>passed<?php endif; ?>">
	  					<?php echo $this->_tpl_vars['res']['result_low_percentage']; ?>
 % <?php echo $this->_tpl_vars['tlCfg']->gui_separator_open; ?>
 
	  					<?php echo $this->_tpl_vars['res']['results']['1']; ?>
 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_close; ?>
</td>
	  			<td><?php echo $this->_tpl_vars['res']['low_percentage']; ?>
 %</td>
				<td><?php echo $this->_tpl_vars['res']['percentage_completed']; ?>
 %</td>
  			</tr>
  			<?php endforeach; endif; unset($_from); ?>
		</table>

	<?php endif; ?>
		
	<?php elseif ($this->_tpl_vars['gui']->statistics->milestones != ""): ?>
		<h2><?php echo $this->_tpl_vars['labels']['title_report_milestones']; ?>
</h2>

		<table class="simple" style="width: 100%; text-align: center; margin-left: 0px;">
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_milestone']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_tc_total']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_completed']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_progress']; ?>
</th>
			<th><?php echo $this->_tpl_vars['labels']['th_goal']; ?>
</th>
		</tr>

 		<?php $_from = $this->_tpl_vars['gui']->statistics->milestones; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['res']):
?>
  		<tr>
  			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['res']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_open; ?>

  					<?php echo ((is_array($_tmp=$this->_tpl_vars['res']['target_date'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_close; ?>
</td>
  			<td><?php echo $this->_tpl_vars['res']['tc_total']; ?>
</td>
  			<td><?php echo $this->_tpl_vars['res']['tc_completed']; ?>
</td>
			<td class="<?php if ($this->_tpl_vars['res']['all_incomplete']): ?>failed<?php else: ?>passed<?php endif; ?>">
					<?php echo $this->_tpl_vars['res']['percentage_completed']; ?>
 %</td>
			<td><?php echo $this->_tpl_vars['res']['B']; ?>
 %</td>
  		</tr>
  		<?php endforeach; endif; unset($_from); ?>
		</table>
	<?php endif; ?>

<?php else: ?>
  	<?php echo $this->_tpl_vars['gui']->do_report['msg']; ?>

<?php endif; ?>  
</div>

<p style="margin: 10px;"><?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>
</p>

</body>
</html>