<?php /* Smarty version 2.6.26, created on 2010-09-13 17:53:10
         compiled from results/resultsImport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/resultsImport.tpl', 11, false),array('function', 'config_load', 'results/resultsImport.tpl', 16, false),array('function', 'html_options', 'results/resultsImport.tpl', 29, false),array('modifier', 'escape', 'results/resultsImport.tpl', 58, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'view_file_format_doc,file_type,btn_cancel,btn_upload_file,
             title_imp_tc_data,local_file,max_size_cvs_file1,max_size_cvs_file2'), $this);?>


<body>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'tcImport'), $this);?>
 

<div class="workBack">
<h1 class="title"><?php echo $this->_tpl_vars['gui']->import_title; ?>
</h1>

<?php if ($this->_tpl_vars['gui']->resultMap == null): ?>
<form method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
">
  <table>
  <tr>
  	<td><?php echo $this->_tpl_vars['labels']['file_type']; ?>
</td>
    <td><select name="importType">
		      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->importTypes), $this);?>

	      </select>
      	<a href=<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @PARTIAL_URL_TL_FILE_FORMATS_DOCUMENT; ?>
><?php echo $this->_tpl_vars['labels']['view_file_format_doc']; ?>
</a>
	  </td>
  </tr>
  	
	<tr>
	 <td><?php echo $this->_tpl_vars['labels']['local_file']; ?>
</td> 
	 <td>
	  	 	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['gui']->importLimit; ?>
" /> 		<input type="file" name="uploadedFile" 
	                        size="<?php echo $this->_config[0]['vars']['FILENAME_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['FILENAME_MAXLEN']; ?>
"/></td>
  </tr>                              
	</table>
	<p><?php echo $this->_tpl_vars['labels']['max_size_cvs_file1']; ?>
 <?php echo $this->_tpl_vars['gui']->importLimit/1024; ?>
 <?php echo $this->_tpl_vars['labels']['max_size_cvs_file2']; ?>
</p>
	
	<div class="groupBtn">
		<input type="hidden" name="buildID" value="<?php echo $this->_tpl_vars['gui']->buildID; ?>
" />
    <input type="hidden" name="platformID" value="<?php echo $this->_tpl_vars['gui']->platformID; ?>
" />     <input type="hidden" name="tplanID" value="<?php echo $this->_tpl_vars['gui']->tplan; ?>
" /> 
		<input type="submit" name="UploadFile" value="<?php echo $this->_tpl_vars['labels']['btn_upload_file']; ?>
" />
		<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
" 
			onclick="javascript: location.href=fRoot+'lib/results/resultsImport.php';" />
	</div>
</form>
<?php else: ?>
	<?php $_from = $this->_tpl_vars['gui']->resultMap; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>
		<?php echo $this->_tpl_vars['labels']['title_imp_tc_data']; ?>
 : <?php echo ((is_array($_tmp=$this->_tpl_vars['result'][0])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
	<?php endforeach; endif; unset($_from); ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTree.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->doImport): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTree.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->file_check['status_ok'] == 0): ?>
    <script>
    alert("<?php echo $this->_tpl_vars['gui']->file_check['msg']; ?>
");
    </script>
<?php endif; ?>  


</div>

</body>
</html>