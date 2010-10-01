<?php /* Smarty version 2.6.26, created on 2010-09-24 17:53:19
         compiled from inc_login_title.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'inc_login_title.tpl', 9, false),)), $this); ?>
<div class="fullpage_head">
<p><img alt="Company logo" title="logo" style="width: 115px; height: 53px;" 
	src="<?php echo @TL_THEME_IMG_DIR; ?>
<?php echo $this->_tpl_vars['tlCfg']->company_logo; ?>
" />
	<br />TestLink <?php echo ((is_array($_tmp=$this->_tpl_vars['tlVersion'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
</div>