<?php /* Smarty version 2.6.26, created on 2010-09-08 16:08:18
         compiled from results/metricsDashboard.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/metricsDashboard.tpl', 9, false),array('modifier', 'escape', 'results/metricsDashboard.tpl', 16, false),array('modifier', 'date_format', 'results/metricsDashboard.tpl', 51, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "generated_by_TestLink_on,testproject,test_plan,th_total_tc,th_active_tc,th_executed_tc,
             th_executed_vs_active,th_executed_vs_total,platform"), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>
<div class="workBack">
<h1 class="title"><?php echo $this->_tpl_vars['labels']['testproject']; ?>
 <?php echo @TITLE_SEP; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tproject_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<table class="mainTable-x sortable" style="width: 100%">
  <tr>
    <th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['test_plan']; ?>
</th>
    <?php if ($this->_tpl_vars['gui']->show_platforms): ?>
    <th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['platform']; ?>
</th>
    <?php endif; ?>
   	<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_total_tc']; ?>
</th>
   	<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_active_tc']; ?>
</th>
   	<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_executed_tc']; ?>
</th>
   	<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_executed_vs_active']; ?>
</th>
   	<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_executed_vs_total']; ?>
</th>
  </tr>
  <?php $_from = $this->_tpl_vars['gui']->tplan_metrics; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['platform_metric']):
?>
    <?php $_from = $this->_tpl_vars['platform_metric']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metric']):
?>
      <tr>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['metric']['tplan_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
        <?php if ($this->_tpl_vars['gui']->show_platforms): ?>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['metric']['platform_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
        <?php endif; ?>
        <td style="text-align:right;"><?php echo $this->_tpl_vars['metric']['total']; ?>
</td>
        <td style="text-align:right;"><?php echo $this->_tpl_vars['metric']['active']; ?>
</td>
        <td style="text-align:right;"><?php echo $this->_tpl_vars['metric']['executed']; ?>
</td>
        <td style="text-align:right;"><?php if ($this->_tpl_vars['metric']['executed_vs_active'] > 0): ?>
                                          <?php echo $this->_tpl_vars['metric']['executed_vs_active']; ?>

                                      <?php else: ?> - <?php endif; ?> </td>
        <td style="text-align:right;"><?php if ($this->_tpl_vars['metric']['executed_vs_total'] > 0): ?>
                                          <?php echo $this->_tpl_vars['metric']['executed_vs_total']; ?>

                                      <?php else: ?> - <?php endif; ?> </td>
      </tr> 
    <?php endforeach; endif; unset($_from); ?>
  <?php endforeach; endif; unset($_from); ?>
</table>
<br />
<?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

</div> 
</body>
</html>