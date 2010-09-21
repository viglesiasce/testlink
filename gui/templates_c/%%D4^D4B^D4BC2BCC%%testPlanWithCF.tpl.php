<?php /* Smarty version 2.6.26, created on 2010-09-09 13:52:48
         compiled from results/testPlanWithCF.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/testPlanWithCF.tpl', 10, false),array('function', 'cycle', 'results/testPlanWithCF.tpl', 37, false),array('modifier', 'escape', 'results/testPlanWithCF.tpl', 17, false),array('modifier', 'date_format', 'results/testPlanWithCF.tpl', 49, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'no_uncovered_testcases,testproject_has_no_reqspec,
             testproject_has_no_requirements,no_linked_tc_cf,generated_by_TestLink_on,
             test_case,build,th_owner,date,status'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->pageTitle)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<div class="workBack" style="overflow-y: auto;">

 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => $this->_tpl_vars['gui']->tplan_name)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	



<?php if ($this->_tpl_vars['gui']->warning_msg == ''): ?>
    <?php if ($this->_tpl_vars['gui']->resultSet): ?>
        <table class="simple">
	          <tr>
	          <th> <?php echo $this->_tpl_vars['labels']['test_case']; ?>
</th>

	          <?php $_from = $this->_tpl_vars['gui']->cfields; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cfield']):
?>
	              <th><?php echo ((is_array($_tmp=$this->_tpl_vars['cfield']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
	          <?php endforeach; endif; unset($_from); ?>
	          </tr>
            
	          <?php $_from = $this->_tpl_vars['gui']->resultSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arrData']):
?>
	            <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#eeeeee,#d0d0d0"), $this);?>
">  
	            <td>	<a href="lib/testcases/archiveData.php?edit=testcase&id=<?php echo $this->_tpl_vars['arrData']['tcase_id']; ?>
">
	          	<?php echo $this->_tpl_vars['gui']->tcasePrefix; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['tc_external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['arrData']['tcase_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
	            </td>
	          	<?php $_from = $this->_tpl_vars['arrData']['cfields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cfield_value']):
?>
	          		<td> <?php echo $this->_tpl_vars['cfield_value']; ?>
</td>
	          	<?php endforeach; endif; unset($_from); ?>	
	            </tr>
	          <?php endforeach; endif; unset($_from); ?>
                 
        </table>

      <?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

    <?php else: ?>
    	<h2><?php echo $this->_tpl_vars['labels']['no_linked_tc_cf']; ?>
</h2>
    <?php endif; ?>
<?php else: ?>
    <?php echo $this->_tpl_vars['gui']->warning_msg; ?>

<?php endif; ?>    
</div>
</body>
</html>