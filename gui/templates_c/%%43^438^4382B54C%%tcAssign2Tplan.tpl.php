<?php /* Smarty version 2.6.26, created on 2010-09-09 13:49:19
         compiled from testcases/tcAssign2Tplan.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcAssign2Tplan.tpl', 10, false),array('modifier', 'escape', 'testcases/tcAssign2Tplan.tpl', 39, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'testproject,test_plan,th_id,please_select_one_testplan,platform,btn_cancel,
             cancel,warning,version,btn_add,testplan_usage,no_test_plans'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_jsCheckboxes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
	var check_msg="<?php echo $this->_tpl_vars['labels']['please_select_one_testplan']; ?>
";
	var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
<?php echo '

function check_action_precondition(container_id,action)
{
	if(checkbox_count_checked(container_id) <= 0)
	{
		alert_message(alert_box_title,check_msg);
		return false;
	}
	return true;
}
</script>
'; ?>



</head>
<body>

<h1 class="title"> <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->pageTitle)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 
	</h1>

<div class="workBack">
<h1 class="title"><?php echo $this->_tpl_vars['gui']->mainDescription; ?>
</h1>

<?php if ($this->_tpl_vars['gui']->tplans): ?>
<form method="post" action="lib/testcases/tcEdit.php?testcase_id=<?php echo $this->_tpl_vars['gui']->tcase_id; ?>
&tcversion_id=<?php echo $this->_tpl_vars['gui']->tcversion_id; ?>
">
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tcaseIdentity)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 <?php echo $this->_tpl_vars['gui']->item_sep; ?>
 <?php echo $this->_tpl_vars['labels']['testplan_usage']; ?>
 
<div id='checkboxes'>
<table class="simple" style="width:50%">
  <th>&nbsp;</th><th><?php echo $this->_tpl_vars['labels']['version']; ?>
</th><th><?php echo $this->_tpl_vars['labels']['test_plan']; ?>
</th><th><?php echo $this->_tpl_vars['labels']['platform']; ?>
</th>
  <?php $_from = $this->_tpl_vars['gui']->tplans; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link2tplan_platform']):
?>
    <?php $_from = $this->_tpl_vars['link2tplan_platform']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['platform_id'] => $this->_tpl_vars['link2tplan']):
?>
      <tr>
      <td class="clickable_icon">
          <input type="checkbox" id="add2tplanid[<?php echo $this->_tpl_vars['link2tplan']['id']; ?>
][<?php echo $this->_tpl_vars['platform_id']; ?>
]" 
                                 name="add2tplanid[<?php echo $this->_tpl_vars['link2tplan']['id']; ?>
][<?php echo $this->_tpl_vars['platform_id']; ?>
]"
          <?php if (! $this->_tpl_vars['link2tplan']['draw_checkbox']): ?> checked='checked' disabled='disabled' <?php endif; ?> > 
      </td>
      <td style="width:10%;text-align:center;"><?php echo $this->_tpl_vars['link2tplan']['version']; ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['link2tplan']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      <td><?php echo ((is_array($_tmp=$this->_tpl_vars['link2tplan']['platform'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>

  <?php endforeach; endif; unset($_from); ?>
</table>
</div>

<?php if ($this->_tpl_vars['gui']->can_do): ?>
<input type="hidden" id="doAction" name="doAction" value="doAdd2testplan" />
<input type="submit" id="add2testplan"  name="add2testplan" value="<?php echo $this->_tpl_vars['labels']['btn_add']; ?>
"       
       onclick="return check_action_precondition('checkboxes','default');" />
<?php endif; ?>
<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
" 
  			                   onclick="javascript:history.back();" />  
</form>
<?php else: ?>
  <?php echo $this->_tpl_vars['labels']['no_test_plans']; ?>

<?php endif; ?>
</div>