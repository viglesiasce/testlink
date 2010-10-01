<?php /* Smarty version 2.6.26, created on 2010-09-27 15:34:50
         compiled from results/resultsNavigator.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/resultsNavigator.tpl', 9, false),array('function', 'config_load', 'results/resultsNavigator.tpl', 13, false),array('function', 'html_options', 'results/resultsNavigator.tpl', 46, false),array('modifier', 'replace', 'results/resultsNavigator.tpl', 12, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "title_nav_results,title_report_type,btn_print,test_plan,show_inactive_tplans"), $this);?>


<?php $this->assign('cfg_section', ((is_array($_tmp='results/resultsNavigator.tpl')) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<?php echo '
<script type="text/javascript">
function reportPrint(){
	parent["workframe"].focus();
	parent["workframe"].print();
}

function pre_submit()
{
 document.getElementById(\'called_url\').value=parent.workframe.location;
 return true;
}
</script>
'; ?>

</head>

<body>

<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_nav_results']; ?>
</h1>

<div style="margin:0px; padding:0px;">
<form method="get" id="resultsNavigator" onSubmit="javascript:return pre_submit();">
	<input type="hidden" id="called_by_me" name="called_by_me" value="1" />
	<input type="hidden" id="called_url" name="called_url" value="" />

	<div class="menu_bar">
		<span><?php echo $this->_tpl_vars['labels']['title_report_type']; ?>

		<select name="format" onchange="this.form.submit();">
		    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['arrReportTypes'],'selected' => $this->_tpl_vars['selectedReportType']), $this);?>

		</select>
		</span>

		<span style="margin-left:20px;"><input type="button" name="print" value="<?php echo $this->_tpl_vars['labels']['btn_print']; ?>
" 
			onclick="javascript: reportPrint();" style="margin-left:5px;" /></span>
	</div>

	<div style="margin:3px" >
		<span style="padding-right: 10px"><?php echo $this->_tpl_vars['labels']['test_plan']; ?>
 
		<select name="tplan_id" onchange="pre_submit();this.form.submit()">
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->tplans,'selected' => $this->_tpl_vars['gui']->tplan_id), $this);?>

		</select>
		</span>
		<br>
				<span><?php echo $this->_tpl_vars['labels']['show_inactive_tplans']; ?>

		<input type="checkbox" <?php echo $this->_tpl_vars['gui']->checked_show_inactive_tplans; ?>
 onclick="this.form.submit();" 
		       id="show_inactive_tplans" name="show_inactive_tplans" >
		</span>
		
	</div>
</form>
</div>

<div style="margin:3px; padding: 15px 0px" >
<?php if ($this->_tpl_vars['gui']->do_report['status_ok']): ?>
  <?php $_from = $this->_tpl_vars['gui']->menuItems; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
    <span><img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	    <a href="<?php echo $this->_tpl_vars['menu']['href']; ?>
format=<?php echo $this->_tpl_vars['selectedReportType']; ?>
&amp;tplan_id=<?php echo $this->_tpl_vars['gui']->tplan_id; ?>
" 
	       target="workframe"><?php echo $this->_tpl_vars['menu']['name']; ?>
</a></span><br />
  
  <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
  <?php echo $this->_tpl_vars['gui']->do_report['msg']; ?>

<?php endif; ?>
</div>


<script type="text/javascript">
<?php if ($this->_tpl_vars['gui']->workframe != ''): ?>
	parent.workframe.location='<?php echo $this->_tpl_vars['gui']->workframe; ?>
';
<?php endif; ?>
</script>

</body>
</html>