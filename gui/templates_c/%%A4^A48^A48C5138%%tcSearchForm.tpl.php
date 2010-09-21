<?php /* Smarty version 2.6.26, created on 2010-09-09 13:48:57
         compiled from testcases/tcSearchForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'basename', 'testcases/tcSearchForm.tpl', 13, false),array('modifier', 'replace', 'testcases/tcSearchForm.tpl', 13, false),array('modifier', 'escape', 'testcases/tcSearchForm.tpl', 27, false),array('function', 'config_load', 'testcases/tcSearchForm.tpl', 14, false),array('function', 'lang_get', 'testcases/tcSearchForm.tpl', 16, false),array('function', 'html_select_date', 'testcases/tcSearchForm.tpl', 77, false),array('function', 'html_options', 'testcases/tcSearchForm.tpl', 104, false),)), $this); ?>
<?php $this->assign('cfg_section', ((is_array($_tmp=((is_array($_tmp='testcases/tcSearchForm.tpl')) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, ".tpl", "") : smarty_modifier_replace($_tmp, ".tpl", ""))); ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => $this->_tpl_vars['cfg_section']), $this);?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => 'title_search_tcs,caption_search_form,th_tcid,th_tcversion,
             th_title,summary,steps,expected_results,keyword,custom_field,
             search_type_like,preconditions,filter_mode_and,test_importance,
             creation_date_from,creation_date_to,
             custom_field_value,btn_find,requirement_document_id'), $this);?>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>

<h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->mainCaption)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
<div style="margin: 1px;">
<form method="post" action="lib/testcases/tcSearch.php" target="workframe">
	<table class="smallGrey" style="width:100%">
		<caption><?php echo $this->_tpl_vars['labels']['caption_search_form']; ?>
</caption>
		<tr>
		 <td colspan="2"><img src="<?php echo $this->_tpl_vars['tlImages']['info']; ?>
"> <?php echo $this->_tpl_vars['labels']['filter_mode_and']; ?>
 </td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['th_tcid']; ?>
</td>
			<td><input type="text" name="targetTestCase" id="TCID"  
			           size="<?php echo $this->_config[0]['vars']['TC_ID_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['TC_ID_MAXLEN']; ?>
" value="<?php echo $this->_tpl_vars['gui']->tcasePrefix; ?>
"/></td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['th_tcversion']; ?>
</td>
			<td><input type="text" name="version"
			           size="<?php echo $this->_config[0]['vars']['VERSION_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['VERSION_MAXLEN']; ?>
" /></td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['th_title']; ?>
</td>
			<td><input type="text" name="name" size="<?php echo $this->_config[0]['vars']['TCNAME_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['TCNAME_MAXLEN']; ?>
" /></td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['summary']; ?>
</td>
			<td><input type="text" name="summary" 
			           size="<?php echo $this->_config[0]['vars']['SUMMARY_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['SUMMARY_MAXLEN']; ?>
" /></td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['preconditions']; ?>
</td>
			<td><input type="text" name="preconditions" 
			           size="<?php echo $this->_config[0]['vars']['PRECONDITIONS_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['PRECONDITIONS_MAXLEN']; ?>
" /></td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['steps']; ?>
</td>
			<td><input type="text" name="steps" 
			           size="<?php echo $this->_config[0]['vars']['STEPS_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['STEPS_MAXLEN']; ?>
" /></td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['expected_results']; ?>
</td>
			<td><input type="text" name="expected_results" 
			           size="<?php echo $this->_config[0]['vars']['RESULTS_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['RESULTS_MAXLEN']; ?>
" /></td>
		</tr>

		<tr>
			<td><?php echo $this->_tpl_vars['labels']['creation_date_from']; ?>
</td>
			<td>
          <?php $this->assign('selected_creation_date_from', "0000-00-00"); ?>
          <?php if ($this->_tpl_vars['gui']->creation_date_from != ''): ?>
              <?php $this->assign('selected_creation_date_from', $this->_tpl_vars['gui']->creation_date_from); ?>
          <?php endif; ?>
			    <?php echo smarty_function_html_select_date(array('prefix' => 'creation_date_from_','time' => $this->_tpl_vars['selected_creation_date_from'],'month_format' => '%m','end_year' => "+1",'day_value_format' => "%02d",'all_empty' => ' ','field_order' => $this->_tpl_vars['gsmarty_html_select_date_field_order']), $this);?>

		  </td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['creation_date_to']; ?>
</td>
			<td>
          <?php $this->assign('selected_creation_date_to', "0000-00-00"); ?>
          <?php if ($this->_tpl_vars['gui']->creation_date_to != ''): ?>
              <?php $this->assign('selected_creation_date_to', $this->_tpl_vars['gui']->creation_date_to); ?>
          <?php endif; ?>
			    <?php echo smarty_function_html_select_date(array('prefix' => 'creation_date_to_','time' => $this->_tpl_vars['selected_creation_date_to'],'month_format' => '%m','end_year' => "+1",'day_value_format' => "%02d",'all_empty' => ' ','field_order' => $this->_tpl_vars['gsmarty_html_select_date_field_order']), $this);?>

		  </td>
		</tr>
		
    <?php if ($this->_tpl_vars['session'] ['testprojectOptions']->testPriorityEnabled): ?>
		  <tr>
		  	<td><?php echo $this->_tpl_vars['labels']['test_importance']; ?>
</td>
		  	<td>
		  	<select name="importance">
      	  	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['gui']->option_importance), $this);?>

	      </select>
	      </td>
		  </tr>
		<?php endif; ?>
		
		
		<?php if ($this->_tpl_vars['gui']->filter_by['keyword']): ?>
		<tr>
			<td><?php echo $this->_tpl_vars['labels']['keyword']; ?>
</td>
			<td><select name="keyword_id">
					<option value="0">&nbsp;</option>
					<?php unset($this->_sections['Row']);
$this->_sections['Row']['name'] = 'Row';
$this->_sections['Row']['loop'] = is_array($_loop=$this->_tpl_vars['gui']->keywords) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['Row']['show'] = true;
$this->_sections['Row']['max'] = $this->_sections['Row']['loop'];
$this->_sections['Row']['step'] = 1;
$this->_sections['Row']['start'] = $this->_sections['Row']['step'] > 0 ? 0 : $this->_sections['Row']['loop']-1;
if ($this->_sections['Row']['show']) {
    $this->_sections['Row']['total'] = $this->_sections['Row']['loop'];
    if ($this->_sections['Row']['total'] == 0)
        $this->_sections['Row']['show'] = false;
} else
    $this->_sections['Row']['total'] = 0;
if ($this->_sections['Row']['show']):

            for ($this->_sections['Row']['index'] = $this->_sections['Row']['start'], $this->_sections['Row']['iteration'] = 1;
                 $this->_sections['Row']['iteration'] <= $this->_sections['Row']['total'];
                 $this->_sections['Row']['index'] += $this->_sections['Row']['step'], $this->_sections['Row']['iteration']++):
$this->_sections['Row']['rownum'] = $this->_sections['Row']['iteration'];
$this->_sections['Row']['index_prev'] = $this->_sections['Row']['index'] - $this->_sections['Row']['step'];
$this->_sections['Row']['index_next'] = $this->_sections['Row']['index'] + $this->_sections['Row']['step'];
$this->_sections['Row']['first']      = ($this->_sections['Row']['iteration'] == 1);
$this->_sections['Row']['last']       = ($this->_sections['Row']['iteration'] == $this->_sections['Row']['total']);
?>
					<option value="<?php echo $this->_tpl_vars['gui']->keywords[$this->_sections['Row']['index']]->dbID; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['gui']->keywords[$this->_sections['Row']['index']]->name)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
				<?php endfor; endif; ?>
				</select>
			</td>
		</tr>
		<?php endif; ?>
		
    <?php if ($this->_tpl_vars['gui']->filter_by['design_scope_custom_fields']): ?>
		    <tr>
   	    	<td><?php echo $this->_tpl_vars['labels']['custom_field']; ?>
</td>
		    	<td><select name="custom_field_id">
		    			<option value="0">&nbsp;</option>
		    			<?php $_from = $this->_tpl_vars['gui']->design_cf; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cf_id'] => $this->_tpl_vars['cf']):
?>
		    				<option value="<?php echo $this->_tpl_vars['cf_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['cf']['label'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</option>
		    			<?php endforeach; endif; unset($_from); ?>
		    		</select>
		    	</td>
	      	</tr>
		    <tr>
	       		<td><?php echo $this->_tpl_vars['labels']['custom_field_value']; ?>
</td>
         		<td>
		    		<input type="text" name="custom_field_value" 
		    	         size="<?php echo $this->_config[0]['vars']['CFVALUE_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['CFVALUE_MAXLEN']; ?>
"/>
		    	</td>
	      </tr>
	  <?php endif; ?>
	  
	  <?php if ($this->_tpl_vars['gui']->filter_by['requirement_doc_id']): ?>
		    <tr>
	       		<td><?php echo $this->_tpl_vars['labels']['requirement_document_id']; ?>
</td>
         		<td>
		    		<input type="text" name="requirement_doc_id" id="requirement_doc_id"
		    		       title="<?php echo $this->_tpl_vars['labels']['search_type_like']; ?>
"
		    	         size="<?php echo $this->_config[0]['vars']['REQ_DOCID_SIZE']; ?>
" maxlength="<?php echo $this->_config[0]['vars']['REQ_DOCID_MAXLEN']; ?>
"/>
		    	</td>
	      </tr>
	  <?php endif; ?>    
	</table>
	
	<p style="padding-left: 20px;">
		<input type="submit" name="doSearch" value="<?php echo $this->_tpl_vars['labels']['btn_find']; ?>
" />
	</p>
</form>

</div>
</body>
</html>