<?php /* Smarty version 2.6.26, created on 2010-09-27 13:53:03
         compiled from cfields/cfieldsTprojectAssign.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'cfields/cfieldsTprojectAssign.tpl', 17, false),array('function', 'config_load', 'cfields/cfieldsTprojectAssign.tpl', 26, false),array('function', 'html_options', 'cfields/cfieldsTprojectAssign.tpl', 76, false),array('modifier', 'basename', 'cfields/cfieldsTprojectAssign.tpl', 25, false),array('modifier', 'replace', 'cfields/cfieldsTprojectAssign.tpl', 25, false),array('modifier', 'escape', 'cfields/cfieldsTprojectAssign.tpl', 29, false),)), $this); ?>
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
</head>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'name,label,display_order,location,cfields_active,testproject,btn_assign,
             cfields_tproject_assign,title_assigned_cfields,check_uncheck_all_checkboxes,
             available_on,type,
             manage_cfield,btn_unassign,btn_cfields_active_mgmt,btn_cfields_display_order,
             btn_cfields_display_attr,title_available_cfields'), $this);?>


<body>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='cfields/cfieldsTprojectAssign.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title">
<?php echo $this->_tpl_vars['labels']['cfields_tproject_assign']; ?>
<?php echo @TITLE_SEP_TYPE2; ?>
<?php echo $this->_tpl_vars['labels']['testproject']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tproject_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</h1>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'],'action' => $this->_tpl_vars['action'],'item' => 'custom_field')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php if ($this->_tpl_vars['gui']->my_cf != ""): ?>
  <div class="workBack">
    <h2><?php echo $this->_tpl_vars['labels']['title_assigned_cfields']; ?>
</h2>
    <form method="post">
      <div id="assigned_cf"> 
 	           <input type="hidden" name="memory_assigned_cf"  
                            id="memory_assigned_cf"  value="0" />
      <table class="simple">
      	<tr>
      		<th align="center"  style="width: 5px;background-color:#005498;"> 
      		    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
      		             onclick='cs_all_checkbox_in_div("assigned_cf","assigned_cfield","memory_assigned_cf");'
      		             title="<?php echo $this->_tpl_vars['labels']['check_uncheck_all_checkboxes']; ?>
" />
      		</th>
      		<th width="40%"><?php echo $this->_tpl_vars['labels']['name']; ?>
</th>
      		<th width="40%"><?php echo $this->_tpl_vars['labels']['label']; ?>
</th>
      		<th><?php echo $this->_tpl_vars['labels']['type']; ?>
</th>
      		<th><?php echo $this->_tpl_vars['labels']['available_on']; ?>
</th>
      		<th width="15%"><?php echo $this->_tpl_vars['labels']['display_order']; ?>
</th>
      		<th width="15%"><?php echo $this->_tpl_vars['labels']['location']; ?>
</th>
      		<th width="5%"><?php echo $this->_tpl_vars['labels']['cfields_active']; ?>
</th>
      	</tr>
      	<?php $_from = $this->_tpl_vars['gui']->my_cf; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cf_id'] => $this->_tpl_vars['cf']):
?>
      	<tr>
      		<td class="clickable_icon"><input type="checkbox" id="assigned_cfield<?php echo $this->_tpl_vars['cf']['id']; ?>
" name="cfield[<?php echo $this->_tpl_vars['cf']['id']; ?>
]" /></td>
   		   	<td class="bold"><a href="lib/cfields/cfieldsEdit.php?do_action=edit&amp;cfield_id=<?php echo $this->_tpl_vars['cf']['id']; ?>
"
   		   	                    title="<?php echo $this->_tpl_vars['labels']['manage_cfield']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['cf']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
      		<td class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['cf']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      		<td class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->cf_available_types[$this->_tpl_vars['cf']['type']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      		<td class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->cf_allowed_nodes[$this->_tpl_vars['cf']['node_type_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>


      		<td><input type="text" name="display_order[<?php echo $this->_tpl_vars['cf']['id']; ?>
]" 
      		           value="<?php echo $this->_tpl_vars['cf']['display_order']; ?>
" 
      		           size="<?php echo $this->_config[0]['vars']['DISPLAY_ORDER_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['DISPLAY_ORDER_MAXLEN']; ?>
" /></td>
      		           
      		<td>
      		      		<?php if ($this->_tpl_vars['cf']['node_description'] == 'testcase' && $this->_tpl_vars['cf']['enable_on_execution'] == 0): ?>
			  	<select name="location[<?php echo $this->_tpl_vars['cf']['id']; ?>
]">
			  	  <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->locations,'selected' => $this->_tpl_vars['cf']['location']), $this);?>

			  	</select>
      		<?php else: ?>
      		&nbsp;
      		<?php endif; ?>
      		</td>
      		           
      		<td><input type="checkbox" name="active_cfield[<?php echo $this->_tpl_vars['cf']['id']; ?>
]" 
      		                           <?php if ($this->_tpl_vars['cf']['active'] == 1): ?> checked="checked" <?php endif; ?> /> 
      		    <input type="hidden" name="hidden_active_cfield[<?php echo $this->_tpl_vars['cf']['id']; ?>
]"  value="<?php echo $this->_tpl_vars['cf']['active']; ?>
" /> 
      		</td>
      	</tr>
      	<?php endforeach; endif; unset($_from); ?>
      </table>
    	</div>
    	<div class="groupBtn">
        
        <input type="hidden" name="doAction" value="" />
    	  
    		<input type="submit" name="doUnassign" value="<?php echo $this->_tpl_vars['labels']['btn_unassign']; ?>
" 
    		                     onclick="doAction.value=this.name"/>
    		                     
    		<input type="submit" name="doActiveMgmt" value="<?php echo $this->_tpl_vars['labels']['btn_cfields_active_mgmt']; ?>
"
    		                     onclick="doAction.value=this.name"/>

    		<input type="submit" name="doReorder" value="<?php echo $this->_tpl_vars['labels']['btn_cfields_display_attr']; ?>
" 
    		                     onclick="doAction.value=this.name"/>
    		
    	</div>
    </form>
    </div>
<?php endif; ?>


<?php if ($this->_tpl_vars['gui']->other_cf != ""): ?>
  <div class="workBack">
    <h2><?php echo $this->_tpl_vars['labels']['title_available_cfields']; ?>
</h2>
    <form method="post">
      <div id="free_cf"> 
 	           <input type="hidden" name="memory_free_cf"  
                            id="memory_free_cf"  value="0" />

      <table class="simple" style="width: 50%;">
      	<tr>
      		<th align="center"  style="width: 5px;background-color:#005498;"> 
      		    <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
      		             onclick='cs_all_checkbox_in_div("free_cf","free_cfield","memory_free_cf");'
      		             title="<?php echo $this->_tpl_vars['labels']['check_uncheck_all_checkboxes']; ?>
" />
      		</th>
      		<th><?php echo $this->_tpl_vars['labels']['name']; ?>
</th>
      		<th><?php echo $this->_tpl_vars['labels']['label']; ?>
</th>
      		<th><?php echo $this->_tpl_vars['labels']['type']; ?>
</th>
      		<th><?php echo $this->_tpl_vars['labels']['available_on']; ?>
</th>
      	</tr>
      	<?php $_from = $this->_tpl_vars['gui']->other_cf; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cf_id'] => $this->_tpl_vars['cf']):
?>
      	<tr>
      		<td class="clickable_icon"> <input type="checkbox" id="free_cfield<?php echo $this->_tpl_vars['cf']['id']; ?>
" name="cfield[<?php echo $this->_tpl_vars['cf']['id']; ?>
]" /></td>
      		<td class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['cf']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      		<td class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['cf']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      		<td class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->cf_available_types[$this->_tpl_vars['cf']['type']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      		<td class="bold"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->cf_allowed_nodes[$this->_tpl_vars['cf']['node_type_id']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
      	</tr>
      	<?php endforeach; endif; unset($_from); ?>
      </table>
    	</div>
    	<div class="groupBtn">
        <input type="hidden" name="doAction" value="" />
    		<input type="submit" name="doAssign" id=this.name value="<?php echo $this->_tpl_vars['labels']['btn_assign']; ?>
" 
    		                     onclick="doAction.value=this.name"/>
    	</div>
    </form>
    </div>
<?php endif; ?>

</body>
</html>