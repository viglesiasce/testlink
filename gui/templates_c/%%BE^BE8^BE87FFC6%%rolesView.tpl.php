<?php /* Smarty version 2.6.26, created on 2010-10-14 16:20:29
         compiled from usermanagement/rolesView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'usermanagement/rolesView.tpl', 17, false),array('function', 'config_load', 'usermanagement/rolesView.tpl', 23, false),array('modifier', 'replace', 'usermanagement/rolesView.tpl', 22, false),array('modifier', 'escape', 'usermanagement/rolesView.tpl', 52, false),array('modifier', 'strip_tags', 'usermanagement/rolesView.tpl', 95, false),array('modifier', 'strip', 'usermanagement/rolesView.tpl', 95, false),)), $this); ?>
<?php $this->assign('roleActionMgr', "lib/usermanagement/rolesEdit.php"); ?>
<?php $this->assign('createRoleAction', ($this->_tpl_vars['roleActionMgr'])."?doAction=create"); ?>
<?php $this->assign('editRoleAction', ($this->_tpl_vars['roleActionMgr'])."?doAction=edit&amp;roleid="); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "btn_create,title_user_mgmt,title_roles,delete_role,caption_possible_affected_users,
             warning_users_will_be_reset,btn_confirm_delete,btn_cancel,no_roles,
             th_roles,th_role_description,th_delete,alt_edit_role,alt_delete_role,N_A"), $this);?>


<?php $this->assign('cfg_section', ((is_array($_tmp='usermanagement/rolesView.tpl')) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php echo lang_get_smarty(array('s' => 'warning_delete_role','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes','enableTableSorting' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
/* All this stuff is need for logic contained in inc_del_onclick.tpl */
var del_action=fRoot+'lib/usermanagement/rolesView.php?doAction=delete&roleid=';
</script>

</head>

<body <?php echo $this->_tpl_vars['body_onload']; ?>
>
<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_user_mgmt']; ?>
 - <?php echo $this->_tpl_vars['labels']['title_roles']; ?>
</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "usermanagement/tabsmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('draw_create_btn', '1'); ?>
<div class="workBack">
<?php if ($this->_tpl_vars['affectedUsers'] != null): ?>
  <?php $this->assign('draw_create_btn', '0'); ?>

    <h1 class="title"><?php echo $this->_tpl_vars['labels']['delete_role']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['roles'][$this->_tpl_vars['id']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

	<table class="common" style="width:50%">
	<caption><?php echo $this->_tpl_vars['labels']['caption_possible_affected_users']; ?>
</caption>
	<?php $_from = $this->_tpl_vars['affectedUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
	<tr>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
	<div class="legend_container"><?php echo $this->_tpl_vars['labels']['warning_users_will_be_reset']; ?>
 => <?php echo ((is_array($_tmp=$this->_tpl_vars['roles'][$this->_tpl_vars['role_id_replacement']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div><br />
	<div class="groupBtn">
		<input type="submit" name="confirmed" value="<?php echo $this->_tpl_vars['labels']['btn_confirm_delete']; ?>
"
		       onclick="location='lib/usermanagement/rolesView.php?doAction=confirmDelete&roleid=<?php echo $this->_tpl_vars['id']; ?>
'"/>
		<input type="submit" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
		       onclick="location='lib/usermanagement/rolesView.php'" />
	</div>
<?php else: ?>
	<?php if ($this->_tpl_vars['roles'] == ''): ?>
		<?php echo $this->_tpl_vars['labels']['no_roles']; ?>

	<?php else: ?>
				<table class="common sortable" width="50%">
			<tr>
				<th width="30%"><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_roles']; ?>
</th>
				<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_role_description']; ?>
</th>
				<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_delete']; ?>
</th>
			</tr>
			<?php $_from = $this->_tpl_vars['roles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role']):
?>
			<?php if ($this->_tpl_vars['role']->dbID != @TL_ROLES_INHERITED): ?>
			<tr>
				<td>
					<a href="<?php echo $this->_tpl_vars['editRoleAction']; ?>
<?php echo $this->_tpl_vars['role']->dbID; ?>
">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['role']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

						<?php if ($this->_tpl_vars['gsmarty_gui']->show_icon_edit): ?>
 						  <img title="<?php echo $this->_tpl_vars['labels']['alt_edit_role']; ?>
"
 						       alt="<?php echo $this->_tpl_vars['labels']['alt_edit_role']; ?>
"
 						       title="<?php echo $this->_tpl_vars['labels']['alt_edit_role']; ?>
"
 						       src="<?php echo @TL_THEME_IMG_DIR; ?>
/icon_edit.png" />
 						<?php endif; ?>
					</a>
				</td>
				<td>
					<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['role']->description)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)); ?>

				</td>
				<td>
					<?php if ($this->_tpl_vars['role']->dbID > @TL_LAST_SYSTEM_ROLE): ?>
				       <img style="border:none;cursor: pointer;"
		  				            title="<?php echo $this->_tpl_vars['labels']['alt_delete_role']; ?>
"
		  				            alt="<?php echo $this->_tpl_vars['labels']['alt_delete_role']; ?>
"
		 					            onclick="delete_confirmation(<?php echo $this->_tpl_vars['role']->dbID; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['role']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
		 					                                         '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');"
		  				            src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash.png"/>
					<?php else: ?>
						<?php echo $this->_tpl_vars['labels']['N_A']; ?>

					<?php endif; ?>
				</td>
			</tr>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	<?php endif; ?>
<?php endif; ?>
</div>
<?php if ($this->_tpl_vars['draw_create_btn']): ?>
<div class="groupBtn">
<form method="post" action="<?php echo $this->_tpl_vars['createRoleAction']; ?>
" name="launch_create">
<input type="submit" name="doCreate"  value="<?php echo $this->_tpl_vars['labels']['btn_create']; ?>
" />
</form>
</div>
<?php endif; ?>
</body>