<?php /* Smarty version 2.6.26, created on 2010-10-09 10:26:33
         compiled from inc_help.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_help.tpl', 25, false),array('modifier', 'default', 'inc_help.tpl', 26, false),array('modifier', 'regex_replace', 'inc_help.tpl', 29, false),array('modifier', 'replace', 'inc_help.tpl', 29, false),array('modifier', 'escape', 'inc_help.tpl', 36, false),)), $this); ?>

<?php echo lang_get_smarty(array('s' => 'help','var' => 'img_alt'), $this);?>

<?php $this->assign('img_style', ((is_array($_tmp=@$this->_tpl_vars['inc_help_style'])) ? $this->_run_mod_handler('default', true, $_tmp, "vertical-align: top;") : smarty_modifier_default($_tmp, "vertical-align: top;"))); ?>
<?php echo lang_get_smarty(array('var' => 'help_text_raw','s' => $this->_tpl_vars['helptopic']), $this);?>

<?php $this->assign('help_text', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['help_text_raw'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[\r\t\n]/", ' ') : smarty_modifier_regex_replace($_tmp, "/[\r\t\n]/", ' ')))) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#39;") : smarty_modifier_replace($_tmp, "'", "&#39;")))) ? $this->_run_mod_handler('replace', true, $_tmp, "\"", "&quot;") : smarty_modifier_replace($_tmp, "\"", "&quot;")))) ? $this->_run_mod_handler('default', true, $_tmp, "Help: Localization/Text is missing.") : smarty_modifier_default($_tmp, "Help: Localization/Text is missing."))); ?>

<script type="text/javascript">
<!--
	var help_localized_text = "<img style='float: right' " +
		"src='<?php echo @TL_THEME_IMG_DIR; ?>
/x-icon.gif' " +
		"onclick='javascript: close_help();' /> <?php echo ((is_array($_tmp=$this->_tpl_vars['help_text'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
";
//-->
</script>  
<?php if ($this->_tpl_vars['show_help_icon'] !== false): ?>
<img alt="<?php echo $this->_tpl_vars['img_alt']; ?>
" style="<?php echo $this->_tpl_vars['img_style']; ?>
" 
	src="<?php echo @TL_THEME_IMG_DIR; ?>
/sym_question.gif" 
	onclick='javascript: show_help(help_localized_text);'
/>
<?php endif; ?>