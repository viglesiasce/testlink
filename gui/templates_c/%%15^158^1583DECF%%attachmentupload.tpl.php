<?php /* Smarty version 2.6.26, created on 2010-09-20 09:44:31
         compiled from attachmentupload.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'attachmentupload.tpl', 9, false),array('function', 'config_load', 'attachmentupload.tpl', 22, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'title_upload_attachment,enter_attachment_title,btn_upload_file,
             local_file,attachment_upload_ok,title_choose_local_file,btn_cancel,max_size_file_upload'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('jsValidate' => 'yes','openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<script type="text/javascript">
var alert_box_title = "<?php echo lang_get_smarty(array('s' => 'warning'), $this);?>
";
var warning_empty_title = "<?php echo lang_get_smarty(array('s' => 'enter_attachment_title'), $this);?>
";
</script>
<body onunload="attachmentDlg_onUnload()" onload="attachmentDlg_onLoad()">
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'attachmentupload'), $this);?>


<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_upload_attachment']; ?>
</h1>
<?php if ($this->_tpl_vars['gui']->uploaded == 1): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['labels']['attachment_upload_ok'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<div class="workBack">
	<h2><?php echo $this->_tpl_vars['labels']['title_choose_local_file']; ?>
</h2>
	
	<form action="lib/attachments/attachmentupload.php" method="post" enctype="multipart/form-data" id="aForm">
		<p><?php echo $this->_tpl_vars['labels']['local_file']; ?>

			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $this->_tpl_vars['gui']->import_limit; ?>
" /> 			<input type="file" name="uploadedFile" size="<?php echo $this->_config[0]['vars']['UPLOAD_FILENAME_SIZE']; ?>
" />
		</p>
		<p>
			<?php echo $this->_tpl_vars['labels']['enter_attachment_title']; ?>
:
			<input type="text" id="title" name="title" maxlength="<?php echo $this->_config[0]['vars']['ATTACHMENT_TITLE_MAXLEN']; ?>
" 
			       size="<?php echo $this->_config[0]['vars']['ATTACHMENT_TITLE_SIZE']; ?>
" />
		</p>
		<div class="groupBtn">
			<input type="submit" value="<?php echo $this->_tpl_vars['labels']['btn_upload_file']; ?>
" onclick="return attachmentDlg_onSubmit(<?php echo $this->_tpl_vars['gsmarty_attachments']->allow_empty_title; ?>
)" />
			<input type="button" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
" onclick="window.close()" />
		</div>
	</form>
	<p>
		<?php echo $this->_tpl_vars['labels']['max_size_file_upload']; ?>
: <?php echo $this->_tpl_vars['gui']->import_limit; ?>
 Bytes
	</p>
	<?php if ($this->_tpl_vars['gui']->msg != ''): ?>
		<p class="bold" style="color:red"><?php echo $this->_tpl_vars['gui']->msg; ?>
</p>
	<?php endif; ?>
</div>

</body>
</html>