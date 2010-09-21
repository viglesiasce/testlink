<?php /* Smarty version 2.6.26, created on 2010-09-03 15:33:36
         compiled from mainPageLeft.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'mainPageLeft.tpl', 18, false),)), $this); ?>
<?php echo lang_get_smarty(array('var' => 'labels','s' => 'title_product_mgmt,href_tproject_management,href_admin_modules,
                          href_assign_user_roles,href_cfields_management,
                          href_cfields_tproject_assign,href_keywords_manage,
                          title_user_mgmt,href_user_management,
                          href_roles_management,title_requirements,
                          href_req_spec,href_req_assign,
                          title_test_spec,href_edit_tc,href_browse_tc,href_search_tc,
                          href_search_req, href_search_req_spec,href_inventory,
                          href_platform_management, href_inventory_management,
                          href_print_tc,href_keywords_assign, href_req_overview,
                          href_print_req, title_documentation'), $this);?>




<?php $this->assign('menuLayout', $this->_tpl_vars['tlCfg']->gui->layoutMainPageLeft); ?>
<?php $this->assign('display_left_block_1', false); ?>
<?php $this->assign('display_left_block_2', false); ?>
<?php $this->assign('display_left_block_3', false); ?>
<?php $this->assign('display_left_block_4', false); ?>
<?php $this->assign('display_left_block_5', true); ?>
<?php if ($this->_tpl_vars['gui']->testprojectID && ( $this->_tpl_vars['gui']->grants['project_edit'] == 'yes' || $this->_tpl_vars['gui']->grants['tproject_user_role_assignment'] == 'yes' || $this->_tpl_vars['gui']->grants['cfield_management'] == 'yes' || $this->_tpl_vars['gui']->grants['keywords_view'] == 'yes' )): ?>
    <?php $this->assign('display_left_block_1', true); ?>

    <script  type="text/javascript">
    <?php echo '
    function display_left_block_1()
    {
        var p1 = new Ext.Panel({
                                title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_product_mgmt']; ?>
'<?php echo ',
                                collapsible:false,
                                collapsed: false,
                                draggable: false,
                                contentEl: \'testproject_topics\',
                                baseCls: \'x-tl-panel\',
                                bodyStyle: "background:#c8dce8;padding:3px;",
                                renderTo: '; ?>
'menu_left_block_<?php echo $this->_tpl_vars['menuLayout']['testProject']; ?>
'<?php echo ',
                                width:\'100%\'
                                });
     }
    '; ?>

    </script>
<?php endif; ?>


<?php if ($this->_tpl_vars['gui']->grants['mgt_users'] == 'yes'): ?>
    <?php $this->assign('display_left_block_2', true); ?>

    <script type="text/javascript">
    <?php echo '
    function display_left_block_2()
    {
        var p1 = new Ext.Panel({
                                title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_user_mgmt']; ?>
'<?php echo ',
                                collapsible:false,
                                collapsed: false,
                                draggable: false,
                                contentEl: \'usermanagement_topics\',
                                baseCls: \'x-tl-panel\',
                                bodyStyle: "background:#c8dce8;padding:3px;",
                                renderTo: '; ?>
'menu_left_block_<?php echo $this->_tpl_vars['menuLayout']['userAdministration']; ?>
'<?php echo ',
                                width:\'100%\'
                                });
     }
    '; ?>

    </script>

<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->testprojectID && $this->_tpl_vars['opt_requirements'] == TRUE && ( $this->_tpl_vars['gui']->grants['reqs_view'] == 'yes' || $this->_tpl_vars['gui']->grants['reqs_edit'] == 'yes' )): ?>
    <?php $this->assign('display_left_block_3', true); ?>

    <script type="text/javascript">
    <?php echo '
    function display_left_block_3()
    {
        var p3 = new Ext.Panel({
                                title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_requirements']; ?>
'<?php echo ',
                                collapsible:false,
                                collapsed: false,
                                draggable: false,
                                contentEl: \'requirements_topics\',
                                baseCls: \'x-tl-panel\',
                                bodyStyle: "background:#c8dce8;padding:3px;",
                                renderTo: '; ?>
'menu_left_block_<?php echo $this->_tpl_vars['menuLayout']['requirements']; ?>
'<?php echo ',
                                width:\'100%\'
                                });
     }
    '; ?>

    </script>
<?php endif; ?>

<?php if ($this->_tpl_vars['gui']->testprojectID && $this->_tpl_vars['gui']->grants['view_tc'] == 'yes'): ?>
    <?php $this->assign('display_left_block_4', true); ?>

    <script type="text/javascript">
    <?php echo '
    function display_left_block_4()
    {
        var p4 = new Ext.Panel({
                                title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_test_spec']; ?>
'<?php echo ',
                                collapsible:false,
                                collapsed: false,
                                draggable: false,
                                contentEl: \'testspecification_topics\',
                                baseCls: \'x-tl-panel\',
                                bodyStyle: "background:#c8dce8;padding:3px;",
                                renderTo: '; ?>
'menu_left_block_<?php echo $this->_tpl_vars['menuLayout']['testSpecification']; ?>
'<?php echo ',
                                width:\'100%\'
                                });
     }
    '; ?>

    </script>
<?php endif; ?>

    <script type="text/javascript">
    <?php echo '
    function display_left_block_5()
    {
        var p5 = new Ext.Panel({
                                title: '; ?>
'<?php echo $this->_tpl_vars['labels']['title_documentation']; ?>
'<?php echo ',
                                collapsible:false,
                                collapsed: false,
                                draggable: false,
                                contentEl: \'testlink_application\',
                                baseCls: \'x-tl-panel\',
                                bodyStyle: "background:#c8dce8;padding:3px;",
                                renderTo: '; ?>
'menu_left_block_<?php echo $this->_tpl_vars['menuLayout']['general']; ?>
'<?php echo ',
                                width:\'100%\'
                                });
	}
    '; ?>

    </script>

<div class="vertical_menu" style="float: left">
    <div id='menu_left_block_1'></div><br />
  <div id='menu_left_block_2'></div><br />
  <div id="menu_left_block_3"></div><br />
  <div id="menu_left_block_4"></div><br />
  <div id="menu_left_block_5"></div><br />
  
	<?php if ($this->_tpl_vars['display_left_block_1']): ?>
    <div id='testproject_topics'>
	  <?php if ($this->_tpl_vars['gui']->grants['project_edit'] == 'yes'): ?>
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="lib/project/projectView.php"><?php echo $this->_tpl_vars['labels']['href_tproject_management']; ?>
</a>
    <?php endif; ?>

        
	  <?php if ($this->_tpl_vars['gui']->grants['tproject_user_role_assignment'] == 'yes'): ?>
        <br />
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="lib/usermanagement/usersAssign.php?featureType=testproject&amp;featureID=<?php echo $this->_tpl_vars['gui']->testprojectID; ?>
"><?php echo $this->_tpl_vars['labels']['href_assign_user_roles']; ?>
</a>
	  <?php endif; ?>

      <?php if ($this->_tpl_vars['gui']->grants['cfield_management'] == 'yes'): ?>
	      	<br />
	      	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
          	<a href="lib/cfields/cfieldsView.php"><?php echo $this->_tpl_vars['labels']['href_cfields_management']; ?>
</a>
			<br />
         	<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
            <a href="lib/cfields/cfieldsTprojectAssign.php"><?php echo $this->_tpl_vars['labels']['href_cfields_tproject_assign']; ?>
</a>
      <?php endif; ?>
	  
	  	  <?php if ($this->_tpl_vars['gui']->grants['keywords_view'] == 'yes'): ?>
			<br />
	  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
	        <a href="lib/keywords/keywordsView.php"><?php echo $this->_tpl_vars['labels']['href_keywords_manage']; ?>
</a>
	  <?php endif; ?> 	  
 				<?php if ($this->_tpl_vars['gui']->grants['platform_management'] == 'yes'): ?>
			<br />
	  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
			<a href="lib/platforms/platformsView.php"><?php echo $this->_tpl_vars['labels']['href_platform_management']; ?>
</a>
		<?php endif; ?>

 				<?php if ($this->_tpl_vars['gui']->grants['project_inventory_view']): ?>
			<br />
	  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
			<a href="lib/inventory/inventoryView.php"><?php echo $this->_tpl_vars['labels']['href_inventory']; ?>
</a>
		<?php endif; ?>
	  
    </div>
	<?php endif; ?>
  

  	<?php if ($this->_tpl_vars['display_left_block_2']): ?>
    <div id='usermanagement_topics'>
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="lib/usermanagement/usersView.php"><?php echo $this->_tpl_vars['labels']['href_user_management']; ?>
</a>
        <br />
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="lib/usermanagement/rolesView.php"><?php echo $this->_tpl_vars['labels']['href_roles_management']; ?>
</a>
    </div>
	<?php endif; ?>
  

   	<?php if ($this->_tpl_vars['display_left_block_3']): ?>
    <div id="requirements_topics" >
      <?php if ($this->_tpl_vars['gui']->grants['reqs_view'] == 'yes'): ?>
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=reqSpecMgmt"><?php echo $this->_tpl_vars['labels']['href_req_spec']; ?>
</a><br/>
        
                <img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="lib/requirements/reqOverview.php"><?php echo $this->_tpl_vars['labels']['href_req_overview']; ?>
</a><br/>
        
                <img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=searchReq"><?php echo $this->_tpl_vars['labels']['href_search_req']; ?>
</a><br/>
        <img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=searchReqSpec"><?php echo $this->_tpl_vars['labels']['href_search_req_spec']; ?>
</a>
        
	   	<?php endif; ?>
	   	
		<?php if ($this->_tpl_vars['gui']->grants['reqs_edit'] == 'yes'): ?>
			<br />
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
       		<a href="lib/general/frmWorkArea.php?feature=assignReqs"><?php echo $this->_tpl_vars['labels']['href_req_assign']; ?>
</a>

  	        <br />
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
          	<a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=printReqSpec"><?php echo $this->_tpl_vars['labels']['href_print_req']; ?>
</a>
  		 <?php endif; ?>
    </div>
  <?php endif; ?>
  

   	<?php if ($this->_tpl_vars['display_left_block_4']): ?>
      <div id="testspecification_topics" >
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
  		<a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=editTc">
    		<?php if ($this->_tpl_vars['gui']->grants['modify_tc'] == 'yes'): ?>
  	      <?php echo lang_get_smarty(array('s' => 'href_edit_tc'), $this);?>

  	   <?php else: ?>
  	      <?php echo lang_get_smarty(array('s' => 'href_browse_tc'), $this);?>

  	   <?php endif; ?>
  	  </a>
      <?php if ($this->_tpl_vars['gui']->hasTestCases): ?>
      <br />
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
          <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=searchTc"><?php echo $this->_tpl_vars['labels']['href_search_tc']; ?>
</a>
      <?php endif; ?>    
  		
	  	  <?php if ($this->_tpl_vars['gui']->grants['keywords_view'] == 'yes'): ?>
	    <?php if ($this->_tpl_vars['gui']->grants['keywords_edit'] == 'yes'): ?>
	        <br />
  			<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
        	<a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=keywordsAssign"><?php echo $this->_tpl_vars['labels']['href_keywords_assign']; ?>
</a>
		  <?php endif; ?>
	  <?php endif; ?>
  		
  	 <?php if ($this->_tpl_vars['gui']->grants['modify_tc'] == 'yes'): ?>
          <br />
  		  <img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
          <a href="<?php echo $this->_tpl_vars['gui']->launcher; ?>
?feature=printTestSpec"><?php echo $this->_tpl_vars['labels']['href_print_tc']; ?>
</a>
  	 <?php endif; ?>

	  
    </div>
  <?php endif; ?>

    <div id='testlink_application'>
  		<img src="<?php echo @TL_ITEM_BULLET_IMG; ?>
" />
		<form style="display:inline;">
    	<select class="menu_combo" style="font-weight:normal;" name="docs" size="1"
            	onchange="javascript:get_docs(this.form.docs.options[this.form.docs.selectedIndex].value, 
            	'<?php echo $this->_tpl_vars['basehref']; ?>
');" >
        	<option value="leer"> -<?php echo lang_get_smarty(array('s' => 'access_doc'), $this);?>
-</option>
        	<?php if ($this->_tpl_vars['gui']->docs): ?>
            <?php $_from = $this->_tpl_vars['gui']->docs; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['doc']):
?>
                <option value="<?php echo $this->_tpl_vars['doc']; ?>
"><?php echo $this->_tpl_vars['doc']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        	<?php endif; ?>
    	</select>
		</form>
    </div>


</div>