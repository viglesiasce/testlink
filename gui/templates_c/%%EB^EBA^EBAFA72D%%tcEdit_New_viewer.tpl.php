<?php /* Smarty version 2.6.26, created on 2010-09-27 13:33:13
         compiled from testcases/tcEdit_New_viewer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcEdit_New_viewer.tpl', 14, false),array('function', 'html_options', 'testcases/tcEdit_New_viewer.tpl', 78, false),array('modifier', 'escape', 'testcases/tcEdit_New_viewer.tpl', 40, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'tc_title,alt_add_tc_name,summary,steps,expected_results,
             preconditions,
             execution_type,test_importance,tc_keywords,assign_requirements'), $this);?>


<?php $this->assign('layout1', "<br />"); ?>
<?php $this->assign('layout2', "<br />"); ?>
<?php $this->assign('layout3', "<br />"); ?>

<?php if ($this->_tpl_vars['gsmarty_spec_cfg']->steps_results_layout == 'horizontal'): ?>
	<?php $this->assign('layout1', '<br /><table width="100%"><tr><td width="50%">'); ?>
	<?php $this->assign('layout2', '</td><td width="50%">'); ?>
	<?php $this->assign('layout3', "</td></tr></table><br />"); ?>
<?php endif; ?>
	<p />
	<div class="labelHolder"><label for="testcase_name"><?php echo $this->_tpl_vars['labels']['tc_title']; ?>
</label></div>
	<div>	
		<input type="text" name="testcase_name" id="testcase_name"
			size="<?php echo $this->_config[0]['vars']['TESTCASE_NAME_SIZE']; ?>
" 
			maxlength="<?php echo $this->_config[0]['vars']['TESTCASE_NAME_MAXLEN']; ?>
"
			onchange="content_modified = true"
			onkeypress="content_modified = true"
			onkeyup="checkDuplicateName()"
			<?php if (isset ( $this->_tpl_vars['gui']->tc['name'] )): ?>
		       value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tc['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
			<?php else: ?>
		   		value=""
		   	<?php endif; ?>
			title="<?php echo $this->_tpl_vars['labels']['alt_add_tc_name']; ?>
"/>
  			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'testcase_name')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<span id="testcase_name_warning" class="warning"></span>
		<p />

		<div class="labelHolder"><?php echo $this->_tpl_vars['labels']['summary']; ?>
</div>
		<div><?php echo $this->_tpl_vars['summary']; ?>
</div>
    <br />

		<div class="labelHolder"><?php echo $this->_tpl_vars['labels']['preconditions']; ?>
</div>
		<div><?php echo $this->_tpl_vars['preconditions']; ?>
</div>
    
	      <br />
	  <?php if ($this->_tpl_vars['gui']->cf['before_steps_results'] != ""): ?>
	       <br/>
	       <div id="cfields_design_time_before" class="custom_field_container">
	       <?php echo $this->_tpl_vars['gui']->cf['before_steps_results']; ?>

	       </div>
	       
	  <?php endif; ?>
		<?php echo $this->_tpl_vars['layout1']; ?>


   
 
 

		<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->automationEnabled): ?>
			<div class="labelHolder"><?php echo $this->_tpl_vars['labels']['execution_type']; ?>

			<select name="exec_type" onchange="content_modified = true">
    	  	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->execution_types,'selected' => $this->_tpl_vars['gui']->tc['execution_type']), $this);?>

	    	</select>
			</div>
    	<?php endif; ?>

	    <?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
		   	<div>
			<span class="labelHolder"><?php echo $this->_tpl_vars['labels']['test_importance']; ?>
</span>
			<select name="importance" onchange="content_modified = true">
    	  	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gsmarty_option_importance'],'selected' => $this->_tpl_vars['gui']->tc['importance']), $this);?>

	    	</select>
			</div>
		<?php endif; ?>
    	
    </div>

		<?php if ($this->_tpl_vars['gui']->cf['standard_location'] != ""): ?>
	     <br/>
	     <div id="cfields_design_time" class="custom_field_container">
	     <?php echo $this->_tpl_vars['gui']->cf['standard_location']; ?>

	     </div>
	<?php endif; ?>

	<div>
	<a href=<?php echo $this->_tpl_vars['gsmarty_href_keywordsView']; ?>
><?php echo $this->_tpl_vars['labels']['tc_keywords']; ?>
</a>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "opt_transfer.inc.tpl", 'smarty_include_vars' => array('option_transfer' => $this->_tpl_vars['gui']->opt_cfg)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	
	<?php if ($this->_tpl_vars['gui']->opt_requirements == TRUE && $this->_tpl_vars['gui']->grants->requirement_mgmt == 'yes' && isset ( $this->_tpl_vars['gui']->tc['testcase_id'] )): ?>
		<div>
		<a href="javascript:openReqWindow(<?php echo $this->_tpl_vars['gui']->tc['testcase_id']; ?>
)"><?php echo $this->_tpl_vars['labels']['assign_requirements']; ?>
</a>    
		</div>
	<?php endif; ?>