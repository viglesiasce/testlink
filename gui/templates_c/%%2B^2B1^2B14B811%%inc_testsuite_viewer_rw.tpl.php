<?php /* Smarty version 2.6.26, created on 2010-09-03 15:41:51
         compiled from testcases/inc_testsuite_viewer_rw.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'testcases/inc_testsuite_viewer_rw.tpl', 10, false),array('modifier', 'escape', 'testcases/inc_testsuite_viewer_rw.tpl', 14, false),)), $this); ?>
    <p>
		<div class="labelHolder">
		 <label for="name"><?php echo lang_get_smarty(array('s' => 'comp_name'), $this);?>
</label>
		</div> 
		<div>
			<input type="text" id="name" name="container_name" alt="<?php echo lang_get_smarty(array('s' => 'comp_alt_name'), $this);?>
"
			       value="<?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" 
			       size="<?php echo $this->_config[0]['vars']['CONTAINER_NAME_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['CONTAINER_NAME_MAXLEN']; ?>
"
			       />
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "error_icon.tpl", 'smarty_include_vars' => array('field' => 'container_name')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       
	   </p>
    </div>
    <p>
		<div class="labelHolder">
		<label for="details"><?php echo lang_get_smarty(array('s' => 'details'), $this);?>
</label>
		</div>
		<div>
		<?php echo $this->_tpl_vars['details']; ?>

		</div>