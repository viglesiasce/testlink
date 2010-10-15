<?php /* Smarty version 2.6.26, created on 2010-10-09 10:47:59
         compiled from plan/planAddTC_m1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'plan/planAddTC_m1.tpl', 22, false),array('function', 'config_load', 'plan/planAddTC_m1.tpl', 36, false),array('function', 'html_options', 'plan/planAddTC_m1.tpl', 96, false),array('function', 'localize_date', 'plan/planAddTC_m1.tpl', 316, false),array('modifier', 'escape', 'plan/planAddTC_m1.tpl', 80, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'note_keyword_filter, check_uncheck_all_for_remove,
             th_id,th_test_case,version,execution_order,th_platform,
             no_testcase_available,btn_save_custom_fields,send_mail_to_tester,
             inactive_testcase,btn_save_exec_order,info_added_on_date,
             executed_can_not_be_removed,added_on_date,btn_save_platform,
             check_uncheck_all_checkboxes,removal_tc,show_tcase_spec,
             tester_assignment_on_add,adding_tc,check_uncheck_all_tc,for,
             build_to_assign_on_add'), $this);?>


   
<?php $this->assign('add_cb', 'achecked_tc'); ?> 
<?php $this->assign('rm_cb', 'remove_checked_tc'); ?>

<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'planAddTC'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_jsCheckboxes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
<!--
function tTip(tcID,vID)
{
	var fUrl = fRoot+\'lib/ajax/gettestcasesummary.php?tcase_id=\';
	new Ext.ToolTip({
        target: \'tooltip-\'+tcID,
        width: 200,
        autoLoad: 
        {url: fUrl+tcID+\'&tcversion_id=\'+vID},
    });
}

function showTT(e)
{
	alert(e);
}

Ext.onReady(function(){ 
'; ?>

<?php $_from = $this->_tpl_vars['gui']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['info']):
?>
  <?php $_from = $this->_tpl_vars['info']['testcases']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tcidx'] => $this->_tpl_vars['tcversionInfo']):
?>
   <?php $this->assign('tcversionLinked', $this->_tpl_vars['tcversionInfo']['linked_version_id']); ?>
	   tTip(<?php echo $this->_tpl_vars['tcidx']; ?>
,<?php echo $this->_tpl_vars['tcversionLinked']; ?>
);
  <?php endforeach; endif; unset($_from); ?>  
<?php endforeach; endif; unset($_from); ?>
<?php echo '
});
//-->
</script>
'; ?>


</head>
<body class="fixedheader">
<form name="addTcForm" id="addTcForm" method="post">

   <div id="header-wrap">
	  	<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->pageTitle)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['tlCfg']->gui->title_separator_2; ?>
<?php echo $this->_tpl_vars['gui']->actionTitle; ?>

	  	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_planAddTC','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  	</h1>

	    <?php if ($this->_tpl_vars['gui']->has_tc): ?>
	  	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
	  	  	
						<?php if ($this->_tpl_vars['gui']->build['count']): ?>
		
		<div class="groupBtn">
				<?php echo $this->_tpl_vars['labels']['tester_assignment_on_add']; ?>

				<select name="testerID"
				        id="testerID">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->testers,'selected' => $this->_tpl_vars['gui']->testerID), $this);?>

				</select>
				
				<?php echo $this->_tpl_vars['labels']['build_to_assign_on_add']; ?>

				<select name="build_id">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->build['items'],'selected' => $this->_tpl_vars['gui']->build['selected']), $this);?>

				</select>
		
				<input type="checkbox" name="send_mail" id="send_mail" <?php echo $this->_tpl_vars['gui']->send_mail_checked; ?>
/>
				<?php echo $this->_tpl_vars['labels']['send_mail_to_tester']; ?>

			
		</div>

		<?php endif; ?> 				
	  	  
	  	  <div class="groupBtn">
			<div style="float: left; margin-right: 2em">
				<?php echo $this->_tpl_vars['labels']['check_uncheck_all_tc']; ?>

				<?php if ($this->_tpl_vars['gui']->usePlatforms): ?>
				<select id="select_platform">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->bulk_platforms), $this);?>

				</select>
				<?php else: ?>
				<input type="hidden" id="select_platform" value="0">
				<?php endif; ?>
				<?php echo $this->_tpl_vars['labels']['for']; ?>

				<?php if ($this->_tpl_vars['gui']->full_control): ?>
				<button onclick="cs_all_checkbox_in_div_with_platform('addTcForm', '<?php echo $this->_tpl_vars['add_cb']; ?>
', Ext.get('select_platform').getValue()); return false"><?php echo $this->_tpl_vars['labels']['adding_tc']; ?>
</button>
				<?php endif; ?>
				<button onclick="cs_all_checkbox_in_div_with_platform('addTcForm', '<?php echo $this->_tpl_vars['rm_cb']; ?>
', Ext.get('select_platform').getValue()); return false"><?php echo $this->_tpl_vars['labels']['removal_tc']; ?>
</button>
			</div>
	  	  	<input type="hidden" name="doAction" id="doAction" value="default" />
	  	  	<input type="submit" name="doAddRemove" value="<?php echo $this->_tpl_vars['gui']->buttonValue; ?>
"
	  	  		     onclick="doAction.value=this.name" />
	  	  	<?php if ($this->_tpl_vars['gui']->full_control == 1): ?>
	  	  	  <input type="submit" name="doReorder" value="<?php echo $this->_tpl_vars['labels']['btn_save_exec_order']; ?>
"
	  	  		       onclick="doAction.value=this.name" />
        
	  	  		<?php if ($this->_tpl_vars['gui']->drawSaveCFieldsButton): ?>
	  	  		  <input type="submit" name="doSaveCustomFields" value="<?php echo $this->_tpl_vars['labels']['btn_save_custom_fields']; ?>
"
	  	  			       onclick="doAction.value=this.name" />
	  	  		<?php endif; ?>
	  	  		<?php if ($this->_tpl_vars['gui']->drawSavePlatformsButton): ?>
	  	  		  <input type="submit" name="doSavePlatforms" value="<?php echo $this->_tpl_vars['labels']['btn_save_platform']; ?>
"
	  	  			       onclick="doAction.value=this.name" />
	  	  		<?php endif; ?>
	  	  	<?php endif; ?>
	  	  </div>
      <?php else: ?>
	    <div class="info"><?php echo $this->_tpl_vars['labels']['no_testcase_available']; ?>
</div>
	  	<?php endif; ?>  

    </div> <!-- header-wrap -->

<?php if ($this->_tpl_vars['gui']->has_tc): ?>
  <div class="workBack" id="workback">
  	<?php if ($this->_tpl_vars['gui']->keywords_filter != ''): ?>
  		<div style="margin-left: 20px; font-size: smaller;">
  			<br /><?php echo $this->_tpl_vars['labels']['note_keyword_filter']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->keywords_filter)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
  		</div>
  	<?php endif; ?>
       
          	<?php $this->assign('item_number', 0); ?>
  	<?php $_from = $this->_tpl_vars['gui']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ts']):
?>
  		<?php $this->assign('item_number', $this->_tpl_vars['item_number']+1); ?>
  		<?php $this->assign('ts_id', $this->_tpl_vars['ts']['testsuite']['id']); ?>
  		<?php $this->assign('div_id', "div_".($this->_tpl_vars['ts_id'])); ?>
  	  <?php echo ''; ?><?php echo '<div id="'; ?><?php echo $this->_tpl_vars['div_id']; ?><?php echo '"  style="margin:0px 0px 0px '; ?><?php echo $this->_tpl_vars['ts']['level']; ?><?php echo '0px;"><h2 class="testlink">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['ts']['testsuite']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?><?php echo '</h2>'; ?><?php if ($this->_tpl_vars['item_number'] == 1): ?><?php echo '<hr />'; ?><?php endif; ?><?php echo ' '; ?><?php echo ''; ?><?php echo '<input type="hidden" name="add_value_'; ?><?php echo $this->_tpl_vars['ts_id']; ?><?php echo '"  id="add_value_'; ?><?php echo $this->_tpl_vars['ts_id']; ?><?php echo '"  value="0" /><input type="hidden" name="rm_value_'; ?><?php echo $this->_tpl_vars['ts_id']; ?><?php echo '"  id="rm_value_'; ?><?php echo $this->_tpl_vars['ts_id']; ?><?php echo '"  value="0" />'; ?><?php echo ''; ?><?php if (( $this->_tpl_vars['gui']->full_control && $this->_tpl_vars['ts']['testcase_qty'] > 0 ) || $this->_tpl_vars['ts']['linked_testcase_qty'] > 0): ?><?php echo '<table cellspacing="0" border="0" style="font-size:small;" width="100%"><tr style="background-color:blue;font-weight:bold;color:white"><td width="5" align="center">'; ?><?php if ($this->_tpl_vars['gui']->full_control): ?><?php echo '<img class="clickable" src="'; ?><?php echo @TL_THEME_IMG_DIR; ?><?php echo '/toggle_all.gif"onclick=\'cs_all_checkbox_in_div("'; ?><?php echo $this->_tpl_vars['div_id']; ?><?php echo '","'; ?><?php echo $this->_tpl_vars['add_cb']; ?><?php echo '","add_value_'; ?><?php echo $this->_tpl_vars['ts_id']; ?><?php echo '");\'title="'; ?><?php echo $this->_tpl_vars['labels']['check_uncheck_all_checkboxes']; ?><?php echo '" />'; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo '</td>'; ?><?php if ($this->_tpl_vars['gui']->usePlatforms): ?><?php echo ' <td>'; ?><?php echo $this->_tpl_vars['labels']['th_platform']; ?><?php echo '</td> '; ?><?php endif; ?><?php echo '<td>'; ?><?php echo $this->_tpl_vars['labels']['th_test_case']; ?><?php echo '</td><td>'; ?><?php echo $this->_tpl_vars['labels']['version']; ?><?php echo '</td><td align="center"><img src="'; ?><?php echo @TL_THEME_IMG_DIR; ?><?php echo '/timeline_marker.png"title="'; ?><?php echo $this->_tpl_vars['labels']['execution_order']; ?><?php echo '" /></td>'; ?><?php if ($this->_tpl_vars['ts']['linked_testcase_qty'] > 0): ?><?php echo '<td>&nbsp;</td><td><img class="clickable" src="'; ?><?php echo @TL_THEME_IMG_DIR; ?><?php echo '/disconnect.png"onclick=\'cs_all_checkbox_in_div("'; ?><?php echo $this->_tpl_vars['div_id']; ?><?php echo '","'; ?><?php echo $this->_tpl_vars['rm_cb']; ?><?php echo '","rm_value_'; ?><?php echo $this->_tpl_vars['ts_id']; ?><?php echo '");\'title="'; ?><?php echo $this->_tpl_vars['labels']['check_uncheck_all_for_remove']; ?><?php echo '" /></td><td align="center"><img src="'; ?><?php echo @TL_THEME_IMG_DIR; ?><?php echo '/date.png"title="'; ?><?php echo $this->_tpl_vars['labels']['added_on_date']; ?><?php echo '" /></td>'; ?><?php endif; ?><?php echo '</tr>'; ?><?php $_from = $this->_tpl_vars['ts']['testcases']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tcase']):
?><?php echo ''; ?><?php $this->assign('is_active', 0); ?><?php echo ''; ?><?php $this->assign('linked_version_id', $this->_tpl_vars['tcase']['linked_version_id']); ?><?php echo ''; ?><?php $this->assign('tcID', $this->_tpl_vars['tcase']['id']); ?><?php echo ''; ?><?php if ($this->_tpl_vars['linked_version_id'] != 0): ?><?php echo ''; ?><?php if ($this->_tpl_vars['tcase']['tcversions_active_status'][$this->_tpl_vars['linked_version_id']] == 1): ?><?php echo ''; ?><?php $this->assign('is_active', 1); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php if ($this->_tpl_vars['tcase']['tcversions_qty'] != 0): ?><?php echo ''; ?><?php $this->assign('is_active', 1); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['is_active'] || $this->_tpl_vars['linked_version_id'] != 0): ?><?php echo ''; ?><?php if ($this->_tpl_vars['gui']->full_control || $this->_tpl_vars['linked_version_id'] != 0): ?><?php echo ''; ?><?php $this->assign('drawPlatformChecks', 0); ?><?php echo ''; ?><?php if ($this->_tpl_vars['gui']->usePlatforms): ?><?php echo ''; ?><?php echo ''; ?><?php if (! isset ( $this->_tpl_vars['tcase']['feature_id'][0] )): ?><?php echo ''; ?><?php $this->assign('drawPlatformChecks', 1); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '<tr'; ?><?php if ($this->_tpl_vars['linked_version_id'] != 0 && $this->_tpl_vars['drawPlatformChecks'] == 0): ?><?php echo ' style="'; ?><?php echo @TL_STYLE_FOR_ADDED_TC; ?><?php echo '"'; ?><?php endif; ?><?php echo '><td width="20">'; ?><?php echo ''; ?><?php echo ''; ?><?php if (! $this->_tpl_vars['gui']->usePlatforms || $this->_tpl_vars['drawPlatformChecks'] == 0): ?><?php echo ''; ?><?php if ($this->_tpl_vars['gui']->full_control): ?><?php echo ''; ?><?php if ($this->_tpl_vars['is_active'] == 0 || $this->_tpl_vars['linked_version_id'] != 0): ?><?php echo '&nbsp;&nbsp;'; ?><?php else: ?><?php echo '<input type="checkbox" name="'; ?><?php echo $this->_tpl_vars['add_cb']; ?><?php echo '['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '][0]" id="'; ?><?php echo $this->_tpl_vars['add_cb']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '[0]" value="'; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '" />'; ?><?php endif; ?><?php echo '<input type="hidden" name="a_tcid['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']" value="'; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '" />'; ?><?php else: ?><?php echo '&nbsp;&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo '</td>'; ?><?php if ($this->_tpl_vars['gui']->usePlatforms): ?><?php echo '<td>'; ?><?php if ($this->_tpl_vars['drawPlatformChecks']): ?><?php echo '&nbsp;'; ?><?php else: ?><?php echo '<select name="feature2fix['; ?><?php echo $this->_tpl_vars['tcase']['feature_id'][0]; ?><?php echo ']['; ?><?php echo $this->_tpl_vars['linked_version_id']; ?><?php echo ']">'; ?><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->platformsForHtmlOptions,'selected' => 0), $this);?><?php echo '</select>'; ?><?php endif; ?><?php echo '</td>'; ?><?php endif; ?><?php echo '<td id="tooltip-'; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testCasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?><?php echo ''; ?><?php echo $this->_tpl_vars['tcase']['external_id']; ?><?php echo ': <a href="javascript:openTCaseWindow('; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ')">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?><?php echo '</a></td><td><select name="tcversion_for_tcid['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']"'; ?><?php if ($this->_tpl_vars['linked_version_id'] != 0): ?><?php echo ' disabled'; ?><?php endif; ?><?php echo '>'; ?><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['tcase']['tcversions'],'selected' => $this->_tpl_vars['linked_version_id']), $this);?><?php echo '</select></td><td style="text-align:center;"><input name="exec_order['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']" '; ?><?php echo $this->_tpl_vars['gui']->exec_order_input_disabled; ?><?php echo 'style="text-align:right;" size="'; ?><?php echo $this->_config[0]['vars']['EXECUTION_ORDER_SIZE']; ?><?php echo '" maxlength="'; ?><?php echo $this->_config[0]['vars']['EXECUTION_ORDER_MAXLEN']; ?><?php echo '"value="'; ?><?php echo $this->_tpl_vars['tcase']['execution_order']; ?><?php echo '" />'; ?><?php if ($this->_tpl_vars['linked_version_id'] != 0): ?><?php echo '<input type="hidden" name="linked_version['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']" value="'; ?><?php echo $this->_tpl_vars['linked_version_id']; ?><?php echo '" /><input type="hidden" name="linked_exec_order['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']"  value="'; ?><?php echo $this->_tpl_vars['tcase']['execution_order']; ?><?php echo '" />'; ?><?php endif; ?><?php echo '</td>'; ?><?php echo ''; ?><?php if ($this->_tpl_vars['ts']['linked_testcase_qty'] > 0 && $this->_tpl_vars['drawPlatformChecks'] == 0): ?><?php echo '<td>&nbsp;</td><td>'; ?><?php $this->assign('show_remove_check', 0); ?><?php echo ''; ?><?php if ($this->_tpl_vars['linked_version_id']): ?><?php echo ''; ?><?php $this->assign('show_remove_check', 1); ?><?php echo ''; ?><?php if ($this->_tpl_vars['tcase']['executed'][0] == 'yes'): ?><?php echo ''; ?><?php $this->assign('show_remove_check', $this->_tpl_vars['gui']->can_remove_executed_testcases); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['show_remove_check']): ?><?php echo '<input type=\'checkbox\' name=\''; ?><?php echo $this->_tpl_vars['rm_cb']; ?><?php echo '['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '][0]\' id=\''; ?><?php echo $this->_tpl_vars['rm_cb']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '[0]\' value=\''; ?><?php echo $this->_tpl_vars['linked_version_id']; ?><?php echo '\' />'; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['tcase']['executed'][0] == 'yes'): ?><?php echo '&nbsp;&nbsp;&nbsp;<img src="'; ?><?php echo @TL_THEME_IMG_DIR; ?><?php echo '/lightning.png"title="'; ?><?php echo $this->_tpl_vars['gui']->warning_msg->executed; ?><?php echo '" />'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['is_active'] == 0): ?><?php echo '&nbsp;&nbsp;&nbsp;'; ?><?php echo $this->_tpl_vars['labels']['inactive_testcase']; ?><?php echo ''; ?><?php endif; ?><?php echo '</td><td title="'; ?><?php echo $this->_tpl_vars['labels']['info_added_on_date']; ?><?php echo '">'; ?><?php if ($this->_tpl_vars['tcase']['linked_ts'][0] != ''): ?><?php echo ''; ?><?php echo localize_date_smarty(array('d' => $this->_tpl_vars['tcase']['linked_ts'][0]), $this);?><?php echo ''; ?><?php else: ?><?php echo '&nbsp;'; ?><?php endif; ?><?php echo '</td>'; ?><?php endif; ?><?php echo ''; ?><?php echo '</tr>'; ?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['tcase']['custom_fields'][0] )): ?><?php echo '<input type=\'hidden\' name=\'linked_with_cf['; ?><?php echo $this->_tpl_vars['tcase']['feature_id']; ?><?php echo ']\' value=\''; ?><?php echo $this->_tpl_vars['tcase']['feature_id']; ?><?php echo '\' /><tr><td colspan="8">'; ?><?php echo $this->_tpl_vars['tcase']['custom_fields'][0]; ?><?php echo '</td></tr>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php echo ''; ?><?php if ($this->_tpl_vars['gui']->usePlatforms && $this->_tpl_vars['drawPlatformChecks']): ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['gui']->platforms; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['platform']):
?><?php echo '<tr '; ?><?php if (isset ( $this->_tpl_vars['tcase']['feature_id'][$this->_tpl_vars['platform']['id']] )): ?><?php echo '	style="'; ?><?php echo @TL_STYLE_FOR_ADDED_TC; ?><?php echo '" '; ?><?php endif; ?><?php echo ' ><td>'; ?><?php if ($this->_tpl_vars['gui']->full_control): ?><?php echo ''; ?><?php if ($this->_tpl_vars['is_active'] == 0 || isset ( $this->_tpl_vars['tcase']['feature_id'][$this->_tpl_vars['platform']['id']] )): ?><?php echo '&nbsp;&nbsp;'; ?><?php else: ?><?php echo '<input type="checkbox"  name="'; ?><?php echo $this->_tpl_vars['add_cb']; ?><?php echo '['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']['; ?><?php echo $this->_tpl_vars['platform']['id']; ?><?php echo ']" id="'; ?><?php echo $this->_tpl_vars['add_cb']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '" value="'; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '" />'; ?><?php endif; ?><?php echo '<input type="hidden" name="a_tcid['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']['; ?><?php echo $this->_tpl_vars['platform']['id']; ?><?php echo ']" value="'; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '" />'; ?><?php else: ?><?php echo '&nbsp;&nbsp;'; ?><?php endif; ?><?php echo '</td><td>'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['platform']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?><?php echo '</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>'; ?><?php if ($this->_tpl_vars['is_active'] == 1 && isset ( $this->_tpl_vars['tcase']['feature_id'][$this->_tpl_vars['platform']['id']] )): ?><?php echo '<td>&nbsp;</td><td><input type=\'checkbox\' name=\''; ?><?php echo $this->_tpl_vars['rm_cb']; ?><?php echo '['; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo ']['; ?><?php echo $this->_tpl_vars['platform']['id']; ?><?php echo ']\' id=\''; ?><?php echo $this->_tpl_vars['rm_cb']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['tcID']; ?><?php echo '['; ?><?php echo $this->_tpl_vars['platform']['id']; ?><?php echo ']\'value=\''; ?><?php echo $this->_tpl_vars['linked_version_id']; ?><?php echo '\' />'; ?><?php if ($this->_tpl_vars['tcase']['executed'][$this->_tpl_vars['platform']['id']] == 'yes'): ?><?php echo '&nbsp;&nbsp;&nbsp;<img src="'; ?><?php echo @TL_THEME_IMG_DIR; ?><?php echo '/lightning.png"title="'; ?><?php echo $this->_tpl_vars['gui']->warning_msg->executed; ?><?php echo '" />'; ?><?php endif; ?><?php echo '</td><td title="'; ?><?php echo $this->_tpl_vars['labels']['info_added_on_date']; ?><?php echo '">'; ?><?php echo localize_date_smarty(array('d' => $this->_tpl_vars['tcase']['linked_ts'][$this->_tpl_vars['platform']['id']]), $this);?><?php echo '</td>'; ?><?php endif; ?><?php echo '</tr>'; ?><?php if (isset ( $this->_tpl_vars['tcase']['custom_fields'][$this->_tpl_vars['platform']['id']] )): ?><?php echo '<tr><td colspan="7"><input type=\'hidden\' name=\'linked_with_cf['; ?><?php echo $this->_tpl_vars['tcase']['feature_id']; ?><?php echo ']\' value=\''; ?><?php echo $this->_tpl_vars['tcase']['feature_id']; ?><?php echo '\' />'; ?><?php echo $this->_tpl_vars['tcase']['custom_fields'][$this->_tpl_vars['platform']['id']]; ?><?php echo '</td></tr>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '<tr><td colspan="9"><hr/></td></tr>'; ?><?php endif; ?><?php echo ''; ?><?php echo ''; ?><?php endif; ?><?php echo ' '; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</table><br />'; ?><?php endif; ?><?php echo '  '; ?><?php echo ''; ?>

      </div>
  	<?php endforeach; endif; unset($_from); ?>
  </div>
<?php endif; ?>
</form>

<?php if ($this->_tpl_vars['gui']->refreshTree): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

</body>
</html>