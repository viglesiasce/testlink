<?php /* Smarty version 2.6.26, created on 2010-09-29 16:46:10
         compiled from plan/buildView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'plan/buildView.tpl', 11, false),array('modifier', 'replace', 'plan/buildView.tpl', 11, false),array('modifier', 'escape', 'plan/buildView.tpl', 41, false),array('modifier', 'strip_tags', 'plan/buildView.tpl', 71, false),array('modifier', 'strip', 'plan/buildView.tpl', 71, false),array('modifier', 'truncate', 'plan/buildView.tpl', 71, false),array('function', 'config_load', 'plan/buildView.tpl', 12, false),array('function', 'lang_get', 'plan/buildView.tpl', 21, false),array('function', 'localize_date', 'plan/buildView.tpl', 72, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='plan/buildView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php $this->assign('managerURL', "lib/plan/buildEdit.php"); ?>
<?php $this->assign('editAction', ($this->_tpl_vars['managerURL'])."?do_action=edit&amp;build_id="); ?>
<?php $this->assign('deleteAction', ($this->_tpl_vars['managerURL'])."?do_action=do_delete&build_id="); ?>
<?php $this->assign('createAction', ($this->_tpl_vars['managerURL'])."?do_action=create"); ?>


<?php echo lang_get_smarty(array('s' => 'warning_delete_build','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => 'title_build_2,test_plan,th_title,th_description,th_active,
             th_open,th_delete,alt_edit_build,alt_active_build,
             alt_open_build,alt_delete_build,no_builds,btn_build_create,
             builds_description,sort_table_by_column,th_id,release_date'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes','jsValidate' => 'yes','enableTableSorting' => 'yes')));
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

<h1 class="title"><?php echo $this->_tpl_vars['labels']['title_build_2']; ?>
<?php echo @TITLE_SEP_TYPE3; ?>
<?php echo $this->_tpl_vars['labels']['test_plan']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tplan_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'],'item' => 'build')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="existing_builds">
  <?php if ($this->_tpl_vars['gui']->buildSet != ""): ?>
      	<table id="item_view" class="simple  sortable" style="width:80%">
  		<tr>
  			<th><?php echo $this->_tpl_vars['toggle_api_info_img']; ?>
<?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_title']; ?>
</th>
  			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_description']; ?>
</th>
  			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
" style="width:90px;"><?php echo $this->_tpl_vars['labels']['release_date']; ?>
</th>
  			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_active']; ?>
</th>
  			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_open']; ?>
</th>
  			<th class="<?php echo $this->_tpl_vars['noSortableColumnClass']; ?>
"><?php echo $this->_tpl_vars['labels']['th_delete']; ?>
</th>
  		</tr>
  		<?php $_from = $this->_tpl_vars['gui']->buildSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['build']):
?>
        	<tr>
  				<td><span class="api_info" style='display:none'><?php echo ((is_array($_tmp=$this->_tpl_vars['tlCfg']->api->id_format)) ? $this->_run_mod_handler('replace', true, $_tmp, "%s", $this->_tpl_vars['build']['id']) : smarty_modifier_replace($_tmp, "%s", $this->_tpl_vars['build']['id'])); ?>
</span>
  				    <a href="<?php echo $this->_tpl_vars['editAction']; ?>
<?php echo $this->_tpl_vars['build']['id']; ?>
" title="<?php echo $this->_tpl_vars['labels']['alt_edit_build']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['build']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

  					     <?php if ($this->_tpl_vars['gsmarty_gui']->show_icon_edit): ?>
  					         <img style="border:none"
  					              alt="<?php echo $this->_tpl_vars['labels']['alt_edit_build']; ?>
" 
  					              title="<?php echo $this->_tpl_vars['labels']['alt_edit_build']; ?>
"
  					              src="<?php echo @TL_THEME_IMG_DIR; ?>
/icon_edit.png"/>
  					     <?php endif; ?>    
  					  </a>   
  				</td>
  				<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['build']['notes'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_config[0]['vars']['BUILD_NOTES_TRUNCATE_LEN']) : smarty_modifier_truncate($_tmp, $this->_config[0]['vars']['BUILD_NOTES_TRUNCATE_LEN'])); ?>
</td>
  				<td><?php if ($this->_tpl_vars['build']['release_date'] != ''): ?><?php echo localize_date_smarty(array('d' => $this->_tpl_vars['build']['release_date']), $this);?>
<?php endif; ?></td>
  				<td class="clickable_icon">
  				   <?php if ($this->_tpl_vars['build']['active'] == 1): ?> 
  				     <img style="border:none" 
  				            title="<?php echo $this->_tpl_vars['labels']['alt_active_build']; ?>
" 
  				            alt="<?php echo $this->_tpl_vars['labels']['alt_active_build']; ?>
" 
  				            src="<?php echo $this->_tpl_vars['checked_img']; ?>
"/>
  				    <?php else: ?>
  				    &nbsp;        
  				    <?php endif; ?>
  				</td>
  				<td class="clickable_icon">
  				   <?php if ($this->_tpl_vars['build']['is_open'] == 1): ?> 
  				     <img style="border:none" 
  				            title="<?php echo $this->_tpl_vars['labels']['alt_open_build']; ?>
" 
  				            alt="<?php echo $this->_tpl_vars['labels']['alt_open_build']; ?>
" 
  				            src="<?php echo $this->_tpl_vars['checked_img']; ?>
"/>
  				    <?php else: ?>
  				    &nbsp;        
  				    <?php endif; ?>
  				</td>
  				<td class="clickable_icon">
				       <img style="border:none;cursor: pointer;" 
  				            title="<?php echo $this->_tpl_vars['labels']['alt_delete_build']; ?>
" 
  				            alt="<?php echo $this->_tpl_vars['labels']['alt_delete_build']; ?>
" 
 					            onclick="delete_confirmation(<?php echo $this->_tpl_vars['build']['id']; ?>
,'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['build']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
 					                                         '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');"
  				            src="<?php echo $this->_tpl_vars['delete_img']; ?>
"/>
  				</td>
  			</tr>
  		<?php endforeach; endif; unset($_from); ?>
  	</table>
  <?php else: ?>
  	<p><?php echo $this->_tpl_vars['labels']['no_builds']; ?>
</p>
  <?php endif; ?>
</div>

 <div class="groupBtn">
    <form method="post" action="<?php echo $this->_tpl_vars['createAction']; ?>
" id="create_build">
      <input type="submit" name="create_build" value="<?php echo $this->_tpl_vars['labels']['btn_build_create']; ?>
" />
    </form>
  </div>

	<p><?php echo $this->_tpl_vars['labels']['builds_description']; ?>
</p>

</div>

</body>
</html>