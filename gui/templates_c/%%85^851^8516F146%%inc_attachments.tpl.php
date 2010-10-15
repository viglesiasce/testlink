<?php /* Smarty version 2.6.26, created on 2010-10-09 10:26:36
         compiled from inc_attachments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_attachments.tpl', 29, false),array('function', 'localize_date', 'inc_attachments.tpl', 72, false),array('modifier', 'escape', 'inc_attachments.tpl', 67, false),)), $this); ?>
<?php echo lang_get_smarty(array('s' => 'warning_delete_attachment','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php echo '
<script type="text/javascript">
'; ?>

var warning_delete_attachment = "<?php echo lang_get_smarty(array('s' => 'warning_delete_attachment'), $this);?>
";
<?php if (isset ( $this->_tpl_vars['attach_loadOnCancelURL'] )): ?>
 	var attachment_reloadOnCancelURL = '<?php echo $this->_tpl_vars['attach_loadOnCancelURL']; ?>
';
<?php endif; ?> 
<?php echo '
</script>
'; ?>


<?php if ($this->_tpl_vars['gsmarty_attachments']->enabled == FALSE): ?>
 	  <div class="messages"><?php echo lang_get_smarty(array('s' => 'attachment_feature_disabled'), $this);?>
<p>
    <?php echo $this->_tpl_vars['gsmarty_attachments']->disabled_msg; ?>

    </div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['gsmarty_attachments']->enabled && ( $this->_tpl_vars['attach_attachmentInfos'] != "" || $this->_tpl_vars['attach_show_upload_btn'] )): ?>

<table class="<?php echo $this->_tpl_vars['attach_tableClassName']; ?>
" <?php if ($this->_tpl_vars['attach_inheritStyle'] == 0): ?> style="<?php echo $this->_tpl_vars['attach_tableStyles']; ?>
" <?php endif; ?>>

 	<?php if ($this->_tpl_vars['attach_show_title']): ?>
	<tr>
		<td class="bold"><?php echo lang_get_smarty(array('s' => 'attached_files'), $this);?>
<?php echo $this->_tpl_vars['tlCfg']->gui_title_separator_1; ?>
</td>
	</tr>
 	<?php endif; ?>

	<?php $_from = $this->_tpl_vars['attach_attachmentInfos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
		<?php if ($this->_tpl_vars['info']['title'] == ""): ?>
			<?php if ($this->_tpl_vars['gsmarty_attachments']->action_on_display_empty_title == 'show_icon'): ?>
				<?php $this->assign('my_link', $this->_tpl_vars['gsmarty_attachments']->access_icon); ?>
			<?php else: ?>
				<?php $this->assign('my_link', $this->_tpl_vars['gsmarty_attachments']->access_string); ?>
		<?php endif; ?>
		<?php else: ?>
			<?php $this->assign('my_link', ((is_array($_tmp=$this->_tpl_vars['info']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>
		<?php endif; ?>

	  	<tr>
			<td style="vertical-align:middle;"><a href="lib/attachments/attachmentdownload.php?id=<?php echo $this->_tpl_vars['info']['id']; ?>
" target="_blank" class="bold">
			<?php echo $this->_tpl_vars['my_link']; ?>
</a> - <span class="italic"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['file_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 (<?php echo ((is_array($_tmp=$this->_tpl_vars['info']['file_size'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 bytes, <?php echo ((is_array($_tmp=$this->_tpl_vars['info']['file_type'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
) <?php echo localize_date_smarty(array('d' => ((is_array($_tmp=$this->_tpl_vars['info']['date_added'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))), $this);?>
</span>
				<?php if (! $this->_tpl_vars['attach_downloadOnly']): ?>
				<a href="javascript:delete_confirmation(<?php echo $this->_tpl_vars['info']['id']; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['info']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
					                                '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['del_msgbox_title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
','<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['warning_msg'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',deleteAttachment_onClick);">
					<img style="border:none;" alt="<?php echo lang_get_smarty(array('s' => 'alt_delete_attachment'), $this);?>
"
				                         title="<?php echo lang_get_smarty(array('s' => 'alt_delete_attachment'), $this);?>
"
				                         src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash.png" /></a>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>

  <?php if ($this->_tpl_vars['attach_show_upload_btn'] && ! $this->_tpl_vars['attach_downloadOnly']): ?>
  <tr>
  	<td colspan="2">
  	<input type="button" value="<?php echo lang_get_smarty(array('s' => 'upload_file_new_file'), $this);?>
" 
  	       onclick="openFileUploadWindow(<?php echo $this->_tpl_vars['attach_id']; ?>
,'<?php echo $this->_tpl_vars['attach_tableName']; ?>
')" /></td>
  </tr>
  <?php endif; ?>

</table>
<?php endif; ?>