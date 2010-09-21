<?php /* Smarty version 2.6.26, created on 2010-09-03 15:40:37
         compiled from plan/planEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'plan/planEdit.tpl', 15, false),array('function', 'config_load', 'plan/planEdit.tpl', 62, false),array('modifier', 'basename', 'plan/planEdit.tpl', 61, false),array('modifier', 'replace', 'plan/planEdit.tpl', 61, false),array('modifier', 'escape', 'plan/planEdit.tpl', 64, false),array('modifier', 'dirname', 'plan/planEdit.tpl', 112, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "warning,warning_empty_tp_name,testplan_title_edit,public,
             testplan_th_name,testplan_th_notes,testplan_question_create_tp_from,
             opt_no,testplan_th_active,btn_testplan_create,btn_upd,cancel,
             show_event_history,testplan_txt_notes"), $this);?>




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
var warning_empty_tp_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_tp_name']; ?>
";
<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.testplan_name.value))
  {
      alert_message(alert_box_title,warning_empty_tp_name);
      selectField(f, \'testplan_name\');
      return false;
  }
  return true;
}


function manage_copy_ctrls(container_id,display_control_value,hide_value)
{
 o_container=document.getElementById(container_id);

 if( display_control_value == hide_value )
 {
   o_container.style.display=\'none\';
 }
 else
 {
    o_container.style.display=\'\';
 }
}
</script>
'; ?>

</head>

<body>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='plan/planEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $this->assign('form_action', 'create'); ?>
	<?php if ($this->_tpl_vars['gui']->tplan_id != 0): ?>
		<h2>
		<?php echo $this->_tpl_vars['labels']['testplan_title_edit']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testplan_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		<?php $this->assign('form_action', 'update'); ?>
		<?php if ($this->_tpl_vars['gui']->grants->mgt_view_events == 'yes'): ?>
			<img style="margin-left:5px;" class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/question.gif" 
			     onclick="showEventHistoryFor('<?php echo $this->_tpl_vars['gui']->tplan_id; ?>
','testplans')" alt="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
" 
			     title="<?php echo $this->_tpl_vars['labels']['show_event_history']; ?>
"/>
		<?php endif; ?>
		</h2>
	<?php endif; ?>

	<form method="post" name="testplan_mgmt" id="testplan_mgmt"
	      action="lib/plan/planEdit.php?action=<?php echo $this->_tpl_vars['form_action']; ?>
"
	      onSubmit="javascript:return validateForm(this);">

	<input type="hidden" id="tplan_id" name="tplan_id" value="<?php echo $this->_tpl_vars['gui']->tplan_id; ?>
" />
	<table class="common" width="80%">

		<tr><th style="background:none;"><?php echo $this->_tpl_vars['labels']['testplan_th_name']; ?>
</th>
			<td><input type="text" name="testplan_name"
			           size="<?php echo $this->_config[0]['vars']['TESTPLAN_NAME_SIZE']; ?>
"
			           maxlength="<?php echo $this->_config[0]['vars']['TESTPLAN_NAME_MAXLEN']; ?>
"
			           value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testplan_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
  				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'testplan_name')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
		<tr><th style="background:none;"><?php echo $this->_tpl_vars['labels']['testplan_th_notes']; ?>
</th>
			<td ><?php echo $this->_tpl_vars['gui']->notes; ?>
</td>
		</tr>
		<?php if ($this->_tpl_vars['gui']->tplan_id == 0): ?>
			<?php if ($this->_tpl_vars['gui']->tplans): ?>
				<tr><th style="background:none;"><?php echo $this->_tpl_vars['labels']['testplan_question_create_tp_from']; ?>
</th>
				<td>
				<select name="copy_from_tplan_id"
				        onchange="manage_copy_ctrls('copy_controls',this.value,'0')">
				<option value="0"><?php echo $this->_tpl_vars['labels']['opt_no']; ?>
</option>
				<?php $_from = $this->_tpl_vars['gui']->tplans; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['testplan']):
?>
					<option value="<?php echo $this->_tpl_vars['testplan']['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['testplan']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>

			      <div id="copy_controls" style="display:none;">
			      <?php $this->assign('this_template_dir', ((is_array($_tmp='plan/planEdit.tpl')) ? $this->_run_mod_handler('dirname', true, $_tmp) : dirname($_tmp))); ?>
			      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['this_template_dir'])."/inc_controls_planEdit.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			      </div>
				</td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>
			<tr>
				<th style="background:none;"><?php echo $this->_tpl_vars['labels']['testplan_th_active']; ?>
</th>
				  <td>
					  <input type="checkbox" name="active" <?php if ($this->_tpl_vars['gui']->is_active == 1): ?>	checked="checked"	<?php endif; ?>	/>
      	  </td>
      </tr>
			<tr>
				<th style="background:none;"><?php echo $this->_tpl_vars['labels']['public']; ?>
</th>
				  <td>
					  <input type="checkbox" name="is_public" <?php if ($this->_tpl_vars['gui']->is_public == 1): ?>	checked="checked"	<?php endif; ?>	/>
      	  </td>
      </tr>

	  <?php if ($this->_tpl_vars['gui']->cfields != ''): ?>
	  <tr>
	    <td  colspan="2">
     <div class="custom_field_container">
     <?php echo $this->_tpl_vars['gui']->cfields; ?>

     </div>
	    </td>
	  </tr>
	  <?php endif; ?>
	</table>

	<div class="groupBtn">

				<?php if ($this->_tpl_vars['gui']->tplan_id == 0): ?>
		  <input type="hidden" name="do_action" value="do_create" />
		  <input type="submit" name="do_create" value="<?php echo $this->_tpl_vars['labels']['btn_testplan_create']; ?>
"
		         onclick="do_action.value='do_create'"/>
		<?php else: ?>

		  <input type="hidden" name="do_action" value="do_update" />
		  <input type="submit" name="do_update" value="<?php echo $this->_tpl_vars['labels']['btn_upd']; ?>
"
		         onclick="do_action.value='do_update'"/>

		<?php endif; ?>

		<input type="button" name="go_back" value="<?php echo $this->_tpl_vars['labels']['cancel']; ?>
"
		                     onclick="javascript: location.href=fRoot+'lib/plan/planView.php';" />

	</div>

	</form>

<p><?php echo $this->_tpl_vars['labels']['testplan_txt_notes']; ?>
</p>

</div>


</body>
</html>