<?php /* Smarty version 2.6.26, created on 2010-10-09 10:23:27
         compiled from inc_jsCfieldsValidation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_jsCfieldsValidation.tpl', 9, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'cf_warning_msg','s' => "warning_numeric_cf,warning_float_cf,warning_email_cf,warning_text_area_cf"), $this);?>


<script type="text/javascript" src='gui/javascript/cfield_validation.js'></script>

<?php echo '
<script type="text/javascript">
'; ?>

var cfMessages= new Object;
cfMessages.warning_numeric_cf="<?php echo $this->_tpl_vars['cf_warning_msg']['warning_numeric_cf']; ?>
";
cfMessages.warning_float_cf="<?php echo $this->_tpl_vars['cf_warning_msg']['warning_float_cf']; ?>
";
cfMessages.warning_email_cf="<?php echo $this->_tpl_vars['cf_warning_msg']['warning_email_cf']; ?>
";
cfMessages.warning_text_area_cf="<?php echo $this->_tpl_vars['cf_warning_msg']['warning_text_area_cf']; ?>
";


var cfChecks = new Object;
cfChecks.email = <?php echo $this->_tpl_vars['tlCfg']->validation_cfg->user_email_valid_regex_js; ?>
;
cfChecks.textarea_length = <?php echo $this->_tpl_vars['tlCfg']->custom_fields->max_length; ?>
;
<?php echo '
</script>
'; ?>