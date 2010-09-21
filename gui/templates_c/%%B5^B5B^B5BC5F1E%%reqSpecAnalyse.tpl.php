<?php /* Smarty version 2.6.26, created on 2010-09-09 15:17:28
         compiled from requirements/reqSpecAnalyse.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'requirements/reqSpecAnalyse.tpl', 5, false),array('function', 'html_options', 'requirements/reqSpecAnalyse.tpl', 30, false),array('modifier', 'escape', 'requirements/reqSpecAnalyse.tpl', 19, false),)), $this); ?>

<?php echo lang_get_smarty(array('var' => 'labels','s' => "req_spec,req_title_analyse,req_spec_change,edit,req_total_count,req_title_in_tl,
             req_title_covered,req_title_uncovered,req_title_not_in_tl,
             req_title_nottestable,req_title_covered,req_doc_id,req,testcase,none"), $this);?>


<?php $this->assign('action_reqspec_view', "lib/requirements/reqSpecView.php"); ?>
<?php $this->assign('action_req_view', "lib/requirements/reqView.php?item=requirement&amp;requirement_id="); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body>

<h1 class="title">
	<?php echo $this->_tpl_vars['labels']['req_title_analyse']; ?>
<?php echo @TITLE_SEP; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['reqSpec'][$this->_tpl_vars['selectedReqSpec']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_help.tpl", 'smarty_include_vars' => array('helptopic' => 'hlp_requirementsCoverage','show_help_icon' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</h1>


<div class="workBack">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_update.tpl", 'smarty_include_vars' => array('result' => $this->_tpl_vars['sqlResult'],'action' => $this->_tpl_vars['action'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div>
<form method="get"><?php echo $this->_tpl_vars['labels']['req_spec_change']; ?>

	<select name="req_spec_id" onchange="form.submit()">
	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['reqSpec'],'selected' => $this->_tpl_vars['selectedReqSpec']), $this);?>
</select>
	<span class="bold"><a href="<?php echo $this->_tpl_vars['action_reqspec_view']; ?>
?req_spec_id=<?php echo $this->_tpl_vars['selectedReqSpec']; ?>
"><?php echo $this->_tpl_vars['labels']['edit']; ?>
</a></span>
</form>
</div>

<table class="invisible">
<tr><td><?php echo $this->_tpl_vars['labels']['req_total_count']; ?>
</td><td align="right"><?php echo $this->_tpl_vars['metrics']['expectedTotal']; ?>
</td></tr>
<tr><td><?php echo $this->_tpl_vars['labels']['req_title_in_tl']; ?>
</td><td align="right"><?php echo $this->_tpl_vars['metrics']['total']; ?>
</td></tr>
<tr><td><?php echo $this->_tpl_vars['labels']['req_title_covered']; ?>
</td><td align="right"><?php echo $this->_tpl_vars['metrics']['covered']; ?>
</td></tr>
<tr><td><?php echo $this->_tpl_vars['labels']['req_title_uncovered']; ?>
</td><td align="right"><?php echo $this->_tpl_vars['metrics']['total']-$this->_tpl_vars['metrics']['notTestable']-$this->_tpl_vars['metrics']['covered']; ?>
</td></tr>
<tr><td><?php echo $this->_tpl_vars['labels']['req_title_not_in_tl']; ?>
</td><td align="right"><?php echo $this->_tpl_vars['metrics']['uncovered']; ?>
</td></tr>
<tr><td><?php echo $this->_tpl_vars['labels']['req_title_nottestable']; ?>
</td><td align="right"><?php echo $this->_tpl_vars['metrics']['notTestable']; ?>
</td></tr>
</table>

</div>


<div class="workBack">
<h2><?php echo $this->_tpl_vars['labels']['req_title_covered']; ?>
 - <?php echo $this->_tpl_vars['metrics']['covered']; ?>
</h2>

<?php unset($this->_sections['row']);
$this->_sections['row']['name'] = 'row';
$this->_sections['row']['loop'] = is_array($_loop=$this->_tpl_vars['coverage']['covered']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row']['show'] = true;
$this->_sections['row']['max'] = $this->_sections['row']['loop'];
$this->_sections['row']['step'] = 1;
$this->_sections['row']['start'] = $this->_sections['row']['step'] > 0 ? 0 : $this->_sections['row']['loop']-1;
if ($this->_sections['row']['show']) {
    $this->_sections['row']['total'] = $this->_sections['row']['loop'];
    if ($this->_sections['row']['total'] == 0)
        $this->_sections['row']['show'] = false;
} else
    $this->_sections['row']['total'] = 0;
if ($this->_sections['row']['show']):

            for ($this->_sections['row']['index'] = $this->_sections['row']['start'], $this->_sections['row']['iteration'] = 1;
                 $this->_sections['row']['iteration'] <= $this->_sections['row']['total'];
                 $this->_sections['row']['index'] += $this->_sections['row']['step'], $this->_sections['row']['iteration']++):
$this->_sections['row']['rownum'] = $this->_sections['row']['iteration'];
$this->_sections['row']['index_prev'] = $this->_sections['row']['index'] - $this->_sections['row']['step'];
$this->_sections['row']['index_next'] = $this->_sections['row']['index'] + $this->_sections['row']['step'];
$this->_sections['row']['first']      = ($this->_sections['row']['iteration'] == 1);
$this->_sections['row']['last']       = ($this->_sections['row']['iteration'] == $this->_sections['row']['total']);
?>
<?php if ($this->_sections['row']['first']): ?>
<table class="simple">
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['req_doc_id']; ?>
</th>
		<th><?php echo $this->_tpl_vars['labels']['req']; ?>
</th>
		<th><?php echo $this->_tpl_vars['labels']['testcase']; ?>
</th>
	</tr>
<?php endif; ?>
	<tr>
		<td><span class="bold"><a href="<?php echo $this->_tpl_vars['action_req_view']; ?>
<?php echo $this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['id']; ?>
">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span></td>
			<td><span class="bold"><a href="<?php echo $this->_tpl_vars['action_req_view']; ?>
<?php echo $this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['id']; ?>
">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span></td>
		<td><?php unset($this->_sections['subrow']);
$this->_sections['subrow']['name'] = 'subrow';
$this->_sections['subrow']['loop'] = is_array($_loop=$this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['coverage']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subrow']['show'] = true;
$this->_sections['subrow']['max'] = $this->_sections['subrow']['loop'];
$this->_sections['subrow']['step'] = 1;
$this->_sections['subrow']['start'] = $this->_sections['subrow']['step'] > 0 ? 0 : $this->_sections['subrow']['loop']-1;
if ($this->_sections['subrow']['show']) {
    $this->_sections['subrow']['total'] = $this->_sections['subrow']['loop'];
    if ($this->_sections['subrow']['total'] == 0)
        $this->_sections['subrow']['show'] = false;
} else
    $this->_sections['subrow']['total'] = 0;
if ($this->_sections['subrow']['show']):

            for ($this->_sections['subrow']['index'] = $this->_sections['subrow']['start'], $this->_sections['subrow']['iteration'] = 1;
                 $this->_sections['subrow']['iteration'] <= $this->_sections['subrow']['total'];
                 $this->_sections['subrow']['index'] += $this->_sections['subrow']['step'], $this->_sections['subrow']['iteration']++):
$this->_sections['subrow']['rownum'] = $this->_sections['subrow']['iteration'];
$this->_sections['subrow']['index_prev'] = $this->_sections['subrow']['index'] - $this->_sections['subrow']['step'];
$this->_sections['subrow']['index_next'] = $this->_sections['subrow']['index'] + $this->_sections['subrow']['step'];
$this->_sections['subrow']['first']      = ($this->_sections['subrow']['iteration'] == 1);
$this->_sections['subrow']['last']       = ($this->_sections['subrow']['iteration'] == $this->_sections['subrow']['total']);
?>
    <a href="lib/testcases/archiveData.php?id=<?php echo ((is_array($_tmp=$this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['coverage'][$this->_sections['subrow']['index']]['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&amp;edit=testcase&amp;allow_edit=0"><?php echo ((is_array($_tmp=$this->_tpl_vars['tcprefix'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php echo $this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['coverage'][$this->_sections['subrow']['index']]['tc_external_id']; ?>
</a>:<?php echo ((is_array($_tmp=$this->_tpl_vars['coverage']['covered'][$this->_sections['row']['index']]['coverage'][$this->_sections['subrow']['index']]['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
		<?php endfor; endif; ?></td>
	</tr>
<?php if ($this->_sections['row']['last']): ?>
</table>
<?php endif; ?>
<?php endfor; else: ?>
	<p class="bold"><?php echo $this->_tpl_vars['labels']['none']; ?>
</p>
<?php endif; ?>
</div>


<div class="workBack">
<h2><?php echo $this->_tpl_vars['labels']['req_title_uncovered']; ?>
 - <?php echo $this->_tpl_vars['metrics']['total']-$this->_tpl_vars['metrics']['notTestable']-$this->_tpl_vars['metrics']['covered']; ?>
</h2>
<?php unset($this->_sections['row2']);
$this->_sections['row2']['name'] = 'row2';
$this->_sections['row2']['loop'] = is_array($_loop=$this->_tpl_vars['coverage']['uncovered']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row2']['show'] = true;
$this->_sections['row2']['max'] = $this->_sections['row2']['loop'];
$this->_sections['row2']['step'] = 1;
$this->_sections['row2']['start'] = $this->_sections['row2']['step'] > 0 ? 0 : $this->_sections['row2']['loop']-1;
if ($this->_sections['row2']['show']) {
    $this->_sections['row2']['total'] = $this->_sections['row2']['loop'];
    if ($this->_sections['row2']['total'] == 0)
        $this->_sections['row2']['show'] = false;
} else
    $this->_sections['row2']['total'] = 0;
if ($this->_sections['row2']['show']):

            for ($this->_sections['row2']['index'] = $this->_sections['row2']['start'], $this->_sections['row2']['iteration'] = 1;
                 $this->_sections['row2']['iteration'] <= $this->_sections['row2']['total'];
                 $this->_sections['row2']['index'] += $this->_sections['row2']['step'], $this->_sections['row2']['iteration']++):
$this->_sections['row2']['rownum'] = $this->_sections['row2']['iteration'];
$this->_sections['row2']['index_prev'] = $this->_sections['row2']['index'] - $this->_sections['row2']['step'];
$this->_sections['row2']['index_next'] = $this->_sections['row2']['index'] + $this->_sections['row2']['step'];
$this->_sections['row2']['first']      = ($this->_sections['row2']['iteration'] == 1);
$this->_sections['row2']['last']       = ($this->_sections['row2']['iteration'] == $this->_sections['row2']['total']);
?>
<?php if ($this->_sections['row2']['first']): ?>
<table class="simple">
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['req_doc_id']; ?>
</th>
		<th><?php echo $this->_tpl_vars['labels']['req']; ?>
</th>
	</tr>
<?php endif; ?>
	<tr>
		<td><span class="bold"><a href="<?php echo $this->_tpl_vars['action_req_view']; ?>
<?php echo $this->_tpl_vars['coverage']['uncovered'][$this->_sections['row2']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['coverage']['uncovered'][$this->_sections['row2']['index']]['req_doc_id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span></td>
		<td><span class="bold"><a href="<?php echo $this->_tpl_vars['action_req_view']; ?>
<?php echo $this->_tpl_vars['coverage']['uncovered'][$this->_sections['row2']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['coverage']['uncovered'][$this->_sections['row2']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span></td>
	</tr>
<?php if ($this->_sections['row2']['last']): ?>
</table>
<?php endif; ?>
<?php endfor; else: ?>
	<p class="bold"><?php echo $this->_tpl_vars['labels']['none']; ?>
</p>
<?php endif; ?>
</div>

<div class="workBack">
<h2><?php echo $this->_tpl_vars['labels']['req_title_nottestable']; ?>
  - <?php echo $this->_tpl_vars['metrics']['notTestable']; ?>
</h2>

<?php unset($this->_sections['row3']);
$this->_sections['row3']['name'] = 'row3';
$this->_sections['row3']['loop'] = is_array($_loop=$this->_tpl_vars['coverage']['nottestable']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['row3']['show'] = true;
$this->_sections['row3']['max'] = $this->_sections['row3']['loop'];
$this->_sections['row3']['step'] = 1;
$this->_sections['row3']['start'] = $this->_sections['row3']['step'] > 0 ? 0 : $this->_sections['row3']['loop']-1;
if ($this->_sections['row3']['show']) {
    $this->_sections['row3']['total'] = $this->_sections['row3']['loop'];
    if ($this->_sections['row3']['total'] == 0)
        $this->_sections['row3']['show'] = false;
} else
    $this->_sections['row3']['total'] = 0;
if ($this->_sections['row3']['show']):

            for ($this->_sections['row3']['index'] = $this->_sections['row3']['start'], $this->_sections['row3']['iteration'] = 1;
                 $this->_sections['row3']['iteration'] <= $this->_sections['row3']['total'];
                 $this->_sections['row3']['index'] += $this->_sections['row3']['step'], $this->_sections['row3']['iteration']++):
$this->_sections['row3']['rownum'] = $this->_sections['row3']['iteration'];
$this->_sections['row3']['index_prev'] = $this->_sections['row3']['index'] - $this->_sections['row3']['step'];
$this->_sections['row3']['index_next'] = $this->_sections['row3']['index'] + $this->_sections['row3']['step'];
$this->_sections['row3']['first']      = ($this->_sections['row3']['iteration'] == 1);
$this->_sections['row3']['last']       = ($this->_sections['row3']['iteration'] == $this->_sections['row3']['total']);
?>
<?php if ($this->_sections['row3']['first']): ?>
<table class="simple">
	<tr>
		<th><?php echo $this->_tpl_vars['labels']['req']; ?>
</th>
	</tr>
<?php endif; ?>
	<tr>
		<td><span class="bold"><a href="<?php echo $this->_tpl_vars['action_req_view']; ?>
<?php echo $this->_tpl_vars['coverage']['nottestable'][$this->_sections['row3']['index']]['id']; ?>
">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['coverage']['nottestable'][$this->_sections['row3']['index']]['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></span></td>
	</tr>
<?php if ($this->_sections['row3']['last']): ?>
</table>
<?php endif; ?>
<?php endfor; else: ?>
	<p class="bold"><?php echo $this->_tpl_vars['labels']['none']; ?>
</p>
<?php endif; ?>
</div>


</body>
</html>