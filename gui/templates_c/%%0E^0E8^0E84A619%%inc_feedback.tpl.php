<?php /* Smarty version 2.6.26, created on 2010-09-03 15:35:45
         compiled from inc_feedback.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'inc_feedback.tpl', 26, false),)), $this); ?>

<?php if ($this->_tpl_vars['user_feedback']['message'] != ''): ?>
    <?php if ($this->_tpl_vars['user_feedback']['type'] === ERROR): ?>
		<?php $this->assign('divClass', 'error'); ?>
  	<?php else: ?>
		<?php $this->assign('divClass', 'user_feedback'); ?>
	<?php endif; ?>
    <div class="<?php echo $this->_tpl_vars['divClass']; ?>
">
		<p><?php echo ((is_array($_tmp=$this->_tpl_vars['user_feedback']['message'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
	</div>
<?php endif; ?>  