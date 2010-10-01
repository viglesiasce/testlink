<?php /* Smarty version 2.6.26, created on 2010-09-30 15:47:37
         compiled from inc_msg_from_array.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'inc_msg_from_array.tpl', 9, false),)), $this); ?>
	<div class="<?php echo $this->_tpl_vars['arg_css_class']; ?>
">
		<ul>
		<?php $_from = $this->_tpl_vars['array_of_msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
			<li><?php echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>