<?php /* Smarty version 2.6.26, created on 2010-09-10 18:29:07
         compiled from testcases/tcMove.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcMove.tpl', 12, false),array('function', 'html_options', 'testcases/tcMove.tpl', 33, false),array('modifier', 'escape', 'testcases/tcMove.tpl', 17, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "test_case,title_mv_cp_tc,inst_move,inst_copy,inst_copy_move_warning,
             copy_requirement_assignments,copy_keyword_assignments,
             choose_container,as_first_testcase,as_last_testcase,btn_mv,btn_cp"), $this);?>

<body>
<h1 class="title"><?php echo $this->_tpl_vars['labels']['test_case']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_mv_cp_tc']; ?>
</h1>

<form method="post" action="lib/testcases/tcEdit.php?testcase_id=<?php echo $this->_tpl_vars['gui']->testcase_id; ?>
">
  <p>
  <?php if ($this->_tpl_vars['gui']->move_enabled): ?>
	  <?php echo $this->_tpl_vars['labels']['inst_move']; ?>
<br />
  <?php endif; ?>
  <?php echo $this->_tpl_vars['labels']['inst_copy']; ?>
<br />
  <?php echo $this->_tpl_vars['labels']['inst_copy_move_warning']; ?>

  </p>

	<p><?php echo $this->_tpl_vars['labels']['choose_container']; ?>

		<select name="new_container">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->array_container,'selected' => $this->_tpl_vars['gui']->old_container), $this);?>

		</select>
  </p>
  
  <p>
   <input type="checkbox" name="keyword_assignments" id='keyword_assignments'>
     <?php echo $this->_tpl_vars['labels']['copy_keyword_assignments']; ?>

  <br />
  <input type="checkbox" name="requirement_assignments" id='requirement_assignments'>
     <?php echo $this->_tpl_vars['labels']['copy_requirement_assignments']; ?>

  </p>

	 
	<p><input type="radio" name="target_position"
	          value="top" <?php echo $this->_tpl_vars['gui']->top_checked; ?>
 /><?php echo $this->_tpl_vars['labels']['as_first_testcase']; ?>

	<br /><input type="radio" name="target_position"
	          value="bottom" <?php echo $this->_tpl_vars['gui']->bottom_checked; ?>
 /><?php echo $this->_tpl_vars['labels']['as_last_testcase']; ?>


		<div class="groupBtn">
		  <?php if ($this->_tpl_vars['gui']->move_enabled): ?>
			  <input id="do_move" type="submit" name="do_move" value="<?php echo $this->_tpl_vars['labels']['btn_mv']; ?>
" />
			<?php endif; ?>
			<input id="do_copy" type="submit" name="do_copy" value="<?php echo $this->_tpl_vars['labels']['btn_cp']; ?>
" />
			<input type="hidden" name="old_container" value="<?php echo $this->_tpl_vars['gui']->old_container; ?>
" />
	</div>

</form>
</div>

</body>
</html>