<?php /* Smarty version 2.6.26, created on 2010-09-27 11:02:41
         compiled from inc_filter_panel.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_filter_panel.tpl', 23, false),array('function', 'config_load', 'inc_filter_panel.tpl', 35, false),array('function', 'html_options', 'inc_filter_panel.tpl', 86, false),array('function', 'html_radios', 'inc_filter_panel.tpl', 196, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'caption_nav_settings, caption_nav_filters, platform, test_plan,
                        build,filter_tcID,filter_on,filter_result,
                        btn_update_menu,btn_apply_filter,keyword,keywords_filter_help,
                        filter_owner,TestPlan,test_plan,caption_nav_filters,
                        platform, include_unassigned_testcases,
                        btn_remove_all_tester_assignments, execution_type, 
                        do_auto_update, testsuite, btn_reset_filters,
                        btn_bulk_update_to_latest_version, priority, tc_title,
                        custom_field, search_type_like,
                        document_id, req_expected_coverage, title,
                        status, req_type, req_spec_type, th_tcid, has_relation_type'), $this);?>


<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'treeFilterForm'), $this);?>


<form method="post" id="filter_panel_form" name="filter_panel_form">

<?php if (isset ( $this->_tpl_vars['control']->form_token )): ?>
<input type="hidden" name="form_token" value="<?php echo $this->_tpl_vars['control']->form_token; ?>
">
<?php endif; ?>

<?php if ($this->_tpl_vars['control']->draw_tc_unassign_button): ?>
	<input type="button" 
	       name="removen_all_tester_assignments"
	       value="<?php echo $this->_tpl_vars['labels']['btn_remove_all_tester_assignments']; ?>
"
	       onclick="javascript:delete_testers_from_build(<?php echo $this->_tpl_vars['control']->settings['setting_build']['selected']; ?>
);"
	/>
<?php endif; ?>

<?php if ($this->_tpl_vars['control']->draw_bulk_update_button): ?>
    <input type="button" value="<?php echo $this->_tpl_vars['labels']['btn_bulk_update_to_latest_version']; ?>
"
           name="doBulkUpdateToLatest"
           onclick="update2latest(<?php echo $this->_tpl_vars['gui']->tPlanID; ?>
)" />
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['gui']->feature )): ?>
<input type="hidden" id="feature" name="feature" value="<?php echo $this->_tpl_vars['gui']->feature; ?>
" />
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_executeFilter','show_help_icon' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php if ($this->_tpl_vars['control']->display_settings): ?>
	<div id="settings_panel">
		<div class="x-panel-header x-unselectable">
			<?php echo $this->_tpl_vars['labels']['caption_nav_settings']; ?>

		</div>

		<div id="settings" class="x-panel-body exec_additional_info" "style="padding-top: 3px;">
			<input type='hidden' id="tpn_view_settings" name="tpn_view_status"  value="0" />

			<table class="smallGrey" style="width:98%;">

			<?php if ($this->_tpl_vars['control']->settings['setting_testplan']): ?>
				<tr>
					<th><?php echo $this->_tpl_vars['labels']['test_plan']; ?>
</th>
					<td>
						<select name="setting_testplan" onchange="this.form.submit()">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->settings['setting_testplan']['items'],'selected' => $this->_tpl_vars['control']->settings['setting_testplan']['selected']), $this);?>

						</select>
					</td>
				</tr>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['control']->settings['setting_platform']): ?>
				<tr>
					<th><?php echo $this->_tpl_vars['labels']['platform']; ?>
</th>
					<td>
						<select name="setting_platform" onchange="this.form.submit()">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->settings['setting_platform']['items'],'selected' => $this->_tpl_vars['control']->settings['setting_platform']['selected']), $this);?>

						</select>
					</td>
				</tr>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['control']->settings['setting_build']): ?>
				<tr>
					<th><?php echo $this->_tpl_vars['control']->settings['setting_build']['label']; ?>
</th>
					<td>
						<select name="setting_build" onchange="this.form.submit()">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->settings['setting_build']['items'],'selected' => $this->_tpl_vars['control']->settings['setting_build']['selected']), $this);?>

						</select>
					</td>
				</tr>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['control']->settings['setting_refresh_tree_on_action']): ?>
				<tr>
		   			<td><?php echo $this->_tpl_vars['labels']['do_auto_update']; ?>
</td>
		  			<td>
		  			   <input type="hidden" 
		  			          id="hidden_setting_refresh_tree_on_action"
		  			          name="hidden_setting_refresh_tree_on_action" 
		  			          value="<?php echo $this->_tpl_vars['control']->settings['setting_refresh_tree_on_action']['hidden_setting_refresh_tree_on_action']; ?>
" />

		  			   <input type="checkbox"
		  			           id="cbsetting_refresh_tree_on_action"
		  			           name="setting_refresh_tree_on_action"
		  			           <?php if ($this->_tpl_vars['control']->settings['setting_refresh_tree_on_action']['selected']): ?> checked <?php endif; ?>
		  			           style="font-size: 90%;" onclick="this.form.submit()"/>
		  			</td>
		  		</tr>
			<?php endif; ?>

			</table>
		</div> 	</div> <?php endif; ?> 
<?php if ($this->_tpl_vars['control']->display_filters): ?>

	<div id="filter_panel">
		<div class="x-panel-header x-unselectable">
			<?php echo $this->_tpl_vars['labels']['caption_nav_filters']; ?>

		</div>

	<div id="filters" class="x-panel-body exec_additional_info" style="padding-top: 3px;">
		
		<table class="smallGrey" style="width:98%;">

		<?php if ($this->_tpl_vars['control']->filters['filter_tc_id']): ?>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['th_tcid']; ?>
</td>
				<td><input type="text" name="filter_tc_id"
				                       size="<?php echo $this->_config[0]['vars']['TC_ID_SIZE']; ?>
"
				                       maxlength="<?php echo $this->_config[0]['vars']['TC_ID_MAXLEN']; ?>
"
				                       value="<?php echo $this->_tpl_vars['control']->filters['filter_tc_id']['selected']; ?>
" />
				</td>
			</tr>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['control']->filters['filter_testcase_name']): ?>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['tc_title']; ?>
</td>
				<td><input type="text" name="filter_testcase_name"
				                       size="<?php echo $this->_config[0]['vars']['TC_TITLE_SIZE']; ?>
"
				                       maxlength="<?php echo $this->_config[0]['vars']['TC_TITLE_MAXLEN']; ?>
"
				                       value="<?php echo $this->_tpl_vars['control']->filters['filter_testcase_name']['selected']; ?>
" />
				</td>
			</tr>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['control']->filters['filter_toplevel_testsuite']): ?>
			<tr>
	    		<td><?php echo $this->_tpl_vars['labels']['testsuite']; ?>
</td>
	    		<td>
	    			<select name="filter_toplevel_testsuite">
	    				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_toplevel_testsuite']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_toplevel_testsuite']['selected']), $this);?>

	    			</select>
	    		</td>
	    	</tr>
    	<?php endif; ?>

		<?php if ($this->_tpl_vars['control']->filters['filter_keywords']): ?>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['keyword']; ?>
</td>
				<td><select name="filter_keywords[]"
				            title="<?php echo $this->_tpl_vars['labels']['keywords_filter_help']; ?>
"
				            multiple="multiple"
				            size="<?php echo $this->_tpl_vars['control']->filters['filter_keywords']['size']; ?>
">
				    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_keywords']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_keywords']['selected']), $this);?>

					</select>

			<?php echo smarty_function_html_radios(array('name' => 'filter_keywords_filter_type','options' => $this->_tpl_vars['control']->filters['filter_keywords']['filter_keywords_filter_type']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_keywords']['filter_keywords_filter_type']['selected']), $this);?>

				</td>
			</tr>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['control']->filters['filter_priority']): ?>
			<tr>
				<th width="75"><?php echo $this->_tpl_vars['labels']['priority']; ?>
</th>
				<td>
					<select name="filter_priority">
										<option value=""><?php echo $this->_tpl_vars['control']->option_strings['any']; ?>
</option>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gsmarty_option_importance'],'selected' => $this->_tpl_vars['control']->filters['filter_priority']['selected']), $this);?>

					</select>
				</td>
			</tr>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['control']->filters['filter_execution_type']): ?>
			<tr>
				<td><?php echo $this->_tpl_vars['labels']['execution_type']; ?>
</td>
	  			<td>
				<select name="filter_execution_type">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_execution_type']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_execution_type']['selected']), $this);?>

	    	  </select>
				</td>
			</tr>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['control']->filters['filter_assigned_user']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['filter_owner']; ?>
</td>
			<td>

			<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
				<select name="filter_assigned_user[]"
				        id="filter_assigned_user"
				        multiple="multiple"
				        size="<?php echo $this->_tpl_vars['control']->filter_item_quantity; ?>
" >
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_assigned_user']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_assigned_user']['selected']), $this);?>

				</select>
		    <?php else: ?>
				<select name="filter_assigned_user" 
				        id="filter_assigned_user"
				        onchange="javascript: triggerAssignedBox('filter_assigned_user',
	                                                             'filter_assigned_user_include_unassigned',
	                                                             '<?php echo $this->_tpl_vars['control']->option_strings['any']; ?>
',
	                                                             '<?php echo $this->_tpl_vars['control']->option_strings['none']; ?>
',
	                                                             '<?php echo $this->_tpl_vars['control']->option_strings['somebody']; ?>
');">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_assigned_user']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_assigned_user']['selected']), $this);?>

				</select>

				<br/>
				
				<input type="checkbox"
				       id="filter_assigned_user_include_unassigned"
				       name="filter_assigned_user_include_unassigned"
	  		           value="1"
	  		           <?php if ($this->_tpl_vars['control']->filters['filter_assigned_user']['filter_assigned_user_include_unassigned']): ?>
	  		           		checked="checked"
	  		           <?php endif; ?>
	  		    />
				<?php echo $this->_tpl_vars['labels']['include_unassigned_testcases']; ?>

			<?php endif; ?>

 			</td>
		</tr>
    	<?php endif; ?>


		
		<?php if ($this->_tpl_vars['control']->filters['filter_custom_fields'] && ! $this->_tpl_vars['control']->filters['filter_custom_fields']['collapsed']): ?>
			<tr><td>&nbsp;</td></tr>
			<?php echo $this->_tpl_vars['control']->filters['filter_custom_fields']['items']; ?>

		<?php endif; ?>


		<?php if ($this->_tpl_vars['control']->filters['filter_result']): ?>

		<tr><td>&nbsp;</td></tr> 
	   		<tr>
				<th><?php echo $this->_tpl_vars['labels']['filter_result']; ?>
</th>
				<td>
				<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
				  	<select name="filter_result_result[]" 
				  	        multiple="multiple"
				  	        size="<?php echo $this->_tpl_vars['control']->filter_item_quantity; ?>
">
				<?php else: ?>
				  	<select name="filter_result_result">
				<?php endif; ?>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_result']['filter_result_result']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_result']['filter_result_result']['selected']), $this);?>

				</select>
				</td>
			</tr>

			<tr>
				<th><?php echo $this->_tpl_vars['labels']['filter_on']; ?>
</th>
				<td>
				  	<select name="filter_result_method" id="filter_result_method"
				  		      onchange="javascript: triggerBuildChooser('filter_result_build_row',
						                                                'filter_result_method',
						      <?php echo $this->_tpl_vars['control']->configuration->filter_methods['status_code']['specific_build']; ?>
);">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_result']['filter_result_method']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_result']['filter_result_method']['selected']), $this);?>

				  	</select>
				</td>
			</tr>

			<tr id="filter_result_build_row">
				<th><?php echo $this->_tpl_vars['labels']['build']; ?>
</th>
				<td><select id="filter_result_build" name="filter_result_build">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_result']['filter_result_build']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_result']['filter_result_build']['selected']), $this);?>

					</select>
				</td>
			</tr>

	<?php endif; ?>

		</table>

		<div>
			<input type="submit"
			       value="<?php echo $this->_tpl_vars['labels']['btn_apply_filter']; ?>
"
			       id="doUpdateTree"
			       name="doUpdateTree"
			       style="font-size: 90%;" />

			<input type="submit"
			       value="<?php echo $this->_tpl_vars['labels']['btn_reset_filters']; ?>
"
			       id="doResetTree"
			       name="btn_reset_filters"
			       style="font-size: 90%;" />
			
			<?php if ($this->_tpl_vars['control']->filters['filter_custom_fields']): ?>
			<input type="submit"
			       value="<?php echo $this->_tpl_vars['control']->filters['filter_custom_fields']['btn_label']; ?>
"
			       id="doToggleCF"
			       name="btn_toggle_cf"
			       style="font-size: 90%;" />
			<?php endif; ?>
			
			<?php if ($this->_tpl_vars['control']->filter_mode_choice_enabled): ?>
			
				<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
					<input type="hidden" name="btn_advanced_filters" value="1" />
				<?php endif; ?>
			
				<input type="submit" id="toggleFilterMode"  name="<?php echo $this->_tpl_vars['control']->filter_mode_button_name; ?>
"
				     value="<?php echo $this->_tpl_vars['control']->filter_mode_button_label; ?>
"
				     style="font-size: 90%;"  />
      		<?php endif; ?>
		</div>

	</div> 
	</div> 
<?php endif; ?> 

<?php if ($this->_tpl_vars['control']->display_req_settings): ?>
	<div id="settings_panel">
		<div class="x-panel-header x-unselectable">
			<?php echo $this->_tpl_vars['labels']['caption_nav_settings']; ?>

		</div>

		<div id="settings" class="x-panel-body exec_additional_info" "style="padding-top: 3px;">
			<input type='hidden' id="tpn_view_settings" name="tpn_view_status"  value="0" />

			<table class="smallGrey" style="width:98%;">

			<?php if ($this->_tpl_vars['control']->settings['setting_refresh_tree_on_action']): ?>
				<tr>
		   			<td><?php echo $this->_tpl_vars['labels']['do_auto_update']; ?>
</td>
		  			<td>
		  			   <input type="hidden" 
		  			          id="hidden_setting_refresh_tree_on_action"
		  			          name="hidden_setting_refresh_tree_on_action" 
		  			          value="<?php echo $this->_tpl_vars['control']->settings['setting_refresh_tree_on_action']['hidden_setting_refresh_tree_on_action']; ?>
" />

		  			   <input type="checkbox"
		  			           id="cbsetting_refresh_tree_on_action"
		  			           name="setting_refresh_tree_on_action"
		  			           <?php if ($this->_tpl_vars['control']->settings['setting_refresh_tree_on_action']['selected']): ?> checked <?php endif; ?>
		  			           style="font-size: 90%;" onclick="this.form.submit();" />
		  			</td>
		  		</tr>
			<?php endif; ?>

			</table>
		</div> 	</div> <?php endif; ?> 
<?php if ($this->_tpl_vars['control']->display_req_filters): ?>

	<div id="filter_panel">
	<div class="x-panel-header x-unselectable">
		<?php echo $this->_tpl_vars['labels']['caption_nav_filters']; ?>

	</div>

	<div id="filters" class="x-panel-body exec_additional_info" style="padding-top: 3px;">

	<table class="smallGrey" style="width:98%;">

	<?php if ($this->_tpl_vars['control']->filters['filter_doc_id']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['document_id']; ?>
</td>
			<td><input type="text" name="filter_doc_id"
			                       size="<?php echo $this->_config[0]['vars']['REQ_DOCID_SIZE']; ?>
"
			                       maxlength="<?php echo $this->_config[0]['vars']['REQ_DOCID_MAXLEN']; ?>
"
			                       value="<?php echo $this->_tpl_vars['control']->filters['filter_doc_id']['selected']; ?>
" />
			</td>
		</tr>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['control']->filters['filter_title']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['title']; ?>
</td>
			<td><input type="text" name="filter_title"
			                       size="<?php echo $this->_config[0]['vars']['REQ_NAME_SIZE']; ?>
"
			                       maxlength="<?php echo $this->_config[0]['vars']['REQ_NAME_MAXLEN']; ?>
"
			                       value="<?php echo $this->_tpl_vars['control']->filters['filter_title']['selected']; ?>
" />
			</td>
		</tr>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['control']->filters['filter_status']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['status']; ?>
</td>
			<td>
				<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
					<select id="filter_status" 
					        name="filter_status[]"
					        multiple="multiple"
					        size="<?php echo $this->_tpl_vars['control']->filter_item_quantity; ?>
" >
				<?php else: ?>
					<select id="filter_status" name="filter_status">
				<?php endif; ?>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_status']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_status']['selected']), $this);?>

					</select>
			    
			</td>
		</tr>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['control']->filters['filter_type']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['req_type']; ?>
</td>
			<td>
				<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
					<select id="filter_type" 
					        name="filter_type[]"
					        multiple="multiple"
					        size="<?php echo $this->_tpl_vars['control']->filter_item_quantity; ?>
" >
				<?php else: ?>
					<select id="filter_type" name="filter_type">
				<?php endif; ?>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_type']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_type']['selected']), $this);?>

					</select>
			</td>
		</tr>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['control']->filters['filter_spec_type']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['req_spec_type']; ?>
</td>
			<td>
				<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
					<select id="filter_spec_type" 
					        name="filter_spec_type[]"
					        multiple="multiple"
					        size="<?php echo $this->_tpl_vars['control']->filter_item_quantity; ?>
" >
				<?php else: ?>
					<select id="filter_spec_type" name="filter_spec_type">
				<?php endif; ?>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_spec_type']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_spec_type']['selected']), $this);?>

					</select>
			</td>
		</tr>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['control']->filters['filter_coverage']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['req_expected_coverage']; ?>
</td>
			<td><input type="text" name="filter_coverage"
			                       size="<?php echo $this->_config[0]['vars']['COVERAGE_SIZE']; ?>
"
			                       maxlength="<?php echo $this->_config[0]['vars']['COVERAGE_MAXLEN']; ?>
"
			                       value="<?php echo $this->_tpl_vars['control']->filters['filter_coverage']['selected']; ?>
" />
			</td>
		</tr>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['control']->filters['filter_relation']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['has_relation_type']; ?>
</td>
			<td>
				<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
					<select id="filter_relation" 
					        name="filter_relation[]"
					        multiple="multiple"
					        size="<?php echo $this->_tpl_vars['control']->filter_item_quantity; ?>
" >
				<?php else: ?>
					<select id="filter_relation" name="filter_relation">
				<?php endif; ?>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['control']->filters['filter_relation']['items'],'selected' => $this->_tpl_vars['control']->filters['filter_relation']['selected']), $this);?>

					</select>
			</td>
		</tr>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['control']->filters['filter_tc_id']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['th_tcid']; ?>
</td>
			<td><input type="text" name="filter_tc_id"
			                       size="<?php echo $this->_config[0]['vars']['TC_ID_SIZE']; ?>
"
			                       maxlength="<?php echo $this->_config[0]['vars']['TC_ID_MAXLEN']; ?>
"
			                       value="<?php echo $this->_tpl_vars['control']->filters['filter_tc_id']['selected']; ?>
" />
			</td>
		</tr>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['control']->filters['filter_custom_fields'] && ! $this->_tpl_vars['control']->filters['filter_custom_fields']['collapsed']): ?>
		<tr><td>&nbsp;</td></tr>
		<?php echo $this->_tpl_vars['control']->filters['filter_custom_fields']['items']; ?>

	<?php endif; ?>
	
	</table>
	
	<div>
		<input type="submit"
		       value="<?php echo $this->_tpl_vars['labels']['btn_apply_filter']; ?>
"
		       id="doUpdateTree"
		       name="doUpdateTree"
		       style="font-size: 90%;" />

		<input type="submit"
		       value="<?php echo $this->_tpl_vars['labels']['btn_reset_filters']; ?>
"
		       id="doResetTree"
		       name="btn_reset_filters"
		       style="font-size: 90%;" />
		
		<?php if ($this->_tpl_vars['control']->filters['filter_custom_fields']): ?>
			<input type="submit"
			       value="<?php echo $this->_tpl_vars['control']->filters['filter_custom_fields']['btn_label']; ?>
"
			       id="doToggleCF"
			       name="btn_toggle_cf"
			       style="font-size: 90%;" />
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['control']->filter_mode_choice_enabled): ?>
			
			<?php if ($this->_tpl_vars['control']->advanced_filter_mode): ?>
				<input type="hidden" name="btn_advanced_filters" value="1" />
			<?php endif; ?>
			
			<input type="submit" id="toggleFilterMode"  name="<?php echo $this->_tpl_vars['control']->filter_mode_button_name; ?>
"
			     value="<?php echo $this->_tpl_vars['control']->filter_mode_button_label; ?>
"
			     style="font-size: 90%;"  />
      	<?php endif; ?>
	</div>
	
	</div> 	</div> <?php endif; ?> 
</form>