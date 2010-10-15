<?php /* Smarty version 2.6.26, created on 2010-10-09 10:26:33
         compiled from inc_filter_panel_js.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'inc_filter_panel_js.tpl', 130, false),)), $this); ?>

<script type="text/javascript">

<?php if ($this->_tpl_vars['control']->filters['filter_assigned_user']): ?>
	<?php echo '
		/**
		 * Used to disable the "include unassigned testcases" checkbox when anything else 
		 * but a username is selected in "assigned to" select box.
		 * In case of a selected username the box will be activated again.
		 * (testcase execution & testcase execution assignment, BUGID 2455, BUGID 3026)
		 * 
		 * @author Andreas Simon
		 * @param filter_assigned_to combobox in which assignment is chosen
		 * @param include_unassigned checkbox for including unassigned testcases
		 * @param str_option_any string value anybody
		 * @param str_option_none string value nobody
		 * @param str_option_somebody string value somebody
		 */
		function triggerAssignedBox(filter_assigned_to_id, include_unassigned_id,
									str_option_any, str_option_none, str_option_somebody) {
			var filter_assigned_to = document.getElementById(filter_assigned_to_id);
			var include_unassigned = document.getElementById(include_unassigned_id);
			var index = filter_assigned_to.options.selectedIndex;
			var choice = filter_assigned_to.options[index].label;
			include_unassigned.disabled = false;
		
			if (choice == str_option_any || choice == str_option_none || choice == str_option_somebody) 
			{
				include_unassigned.disabled = true;
				include_unassigned.checked = false;
			} 
		}
	'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['control']->filters['filter_result']): ?>
	<?php echo '
		/**
		 * If filter method ("filter on...") selection is set to "specific build",
		 * enable build selector, otherwise disable it.
		 * (testcase execution & testcase execution assignment, BUGID 2455, BUGID 3026)
		 * 
		 * @author Andreas Simon
		 * @param build_id_combo box in which the build is chosen
		 * @param filter_method_combo box in which the filter method is chosen
		 * @param specific_build_value value for which the box shall be disabled
		 */
		function triggerBuildChooser(deactivatable_id, filter_method_combo_id, specific_build_value)
		{
			var deactivatable = document.getElementById(deactivatable_id);
			var filter_method_combo = document.getElementById(filter_method_combo_id);
			var index = filter_method_combo.options.selectedIndex;  
			//deactivatable.style.visibility = "hidden";
			
			if(filter_method_combo[index].value == specific_build_value) {
				deactivatable.style.visibility = "visible";
			} else {
				deactivatable.style.visibility = "hidden";
			}
		}
		
		/**
		 * Disable unneeded filters in the filter method combo box.
		 * If only one build is selectable in filter, then the filter method
		 * gets set to "build chosen for execution" because no other method should
		 * be used in that case.
		 * (testcase execution & testcase execution assignment, BUGID 2455, BUGID 3026)
		 *  
		 * @author Andreas Simon
		 * @param filter_method_combo_id the id of the box which shall be disabled
		 * @param value2select the string which shall be selected in the box before disabling it
		 */
		function triggerFilterMethodSelector(filter_method_combo_id, value2select) {
			filter_method_combo = document.getElementById(filter_method_combo_id);
			var length = filter_method_combo.options.length;
			
			for (var index = 0; index < length; index ++) {
				if (filter_method_combo.options[index].value == value2select) {
					filter_method_combo.options.selectedIndex = index;
				}
			}
			
			filter_method_combo.disabled = true;
		}
	'; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['control']->draw_tc_unassign_button): ?>
<?php echo '
/**
 * Open the tc_exec_assignment page in workframe to delete
 * all tester assignments for a build. 
 */
function delete_testers_from_build(id) {
	var action_url = fRoot + \'lib/plan/tc_exec_unassign_all.php\' + 
	                 \'?confirmed=no&build_id=\' + id;
	parent.workframe.location = action_url;
}
'; ?>

<?php endif; ?>

</script>

</head>


<?php if ($this->_tpl_vars['control']->filters['filter_result'] || $this->_tpl_vars['control']->filters['filter_assigned_user']): ?>
	<body onload="javascript:
		<?php if ($this->_tpl_vars['control']->filters['filter_result']): ?>

			<?php if (count($this->_tpl_vars['control']->filters['filter_result']['filter_result_build']['items']) == 1): ?>
				triggerFilterMethodSelector('filter_result_method',
					<?php echo $this->_tpl_vars['control']->filters['filter_result']['filter_result_method']['js_selection']; ?>
);
			<?php endif; ?>
			triggerBuildChooser('filter_result_build_row',
			                    'filter_result_method',
			                    <?php echo $this->_tpl_vars['control']->configuration->filter_methods['status_code']['specific_build']; ?>
);
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['control']->filters['filter_assigned_user']): ?>
			triggerAssignedBox('filter_assigned_user',
			                   'filter_assigned_user_include_unassigned',
			                   '<?php echo $this->_tpl_vars['control']->option_strings['any']; ?>
',
			                   '<?php echo $this->_tpl_vars['control']->option_strings['none']; ?>
',
			                   '<?php echo $this->_tpl_vars['control']->option_strings['somebody']; ?>
');
		<?php endif; ?>
	">
<?php else: ?>
	<body>
<?php endif; ?>