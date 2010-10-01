<?php /* Smarty version 2.6.26, created on 2010-09-27 15:50:41
         compiled from inc_show_hide_mgmt.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'inc_show_hide_mgmt.tpl', 12, false),)), $this); ?>
<?php $this->assign('show_hide_container_draw', ((is_array($_tmp=@$this->_tpl_vars['show_hide_container_draw'])) ? $this->_run_mod_handler('default', true, $_tmp, false) : smarty_modifier_default($_tmp, false))); ?>
<?php $this->assign('show_hide_container_class', ((is_array($_tmp=@$this->_tpl_vars['show_hide_container_class'])) ? $this->_run_mod_handler('default', true, $_tmp, 'exec_additional_info') : smarty_modifier_default($_tmp, 'exec_additional_info'))); ?>


<input type='hidden' id="<?php echo $this->_tpl_vars['show_hide_container_view_status_id']; ?>
"
         name="<?php echo $this->_tpl_vars['show_hide_container_view_status_id']; ?>
"  value="0" />

<div class="x-panel-header x-unselectable">
	<div class="x-tool x-tool-toggle" style="background-position:0 -75px; float:left;"
		onclick="show_hide('<?php echo $this->_tpl_vars['show_hide_container_id']; ?>
',
	              '<?php echo $this->_tpl_vars['show_hide_container_view_status_id']; ?>
',
	              document.getElementById('<?php echo $this->_tpl_vars['show_hide_container_id']; ?>
').style.display=='none')">
	</div>
	<span style="padding:2px;"><?php echo $this->_tpl_vars['show_hide_container_title']; ?>
</span>
</div>

<?php if ($this->_tpl_vars['show_hide_container_draw']): ?>
	<div id="<?php echo $this->_tpl_vars['show_hide_container_id']; ?>
" class="<?php echo $this->_tpl_vars['show_hide_container_class']; ?>
">
		<?php echo $this->_tpl_vars['show_hide_container_html']; ?>

	</div>
<?php endif; ?>