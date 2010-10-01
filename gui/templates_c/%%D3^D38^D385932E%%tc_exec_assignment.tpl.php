<?php /* Smarty version 2.6.26, created on 2010-09-28 13:10:36
         compiled from plan/tc_exec_assignment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'plan/tc_exec_assignment.tpl', 16, false),array('function', 'html_options', 'plan/tc_exec_assignment.tpl', 63, false),array('modifier', 'escape', 'plan/tc_exec_assignment.tpl', 55, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'user_bulk_assignment,btn_do,check_uncheck_all_checkboxes,th_id,
                          btn_update_selected_tc,show_tcase_spec,can_not_execute,
                          send_mail_to_tester,platform,no_testcase_available,
                          exec_assign_no_testcase,warning,check_uncheck_children_checkboxes,
                          th_test_case,version,assigned_to,assign_to,note_keyword_filter, priority,
                          check_uncheck_all_tc
                          '), $this);?>


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
	var check_msg="<?php echo $this->_tpl_vars['labels']['exec_assign_no_testcase']; ?>
";
	var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
<?php echo '

function check_action_precondition(container_id,action)
{
	if(checkbox_count_checked(container_id) <= 0)
	{
		alert_message(alert_box_title,check_msg);
		return false;
	}
	return true;
}

'; ?>

</script>

</head>
   
<?php $this->assign('add_cb', 'achecked_tc'); ?>

<body class="fixedheader">
<form id='tc_exec_assignment' name='tc_exec_assignment' method='post'>

    <div id="header-wrap"> <!-- header-wrap -->
	<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
  <?php if ($this->_tpl_vars['gui']->has_tc): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'],'refresh' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div class="groupBtn">
		<div>
			<?php echo $this->_tpl_vars['labels']['check_uncheck_all_tc']; ?>

			<?php if ($this->_tpl_vars['gui']->usePlatforms): ?>
			<select id="select_platform">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->bulk_platforms), $this);?>

			</select>
			<?php else: ?>
			<input type="hidden" id="select_platform" value="0">
			<?php endif; ?>
			<button onclick="cs_all_checkbox_in_div_with_platform('tc_exec_assignment', '<?php echo $this->_tpl_vars['add_cb']; ?>
', Ext.get('select_platform').getValue()); return false"><?php echo $this->_tpl_vars['labels']['btn_do']; ?>
</button>
		</div>
		<div>
			<?php echo $this->_tpl_vars['labels']['user_bulk_assignment']; ?>

			<select name="bulk_tester_div"  id="bulk_tester_div">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->testers,'selected' => 0), $this);?>

			</select>
			<input type='button' name='bulk_user_assignment' id='bulk_user_assignment'
				onclick='if(check_action_precondition("tc_exec_assignment","default"))
						        set_combo_if_checkbox("tc_exec_assignment","tester_for_tcid_",Ext.get("bulk_tester_div").getValue())'
				value="<?php echo $this->_tpl_vars['labels']['btn_do']; ?>
" />
		</div>
		<div>
			<input type='submit' name='doAction' value='<?php echo $this->_tpl_vars['labels']['btn_update_selected_tc']; ?>
' />
			<span style="margin-left:20px;"><input type="checkbox" name="send_mail" id="send_mail" <?php echo $this->_tpl_vars['gui']->send_mail_checked; ?>
 />
			<?php echo $this->_tpl_vars['labels']['send_mail_to_tester']; ?>

			</span>
		</div>
	</div>
  <?php else: ?>
	  <div class="workBack"><?php echo $this->_tpl_vars['labels']['no_testcase_available']; ?>
</div>
  <?php endif; ?>
	</div> <!-- header-wrap -->

  <?php if ($this->_tpl_vars['gui']->has_tc): ?>
   <div class="workBack">
	  <?php $this->assign('top_level', $this->_tpl_vars['gui']->items[0]['level']); ?>
	  <?php $_from = $this->_tpl_vars['gui']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['div_drawing'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['div_drawing']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['ts']):
        $this->_foreach['div_drawing']['iteration']++;
?>
	    <?php $this->assign('ts_id', $this->_tpl_vars['ts']['testsuite']['id']); ?>
	    <?php $this->assign('div_id', "div_".($this->_tpl_vars['ts_id'])); ?>
	    <?php if ($this->_tpl_vars['ts_id'] != ''): ?>
	      <div id="<?php echo $this->_tpl_vars['div_id']; ?>
" style="margin-left:<?php echo $this->_tpl_vars['ts']['level']; ?>
0px; border:1;">
        <br />
        	      <h3 class="testlink"><img class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
			                            onclick='cs_all_checkbox_in_div("<?php echo $this->_tpl_vars['div_id']; ?>
","<?php echo $this->_tpl_vars['add_cb']; ?>
_","add_value_<?php echo $this->_tpl_vars['ts_id']; ?>
");'
                                  title="<?php echo $this->_tpl_vars['labels']['check_uncheck_children_checkboxes']; ?>
" />
        <?php echo ((is_array($_tmp=$this->_tpl_vars['ts']['testsuite']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	      </h3>

                <input type="hidden" name="add_value_<?php echo $this->_tpl_vars['ts_id']; ?>
"  id="add_value_<?php echo $this->_tpl_vars['ts_id']; ?>
"  value="0" />

    	  <?php if ($this->_tpl_vars['ts']['write_buttons'] == 'yes'): ?>
          <?php if ($this->_tpl_vars['ts']['testcase_qty'] > 0): ?>
            <table cellspacing="0" style="font-size:small;" width="100%">
            			      			      <tr style="background-color:#059; font-weight:bold; color:white">
			      	<td width="5" align="center">
			          <img class="clickable" src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
			               onclick='cs_all_checkbox_in_div("<?php echo $this->_tpl_vars['div_id']; ?>
","<?php echo $this->_tpl_vars['add_cb']; ?>
_<?php echo $this->_tpl_vars['ts_id']; ?>
_","add_value_<?php echo $this->_tpl_vars['ts_id']; ?>
");'
                     title="<?php echo $this->_tpl_vars['labels']['check_uncheck_all_checkboxes']; ?>
" />
			      	</td>
              <td class="tcase_id_cell"><?php echo $this->_tpl_vars['labels']['th_id']; ?>
</td> 
              <td><?php echo $this->_tpl_vars['labels']['th_test_case']; ?>
&nbsp;<?php echo $this->_tpl_vars['gsmarty_gui']->role_separator_open; ?>

              	<?php echo $this->_tpl_vars['labels']['version']; ?>
<?php echo $this->_tpl_vars['gsmarty_gui']->role_separator_close; ?>
</td>
              	
              <?php if ($this->_tpl_vars['gui']->platforms != ''): ?>
			      	  <td><?php echo $this->_tpl_vars['labels']['platform']; ?>
</td>
              <?php endif; ?>	
			      	<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
			      	  <td align="center"><?php echo $this->_tpl_vars['labels']['priority']; ?>
</td>
			      	<?php endif; ?>
              <td align="center">&nbsp;&nbsp;<?php echo $this->_tpl_vars['labels']['assigned_to']; ?>
</td>
              <td align="center">&nbsp;&nbsp;<?php echo $this->_tpl_vars['labels']['assign_to']; ?>
</td>
            </tr>
                  
            <?php $_from = $this->_tpl_vars['ts']['testcases']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tcase']):
?>
                            <?php $_from = $this->_tpl_vars['tcase']['feature_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['platform_id'] => $this->_tpl_vars['feature']):
?>
                <?php if ($this->_tpl_vars['tcase']['linked_version_id'] != 0): ?>
                  <?php $this->assign('userID', 0); ?>
           	    	<?php if (isset ( $this->_tpl_vars['tcase']['user_id'][$this->_tpl_vars['platform_id']] )): ?>
            	    	  <?php $this->assign('userID', $this->_tpl_vars['tcase']['user_id'][$this->_tpl_vars['platform_id']]); ?> 
                  <?php endif; ?> 
            	    <tr>
            	    	<td>
                    		<input type="checkbox"  name='<?php echo $this->_tpl_vars['add_cb']; ?>
[<?php echo $this->_tpl_vars['tcase']['id']; ?>
][<?php echo $this->_tpl_vars['platform_id']; ?>
]' align="middle"
                  			                        id='<?php echo $this->_tpl_vars['add_cb']; ?>
_<?php echo $this->_tpl_vars['ts_id']; ?>
_<?php echo $this->_tpl_vars['tcase']['id']; ?>
_<?php echo $this->_tpl_vars['platform_id']; ?>
' 
                    		                        value="<?php echo $this->_tpl_vars['tcase']['linked_version_id']; ?>
" />
                  			<input type="hidden" name="a_tcid[<?php echo $this->_tpl_vars['tcase']['id']; ?>
][<?php echo $this->_tpl_vars['platform_id']; ?>
]" 
                  			                     value="<?php echo $this->_tpl_vars['tcase']['linked_version_id']; ?>
" />
                  			<input type="hidden" name="has_prev_assignment[<?php echo $this->_tpl_vars['tcase']['id']; ?>
][<?php echo $this->_tpl_vars['platform_id']; ?>
]" 
                  			                     value="<?php echo $this->_tpl_vars['userID']; ?>
" />
                  			<input type="hidden" name="feature_id[<?php echo $this->_tpl_vars['tcase']['id']; ?>
][<?php echo $this->_tpl_vars['platform_id']; ?>
]" 
                  			                     value="<?php echo $this->_tpl_vars['tcase']['feature_id'][$this->_tpl_vars['platform_id']]; ?>
" />
            	    	</td>
            	    	<td>
            	    		<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->testCasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

            	    	</td>
            	    	<td title="<?php echo $this->_tpl_vars['labels']['show_tcase_spec']; ?>
">
            	    		&nbsp;<a href="javascript:openTCaseWindow(<?php echo $this->_tpl_vars['tcase']['id']; ?>
)"><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['tcase']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong></a>
            	    		&nbsp;<?php echo $this->_tpl_vars['gsmarty_gui']->role_separator_open; ?>
 <?php echo $this->_tpl_vars['tcase']['tcversions'][$this->_tpl_vars['tcase']['linked_version_id']]; ?>

            	    		<?php echo $this->_tpl_vars['gsmarty_gui']->role_separator_close; ?>

            	    	</td>
                    <?php if ($this->_tpl_vars['gui']->platforms != ''): ?>
			      	        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->platforms[$this->_tpl_vars['platform_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
                    <?php endif; ?>	

            	    	<?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
            	    		<td align="center"><?php if (isset ( $this->_tpl_vars['gui']->priority_labels[$this->_tpl_vars['tcase']['priority']] )): ?><?php echo $this->_tpl_vars['gui']->priority_labels[$this->_tpl_vars['tcase']['priority']]; ?>
<?php endif; ?></td>
            	    	<?php endif; ?>
            	    	<td align="center">
            	    	<?php if (isset ( $this->_tpl_vars['tcase']['user_id'][$this->_tpl_vars['platform_id']] )): ?>
            	    	  <?php $this->assign('userID', $this->_tpl_vars['tcase']['user_id'][$this->_tpl_vars['platform_id']]); ?> 
                                  	    		<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->users[$this->_tpl_vars['userID']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

            	    		<?php if ($this->_tpl_vars['gui']->users[$this->_tpl_vars['userID']] != '' && $this->_tpl_vars['gui']->testers[$this->_tpl_vars['userID']] == ''): ?><?php echo $this->_tpl_vars['labels']['can_not_execute']; ?>
<?php endif; ?>
            	    	<?php endif; ?>
            	    	</td>
                    <td align="center">
                  		  		<select name="tester_for_tcid[<?php echo $this->_tpl_vars['tcase']['id']; ?>
][<?php echo $this->_tpl_vars['platform_id']; ?>
]" 
                  		  		        id="tester_for_tcid_<?php echo $this->_tpl_vars['tcase']['id']; ?>
_<?php echo $this->_tpl_vars['platform_id']; ?>
"
                  		  		        onchange='javascript: set_checkbox("<?php echo $this->_tpl_vars['add_cb']; ?>
_<?php echo $this->_tpl_vars['ts_id']; ?>
_<?php echo $this->_tpl_vars['tcase']['id']; ?>
_<?php echo $this->_tpl_vars['platform_id']; ?>
",1)' >
                  			   	                  			   	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->testers,'selected' => $this->_tpl_vars['userID']), $this);?>

                  				  </select>
                    </td>
                  </tr>
                  <?php endif; ?>		
              <?php endforeach; endif; unset($_from); ?>            
              <?php if ($this->_tpl_vars['gui']->platforms != ''): ?>
                <td colspan="8"><hr></td>
              <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>           </table>
          <?php endif; ?>
      <?php endif; ?> 
      <?php if ($this->_tpl_vars['gui']->items_qty == $this->_foreach['div_drawing']['iteration']): ?>
          <?php $this->assign('next_level', 0); ?>
      <?php else: ?>
          <?php $this->assign('next_level', $this->_tpl_vars['gui']->items[$this->_foreach['div_drawing']['iteration']]['level']); ?>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['ts']['level'] >= $this->_tpl_vars['next_level']): ?>
          <?php $this->assign('max_loop', $this->_tpl_vars['next_level']); ?>
          <?php $this->assign('max_loop', $this->_tpl_vars['ts']['level']-$this->_tpl_vars['max_loop']+1); ?>
          <?php unset($this->_sections['div_closure']);
$this->_sections['div_closure']['name'] = 'div_closure';
$this->_sections['div_closure']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->support_array) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['div_closure']['max'] = (int)$this->_tpl_vars['max_loop'];
$this->_sections['div_closure']['show'] = true;
if ($this->_sections['div_closure']['max'] < 0)
    $this->_sections['div_closure']['max'] = $this->_sections['div_closure']['loop'];
$this->_sections['div_closure']['step'] = 1;
$this->_sections['div_closure']['start'] = $this->_sections['div_closure']['step'] > 0 ? 0 : $this->_sections['div_closure']['loop']-1;
if ($this->_sections['div_closure']['show']) {
    $this->_sections['div_closure']['total'] = min(ceil(($this->_sections['div_closure']['step'] > 0 ? $this->_sections['div_closure']['loop'] - $this->_sections['div_closure']['start'] : $this->_sections['div_closure']['start']+1)/abs($this->_sections['div_closure']['step'])), $this->_sections['div_closure']['max']);
    if ($this->_sections['div_closure']['total'] == 0)
        $this->_sections['div_closure']['show'] = false;
} else
    $this->_sections['div_closure']['total'] = 0;
if ($this->_sections['div_closure']['show']):

            for ($this->_sections['div_closure']['index'] = $this->_sections['div_closure']['start'], $this->_sections['div_closure']['iteration'] = 1;
                 $this->_sections['div_closure']['iteration'] <= $this->_sections['div_closure']['total'];
                 $this->_sections['div_closure']['index'] += $this->_sections['div_closure']['step'], $this->_sections['div_closure']['iteration']++):
$this->_sections['div_closure']['rownum'] = $this->_sections['div_closure']['iteration'];
$this->_sections['div_closure']['index_prev'] = $this->_sections['div_closure']['index'] - $this->_sections['div_closure']['step'];
$this->_sections['div_closure']['index_next'] = $this->_sections['div_closure']['index'] + $this->_sections['div_closure']['step'];
$this->_sections['div_closure']['first']      = ($this->_sections['div_closure']['iteration'] == 1);
$this->_sections['div_closure']['last']       = ($this->_sections['div_closure']['iteration'] == $this->_sections['div_closure']['total']);
?> </div> <?php endfor; endif; ?>
      <?php endif; ?>
      <?php if (($this->_foreach['div_drawing']['iteration'] == $this->_foreach['div_drawing']['total'])): ?></div> <?php endif; ?>
    
    <?php endif; ?> 	<?php endforeach; endif; unset($_from); ?>
	</div>
  <?php endif; ?>
  
</form>
</body>
</html>