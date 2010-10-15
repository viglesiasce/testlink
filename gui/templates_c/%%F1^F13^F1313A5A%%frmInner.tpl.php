<?php /* Smarty version 2.6.26, created on 2010-10-09 10:26:32
         compiled from frmInner.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'frmInner.tpl', 24, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['pageCharset']; ?>
" />
	<meta http-equiv="Content-language" content="en" />
	<meta http-equiv="expires" content="-1" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta name="generator" content="testlink" />
	<meta name="author" content="Martin Havlat" />
	<meta name="copyright" content="GNU" />
	<meta name="robots" content="NOFOLLOW" />
	<base href="<?php echo $this->_tpl_vars['basehref']; ?>
" />
	<title>TestLink Inner Frame</title>
	<style media="all" type="text/css">@import "<?php echo $this->_tpl_vars['css']; ?>
";</style>
</head>

<frameset cols="<?php echo ((is_array($_tmp=@$this->_tpl_vars['treewidth'])) ? $this->_run_mod_handler('default', true, $_tmp, "30%") : smarty_modifier_default($_tmp, "30%")); ?>
,*" border="5" 
          frameborder="10" framespacing="1">
	<frame src="<?php echo $this->_tpl_vars['treeframe']; ?>
" name="treeframe" scrolling="auto" />
	<frame src="<?php echo $this->_tpl_vars['workframe']; ?>
" name="workframe" scrolling="auto" />
</frameset>

</html>