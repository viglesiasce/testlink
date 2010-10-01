<?php /* Smarty version 2.6.26, created on 2010-09-27 15:37:19
         compiled from inc_result_tproject_tplan.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_result_tproject_tplan.tpl', 9, false),array('modifier', 'escape', 'inc_result_tproject_tplan.tpl', 11, false),)), $this); ?>
<table>
	<tr>
		<td><?php echo lang_get_smarty(array('s' => 'testproject'), $this);?>
</td><td><?php echo @TITLE_SEP; ?>
</td>
		<td>
			<span style="color:black; font-weight:bold; text-decoration: underline;"><?php echo ((is_array($_tmp=$this->_tpl_vars['arg_tproject_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
		</td>
	</tr>
  <?php if ($this->_tpl_vars['arg_tplan_name'] != ''): ?>
	<tr>
		<td><?php echo lang_get_smarty(array('s' => 'testplan'), $this);?>
</td><td><?php echo @TITLE_SEP; ?>
</td>
		<td> 
			<span style="color:black; font-weight:bold; text-decoration:underline;"><?php echo ((is_array($_tmp=$this->_tpl_vars['arg_tplan_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
		</td>
	</tr>
	<?php endif; ?>
</table>