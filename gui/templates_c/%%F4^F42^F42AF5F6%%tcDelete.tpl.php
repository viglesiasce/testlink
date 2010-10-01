<?php /* Smarty version 2.6.26, created on 2010-09-27 14:46:26
         compiled from testcases/tcDelete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcDelete.tpl', 22, false),array('modifier', 'escape', 'testcases/tcDelete.tpl', 27, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'btn_yes_iw2del,btn_no,th_version,th_linked_to_tplan,th_executed,question_del_tc'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback,'result' => $this->_tpl_vars['gui']->sqlResult,'action' => $this->_tpl_vars['gui']->action,'item' => 'test case','refresh' => $this->_tpl_vars['gui']->refreshTree)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui']->sqlResult == ''): ?>
	<?php if ($this->_tpl_vars['gui']->exec_status_quo != ''): ?>
	    <table class="link_and_exec" >
			<tr>
				<th><?php echo $this->_tpl_vars['labels']['th_version']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_linked_to_tplan']; ?>
</th>
				<th><?php echo $this->_tpl_vars['labels']['th_executed']; ?>
</th>
				</tr>
			<?php $_from = $this->_tpl_vars['gui']->exec_status_quo; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['testcase_version_id'] => $this->_tpl_vars['on_tplan_status']):
?>
				<?php $_from = $this->_tpl_vars['on_tplan_status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tplan_id'] => $this->_tpl_vars['status_on_platform']):
?>
					<?php $_from = $this->_tpl_vars['status_on_platform']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['platform_id'] => $this->_tpl_vars['status']):
?>
				    <tr>
					    <td align="right"><?php echo $this->_tpl_vars['status']['version']; ?>
</td>
					    <td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['status']['tplan_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
					    <td align="center"><?php if ($this->_tpl_vars['status']['executed'] != ""): ?><img src="<?php echo @TL_THEME_IMG_DIR; ?>
/apply_f2_16.png" /><?php endif; ?></td>
					  </tr>
				  <?php endforeach; endif; unset($_from); ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endforeach; endif; unset($_from); ?>
	    </table>

    	<?php echo $this->_tpl_vars['gui']->delete_message; ?>

  	<?php endif; ?>

	<p><?php echo $this->_tpl_vars['labels']['question_del_tc']; ?>
</p>
	<form method="post" 
	      action="lib/testcases/tcEdit.php?testcase_id=<?php echo $this->_tpl_vars['gui']->testcase_id; ?>
&tcversion_id=<?php echo $this->_tpl_vars['gui']->tcversion_id; ?>
">
		<input type="submit" id="do_delete" name="do_delete" value="<?php echo $this->_tpl_vars['labels']['btn_yes_iw2del']; ?>
" />
		<input type="button" name="cancel_delete"
		                     onclick='javascript: location.href=fRoot+"lib/testcases/archiveData.php?version_id=undefined&edit=testcase&id=<?php echo $this->_tpl_vars['gui']->testcase_id; ?>
";'
		                     value="<?php echo $this->_tpl_vars['labels']['btn_no']; ?>
" />
	</form>
<?php endif; ?>
</div>
</body>
</html>