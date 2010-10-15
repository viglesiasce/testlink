<?php /* Smarty version 2.6.26, created on 2010-10-09 10:23:22
         compiled from main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'main.tpl', 14, false),array('modifier', 'default', 'main.tpl', 15, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['pageCharset']; ?>
" />
	<meta http-equiv="Content-language" content="en" />
	<meta name="generator" content="testlink" />
	<meta name="author" content="TestLink Development Team" />
	<meta name="copyright" content="TestLink Development Team" />
	<meta name="robots" content="NOFOLLOW" />
	<title>TestLink <?php echo ((is_array($_tmp=$this->_tpl_vars['tlVersion'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>
	<meta name="description" content="TestLink - <?php echo ((is_array($_tmp=@$this->_tpl_vars['title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Main page') : smarty_modifier_default($_tmp, 'Main page')); ?>
" />
	<link rel="icon" href="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @TL_THEME_IMG_DIR; ?>
favicon.ico" type="image/x-icon" />
</head>

<frameset rows="70,*" frameborder="0" framespacing="0">
	<frame src="<?php echo $this->_tpl_vars['titleframe']; ?>
" name="titlebar" scrolling="no" noresize="noresize" />
	<frame src="<?php echo $this->_tpl_vars['mainframe']; ?>
" scrolling='auto' name='mainframe' />
	<noframes>
		<body>TestLink required a frames supporting browser.</body>
	</noframes>
</frameset>

</html>