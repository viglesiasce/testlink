<?php /* Smarty version 2.6.26, created on 2010-09-30 11:59:33
         compiled from requirements/reqImport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/reqImport.tpl', 15, false),array('function', 'config_load', 'requirements/reqImport.tpl', 33, false),array('modifier', 'basename', 'requirements/reqImport.tpl', 27, false),array('modifier', 'replace', 'requirements/reqImport.tpl', 28, false),array('modifier', 'escape', 'requirements/reqImport.tpl', 41, false),array('modifier', 'strip_tags', 'requirements/reqImport.tpl', 123, false),array('modifier', 'strip', 'requirements/reqImport.tpl', 123, false),array('modifier', 'truncate', 'requirements/reqImport.tpl', 123, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'note_keyword_filter,check_uncheck_all_checkboxes_for_add,
             th_id,th_test_case,version,scope,check_status,type,doc_id_short,
             btn_save_custom_fields,title_req_import,expected_coverage,
             check_req_file_structure,req_msg_norequirement,status,
             req_import_option_skip,req_import_option_overwrite,
             title_req_import_check_input,req_import_check_note,
             req_import_dont_empty,btn_import,btn_cancel,Result,
             req_doc_id,title,req_import_option_header,
             check_uncheck_all_checkboxes,remove_tc,show_tcase_spec,
             check_uncheck_all_checkboxes_for_rm'), $this);?>


<?php $this->assign('bn', ((is_array($_tmp='requirements/reqImport.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp))); ?>
<?php $this->assign('viewer_template', ((is_array($_tmp='requirements/reqImport.tpl')) ? $this->_run_mod_handler('replace', true, $_tmp, ($this->_tpl_vars['bn']), "inc_req_import_viewer.tpl") : smarty_modifier_replace($_tmp, ($this->_tpl_vars['bn']), "inc_req_import_viewer.tpl"))); ?>
<?php $this->assign('req_module', 'lib/requirements/'); ?>
<?php $this->assign('url_args', "reqSpecView.php?req_spec_id="); ?>
<?php $this->assign('req_spec_view_url', ($this->_tpl_vars['basehref']).($this->_tpl_vars['req_module']).($this->_tpl_vars['url_args']).($this->_tpl_vars['gui'])."->req_spec_id"); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='requirements/reqImport.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


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
</head>

<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">

  <?php if ($this->_tpl_vars['gui']->doAction == 'askFileName'): ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
?req_spec_id=<?php echo $this->_tpl_vars['gui']->req_spec_id; ?>
">
	  	<input type="hidden" name="scope" id="scope" value="<?php echo $this->_tpl_vars['gui']->scope; ?>
" />
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_gui_import_file.tpl", 'smarty_include_vars' => array('args' => $this->_tpl_vars['gui']->importFileGui)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </form>
    
    <?php if ($this->_tpl_vars['gui']->file_check['status_ok'] == 0): ?>
      <script>
      alert("<?php echo $this->_tpl_vars['gui']->file_check['msg']; ?>
");
      </script>
    <?php elseif ($this->_tpl_vars['gui']->try_upload && ( $this->_tpl_vars['gui']->arrImport == "" )): ?>
      <script>
      alert("<?php echo $this->_tpl_vars['labels']['check_req_file_structure']; ?>
");
      </script>
    <?php endif; ?>
  
  <?php elseif ($this->_tpl_vars['gui']->doAction == 'uploadFile'): ?>

    <?php if (! is_null ( $this->_tpl_vars['gui']->items )): ?>
    
      <?php if ($this->_tpl_vars['gui']->importType == 'XML'): ?>
  	    <form method='post' action='<?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
?req_spec_id=<?php echo $this->_tpl_vars['gui']->req_spec_id; ?>
'>
 		    <input type='hidden' value="<?php echo $this->_tpl_vars['gui']->importType; ?>
" name='importType' />
		    <input type="hidden" name="scope" id="scope" value="<?php echo $this->_tpl_vars['gui']->scope; ?>
" />
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['viewer_template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	    	<div class="groupBtn">
  	    		<input type='submit' name='executeImport' value="<?php echo $this->_tpl_vars['labels']['btn_import']; ?>
" />
  	    		<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
  	    			onclick="javascript: location.href='<?php echo $this->_tpl_vars['req_spec_view_url']; ?>
';" />
  	    	</div>
  	    </form>
  	    
        <?php if ($this->_tpl_vars['gui']->scope == 'branch' || $this->_tpl_vars['gui']->scope == 'tree'): ?>
  	    <?php else: ?>
  	    <?php endif; ?>
  	    
  	  <?php endif; ?>
  	  
      <?php if ($this->_tpl_vars['gui']->importType != 'XML'): ?>
          	
  	    <h2><?php echo $this->_tpl_vars['labels']['title_req_import_check_input']; ?>
</h2>
  	    <p><?php echo $this->_tpl_vars['labels']['req_import_check_note']; ?>
</p>
  	    <div>
  	    <form method='post' action='<?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
?req_spec_id=<?php echo $this->_tpl_vars['gui']->req_spec_id; ?>
'>
  	    	<p><?php echo $this->_tpl_vars['labels']['req_import_option_header']; ?>

  	    	<select name="conflicts">
  	    		<option value ="skip"><?php echo $this->_tpl_vars['labels']['req_import_option_skip']; ?>
</option>
  	    		<option value ="overwrite" selected="selected"><?php echo $this->_tpl_vars['labels']['req_import_option_overwrite']; ?>
</option>
  	    	</select></p>
        
  	    	<p><input type="checkbox" name="noEmpty" checked="checked" /><?php echo $this->_tpl_vars['labels']['req_import_dont_empty']; ?>
</p>
        
  	    	<input type="hidden" name="req_spec_id" value="<?php echo $this->_tpl_vars['gui']->req_spec_id; ?>
" />
  	    	<input type='hidden' value='<?php echo $this->_tpl_vars['gui']->fileName; ?>
' name='uploadedFile' />
  	    	<input type='hidden' value='<?php echo $this->_tpl_vars['gui']->importType; ?>
' name='importType' />
        
  	    	<div class="groupBtn">
  	    		<input type='submit' name='executeImport' value="<?php echo $this->_tpl_vars['labels']['btn_import']; ?>
" />
  	    		<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
  	    			onclick="javascript: location.href='<?php echo $this->_tpl_vars['req_spec_view_url']; ?>
';" />
  	    	</div>
  	    </form>
  	    <div>
  	    <table class="simple">
  	    	<tr>
  	    		<th><?php echo $this->_tpl_vars['labels']['req_doc_id']; ?>
</th>
  	    		<th><?php echo $this->_tpl_vars['labels']['title']; ?>
</th>
  	    		<th><?php echo $this->_tpl_vars['labels']['scope']; ?>
</th>
  	    		<th><?php echo $this->_tpl_vars['labels']['type']; ?>
</th>
  	    		<th><?php echo $this->_tpl_vars['labels']['status']; ?>
</th>
  	    		<th><?php echo $this->_tpl_vars['labels']['expected_coverage']; ?>
</th>
  	    		<th><?php echo $this->_tpl_vars['labels']['check_status']; ?>
</th>
  	    	</tr>
  	      <?php if ($this->_tpl_vars['gui']->items != ''): ?>
 	          <?php $_from = $this->_tpl_vars['gui']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['import_feedback']):
?>
  	    	  <tr>
  	    	  	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	    	  	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	    	  	<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['import_feedback']['scope'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['SCOPE_TRUNCATE']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['SCOPE_TRUNCATE'])); ?>
</td>
  	    	  	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['type'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	    	  	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	    	  	<td align="right"><?php echo $this->_tpl_vars['import_feedback']['expected_coverage']; ?>
</td>
  	    	  	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['check_status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	    	  </tr>
  	    	  <?php endforeach; endif; unset($_from); ?>
  	      <?php else: ?>
  	        <tr><td><?php echo $this->_tpl_vars['labels']['req_msg_norequirement']; ?>
</td></tr>
  	    	<?php endif; ?>  
  	    </table>
  	    </div>


  	    </div>
  	  <?php endif; ?>
  	<?php endif; ?>

  <?php endif; ?>
  
    <?php if ($this->_tpl_vars['gui']->importResult != '' && $this->_tpl_vars['gui']->file_check['status_ok']): ?>
  	<p class="info"><?php echo $this->_tpl_vars['gui']->importResult; ?>
</p>

  	<table class="simple">
  	<tr>
  		<th><?php echo $this->_tpl_vars['labels']['doc_id_short']; ?>
</th>
  		<th><?php echo $this->_tpl_vars['labels']['title']; ?>
</th>
  		<th style="width: 20%;"><?php echo $this->_tpl_vars['labels']['Result']; ?>
</th>
  	</tr>
  	<?php if ($this->_tpl_vars['gui']->items != ''): ?>
 	    <?php $_from = $this->_tpl_vars['gui']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['import_feedback']):
?>
  	  <tr>
  	    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['import_feedback']['import_status'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  	  </tr>
  	  <?php endforeach; endif; unset($_from); ?>
  	<?php else: ?>
  	  <tr><td><?php echo $this->_tpl_vars['labels']['req_msg_norequirement']; ?>
</td></tr>
  	<?php endif; ?>
  	</table>
 <?php endif; ?>

</div>

</body>
</html>