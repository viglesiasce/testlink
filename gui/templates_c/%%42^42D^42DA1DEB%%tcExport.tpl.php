<?php /* Smarty version 2.6.26, created on 2010-09-07 23:04:02
         compiled from testcases/tcExport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcExport.tpl', 13, false),array('function', 'config_load', 'testcases/tcExport.tpl', 18, false),array('function', 'html_options', 'testcases/tcExport.tpl', 64, false),array('modifier', 'basename', 'testcases/tcExport.tpl', 17, false),array('modifier', 'replace', 'testcases/tcExport.tpl', 17, false),array('modifier', 'escape', 'testcases/tcExport.tpl', 41, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'export_filename,warning_empty_filename,file_type,warning,export_cfields,title_req_export,
             view_file_format_doc,export_with_keywords,btn_export,btn_cancel'), $this);?>
 

<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='testcases/tcExport.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_filename = "<?php echo $this->_tpl_vars['labels']['warning_empty_filename']; ?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.export_filename.value)) 
  {
      alert_message(alert_box_title,warning_empty_filename);
      selectField(f, \'export_filename\');
      return false;
  }
  return true;
}
'; ?>

</script>
</head>

<body>
<h1 class="title"><?php echo $this->_tpl_vars['gui']->page_title; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->object_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">

<?php if ($this->_tpl_vars['gui']->do_it == 1): ?>
  <form method="post" id="export_xml" enctype="multipart/form-data" 
        action="lib/testcases/tcExport.php"
        onSubmit="javascript:return validateForm(this);">
  
    <table>
    <tr>
    <td>
    <?php echo $this->_tpl_vars['labels']['export_filename']; ?>

    </td>
    <td>
  	<input type="text" name="export_filename" maxlength="<?php echo $this->_config[0]['vars']['FILENAME_MAXLEN']; ?>
" 
			           value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->export_filename)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="<?php echo $this->_config[0]['vars']['FILENAME_SIZE']; ?>
"/>
			  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'export_filename')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	</td>
  	<tr>
  	<td><?php echo $this->_tpl_vars['labels']['file_type']; ?>
</td>
  	<td>
  	<select name="exportType">
  		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->exportTypes), $this);?>

  	</select>
	  <a href=<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @PARTIAL_URL_TL_FILE_FORMATS_DOCUMENT; ?>
><?php echo lang_get_smarty(array('s' => 'view_file_format_doc'), $this);?>
</a>
  	</td>
  	</tr>
    <tr>
    <td><?php echo $this->_tpl_vars['labels']['title_req_export']; ?>
</td>
    <td><input type="checkbox" name="exportReqs" value="1" checked /></td>
    </tr>  	
    <tr>
    <td><?php echo $this->_tpl_vars['labels']['export_cfields']; ?>
</td>
    <td><input type="checkbox" name="exportCFields" value="1" checked /></td>
    </tr>
    <tr>
    <td><?php echo $this->_tpl_vars['labels']['export_with_keywords']; ?>
</td>
    <td><input type="checkbox" name="exportKeywords" value="0" /></td>
    </tr>

  	</table>
  	
  	<div class="groupBtn">
  		<input type="hidden" name="testcase_id" value="<?php echo $this->_tpl_vars['gui']->tcID; ?>
" />
  		<input type="hidden" name="tcversion_id" value="<?php echo $this->_tpl_vars['gui']->tcVersionID; ?>
" />
  		<input type="hidden" name="containerID" value="<?php echo $this->_tpl_vars['gui']->containerID; ?>
" />
  		<input type="hidden" name="useRecursion" value="<?php echo $this->_tpl_vars['gui']->useRecursion; ?>
" />
  		<input type="submit" name="export" value="<?php echo $this->_tpl_vars['labels']['btn_export']; ?>
" />
  		<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
    		     <?php if ($this->_tpl_vars['gui']->goback_url != ''): ?>  onclick="location='<?php echo $this->_tpl_vars['gui']->goback_url; ?>
'"
    		     <?php else: ?>  onclick="javascript:history.back();" <?php endif; ?> />
  	</div>
  </form>
<?php else: ?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->nothing_todo_msg)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<?php endif; ?>

</div>

</body>
</html>