<?php /* Smarty version 2.6.26, created on 2010-09-30 11:59:42
         compiled from requirements/inc_req_import_viewer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/inc_req_import_viewer.tpl', 9, false),array('modifier', 'escape', 'requirements/inc_req_import_viewer.tpl', 34, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'btn_do,check_uncheck_all_checkboxes,th_id,
                          doc_id_short,scope,warning,check_uncheck_children_checkboxes,
                          title,version,assigned_to,assign_to,note_keyword_filter, priority'), $this);?>


<script type="text/javascript">
	var check_msg="";
	var alert_box_title = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
<?php echo '

function check_action_precondition(container_id,action)
{
	if(checkbox_count_checked(container_id) <= 0)
	{
		alert_message(alert_box_title,check_msg);
		return false;
	}
	return true;
}
</script>
'; ?>


   
<?php $this->assign('add_cb', 'achecked_req'); ?>

  	<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->main_descr)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
  <?php if ($this->_tpl_vars['gui']->has_items || true): ?>
   <div class="workBack">
	  <?php $this->assign('top_level', $this->_tpl_vars['gui']->items[0]['level']); ?>
	  <?php $_from = $this->_tpl_vars['gui']->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['div_drawing'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['div_drawing']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['rspec']):
        $this->_foreach['div_drawing']['iteration']++;
?>
	    <?php $this->assign('div_id', "div_".($this->_tpl_vars['idx'])); ?>
	    <?php if ($this->_tpl_vars['div_id'] != ''): ?>
	      <div id="<?php echo $this->_tpl_vars['div_id']; ?>
" style="margin-left:<?php echo $this->_tpl_vars['rspec']['level']; ?>
0px; border:1;">
                <?php if ($this->_tpl_vars['rspec']['req_spec'] != ''): ?>
          <br />
	        <h3 class="testlink"><img src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
			                              onclick='cs_all_checkbox_in_div("<?php echo $this->_tpl_vars['div_id']; ?>
","<?php echo $this->_tpl_vars['add_cb']; ?>
_","add_value_<?php echo $this->_tpl_vars['div_id']; ?>
");'
                                    title="<?php echo $this->_tpl_vars['labels']['check_uncheck_children_checkboxes']; ?>
" />
          <?php echo ((is_array($_tmp=$this->_tpl_vars['rspec']['req_spec']['doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
::<?php echo ((is_array($_tmp=$this->_tpl_vars['rspec']['req_spec']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	        </h3>
        <?php endif; ?>
                <input type="hidden" name="add_value_<?php echo $this->_tpl_vars['div_id']; ?>
"  id="add_value_<?php echo $this->_tpl_vars['div_id']; ?>
"  value="0" />

    	  <?php if (TRUE): ?>
          <?php if ($this->_tpl_vars['rspec']['requirements'] != ''): ?>
            <table cellspacing="0" style="font-size:small;" width="100%">
            			      			      <tr style="background-color:#059; font-weight:bold; color:white">
			      	<td width="5" align="center">
			          <img src="<?php echo @TL_THEME_IMG_DIR; ?>
/toggle_all.gif"
			               onclick='cs_all_checkbox_in_div("<?php echo $this->_tpl_vars['div_id']; ?>
","<?php echo $this->_tpl_vars['add_cb']; ?>
_","add_value_<?php echo $this->_tpl_vars['div_id']; ?>
");'
                     title="<?php echo $this->_tpl_vars['labels']['check_uncheck_all_checkboxes']; ?>
" />
			      	</td>
              <td><?php echo $this->_tpl_vars['labels']['doc_id_short']; ?>
</td> 
              <td><?php echo $this->_tpl_vars['labels']['title']; ?>
</td>
              <td align="center">&nbsp;&nbsp;<?php echo $this->_tpl_vars['labels']['scope']; ?>
</td>
            </tr>
                  
            <?php $_from = $this->_tpl_vars['rspec']['requirements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reqIndex'] => $this->_tpl_vars['req']):
?>
              <tr>
            	 	<td>
               		<input type="checkbox"  name='<?php echo $this->_tpl_vars['add_cb']; ?>
[<?php echo $this->_tpl_vars['idx']; ?>
][<?php echo $this->_tpl_vars['reqIndex']; ?>
]' align="middle"
                  			                        id='<?php echo $this->_tpl_vars['add_cb']; ?>
_<?php echo $this->_tpl_vars['idx']; ?>
_<?php echo $this->_tpl_vars['reqIndex']; ?>
' 
                    		                        value="1" />
            	    	</td>
            	    	<td>
            	    		<?php echo ((is_array($_tmp=$this->_tpl_vars['req']['docid'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

            	    	</td>
                    <td>
            	    	<?php echo ((is_array($_tmp=$this->_tpl_vars['req']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

            	    	</td>
                    <td align="center">
            	    		<?php echo ((is_array($_tmp=$this->_tpl_vars['req']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

            	    	</td>
                  </tr>
            <?php endforeach; endif; unset($_from); ?> 
          </table>
          <?php endif; ?>
      <?php endif; ?> 
      <?php if ($this->_tpl_vars['gui']->items_qty == $this->_foreach['div_drawing']['iteration']): ?>
          <?php $this->assign('next_level', 0); ?>
      <?php else: ?>
          <?php $this->assign('next_level', $this->_tpl_vars['gui']->items[$this->_foreach['div_drawing']['iteration']]['level']); ?>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['rspec']['level'] >= $this->_tpl_vars['next_level']): ?>
          <?php $this->assign('max_loop', $this->_tpl_vars['next_level']); ?>
          <?php $this->assign('max_loop', $this->_tpl_vars['rspec']['level']-$this->_tpl_vars['max_loop']+1); ?>
          <?php unset($this->_sections['div_closure']);
$this->_sections['div_closure']['name'] = 'div_closure';
$this->_sections['div_closure']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->support_array) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['div_closure']['max'] = (int)$this->_tpl_vars['max_loop'];
$this->_sections['div_closure']['show'] = true;
if ($this->_sections['div_closure']['max'] < 0)
    $this->_sections['div_closure']['max'] = $this->_sections['div_closure']['loop'];
$this->_sections['div_closure']['step'] = 1;
$this->_sections['div_closure']['start'] = $this->_sections['div_closure']['step'] > 0 ? 0 : $this->_sections['div_closure']['loop']-1;
if ($this->_sections['div_closure']['show']) {
    $this->_sections['div_closure']['total'] = min(ceil(($this->_sections['div_closure']['step'] > 0 ? $this->_sections['div_closure']['loop'] - $this->_sections['div_closure']['start'] : $this->_sections['div_closure']['start']+1)/abs($this->_sections['div_closure']['step'])), $this->_sections['div_closure']['max']);
    if ($this->_sections['div_closure']['total'] == 0)
        $this->_sections['div_closure']['show'] = false;
} else
    $this->_sections['div_closure']['total'] = 0;
if ($this->_sections['div_closure']['show']):

            for ($this->_sections['div_closure']['index'] = $this->_sections['div_closure']['start'], $this->_sections['div_closure']['iteration'] = 1;
                 $this->_sections['div_closure']['iteration'] <= $this->_sections['div_closure']['total'];
                 $this->_sections['div_closure']['index'] += $this->_sections['div_closure']['step'], $this->_sections['div_closure']['iteration']++):
$this->_sections['div_closure']['rownum'] = $this->_sections['div_closure']['iteration'];
$this->_sections['div_closure']['index_prev'] = $this->_sections['div_closure']['index'] - $this->_sections['div_closure']['step'];
$this->_sections['div_closure']['index_next'] = $this->_sections['div_closure']['index'] + $this->_sections['div_closure']['step'];
$this->_sections['div_closure']['first']      = ($this->_sections['div_closure']['iteration'] == 1);
$this->_sections['div_closure']['last']       = ($this->_sections['div_closure']['iteration'] == $this->_sections['div_closure']['total']);
?> </div> <?php endfor; endif; ?>
      <?php endif; ?>
      <?php if (($this->_foreach['div_drawing']['iteration'] == $this->_foreach['div_drawing']['total'])): ?></div> <?php endif; ?>
    
    <?php endif; ?> 	<?php endforeach; endif; unset($_from); ?>
	</div>
  <?php endif; ?>