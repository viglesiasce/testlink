<?php /* Smarty version 2.6.26, created on 2010-09-09 13:52:14
         compiled from results/printDocOptions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'results/printDocOptions.tpl', 9, false),array('function', 'html_options', 'results/printDocOptions.tpl', 85, false),array('modifier', 'escape', 'results/printDocOptions.tpl', 28, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'doc_opt_title,doc_opt_guide,tr_td_show_as,check_uncheck_all_options'), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array('bResetEXTCss' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_jsCheckboxes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['gui']->ajaxTree->loadFromChildren): ?>
    <?php echo '
    <script type="text/javascript">
    <!--
    treeCfg = {tree_div_id:\'tree\',root_name:"",root_id:0,root_href:"",
               loader:"", enableDD:false, dragDropBackEndUrl:\'\',children:""};
    //-->
    </script>
    '; ?>

    
    <script type="text/javascript">
    <!--
	    treeCfg.root_name = '<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->ajaxTree->root_node->name)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
	    treeCfg.root_id = <?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->id; ?>
;
	    treeCfg.root_href = '<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->href; ?>
';
	    treeCfg.children = <?php echo $this->_tpl_vars['gui']->ajaxTree->children; ?>

	    treeCfg.cookiePrefix = '<?php echo $this->_tpl_vars['gui']->ajaxTree->cookiePrefix; ?>
';
    //-->
    </script>

    <script type="text/javascript" src='gui/javascript/execTree.js'></script>
<?php else: ?>
    <?php echo '
    <script type="text/javascript">
    	treeCfg = {tree_div_id:\'tree\',root_name:"",root_id:0,root_href:"",
               loader:"", enableDD:false, dragDropBackEndUrl:\'\'};
    </script>
    '; ?>

    
    <script type="text/javascript">
    <!--
		treeCfg.loader = '<?php echo $this->_tpl_vars['gui']->ajaxTree->loader; ?>
';
		treeCfg.root_name = '<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->ajaxTree->root_node->name)) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
';
		treeCfg.root_id = <?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->id; ?>
;
		treeCfg.root_href = '<?php echo $this->_tpl_vars['gui']->ajaxTree->root_node->href; ?>
';
		treeCfg.enableDD = '<?php echo $this->_tpl_vars['gui']->ajaxTree->dragDrop->enabled; ?>
';
		treeCfg.dragDropBackEndUrl = '<?php echo $this->_tpl_vars['gui']->ajaxTree->dragDrop->BackEndUrl; ?>
';
    //-->
    </script>
    <script type="text/javascript" src='gui/javascript/treebyloader.js'></script>
<?php endif; ?> 
</head>

<body>
<h1 class="title"><?php echo $this->_tpl_vars['gui']->mainTitle; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_generateDocOptions','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></h1>

<div style="margin: 10px;">
<p><?php echo $this->_tpl_vars['labels']['doc_opt_guide']; ?>
<br /></p>
<form method="GET" id="printDocOptions" name="printDocOptions"
      action="lib/results/printDocument.php?type=<?php echo $this->_tpl_vars['gui']->doc_type; ?>
">

	<input type="hidden" name="docTestPlanId" value="<?php echo $this->_tpl_vars['docTestPlanId']; ?>
" />
  	<input type="hidden" name="toggle_memory" id="toggle_memory"  value="0" />

	<table class="smallGrey" id="optionsContainer" name="optionsContainer">
		<?php unset($this->_sections['number']);
$this->_sections['number']['name'] = 'number';
$this->_sections['number']['loop'] = is_array($_loop=$this->_tpl_vars['arrCheckboxes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['number']['show'] = true;
$this->_sections['number']['max'] = $this->_sections['number']['loop'];
$this->_sections['number']['step'] = 1;
$this->_sections['number']['start'] = $this->_sections['number']['step'] > 0 ? 0 : $this->_sections['number']['loop']-1;
if ($this->_sections['number']['show']) {
    $this->_sections['number']['total'] = $this->_sections['number']['loop'];
    if ($this->_sections['number']['total'] == 0)
        $this->_sections['number']['show'] = false;
} else
    $this->_sections['number']['total'] = 0;
if ($this->_sections['number']['show']):

            for ($this->_sections['number']['index'] = $this->_sections['number']['start'], $this->_sections['number']['iteration'] = 1;
                 $this->_sections['number']['iteration'] <= $this->_sections['number']['total'];
                 $this->_sections['number']['index'] += $this->_sections['number']['step'], $this->_sections['number']['iteration']++):
$this->_sections['number']['rownum'] = $this->_sections['number']['iteration'];
$this->_sections['number']['index_prev'] = $this->_sections['number']['index'] - $this->_sections['number']['step'];
$this->_sections['number']['index_next'] = $this->_sections['number']['index'] + $this->_sections['number']['step'];
$this->_sections['number']['first']      = ($this->_sections['number']['iteration'] == 1);
$this->_sections['number']['last']       = ($this->_sections['number']['iteration'] == $this->_sections['number']['total']);
?>
		<tr>
			<td><?php echo $this->_tpl_vars['arrCheckboxes'][$this->_sections['number']['index']]['description']; ?>
</td>
			<td>
				<input type="checkbox" name="<?php echo $this->_tpl_vars['arrCheckboxes'][$this->_sections['number']['index']]['value']; ?>
" id="cb<?php echo $this->_tpl_vars['arrCheckboxes'][$this->_sections['number']['index']]['value']; ?>
"
				<?php if ($this->_tpl_vars['arrCheckboxes'][$this->_sections['number']['index']]['checked'] == 'y'): ?>checked="checked"<?php endif; ?>/>
			</td>
		</tr>
		<?php endfor; endif; ?>
		<tr>
		<?php if ($this->_tpl_vars['docType'] == 'testspec' || $this->_tpl_vars['docType'] == 'reqspec'): ?>
			<td><?php echo $this->_tpl_vars['labels']['tr_td_show_as']; ?>
</td>
			<td>
				<select id="format" name="format">
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->outputFormat,'selected' => $this->_tpl_vars['selFormat']), $this);?>

				</select>
			</td>
		<?php else: ?>
		    <td><input type="hidden" id="format" name="format" value="<?php echo $this->_tpl_vars['selFormat']; ?>
" /></td>
		<?php endif; ?>
		</tr>
		<tr>
		 <td><input type="button" id="toogleOptions" name="toogleOptions"
		            onclick='cs_all_checkbox_in_div("optionsContainer","cb","toggle_memory");'
		            value="<?php echo $this->_tpl_vars['labels']['check_uncheck_all_options']; ?>
" /> </td>
		</tr>
	</table>
</form>
</div>

<div id="tree" style="overflow:auto; height:400px;border:1px solid #c3daf9;"></div>

</body>
</html>