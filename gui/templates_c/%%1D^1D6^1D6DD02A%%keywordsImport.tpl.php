<?php /* Smarty version 2.6.26, created on 2010-09-10 15:13:53
         compiled from keywords/keywordsImport.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'keywords/keywordsImport.tpl', 10, false),array('function', 'html_options', 'keywords/keywordsImport.tpl', 21, false),array('modifier', 'escape', 'keywords/keywordsImport.tpl', 10, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>
<h1 class="title"><?php echo lang_get_smarty(array('s' => 'testproject'), $this);?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tproject_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<h1 class="title"><?php echo lang_get_smarty(array('s' => 'title_keyword_import'), $this);?>
</h1>

<form method="post" enctype="multipart/form-data" action="<?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
">
  <table>
	<tr>
		<td><?php echo lang_get_smarty(array('s' => 'file_type'), $this);?>
</td>
		<td>
			<select name="importType">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['importTypes'],'selected' => $this->_tpl_vars['import_type_selected']), $this);?>

			</select>
				<a href=<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @PARTIAL_URL_TL_FILE_FORMATS_DOCUMENT; ?>
><?php echo lang_get_smarty(array('s' => 'view_file_format_doc'), $this);?>
</a>

		</td>
	</tr>
	<tr>
		<td>
			<?php echo lang_get_smarty(array('s' => 'keywords_file'), $this);?>

		</td>
		<td>
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['importLimit']; ?>
" /> 			<input type="file" name="uploadedFile" size="30" />
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<?php echo $this->_tpl_vars['fileSizeLimitMsg']; ?>

		</td>
	</tr>
	</table>
	<br/>
	<div class="groupBtn">
		<input type="hidden" name="tproject_id" value="<?php echo $this->_tpl_vars['tproject_id']; ?>
" />
		<input type="submit" name="UploadFile" value="<?php echo lang_get_smarty(array('s' => 'btn_upload_file'), $this);?>
" />
		<input type="button" name="cancel" value="<?php echo lang_get_smarty(array('s' => 'btn_cancel'), $this);?>
" 
			onclick="javascript: location.href=fRoot+'lib/keywords/keywordsView.php';" />
	</div>
</form>

<?php if ($this->_tpl_vars['msg'] != ''): ?>
    <script type="text/javascript">
    alert("<?php echo $this->_tpl_vars['msg']; ?>
");
    </script>
<?php endif; ?>  

</div>

</body>
</html>