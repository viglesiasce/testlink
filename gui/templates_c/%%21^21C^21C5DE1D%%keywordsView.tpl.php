<?php /* Smarty version 2.6.26, created on 2010-09-27 13:22:15
         compiled from keywords/keywordsView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'keywords/keywordsView.tpl', 9, false),array('function', 'config_load', 'keywords/keywordsView.tpl', 24, false),array('modifier', 'basename', 'keywords/keywordsView.tpl', 23, false),array('modifier', 'replace', 'keywords/keywordsView.tpl', 23, false),array('modifier', 'escape', 'keywords/keywordsView.tpl', 44, false),array('modifier', 'nl2br', 'keywords/keywordsView.tpl', 49, false),)), $this); ?>
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

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'th_notes,th_keyword,th_delete,btn_import,btn_export,
             menu_assign_kw_to_tc,btn_create_keyword'), $this);?>


<?php echo lang_get_smarty(array('s' => 'warning_delete_keyword','var' => 'warning_msg'), $this);?>

<?php echo lang_get_smarty(array('s' => 'delete','var' => 'del_msgbox_title'), $this);?>


<script type="text/javascript">
/* All this stuff is needed for logic contained in inc_del_onclick.tpl */
var del_action=fRoot+'lib/keywords/keywordsEdit.php?doAction=do_delete&id=';
</script>
 
</head>
<body <?php echo $this->_tpl_vars['body_onload']; ?>
>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='keywords/keywordsView.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<h1 class="title"><?php echo lang_get_smarty(array('s' => 'menu_manage_keywords'), $this);?>
</h1>

<div class="workBack">
	<?php if ($this->_tpl_vars['keywords'] != ''): ?>
	<table class="simple sortable" style="width:98%">
		<tr>
			<th width="30%"><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_keyword']; ?>
</th>
			<th><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_notes']; ?>
</th>
			<?php if ($this->_tpl_vars['canManage'] != ""): ?>
				<th style="min-width:70px"><?php echo $this->_tpl_vars['sortHintIcon']; ?>
<?php echo $this->_tpl_vars['labels']['th_delete']; ?>
</th>
			<?php endif; ?>
		</tr>
		<?php unset($this->_sections['myKeyword']);
$this->_sections['myKeyword']['name'] = 'myKeyword';
$this->_sections['myKeyword']['loop'] = is_array($_loop=$this->_tpl_vars['keywords']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['myKeyword']['show'] = true;
$this->_sections['myKeyword']['max'] = $this->_sections['myKeyword']['loop'];
$this->_sections['myKeyword']['step'] = 1;
$this->_sections['myKeyword']['start'] = $this->_sections['myKeyword']['step'] > 0 ? 0 : $this->_sections['myKeyword']['loop']-1;
if ($this->_sections['myKeyword']['show']) {
    $this->_sections['myKeyword']['total'] = $this->_sections['myKeyword']['loop'];
    if ($this->_sections['myKeyword']['total'] == 0)
        $this->_sections['myKeyword']['show'] = false;
} else
    $this->_sections['myKeyword']['total'] = 0;
if ($this->_sections['myKeyword']['show']):

            for ($this->_sections['myKeyword']['index'] = $this->_sections['myKeyword']['start'], $this->_sections['myKeyword']['iteration'] = 1;
                 $this->_sections['myKeyword']['iteration'] <= $this->_sections['myKeyword']['total'];
                 $this->_sections['myKeyword']['index'] += $this->_sections['myKeyword']['step'], $this->_sections['myKeyword']['iteration']++):
$this->_sections['myKeyword']['rownum'] = $this->_sections['myKeyword']['iteration'];
$this->_sections['myKeyword']['index_prev'] = $this->_sections['myKeyword']['index'] - $this->_sections['myKeyword']['step'];
$this->_sections['myKeyword']['index_next'] = $this->_sections['myKeyword']['index'] + $this->_sections['myKeyword']['step'];
$this->_sections['myKeyword']['first']      = ($this->_sections['myKeyword']['iteration'] == 1);
$this->_sections['myKeyword']['last']       = ($this->_sections['myKeyword']['iteration'] == $this->_sections['myKeyword']['total']);
?>
		<tr>
			<td>
				<?php if ($this->_tpl_vars['canManage'] != ""): ?>
					<a href="lib/keywords/keywordsEdit.php?doAction=edit&amp;id=<?php echo $this->_tpl_vars['keywords'][$this->_sections['myKeyword']['index']]->dbID; ?>
">
				<?php endif; ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['keywords'][$this->_sections['myKeyword']['index']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				<?php if ($this->_tpl_vars['canManage'] != ""): ?>
					</a>
				<?php endif; ?>
			</td>
			<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['keywords'][$this->_sections['myKeyword']['index']]->notes)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
			<?php if ($this->_tpl_vars['canManage'] != ""): ?>
				<td class="clickable_icon">
			  		<img style="border:none;cursor: pointer;"
			       		alt="<?php echo lang_get_smarty(array('s' => 'alt_delete_keyword'), $this);?>
"
             			title="<?php echo lang_get_smarty(array('s' => 'alt_delete_keyword'), $this);?>
"   
             			src="<?php echo @TL_THEME_IMG_DIR; ?>
/trash.png"			     
				     	onclick="delete_confirmation(<?php echo $this->_tpl_vars['keywords'][$this->_sections['myKeyword']['index']]->dbID; ?>
,
				              '<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['keywords'][$this->_sections['myKeyword']['index']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
',
				              '<?php echo $this->_tpl_vars['del_msgbox_title']; ?>
','<?php echo $this->_tpl_vars['warning_msg']; ?>
');" />
				</td>
			<?php endif; ?>
		</tr>
		<?php endfor; endif; ?>
	</table>
	<?php endif; ?>
	

	<div class="groupBtn">	
	  	<form name="keyword_view" id="keyword_view" method="post" action="lib/keywords/keywordsEdit.php"> 
	  	  <input type="hidden" name="doAction" value="" />
	
		<?php if ($this->_tpl_vars['canManage'] != ""): ?>
	  		<input type="submit" id="create_keyword" name="create_keyword" 
	  	           value="<?php echo $this->_tpl_vars['labels']['btn_create_keyword']; ?>
" 
	  	           onclick="doAction.value='create'"/>
		<?php endif; ?>
	    <?php if ($this->_tpl_vars['keywords'] != ''): ?>
	    	<input type="button" id="keyword_assign" name="keyword_assign" 
	  	    	value="<?php echo $this->_tpl_vars['labels']['menu_assign_kw_to_tc']; ?>
" 
	  	        onclick="location.href=fRoot+'lib/general/frmWorkArea.php?feature=keywordsAssign';"/>
	    <?php endif; ?>    
		
		<?php if ($this->_tpl_vars['canManage'] != ""): ?>
			<input type="button" name="do_import" value="<?php echo $this->_tpl_vars['labels']['btn_import']; ?>
" 
		 		onclick="location='<?php echo $this->_tpl_vars['basehref']; ?>
/lib/keywords/keywordsImport.php'" />
		<?php endif; ?>
	
	    <?php if ($this->_tpl_vars['keywords'] != ''): ?>
			<input type="button" name="do_export" value="<?php echo $this->_tpl_vars['labels']['btn_export']; ?>
" 
		 		onclick="location='<?php echo $this->_tpl_vars['basehref']; ?>
/lib/keywords/keywordsExport.php?doAction=export'" />
	    <?php endif; ?>
	  	</form>
	</div>
</div>

</body>
</html>