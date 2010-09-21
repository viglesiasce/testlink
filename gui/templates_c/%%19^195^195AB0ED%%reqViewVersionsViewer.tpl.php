<?php /* Smarty version 2.6.26, created on 2010-09-09 15:18:42
         compiled from requirements/reqViewVersionsViewer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/reqViewVersionsViewer.tpl', 8, false),array('function', 'localize_timestamp', 'requirements/reqViewVersionsViewer.tpl', 156, false),array('modifier', 'escape', 'requirements/reqViewVersionsViewer.tpl', 27, false),array('modifier', 'count', 'requirements/reqViewVersionsViewer.tpl', 81, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "requirement_spec,Requirements,scope,status,type,expected_coverage,  
             coverage,btn_delete,btn_cp,btn_edit,btn_del_this_version,btn_new_version,
             btn_del_this_version, btn_freeze_this_version, version, can_not_edit_req,
             testproject,title_last_mod,title_created,by,btn_compare_versions"), $this);?>


             
<?php $this->assign('hrefReqSpecMgmt', "lib/general/frmWorkArea.php?feature=reqSpecMgmt"); ?>
<?php $this->assign('hrefReqSpecMgmt', ($this->_tpl_vars['basehref']).($this->_tpl_vars['hrefReqSpecMgmt'])); ?>

<?php $this->assign('hrefReqMgmt', "lib/requirements/reqView.php?showReqSpecTitle=1&requirement_id="); ?>
<?php $this->assign('hrefReqMgmt', ($this->_tpl_vars['basehref']).($this->_tpl_vars['hrefReqMgmt'])); ?>

<?php $this->assign('module', 'lib/requirements/'); ?>
<?php $this->assign('req_id', $this->_tpl_vars['args_req']['id']); ?>
<?php $this->assign('req_version_id', $this->_tpl_vars['args_req']['version_id']); ?>

<?php if ($this->_tpl_vars['args_show_title']): ?>
    <?php if ($this->_tpl_vars['args_tproject_name'] != ''): ?>
     <h2><?php echo $this->_tpl_vars['labels']['testproject']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['args_tproject_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h2>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['args_req_spec_name'] != ''): ?>
     <h2><?php echo $this->_tpl_vars['labels']['req_spec']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['args_req_spec_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h2>
    <?php endif; ?>
	  <h2><?php echo $this->_tpl_vars['labels']['title_test_case']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['args_req']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </h2>
<?php endif; ?>
<?php $this->assign('warning_edit_msg', ""); ?>

<?php if ($this->_tpl_vars['args_grants']->req_mgmt == 'yes'): ?>
  <div class="groupBtn">
  <div style="margin-bottom: 5px;">
	  <form id="req" name="req" action="lib/requirements/reqEdit.php" method="post">
	  	<input type="hidden" name="requirement_id" value="<?php echo $this->_tpl_vars['args_req']['id']; ?>
" />
	  	<input type="hidden" name="req_version_id" value="<?php echo $this->_tpl_vars['args_req']['version_id']; ?>
" />
	  	<input type="hidden" name="doAction" value="" />
	  	
	  	<?php if ($this->_tpl_vars['args_frozen_version'] == null): ?>
	  	<input type="submit" name="edit_req" value="<?php echo $this->_tpl_vars['labels']['btn_edit']; ?>
" onclick="doAction.value='edit'"/>
	  	<?php endif; ?>
	  	
	  	<?php if ($this->_tpl_vars['args_can_delete_req']): ?>
	  	<input type="button" name="delete_req" value="<?php echo $this->_tpl_vars['labels']['btn_delete']; ?>
"
	  	       onclick="delete_confirmation(<?php echo $this->_tpl_vars['args_req']['id']; ?>
,
	  	                                    '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['args_req']['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['args_req']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
	  				                              '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
', '<?php echo $this->_tpl_vars['warning_msg']; ?>
',pF_delete_req);"	/>

	  	<?php endif; ?>
	  	
	  	<?php if ($this->_tpl_vars['args_can_delete_version']): ?>
	  	<input type="button" name="delete_req_version" value="<?php echo $this->_tpl_vars['labels']['btn_del_this_version']; ?>
"
	  	       onclick="delete_confirmation(<?php echo $this->_tpl_vars['args_req']['version_id']; ?>
,
	  	                '<?php echo $this->_tpl_vars['labels']['version']; ?>
:<?php echo $this->_tpl_vars['args_req']['version']; ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['args_req']['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['args_req']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
	  				                              '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
', '<?php echo $this->_tpl_vars['warning_msg']; ?>
',pF_delete_req_version);"	/>
	  				                                
	  	<?php endif; ?>

				<?php if ($this->_tpl_vars['args_frozen_version'] == null): ?>
	  	<input type="button" name="freeze_req_version" value="<?php echo $this->_tpl_vars['labels']['btn_freeze_this_version']; ?>
"
	  	       onclick="delete_confirmation(<?php echo $this->_tpl_vars['args_req']['version_id']; ?>
,
	  	                '<?php echo $this->_tpl_vars['labels']['version']; ?>
:<?php echo $this->_tpl_vars['args_req']['version']; ?>
-<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['args_req']['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['args_req']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
	  				                              '<?php echo $this->_tpl_vars['freeze_msgbox_title']; ?>
', '<?php echo $this->_tpl_vars['freeze_warning_msg']; ?>
',pF_freeze_req_version);"	/>
	  	<?php endif; ?>

	    <?php if ($this->_tpl_vars['args_can_copy']): ?>  				                                
	  	<input type="submit" name="copy_req" value="<?php echo $this->_tpl_vars['labels']['btn_cp']; ?>
" onclick="doAction.value='copy'"/>
	  	<?php endif; ?>
	  	<input type="submit" name="new_version" value="<?php echo $this->_tpl_vars['labels']['btn_new_version']; ?>
" onclick="doAction.value='doCreateVersion'"/>
	  </form>
	</div>
	
	<div>
		<?php if (count($this->_tpl_vars['gui']->req_versions) > 1): ?>
		<form method="post" action="lib/requirements/reqCompareVersions.php" name="version_compare">
			<input type="hidden" name="requirement_id" value="<?php echo $this->_tpl_vars['args_req']['id']; ?>
" />
			<input type="submit" name="compare_versions" value="<?php echo $this->_tpl_vars['labels']['btn_compare_versions']; ?>
" />
		</form>
	<?php endif; ?>

  </div> <?php endif; ?>

<?php if ($this->_tpl_vars['args_frozen_version'] != null): ?>
<div class="messages" align="center"><?php echo $this->_tpl_vars['labels']['can_not_edit_req']; ?>
</div>
<?php endif; ?>

<table class="simple">
  <?php if ($this->_tpl_vars['args_show_title']): ?>
	<tr>
		<th colspan="2">
		<?php echo $this->_tpl_vars['args_req']['req_doc_id']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['args_req']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
	</tr>
  <?php endif; ?>
	<tr>
    <th><?php echo ((is_array($_tmp=$this->_tpl_vars['args_req']['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['tlCfg']->gui_title_separator_1; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['args_req']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
	</tr>

  <?php if ($this->_tpl_vars['args_show_version']): ?>
	  <tr>
	  	<td class="bold" colspan="2"><?php echo $this->_tpl_vars['labels']['version']; ?>

	  	<?php echo $this->_tpl_vars['args_req']['version']; ?>

	  	</td>
	  </tr>
	<?php endif; ?>

  <tr>
	  <td><?php echo $this->_tpl_vars['labels']['status']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo $this->_tpl_vars['args_gui']->reqStatusDomain[$this->_tpl_vars['args_req']['status']]; ?>
</td>
	</tr>
	<tr>
	  <td><?php echo $this->_tpl_vars['labels']['type']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo $this->_tpl_vars['args_gui']->reqTypeDomain[$this->_tpl_vars['args_req']['type']]; ?>
</td>
	</tr>
	<?php if ($this->_tpl_vars['args_gui']->req_cfg->expected_coverage_management && $this->_tpl_vars['args_gui']->attrCfg['expected_coverage'][$this->_tpl_vars['args_req']['type']]): ?> 
	<tr>
	  <td><?php echo $this->_tpl_vars['labels']['expected_coverage']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo $this->_tpl_vars['args_req']['expected_coverage']; ?>
</td>
	</tr>
	<?php endif; ?>

	<tr>
		<td>
			<fieldset class="x-fieldset x-form-label-left"><legend class="legend_container"><?php echo $this->_tpl_vars['labels']['scope']; ?>
</legend>
			<?php echo $this->_tpl_vars['args_req']['scope']; ?>

			</fieldset>
		</td>
	</tr>
	<td>
	  <fieldset class="x-fieldset x-form-label-left"><legend class="legend_container"><?php echo $this->_tpl_vars['labels']['coverage']; ?>
</legend>
	  <?php if ($this->_tpl_vars['args_req_coverage'] != ''): ?>
	  <?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['args_req_coverage']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
	    <span> 	    <a href="javascript:openTCaseWindow(<?php echo $this->_tpl_vars['args_req_coverage'][$this->_sections['row']['index']]['id']; ?>
)">
	    <?php echo ((is_array($_tmp=$this->_tpl_vars['args_gui']->tcasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['args_gui']->glueChar; ?>
<?php echo $this->_tpl_vars['args_req_coverage'][$this->_sections['row']['index']]['tc_external_id']; ?>
<?php echo $this->_tpl_vars['args_gui']->pieceSep; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['args_req_coverage'][$this->_sections['row']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
	    </span><br />
	   <?php endfor; else: ?>
	  <span><?php echo $this->_tpl_vars['labels']['req_msg_notestcase']; ?>
</span>
	  <?php endif; ?>
	  <?php endif; ?>
	  
	  </fieldset>
			</td>
	 </tr>
	<tr>
			<td>&nbsp;</td>
	</tr>

	<tr class="time_stamp_creation">
  		<td >
      		<?php echo $this->_tpl_vars['labels']['title_created']; ?>
&nbsp;<?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['args_req']['creation_ts']), $this);?>
&nbsp;
      		<?php echo $this->_tpl_vars['labels']['by']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['args_req']['author'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  		</td>
  </tr>
	<?php if ($this->_tpl_vars['args_req']['modifier'] != ""): ?>
  <tr class="time_stamp_creation">
  		<td >
    		<?php echo $this->_tpl_vars['labels']['title_last_mod']; ?>
&nbsp;<?php echo localize_timestamp_smarty(array('ts' => $this->_tpl_vars['args_req']['modification_ts']), $this);?>

		  	&nbsp;<?php echo $this->_tpl_vars['labels']['by']; ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['args_req']['modifier'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

    	</td>
  </tr>
	<?php endif; ?>
	<tr>
	</tr>
	<tr>
	</tr>
</table>

	<?php if ($this->_tpl_vars['args_cf'] != ''): ?>
	<div>
        <div id="cfields_design_time" class="custom_field_container"><?php echo $this->_tpl_vars['args_cf']; ?>
</div>
	</div>
	<?php endif; ?>