<?php /* Smarty version 2.6.26, created on 2010-10-09 10:27:30
         compiled from testcases/inc_testsuite_viewer_ro.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'testcases/inc_testsuite_viewer_ro.tpl', 10, false),)), $this); ?>
<table class="simple" style="width: 90%">
	<tr>
		<th colspan="2"><?php echo $this->_tpl_vars['labels']['test_suite']; ?>
<?php echo $this->_tpl_vars['tlCfg']->gui_title_separator_1; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->container_data['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</th>
	</tr>
	<tr>
		<td colspan="2">
			<fieldset class="x-fieldset x-form-label-left">
			<legend class="legend_container"><?php echo $this->_tpl_vars['labels']['details']; ?>
</legend>
			<?php echo $this->_tpl_vars['gui']->container_data['details']; ?>

			</fieldset>
		</td>
	</tr>
		
		<tr>
	  	<td style="width: 20%">
    		<a href=<?php echo $this->_tpl_vars['gsmarty_href_keywordsView']; ?>
><?php echo $this->_tpl_vars['labels']['keywords']; ?>
</a><?php echo $this->_tpl_vars['tlCfg']->gui_title_separator_1; ?>

    	</td>
    	<td>
    	  	<?php $_from = $this->_tpl_vars['gui']->keywords_map; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['keyword_item']):
?>
    		    <?php echo ((is_array($_tmp=$this->_tpl_vars['keyword_item'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
    		<?php endforeach; else: ?>
    		    <?php echo $this->_tpl_vars['labels']['none']; ?>

    		<?php endif; unset($_from); ?>
    	</td>
	</tr>

		<tr>
	  <td colspan="2">
  	<?php echo $this->_tpl_vars['gui']->cf; ?>

  	  </td>
	</tr>

</table>