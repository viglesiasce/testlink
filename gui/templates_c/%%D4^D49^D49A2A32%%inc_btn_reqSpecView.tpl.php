<?php /* Smarty version 2.6.26, created on 2010-09-27 14:44:26
         compiled from requirements/inc_btn_reqSpecView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/inc_btn_reqSpecView.tpl', 10, false),array('function', 'config_load', 'requirements/inc_btn_reqSpecView.tpl', 17, false),array('modifier', 'basename', 'requirements/inc_btn_reqSpecView.tpl', 16, false),array('modifier', 'replace', 'requirements/inc_btn_reqSpecView.tpl', 16, false),array('modifier', 'escape', 'requirements/inc_btn_reqSpecView.tpl', 35, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'btn_req_create,btn_new_req_spec,btn_analyse,btn_export_req_spec,
             req_select_create_tc,btn_import_req_spec,btn_import_reqs,
             btn_export_reqs,btn_edit_spec,btn_delete_spec,
             btn_show_direct_link,btn_copy_requirements,btn_copy_req_spec'), $this);?>

             
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='requirements/inc_btn_reqSpecView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<!--- inc_btn_reqSpecView.tpl -->
<div class="groupBtn">
  	<form id="req_spec" name="req_spec" action="<?php echo $this->_tpl_vars['req_module']; ?>
reqSpecEdit.php" method="post">
  	<div style="margin-bottom: 5px;">
  		<input type="hidden" name="req_spec_id" value="<?php echo $this->_tpl_vars['gui']->req_spec_id; ?>
" />
  		<input type="hidden" name="doAction" value="" />
  	
  		<?php if ($this->_tpl_vars['gui']->grants->req_mgmt == 'yes'): ?>
            	<?php if ($this->_tpl_vars['tlCfg']->req_cfg->child_requirements_mgmt == @ENABLED): ?>
  	        <input type="button" name="btn_new_req_spec" 
  	               value="<?php echo $this->_tpl_vars['labels']['btn_new_req_spec']; ?>
"
		               onclick="location='<?php echo $this->_tpl_vars['req_spec_new_url']; ?>
'" />  
        	<?php endif; ?>
  		<input type="submit" name="edit_req_spec"  value="<?php echo $this->_tpl_vars['labels']['btn_edit_spec']; ?>
" 
  	         onclick="doAction.value='edit'"/>
  		<input type="button" name="deleteSRS" value="<?php echo $this->_tpl_vars['labels']['btn_delete_spec']; ?>
"
  	       onclick="delete_confirmation(<?php echo $this->_tpl_vars['gui']->req_spec['id']; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->req_spec['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
                                        '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');"	/>

		    <input type="button" name="importReqSpec" value="<?php echo $this->_tpl_vars['labels']['btn_import_req_spec']; ?>
"
		           onclick="location='<?php echo $this->_tpl_vars['req_spec_import_url']; ?>
'" />
 		    <input type="button" name="exportReq" value="<?php echo $this->_tpl_vars['labels']['btn_export_req_spec']; ?>
"
		           onclick="location='<?php echo $this->_tpl_vars['req_spec_export_url']; ?>
'" />

  		<?php endif; ?>
  		<input type="button" name="analyse" value="<?php echo $this->_tpl_vars['labels']['btn_analyse']; ?>
"
  			onclick="javascript: location.href=fRoot+'<?php echo $this->_tpl_vars['req_module']; ?>
reqSpecAnalyse.php?req_spec_id=<?php echo $this->_tpl_vars['gui']->req_spec['id']; ?>
';" />
  		<input type="submit" name="copy_req_spec" id="copy_req_spec" value="<?php echo $this->_tpl_vars['labels']['btn_copy_req_spec']; ?>
" 
  	         onclick="doAction.value='copy'"/>

	</div>
	<div>
  		<?php if ($this->_tpl_vars['gui']->grants->req_mgmt == 'yes'): ?>
	  	  <input type="button" name="create_req" value="<?php echo $this->_tpl_vars['labels']['btn_req_create']; ?>
"
		           onclick="location='<?php echo $this->_tpl_vars['req_edit_url']; ?>
'" />  
		    <input type="button" name="importReq" value="<?php echo $this->_tpl_vars['labels']['btn_import_reqs']; ?>
"
		           onclick="location='<?php echo $this->_tpl_vars['req_import_url']; ?>
'" />
 		    <input type="button" name="exportReq" value="<?php echo $this->_tpl_vars['labels']['btn_export_reqs']; ?>
"
		           onclick="location='<?php echo $this->_tpl_vars['req_export_url']; ?>
'" />

	      <?php if ($this->_tpl_vars['gui']->requirements_count > 0): ?>
  		  	      <input type="button" name="create_tcases" value="<?php echo $this->_tpl_vars['labels']['req_select_create_tc']; ?>
"
		                   onclick="location='<?php echo $this->_tpl_vars['req_create_tc_url']; ?>
'" />
        
  		  	      <input type="button" name="copy_req" value="<?php echo $this->_tpl_vars['labels']['btn_copy_requirements']; ?>
"
		                   onclick="location='<?php echo $this->_tpl_vars['req_spec_copy_req_url']; ?>
'" />
    	  <?php endif; ?>    
	  	<?php endif; ?>

	</div>
  </form>
</div>