<?php /* Smarty version 2.6.26, created on 2010-09-27 15:37:37
         compiled from results/inc_results_show_table.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'results/inc_results_show_table.tpl', 6, false),array('modifier', 'escape', 'results/inc_results_show_table.tpl', 12, false),array('function', 'lang_get', 'results/inc_results_show_table.tpl', 16, false),)), $this); ?>

<?php $this->assign('args_title', ((is_array($_tmp=@$this->_tpl_vars['args_title'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""))); ?>
<?php $this->assign('args_first_column_header', ((is_array($_tmp=@$this->_tpl_vars['args_first_column_header'])) ? $this->_run_mod_handler('default', true, $_tmp, 'first column') : smarty_modifier_default($_tmp, 'first column'))); ?>
<?php $this->assign('args_show_percentage', ((is_array($_tmp=@$this->_tpl_vars['args_show_percentage'])) ? $this->_run_mod_handler('default', true, $_tmp, true) : smarty_modifier_default($_tmp, true))); ?>

<?php if ($this->_tpl_vars['args_column_definition'] != ""): ?>

<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['args_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
<table class="simple" style="width: 100%; text-align: center; margin-left: 0px;">
	<tr>
		<th><?php echo ((is_array($_tmp=$this->_tpl_vars['args_first_column_header'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
		<th><?php echo lang_get_smarty(array('s' => 'trep_total'), $this);?>
</th>
    <?php $_from = $this->_tpl_vars['args_column_definition']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['the_column']):
?>
        <th><?php echo $this->_tpl_vars['the_column']['qty']; ?>
</th>
        <?php if ($this->_tpl_vars['args_show_percentage']): ?>
        <th><?php echo $this->_tpl_vars['the_column']['percentage']; ?>
</th>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
		<th><?php echo lang_get_smarty(array('s' => 'trep_comp_perc'), $this);?>
</th>
	</tr>
	
 <?php $_from = $this->_tpl_vars['args_column_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['res']):
?>
  	<tr>
  	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['res'][$this->_tpl_vars['args_first_column_key']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	<td><?php echo $this->_tpl_vars['res']['total_tc']; ?>
</td>
      <?php $_from = $this->_tpl_vars['res']['details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['the_column']):
?>
          <td><?php echo $this->_tpl_vars['the_column']['qty']; ?>
</td>
        <?php if ($this->_tpl_vars['args_show_percentage']): ?>
          <td><?php echo $this->_tpl_vars['the_column']['percentage']; ?>
</td>
        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
  	<td><?php echo $this->_tpl_vars['res']['percentage_completed']; ?>
</td>
  	</tr>
  <?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>