<?php /* Smarty version 2.6.26, created on 2010-09-27 11:02:41
         compiled from testcases/tcTree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcTree.tpl', 17, false),array('modifier', 'escape', 'testcases/tcTree.tpl', 64, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "caption_nav_filter_settings,testsuite,do_auto_update,keywords_filter_help,
             button_update_tree,no_tc_spec_av,keyword,execution_type"), $this);?>



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
	'; ?>
	
	
    <?php if ($this->_tpl_vars['gui']->ajaxTree->loader == ''): ?>
        <?php echo '
        <script type="text/javascript">
        treeCfg = {tree_div_id:\'tree\',root_name:"",root_id:0,root_href:"",
                   loader:"", enableDD:false, dragDropBackEndUrl:\'\',children:""};
        </script>
        '; ?>


        <script type="text/javascript">
        treeCfg.root_name='<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->ajaxTree->root_node->name)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
        treeCfg.root_id=<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->id; ?>
;
        treeCfg.root_href='<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->href; ?>
';
        treeCfg.children=<?php echo $this->_tpl_vars['gui']->ajaxTree->children; ?>
;
	      // BUGID 0003664
	      treeCfg.enableDD='<?php echo $this->_tpl_vars['gui']->ajaxTree->dragDrop->enabled; ?>
';
        </script>
        <script type="text/javascript" src='gui/javascript/execTree.js'></script>
    
    <?php else: ?>
        <?php echo '
        <script type="text/javascript">
        treeCfg = {tree_div_id:\'tree\',root_name:"",root_id:0,root_href:"",
                   root_testlink_node_type:\'\',useBeforeMoveNode:false,
                   loader:"", enableDD:false, dragDropBackEndUrl:\'\'};
        </script>
        '; ?>

        
        <script type="text/javascript">
	        treeCfg.loader='<?php echo $this->_tpl_vars['gui']->ajaxTree->loader; ?>
';
	        treeCfg.root_name='<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->ajaxTree->root_node->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
';
	        treeCfg.root_id=<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->id; ?>
;
	        treeCfg.root_href='<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->href; ?>
';
	        treeCfg.enableDD='<?php echo $this->_tpl_vars['gui']->ajaxTree->dragDrop->enabled; ?>
';
	        treeCfg.dragDropBackEndUrl='<?php echo $this->_tpl_vars['gui']->ajaxTree->dragDrop->BackEndUrl; ?>
';
	        treeCfg.cookiePrefix='<?php echo $this->_tpl_vars['gui']->ajaxTree->cookiePrefix; ?>
';
	        treeCfg.root_testlink_node_type='<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->testlink_node_type; ?>
';
	        treeCfg.useBeforeMoveNode='<?php echo $this->_tpl_vars['gui']->ajaxTree->dragDrop->useBeforeMoveNode; ?>
';
	        </script>
        <script type="text/javascript" src='gui/javascript/treebyloader.js'>
        </script>
    <?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'inc_filter_panel_js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<h1 class="title"><?php echo $this->_tpl_vars['gui']->treeHeader; ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'inc_filter_panel.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="tree" style="overflow:auto; height:100%;border:1px solid #c3daf9;"></div>

</body>
</html>