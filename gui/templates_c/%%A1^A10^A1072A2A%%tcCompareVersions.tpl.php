<?php /* Smarty version 2.6.26, created on 2010-09-10 09:54:55
         compiled from testcases/tcCompareVersions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/tcCompareVersions.tpl', 12, false),array('function', 'counter', 'testcases/tcCompareVersions.tpl', 137, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "select_versions,title_compare_versions_tc,version,compare,modified,modified_by,
          btn_compare_selected_versions, context, show_all,
          warning_context, warning_context_range, warning_empty_context, warning, warning_selected_versions, warning_same_selected_versions"), $this);?>


<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['basehref']; ?>
third_party/diff/diff.css">

<script type="text/javascript">

var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_context = "<?php echo $this->_tpl_vars['labels']['warning_empty_context']; ?>
";
var warning_context_range = "<?php echo $this->_tpl_vars['labels']['warning_context_range']; ?>
";
var warning_selected_versions = "<?php echo $this->_tpl_vars['labels']['warning_selected_versions']; ?>
";
var warning_same_selected_versions = "<?php echo $this->_tpl_vars['labels']['warning_same_selected_versions']; ?>
";
var warning_context = "<?php echo $this->_tpl_vars['labels']['warning_context']; ?>
";

<?php echo '

function triggerTextfield(field)
{
	if (field.disabled == true) {
    	field.disabled = false;
	} else {
    	field.disabled = true;
	}
}

function valButton(btn) {
    var cnt = -1;
    for (var i=btn.length-1; i > -1; i--) {
        if (btn[i].checked) {
        	cnt = i;
        	i = -1;
        }
    }
    if (cnt > -1) {
    	return true;
    }
    else {
    	return false;
    }
}

function validateForm() {
	if (isWhitespace(document.tc_compare_versions.context.value)) {
	    alert_message(alert_box_title,warning_empty_context);
		return false;
	} else {
		value = parseInt(document.tc_compare_versions.context.value);
		if (isNaN(value))
		{
		   	alert_message(alert_box_title,warning_context);
		   	return false;
		} else if (value < 0) {
			alert_message(alert_box_title,warning_context_range);
		   	return false;
		}
	}
	
	if (!valButton(document.tc_compare_versions.version_left)
			|| !valButton(document.tc_compare_versions.version_right)) {
		alert_message(alert_box_title,warning_selected_versions);
		return false;
	}
	
	for (var i=document.tc_compare_versions.version_left.length-1; i > -1; i--) {
        if (document.tc_compare_versions.version_left[i].checked && document.tc_compare_versions.version_right[i].checked) {
        	alert_message(alert_box_title,warning_same_selected_versions);
        	return false;
        }
    }
}

</script>
'; ?>


</head>
<body>

<?php if ($this->_tpl_vars['gui']->compare_selected_versions): ?>

	<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_compare_versions_tc']; ?>
</h1> 
			
	<h2><?php echo $this->_tpl_vars['gui']->subtitle; ?>
</h2>
			
	<?php $_from = $this->_tpl_vars['gui']->diff_array; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['diff']):
?>
	<?php $this->assign('diff', $this->_tpl_vars['diff']); ?>
		
		<div class="workBack" style="width:99%; overflow:auto;">	
		
		<h2><?php echo $this->_tpl_vars['diff']['heading']; ?>
</h2>
		
		<fieldset class="x-fieldset x-form-label-left" >
		
		<legend class="legend_container" ><?php echo $this->_tpl_vars['diff']['message']; ?>
</legend>
		
		<?php if ($this->_tpl_vars['diff']['count'] > 0): ?>
			<?php echo $this->_tpl_vars['diff']['diff']; ?>

		<?php endif; ?>
		
		</fieldset>
		</div>
		
	<?php endforeach; endif; unset($_from); ?>
	</div>	
<?php else: ?>

	<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_compare_versions_tc']; ?>
</h1> 
	
	<div class="workBack" style="width:97%;">
	
	<form target="diffwindow" method="post" action="lib/testcases/tcCompareVersions.php" name="tc_compare_versions" 
			onsubmit="return validateForm();" />
	
	<p><input type="submit" name="compare_selected_versions" value="<?php echo $this->_tpl_vars['labels']['btn_compare_selected_versions']; ?>
" /></p><br/>
		
	<p><table border="0" cellspacing="0" cellpadding="3" style="font-size:small;" width="100%">
	
	    <tr style="background-color:blue;font-weight:bold;color:white">
	        <th width="12px" style="font-weight: bold; text-align: center;"><?php echo $this->_tpl_vars['labels']['version']; ?>
</td>
	        <th width="12px" style="font-weight: bold; text-align: center;">&nbsp;<?php echo $this->_tpl_vars['labels']['compare']; ?>
</td>
	        <th style="font-weight: bold; text-align: center;"><?php echo $this->_tpl_vars['labels']['modified']; ?>
</td>
	        <th style="font-weight: bold; text-align: center;"><?php echo $this->_tpl_vars['labels']['modified_by']; ?>
</td>
	    </tr>
	
	<?php echo smarty_function_counter(array('assign' => 'mycount'), $this);?>

	<?php $_from = $this->_tpl_vars['gui']->tc_versions; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tc']):
?>
		<?php $this->assign('tc', $this->_tpl_vars['tc']); ?>
	
	   <tr>
	        <td style="text-align: center;"><?php echo $this->_tpl_vars['tc']['version']; ?>
</td>
	        <td style="text-align: center;"><input type="radio" name="version_left" value="<?php echo $this->_tpl_vars['tc']['version']; ?>
" 
	        <?php if ($this->_tpl_vars['mycount'] == 2): ?>
	        	 checked="checked"
	        <?php endif; ?>
	        />
	        		<input type="radio" name="version_right" value="<?php echo $this->_tpl_vars['tc']['version']; ?>
" 
	        		<?php if ($this->_tpl_vars['mycount'] == 1): ?>
	        		 checked="checked"
	        		<?php endif; ?>
	        		/></td>
	        <?php if ($this->_tpl_vars['tc']['modification_ts'] != "0000-00-00 00:00:00"): ?>
	        	<td style="text-align: center;"><?php echo $this->_tpl_vars['tc']['modification_ts']; ?>
</td>
	        	<td style="text-align: center;"><?php echo $this->_tpl_vars['tc']['author_first_name']; ?>
 <?php echo $this->_tpl_vars['tc']['author_last_name']; ?>
</td>
	        <?php else: ?>
	        	<td style="text-align: center;"><?php echo $this->_tpl_vars['tc']['creation_ts']; ?>
</td>
	        	<td style="text-align: center;"><?php echo $this->_tpl_vars['tc']['author_first_name']; ?>
 <?php echo $this->_tpl_vars['tc']['author_last_name']; ?>
</td>
	        <?php endif; ?>
	        
	    </tr>
	<?php echo smarty_function_counter(array(), $this);?>

	<?php endforeach; endif; unset($_from); ?>
	
	</table></p><br/>
	
	<p><?php echo $this->_tpl_vars['labels']['context']; ?>
 <input type="text" name="context" id="context" maxlength="4" size="4" value="<?php echo $this->_tpl_vars['gui']->context; ?>
" />
	<input type="checkbox" id="context_show_all" name="context_show_all" 
	onclick="triggerTextfield(this.form.context);" /> <?php echo $this->_tpl_vars['labels']['show_all']; ?>
 </p><br/>
	
	<p><input type="hidden" name="testcase_id" value="<?php echo $this->_tpl_vars['gui']->tc_id; ?>
" />
	<input type="submit" name="compare_selected_versions" value="<?php echo $this->_tpl_vars['labels']['btn_compare_selected_versions']; ?>
" /></p>
	
	</form>

	</div>

<?php endif; ?>

</body>

</html>