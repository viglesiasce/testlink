<?php /* Smarty version 2.6.26, created on 2010-09-30 15:46:36
         compiled from requirements/reqTcAssign.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'requirements/reqTcAssign.tpl', 18, false),array('modifier', 'replace', 'requirements/reqTcAssign.tpl', 18, false),array('modifier', 'escape', 'requirements/reqTcAssign.tpl', 53, false),array('modifier', 'strip_tags', 'requirements/reqTcAssign.tpl', 101, false),array('modifier', 'strip', 'requirements/reqTcAssign.tpl', 101, false),array('modifier', 'truncate', 'requirements/reqTcAssign.tpl', 101, false),array('function', 'config_load', 'requirements/reqTcAssign.tpl', 19, false),array('function', 'lang_get', 'requirements/reqTcAssign.tpl', 21, false),array('function', 'html_options', 'requirements/reqTcAssign.tpl', 68, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='requirements/reqTcAssign.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => "please_select_a_req,test_case,req_title_assign,btn_close,
             warning_req_tc_assignment_impossible,req_spec,warning,
             req_title_assigned,check_uncheck_all_checkboxes,
             req_msg_norequirement,btn_unassign,req_title_unassigned,
             check_uncheck_all_checkboxes,req_msg_norequirement,btn_assign"), $this);?>

          
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_jsCheckboxes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
	var please_select_a_req="<?php echo $this->_tpl_vars['labels']['please_select_a_req']; ?>
";
	var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
<?php echo '

function check_action_precondition(form_id,action)
{
	if(checkbox_count_checked(form_id) <= 0)
	{
		alert_message(alert_box_title,please_select_a_req);
		return false;
	}
	return true;
}
</script>
'; ?>

</head>

<body>

<h1 class="title">
	<?php echo $this->_tpl_vars['labels']['test_case']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tcTitle)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_requirementsCoverage','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>

<div class="workBack">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['gui']->arrReqSpec == ""): ?>
   <?php echo $this->_tpl_vars['labels']['warning_req_tc_assignment_impossible']; ?>

<?php else: ?>

  <h2><?php echo $this->_tpl_vars['labels']['req_title_assign']; ?>
</h2>
  <form id="SRS_switch" name="SRS_switch" method="post">
    <p><span class="labelHolder"><?php echo $this->_tpl_vars['labels']['req_spec']; ?>
</span>
  	<select name="idSRS" onchange="form.submit()">
  		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->arrReqSpec,'selected' => $this->_tpl_vars['gui']->selectedReqSpec), $this);?>

  	</select>
  </form>
</div>

<div class="workBack">
  <h2><?php echo $this->_tpl_vars['labels']['req_title_assigned']; ?>
</h2>
  <?php if ($this->_tpl_vars['gui']->arrAssignedReq != ""): ?>
    <form id="reqList" method="post">
    <div id="div_assigned_req">
 	           <input type="hidden" name="memory_assigned_req"
                            id="memory_assigned_req"  value="0" />

    <input type="hidden" name="idSRS" value="<?php echo $this->_tpl_vars['gui']->selectedReqSpec; ?>
" />
    <table class="simple">
    	<tr>
      		<th align="center"  style="width: 5px;background-color:#005498;">
      		    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
      		             onclick='cs_all_checkbox_in_div("div_assigned_req","assigned_req","memory_assigned_req");'
      		             title="<?php echo $this->_tpl_vars['labels']['check_uncheck_all_checkboxes']; ?>
" />
      		</th>
    		<th><?php echo lang_get_smarty(array('s' => 'req_doc_id'), $this);?>
</th>
    		<th><?php echo lang_get_smarty(array('s' => 'req'), $this);?>
</th>
    		<th><?php echo lang_get_smarty(array('s' => 'scope'), $this);?>
</th>
    	</tr>
    	<?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->arrAssignedReq) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
    	<tr>
    		<td><input type="checkbox" id="assigned_req<?php echo $this->_tpl_vars['gui']->arrAssignedReq[$this->_sections['row']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['gui']->arrAssignedReq[$this->_sections['row']['index']]['id']; ?>
"
    		                           name="req_id[<?php echo $this->_tpl_vars['gui']->arrAssignedReq[$this->_sections['row']['index']]['id']; ?>
]" /></td>
    		<td><span class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->arrAssignedReq[$this->_sections['row']['index']]['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span></td>
    		<td><span class="bold"><a href="lib/requirements/reqView.php?requirement_id=<?php echo $this->_tpl_vars['gui']->arrAssignedReq[$this->_sections['row']['index']]['id']; ?>
">
    			<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->arrAssignedReq[$this->_sections['row']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span></td>
    		<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->arrAssignedReq[$this->_sections['row']['index']]['scope'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['SCOPE_SHORT_TRUNCATE']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['SCOPE_SHORT_TRUNCATE'])); ?>
</td>
    	</tr>
    	<?php endfor; else: ?>
    	<tr><td></td><td><span class="bold"><?php echo $this->_tpl_vars['labels']['req_msg_norequirement']; ?>
</span></td></tr>
    	<?php endif; ?>
    </table>
   	</div>

    <?php if ($this->_sections['row']['total'] > 0): ?>
    	<div class="groupBtn">
    		<input type="submit" name="unassign" value="<?php echo $this->_tpl_vars['labels']['btn_unassign']; ?>
"
    		       onclick="return check_action_precondition('reqList','unassign');"/>
    	</div>
    <?php endif; ?>
  </form>
  <?php endif; ?>

  </div>


    <?php if ($this->_tpl_vars['gui']->arrUnassignedReq != ""): ?>
      <div class="workBack">
      <h2><?php echo $this->_tpl_vars['labels']['req_title_unassigned']; ?>
</h2>
      <form id="reqList2" method="post">

       <div id="div_free_req">
 	            <input type="hidden" name="memory_free_req"
                            id="memory_free_req"  value="0" />

      <input type="hidden" name="idSRS" value="<?php echo $this->_tpl_vars['gui']->selectedReqSpec; ?>
" />
      <table class="simple">
      	<tr>
      		<th align="center"  style="width: 5px;background-color:#005498;">
      		    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
      		             onclick='cs_all_checkbox_in_div("div_free_req",
      		                                             "free_req","memory_free_req");'
      		             title="<?php echo $this->_tpl_vars['labels']['check_uncheck_all_checkboxes']; ?>
" />
      		</th>
      		<th><?php echo lang_get_smarty(array('s' => 'req_doc_id'), $this);?>
</th>
      		<th><?php echo lang_get_smarty(array('s' => 'req'), $this);?>
</th>
      		<th><?php echo lang_get_smarty(array('s' => 'scope'), $this);?>
</th>
      	</tr>
      	<?php unset($this->_sections['row2']);
$this->_sections['row2']['name'] = 'row2';
$this->_sections['row2']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->arrUnassignedReq) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row2']['show'] = true;
$this->_sections['row2']['max'] = $this->_sections['row2']['loop'];
$this->_sections['row2']['step'] = 1;
$this->_sections['row2']['start'] = $this->_sections['row2']['step'] > 0 ? 0 : $this->_sections['row2']['loop']-1;
if ($this->_sections['row2']['show']) {
    $this->_sections['row2']['total'] = $this->_sections['row2']['loop'];
    if ($this->_sections['row2']['total'] == 0)
        $this->_sections['row2']['show'] = false;
} else
    $this->_sections['row2']['total'] = 0;
if ($this->_sections['row2']['show']):

            for ($this->_sections['row2']['index'] = $this->_sections['row2']['start'], $this->_sections['row2']['iteration'] = 1;
                 $this->_sections['row2']['iteration'] <= $this->_sections['row2']['total'];
                 $this->_sections['row2']['index'] += $this->_sections['row2']['step'], $this->_sections['row2']['iteration']++):
$this->_sections['row2']['rownum'] = $this->_sections['row2']['iteration'];
$this->_sections['row2']['index_prev'] = $this->_sections['row2']['index'] - $this->_sections['row2']['step'];
$this->_sections['row2']['index_next'] = $this->_sections['row2']['index'] + $this->_sections['row2']['step'];
$this->_sections['row2']['first']      = ($this->_sections['row2']['iteration'] == 1);
$this->_sections['row2']['last']       = ($this->_sections['row2']['iteration'] == $this->_sections['row2']['total']);
?>
      	<tr>
      		<td><input type="checkbox"
      		           id="free_req<?php echo $this->_tpl_vars['gui']->arrUnassignedReq[$this->_sections['row2']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['gui']->arrUnassignedReq[$this->_sections['row2']['index']]['id']; ?>
"
      		           name="req_id[<?php echo $this->_tpl_vars['gui']->arrUnassignedReq[$this->_sections['row2']['index']]['id']; ?>
]" /></td>

      		<td><span class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->arrUnassignedReq[$this->_sections['row2']['index']]['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span></td>
      		<td><span class="bold"><a href="lib/requirements/reqView.php?requirement_id=<?php echo $this->_tpl_vars['gui']->arrUnassignedReq[$this->_sections['row2']['index']]['id']; ?>
">
      			<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->arrUnassignedReq[$this->_sections['row2']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span></td>
      		<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->arrUnassignedReq[$this->_sections['row2']['index']]['scope'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['SCOPE_SHORT_TRUNCATE']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['SCOPE_SHORT_TRUNCATE'])); ?>
</td>
      	</tr>
      	<?php endfor; else: ?>
      	<tr><td></td><td><span class="bold"><?php echo $this->_tpl_vars['labels']['req_msg_norequirement66']; ?>
</span></td></tr>
      	<?php endif; ?>
      </table>
	  </div>
      <div class="groupBtn">
      	<input type="submit" name="assign" value="<?php echo $this->_tpl_vars['labels']['btn_assign']; ?>
"
     		       onclick="return check_action_precondition('reqList2','assign');"/>
      </div>
      </form>
      </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['gui']->showCloseButton): ?>
	<form name="closeMe">
		<div class="groupBtn">
			<input type="button" value="<?php echo $this->_tpl_vars['labels']['btn_close']; ?>
" onclick="window.close()" />
		</div>
	</form>
<?php endif; ?>
</body>
</html>