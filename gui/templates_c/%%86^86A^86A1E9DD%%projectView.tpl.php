<?php /* Smarty version 2.6.26, created on 2010-09-03 15:33:20
         compiled from project/projectView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'project/projectView.tpl', 15, false),array('modifier', 'replace', 'project/projectView.tpl', 15, false),array('modifier', 'escape', 'project/projectView.tpl', 78, false),array('modifier', 'strip_tags', 'project/projectView.tpl', 87, false),array('modifier', 'strip', 'project/projectView.tpl', 87, false),array('modifier', 'truncate', 'project/projectView.tpl', 87, false),array('function', 'config_load', 'project/projectView.tpl', 16, false),array('function', 'lang_get', 'project/projectView.tpl', 24, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='project/projectView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $this->assign('managerURL', "lib/project/projectEdit.php"); ?>
<?php $this->assign('deleteAction', ($this->_tpl_vars['managerURL'])."?doAction=doDelete&tprojectID="); ?>
<?php $this->assign('editAction', ($this->_tpl_vars['managerURL'])."?doAction=edit&amp;tprojectID="); ?>
<?php $this->assign('createAction', ($this->_tpl_vars['managerURL'])."?doAction=create"); ?>

<?php echo lang_get_smarty(array('s' => 'popup_product_delete','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => 'title_testproject_management,testproject_txt_empty_list,tcase_id_prefix,
		th_name,th_notes,testproject_alt_edit,testproject_alt_active,
		th_requirement_feature,testproject_alt_delete,btn_create,public,
		testproject_alt_requirement_feature,th_active,th_delete,th_id'), $this);?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','enableTableSorting' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
/* All this stuff is needed for logic contained in inc_del_onclick.tpl */
var del_action=fRoot+'<?php echo $this->_tpl_vars['deleteAction']; ?>
';
</script>
</head>

<body <?php echo $this->_tpl_vars['body_onload']; ?>
>

<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_testproject_management']; ?>
</h1>
<div class="workBack">

<?php if ($this->_tpl_vars['gui']->canManage): ?>
<div class="groupBtn">
	<form method="post" action="<?php echo $this->_tpl_vars['createAction']; ?>
">
		<input type="submit" name="create" value="<?php echo $this->_tpl_vars['labels']['btn_create']; ?>
" />
	</form>
</div>
<?php endif; ?>

<div id="testproject_management_list">
<?php if ($this->_tpl_vars['gui']->tprojects == ''): ?>
	<?php echo $this->_tpl_vars['labels']['testproject_txt_empty_list']; ?>

<?php else: ?>
	<table id="item_view" class="simple sortable" width="95%">
		<tr>
			<th><?php echo $this->_tpl_vars['toggle_api_info_img']; ?>
<?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_name']; ?>
</th>
			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_notes']; ?>
</th>
			<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['tcase_id_prefix']; ?>
</th>
			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_requirement_feature']; ?>
</th>
			<th class="icon_cell"><?php echo $this->_tpl_vars['labels']['th_active']; ?>
</th>
			<?php if ($this->_tpl_vars['gui']->canManage == 'yes'): ?>
			<th class="icon_cell"><?php echo $this->_tpl_vars['labels']['th_delete']; ?>
</th>
			<?php endif; ?>
		</tr>
		<?php $_from = $this->_tpl_vars['gui']->tprojects; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['testproject']):
?>
		<tr>
			<td><span class="api_info" style='display:none'><?php echo ((is_array($_tmp=$this->_tpl_vars['tlCfg']->api->id_format)) ? $this->_run_mod_handler('replace', true, $_tmp, "%s", $this->_tpl_vars['testproject']['id']) : smarty_modifier_replace($_tmp, "%s", $this->_tpl_vars['testproject']['id'])); ?>
</span>
			    <a href="<?php echo $this->_tpl_vars['editAction']; ?>
<?php echo $this->_tpl_vars['testproject']['id']; ?>
">
				     <?php echo ((is_array($_tmp=$this->_tpl_vars['testproject']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				     <?php if ($this->_tpl_vars['gsmarty_gui']->show_icon_edit): ?>
 				         <img title="<?php echo $this->_tpl_vars['labels']['testproject_alt_edit']; ?>
"
 				              alt="<?php echo $this->_tpl_vars['labels']['testproject_alt_edit']; ?>
"
 				              src="<?php echo @TL_THEME_IMG_DIR; ?>
/icon_edit.png"/>
 				     <?php endif; ?>
 				  </a>
			</td>
			<td>
				<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['testproject']['notes'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['TESTPROJECT_NOTES_TRUNCATE']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['TESTPROJECT_NOTES_TRUNCATE'])); ?>

			</td>
			<td width="10%">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['testproject']['prefix'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			</td>
			<td class="clickable_icon">
				<?php if ($this->_tpl_vars['testproject']['opt']->requirementsEnabled): ?>
  					<img style="border:none"
  				            title="<?php echo $this->_tpl_vars['labels']['testproject_alt_requirement_feature']; ?>
"
  				            alt="<?php echo $this->_tpl_vars['labels']['testproject_alt_requirement_feature']; ?>
"
  				            src="<?php echo @TL_THEME_IMG_DIR; ?>
/apply_f2_16.png"/>
  				<?php else: ?>
  					&nbsp;
  				<?php endif; ?>
			</td>
			<td class="clickable_icon">
				<?php if ($this->_tpl_vars['testproject']['active']): ?>
  					<img style="border:none"
  				            title="<?php echo $this->_tpl_vars['labels']['testproject_alt_active']; ?>
"
  				            alt="<?php echo $this->_tpl_vars['labels']['testproject_alt_active']; ?>
"
  				            src="<?php echo @TL_THEME_IMG_DIR; ?>
/apply_f2_16.png"/>
  				<?php else: ?>
  					&nbsp;
  				<?php endif; ?>
			</td>
			<?php if ($this->_tpl_vars['gui']->canManage == 'yes'): ?>
			<td class="clickable_icon">
				  <img style="border:none;cursor: pointer;"  alt="<?php echo $this->_tpl_vars['labels']['testproject_alt_delete']; ?>
"
					     title="<?php echo $this->_tpl_vars['labels']['testproject_alt_delete']; ?>
"
					     onclick="delete_confirmation(<?php echo $this->_tpl_vars['testproject']['id']; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['testproject']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
					                                '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');"
				       src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash.png"/>
			</td>
			<?php endif; ?>
		</tr>
		<?php endforeach; endif; unset($_from); ?>

	</table>

<?php endif; ?>
</div>

</div>

<?php if ($this->_tpl_vars['gui']->doAction == 'reloadAll'): ?>
	<script type="text/javascript">
	top.location = top.location;
	</script>
<?php else: ?>
  <?php if ($this->_tpl_vars['gui']->doAction == 'reloadNavBar'): ?>
	<script type="text/javascript">
  // remove query string to avoid reload of home page,
  // instead of reload only navbar
  var href_pieces=parent.titlebar.location.href.split('?');
	parent.titlebar.location=href_pieces[0];
	</script>
  <?php endif; ?>
<?php endif; ?>

</body>
</html>