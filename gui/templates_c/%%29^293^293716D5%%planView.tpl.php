<?php /* Smarty version 2.6.26, created on 2010-10-09 10:27:36
         compiled from plan/planView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'plan/planView.tpl', 17, false),array('modifier', 'replace', 'plan/planView.tpl', 17, false),array('modifier', 'escape', 'plan/planView.tpl', 51, false),array('modifier', 'strip_tags', 'plan/planView.tpl', 87, false),array('modifier', 'strip', 'plan/planView.tpl', 87, false),array('modifier', 'truncate', 'plan/planView.tpl', 87, false),array('function', 'config_load', 'plan/planView.tpl', 18, false),array('function', 'lang_get', 'plan/planView.tpl', 28, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='plan/planView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $this->assign('managerURL', "lib/plan/planEdit.php"); ?>
<?php $this->assign('editAction', ($this->_tpl_vars['managerURL'])."?do_action=edit&amp;tplan_id="); ?>
<?php $this->assign('deleteAction', ($this->_tpl_vars['managerURL'])."?do_action=do_delete&tplan_id="); ?>
<?php $this->assign('createAction', ($this->_tpl_vars['managerURL'])."?do_action=create"); ?>
<?php $this->assign('exportAction', "lib/plan/planExport.php?tplan_id="); ?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => 'testplan_title_tp_management,testplan_txt_empty_list,sort_table_by_column,
          testplan_th_name,testplan_th_notes,testplan_th_active,testplan_th_delete,
          testplan_alt_edit_tp,alt_active_testplan,testplan_alt_delete_tp,public,
          btn_testplan_create,th_id,error_no_testprojects_present,btn_export_import,
          export_import,export'), $this);?>



<?php echo lang_get_smarty(array('s' => 'warning_delete_testplan','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','enableTableSorting' => 'yes')));
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
var del_action=fRoot+'<?php echo $this->_tpl_vars['deleteAction']; ?>
';
</script>

</head>

<body <?php echo $this->_tpl_vars['body_onload']; ?>
>

<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<?php if ($this->_tpl_vars['gui']->user_feedback != ""): ?>
	<div>
		<p class="info"><?php echo $this->_tpl_vars['gui']->user_feedback; ?>
</p>
	</div>
<?php endif; ?>

<div class="workBack">
<div id="testplan_management_list">
<?php if ($this->_tpl_vars['gui']->tproject_id <= 0): ?>
	<?php echo $this->_tpl_vars['labels']['error_no_testprojects_present']; ?>

<?php elseif ($this->_tpl_vars['gui']->tplans == ''): ?>
	<?php echo $this->_tpl_vars['labels']['testplan_txt_empty_list']; ?>

<?php else: ?>
	<table id='item_view'class="simple sortable" width="95%">
		<tr>
			<th><?php echo $this->_tpl_vars['toggle_api_info_img']; ?>
<?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['testplan_th_name']; ?>
</th> 			
			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['testplan_th_notes']; ?>
</th>
			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['testplan_th_active']; ?>
</th>
			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['public']; ?>
</th>
			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['testplan_th_delete']; ?>
</th>
			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['export']; ?>
</th>
		</tr>
		<?php $_from = $this->_tpl_vars['gui']->tplans; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['testplan']):
?>
		<tr>
			<td><span class="api_info" style='display:none'><?php echo ((is_array($_tmp=$this->_tpl_vars['tlCfg']->api->id_format)) ? $this->_run_mod_handler('replace', true, $_tmp, "%s", $this->_tpl_vars['testplan']['id']) : smarty_modifier_replace($_tmp, "%s", $this->_tpl_vars['testplan']['id'])); ?>
</span>
			    <a href="<?php echo $this->_tpl_vars['editAction']; ?>
<?php echo $this->_tpl_vars['testplan']['id']; ?>
"> 
				     <?php echo ((is_array($_tmp=$this->_tpl_vars['testplan']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 
				     <?php if ($this->_tpl_vars['gsmarty_gui']->show_icon_edit): ?>
 				         <img title="<?php echo $this->_tpl_vars['labels']['testplan_alt_edit_tp']; ?>
" 
 				              alt="<?php echo $this->_tpl_vars['labels']['testplan_alt_edit_tp']; ?>
" 
 				              src="<?php echo @TL_THEME_IMG_DIR; ?>
/icon_edit.png"/>
 				     <?php endif; ?>  
 				  </a>
			</td>
			<td>
				<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['testplan']['notes'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['TESTPLAN_NOTES_TRUNCATE']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['TESTPLAN_NOTES_TRUNCATE'])); ?>

			</td>
			<td class="clickable_icon">
				<?php if ($this->_tpl_vars['testplan']['active'] == 1): ?> 
  					<img style="border:none" 
  				            title="<?php echo $this->_tpl_vars['labels']['alt_active_testplan']; ?>
" 
  				            alt="<?php echo $this->_tpl_vars['labels']['alt_active_testplan']; ?>
" 
  				            src="<?php echo $this->_tpl_vars['checked_img']; ?>
"/>
  				<?php else: ?>
  					&nbsp;        
  				<?php endif; ?>
			</td>
			<td class="clickable_icon">
				<?php if ($this->_tpl_vars['testplan']['is_public'] == 1): ?> 
  					<img style="border:none" title="<?php echo $this->_tpl_vars['labels']['public']; ?>
"  alt="<?php echo $this->_tpl_vars['labels']['public']; ?>
" 
  				       src="<?php echo $this->_tpl_vars['checked_img']; ?>
"/>
  				<?php else: ?>
  					&nbsp;        
  				<?php endif; ?>
			</td>
			<td class="clickable_icon">
				  <img style="border:none;cursor: pointer;" 
				       alt="<?php echo $this->_tpl_vars['labels']['testplan_alt_delete_tp']; ?>
"
					   title="<?php echo $this->_tpl_vars['labels']['testplan_alt_delete_tp']; ?>
" 
					   onclick="delete_confirmation(<?php echo $this->_tpl_vars['testplan']['id']; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['testplan']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
					                                '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');"
				     src="<?php echo $this->_tpl_vars['delete_img']; ?>
"/>
			</td>
			<td class="clickable_icon">
			    <a href="<?php echo $this->_tpl_vars['exportAction']; ?>
<?php echo $this->_tpl_vars['testplan']['id']; ?>
"> 
				  <img style="border:none;cursor: pointer;" alt="<?php echo $this->_tpl_vars['labels']['export']; ?>
" title="<?php echo $this->_tpl_vars['labels']['export']; ?>
" 
				       src="<?php echo $this->_tpl_vars['tlImages']['export']; ?>
"/>
				  </a>     
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>

	</table>

<?php endif; ?>
</div>

 <?php if ($this->_tpl_vars['gui']->grants->testplan_create && $this->_tpl_vars['gui']->tproject_id > 0): ?>
 <div class="groupBtn">
    <form method="post" action="<?php echo $this->_tpl_vars['createAction']; ?>
">
      <input type="submit" name="create_testplan" value="<?php echo $this->_tpl_vars['labels']['btn_testplan_create']; ?>
" />
    </form>
  </div>
 <?php endif; ?>
</div>

</body>
</html>