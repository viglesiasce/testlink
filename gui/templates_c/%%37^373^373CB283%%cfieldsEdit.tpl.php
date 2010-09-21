<?php /* Smarty version 2.6.26, created on 2010-09-09 14:22:59
         compiled from cfields/cfieldsEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'cfields/cfieldsEdit.tpl', 40, false),array('modifier', 'replace', 'cfields/cfieldsEdit.tpl', 40, false),array('modifier', 'escape', 'cfields/cfieldsEdit.tpl', 324, false),array('function', 'config_load', 'cfields/cfieldsEdit.tpl', 41, false),array('function', 'lang_get', 'cfields/cfieldsEdit.tpl', 46, false),array('function', 'html_options', 'cfields/cfieldsEdit.tpl', 379, false),)), $this); ?>

<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='cfields/cfieldsEdit.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $this->assign('managerURL', "lib/cfields/cfieldsEdit.php"); ?>
<?php $this->assign('viewAction', "lib/cfields/cfieldsView.php"); ?>

<?php echo lang_get_smarty(array('s' => 'warning_delete_cf','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => "btn_ok,title_cfields_mgmt,warning_is_in_use,warning,name,label,type,possible_values,
             warning_empty_cfield_name,warning_empty_cfield_label,testproject,assigned_to_testprojects,
             enable_on_design,show_on_exec,enable_on_exec,enable_on_testplan_design,
             available_on,btn_upd,btn_delete,warning_no_type_change,enable_on,
             btn_add,btn_cancel,show_on_design,show_on_testplan_design"), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('jsValidate' => 'yes','openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
/* All this stuff is needed for logic contained in inc_del_onclick.tpl */
var del_action=fRoot+'<?php echo $this->_tpl_vars['managerURL']; ?>
'+'?do_action=do_delete&cfield_id=';
</script>

<?php echo '
<script type="text/javascript">
'; ?>

var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var warning_empty_cfield_name = "<?php echo $this->_tpl_vars['labels']['warning_empty_cfield_name']; ?>
";
var warning_empty_cfield_label = "<?php echo $this->_tpl_vars['labels']['warning_empty_cfield_label']; ?>
";

// -------------------------------------------------------------------------------
// To manage hide/show combo logic, depending of node type
var js_enable_on_cfg = new Array();
var js_show_on_cfg = new Array();

// DOM Object ID (oid)
js_enable_on_cfg['oid_prefix'] = new Array();
js_enable_on_cfg['oid_prefix']['boolean_combobox'] = 'cf_enable_on_';
js_enable_on_cfg['oid_prefix']['container'] = 'container_cf_enable_on_';
js_enable_on_cfg['oid'] = new Array();
js_enable_on_cfg['oid']['combobox'] = 'cf_enable_on';
js_enable_on_cfg['oid']['container'] = 'container_cf_enable_on';


// will containg show (1 /0 ) info for every node type
js_enable_on_cfg['execution'] = new Array();
js_enable_on_cfg['design'] = new Array();
js_enable_on_cfg['testplan_design'] = new Array();  // BUGID 1650 (REQ)


// DOM Object ID (oid)
js_show_on_cfg['oid_prefix'] = new Array();
js_show_on_cfg['oid_prefix']['boolean_combobox'] = 'cf_show_on_';
js_show_on_cfg['oid_prefix']['container'] = 'container_cf_show_on_';

// will containg show (1 /0 ) info for every node type
js_show_on_cfg['execution'] = new Array();
js_show_on_cfg['design'] = new Array();
js_show_on_cfg['testplan_design'] = new Array();  // BUGID 1650 (REQ)

<?php $_from = $this->_tpl_vars['gui']->cfieldCfg->enable_on_cfg['execution']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node_type'] => $this->_tpl_vars['cfg_def']):
?>
  js_enable_on_cfg['execution'][<?php echo $this->_tpl_vars['node_type']; ?>
]=<?php echo $this->_tpl_vars['cfg_def']; ?>
;
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['gui']->cfieldCfg->enable_on_cfg['design']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node_type'] => $this->_tpl_vars['cfg_def']):
?>
  js_enable_on_cfg['design'][<?php echo $this->_tpl_vars['node_type']; ?>
]=<?php echo $this->_tpl_vars['cfg_def']; ?>
;
<?php endforeach; endif; unset($_from); ?>

// BUGID 1650 (REQ)
<?php $_from = $this->_tpl_vars['gui']->cfieldCfg->enable_on_cfg['testplan_design']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node_type'] => $this->_tpl_vars['cfg_def']):
?>
  js_enable_on_cfg['testplan_design'][<?php echo $this->_tpl_vars['node_type']; ?>
]=<?php echo $this->_tpl_vars['cfg_def']; ?>
;
<?php endforeach; endif; unset($_from); ?>


<?php $_from = $this->_tpl_vars['gui']->cfieldCfg->show_on_cfg['execution']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node_type'] => $this->_tpl_vars['cfg_def']):
?>
  js_show_on_cfg['execution'][<?php echo $this->_tpl_vars['node_type']; ?>
]=<?php echo $this->_tpl_vars['cfg_def']; ?>
;
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['gui']->cfieldCfg->show_on_cfg['design']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node_type'] => $this->_tpl_vars['cfg_def']):
?>
  js_show_on_cfg['design'][<?php echo $this->_tpl_vars['node_type']; ?>
]=<?php echo $this->_tpl_vars['cfg_def']; ?>
;
<?php endforeach; endif; unset($_from); ?>

// BUGID 1650 (REQ)
<?php $_from = $this->_tpl_vars['gui']->cfieldCfg->show_on_cfg['testplan_design']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node_type'] => $this->_tpl_vars['cfg_def']):
?>
  js_show_on_cfg['testplan_design'][<?php echo $this->_tpl_vars['node_type']; ?>
]=<?php echo $this->_tpl_vars['cfg_def']; ?>
;
<?php endforeach; endif; unset($_from); ?>
// -------------------------------------------------------------------------------

var js_possible_values_cfg = new Array();
<?php $_from = $this->_tpl_vars['gui']->cfieldCfg->possible_values_cfg; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cf_type'] => $this->_tpl_vars['cfg_def']):
?>
  js_possible_values_cfg[<?php echo $this->_tpl_vars['cf_type']; ?>
]=<?php echo $this->_tpl_vars['cfg_def']; ?>
;
<?php endforeach; endif; unset($_from); ?>



<?php echo '
function validateForm(f)
{
  if (isWhitespace(f.cf_name.value))
  {
      alert_message(alert_box_title,warning_empty_cfield_name);
      selectField(f, \'cf_name\');
      return false;
  }

  if (isWhitespace(f.cf_label.value))
  {
      alert_message(alert_box_title,warning_empty_cfield_label);
      selectField(f, \'cf_label\');
      return false;
  }
  return true;
}

/*
  function: configure_cf_attr
            depending of node type, custom fields attributes
            will be set to disable, is its value is nonsense
            for node type choosen by user.

  args :
         id_nodetype: id of html input used to choose node type
                      to which apply custom field


  returns: -

*/
function configure_cf_attr(id_nodetype,enable_on_cfg,show_on_cfg)
{
  var o_nodetype=document.getElementById(id_nodetype);
  var o_enable=new Array();
  var o_enable_container=new Array();
  var o_display=new Array();
  var o_display_container=new Array();


  var oid;
  var keys2loop=new Array();
  var idx;
  var key;
  var option_item;
  var enabled_option_counter=0;
  var style_display;
  
  keys2loop[0]=\'execution\';
  keys2loop[1]=\'design\';
  keys2loop[2]=\'testplan_design\'; // BUGID 1650 - 20080809 - franciscom

  // 20090524 - franciscom - refactoring
  style_display=\'\';
  for(idx=0;idx < keys2loop.length; idx++)
  {
    key=keys2loop[idx];
    oid=\'option_\' + key;
    option_item = document.getElementById(oid);

    // Dev Note:
    // Only Firefox (@20100829) is able to hide/show an option present on a HTML select.
    // IE and Chrome NOT 
    // Need to understand then if is better to remove all this code
    if( enable_on_cfg[key][o_nodetype.value] == 0 )
    {
      option_item.style.display=\'none\';
    }
    else
    {
      option_item.style.display=\'\';
      enabled_option_counter++;
    }
  }
  // Set Always to Test Spec Design that is valid for TL elements
  if( enabled_option_counter == 0 )
  {
    style_display=\'none\';
  }
  document.getElementById(enable_on_cfg[\'oid\'][\'container\']).style.display=style_display;
  document.getElementById(enable_on_cfg[\'oid\'][\'combobox\']).value=\'design\';

  // ------------------------------------------------------------
  // Display on
  // ------------------------------------------------------------
  for(idx=0;idx < keys2loop.length; idx++)
  {
    key=keys2loop[idx];
    oid=show_on_cfg[\'oid_prefix\'][\'boolean_combobox\']+key;
    
    o_display[key]=document.getElementById(oid);
    if( o_display[key] != null)
    {
      oid=show_on_cfg[\'oid_prefix\'][\'container\']+key;
      o_display_container[key]=document.getElementById(oid);
      
      if( show_on_cfg[key][o_nodetype.value] == 0 )
      {
        // 20071124 - need to understand if can not set to 0
        o_display[key].value=0;
        o_display[key].disabled=\'disabled\';
        o_display_container[key].style.display=\'none\';
      }
      else
      {
        o_display[key].disabled=\'\';
        o_display_container[key].style.display=\'\';
      }
    }
  }
  // ------------------------------------------------------------
} // configure_cf_attr



/*
  function: cfg_possible_values_display
            depending of Custom Field type, Possible Values attribute
            will be displayed or not.

  args : cf_type: id of custom field type, choosen by user.

         id_possible_values_container : id of html container
                                        where input for possible values
                                        lives. Used to manage visibility.

  returns:

*/
function cfg_possible_values_display(cfg,id_cftype,id_possible_values_container)
{

  o_cftype=document.getElementById(id_cftype);
  o_container=document.getElementById(id_possible_values_container);

  if( cfg[o_cftype.value] == 0 )
  {
    o_container.style.display=\'none\';
  }
  else
  {
    o_container.style.display=\'\';
  }
}

/*
  function: initShowOnExec
            called every time value of \'cf_enable_on\' is changed
            to initialize  show_on_ attribute.
 
  args:
  
  returns: 

*/
function initShowOnExec(id_master,show_on_cfg)
{
  var container_oid=show_on_cfg[\'oid_prefix\'][\'container\']+\'execution\';
  var combo_oid=show_on_cfg[\'oid_prefix\'][\'boolean_combobox\']+\'execution\';
  
  var o_container=document.getElementById(container_oid);
  var o_combo=document.getElementById(combo_oid);
  
  var o_master=document.getElementById(id_master);
  if( o_master.value == \'execution\')
  {
    o_container.style.display=\'none\';
    o_combo.value=1;
  }
  else
  {
    o_container.style.display=\'\';
  }
}
</script>
'; ?>

</head>

<body onload="configure_cf_attr('combo_cf_node_type_id',js_enable_on_cfg,js_show_on_cfg);">

<h1 class="title">
  	<?php echo $this->_tpl_vars['labels']['title_cfields_mgmt']; ?>
 
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_customFields','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>

<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['operation_descr'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['user_feedback'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui']->cfield_is_used): ?>
  <div class="user_feedback"><?php echo $this->_tpl_vars['labels']['warning_no_type_change']; ?>
</div>
<?php endif; ?>

<div class="workBack">

<?php if ($this->_tpl_vars['user_action'] == 'do_delete'): ?>
  <form method="post" name="cfields_edit" action="<?php echo $this->_tpl_vars['viewAction']; ?>
">
   <div class="groupBtn">
		<input type="submit" name="ok" value="<?php echo $this->_tpl_vars['labels']['btn_ok']; ?>
" />
	 </div>
  </form>

<?php else: ?>
<form method="post" name="cfields_edit" action="lib/cfields/cfieldsEdit.php"
      onSubmit="javascript:return validateForm(this);">
<input type="hidden" id="hidden_id" name="cfield_id" value="<?php echo $this->_tpl_vars['gui']->cfield['id']; ?>
" />
<table class="common">

	 <tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['name']; ?>
</th>
			<td><input type="text" name="cf_name"
			                       size="<?php echo $this->_config[0]['vars']['CFIELD_NAME_SIZE']; ?>
"
			                       maxlength="<?php echo $this->_config[0]['vars']['CFIELD_NAME_MAXLEN']; ?>
"
    			 value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->cfield['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'cf_name')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    	</td>
		</tr>
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['label']; ?>
</th>
			<td><input type="text" name="cf_label"
			                       size="<?php echo $this->_config[0]['vars']['CFIELD_LABEL_SIZE']; ?>
"
			                       maxlength="<?php echo $this->_config[0]['vars']['CFIELD_LABEL_MAXLEN']; ?>
"
			           value="<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->cfield['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
		           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'cf_label')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    	</td>
	  </tr>
		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['available_on']; ?>
</th>
			<td>
			  <?php if ($this->_tpl_vars['gui']->cfield_is_used): ?> 			    <?php $this->assign('idx', $this->_tpl_vars['gui']->cfield['node_type_id']); ?>
			    <?php echo $this->_tpl_vars['gui']->cfieldCfg->cf_allowed_nodes[$this->_tpl_vars['idx']]; ?>

			    			    <input type="hidden" id="combo_cf_node_type_id"
			           value=<?php echo $this->_tpl_vars['gui']->cfield['node_type_id']; ?>
 name="cf_node_type_id" />
			  <?php else: ?>
  				<select onchange="configure_cf_attr('combo_cf_node_type_id',
  				                                    js_enable_on_cfg,
  				                                    js_show_on_cfg);"
  				        id="combo_cf_node_type_id"
  				        name="cf_node_type_id">
  				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->cfieldCfg->cf_allowed_nodes,'selected' => $this->_tpl_vars['gui']->cfield['node_type_id']), $this);?>

  				</select>
				<?php endif; ?>
			</td>
		</tr>

		<tr>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['type']; ?>
</th>
			<td>
			  <?php if ($this->_tpl_vars['gui']->cfield_is_used): ?>
			    <?php $this->assign('idx', $this->_tpl_vars['gui']->cfield['type']); ?>
			    <?php echo $this->_tpl_vars['gui']->cfield_types[$this->_tpl_vars['idx']]; ?>

			    <input type="hidden" id="hidden_cf_type"
			           value=<?php echo $this->_tpl_vars['gui']->cfield['type']; ?>
 name="cf_type" />
			  <?php else: ?>
  				<select onchange="cfg_possible_values_display(js_possible_values_cfg,
  				                                              'combo_cf_type',
  				                                              'possible_values');"
  				        id="combo_cf_type"
  				        name="cf_type">
	  			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->cfield_types,'selected' => $this->_tpl_vars['gui']->cfield['type']), $this);?>

		  		</select>
		  	<?php endif; ?>
			</td>
		</tr>

    <?php if ($this->_tpl_vars['gui']->show_possible_values): ?>
      <?php $this->assign('display_style', ""); ?>
    <?php else: ?>
      <?php $this->assign('display_style', 'none'); ?>
		<?php endif; ?>
		<tr id="possible_values" style="display:<?php echo $this->_tpl_vars['display_style']; ?>
;">
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['possible_values']; ?>
</th>
			<td>
				<input type="text" id="cf_possible_values"
				                   name="cf_possible_values"
		                       size="<?php echo $this->_config[0]['vars']['CFIELD_POSSIBLE_VALUES_SIZE']; ?>
"
		                       maxlength="<?php echo $this->_config[0]['vars']['CFIELD_POSSIBLE_VALUES_MAXLEN']; ?>
"
				                   value="<?php echo $this->_tpl_vars['gui']->cfield['possible_values']; ?>
" />
			</td>
		</tr>

       		<tr	id="container_cf_enable_on">
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['enable_on']; ?>
</th>
			<td>
				<select name="cf_enable_on" id="cf_enable_on"
				        onchange="initShowOnExec('cf_enable_on',js_show_on_cfg);">
        <?php $_from = $this->_tpl_vars['gui']->cfieldCfg->cf_enable_on; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['area_name'] => $this->_tpl_vars['area_cfg']):
?>
          <?php $this->assign('access_key', "enable_on_".($this->_tpl_vars['area_name'])); ?>
				  <option value=<?php echo $this->_tpl_vars['area_name']; ?>
 id="option_<?php echo $this->_tpl_vars['area_name']; ?>
" 
				          <?php if ($this->_tpl_vars['area_cfg']['value'] == 0): ?> style="display:none;" <?php endif; ?> 
				  <?php if ($this->_tpl_vars['gui']->cfield[$this->_tpl_vars['access_key']]): ?> selected="selected"	<?php endif; ?>><?php echo $this->_tpl_vars['area_cfg']['label']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select>
			</td>
		</tr>


                		<tr id="container_cf_show_on_execution" <?php echo $this->_tpl_vars['gui']->cfieldCfg->cf_show_on['execution']['style']; ?>
>
			<th style="background:none;"><?php echo $this->_tpl_vars['labels']['show_on_exec']; ?>
</th>
			<td>
				<select id="cf_show_on_execution"  name="cf_show_on_execution">
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gsmarty_option_yes_no'],'selected' => $this->_tpl_vars['gui']->cfield['show_on_execution']), $this);?>

				</select>
			</td>
		</tr>

	</table>

    <?php if (isset ( $this->_tpl_vars['gui']->cfield_is_linked ) && $this->_tpl_vars['gui']->cfield_is_linked): ?>
  <table class="common">
    <tr> <th><?php echo $this->_tpl_vars['labels']['assigned_to_testprojects']; ?>
 </th>
    <?php $_from = $this->_tpl_vars['gui']->linked_tprojects; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tproject']):
?>
      <tr> <td><?php echo ((is_array($_tmp=$this->_tpl_vars['tproject']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> </tr>
    <?php endforeach; endif; unset($_from); ?>
  </table>

  <?php endif; ?>

	<div class="groupBtn">
	<input type="hidden" name="do_action" value="" />
	<?php if ($this->_tpl_vars['user_action'] == 'edit' || $this->_tpl_vars['user_action'] == 'do_update'): ?>
		<input type="submit" name="do_update" value="<?php echo $this->_tpl_vars['labels']['btn_upd']; ?>
"
		       onclick="do_action.value='do_update'"/>

				  		<input type="button" name="do_delete" value="<?php echo $this->_tpl_vars['labels']['btn_delete']; ?>
"
  		       onclick="delete_confirmation(<?php echo $this->_tpl_vars['gui']->cfield['id']; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->cfield['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
  		                                    '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');">
    
	<?php else: ?>
		<input type="submit" name="do_update" value="<?php echo $this->_tpl_vars['labels']['btn_add']; ?>
"
		       onclick="do_action.value='do_add'"/>
	<?php endif; ?>
		<input type="button" name="cancel" value="<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
"
			onclick="javascript: location.href=fRoot+'lib/cfields/cfieldsView.php';" />

	</div>
</form>
<hr />
<?php endif; ?>

</div>

</body>
</html>