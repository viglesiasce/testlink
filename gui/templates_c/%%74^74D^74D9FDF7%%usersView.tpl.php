<?php /* Smarty version 2.6.26, created on 2010-09-03 15:33:50
         compiled from usermanagement/usersView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'usermanagement/usersView.tpl', 18, false),array('modifier', 'escape', 'usermanagement/usersView.tpl', 128, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('userActionMgr', "lib/usermanagement/usersEdit.php"); ?>
<?php $this->assign('createUserAction', ($this->_tpl_vars['userActionMgr'])."?doAction=create"); ?>
<?php $this->assign('editUserAction', ($this->_tpl_vars['userActionMgr'])."?doAction=edit&amp;user_id="); ?>

<?php echo lang_get_smarty(array('s' => 'warning_disable_user','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'disable','var' => 'del_msgbox_title'), $this);?>


<script type="text/javascript">
	var del_action=fRoot+"lib/usermanagement/usersView.php?operation=disable&user=";
</script>

<?php echo '
<script type="text/javascript">
function toggleRowByClass(oid,className,displayValue)
{
  var trTags = document.getElementsByTagName("tr");
  var cbox = document.getElementById(oid);
  
  for( idx=0; idx < trTags.length; idx++ ) 
  {
    if( trTags[idx].className == className ) 
    {
      if( displayValue == undefined )
      {
        if( cbox.checked )
        {
          trTags[idx].style.display = \'none\';
        }
        else
        {
          trTags[idx].style.display = \'table-row\';
        }
      } 
      else
      {
        trTags[idx].style.display = displayValue;
      }
    }
  }

}
</script>
'; ?>


</head>


<?php echo lang_get_smarty(array('var' => 'labels','s' => "title_user_mgmt,th_login,title_user_mgmt,th_login,th_first_name,th_last_name,th_email,
             th_role,order_by_role_descr,order_by_role_dir,th_locale,th_active,th_api,th_delete,
             disable,alt_edit_user,Yes,No,alt_delete_user,no_permissions_for_action,btn_create,
             show_inactive_users,hide_inactive_users,alt_disable_user,order_by_login,order_by_login_dir,alt_active_user"), $this);?>


<body <?php echo $this->_tpl_vars['body_onload']; ?>
>

<?php if ($this->_tpl_vars['grants']->user_mgmt == 'yes'): ?>

	<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_user_mgmt']; ?>
</h1>
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "usermanagement/tabsmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<div class="workBack">
		<form method="post" action="lib/usermanagement/usersView.php" name="usersview" id="usersview">
		<input type="hidden" id="operation" name="operation" value="" />
		<input type="hidden" id="order_by_role_dir" name="order_by_role_dir" value="<?php echo $this->_tpl_vars['order_by_role_dir']; ?>
" />
		<input type="hidden" id="order_by_login_dir" name="order_by_login_dir" value="<?php echo $this->_tpl_vars['order_by_login_dir']; ?>
" />
		<input type="hidden" id="user_order_by" name="user_order_by" value="<?php echo $this->_tpl_vars['user_order_by']; ?>
" />

	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['result'],'item' => 'user','action' => ($this->_tpl_vars['action']),'user_feedback' => $this->_tpl_vars['user_feedback'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php echo $this->_tpl_vars['labels']['hide_inactive_users']; ?>

    <input name="hide_inactive_users" id="hide_inactive_users" type="checkbox" <?php echo $this->_tpl_vars['checked_hide_inactive_users']; ?>
 
           value="on" onclick="toggleRowByClass('hide_inactive_users','inactive_user')">
		<table class="simple" width="95%">
			<tr>
				<th <?php if ($this->_tpl_vars['user_order_by'] == 'order_by_login'): ?>style="background-color: #c8dce8;color: black;"<?php endif; ?>>
				    <?php echo $this->_tpl_vars['labels']['th_login']; ?>

				    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/order_<?php echo $this->_tpl_vars['order_by_login_dir']; ?>
.gif"
				         title="<?php echo $this->_tpl_vars['labels']['order_by_login']; ?>
 <?php echo lang_get_smarty(array('s' => $this->_tpl_vars['order_by_login_dir']), $this);?>
"
						     alt="<?php echo $this->_tpl_vars['labels']['order_by_role_descr']; ?>
 <?php echo lang_get_smarty(array('s' => $this->_tpl_vars['order_by_role_dir']), $this);?>
"
				         onclick="usersview.operation.value='order_by_login';
				                  usersview.user_order_by.value='order_by_login';
				                  usersview.submit();" />
				</th>

				<th><?php echo $this->_tpl_vars['labels']['th_first_name']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_last_name']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_email']; ?>
</th>

				<th <?php if ($this->_tpl_vars['user_order_by'] == 'order_by_role'): ?>style="background-color: #c8dce8;color: black;"<?php endif; ?>>
				    <?php echo $this->_tpl_vars['labels']['th_role']; ?>

	    			<img src="<?php echo @TL_THEME_IMG_DIR; ?>
/order_<?php echo $this->_tpl_vars['order_by_role_dir']; ?>
.gif"
	    			     title="<?php echo $this->_tpl_vars['labels']['order_by_role_descr']; ?>
 <?php echo lang_get_smarty(array('s' => $this->_tpl_vars['order_by_role_dir']), $this);?>
"
						 alt="<?php echo $this->_tpl_vars['labels']['order_by_role_descr']; ?>
 <?php echo lang_get_smarty(array('s' => $this->_tpl_vars['order_by_role_dir']), $this);?>
"
	    			     onclick="usersview.operation.value='order_by_role';
	    			              usersview.user_order_by.value='order_by_role';
	      			            usersview.submit();" />
				</th>

				<th><?php echo $this->_tpl_vars['labels']['th_locale']; ?>
</th>
				<th style="width:50px;"><?php echo $this->_tpl_vars['labels']['th_active']; ?>
</th>
				<th style="width:50px;"><?php echo $this->_tpl_vars['labels']['disable']; ?>
</th>
			</tr>

      <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['userObj']):
?>
 			  <?php $this->assign('r_n', $this->_tpl_vars['userObj']->globalRole->name); ?>
				<?php $this->assign('r_d', $this->_tpl_vars['userObj']->globalRole->getDisplayName()); ?>
        <?php if ($this->_tpl_vars['userObj']->isActive == 1): ?>
          <?php $this->assign('user_row_class', ''); ?>
        <?php else: ?>
          <?php $this->assign('user_row_class', 'class="inactive_user"'); ?>
        <?php endif; ?>
				<tr <?php echo $this->_tpl_vars['user_row_class']; ?>
 <?php if ($this->_tpl_vars['role_colour'][$this->_tpl_vars['r_n']] != ''): ?> style="background-color: <?php echo $this->_tpl_vars['role_colour'][$this->_tpl_vars['r_n']]; ?>
;" <?php endif; ?>>
				<td><a href="<?php echo $this->_tpl_vars['editUserAction']; ?>
<?php echo $this->_tpl_vars['userObj']->dbID; ?>
">
				    <?php echo ((is_array($_tmp=$this->_tpl_vars['userObj']->login)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			      <?php if ($this->_tpl_vars['gsmarty_gui']->show_icon_edit): ?>
				      <img title="<?php echo $this->_tpl_vars['labels']['alt_edit_user']; ?>
"
				           alt="<?php echo $this->_tpl_vars['labels']['alt_edit_user']; ?>
" src="<?php echo @TL_THEME_IMG_DIR; ?>
/icon_edit.png"/>
				    <?php endif; ?>
				    </a>
				</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['userObj']->firstName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['userObj']->lastName)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['userObj']->emailAddress)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['r_d'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
				<td>
				 				</td>
				<td align="center">
					<?php if ($this->_tpl_vars['userObj']->isActive == 1): ?>
				  		<img style="border:none" title="<?php echo $this->_tpl_vars['labels']['alt_active_user']; ?>
"
  				                             alt="<?php echo $this->_tpl_vars['labels']['alt_active_user']; ?>
"  src="<?php echo $this->_tpl_vars['checked_img']; ?>
"/>
  			  <?php else: ?>
  				    &nbsp;
        	<?php endif; ?>
				</td>
				<td align="center">
				  <img style="border:none;cursor: pointer;"
               alt="<?php echo $this->_tpl_vars['labels']['alt_disable_user']; ?>
"
					     title="<?php echo $this->_tpl_vars['labels']['alt_disable_user']; ?>
"
					     onclick="delete_confirmation(<?php echo $this->_tpl_vars['userObj']->dbID; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['userObj']->login)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
					                                  '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');"
				       src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash.png"/>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		</form>
	</div>

	<div class="groupBtn">
	<form method="post" action="<?php echo $this->_tpl_vars['createUserAction']; ?>
" name="launch_create">
	<input type="submit" name="doCreate"  value="<?php echo $this->_tpl_vars['labels']['btn_create']; ?>
" />
  </form>
	</div>

		<?php if ($this->_tpl_vars['update_title_bar'] == 1): ?>
	<?php echo '
	<script type="text/javascript">
		parent.titlebar.location.reload();
	</script>
	'; ?>

	<?php endif; ?>
	<?php if ($this->_tpl_vars['reload'] == 1): ?>
	<?php echo '
	<script type="text/javascript">
		top.location.reload();
	</script>
	'; ?>

	<?php endif; ?>
<?php else: ?>
	<?php echo $this->_tpl_vars['labels']['no_permissions_for_action']; ?>
<br />
	<a href="<?php echo $this->_tpl_vars['base_href']; ?>
" alt="Home">Home</a>
<?php endif; ?>
</body>
</html>