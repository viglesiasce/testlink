<?php /* Smarty version 2.6.26, created on 2010-10-12 13:53:12
         compiled from execute/inc_exec_controls.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'execute/inc_exec_controls.tpl', 46, false),)), $this); ?>
	
      <?php $this->assign('ResultsStatusCode', $this->_tpl_vars['tlCfg']->results['status_code']); ?>
      <?php if ($this->_tpl_vars['args_save_type'] == 'bulk'): ?>
        <?php $this->assign('radio_id_prefix', 'bulk_status'); ?>
      <?php else: ?>
        <?php $this->assign('radio_id_prefix', 'status'); ?>
      <?php endif; ?>

  		<table class="invisible">
  		<tr>
  			<td style="text-align: center;">
  				<div class="title"><?php echo $this->_tpl_vars['args_labels']['test_exec_notes']; ?>
</div>
          <?php echo $this->_tpl_vars['args_webeditor']; ?>
 
  			</td>
  			<td valign="top" style="width: 30%;">			
    				      			<div class="title" style="text-align: center;"><?php echo $this->_tpl_vars['args_labels']['test_exec_result']; ?>
</div>
    				
    				<div class="resultBox">
			Command<br />
			<input type="text" name="collect_command_<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
" id="collect_command_<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
" size="16"  maxlength="255" value="show version" onkeypress="return disableEnterKey(event)"><br />
                        IP<br />
			<input type="text" name="collect_ip_<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
" id="collect_ip_<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
" size="16"  maxlength="255" value="" onkeypress="return disableEnterKey(event)"><br />
			<input type="submit" name="save_and_collect[<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
]"
                                                    <?php echo $this->_tpl_vars['args_input_enable_mgmt']; ?>

                        onclick="document.getElementById('save_button_clicked').value=<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
;return checkCollectForStatus(document.getElementById('collect_ip_<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
').value, <?php echo $this->_tpl_vars['args_tcversion_id']; ?>
, document.getElementById('collect_command_<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
').value)"  value="Collect Info" />
                        <HR>

                <?php $_from = $this->_tpl_vars['tlCfg']->results['status_label_for_exec_ui']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['verbose_status'] => $this->_tpl_vars['locale_status']):
?>
    						      <input type="radio" <?php echo $this->_tpl_vars['args_input_enable_mgmt']; ?>
 name="<?php echo $this->_tpl_vars['radio_id_prefix']; ?>
[<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
]" 
    						      id="<?php echo $this->_tpl_vars['radio_id_prefix']; ?>
_<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
_<?php echo $this->_tpl_vars['ResultsStatusCode'][$this->_tpl_vars['verbose_status']]; ?>
" 
    							    value="<?php echo $this->_tpl_vars['ResultsStatusCode'][$this->_tpl_vars['verbose_status']]; ?>
"
    						      <?php if ($this->_tpl_vars['args_save_type'] == 'bulk'): ?>
            							onclick="javascript:set_combo_group('execSetResults','status_','<?php echo $this->_tpl_vars['ResultsStatusCode'][$this->_tpl_vars['verbose_status']]; ?>
');"
    						      <?php endif; ?>
    							    <?php if ($this->_tpl_vars['verbose_status'] == $this->_tpl_vars['tlCfg']->results['default_status']): ?>
    							        checked="checked" 
    							    <?php endif; ?> /> &nbsp;<?php echo lang_get_smarty(array('s' => $this->_tpl_vars['locale_status']), $this);?>
<br />
    					  <?php endforeach; endif; unset($_from); ?>		
    					  <br />		
    		 			
    		 			  <?php if ($this->_tpl_vars['args_save_type'] == 'single'): ?>
			    <input type="submit" name="save_results[<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
]" 
    		 			            <?php echo $this->_tpl_vars['args_input_enable_mgmt']; ?>

                          onclick="document.getElementById('save_button_clicked').value=<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
;return checkSubmitForStatus('<?php echo $this->_tpl_vars['ResultsStatusCode']['not_run']; ?>
')"
    		 			            value="<?php echo $this->_tpl_vars['args_labels']['btn_save_tc_exec_results']; ?>
" />
    		 			         
    		 			      <input type="submit" name="save_and_next[<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
]" 
    		 			            <?php echo $this->_tpl_vars['args_input_enable_mgmt']; ?>

                          onclick="document.getElementById('save_button_clicked').value=<?php echo $this->_tpl_vars['args_tcversion_id']; ?>
;return checkSubmitForStatus('<?php echo $this->_tpl_vars['ResultsStatusCode']['not_run']; ?>
')"
    		 			            value="<?php echo $this->_tpl_vars['args_labels']['btn_save_exec_and_movetonext']; ?>
" /><br />
    		 			  <?php else: ?>
     	    	        <input type="submit" id="do_bulk_save" name="do_bulk_save"
      	    	             value="<?php echo $this->_tpl_vars['args_labels']['btn_save_tc_exec_results']; ?>
"/>

    		 			  <?php endif; ?>       
    				</div>
    			</td>
    		</tr>
        <?php if ($this->_tpl_vars['args_save_type'] == 'bulk' && $this->_tpl_vars['args_execution_time_cfields'] != ''): ?>
          <tr><td colspan="2">
  					<div id="cfields_exec_time_tcversionid_<?php echo $this->_tpl_vars['tcversion_id']; ?>
" class="custom_field_container" 
  						style="background-color:#dddddd;">
            <?php echo $this->_tpl_vars['args_labels']['testcase_customfields']; ?>

            <?php echo $this->_tpl_vars['args_execution_time_cfields']['0']; ?>
             </div> 
          </td></tr>
        <?php endif; ?>
  		</table>
      <div class="messages" style="align:center;">
      <?php echo $this->_tpl_vars['labels']['exec_not_run_result_note']; ?>

      </div>