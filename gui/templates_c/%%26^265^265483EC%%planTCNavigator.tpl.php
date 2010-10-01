<?php /* Smarty version 2.6.26, created on 2010-09-27 15:35:13
         compiled from plan/planTCNavigator.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'plan/planTCNavigator.tpl', 20, false),array('function', 'config_load', 'plan/planTCNavigator.tpl', 122, false),array('modifier', 'basename', 'plan/planTCNavigator.tpl', 121, false),array('modifier', 'replace', 'plan/planTCNavigator.tpl', 121, false),array('modifier', 'escape', 'plan/planTCNavigator.tpl', 124, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'btn_update_menu,btn_apply_filter,keyword,keywords_filter_help,title_navigator,
             btn_bulk_update_to_latest_version,
             filter_owner,TestPlan,test_plan,caption_nav_filters,
             build,filter_tcID,filter_on,filter_result,platform, include_unassigned_testcases'), $this);?>


    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array('bResetEXTCss' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<script type="text/javascript" src='gui/javascript/ext_extensions.js'></script>
		<?php echo '
	<script type="text/javascript">
		treeCfg = {tree_div_id:\'tree\',root_name:"",root_id:0,root_href:"",
		           loader:"", enableDD:false, dragDropBackEndUrl:\'\',children:""};
		Ext.onReady(function() {
			Ext.state.Manager.setProvider(new Ext.state.CookieProvider());
	
			// Use a collapsible panel for filter settings
			// and place a help icon in ther header
			var settingsPanel = new Ext.ux.CollapsiblePanel({
				id: \'tl_exec_filter\',
				applyTo: \'settings_panel\',
				tools: [{
					id: \'help\',
					handler: function(event, toolEl, panel) {
						show_help(help_localized_text);
					}
				}]
			});
			var filtersPanel = new Ext.ux.CollapsiblePanel({
				id: \'tl_exec_settings\',
				applyTo: \'filter_panel\'
			});
		});
	</script>

    <script type="text/javascript">
    treeCfg = {tree_div_id:\'tree\',root_name:"",root_id:0,root_href:"",
               loader:"", enableDD:false, dragDropBackEndUrl:\'\',children:""};
    </script>
    '; ?>

    
    <script type="text/javascript">
	    treeCfg.root_name = '<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->name; ?>
';
	    treeCfg.root_id = <?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->id; ?>
;
	    // BUGID 3049
	    // treeCfg.root_href = "javascript:PL(<?php echo $this->_tpl_vars['gui']->tPlanID; ?>
)";
	    // BUGID 3406
	    treeCfg.root_href = '<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->href; ?>
';
	    treeCfg.children = <?php echo $this->_tpl_vars['gui']->ajaxTree->children; ?>
;
    </script>
    
    <script type="text/javascript" src='gui/javascript/execTree.js'>
    </script>

<script type="text/javascript">
<?php echo '
function pre_submit()
{
	document.getElementById(\'called_url\').value = parent.workframe.location;
	return true;
}

/*
  function: update2latest
  args :
  returns:
*/
function update2latest(id)
{
	var action_url = fRoot+\'/\'+menuUrl+"?doAction=doBulkUpdateToLatest&level=testplan&id="+id+args;
	parent.workframe.location = action_url;
}

// BUGID 3406
///**
// * open page to unassign all testcases in workframe
// *
// * @param id Testplan ID
// */
//function goToUnassignPage(id)
//{
//	var action_url = fRoot + \'lib/testcases/containerEdit.php?doAction=doUnassignFromPlan&tplan_id=\' + id;
//	parent.workframe.location = action_url;
//}

'; ?>

</script>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'inc_filter_panel_js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


	
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='plan/planTCNavigator.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_navigator']; ?>
 <?php echo $this->_tpl_vars['labels']['TestPlan']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->additional_string)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'inc_filter_panel.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="tree" style="overflow:auto; height:400px;border:1px solid #c3daf9;"></div>

<script type="text/javascript">
<?php if ($this->_tpl_vars['gui']->src_workframe != ''): ?>
	parent.workframe.location='<?php echo $this->_tpl_vars['gui']->src_workframe; ?>
';
<?php endif; ?>
</script>

</body>
</html>