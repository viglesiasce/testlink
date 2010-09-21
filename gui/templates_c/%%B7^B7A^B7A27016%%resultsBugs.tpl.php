<?php /* Smarty version 2.6.26, created on 2010-09-20 11:40:22
         compiled from results/resultsBugs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/resultsBugs.tpl', 7, false),array('modifier', 'escape', 'results/resultsBugs.tpl', 18, false),array('modifier', 'date_format', 'results/resultsBugs.tpl', 63, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'title,date,printed_by,bugs_open,
		         title_test_suite_name,title_test_case_title,
		         title_test_case_bugs,
             generated_by_TestLink_on,bugs_resolved,bugs_total,tcs_with_bugs'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>

<?php if ($this->_tpl_vars['printDate'] == ''): ?>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<?php else: ?><table style="font-size: larger;font-weight: bold;">
	<tr><td><?php echo $this->_tpl_vars['labels']['title']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td><tr>
	<tr><td><?php echo $this->_tpl_vars['labels']['date']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['printDate'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td><tr>
	<tr><td><?php echo $this->_tpl_vars['labels']['printed_by']; ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['user']->getDisplayName())) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td><tr>
</table>
<?php endif; ?>

<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['tproject_name'],'arg_tplan_name' => $this->_tpl_vars['tplan_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	

<table class="simple" style="width: 100%; text-align: center; margin-left: 0px;">
     <tr>
         <th><?php echo $this->_tpl_vars['labels']['bugs_open']; ?>
</th>
         <th><?php echo $this->_tpl_vars['labels']['bugs_resolved']; ?>
</th>
         <th><?php echo $this->_tpl_vars['labels']['bugs_total']; ?>
</th>
         <th><?php echo $this->_tpl_vars['labels']['tcs_with_bugs']; ?>
</th>
     </tr>
     
     <tr>
         <td><?php echo $this->_tpl_vars['totalOpenBugs']; ?>
</td>
         <td><?php echo $this->_tpl_vars['totalResolvedBugs']; ?>
</td>
         <td><?php echo $this->_tpl_vars['totalBugs']; ?>
</td>
         <td><?php echo $this->_tpl_vars['totalCasesWithBugs']; ?>
</td>
     </tr>
</table>

<table class="simple" style="width: 100%; margin-left: 0px;">
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['title_test_suite_name']; ?>
</th>
		<th><?php echo $this->_tpl_vars['labels']['title_test_case_title']; ?>
</th>
		<th><?php echo $this->_tpl_vars['labels']['title_test_case_bugs']; ?>
</th>	
	</tr>
<?php unset($this->_sections['Row']);
$this->_sections['Row']['name'] = 'Row';
$this->_sections['Row']['loop'] = is_array($_loop=$this->_tpl_vars['arrData']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['Row']['show'] = true;
$this->_sections['Row']['max'] = $this->_sections['Row']['loop'];
$this->_sections['Row']['step'] = 1;
$this->_sections['Row']['start'] = $this->_sections['Row']['step'] > 0 ? 0 : $this->_sections['Row']['loop']-1;
if ($this->_sections['Row']['show']) {
    $this->_sections['Row']['total'] = $this->_sections['Row']['loop'];
    if ($this->_sections['Row']['total'] == 0)
        $this->_sections['Row']['show'] = false;
} else
    $this->_sections['Row']['total'] = 0;
if ($this->_sections['Row']['show']):

            for ($this->_sections['Row']['index'] = $this->_sections['Row']['start'], $this->_sections['Row']['iteration'] = 1;
                 $this->_sections['Row']['iteration'] <= $this->_sections['Row']['total'];
                 $this->_sections['Row']['index'] += $this->_sections['Row']['step'], $this->_sections['Row']['iteration']++):
$this->_sections['Row']['rownum'] = $this->_sections['Row']['iteration'];
$this->_sections['Row']['index_prev'] = $this->_sections['Row']['index'] - $this->_sections['Row']['step'];
$this->_sections['Row']['index_next'] = $this->_sections['Row']['index'] + $this->_sections['Row']['step'];
$this->_sections['Row']['first']      = ($this->_sections['Row']['iteration'] == 1);
$this->_sections['Row']['last']       = ($this->_sections['Row']['iteration'] == $this->_sections['Row']['total']);
?>
	<tr>
	<?php unset($this->_sections['Item']);
$this->_sections['Item']['name'] = 'Item';
$this->_sections['Item']['loop'] = is_array($_loop=$this->_tpl_vars['arrData'][$this->_sections['Row']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['Item']['show'] = true;
$this->_sections['Item']['max'] = $this->_sections['Item']['loop'];
$this->_sections['Item']['step'] = 1;
$this->_sections['Item']['start'] = $this->_sections['Item']['step'] > 0 ? 0 : $this->_sections['Item']['loop']-1;
if ($this->_sections['Item']['show']) {
    $this->_sections['Item']['total'] = $this->_sections['Item']['loop'];
    if ($this->_sections['Item']['total'] == 0)
        $this->_sections['Item']['show'] = false;
} else
    $this->_sections['Item']['total'] = 0;
if ($this->_sections['Item']['show']):

            for ($this->_sections['Item']['index'] = $this->_sections['Item']['start'], $this->_sections['Item']['iteration'] = 1;
                 $this->_sections['Item']['iteration'] <= $this->_sections['Item']['total'];
                 $this->_sections['Item']['index'] += $this->_sections['Item']['step'], $this->_sections['Item']['iteration']++):
$this->_sections['Item']['rownum'] = $this->_sections['Item']['iteration'];
$this->_sections['Item']['index_prev'] = $this->_sections['Item']['index'] - $this->_sections['Item']['step'];
$this->_sections['Item']['index_next'] = $this->_sections['Item']['index'] + $this->_sections['Item']['step'];
$this->_sections['Item']['first']      = ($this->_sections['Item']['iteration'] == 1);
$this->_sections['Item']['last']       = ($this->_sections['Item']['iteration'] == $this->_sections['Item']['total']);
?>
		<td><?php echo $this->_tpl_vars['arrData'][$this->_sections['Row']['index']][$this->_sections['Item']['index']]; ?>
</td>
	<?php endfor; endif; ?>
	</tr>
<?php endfor; endif; ?>
</table>

<?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

</div>

</body>
</html>