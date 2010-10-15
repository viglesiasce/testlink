<?php /* Smarty version 2.6.26, created on 2010-10-09 10:26:36
         compiled from inc_update.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'inc_update.tpl', 33, false),array('modifier', 'default', 'inc_update.tpl', 45, false),array('function', 'lang_get', 'inc_update.tpl', 40, false),)), $this); ?>

<?php if ($this->_tpl_vars['user_feedback'] != ''): ?>
    <?php if ($this->_tpl_vars['feedback_type'] != ""): ?>
    	<div class="warning_<?php echo $this->_tpl_vars['feedback_type']; ?>
">	
  	<?php else: ?>
     <div class="user_feedback">
  	 <?php endif; ?>
		<?php $_from = $this->_tpl_vars['user_feedback']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['msg']):
?>
			<p><?php echo ((is_array($_tmp=$this->_tpl_vars['msg'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
		<?php endforeach; endif; unset($_from); ?>
     </div>

<?php else: ?>
  <?php if ($this->_tpl_vars['result'] == 'ok'): ?>
  
    <?php echo lang_get_smarty(array('s' => $this->_tpl_vars['action'],'var' => 'action'), $this);?>

  	<?php echo lang_get_smarty(array('s' => $this->_tpl_vars['item'],'var' => 'item'), $this);?>

  	
    <?php if ($this->_tpl_vars['feedback_type'] == 'soft'): ?>
    	<div class="warning_<?php echo $this->_tpl_vars['feedback_type']; ?>
">	
  		<p><?php echo ((is_array($_tmp=@$this->_tpl_vars['item'])) ? $this->_run_mod_handler('default', true, $_tmp, 'item') : smarty_modifier_default($_tmp, 'item')); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p> 
        	<p><?php echo lang_get_smarty(array('s' => 'was_success'), $this);?>
 <?php echo ((is_array($_tmp=@$this->_tpl_vars['action'])) ? $this->_run_mod_handler('default', true, $_tmp, 'updated') : smarty_modifier_default($_tmp, 'updated')); ?>
!</p>
    	</div>
  	<?php else: ?>
    	<div class="user_feedback">
  	  	<p><?php echo ((is_array($_tmp=@$this->_tpl_vars['item'])) ? $this->_run_mod_handler('default', true, $_tmp, 'item') : smarty_modifier_default($_tmp, 'item')); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 
           <?php echo lang_get_smarty(array('s' => 'was_success'), $this);?>
 <?php echo ((is_array($_tmp=@$this->_tpl_vars['action'])) ? $this->_run_mod_handler('default', true, $_tmp, 'updated') : smarty_modifier_default($_tmp, 'updated')); ?>
!</p>
  	</div>
    <?php endif; ?>
    
  
  <?php elseif ($this->_tpl_vars['result'] != ""): ?>
  
    <?php if ($this->_tpl_vars['feedback_type'] == 'soft'): ?>
  		<div class="warning_<?php echo $this->_tpl_vars['feedback_type']; ?>
">	
  		  <p><?php echo lang_get_smarty(array('s' => 'warning'), $this);?>
</p> 
  			<p><?php echo ((is_array($_tmp=$this->_tpl_vars['result'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
    	</div>
  	<?php else: ?>
    	<div class="error">
        <p>
    		<?php if ($this->_tpl_vars['name'] == ""): ?>
    			<?php echo lang_get_smarty(array('s' => 'info_failed_db_upd'), $this);?>

    		<?php else: ?>
    			<?php echo lang_get_smarty(array('s' => 'info_failed_db_upd_details'), $this);?>
 <?php echo ((is_array($_tmp=@$this->_tpl_vars['item'])) ? $this->_run_mod_handler('default', true, $_tmp, 'item') : smarty_modifier_default($_tmp, 'item')); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

    		<?php endif; ?>
        </p>
    		<p><?php echo lang_get_smarty(array('s' => 'invalid_query'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['result'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
    	</div>
  	<?php endif; ?>
  <?php endif; ?>
<?php endif; ?>  
<?php if ($this->_tpl_vars['result'] == 'ok' && isset ( $this->_tpl_vars['refresh'] ) && $this->_tpl_vars['refresh']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_refreshTreeWithFilters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>