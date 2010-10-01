<?php /* Smarty version 2.6.26, created on 2010-09-27 12:59:47
         compiled from testcases/containerView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/containerView.tpl', 23, false),array('modifier', 'escape', 'testcases/containerView.tpl', 72, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'th_product_name,edit_testproject_basic_data,th_notes,test_suite,details,none,
             keywords,alt_del_testsuite, alt_edit_testsuite, alt_move_cp_testcases, alt_move_cp_testsuite, 
             btn_new_testsuite, btn_reorder,btn_execute_automatic_testcases,
	           btn_edit_testsuite,btn_del_testsuite,btn_move_cp_testsuite,
	           btn_del_testsuites_bulk,
	           btn_export_testsuite, btn_export_all_testsuites, btn_import_testsuite, 
	           btn_new_tc,btn_move_cp_testcases, btn_import_tc, btn_export_tc, th_testplan_name'), $this);?>


<?php $this->assign('container_id', $this->_tpl_vars['gui']->container_data['id']); ?>
<?php $this->assign('tcImportAction', "lib/testcases/tcImport.php?containerID=".($this->_tpl_vars['container_id'])); ?>
<?php $this->assign('importToTProjectAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcImportAction'])."&amp;bIntoProject=1&amp;useRecursion=1&amp;"); ?>
<?php $this->assign('importToTSuiteAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcImportAction'])."&amp;useRecursion=1"); ?>
<?php $this->assign('importTestCasesAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcImportAction'])); ?>
<?php $this->assign('tcExportAction', "lib/testcases/tcExport.php?containerID=".($this->_tpl_vars['container_id'])); ?>
<?php $this->assign('exportTestCasesAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcExportAction'])); ?>
<?php $this->assign('tsuiteExportAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['tcExportAction'])."&amp;useRecursion=1"); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->assign('ext_location', @TL_EXTJS_RELATIVE_PATH); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo $this->_tpl_vars['ext_location']; ?>
/css/ext-all.css" />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


</head>

<body>
<h1 class="title"><?php echo $this->_tpl_vars['gui']->page_title; ?>
<?php echo $this->_tpl_vars['tlCfg']->gui_title_separator_1; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->container_data['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['gui']->sqlResult,'item' => $this->_tpl_vars['gui']->level,'name' => $this->_tpl_vars['gui']->moddedItem['name'],'refresh' => $_SESSION['setting_refresh_tree_on_action'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('bDownloadOnly', true); ?>
<?php $this->assign('drawReorderButton', true); ?>
<?php $this->assign('drawReorderButton', false); ?>

<?php if ($this->_tpl_vars['gui']->level == 'testproject'): ?>

	<?php if ($this->_tpl_vars['gui']->modify_tc_rights == 'yes'): ?>
		<?php $this->assign('bDownloadOnly', false); ?>

	<div>
	<form method="post" action="lib/testcases/containerEdit.php">
		<input type="hidden" name="doAction" id="doAction" value="" />
		<input type="hidden" name="containerID" value="<?php echo $this->_tpl_vars['gui']->container_data['id']; ?>
" />
		
		<input type="submit" name="new_testsuite" value="<?php echo $this->_tpl_vars['labels']['btn_new_testsuite']; ?>
" />

		<input type="button" onclick="location='<?php echo $this->_tpl_vars['importToTProjectAction']; ?>
'"
			                       value="<?php echo $this->_tpl_vars['labels']['btn_import_testsuite']; ?>
" />
		<input type="button" onclick="location='<?php echo $this->_tpl_vars['tsuiteExportAction']; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_export_all_testsuites']; ?>
" />

    
				</form>
	</div>
	<?php endif; ?>

	<table class="simple" >
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_product_name']; ?>
</th>
		</tr>
		<tr>
			<td>
	    <?php if ($this->_tpl_vars['gui']->mgt_modify_product == 'yes'): ?>
			  <a href="lib/project/projectView.php"  target="mainframe"
			          title="<?php echo $this->_tpl_vars['labels']['edit_testproject_basic_data']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->container_data['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
			<?php else: ?>
			   <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->container_data['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_notes']; ?>
</th>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['gui']->container_data['notes']; ?>
</td>
		</tr>

	</table>
	
  	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_attachments.tpl", 'smarty_include_vars' => array('attach_id' => $this->_tpl_vars['gui']->id,'attach_tableName' => 'nodes_hierarchy','attach_attachmentInfos' => $this->_tpl_vars['gui']->attachmentInfos,'attach_downloadOnly' => $this->_tpl_vars['bDownloadOnly'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>




<?php elseif ($this->_tpl_vars['gui']->level == 'testsuite'): ?>

	<?php if ($this->_tpl_vars['gui']->modify_tc_rights == 'yes' || $this->_tpl_vars['gui']->sqlResult != ''): ?>
		<div class="groupBtn">

				<span style="float: left; margin-right: 5px;">
		<form method="post" action="lib/testcases/containerEdit.php">
			<input type="hidden" name="containerID" value="<?php echo $this->_tpl_vars['gui']->container_data['id']; ?>
" />
			<input type="submit" name="new_testsuite" value="<?php echo $this->_tpl_vars['labels']['btn_new_testsuite']; ?>
" />
		</form>
		</span>

		<form method="post" action="lib/testcases/containerEdit.php">
			<input type="hidden" name="testsuiteID" value="<?php echo $this->_tpl_vars['gui']->container_data['id']; ?>
" />
			<input type="hidden" name="testsuiteName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->container_data['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
			<input type="submit" name="edit_testsuite" value="<?php echo $this->_tpl_vars['labels']['btn_edit_testsuite']; ?>
"
				     title="<?php echo $this->_tpl_vars['labels']['alt_edit_testsuite']; ?>
" />
			<input type="submit" name="delete_testsuite" value="<?php echo $this->_tpl_vars['labels']['btn_del_testsuite']; ?>
"
				     title="<?php echo $this->_tpl_vars['labels']['alt_del_testsuite']; ?>
" />
			<input type="submit" name="move_testsuite_viewer" value="<?php echo $this->_tpl_vars['labels']['btn_move_cp_testsuite']; ?>
"
				     title="<?php echo $this->_tpl_vars['labels']['alt_move_cp_testsuite']; ?>
" />

			<input type="button" onclick="location='<?php echo $this->_tpl_vars['importToTSuiteAction']; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_import_testsuite']; ?>
" />
			<input type="button" onclick="location='<?php echo $this->_tpl_vars['tsuiteExportAction']; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_export_testsuite']; ?>
" />
		</form>
	    </div>

				<div class="groupBtn">
		<span style="float: left; margin-right: 5px;">
		<form method="post" action="lib/testcases/tcEdit.php">
		  <input type="hidden" name="containerID" value="<?php echo $this->_tpl_vars['gui']->container_data['id']; ?>
" />
			<input type="submit" accesskey="t" id="create_tc" name="create_tc" value="<?php echo $this->_tpl_vars['labels']['btn_new_tc']; ?>
" />
			<input type="button" onclick="location='<?php echo $this->_tpl_vars['importTestCasesAction']; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_import_tc']; ?>
" />
			<input type="button" onclick="location='<?php echo $this->_tpl_vars['exportTestCasesAction']; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_export_tc']; ?>
" />

		</form>
		</span>
		<form method="post" action="lib/testcases/containerEdit.php">
			<input type="hidden" name="testsuiteID" value="<?php echo $this->_tpl_vars['gui']->container_data['id']; ?>
" />
			<input type="hidden" name="testsuiteName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->container_data['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	    <input type="submit" name="move_testcases_viewer" value="<?php echo $this->_tpl_vars['labels']['btn_move_cp_testcases']; ?>
"
         		 title="<?php echo $this->_tpl_vars['labels']['alt_move_cp_testcases']; ?>
" />
		</form>

		</div>
	<?php endif; ?>
	
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "testcases/inc_testsuite_viewer_ro.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php if ($this->_tpl_vars['gui']->modify_tc_rights == 'yes'): ?>
		<?php $this->assign('bDownloadOnly', false); ?>
	<?php endif; ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_attachments.tpl", 'smarty_include_vars' => array('attach_attachmentInfos' => $this->_tpl_vars['gui']->attachmentInfos,'attach_id' => $this->_tpl_vars['gui']->id,'attach_tableName' => 'nodes_hierarchy','attach_downloadOnly' => $this->_tpl_vars['bDownloadOnly'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?> 
</div>
<?php if ($this->_tpl_vars['gui']->refreshTree): ?>
   	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
</body>
</html>