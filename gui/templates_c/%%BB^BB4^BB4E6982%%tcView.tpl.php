<?php /* Smarty version 2.6.26, created on 2010-09-27 12:59:54
         compiled from testcases/tcView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'testcases/tcView.tpl', 16, false),array('function', 'lang_get', 'testcases/tcView.tpl', 17, false),array('modifier', 'escape', 'testcases/tcView.tpl', 134, false),)), $this); ?>

<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf"), $this);?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'no_records_found,other_versions,show_hide_reorder,version,title_test_case,match_count'), $this);?>


<?php $this->assign('showMode', $this->_tpl_vars['gui']->show_mode); ?>
<?php $this->assign('deleteStepAction', "lib/testcases/tcEdit.php?show_mode=".($this->_tpl_vars['showMode'])."&doAction=doDeleteStep&step_id="); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
/* All this stuff is needed for logic contained in inc_del_onclick.tpl */
var del_action=fRoot+'<?php echo $this->_tpl_vars['deleteStepAction']; ?>
';
</script>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array('css_only' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui']->bodyOnLoad != ''): ?>
<script language="JavaScript">
  var <?php echo $this->_tpl_vars['gui']->dialogName; ?>
 = new std_dialog('&refreshTree');
</script>  
<?php endif; ?>


<?php echo '
<script language="JavaScript">
function validateStepsReorder(formOID)
{
  // var formObj=document.getElementById(formOID);
	// var all_inputs = formObj.getElementsByTagName(\'input\');
	// var input_element;
	// var check_id=\'\';
	// var apieces=\'\';
	// var combo_id_suffix=\'\';
	// var cb_id= new Array();
	// var jdx=0;
	// var idx=0;
	// var step_set = new Array();	
  // 
	// // Build an array with the html select ids
	// alert(\'formsQty:\' + document.forms.length);
  // 
  // alert(document.forms[0].name);
  // alert(document.forms[1].name);
  // alert(document.forms[2].name);
  // alert(document.forms[2].id);
  // f=document.getElementById(document.forms[1].id);
	// all_inputs = formObj.getElementsByTagName(\'input\');
  // 
	// alert(\'validateStepsReorder\');
	// alert(formOID);
	// alert(formObj);
	// alert(all_inputs);
	// alert(all_inputs.length);
	// alert(formOID + \'::\' + formObj.getElementsByTagName(\'input\').length);
	// 
	// for(idx = 0; idx < all_inputs.length; idx++)
	// {
	//   input_element=all_inputs[idx];		
	//   alert(input_element.type + \':\' + input_element.name);
	// 	if(input_element.type == "text")
	// 	{
  //     step_set[jdx]=input_element.value;
  //     jdx++;
	// 	}	
	// }
	// alert(step_set);
  return true;
}	


// var sorted_arr = arr.sort(); // You can define the comparing function here. JS default uses a crappy string compare.
// var results = [];
// for (var i = 0; i < arr.length - 1; i += 1) {
//         if (sorted_arr[i + 1] == sorted_arr[i]) {
//                 results.push(sorted_arr[i]);
//         }
// }
</script>  
'; ?>


</head>

<?php $this->assign('my_style', ""); ?>
<?php if ($this->_tpl_vars['gui']->hilite_testcase_name): ?>
    <?php $this->assign('my_style', "background:#059; color:white; margin:0px 0px 4px 0px;padding:3px;"); ?>
<?php endif; ?>

<body onLoad="viewElement(document.getElementById('other_versions'),false);<?php echo $this->_tpl_vars['gui']->bodyOnLoad; ?>
" onUnload="<?php echo $this->_tpl_vars['gui']->bodyOnUnload; ?>
">
<h1 class="title"><?php echo $this->_tpl_vars['gui']->pageTitle; ?>
<?php if ($this->_tpl_vars['gui']->show_match_count): ?> - <?php echo $this->_tpl_vars['labels']['match_count']; ?>
:<?php echo $this->_tpl_vars['gui']->match_count; ?>
<?php endif; ?>
</h1>
<?php if (! isset ( $this->_tpl_vars['gui']->refresh_tree )): ?>
  <?php $this->assign('refresh_tree', false); ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="workBack">

<?php if ($this->_tpl_vars['gui']->tc_current_version): ?>
<?php unset($this->_sections['idx']);
$this->_sections['idx']['name'] = 'idx';
$this->_sections['idx']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->tc_current_version) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['idx']['show'] = true;
$this->_sections['idx']['max'] = $this->_sections['idx']['loop'];
$this->_sections['idx']['step'] = 1;
$this->_sections['idx']['start'] = $this->_sections['idx']['step'] > 0 ? 0 : $this->_sections['idx']['loop']-1;
if ($this->_sections['idx']['show']) {
    $this->_sections['idx']['total'] = $this->_sections['idx']['loop'];
    if ($this->_sections['idx']['total'] == 0)
        $this->_sections['idx']['show'] = false;
} else
    $this->_sections['idx']['total'] = 0;
if ($this->_sections['idx']['show']):

            for ($this->_sections['idx']['index'] = $this->_sections['idx']['start'], $this->_sections['idx']['iteration'] = 1;
                 $this->_sections['idx']['iteration'] <= $this->_sections['idx']['total'];
                 $this->_sections['idx']['index'] += $this->_sections['idx']['step'], $this->_sections['idx']['iteration']++):
$this->_sections['idx']['rownum'] = $this->_sections['idx']['iteration'];
$this->_sections['idx']['index_prev'] = $this->_sections['idx']['index'] - $this->_sections['idx']['step'];
$this->_sections['idx']['index_next'] = $this->_sections['idx']['index'] + $this->_sections['idx']['step'];
$this->_sections['idx']['first']      = ($this->_sections['idx']['iteration'] == 1);
$this->_sections['idx']['last']       = ($this->_sections['idx']['iteration'] == $this->_sections['idx']['total']);
?>

		<?php $this->assign('tcID', $this->_tpl_vars['gui']->tc_current_version[$this->_sections['idx']['index']][0]['testcase_id']); ?>

        <?php if ($this->_tpl_vars['gui']->testcase_other_versions[$this->_sections['idx']['index']] != null): ?>
        <?php $this->assign('my_delete_version', 'yes'); ?>
    <?php else: ?>
        <?php $this->assign('my_delete_version', 'no'); ?>
    <?php endif; ?>
  
    <h2 style="<?php echo $this->_tpl_vars['my_style']; ?>
">
	  <?php echo $this->_tpl_vars['toggle_direct_link_img']; ?>
 &nbsp;
	  <?php if ($this->_tpl_vars['gui']->display_testcase_path): ?>
	      <?php $_from = $this->_tpl_vars['gui']->path_info[$this->_tpl_vars['tcID']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['path_part']):
?>
	          <?php echo ((is_array($_tmp=$this->_tpl_vars['path_part'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 /
	      <?php endforeach; endif; unset($_from); ?>
	      	  <?php endif; ?>
    <?php if ($this->_tpl_vars['gui']->show_title == 'no'): ?>
	    <?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tc_current_version[$this->_sections['idx']['index']][0]['tc_external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tc_current_version[$this->_sections['idx']['index']][0]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
    <?php endif; ?>
    <div class="direct_link" style='display:none'><a href="<?php echo $this->_tpl_vars['gui']->direct_link; ?>
" target="_blank"><?php echo $this->_tpl_vars['gui']->direct_link; ?>
</a></div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "testcases/tcView_viewer.tpl", 'smarty_include_vars' => array('args_testcase' => $this->_tpl_vars['gui']->tc_current_version[$this->_sections['idx']['index']][0],'args_keywords_map' => $this->_tpl_vars['gui']->keywords_map[$this->_sections['idx']['index']],'args_reqs' => $this->_tpl_vars['gui']->arrReqs[$this->_sections['idx']['index']],'args_status_quo' => $this->_tpl_vars['gui']->status_quo[$this->_sections['idx']['index']],'args_can_do' => $this->_tpl_vars['gui']->can_do,'args_can_move_copy' => 'yes','args_can_delete_testcase' => 'yes','args_can_delete_version' => $this->_tpl_vars['my_delete_version'],'args_show_version' => 'yes','args_show_title' => $this->_tpl_vars['gui']->show_title,'args_activate_deactivate_name' => 'activate','args_activate_deactivate' => 'bnt_activate','args_cf' => $this->_tpl_vars['gui']->cf[$this->_sections['idx']['index']],'args_tcase_cfg' => $this->_tpl_vars['gui']->tcase_cfg,'args_users' => $this->_tpl_vars['gui']->users,'args_tproject_name' => $this->_tpl_vars['gui']->tprojectName,'args_tsuite_name' => $this->_tpl_vars['gui']->parentTestSuiteName,'args_linked_versions' => $this->_tpl_vars['gui']->linked_versions[$this->_sections['idx']['index']],'args_has_testplans' => $this->_tpl_vars['gui']->has_testplans)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		
		<?php $this->assign('bDownloadOnly', false); ?>
		<?php if ($this->_tpl_vars['gui']->can_do->edit != 'yes'): ?>
			<?php $this->assign('bDownloadOnly', true); ?>
		<?php endif; ?>
		
		<?php if (! isset ( $this->_tpl_vars['gui']->loadOnCancelURL )): ?>
 	      <?php $this->assign('loadOnCancelURL', ""); ?>
    <?php endif; ?> 
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_attachments.tpl", 'smarty_include_vars' => array('attach_id' => $this->_tpl_vars['tcID'],'attach_tableName' => 'nodes_hierarchy','attach_attachmentInfos' => $this->_tpl_vars['gui']->attachments[$this->_tpl_vars['tcID']],'attach_downloadOnly' => $this->_tpl_vars['bDownloadOnly'],'attach_loadOnCancelURL' => $this->_tpl_vars['gui']->loadOnCancelURL)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		         
	    <?php if ($this->_tpl_vars['gui']->testcase_other_versions[$this->_sections['idx']['index']] != null): ?>
        <?php $this->assign('vid', $this->_tpl_vars['gui']->tc_current_version[$this->_sections['idx']['index']][0]['id']); ?>
        <?php $this->assign('div_id', "vers_".($this->_tpl_vars['vid'])); ?>
        <?php $this->assign('memstatus_id', "mem_".($this->_tpl_vars['div_id'])); ?>
  
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_hide_mgmt.tpl", 'smarty_include_vars' => array('show_hide_container_title' => $this->_tpl_vars['labels']['other_versions'],'show_hide_container_id' => $this->_tpl_vars['div_id'],'show_hide_container_draw' => false,'show_hide_container_class' => 'exec_additional_info','show_hide_container_view_status_id' => $this->_tpl_vars['memstatus_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
               
        <div id="vers_<?php echo $this->_tpl_vars['vid']; ?>
" class="workBack">
        
  	    <?php $_from = $this->_tpl_vars['gui']->testcase_other_versions[$this->_sections['idx']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['my_testcase']):
?>

            <?php $this->assign('version_num', $this->_tpl_vars['my_testcase']['version']); ?>
            <?php $this->assign('title', $this->_tpl_vars['labels']['version']); ?>
            <?php $this->assign('title', ($this->_tpl_vars['title'])." ".($this->_tpl_vars['version_num'])); ?>
            
            <?php $this->assign('sep', '_'); ?>
            <?php $this->assign('div_id', "v_".($this->_tpl_vars['vid'])); ?>
            <?php $this->assign('div_id', ($this->_tpl_vars['div_id']).($this->_tpl_vars['sep']).($this->_tpl_vars['version_num'])); ?>
            <?php $this->assign('memstatus_id', "mem_".($this->_tpl_vars['div_id'])); ?>
           
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_show_hide_mgmt.tpl", 'smarty_include_vars' => array('show_hide_container_title' => $this->_tpl_vars['title'],'show_hide_container_id' => $this->_tpl_vars['div_id'],'show_hide_container_draw' => false,'show_hide_container_class' => 'exec_additional_info','show_hide_container_view_status_id' => $this->_tpl_vars['memstatus_id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	          <div id="<?php echo $this->_tpl_vars['div_id']; ?>
" class="workBack">
				      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "testcases/tcView_viewer.tpl", 'smarty_include_vars' => array('args_testcase' => $this->_tpl_vars['my_testcase'],'args_keywords_map' => $this->_tpl_vars['gui']->keywords_map[$this->_sections['idx']['index']],'args_reqs' => $this->_tpl_vars['gui']->arrReqs[$this->_sections['idx']['index']],'args_status_quo' => $this->_tpl_vars['gui']->status_quo[$this->_sections['idx']['index']],'args_can_do' => $this->_tpl_vars['gui']->can_do,'args_can_move_copy' => 'no','args_can_delete_testcase' => 'no','args_can_delete_version' => 'yes','args_show_version' => 'no','args_show_title' => 'no','args_users' => $this->_tpl_vars['gui']->users,'args_cf' => $this->_tpl_vars['gui']->cf[$this->_sections['idx']['index']],'args_linked_versions' => null,'args_has_testplans' => $this->_tpl_vars['gui']->has_testplans)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  	         </div>
  	         <br />
  	         
		    <?php endforeach; endif; unset($_from); ?>
		    </div>
  
      	      	      	<?php echo '
      	<script type="text/javascript">
      	'; ?>

 	  	      viewElement(document.getElementById('vers_<?php echo $this->_tpl_vars['vid']; ?>
'),false);
    	  		<?php $_from = $this->_tpl_vars['gui']->testcase_other_versions[$this->_sections['idx']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['my_testcase']):
?>
  	  	      viewElement(document.getElementById('v_<?php echo $this->_tpl_vars['vid']; ?>
_<?php echo $this->_tpl_vars['my_testcase']['version']; ?>
'),false);
			      <?php endforeach; endif; unset($_from); ?>
      	<?php echo '
      	</script>
      	'; ?>

      	    <?php endif; ?>
    <br>
<?php endfor; endif; ?>
<?php else: ?>
  <?php if (isset ( $this->_tpl_vars['gui']->warning_msg )): ?>
	  <?php echo $this->_tpl_vars['gui']->warning_msg; ?>

	<?php else: ?>
	  <?php echo $this->_tpl_vars['labels']['no_records_found']; ?>

	<?php endif; ?>
<?php endif; ?>

</div>
<?php if ($this->_tpl_vars['gui']->refreshTree): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
</body>
</html>