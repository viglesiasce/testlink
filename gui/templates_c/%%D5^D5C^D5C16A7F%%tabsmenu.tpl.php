<?php /* Smarty version 2.6.26, created on 2010-09-27 15:25:36
         compiled from usermanagement/tabsmenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'usermanagement/tabsmenu.tpl', 23, false),)), $this); ?>

<?php $this->assign('action_create_role', "lib/usermanagement/rolesEdit.php?doAction=create"); ?>
<?php $this->assign('action_view_roles', "lib/usermanagement/rolesView.php"); ?>


<?php $this->assign('action_create_user', "lib/usermanagement/usersEdit.php?doAction=create"); ?>
<?php $this->assign('action_edit_user', "lib/usermanagement/usersEdit.php?doAction=edit&amp;user_id="); ?>
<?php $this->assign('action_view_users', "lib/usermanagement/usersView.php"); ?>
<?php $this->assign('action_assign_users_tproject', "lib/usermanagement/usersAssign.php?featureType=testproject"); ?>
<?php $this->assign('action_assign_users_tplan', "lib/usermanagement/usersAssign.php?featureType=testplan"); ?>


<?php echo lang_get_smarty(array('var' => 'tabsMenuLabels','s' => "menu_new_user,menu_view_users,menu_edit_user,menu_define_roles,
             menu_edit_role,menu_view_roles,menu_assign_testproject_roles,menu_assign_testplan_roles"), $this);?>


<div class="tabMenu">
<?php if ($this->_tpl_vars['grants']->user_mgmt == 'yes'): ?>
 	<?php if ($this->_tpl_vars['highlight']->edit_user): ?>
	   <span class="selected"><?php echo $this->_tpl_vars['tabsMenuLabels']['menu_edit_user']; ?>
</span>
	<?php else: ?>
	   <?php if ($this->_tpl_vars['highlight']->create_user): ?>
	       <span class="selected"><?php echo $this->_tpl_vars['tabsMenuLabels']['menu_new_user']; ?>
</span>
	   <?php endif; ?>
	<?php endif; ?>

  <?php $this->assign('closure', ""); ?>
	<?php if ($this->_tpl_vars['highlight']->view_users): ?>
	   <span class="selected">
	<?php else: ?>
	   <span class="unselected"><a href="<?php echo $this->_tpl_vars['action_view_users']; ?>
">
	   <?php $this->assign('closure', "</a>"); ?>
	<?php endif; ?>
	<?php echo $this->_tpl_vars['tabsMenuLabels']['menu_view_users']; ?>
<?php echo $this->_tpl_vars['closure']; ?>
</span>
<?php endif; ?>

<?php if ($this->_tpl_vars['grants']->role_mgmt == 'yes'): ?>
	<?php $this->assign('closure', ""); ?>
	<?php if ($this->_tpl_vars['highlight']->view_roles): ?>
	   <span class="selected"><?php echo $this->_tpl_vars['tabsMenuLabels']['menu_view_roles']; ?>
</span>
	<?php else: ?>
		<?php if ($this->_tpl_vars['highlight']->edit_role): ?>
	   		<span class="selected"><?php echo $this->_tpl_vars['tabsMenuLabels']['menu_edit_role']; ?>
</span>
		<?php else: ?>
	 		<span class="unselected"><a href="<?php echo $this->_tpl_vars['action_view_roles']; ?>
"><?php echo $this->_tpl_vars['tabsMenuLabels']['menu_view_roles']; ?>
</a></span>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['grants']->tproject_user_role_assignment == 'yes'): ?>
  <?php $this->assign('closure', ""); ?>
  <?php if ($this->_tpl_vars['highlight']->assign_users_tproject): ?>
	   <span class="selected">
	<?php else: ?>
	   <span class="unselected"><a href="<?php echo $this->_tpl_vars['action_assign_users_tproject']; ?>
">
	   <?php $this->assign('closure', "</a>"); ?>
	<?php endif; ?>
	<?php echo $this->_tpl_vars['tabsMenuLabels']['menu_assign_testproject_roles']; ?>
<?php echo $this->_tpl_vars['closure']; ?>
</span>
<?php endif; ?>


<?php if ($this->_tpl_vars['grants']->tplan_user_role_assignment == 'yes'): ?>
  <?php $this->assign('closure', ""); ?>
  <?php if ($this->_tpl_vars['highlight']->assign_users_tplan): ?>
	   <span class="selected">
	<?php else: ?>
	   <span class="unselected"><a href="<?php echo $this->_tpl_vars['action_assign_users_tplan']; ?>
">
	   <?php $this->assign('closure', "</a>"); ?>
	<?php endif; ?>
	<?php echo $this->_tpl_vars['tabsMenuLabels']['menu_assign_testplan_roles']; ?>
<?php echo $this->_tpl_vars['closure']; ?>
</span>
<?php endif; ?>
</div>