<?php /* Smarty version 2.6.26, created on 2010-09-20 15:39:46
         compiled from mainPageCenter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'mainPageCenter.tpl', 14, false),array('modifier', 'escape', 'mainPageCenter.tpl', 123, false),array('modifier', 'truncate', 'mainPageCenter.tpl', 124, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "current_test_plan,ok,testplan_role,msg_no_rights_for_tp,
             title_test_execution,href_execute_test,href_rep_and_metrics,
             href_update_tplan,href_newest_tcversions,
             href_my_testcase_assignments,href_platform_assign,
             href_tc_exec_assignment,href_plan_assign_urgency,
             href_upd_mod_tc,title_test_plan_mgmt,title_test_case_suite,
             href_plan_management,href_assign_user_roles,
             href_build_new,href_plan_mstones,href_plan_define_priority,
             href_metrics_dashboard,href_add_remove_test_cases"), $this);?>



<?php $this->assign('menuLayout', $this->_tpl_vars['tlCfg']->gui->layoutMainPageRight); ?>
<?php $this->assign('display_right_block_1', false); ?>
<?php $this->assign('display_right_block_2', false); ?>
<?php $this->assign('display_right_block_3', false); ?>

<?php if ($this->_tpl_vars['gui']->grants['testplan_planning'] == 'yes' || $this->_tpl_vars['gui']->grants['mgt_testplan_create'] == 'yes' || $this->_tpl_vars['gui']->grants['testplan_user_role_assignment'] == 'yes' || $this->_tpl_vars['gui']->grants['testplan_create_build'] == 'yes'): ?>
   <?php $this->assign('display_right_block_1', true); ?>

    <script  type="text/javascript">
    <?php echo '
    function display_right_block_1()
    {
        var rp1 = new Ext.Panel({
                                title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_test_plan_mgmt']; ?>
'<?php echo ',
                                collapsible:false,
                                collapsed: false,
                                draggable: false,
                                contentEl: \'test_plan_mgmt_topics\',
                                baseCls: \'x-tl-panel\',
                                bodyStyle: "background:#c8dce8;padding:3px;",
                                renderTo: '; ?>
'menu_right_block_<?php echo $this->_tpl_vars['menuLayout']['testPlan']; ?>
'<?php echo ',
                                width:\'100%\'
                                });
     }
    '; ?>

    </script>

<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->countPlans > 0): ?>
   <?php $this->assign('display_right_block_2', true); ?>

    <script  type="text/javascript">
    <?php echo '
    function display_right_block_2()
    {
        var rp2 = new Ext.Panel({
                                 title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_test_execution']; ?>
'<?php echo ',
                                 collapsible:false,
                                 collapsed: false,
                                 draggable: false,
                                 contentEl: \'test_execution_topics\',
                                 baseCls: \'x-tl-panel\',
                                 bodyStyle: "background:#c8dce8;padding:3px;",
                                 renderTo: '; ?>
'menu_right_block_<?php echo $this->_tpl_vars['menuLayout']['testExecution']; ?>
'<?php echo ',
                                 width:\'100%\'
                                });
     }
    '; ?>

    </script>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->countPlans > 0 && $this->_tpl_vars['gui']->grants['testplan_planning'] == 'yes'): ?>
   <?php $this->assign('display_right_block_3', true); ?>

    <script  type="text/javascript">
    <?php echo '
    function display_right_block_3()
    {
        var rp3 = new Ext.Panel({
                            title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_test_case_suite']; ?>
'<?php echo ',
                            collapsible:false,
                            collapsed: false,
                            draggable: false,
                            contentEl: \'testplan_contents_topics\',
                            baseCls: \'x-tl-panel\',
                            bodyStyle: "background:#c8dce8;padding:3px;",
                            renderTo: '; ?>
'menu_right_block_<?php echo $this->_tpl_vars['menuLayout']['testPlanContents']; ?>
'<?php echo ',
                            width:\'100%\'
                                });
     }
    '; ?>

    </script>

<?php endif; ?>

<div class="vertical_menu" style="float: center; margin:10px 10px 10px 10px">
	<?php if ($this->_tpl_vars['gui']->num_active_tplans > 0): ?>
	  <div class="testproject_title">
     <?php echo lang_get_smarty(array('s' => 'help','var' => 'common_prefix'), $this);?>

     <?php echo lang_get_smarty(array('s' => 'test_plan','var' => 'xx_alt'), $this);?>

     <?php $this->assign('text_hint', ($this->_tpl_vars['common_prefix']).": ".($this->_tpl_vars['xx_alt'])); ?>
     <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_testPlan','show_help_icon' => true,'inc_help_alt' => ($this->_tpl_vars['text_hint']),'inc_help_title' => ($this->_tpl_vars['text_hint']),'inc_help_style' => "float: right;vertical-align: top;")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


 	   <form name="testplanForm" action="lib/general/mainPage.php">
       <?php if ($this->_tpl_vars['gui']->countPlans > 0): ?>
		     <?php echo $this->_tpl_vars['labels']['current_test_plan']; ?>
:<br/>
		     <select style="z-index:1"  name="testplan" onchange="this.form.submit();">
		     	<?php unset($this->_sections['tPlan']);
$this->_sections['tPlan']['name'] = 'tPlan';
$this->_sections['tPlan']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->arrPlans) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tPlan']['show'] = true;
$this->_sections['tPlan']['max'] = $this->_sections['tPlan']['loop'];
$this->_sections['tPlan']['step'] = 1;
$this->_sections['tPlan']['start'] = $this->_sections['tPlan']['step'] > 0 ? 0 : $this->_sections['tPlan']['loop']-1;
if ($this->_sections['tPlan']['show']) {
    $this->_sections['tPlan']['total'] = $this->_sections['tPlan']['loop'];
    if ($this->_sections['tPlan']['total'] == 0)
        $this->_sections['tPlan']['show'] = false;
} else
    $this->_sections['tPlan']['total'] = 0;
if ($this->_sections['tPlan']['show']):

            for ($this->_sections['tPlan']['index'] = $this->_sections['tPlan']['start'], $this->_sections['tPlan']['iteration'] = 1;
                 $this->_sections['tPlan']['iteration'] <= $this->_sections['tPlan']['total'];
                 $this->_sections['tPlan']['index'] += $this->_sections['tPlan']['step'], $this->_sections['tPlan']['iteration']++):
$this->_sections['tPlan']['rownum'] = $this->_sections['tPlan']['iteration'];
$this->_sections['tPlan']['index_prev'] = $this->_sections['tPlan']['index'] - $this->_sections['tPlan']['step'];
$this->_sections['tPlan']['index_next'] = $this->_sections['tPlan']['index'] + $this->_sections['tPlan']['step'];
$this->_sections['tPlan']['first']      = ($this->_sections['tPlan']['iteration'] == 1);
$this->_sections['tPlan']['last']       = ($this->_sections['tPlan']['iteration'] == $this->_sections['tPlan']['total']);
?>
		     		<option value="<?php echo $this->_tpl_vars['gui']->arrPlans[$this->_sections['tPlan']['index']]['id']; ?>
"
		     		        <?php if ($this->_tpl_vars['gui']->arrPlans[$this->_sections['tPlan']['index']]['selected']): ?> selected="selected" <?php endif; ?>
		     		        title="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->arrPlans[$this->_sections['tPlan']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
		     		        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->arrPlans[$this->_sections['tPlan']['index']]['name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['TESTPLAN_TRUNCATE_SIZE']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['TESTPLAN_TRUNCATE_SIZE'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		     		</option>
		     	<?php endfor; endif; ?>
		     </select>
		     
		     <?php if ($this->_tpl_vars['gui']->countPlans == 1): ?>
		     	<input type="button" onclick="this.form.submit();" value="<?php echo $this->_tpl_vars['labels']['ok']; ?>
"/>
		     <?php endif; ?>
		     
		     <?php if ($this->_tpl_vars['gui']->testplanRole != null): ?>
		     	<br /><?php echo $this->_tpl_vars['labels']['testplan_role']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testplanRole)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		     <?php endif; ?>
	     <?php else: ?>
         <?php if ($this->_tpl_vars['gui']->num_active_tplans > 0): ?><?php echo $this->_tpl_vars['labels']['msg_no_rights_for_tp']; ?>
<?php endif; ?>
		   <?php endif; ?>
	   </form>
	  </div>
  <?php endif; ?>
	<br />

  <div id='menu_right_block_1'></div><br />
  <div id='menu_right_block_2'></div><br />
  <div id="menu_right_block_3"></div><br />
  
  	<?php if ($this->_tpl_vars['display_right_block_1']): ?>
    <div id='test_plan_mgmt_topics'>
    
      <?php if ($this->_tpl_vars['gui']->grants['mgt_testplan_create'] == 'yes'): ?>
	    	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
       		<a href="lib/plan/planView.php"><?php echo $this->_tpl_vars['labels']['href_plan_management']; ?>
</a>
	    <?php endif; ?>
	    
	    <?php if ($this->_tpl_vars['gui']->grants['testplan_create_build'] == 'yes' && $this->_tpl_vars['gui']->countPlans > 0): ?>
	    	<br />
	    	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
           	<a href="lib/plan/buildView.php"><?php echo $this->_tpl_vars['labels']['href_build_new']; ?>
</a>
      <?php endif; ?> 	    
	    <?php if ($this->_tpl_vars['gui']->grants['testplan_user_role_assignment'] == 'yes' && $this->_tpl_vars['gui']->countPlans > 0): ?>
	    	<br />
	    	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
       	    <a href="lib/usermanagement/usersAssign.php?featureType=testplan&amp;featureID=<?php echo $this->_tpl_vars['gui']->testplanID; ?>
"><?php echo $this->_tpl_vars['labels']['href_assign_user_roles']; ?>
</a>
	    <?php endif; ?>
      
	    <?php if ($this->_tpl_vars['gui']->grants['testplan_planning'] == 'yes' && $this->_tpl_vars['gui']->countPlans > 0): ?>
            <br />
        	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
           	<a href="lib/plan/planMilestonesView.php"><?php echo $this->_tpl_vars['labels']['href_plan_mstones']; ?>
</a>
	    <?php endif; ?>
	    
    </div>
  <?php endif; ?>
  
		<?php if ($this->_tpl_vars['display_right_block_2']): ?>
    <div id='test_execution_topics'>
		  <?php if ($this->_tpl_vars['gui']->grants['testplan_execute'] == 'yes'): ?>
		  	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	          <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=executeTest"><?php echo $this->_tpl_vars['labels']['href_execute_test']; ?>
</a>
		  <?php endif; ?> 
      
  	  <?php if ($this->_tpl_vars['gui']->grants['testplan_metrics'] == 'yes'): ?>
	          <br />
		  	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	          <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=showMetrics"><?php echo $this->_tpl_vars['labels']['href_rep_and_metrics']; ?>
</a>
		  <?php endif; ?> 
 	    <br />
 		  <img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	         <a href="<?php echo $this->_tpl_vars['gui']->url['metrics_dashboard']; ?>
"><?php echo $this->_tpl_vars['labels']['href_metrics_dashboard']; ?>
</a>
 	    <br />
 		  <img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	         <a href="<?php echo $this->_tpl_vars['gui']->url['testcase_assignments']; ?>
"><?php echo $this->_tpl_vars['labels']['href_my_testcase_assignments']; ?>
</a>
    </div>
	<?php endif; ?>
  
  	<?php if ($this->_tpl_vars['display_right_block_3']): ?>
    <div id='testplan_contents_topics'>
		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	    <a href="lib/platforms/platformsAssign.php?tplan_id=<?php echo $this->_tpl_vars['gui']->testplanID; ?>
"><?php echo $this->_tpl_vars['labels']['href_platform_assign']; ?>
</a>
		  <br />
		
		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	    <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=planAddTC"><?php echo $this->_tpl_vars['labels']['href_add_remove_test_cases']; ?>
</a>
	    <br />
		
		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	   	<a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=planUpdateTC"><?php echo $this->_tpl_vars['labels']['href_update_tplan']; ?>
</a>
	    <br />

		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	   	<a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=newest_tcversions"><?php echo $this->_tpl_vars['labels']['href_newest_tcversions']; ?>
</a>
	    <br />

		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	   	<a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=tc_exec_assignment"><?php echo $this->_tpl_vars['labels']['href_tc_exec_assignment']; ?>
</a>
	    <br />

		<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
			<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	   		<a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=test_urgency"><?php echo $this->_tpl_vars['labels']['href_plan_assign_urgency']; ?>
</a>
		    <br />
		<?php endif; ?>
    </div>
  <?php endif; ?>
  
</div>