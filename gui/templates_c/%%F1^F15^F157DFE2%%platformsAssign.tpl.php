<?php /* Smarty version 2.6.26, created on 2010-09-28 13:26:28
         compiled from platforms/platformsAssign.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'platforms/platformsAssign.tpl', 6, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "title_platforms,menu_assign_platform_to_testplan,
             platform_unlink_warning_title,platform_unlink_warning_message,
             platform_assignment_no_testplan,btn_save"), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript" src="gui/javascript/OptionTransfer.js" type="text/javascript"></script>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>

<?php if ($this->_tpl_vars['gui']->can_do): ?>
  <script type="text/javascript" language="JavaScript">
<?php echo $this->_tpl_vars['gui']->platform_count_js; ?>


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


/* Checks if any of the removed platforms has linked testcases.
 * If that is the case, a warning dialog is displayed
 *
 * 20091201 - Eloff - Added transferLeft function
 */
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.transferLeft=<?php echo 'function(){
	options = this.right.options;
	num_with_linked_to_move = 0;
	for(idx=0; idx<options.length; idx++) {
		if(options[idx].selected && platform_count_map[options[idx].text] > 0) {
			num_with_linked_to_move++;
		}
	}
  // Trying to remove platforms with linked TCs. Show warning/confirm dialog
	if (num_with_linked_to_move > 0) {
		function callback(btn,text)
		{
			if (btn == "yes") {
				moveSelectedOptions(this.right,this.left,this.autoSort,this.staticOptionRegex); this.update();
			}
		}
		Ext.Msg.confirm("'; ?>
<?php echo $this->_tpl_vars['labels']['platform_unlink_warning_title']; ?>
<?php echo '",
		                "'; ?>
<?php echo $this->_tpl_vars['labels']['platform_unlink_warning_message']; ?>
<?php echo '", callback, this);
	}
	else {
		// this is the default call from option transfer
		moveSelectedOptions(this.right,this.left,this.autoSort,this.staticOptionRegex); this.update();
	}
};
'; ?>

  </script>
<?php endif; ?>
</head>

<body <?php if ($this->_tpl_vars['gui']->can_do): ?> onLoad="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.init(document.forms[0])" <?php endif; ?>>

<div class="workBack">
	<h1 class="title"><?php echo $this->_tpl_vars['gui']->mainTitle; ?>
</h1>

<?php if ($this->_tpl_vars['gui']->warning != ''): ?>
    <?php echo $this->_tpl_vars['gui']->warning; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->can_do): ?>
		<div style="margin-top: 25px;">
			<form method="post" action="lib/platforms/platformsAssign.php?tplan_id=<?php echo $this->_tpl_vars['gui']->tplan_id; ?>
">
			  <input type="hidden" name="doAction" value="">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "opt_transfer.inc.tpl", 'smarty_include_vars' => array('option_transfer' => $this->_tpl_vars['opt_cfg'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<br />
				<input type="submit" name="doAssignPlatforms" value="<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
" 
				       onclick="doAction.value='doAssignPlatforms'"	/>
			</form>
		</div>
	<?php else: ?>
	  <?php echo $this->_tpl_vars['labels']['platform_assignment_no_testplan']; ?>

	<?php endif; ?>
</div>
</body>
</html>