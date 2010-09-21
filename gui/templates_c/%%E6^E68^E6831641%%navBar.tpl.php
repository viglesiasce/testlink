<?php /* Smarty version 2.6.26, created on 2010-09-20 18:09:14
         compiled from navBar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'navBar.tpl', 14, false),array('function', 'config_load', 'navBar.tpl', 19, false),array('modifier', 'replace', 'navBar.tpl', 18, false),array('modifier', 'escape', 'navBar.tpl', 38, false),array('modifier', 'truncate', 'navBar.tpl', 40, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "title_events,event_viewer,home,testproject,title_specification,title_execute,
             title_edit_personal_data,th_tcid,link_logout,title_admin,
             search_testcase,title_results,title_user_mgmt"), $this);?>

<?php $this->assign('cfg_section', ((is_array($_tmp='navBar.tpl')) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body style="min-width: 800px;">
<div style="float:left; height: 100%;">
	<a href="index.php" target="_parent">
	<img alt="Company logo"	title="logo" style="width: 130px; height: 50px;" 
	src="<?php echo @TL_THEME_IMG_DIR; ?>
<?php echo $this->_tpl_vars['tlCfg']->company_logo; ?>
" /></a>
</div>
	
<div class="menu_title">

	<?php if ($this->_tpl_vars['gui']->TestProjects != ""): ?>
	<div style="float: right; padding: 2px;">
		<form name="productForm" action="lib/general/navBar.php" method="get">
			<span style="font-size: 80%"><?php echo $this->_tpl_vars['labels']['testproject']; ?>
</span>
			<select class="menu_combo" name="testproject" onchange="this.form.submit();">
	      	<?php $_from = $this->_tpl_vars['gui']->TestProjects; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tproject_id'] => $this->_tpl_vars['tproject_name']):
?>
	  		  <option value="<?php echo $this->_tpl_vars['tproject_id']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['tproject_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
	  		    <?php if ($this->_tpl_vars['tproject_id'] == $this->_tpl_vars['gui']->tprojectID): ?> selected="selected" <?php endif; ?>>
	  		    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tproject_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['TESTPROJECT_TRUNCATE_SIZE']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['TESTPROJECT_TRUNCATE_SIZE'])))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
	  		<?php endforeach; endif; unset($_from); ?>
			</select>
		</form>
	</div>
	<?php endif; ?>

	<span class="bold">TestLink <?php echo ((is_array($_tmp=$this->_tpl_vars['tlVersion'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 : <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->whoami)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>

</div>

<div class="menu_bar" style="margin: 0px 5px 0px 135px;">

	<span style="float: right;">
   		<a href='lib/usermanagement/userInfo.php' target="mainframe" accesskey="i"
      		tabindex="6"><?php echo $this->_tpl_vars['labels']['title_edit_personal_data']; ?>
</a>
	 | 	<a href="logout.php" target="_parent" accesskey="q"><?php echo $this->_tpl_vars['labels']['link_logout']; ?>
</a>
	</span>

	<?php echo $this->_tpl_vars['session']['testprojectTopMenu']; ?>


<?php if ($this->_tpl_vars['gui']->tprojectID): ?>

	<?php if ($this->_tpl_vars['gui']->grants->view_testcase_spec == 'yes'): ?>
		<form style="display:inline" target="mainframe" name="searchTC" id="searchTC"
		      action="lib/testcases/archiveData.php" method="get">
		<span style="font-size: 80%"><?php echo $this->_tpl_vars['labels']['th_tcid']; ?>
: </span>
		<input style="font-size: 80%;" type="text" size="<?php echo $this->_tpl_vars['gui']->searchSize; ?>
"
		       title="<?php echo $this->_tpl_vars['labels']['search_testcase']; ?>
" name="targetTestCase" value="<?php echo $this->_tpl_vars['gui']->tcasePrefix; ?>
" />
    			<input type="hidden" id="tcasePrefix" name="tcasePrefix" value="<?php echo $this->_tpl_vars['gui']->tcasePrefix; ?>
" />
		<img src="<?php echo @TL_THEME_IMG_DIR; ?>
/magnifier.png"
		     title="<?php echo $this->_tpl_vars['labels']['search_testcase']; ?>
" alt="<?php echo $this->_tpl_vars['labels']['search_testcase']; ?>
"
		     onclick="document.getElementById('searchTC').submit()" class="clickable" />
		<input type="hidden" name="edit" value="testcase"/>
		<input type="hidden" name="allow_edit" value="0"/>
		</form>
	<?php endif; ?>
<?php endif; ?>
</div>

<?php if ($this->_tpl_vars['gui']->updateMainPage == 1): ?>
<?php echo '
<script type="text/javascript">
	parent.mainframe.location = "'; ?>
<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo 'lib/general/mainPage.php";
</script>
'; ?>

<?php endif; ?>

</body>
</html>