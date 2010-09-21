<?php /* Smarty version 2.6.26, created on 2010-09-13 10:07:59
         compiled from plan/inc_controls_planEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'plan/inc_controls_planEdit.tpl', 8, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'testplan_copy_builds,testplan_copy_tcases,testplan_copy_tcases_latest,
		         testplan_copy_tcases_current,testplan_copy_builds,
		         testplan_copy_priorities,testplan_copy_milestones,
		         testplan_copy_assigned_to,testplan_copy_user_roles,testplan_copy_platforms_links'), $this);?>


<table style="float: left; text-align:left">
	<tr><td align='left'><?php echo $this->_tpl_vars['labels']['testplan_copy_tcases']; ?>
</td>
		<td align='left'>
		<input type="checkbox" name="copy_tcases" checked="checked"/>
		<?php echo $this->_tpl_vars['labels']['testplan_copy_tcases_latest']; ?>
<input type="radio" name="tcversion_type" value="latest" />
		<?php echo $this->_tpl_vars['labels']['testplan_copy_tcases_current']; ?>
<input type="radio" name="tcversion_type" value="current" checked="1"/>
			</td></tr>
	<tr><td align='left'>
		<?php echo $this->_tpl_vars['labels']['testplan_copy_builds']; ?>

		</td>
		<td align='left'>
		<input type="checkbox" name="copy_builds" checked="checked"/>
			</td></tr>
	<tr><td align='left'>
		<?php echo $this->_tpl_vars['labels']['testplan_copy_priorities']; ?>

		</td>
		<td align='left'>
		<input type="checkbox" name="copy_priorities" checked="checked"/>
			</td></tr>
	<tr><td align='left'>
		<?php echo $this->_tpl_vars['labels']['testplan_copy_milestones']; ?>

		</td>
		<td align='left'>
		<input type="checkbox" name="copy_milestones" checked="checked"/>
			</td></tr>
	<tr><td align='left'>
		<?php echo $this->_tpl_vars['labels']['testplan_copy_user_roles']; ?>

		</td>
		<td align='left'>
		<input type="checkbox" name="copy_user_roles" checked="checked"/>
		</td></tr>
	<tr><td align='left'>
		<?php echo $this->_tpl_vars['labels']['testplan_copy_platforms_links']; ?>

		</td>
		<td align='left'>
		<input type="checkbox" name="copy_platforms_links" checked="checked"/>
		</td></tr>
	<tr><td align='left'><?php echo $this->_tpl_vars['labels']['testplan_copy_assigned_to']; ?>
</td>
		<td align='left'>
		<input type="checkbox" name="copy_assigned_to" checked="checked"/>
	  </td></tr>
</table>