<?php /* Smarty version 2.6.26, created on 2010-09-09 13:49:12
         compiled from testcases/tcSearchResults.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'dirname', 'testcases/tcSearchResults.tpl', 14, false),array('modifier', 'escape', 'testcases/tcSearchResults.tpl', 31, false),array('function', 'lang_get', 'testcases/tcSearchResults.tpl', 15, false),array('function', 'cycle', 'testcases/tcSearchResults.tpl', 28, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array('css_only' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</head>

<?php $this->assign('this_template_dir', ((is_array($_tmp='testcases/tcSearchResults.tpl')) ? $this->_run_mod_handler('dirname', true, $_tmp) : dirname($_tmp))); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'no_records_found,other_versions,version,title_test_case'), $this);?>


<body onLoad="viewElement(document.getElementById('other_versions'),false)">
<h1 class="title"><?php echo $this->_tpl_vars['gui']->pageTitle; ?>
</h1>

<div class="workBack">
<?php if ($this->_tpl_vars['gui']->warning_msg == ''): ?>
    <?php if ($this->_tpl_vars['gui']->resultSet): ?>
        <table class="simple">
        <?php $_from = $this->_tpl_vars['gui']->resultSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tcase']):
?>
            <?php $this->assign('tcase_id', $this->_tpl_vars['tcase']['testcase_id']); ?>
            <?php $this->assign('tcversion_id', $this->_tpl_vars['tcase']['tcversion_id']); ?>
           <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#eeeeee,#d0d0d0"), $this);?>
">       
            <td>
        	      <?php $_from = $this->_tpl_vars['gui']->path_info[$this->_tpl_vars['tcase_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['path_part']):
?>
        	          <?php echo ((is_array($_tmp=$this->_tpl_vars['path_part'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 /
        	      <?php endforeach; endif; unset($_from); ?>
        	  <a href="lib/testcases/archiveData.php?edit=testcase&id=<?php echo $this->_tpl_vars['tcase_id']; ?>
">
        	  <?php echo $this->_tpl_vars['gui']->tcasePrefix; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['tc_external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
            </td>
        	  </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
    <?php else: ?>
        	<?php echo $this->_tpl_vars['labels']['no_records_found']; ?>

    <?php endif; ?>
<?php else: ?>
    <?php echo $this->_tpl_vars['gui']->warning_msg; ?>

<?php endif; ?>   
</div>
</body>
</html>