<?php /* Smarty version 2.6.26, created on 2010-10-09 10:23:23
         compiled from mainPage.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'mainPage.tpl', 17, false),array('function', 'config_load', 'mainPage.tpl', 18, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp='mainPage.tpl')) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('popup' => 'yes','openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script language="JavaScript" src="<?php echo $this->_tpl_vars['basehref']; ?>
gui/niftycube/niftycube.js" type="text/javascript"></script>
<?php echo '
<script type="text/javascript">
window.onload=function()
{
    // Nifty("div.menu_bubble");
    if( typeof display_left_block_1 != \'undefined\')
    {
        display_left_block_1();
    }

    if( typeof display_left_block_2 != \'undefined\')
    {
        display_left_block_2();
    }

    if( typeof display_left_block_3 != \'undefined\')
    {
        display_left_block_3();
    }
    
    if( typeof display_left_block_4 != \'undefined\')
    {
        display_left_block_4();
    }

    display_left_block_5();

    if( typeof display_right_block_1 != \'undefined\')
    {
        display_right_block_1();
    }

    if( typeof display_right_block_2 != \'undefined\')
    {
        display_right_block_2();
    }

    if( typeof display_right_block_3 != \'undefined\')
    {
        display_right_block_3();
    }
   
}
</script>
'; ?>

</head>

<body>
<?php if ($this->_tpl_vars['gui']->securityNotes): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_msg_from_array.tpl", 'smarty_include_vars' => array('array_of_msg' => $this->_tpl_vars['gui']->securityNotes,'arg_css_class' => 'warning')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mainPageRight.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mainPageLeft.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>