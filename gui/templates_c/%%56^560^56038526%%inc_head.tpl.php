<?php /* Smarty version 2.6.26, created on 2010-10-09 10:23:22
         compiled from inc_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'inc_head.tpl', 32, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
     "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['pageCharset']; ?>
" />
	<meta http-equiv="Content-language" content="en" />
	<meta http-equiv="expires" content="-1" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta name="author" content="Martin Havlat" />
	<meta name="copyright" content="GNU" />
	<meta name="robots" content="NOFOLLOW" />
	<base href="<?php echo $this->_tpl_vars['basehref']; ?>
"/>
	<title><?php echo ((is_array($_tmp=@$this->_tpl_vars['pageTitle'])) ? $this->_run_mod_handler('default', true, $_tmp, 'TestLink') : smarty_modifier_default($_tmp, 'TestLink')); ?>
</title>
	<link rel="icon" href="<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @TL_THEME_IMG_DIR; ?>
favicon.ico" type="image/x-icon" />
	
 
	<style media="all" type="text/css">@import "<?php echo $this->_tpl_vars['css']; ?>
";</style>
	<?php if ($this->_tpl_vars['testproject_coloring'] == 'background'): ?>
  	<style type="text/css"> body {background: <?php echo $this->_tpl_vars['testprojectColor']; ?>
;}</style>
	<?php endif; ?>
  
	<style media="print" type="text/css">@import "<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @TL_PRINT_CSS; ?>
";</style>

 
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/javascript/testlink_library.js" language="javascript"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/javascript/test_automation.js" language="javascript"></script>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
third_party/prototype/prototype.js" language="javascript"></script>
	<?php if ($this->_tpl_vars['jsValidate'] == 'yes'): ?> 
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/javascript/validate.js" language="javascript"></script>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_jsCfieldsValidation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
   
	<?php if ($this->_tpl_vars['editorType'] == 'tinymce'): ?>
    <script type="text/javascript" language="javascript"
    	src="<?php echo $this->_tpl_vars['basehref']; ?>
third_party/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_tinymce_init.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>

	<?php if (@TL_SORT_TABLE_ENGINE == 'kryogenix.org'): ?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/javascript/sorttable.js" 
		language="javascript"></script>
	<?php endif; ?>

	<script type="text/javascript" language="javascript">
	<!--
	var fRoot = '<?php echo $this->_tpl_vars['basehref']; ?>
';
	var menuUrl = '<?php echo $this->_tpl_vars['menuUrl']; ?>
';
	var args  = '<?php echo $this->_tpl_vars['args']; ?>
';
	var additionalArgs  = '<?php echo $this->_tpl_vars['additionalArgs']; ?>
';
	
	// To solve problem diplaying help
	var SP_html_help_file  = '<?php echo $this->_tpl_vars['SP_html_help_file']; ?>
';
	
	//attachment related JS-Stuff
	var attachmentDlg_refWindow = null;
	var attachmentDlg_refLocation = null;
	var attachmentDlg_bNoRefresh = false;
	
	// bug management (using logic similar to attachment)
	var bug_dialog = new bug_dialog();

	// for ext js
	var extjsLocation = '<?php echo @TL_EXTJS_RELATIVE_PATH; ?>
';
	
	//-->
	</script> 
<?php if ($this->_tpl_vars['openHead'] == 'no'): ?> </head>
<?php endif; ?>