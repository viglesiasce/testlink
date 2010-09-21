<?php /* Smarty version 2.6.26, created on 2010-09-09 13:50:52
         compiled from execute/inc_exec_test_spec.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'execute/inc_exec_test_spec.tpl', 36, false),)), $this); ?>
	
    <?php $this->assign('tableColspan', '4'); ?>

    <?php $this->assign('getReqAction', "lib/requirements/reqView.php?showReqSpecTitle=1&requirement_id="); ?>
	  <?php $this->assign('testcase_id', $this->_tpl_vars['args_tc_exec']['testcase_id']); ?>
    <?php $this->assign('tcversion_id', $this->_tpl_vars['args_tc_exec']['id']); ?>
    
    <?php if (isset ( $this->_tpl_vars['args_req_details'] )): ?>
	  <div class="exec_test_spec">
		  <table class="test_exec"  >
		  <tr>
		  	<th colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
" class="title"><?php echo $this->_tpl_vars['args_labels']['reqs']; ?>
</th>
		  </tr>
		  	
		  <?php $_from = $this->_tpl_vars['args_req_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['req_elem']):
?>
		  <tr>
		  	<td>
		  	<span class="bold">
		  	 <?php echo $this->_tpl_vars['tlCfg']->gui_separator_open; ?>
<?php echo $this->_tpl_vars['req_elem']['req_spec_title']; ?>
<?php echo $this->_tpl_vars['tlCfg']->gui_separator_close; ?>
&nbsp;
		  	 <a href="javascript: void(0)"  title="<?php echo $this->_tpl_vars['args_labels']['click_to_open']; ?>
"
		  	       onclick="window.open(fRoot+'<?php echo $this->_tpl_vars['getReqAction']; ?>
<?php echo $this->_tpl_vars['req_elem']['id']; ?>
','<?php echo $this->_tpl_vars['args_labels']['requirement']; ?>
', 
		  	                            'width=700, height=500'); return false;">
	  	    <?php echo ((is_array($_tmp=$this->_tpl_vars['req_elem']['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['tlCfg']->gui_title_separator_1; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['req_elem']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	  	   </a>
	  	  </span>
	  	 </td>
		  </tr>
		  <?php endforeach; endif; unset($_from); ?>
		  </table>
  	  </div>
	    <br />
		 <?php endif; ?>
     
    <div class="exec_test_spec">
		<table class="simple" width="100%">
		<tr>
			<th colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
" class="title"><?php echo $this->_tpl_vars['args_labels']['test_exec_summary']; ?>
</th>
		</tr>
		<tr>
			<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['args_tc_exec']['summary']; ?>
</td>
		</tr>

		<tr>
			<th colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
" class="title"><?php echo $this->_tpl_vars['args_labels']['preconditions']; ?>
</th>
		</tr>
		<tr>
			<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['args_tc_exec']['preconditions']; ?>
</td>
		</tr>

		<tr>
      		<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
"><?php echo $this->_tpl_vars['args_labels']['execution_type']; ?>

			                <?php echo @TITLE_SEP; ?>

			                <?php echo $this->_tpl_vars['args_execution_types'][$this->_tpl_vars['args_tc_exec']['execution_type']]; ?>
</td>
		</tr>

		    <?php if ($this->_tpl_vars['args_design_time_cf'][$this->_tpl_vars['testcase_id']]['before_steps_results'] != ''): ?>
		<tr>
      <td> <?php echo $this->_tpl_vars['args_design_time_cf'][$this->_tpl_vars['testcase_id']]['before_steps_results']; ?>
</td>
		</tr>
		<?php endif; ?>

	<?php if ($this->_tpl_vars['args_tc_exec']['steps'] != ''): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_steps.tpl", 'smarty_include_vars' => array('layout' => $this->_tpl_vars['args_cfg']->exec_cfg->steps_results_layout,'edit_enabled' => false,'steps' => $this->_tpl_vars['args_tc_exec']['steps'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
  	<tr>
		  <td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
">
		        <?php if ($this->_tpl_vars['args_design_time_cf'][$this->_tpl_vars['testcase_id']]['standard_location'] != ''): ?>
					<div id="cfields_design_time_tcversionid_<?php echo $this->_tpl_vars['tcversion_id']; ?>
" class="custom_field_container" 
					style="background-color:#dddddd;"><?php echo $this->_tpl_vars['args_design_time_cf'][$this->_tpl_vars['testcase_id']]['standard_location']; ?>

					</div>
		  <?php endif; ?> 
			</td>
		</tr>
 
  	<tr>
        <?php if ($this->_tpl_vars['args_enable_custom_field'] && $this->_tpl_vars['args_tc_exec']['active'] == 1): ?>
  	  <?php if (isset ( $this->_tpl_vars['args_execution_time_cf'][$this->_tpl_vars['testcase_id']] ) && $this->_tpl_vars['args_execution_time_cf'][$this->_tpl_vars['testcase_id']] != ''): ?>
  	 		<tr>
  				<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
">
  					<div id="cfields_exec_time_tcversionid_<?php echo $this->_tpl_vars['tcversion_id']; ?>
" class="custom_field_container" 
  						style="background-color:#dddddd;"><?php echo $this->_tpl_vars['args_execution_time_cf'][$this->_tpl_vars['testcase_id']]; ?>

  					</div>
  				</td>
  			</tr>
  		<?php endif; ?>
    <?php endif; ?>         
    

		  <td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
">
      <?php if ($this->_tpl_vars['args_testplan_design_time_cf'][$this->_tpl_vars['testcase_id']] != ''): ?>
					<div id="cfields_testplan_design_time_tcversionid_<?php echo $this->_tpl_vars['tcversion_id']; ?>
" class="custom_field_container" 
					style="background-color:#dddddd;"><?php echo $this->_tpl_vars['args_testplan_design_time_cf'][$this->_tpl_vars['testcase_id']]; ?>

					</div>
		  <?php endif; ?> 
			</td>
		</tr>
 		
		<tr>
			<td colspan="<?php echo $this->_tpl_vars['tableColspan']; ?>
">
			<?php if ($this->_tpl_vars['args_tcAttachments'][$this->_tpl_vars['testcase_id']] != null): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_attachments.tpl", 'smarty_include_vars' => array('attach_tableName' => 'nodes_hierarchy','attach_downloadOnly' => true,'attach_attachmentInfos' => $this->_tpl_vars['args_tcAttachments'][$this->_tpl_vars['testcase_id']],'attach_tableClassName' => 'bordered','attach_tableStyles' => "background-color:#dddddd;width:100%")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
			</td>
		</tr>
		</table>
		</div>