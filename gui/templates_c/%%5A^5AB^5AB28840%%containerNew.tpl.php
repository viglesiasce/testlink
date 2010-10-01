<?php /* Smarty version 2.6.26, created on 2010-09-27 13:22:48
         compiled from testcases/containerNew.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/containerNew.tpl', 15, false),array('function', 'config_load', 'testcases/containerNew.tpl', 58, false),array('modifier', 'escape', 'testcases/containerNew.tpl', 60, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "warning_empty_testsuite_name,title_create,tc_keywords,
             warning,btn_create_testsuite"), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script language="JavaScript" src="gui/javascript/OptionTransfer.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
var <?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
 = new OptionTransfer("<?php echo $this->_tpl_vars['opt_cfg']->from->name; ?>
","<?php echo $this->_tpl_vars['opt_cfg']->to->name; ?>
");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveRemovedLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveRemovedRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedRight");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveAddedLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveAddedRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedRight");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveNewLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveNewRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newRight");
</script>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
'; ?>

var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_container_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_testsuite_name']; ?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.container_name.value)) 
  {
      alert_message(alert_box_title,warning_empty_container_name);
      selectField(f, \'container_name\');
      return false;
  }
  
  return true;
}
</script>
'; ?>


</head>

<body onLoad="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.init(document.forms[0]);focusInputField('name')">
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'containerEdit'), $this);?>
 
<h1 class="title"><?php echo $this->_tpl_vars['parent_info']['description']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['parent_info']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_create']; ?>
 <?php echo lang_get_smarty(array('s' => $this->_tpl_vars['level']), $this);?>
</h1>
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'],'user_feedback' => $this->_tpl_vars['user_feedback'],'item' => $this->_tpl_vars['level'],'action' => 'add','name' => $this->_tpl_vars['name'],'refresh' => $_SESSION['setting_refresh_tree_on_action'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<form method="post" action="lib/testcases/containerEdit.php?containerID=<?php echo $this->_tpl_vars['containerID']; ?>
"
	      name="container_new" id="container_new"
        onSubmit="javascript:return validateForm(this);">


	<div style="font-weight: bold;">
		<div style="float: right;">
		        		<input type="hidden" name="add_testsuite" id="add_testsuite" />
			<input type="submit" name="add_testsuite_button" value="<?php echo $this->_tpl_vars['labels']['btn_create_testsuite']; ?>
" />
		</div>	
	  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "testcases/inc_testsuite_viewer_rw.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

      <?php if ($this->_tpl_vars['cf'] != ""): ?>
     <br />
     <div id="cfields_design_time" class="custom_field_container">
     <?php echo $this->_tpl_vars['cf']; ?>

     </div>
   <?php endif; ?>
   
  	 <br />
   <div>
   <a href=<?php echo $this->_tpl_vars['gsmarty_href_keywordsView']; ?>
><?php echo $this->_tpl_vars['labels']['tc_keywords']; ?>
</a>
	 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "opt_transfer.inc.tpl", 'smarty_include_vars' => array('option_transfer' => $this->_tpl_vars['opt_cfg'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	 </div>

</div>
</form>
</body>
</html>