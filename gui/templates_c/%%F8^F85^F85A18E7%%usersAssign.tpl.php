<?php /* Smarty version 2.6.26, created on 2010-09-27 15:26:05
         compiled from usermanagement/usersAssign.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'usermanagement/usersAssign.tpl', 17, false),array('function', 'cycle', 'usermanagement/usersAssign.tpl', 136, false),array('modifier', 'escape', 'usermanagement/usersAssign.tpl', 87, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'TestProject,TestPlan,btn_change,title_user_mgmt,set_roles_to,
             warn_demo,User,btn_upd_user_data,btn_do,title_assign_roles'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('jsValidate' => 'yes','openHead' => 'yes','enableTableSorting' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array('css_only' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script language="JavaScript" type="text/javascript">
<?php echo '
/*
Set value for a group of combo (have same prefix).
MUST TO BE PLACED IN COMMON LIBRARY
*/
function set_combo_group(container_id,combo_id_prefix,value_to_assign)
{
  var container=document.getElementById(container_id);
	var all_comboboxes = container.getElementsByTagName(\'select\');
	var input_element;
	var idx=0;

	for(idx = 0; idx < all_comboboxes.length; idx++)
	{
	  input_element=all_comboboxes[idx];
		if( input_element.type == "select-one" && 
		    input_element.id.indexOf(combo_id_prefix)==0 &&
		   !input_element.disabled)
		{
       input_element.value=value_to_assign;
		}	
	}
}
'; ?>

</script>

</head>
<body>

<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_user_mgmt']; ?>
 - <?php echo $this->_tpl_vars['labels']['title_assign_roles']; ?>
</h1>
<?php $this->assign('umgmt', "lib/usermanagement"); ?>
<?php $this->assign('my_feature_name', ''); ?>

<?php $this->assign('highlight', $this->_tpl_vars['gui']->highlight); ?>
<?php $this->assign('grants', $this->_tpl_vars['gui']->grants); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "usermanagement/tabsmenu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="workBack">

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['result'],'item' => ($this->_tpl_vars['gui'])."->featureType",'action' => ($this->_tpl_vars['action']),'user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php if ($this->_tpl_vars['gui']->features != ''): ?>
<form method="post" action="<?php echo $this->_tpl_vars['umgmt']; ?>
/usersAssign.php"
	<?php if ($this->_tpl_vars['tlCfg']->demoMode): ?>
		onsubmit="alert('<?php echo $this->_tpl_vars['labels']['warn_demo']; ?>
'); return false;"
	<?php endif; ?>>
	<input type="hidden" name="featureID" value="<?php echo $this->_tpl_vars['gui']->featureID; ?>
" />
	<input type="hidden" name="featureType" value="<?php echo $this->_tpl_vars['gui']->featureType; ?>
" />
	<div>
		<table border='0'>
    	<?php if ($this->_tpl_vars['gui']->featureType == 'testproject'): ?>
    		<tr><td class="labelHolder"><?php echo $this->_tpl_vars['labels']['TestProject']; ?>
</td><td>&nbsp;</td>
    	<?php else: ?>
    		<tr><td class="labelHolder"><?php echo $this->_tpl_vars['labels']['TestProject']; ?>
<?php echo @TITLE_SEP; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tproject_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td></tr>
    		<tr>
				<td class="labelHolder"><?php echo $this->_tpl_vars['labels']['TestPlan']; ?>
</td>
    	<?php endif; ?>
		    	<td>
		        <select id="featureSel" onchange="changeFeature('<?php echo $this->_tpl_vars['gui']->featureType; ?>
')">
		    	   <?php $_from = $this->_tpl_vars['gui']->features; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f']):
?>
		    	     <option value="<?php echo $this->_tpl_vars['f']['id']; ?>
" <?php if ($this->_tpl_vars['gui']->featureID == $this->_tpl_vars['f']['id']): ?> selected="selected" <?php endif; ?>>
		    	     <?php echo ((is_array($_tmp=$this->_tpl_vars['f']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
		    	     <?php if ($this->_tpl_vars['gui']->featureID == $this->_tpl_vars['f']['id']): ?>
		    	        <?php $this->assign('my_feature_name', $this->_tpl_vars['f']['name']); ?>
		    	     <?php endif; ?>
		    	   <?php endforeach; endif; unset($_from); ?>
		    	   </select>
		    	</td>
			<td>
					<input type="button" value="<?php echo $this->_tpl_vars['labels']['btn_change']; ?>
" onclick="changeFeature('<?php echo $this->_tpl_vars['gui']->featureType; ?>
');"/>
		  </td>
			</tr>
   		<tr>
   		<td class="labelHolder"><?php echo $this->_tpl_vars['labels']['set_roles_to']; ?>
</td><?php if ($this->_tpl_vars['gui']->featureType == 'testproject'): ?> <td>&nbsp;</td> <?php endif; ?>
      <td> 
        <select name="allUsersRole" id="allUsersRole">
		      <?php $_from = $this->_tpl_vars['gui']->optRights; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role_id'] => $this->_tpl_vars['role']):
?>
		        <option value="<?php echo $this->_tpl_vars['role_id']; ?>
">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['role']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		        </option>
		      <?php endforeach; endif; unset($_from); ?>
			  </select>
      </td>
      <td>
					<input type="button" value="<?php echo $this->_tpl_vars['labels']['btn_do']; ?>
" 
					       onclick="javascript:set_combo_group('usersRoleTable','userRole_',
					                                           document.getElementById('allUsersRole').value);"/>
		  </td>
			</tr>

		</table>
    </div>
    
    <div id="usersRoleTable">
	    <table class="common sortable" width="75%">
    	<tr>
    		<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['User']; ?>
</th>
    		<?php $this->assign('featureVerbose', $this->_tpl_vars['gui']->featureType); ?>
    		<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo lang_get_smarty(array('s' => "th_roles_".($this->_tpl_vars['featureVerbose'])), $this);?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['my_feature_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</th>
    	</tr>
    	<?php $_from = $this->_tpl_vars['gui']->users; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
    	<?php $this->assign('globalRoleName', $this->_tpl_vars['user']->globalRole->name); ?>
    	<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#eeeeee,#d0d0d0"), $this);?>
">
    		<td <?php if ($this->_tpl_vars['gui']->role_colour != '' && $this->_tpl_vars['gui']->role_colour[$this->_tpl_vars['globalRoleName']] != ''): ?>  		
    		      style="background-color: <?php echo $this->_tpl_vars['gui']->role_colour[$this->_tpl_vars['globalRoleName']]; ?>
;" <?php endif; ?>>
    		    <?php echo ((is_array($_tmp=$this->_tpl_vars['user']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
    		<td>
    			<?php $this->assign('uID', $this->_tpl_vars['user']->dbID); ?>
                              <?php if ($this->_tpl_vars['gui']->userFeatureRoles[$this->_tpl_vars['uID']]['is_inherited'] == 1): ?>
            <?php $this->assign('ikx', $this->_tpl_vars['gui']->userFeatureRoles[$this->_tpl_vars['uID']]['effective_role_id']); ?>
          <?php else: ?>
            <?php $this->assign('ikx', $this->_tpl_vars['gui']->userFeatureRoles[$this->_tpl_vars['uID']]['uplayer_role_id']); ?>
          <?php endif; ?>
			    <?php $this->assign('inherited_role_name', $this->_tpl_vars['gui']->optRights[$this->_tpl_vars['ikx']]->name); ?>
             <select name="userRole[<?php echo $this->_tpl_vars['uID']; ?>
]" id="userRole_<?php echo $this->_tpl_vars['uID']; ?>
">
		      <?php $_from = $this->_tpl_vars['gui']->optRights; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role_id'] => $this->_tpl_vars['role']):
?>
		        <option value="<?php echo $this->_tpl_vars['role_id']; ?>
"
		          <?php if (( $this->_tpl_vars['gui']->userFeatureRoles[$this->_tpl_vars['uID']]['effective_role_id'] == $this->_tpl_vars['role_id'] && $this->_tpl_vars['gui']->userFeatureRoles[$this->_tpl_vars['uID']]['is_inherited'] == 0 ) || ( $this->_tpl_vars['role_id'] == @TL_ROLES_INHERITED && $this->_tpl_vars['gui']->userFeatureRoles[$this->_tpl_vars['uID']]['is_inherited'] == 1 )): ?>
		            selected="selected" <?php endif; ?> >
                <?php echo ((is_array($_tmp=$this->_tpl_vars['role']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

                <?php if ($this->_tpl_vars['role_id'] == @TL_ROLES_INHERITED): ?>
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['inherited_role_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 
                <?php endif; ?>
		        </option>
		      <?php endforeach; endif; unset($_from); ?>
			</select>
			</td>
    	</tr>
    	<?php endforeach; endif; unset($_from); ?>
    	</table>
   </div> 	
    	<div class="groupBtn">	
    		<input type="submit" name="do_update" value="<?php echo $this->_tpl_vars['labels']['btn_upd_user_data']; ?>
" />
    	</div>
  </form>
  <hr />
<?php endif; ?> </div>
</body>
</html>