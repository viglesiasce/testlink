<?php /* Smarty version 2.6.26, created on 2010-09-09 14:11:28
         compiled from results/freeTestCases.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/freeTestCases.tpl', 10, false),array('function', 'cycle', 'results/freeTestCases.tpl', 26, false),array('modifier', 'escape', 'results/freeTestCases.tpl', 15, false),array('modifier', 'date_format', 'results/freeTestCases.tpl', 38, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'all_testcases_has_testplan,generated_by_TestLink_on'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->pageTitle)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<div class="workBack">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => '')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	

<?php if ($this->_tpl_vars['gui']->warning_msg == ''): ?>
    <?php if ($this->_tpl_vars['gui']->resultSet): ?>
        <table class="simple">
        <?php $_from = $this->_tpl_vars['gui']->resultSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tcase']):
?>
            <?php $this->assign('tcase_id', $this->_tpl_vars['tcase']['id']); ?>
           <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#eeeeee,#d0d0d0"), $this);?>
">       
            <td>
        	      <?php $_from = $this->_tpl_vars['gui']->path_info[$this->_tpl_vars['tcase_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['path_part']):
?>
        	          <?php echo ((is_array($_tmp=$this->_tpl_vars['path_part'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 /
        	      <?php endforeach; endif; unset($_from); ?>
        	  <a href="lib/testcases/archiveData.php?edit=testcase&id=<?php echo $this->_tpl_vars['tcase_id']; ?>
">
        	  <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tcasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['tc_external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
            </td>
        	  </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>

      <?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

    <?php else: ?>
    	<h2><?php echo $this->_tpl_vars['labels']['all_testcases_has_testplan']; ?>
</h2>
    <?php endif; ?>
<?php else: ?>
    <?php echo $this->_tpl_vars['gui']->warning_msg; ?>

<?php endif; ?>    
</div>
</body>
</html>