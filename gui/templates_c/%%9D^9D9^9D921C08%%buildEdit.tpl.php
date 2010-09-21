<?php /* Smarty version 2.6.26, created on 2010-09-07 23:01:49
         compiled from plan/buildEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'plan/buildEdit.tpl', 25, false),array('function', 'config_load', 'plan/buildEdit.tpl', 56, false),array('function', 'localize_date', 'plan/buildEdit.tpl', 97, false),array('function', 'html_select_date', 'plan/buildEdit.tpl', 105, false),array('function', 'html_options', 'plan/buildEdit.tpl', 127, false),array('modifier', 'basename', 'plan/buildEdit.tpl', 55, false),array('modifier', 'replace', 'plan/buildEdit.tpl', 55, false),array('modifier', 'escape', 'plan/buildEdit.tpl', 58, false),)), $this); ?>
<?php $this->assign('managerURL', "lib/plan/buildEdit.php"); ?>
<?php $this->assign('cancelAction', "lib/plan/buildView.php"); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "warning,warning_empty_build_name,enter_build,enter_build_notes,active,
             open,builds_description,cancel,release_date,closure_date,closed_on_date,
             copy_tester_assignments, assignment_source_build,show_event_history"), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes','editorType' => $this->_tpl_vars['gui']->editorType)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
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
var warning_empty_build_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_build_name']; ?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.build_name.value)) 
  {
      alert_message(alert_box_title,warning_empty_build_name);
      selectField(f, \'build_name\');
      return false;
  }
  return true;
}
</script>
'; ?>

</head>


<body onload="showOrHideElement('closure_date',<?php echo $this->_tpl_vars['gui']->is_open; ?>
)">
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='plan/buildEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback,'result' => $this->_tpl_vars['sqlResult'],'item' => 'build')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div> 
	<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->operation_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		<?php if ($this->_tpl_vars['gui']->mgt_view_events == 'yes' && $this->_tpl_vars['gui']->build_id > 0): ?>
				<img style="margin-left:5px;" class="clickable" 
				     src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['gui']->build_id; ?>
','builds')" 
				     alt="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
" title="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
"/>
		<?php endif; ?>
	</h2>
	<form method="post" id="create_build" name="create_build" 
	      action="<?php echo $this->_tpl_vars['managerURL']; ?>
" onSubmit="javascript:return validateForm(this);">
	      
	<table class="common" style="width:80%">
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['enter_build']; ?>
</th>
			<td><input type="text" name="build_name" id="build_name" 
			           maxlength="<?php echo $this->_config[0]['vars']['BUILD_NAME_MAXLEN']; ?>
" 
			           value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->build_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="<?php echo $this->_config[0]['vars']['BUILD_NAME_SIZE']; ?>
"/>
			  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'build_name')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
		<tr><th style="background:none;"><?php echo $this->_tpl_vars['labels']['enter_build_notes']; ?>
</th>
			<td><?php echo $this->_tpl_vars['gui']->notes; ?>
</td>
		</tr>
		<tr><th style="background:none;"><?php echo $this->_tpl_vars['labels']['active']; ?>
</th>
		    <td><input type="checkbox"  name="is_active" id="is_active"  
		               <?php if ($this->_tpl_vars['gui']->is_active == 1): ?> checked <?php endif; ?> />
        </td>
		</tr>
    <tr>
		    <th style="background:none;"><?php echo $this->_tpl_vars['labels']['open']; ?>
</th>
		    <td><input type="checkbox"  name="is_open" id="is_open"  
		               <?php if ($this->_tpl_vars['gui']->is_open == 1): ?> checked <?php endif; ?> 
		               onclick="showOrHideElement('closure_date',this.checked)"/>
            <span id="closure_date" style="display:none;"><?php echo $this->_tpl_vars['labels']['closed_on_date']; ?>
: <?php echo localize_date_smarty(array('d' => $this->_tpl_vars['gui']->closed_on_date), $this);?>
</span>
            <input type="hidden" name="closed_on_date" value=<?php echo $this->_tpl_vars['gui']->closed_on_date; ?>
>
        </td>
		</tr>

    <tr>
		    <th style="background:none;"><?php echo $this->_tpl_vars['labels']['release_date']; ?>
</th>
		    <td>
		    <?php echo smarty_function_html_select_date(array('prefix' => 'release_date_','time' => $this->_tpl_vars['gui']->release_date,'month_format' => '%m','end_year' => "+1",'day_value_format' => "%02d",'all_empty' => ' ','month_empty' => ' ','field_order' => $this->_tpl_vars['gsmarty_html_select_date_field_order']), $this);?>

        </td>
		</tr>

			<?php if (! $this->_tpl_vars['gui']->build_id && $this->_tpl_vars['gui']->source_build['build_count']): ?>
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['copy_tester_assignments']; ?>
</th>
			<td>
				<input type="checkbox"  name="copy_tester_assignments" id="copy_tester_assignments"
				       <?php if ($this->_tpl_vars['gui']->copy_tester_assignments): ?> checked <?php endif; ?> 
				       onclick="showOrHideElement('source_build_selection',!this.checked)"
				/>
				<span id="source_build_selection"
				<?php if (! $this->_tpl_vars['gui']->copy_tester_assignments): ?> style="display:none;" <?php endif; ?> >
					<?php echo $this->_tpl_vars['labels']['assignment_source_build']; ?>

					<select name="source_build_id">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->source_build['items'],'selected' => $this->_tpl_vars['gui']->source_build['selected']), $this);?>

					</select>
				</span>
			</td>
		</tr>
    <?php endif; ?>
    
	</table>
	<p><?php echo $this->_tpl_vars['labels']['builds_description']; ?>
</p>
	<div class="groupBtn">	

    		<input type="hidden" name="do_action" value="<?php echo $this->_tpl_vars['gui']->buttonCfg->name; ?>
" />
		<input type="hidden" name="build_id" value="<?php echo $this->_tpl_vars['gui']->build_id; ?>
" />
		
		<input type="submit" name="<?php echo $this->_tpl_vars['gui']->buttonCfg->name; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->buttonCfg->value)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"
				   onclick="do_action.value='<?php echo $this->_tpl_vars['gui']->buttonCfg->name; ?>
'"/>
		<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
" 
		       onclick="javascript: location.href=fRoot+'<?php echo $this->_tpl_vars['cancelAction']; ?>
';"/>

	</div>
	</form>
</div>
</div>
</body>
</html>