<?php /* Smarty version 2.6.26, created on 2010-09-10 15:22:04
         compiled from keywords/keywordsExport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'keywords/keywordsExport.tpl', 8, false),array('modifier', 'replace', 'keywords/keywordsExport.tpl', 8, false),array('modifier', 'escape', 'keywords/keywordsExport.tpl', 33, false),array('function', 'config_load', 'keywords/keywordsExport.tpl', 9, false),array('function', 'lang_get', 'keywords/keywordsExport.tpl', 15, false),array('function', 'html_options', 'keywords/keywordsExport.tpl', 58, false),)), $this); ?>

<?php $this->assign('action_url', "lib/keywords/keywordsExport.php?doAction=do_export"); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='keywords/keywordsExport.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
'; ?>

var warning_empty_filename = "<?php echo lang_get_smarty(array('s' => 'warning_empty_filename'), $this);?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.export_filename.value)) 
  {
      alert(warning_empty_filename);
      selectField(f, \'export_filename\');
      return false;
  }
  return true;
}
</script>
'; ?>

</head>


<body>
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['main_descr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['action_descr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

  <form method="post" id="export_xml" enctype="multipart/form-data" 
        action="<?php echo $this->_tpl_vars['action_url']; ?>
"
        onSubmit="javascript:return validateForm(this);">
  
    <table>
    <tr>
	    <td>
		    <?php echo lang_get_smarty(array('s' => 'export_filename'), $this);?>

	    </td>
	    <td>
		  	<input type="text" name="export_filename" maxlength="<?php echo $this->_config[0]['vars']['FILENAME_MAXLEN']; ?>
" 
				           value="<?php echo ((is_array($_tmp=$this->_tpl_vars['export_filename'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="<?php echo $this->_config[0]['vars']['FILENAME_SIZE']; ?>
"/>
				  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'export_filename')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	  	</td>
  	<tr>
	  	<td>
	  		<?php echo lang_get_smarty(array('s' => 'file_type'), $this);?>

	  	</td>
	  	<td>
		  	<select name="exportType">
		  		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['exportTypes']), $this);?>

		  	</select>
		 	<a href=<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @PARTIAL_URL_TL_FILE_FORMATS_DOCUMENT; ?>
><?php echo lang_get_smarty(array('s' => 'view_file_format_doc'), $this);?>
</a>
	  	</td>
	</tr>
  	</table>
  	
  	<div class="groupBtn">
  		<input type="submit" name="export" value="<?php echo lang_get_smarty(array('s' => 'btn_export'), $this);?>
" />
  		<input type="button" name="cancel" value="<?php echo lang_get_smarty(array('s' => 'btn_cancel'), $this);?>
" 
			onclick="javascript: location.href=fRoot+'lib/keywords/keywordsView.php';" />
  	</div>
  </form>
</div>

</body>
</html>