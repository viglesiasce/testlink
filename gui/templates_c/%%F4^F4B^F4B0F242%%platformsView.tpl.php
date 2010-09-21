<?php /* Smarty version 2.6.26, created on 2010-09-03 15:35:45
         compiled from platforms/platformsView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'platforms/platformsView.tpl', 14, false),array('function', 'config_load', 'platforms/platformsView.tpl', 38, false),array('modifier', 'basename', 'platforms/platformsView.tpl', 37, false),array('modifier', 'replace', 'platforms/platformsView.tpl', 37, false),array('modifier', 'escape', 'platforms/platformsView.tpl', 59, false),array('modifier', 'nl2br', 'platforms/platformsView.tpl', 64, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('jsValidate' => 'yes','openHead' => 'yes','enableTableSorting' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'th_notes,th_platform,th_delete,btn_import,btn_export,
             menu_manage_platforms,alt_delete_platform,
             menu_assign_kw_to_tc,btn_create_platform'), $this);?>


<?php echo lang_get_smarty(array('s' => 'warning_delete_platform','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'warning_cannot_delete_platform','var' => 'warning_msg_cannot_del'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<?php $this->assign('viewAction', "lib/platforms/platformsView.php"); ?>
<?php $this->assign('dummy', "lib/platforms/platformsImport.php?goback_url="); ?>
<?php $this->assign('importAction', ($this->_tpl_vars['basehref']).($this->_tpl_vars['dummy']).($this->_tpl_vars['basehref']).($this->_tpl_vars['viewAction'])); ?>


<script type="text/javascript">
<!--
	/* All this stuff is needed for logic contained in inc_del_onclick.tpl */
	var del_action=fRoot+'lib/platforms/platformsEdit.php?doAction=do_delete&id=';
//-->
</script>
 
</head>
<body <?php echo $this->_tpl_vars['body_onload']; ?>
>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='platforms/platformsView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title"><?php echo $this->_tpl_vars['labels']['menu_manage_platforms']; ?>
</h1>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_feedback.tpl", 'smarty_include_vars' => array('user_feedback' => $this->_tpl_vars['gui']->user_feedback)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="workBack">
<?php if ($this->_tpl_vars['gui']->platforms != ''): ?>
	<table class="simple sortable" style="width:95%">
		<tr>
			<th width="30%"><?php echo $this->_tpl_vars['toggle_api_info_img']; ?>
<?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_platform']; ?>
</th>
			<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_notes']; ?>
</th>
			<?php if ($this->_tpl_vars['gui']->canManage != ""): ?>
				<th><?php echo $this->_tpl_vars['labels']['th_delete']; ?>
</th>
			<?php endif; ?>
		</tr>
		<?php unset($this->_sections['platform']);
$this->_sections['platform']['name'] = 'platform';
$this->_sections['platform']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->platforms) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['platform']['show'] = true;
$this->_sections['platform']['max'] = $this->_sections['platform']['loop'];
$this->_sections['platform']['step'] = 1;
$this->_sections['platform']['start'] = $this->_sections['platform']['step'] > 0 ? 0 : $this->_sections['platform']['loop']-1;
if ($this->_sections['platform']['show']) {
    $this->_sections['platform']['total'] = $this->_sections['platform']['loop'];
    if ($this->_sections['platform']['total'] == 0)
        $this->_sections['platform']['show'] = false;
} else
    $this->_sections['platform']['total'] = 0;
if ($this->_sections['platform']['show']):

            for ($this->_sections['platform']['index'] = $this->_sections['platform']['start'], $this->_sections['platform']['iteration'] = 1;
                 $this->_sections['platform']['iteration'] <= $this->_sections['platform']['total'];
                 $this->_sections['platform']['index'] += $this->_sections['platform']['step'], $this->_sections['platform']['iteration']++):
$this->_sections['platform']['rownum'] = $this->_sections['platform']['iteration'];
$this->_sections['platform']['index_prev'] = $this->_sections['platform']['index'] - $this->_sections['platform']['step'];
$this->_sections['platform']['index_next'] = $this->_sections['platform']['index'] + $this->_sections['platform']['step'];
$this->_sections['platform']['first']      = ($this->_sections['platform']['iteration'] == 1);
$this->_sections['platform']['last']       = ($this->_sections['platform']['iteration'] == $this->_sections['platform']['total']);
?>
		<tr>
			<td>
				<span class="api_info" style='display:none'><?php echo ((is_array($_tmp=$this->_tpl_vars['tlCfg']->api->id_format)) ? $this->_run_mod_handler('replace', true, $_tmp, "%s", $this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['id']) : smarty_modifier_replace($_tmp, "%s", $this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['id'])); ?>
</span>
				<?php if ($this->_tpl_vars['gui']->canManage != ""): ?>
					<a href="lib/platforms/platformsEdit.php?doAction=edit&amp;id=<?php echo $this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['id']; ?>
">
				<?php endif; ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				<?php if ($this->_tpl_vars['gui']->canManage != ""): ?>
					</a>
				<?php endif; ?>
			</td>
			<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['notes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
			<?php if ($this->_tpl_vars['gui']->canManage != ""): ?>
			<td class="clickable_icon">
				<?php if ($this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['linked_count'] == 0): ?>
				<img style="border:none;cursor: pointer;"
						alt="<?php echo $this->_tpl_vars['labels']['alt_delete_platform']; ?>
"
						title="<?php echo $this->_tpl_vars['labels']['alt_delete_platform']; ?>
"
						src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash.png"
						onclick="delete_confirmation(<?php echo $this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['id']; ?>
,
							'<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
				              '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');" />
				<?php else: ?>
					<img style="border:none;cursor: pointer;"
						alt="<?php echo $this->_tpl_vars['labels']['alt_delete_platform']; ?>
"
						title="<?php echo $this->_tpl_vars['labels']['alt_delete_platform']; ?>
"
						src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash_greyed.png"
						onclick="alert_message_html(
							'<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo ((is_array($_tmp=$this->_tpl_vars['warning_msg_cannot_del'])) ? $this->_run_mod_handler('replace', true, $_tmp, '%s', $this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['name']) : smarty_modifier_replace($_tmp, '%s', $this->_tpl_vars['gui']->platforms[$this->_sections['platform']['index']]['name'])); ?>
');" />
				<?php endif; ?>
			</td>
			<?php endif; ?>
		</tr>
		<?php endfor; endif; ?>
	</table>
 <?php endif; ?>
	
	<div class="groupBtn">	
   		<form style="float:left" name="platform_view" id="platform_view" method="post" action="lib/platforms/platformsEdit.php">
	  		<input type="hidden" name="doAction" value="" />
		  	<?php if ($this->_tpl_vars['gui']->canManage != ""): ?>
		    	<input type="submit" id="create_platform" name="create_platform"
		        	value="<?php echo $this->_tpl_vars['labels']['btn_create_platform']; ?>
"
		           	onclick="doAction.value='create'"/>
			  <?php endif; ?>	
		</form>
     	<form name="platformsExport" id="platformsExport" method="post" action="lib/platforms/platformsExport.php">
     		<input type="hidden" name="goback_url" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['basehref'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['viewAction'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
			<input type="submit" name="export_platforms" id="export_platforms"
		         style="margin-left: 3px;" value="<?php echo $this->_tpl_vars['labels']['btn_export']; ?>
" />
		  	<?php if ($this->_tpl_vars['gui']->canManage != ""): ?>       
		  		<input type="button" name="import_platforms" id="import_platforms" 
		         	onclick="location='<?php echo $this->_tpl_vars['importAction']; ?>
'" value="<?php echo $this->_tpl_vars['labels']['btn_import']; ?>
" />
       	  	<?php endif; ?>
	  	</form>
    </div>
</div>
</body>
</html>