<?php /* Smarty version 2.6.26, created on 2010-09-27 14:26:26
         compiled from keywords/keywordsAssign.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'keywords/keywordsAssign.tpl', 31, false),array('modifier', 'escape', 'keywords/keywordsAssign.tpl', 41, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script language="JavaScript" src="gui/javascript/OptionTransfer.js" type="text/javascript"></script>
<script language="JavaScript" src="gui/javascript/expandAndCollapseFunctions.js" type="text/javascript"></script>

<?php if ($this->_tpl_vars['can_do']): ?> 
<script type="text/javascript" language="JavaScript">
var <?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
 = new OptionTransfer("<?php echo $this->_tpl_vars['opt_cfg']->from->name; ?>
","<?php echo $this->_tpl_vars['opt_cfg']->to->name; ?>
");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveRemovedLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveRemovedRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedRight");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveAddedLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveAddedRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedRight");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveNewLeftOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newLeft");
<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.saveNewRightOptions("<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newRight");
</script>
<?php endif; ?>
</head>

<body 
<?php if ($this->_tpl_vars['can_do']): ?> 
	onLoad="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
.init(document.forms[0])"
<?php endif; ?>	
>

<div class="workBack">
    <h1 class="title"><?php echo lang_get_smarty(array('s' => 'title_keywords'), $this);?>
</h1>
        <div class="tabMenu">
    	<span class="unselected"><a href="lib/keywords/keywordsView.php"
    			target='mainframe'><?php echo lang_get_smarty(array('s' => 'menu_manage_keywords'), $this);?>
</a></span> 
    	<span class="selected"><?php echo lang_get_smarty(array('s' => 'menu_assign_kw_to_tc'), $this);?>
</span> 
    </div>

	<?php if ($this->_tpl_vars['can_do']): ?> 
     <?php if ($this->_tpl_vars['keyword_assignment_subtitle'] != ''): ?>
      <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['keyword_assignment_subtitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
     <?php endif; ?>
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'],'item' => $this->_tpl_vars['level'],'action' => 'updated')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
    
        <div style="margin-top: 25px;">
    	<form method="post" action="lib/keywords/keywordsAssign.php?id=<?php echo $this->_tpl_vars['data']; ?>
&amp;edit=<?php echo $this->_tpl_vars['level']; ?>
">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "opt_transfer.inc.tpl", 'smarty_include_vars' => array('option_transfer' => $this->_tpl_vars['opt_cfg'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	    <br />
    	<input type="submit" name="assign<?php echo $this->_tpl_vars['level']; ?>
" value="<?php echo lang_get_smarty(array('s' => 'btn_save'), $this);?>
" />
    	</form>
    </div>
  <?php else: ?>
     <?php if ($this->_tpl_vars['keyword_assignment_subtitle'] != ''): ?>
      <h2> <?php echo $this->_tpl_vars['keyword_assignment_subtitle']; ?>
</h2>
     <?php endif; ?>
    <?php echo lang_get_smarty(array('s' => 'keyword_assignment_empty_tsuite'), $this);?>

  <?php endif; ?>  
</div>
</body>
</html>