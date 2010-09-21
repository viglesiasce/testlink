<?php /* Smarty version 2.6.26, created on 2010-09-09 13:52:50
         compiled from results/uncoveredTestCases.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/uncoveredTestCases.tpl', 10, false),array('modifier', 'escape', 'results/uncoveredTestCases.tpl', 16, false),array('modifier', 'date_format', 'results/uncoveredTestCases.tpl', 52, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'no_uncovered_testcases,testproject_has_no_reqspec,
             testproject_has_no_requirements,generated_by_TestLink_on'), $this);?>

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

<?php $this->assign('doit', 1); ?>
<?php if (! $this->_tpl_vars['gui']->has_reqspec): ?>
	<h2><?php echo $this->_tpl_vars['labels']['testproject_has_no_reqspec']; ?>
</h2>
  <?php $this->assign('doit', 0); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['doit'] && ! $this->_tpl_vars['gui']->has_requirements): ?>
	<h2><?php echo $this->_tpl_vars['labels']['testproject_has_no_requirements']; ?>
</h2>
  <?php $this->assign('doit', 0); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['doit']): ?>
    <?php if ($this->_tpl_vars['gui']->has_tc): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_result_tproject_tplan.tpl", 'smarty_include_vars' => array('arg_tproject_name' => $this->_tpl_vars['gui']->tproject_name,'arg_tplan_name' => '')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
    	<?php $_from = $this->_tpl_vars['gui']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ts']):
?>
    		<div style="margin:0px 0px 0px <?php echo $this->_tpl_vars['ts']['level']; ?>
0px;">
        	<h3 class="testlink" style="padding:0px; margin:0px"><?php echo ((is_array($_tmp=$this->_tpl_vars['ts']['testsuite']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3> 
         <?php if ($this->_tpl_vars['ts']['testcase_qty'] > 0): ?>
            <table border="0" cellspacing="0" style="font-size:small;" width="100%">
            <?php $_from = $this->_tpl_vars['ts']['testcases']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tcase']):
?>
                <?php $this->assign('tcID', $this->_tpl_vars['tcase']['id']); ?>
                <tr>
       			      <td>
        				    <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testCasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 &nbsp;
         				     <a href="javascript:openTCaseWindow(<?php echo $this->_tpl_vars['tcID']; ?>
)"><?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
       			      </td>
                </tr>
           <?php endforeach; endif; unset($_from); ?>
           </table>
           <br /> 
         <?php endif; ?>          </div>
    	<?php endforeach; endif; unset($_from); ?>
      <?php echo $this->_tpl_vars['labels']['generated_by_TestLink_on']; ?>
 <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['gsmarty_timestamp_format']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['gsmarty_timestamp_format'])); ?>

    <?php else: ?>
    	<h2><?php echo $this->_tpl_vars['labels']['no_uncovered_testcases']; ?>
</h2>
    <?php endif; ?>
<?php endif; ?>    
</div>
</body>
</html>