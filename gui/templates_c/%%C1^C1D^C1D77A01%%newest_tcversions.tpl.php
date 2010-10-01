<?php /* Smarty version 2.6.26, created on 2010-09-28 13:19:58
         compiled from plan/newest_tcversions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'plan/newest_tcversions.tpl', 12, false),array('function', 'html_options', 'plan/newest_tcversions.tpl', 33, false),array('modifier', 'escape', 'plan/newest_tcversions.tpl', 26, false),)), $this); ?>

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

<?php echo lang_get_smarty(array('var' => 'labels','s' => 'testproject,test_plan,th_id,th_test_case,title_newest_tcversions,linked_version,newest_version'), $this);?>


</head>
<body>

<h1 class="title"> <?php echo $this->_tpl_vars['labels']['title_newest_tcversions']; ?>
 
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_planTcModified','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>

<form method="post" id="newest_tcversions.tpl">
  <table>
  <tr>
   <td><?php echo $this->_tpl_vars['labels']['testproject']; ?>
<?php echo @TITLE_SEP; ?>
</td>
   <td><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tproject_name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
  </tr>
  
  <tr>
    <td><?php echo $this->_tpl_vars['labels']['test_plan']; ?>
</td>
    <td>
      <select name="tplan_id" id="tplan_id" onchange="this.form.submit()">  
         <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->tplans,'selected' => $this->_tpl_vars['gui']->tplan_id), $this);?>

      </select>
    </td>
  </tr>
  </table>
</form>

<?php if ($this->_tpl_vars['gui']->show_details): ?>
  <div class="workBack" style="height: 380px; overflow-y: auto;">

    <table cellspacing="0" style="font-size:small;" width="100%">
      <tr style="background-color:blue;font-weight:bold;color:white">
		    		    <td><?php echo $this->_tpl_vars['labels']['th_test_case']; ?>
</td>
		    <td><?php echo $this->_tpl_vars['labels']['linked_version']; ?>
</td>
		    <td><?php echo $this->_tpl_vars['labels']['newest_version']; ?>
</td>
		    <td>&nbsp;</td>
      </tr>   
    
      <?php $_from = $this->_tpl_vars['gui']->testcases; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tc']):
?>
      <tr>
		 
		<td> <?php echo $this->_tpl_vars['tc']['path']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->tcasePrefix)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['tc']['tc_external_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['tc']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>  
		<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['tc']['version'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
		<td> <?php echo ((is_array($_tmp=$this->_tpl_vars['tc']['newest_version'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 </td>
      </tr>
  	  <?php endforeach; endif; unset($_from); ?>
  	</table>
  </div>
<?php else: ?>
	<h2><?php echo $this->_tpl_vars['gui']->user_feedback; ?>
</h2>
<?php endif; ?>

</body>
</html>