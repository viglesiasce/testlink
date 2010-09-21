<?php /* Smarty version 2.6.26, created on 2010-09-03 15:41:51
         compiled from opt_transfer.inc.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'opt_transfer.inc.tpl', 17, false),array('function', 'html_options', 'opt_transfer.inc.tpl', 24, false),)), $this); ?>
  
   <div class="option_transfer_container">
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
      <?php if ($this->_tpl_vars['option_transfer']->global_lbl != ''): ?>
  		<caption style="font-weight:bold;">
  	  <?php echo $this->_tpl_vars['option_transfer']->global_lbl; ?>

    	&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['option_transfer']->additional_global_lbl)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		  </caption>
		  <?php endif; ?>

    <tr>
      <td align="center" width="50%">
         <div class="labelHolder"><?php echo $this->_tpl_vars['option_transfer']->from->lbl; ?>
</div>
         <?php echo smarty_function_html_options(array('name' => $this->_tpl_vars['option_transfer']->from->name,'id' => $this->_tpl_vars['option_transfer']->from->name,'size' => $this->_tpl_vars['option_transfer']->size,'style' => $this->_tpl_vars['option_transfer']->style,'multiple' => 'yes','ondblclick' => $this->_tpl_vars['opt_cfg']->js_events->left2right_click,'options' => $this->_tpl_vars['option_transfer']->from->map), $this);?>

      </td>
      <td align="center" width="40">
        <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/ico_all_r.gif" 
              onclick="<?php echo $this->_tpl_vars['opt_cfg']->js_events->all_right_click; ?>
"
              alt=">>" style="cursor: pointer;" /><br />
        <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/ico_l2r.gif" 
              onclick="<?php echo $this->_tpl_vars['opt_cfg']->js_events->left2right_click; ?>
"
              alt=">" style="cursor: pointer;" /><br />
        <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/ico_r2l.gif" 
              onclick="<?php echo $this->_tpl_vars['opt_cfg']->js_events->right2left_click; ?>
"
              alt="<" style="cursor: pointer;" /><br />
        <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/ico_all_l.gif" 
              onclick="<?php echo $this->_tpl_vars['opt_cfg']->js_events->all_left_click; ?>
"
              alt="<<" style="cursor: pointer;" />
      </td>
      <td align="center" width="50%">
         <div class="labelHolder"><?php echo $this->_tpl_vars['option_transfer']->to->lbl; ?>
</div>
         <?php echo smarty_function_html_options(array('name' => $this->_tpl_vars['option_transfer']->to->name,'id' => $this->_tpl_vars['option_transfer']->to->name,'size' => $this->_tpl_vars['option_transfer']->size,'style' => $this->_tpl_vars['option_transfer']->style,'multiple' => 'yes','ondblclick' => $this->_tpl_vars['opt_cfg']->js_events->right2left_click,'options' => $this->_tpl_vars['option_transfer']->to->map), $this);?>

      </td>
    </tr>
  </table>
  </div>
  <input type="hidden" name="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedLeft"  value="" />
  <input type="hidden" name="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_removedRight"  value="" />
  <input type="hidden" name="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedLeft"  value="" />
  <input type="hidden" name="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_addedRight"  value="" />
  <input type="hidden" name="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newLeft"  value="" />
  <input type="hidden" name="<?php echo $this->_tpl_vars['opt_cfg']->js_ot_name; ?>
_newRight"  value="" />