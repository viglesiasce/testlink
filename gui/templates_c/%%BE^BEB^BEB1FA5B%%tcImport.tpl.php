<?php /* Smarty version 2.6.26, created on 2010-09-27 13:23:14
         compiled from testcases/tcImport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcImport.tpl', 11, false),array('function', 'config_load', 'testcases/tcImport.tpl', 18, false),array('function', 'html_options', 'testcases/tcImport.tpl', 37, false),array('modifier', 'basename', 'testcases/tcImport.tpl', 17, false),array('modifier', 'replace', 'testcases/tcImport.tpl', 17, false),array('modifier', 'escape', 'testcases/tcImport.tpl', 25, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'file_type,view_file_format_doc,local_file,
             max_size_cvs_file1,max_size_cvs_file2,btn_upload_file,
             duplicate_criteria,action_for_duplicates,
             action_on_duplicated_name,warning,btn_cancel,title_imp_tc_data'), $this);?>


<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='testcases/tcImport.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
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

<h1 class="title"><?php echo $this->_tpl_vars['gui']->container_description; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->container_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<h1 class="title"><?php echo $this->_tpl_vars['gui']->import_title; ?>
</h1>

<?php if ($this->_tpl_vars['gui']->resultMap == null): ?>
<form method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
">

  <table>
  <tr>
  <td> <?php echo $this->_tpl_vars['labels']['file_type']; ?>
 </td>
  <td> <select name="importType">
         <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->importTypes), $this);?>

	     </select>
	<a href=<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @PARTIAL_URL_TL_FILE_FORMATS_DOCUMENT; ?>
><?php echo $this->_tpl_vars['labels']['view_file_format_doc']; ?>
</a>
	</td>
	</tr>
	<tr><td><?php echo $this->_tpl_vars['labels']['local_file']; ?>
 </td>
	    <td><input type="file" name="uploadedFile" 
	                           size="<?php echo $this->_config[0]['vars']['FILENAME_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['FILENAME_MAXLEN']; ?>
"/></td>
	</tr>
	<?php if ($this->_tpl_vars['gui']->hitOptions != ''): ?>
	  <tr><td><?php echo $this->_tpl_vars['labels']['duplicate_criteria']; ?>
 </td>
	      <td><select name="hit_criteria" id="hit_criteria">
	  			  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->hitOptions,'selected' => $this->_tpl_vars['gui']->hitCriteria), $this);?>

	  		    </select>
      </td>
	  </tr>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['gui']->actionOptions != ''): ?>
	<tr><td><?php echo $this->_tpl_vars['labels']['action_for_duplicates']; ?>
 </td>
	    <td><select name="action_on_duplicated_name">
				  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->actionOptions,'selected' => $this->_tpl_vars['gui']->action_on_duplicated_name), $this);?>

			    </select>
    </td>
	</tr>
	<?php endif; ?>

	</table>
	<p><?php echo $this->_tpl_vars['labels']['max_size_cvs_file1']; ?>
 <?php echo $this->_tpl_vars['gui']->importLimitKB; ?>
 <?php echo $this->_tpl_vars['labels']['max_size_cvs_file2']; ?>
</p>
	<div class="groupBtn">
		<input type="hidden" name="useRecursion" value="<?php echo $this->_tpl_vars['gui']->useRecursion; ?>
" />
		<input type="hidden" name="bIntoProject" value="<?php echo $this->_tpl_vars['gui']->bIntoProject; ?>
" />
		<input type="hidden" name="containerID" value="<?php echo $this->_tpl_vars['gui']->containerID; ?>
" />
		<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['gui']->importLimitBytes; ?>
" /> 		<input type="submit" name="UploadFile" value="<?php echo $this->_tpl_vars['labels']['btn_upload_file']; ?>
" />
		<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
" 
			                   onclick="javascript:history.back();" />
	</div>
</form>
<?php else: ?>
	<?php $_from = $this->_tpl_vars['gui']->resultMap; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
		<?php echo $this->_tpl_vars['labels']['title_imp_tc_data']; ?>
 : <b><?php echo ((is_array($_tmp=$this->_tpl_vars['result'][0])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</b> : <?php echo ((is_array($_tmp=$this->_tpl_vars['result'][1])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
	<?php endforeach; endif; unset($_from); ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTree.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->bImport > 0): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTree.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->file_check['status_ok'] == 0): ?>
  <script type="text/javascript">
  alert_message("<?php echo $this->_tpl_vars['labels']['warning']; ?>
","<?php echo $this->_tpl_vars['gui']->file_check['msg']; ?>
");
  // alert("<?php echo $this->_tpl_vars['gui']->file_check['msg']; ?>
");
  </script>
<?php endif; ?>  


</div>

</body>
</html>