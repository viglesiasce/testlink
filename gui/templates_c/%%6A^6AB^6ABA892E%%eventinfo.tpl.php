<?php /* Smarty version 2.6.26, created on 2010-09-09 15:32:05
         compiled from events/eventinfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'events/eventinfo.tpl', 5, false),array('function', 'localize_timestamp', 'events/eventinfo.tpl', 18, false),array('modifier', 'escape', 'events/eventinfo.tpl', 14, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'th_loglevel,th_timestamp,th_source,th_description,
             th_session_info,User,th_sessionID,th_activity_code,
             th_object_id,th_object_type,th_activity'), $this);?>

             
<div class="workBack">
	<table class="simple">
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['th_loglevel']; ?>
</th>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->getLogLevel())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
	</tr>
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['th_timestamp']; ?>
</th>
		<td><?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['event']->timestamp), $this);?>
</td>
	</tr>
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['th_source']; ?>
</th>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->source)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
	</tr>
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['th_description']; ?>
</th>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->description)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['event']->transaction): ?>
	<tr>
			<th colspan="2"><?php echo $this->_tpl_vars['labels']['th_session_info']; ?>
</th>
	</tr>
	<tr>
			<th><?php echo $this->_tpl_vars['labels']['User']; ?>
</th>
			<td>
				<?php if ($this->_tpl_vars['user']): ?>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				<?php else: ?>
					<?php echo $this->_tpl_vars['event']->userID; ?>

				<?php endif; ?>
			</td>
	</tr>
	<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_sessionID']; ?>
</th>
			<td><?php echo $this->_tpl_vars['event']->sessionID; ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['event']->objectID): ?>
		<tr>
			<th colspan="2"><?php echo $this->_tpl_vars['labels']['th_activity']; ?>
</th>
		</tr>
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_activity_code']; ?>
</th>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->activityCode)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		</tr>
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_object_id']; ?>
</th>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->objectID)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		</tr>
		<tr>
			<th><?php echo $this->_tpl_vars['labels']['th_object_type']; ?>
</th>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['event']->objectType)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		</tr>
	<?php endif; ?>
	</table>	
</div>