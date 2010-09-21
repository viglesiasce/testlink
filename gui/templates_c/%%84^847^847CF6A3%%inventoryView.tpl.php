<?php /* Smarty version 2.6.26, created on 2010-09-03 15:39:32
         compiled from inventory/inventoryView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inventory/inventoryView.tpl', 26, false),array('function', 'config_load', 'inventory/inventoryView.tpl', 38, false),)), $this); ?>
<script type="text/javascript" src="../../ext-all-debug.js"></script>
<?php echo lang_get_smarty(array('var' => 'labels','s' => "inventory_title,inventory_empty,sort_table_by_column,
          inventory_name,inventory_notes,inventory_ipaddress,
          inventory_purpose,inventory_hw,inventory_owner,
          inventory_delete,inventory_alt_delete,inventory_alt_edit,
          btn_create,btn_save,btn_edit,btn_delete,btn_cancel,
          inventory_create_title, inventory_dlg_select_txt,
          inventory_dlg_delete_txt,
          confirm, warning, error
          "), $this);?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_head.tpl", 'smarty_include_vars' => array('openHead' => 'yes')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo smarty_function_config_load(array('file' => "input_dimensions.conf",'section' => 'inventory'), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_del_onclick.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  	<style type="text/css">
		.icon_device_copy {background-image:url(<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @TL_THEME_IMG_DIR; ?>
data_copy_16.png) !important;}
		.icon_device_create {background-image:url(<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @TL_THEME_IMG_DIR; ?>
data_new_16.png) !important;}
		.icon_device_delete {background-image:url(<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @TL_THEME_IMG_DIR; ?>
data_delete_16.png) !important;}
		.icon_device_edit {background-image:url(<?php echo $this->_tpl_vars['basehref']; ?>
<?php echo @TL_THEME_IMG_DIR; ?>
data_edit_16.png) !important; background-size: 50%;}
	</style>


<script type="text/javascript">
var tls_create = '<?php echo $this->_tpl_vars['labels']['btn_create']; ?>
';
var tls_save = '<?php echo $this->_tpl_vars['labels']['btn_save']; ?>
';
var tls_cancel = '<?php echo $this->_tpl_vars['labels']['btn_cancel']; ?>
';
var tls_edit = '<?php echo $this->_tpl_vars['labels']['btn_edit']; ?>
';
var tls_delete = '<?php echo $this->_tpl_vars['labels']['btn_delete']; ?>
';
var tls_th_name = '<?php echo $this->_tpl_vars['labels']['inventory_name']; ?>
';
var tls_th_ip = '<?php echo $this->_tpl_vars['labels']['inventory_ipaddress']; ?>
';
var tls_th_purpose = '<?php echo $this->_tpl_vars['labels']['inventory_purpose']; ?>
';
var tls_th_hw = '<?php echo $this->_tpl_vars['labels']['inventory_hw']; ?>
';
var tls_th_owner = '<?php echo $this->_tpl_vars['labels']['inventory_owner']; ?>
';
var tls_th_notes = '<?php echo $this->_tpl_vars['labels']['inventory_notes']; ?>
';
var tls_dlg_set_title = "<?php echo $this->_tpl_vars['labels']['inventory_create_title']; ?>
";
var tls_dlg_delete_txt = "<?php echo $this->_tpl_vars['labels']['inventory_dlg_delete_txt']; ?>
";
var tls_dlg_select_txt = "<?php echo $this->_tpl_vars['labels']['inventory_dlg_select_txt']; ?>
";
var tls_confirm = "<?php echo $this->_tpl_vars['labels']['confirm']; ?>
";
var tls_warning = "<?php echo $this->_tpl_vars['labels']['warning']; ?>
";
var tls_error = "<?php echo $this->_tpl_vars['labels']['error']; ?>
";
var current_user_id = <?php echo $this->_tpl_vars['session']['userID']; ?>
;
<?php echo '


Ext.onReady(function(){

	/* ----- data inventory ---------------------------------------------------- */
	var reader=new Ext.data.JsonReader
	({},[
			{name: \'id\', type: \'int\'}, 
			{name: \'name\', type: \'string\'},            
			{name: \'ipaddress\', type: \'string\'}, 
			{name: \'purpose\', type: \'string\'}, 
			{name: \'hardware\', type: \'string\'}, 
			{name: \'owner\', type: \'string\'}, 
			{name: \'owner_id\', type: \'int\'}, 
			{name: \'notes\', type: \'string\'} 
		]
	);
		
	var store=new Ext.data.Store
	({
		url:\'lib/inventory/getInventory.php\',
		reader: reader,
		idProperty: \'id\',
		autoLoad: true
	});


	/* ----- data owners ------------------------------------------------------------ */
	/* @TODO params should be extracted from url */
	var ownersStore =  new Ext.data.JsonStore({
		url: \'lib/ajax/getUsersWithRight.php?right=project_inventory_view\',
		root: \'rows\',
		fields: [\'id\',\'login\'],
        autoLoad: true
	});


    // ----- create the grid --------------------------------------------------------
	var deviceNew = function() 
	{
		deviceEditForm.findById(\'editId\').setValue(\'0\');
		deviceEditForm.findById(\'editName\').setValue(\'\');
		deviceEditForm.findById(\'editIp\').setValue(\'\');
		deviceEditForm.findById(\'editOwner\').setValue(current_user_id);
		deviceEditForm.findById(\'editPurpose\').setValue(\'\');
		deviceEditForm.findById(\'editHw\').setValue(\'\');
		deviceEditForm.findById(\'editNotes\').setValue(\'\');
		editWindow.show();
	};		


	var deviceEdit = function() 
	{
        var rows = inventoryGrid.getSelectionModel().getSelections();
        if (rows.length > 0) 
        {
			deviceEditForm.loadData( rows[0] );
			editWindow.show();
            inventoryGrid.getView().refresh();
		}
        else
        {
        	Ext.MessageBox.alert(tls_warning, \'<p>\'+tls_dlg_select_txt+\'</p>\');
        }
	};		


    var inventoryGrid = new Ext.grid.GridPanel
    ({
        store: store,
        columns: 
        [
            {header: tls_th_name, width: 120, dataIndex: \'name\', sortable: true},
            {header: tls_th_ip, dataIndex: \'ipaddress\', sortable: true},
            {header: tls_th_purpose, width: 360, dataIndex: \'purpose\', sortable: true},
            {header: tls_th_hw, width: 300, dataIndex: \'hardware\', sortable: true},
            {header: tls_th_owner, width: 100, dataIndex: \'owner\', sortable: true},
            {header: tls_th_notes, dataIndex: \'notes\', sortable: true}
        ],
        renderTo:\'inventoryTable\',
		autoWidth:true,
        region:\'center\',
        margins: \'0 5 5 5\',
        height:500,
        layout: \'fit\',
        tbar: 
        [{
        layout: \'fit\',
            iconCls: \'icon_device_create\',
            text: tls_create,
			scale: \'medium\',
			style: {padding: \'0px 	10px\'},
            handler: deviceNew
        },{
            iconCls: \'icon_device_edit\',
            text: tls_edit,
			scale: \'medium\',
			style: {padding: \'0px 10px\'},
            handler: deviceEdit
        },{
//            ref: \'../removeBtn\',
            iconCls: \'icon_device_delete\',
            text: tls_delete,
 			scale: \'medium\',
			style: {padding: \' 0px 10px\'},
            handler: function()
            {
                var rows = inventoryGrid.getSelectionModel().getSelections();
                if (rows.length > 0) 
                {
                	for(var i = 0, r; r = rows[i]; i++)
                	{
				        Ext.MessageBox.confirm(tls_confirm, \'<p>\' + tls_dlg_delete_txt + 
				        					\'<br / >\' + r.get(\'name\') + \'</p>\', 
				        						function(btn){
				            if (btn == \'yes\')
				            {
                				var rows = inventoryGrid.getSelectionModel().getSelections();
                    			var id = rows[0].get(\'id\');
		                    	store.remove(rows[0]);
		                    	Ext.Ajax.request
		                    	({
									url : \'lib/inventory/deleteInventory.php?machineID=\' + id,
									success: function ( result, request ) 
									{
										var jsonData = Ext.util.JSON.decode(result.responseText);
										showFeedback(jsonData[\'success\'],jsonData[\'userfeedback\']);
									},
									failure: function ( result, request ) 
									{
										Ext.Msg.alert(\'OK\', jsonData[\'userfeedback\']);
									}
								});
		                	}
		            	}); //Ext.MessageBox.confirm
					} // for
                }
                else
                {
                	Ext.MessageBox.alert(tls_warning, \'<p>\'+tls_dlg_select_txt+\'</p>\');
                }
            }
        }] // tbar

    }); // inventoryGrid

    inventoryGrid.on(\'rowdblclick\', deviceEdit);

	// custom Vtype for vtype:\'IPAddress\' (used in form)
	Ext.apply(Ext.form.VTypes, {
	    IPAddress:  function(v) {
	        return /^\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}$/.test(v);
	    },
	    IPAddressText: \'Must be a numeric IP address\',
	    IPAddressMask: /[\\d\\.]/i
	});


	var buttonHandler = function(button,event) 
	{
		if(deviceEditForm.form.isValid())
		{
			deviceEditForm.form.submit
			({
				waitMsg: \'Saving Data...\',
				success:function(form, action, o) 
				{
					store.reload();
	//				store.insert(action.result.record["machineID"],action.result.record);
					if (action.result.success)
					{
						editWindow.hide();
					}
					showFeedback(action.result.success,action.result.userfeedback);
	//				inventoryGrid.getView().refresh();
				},
				failure:function(form, action) 
				{
					Ext.MessageBox.alert(tls_error, action.result.userfeedback);
				}
			});
		}
	};		

	
    var deviceEditForm = new Ext.form.FormPanel
    ({
        baseCls: \'x-plain\',
        layout:\'absolute\',
		method: \'POST\',
        url:\'lib/inventory/setInventory.php\',
        defaultType: \'textfield\',
//		defaults: {width: 230},
        items:  
	    [
	    	{
	            xtype:\'hidden\',
	            id: \'editId\',
	            name: \'machineID\',
	            value: \'0\'
	        },{
	            x: 0,
	            y: 5,
	            xtype:\'label\',
	            text: tls_th_name
	        },{
	            x: 100,
	            y: 0,
	            name: \'machineName\',
	            id: \'editName\',
	            itemCls: \'required\',
	            maxLength: 255,
	            anchor:\'100%\'  // anchor width by percentage
	        },{
	            x: 0,
	            y: 35,
	            xtype:\'label\',
	            text: tls_th_ip
	        },{
	            x: 100,
	            y: 30,
	            name: \'machineIp\',
	            id: \'editIp\',
	            vtype:\'IPAddress\',
	            anchor: \'100%\'  // anchor width by percentage
	        },{
	            x: 0,
	            y: 65,
	            xtype:\'label\',
	            text: tls_th_owner
	        },{
	            x: 100,
	            y: 60,
	            xtype: \'combo\',
	            id: \'editOwner\',
	            hiddenName: \'machineOwner\',
				fieldLabel: \'Device owner\',
		        displayField: \'login\',
		        valueField: \'id\',
		        selectOnFocus: true,
		        mode: \'local\',
		        typeAhead: true,
		        editable: false,
		        triggerAction: \'all\',
		        value: current_user_id,
				store: ownersStore
	        },{
	            x: 0,
	            y: 95,
	            xtype:\'label\',
	            text: tls_th_purpose
	        },{
	            x: 100,
	            y: 90,
	            id: \'editPurpose\',
	            xtype: \'textarea\',
	            name: \'machinePurpose\',
	            maxLength: 2000,
		        style: {
		            width: \'100%\',
		            height: \'60px\',
		            marginBottom: \'10px\'
		        }
	        },{
	            x: 0,
	            y: 165,
	            xtype:\'label\',
	            text: tls_th_hw
	        },{
	            x: 100,
	            y: 160,
	            id: \'editHw\',
	            xtype: \'textarea\',
	            name: \'machineHw\',
	            maxLength: 2000,
		        style: {
		            width: \'100%\',
		            height: \'60px\',
		            marginBottom: \'10px\'
		        }
	        },{
	            x: 0,
	            y: 235,
	            xtype:\'label\',
	            text: tls_th_notes
	        },{
	            x: 100,
	            y: 230,
	            id: \'editNotes\',
	            xtype: \'textarea\',
	            name: \'machineNotes\',
	            maxLength: 2000,
		        style: {
		            width: \'100%\',
		            height: \'60px\',
		            marginBottom: \'10px\'
		        }
	        }
		],
        loadData : function(record){
			deviceEditForm.findById(\'editId\').setValue(record.get(\'id\'));
			deviceEditForm.findById(\'editName\').setValue(record.get(\'name\'));
			deviceEditForm.findById(\'editIp\').setValue(record.get(\'ipaddress\'));
			deviceEditForm.findById(\'editOwner\').setValue(record.get(\'owner_id\'));
			deviceEditForm.findById(\'editPurpose\').setValue(record.get(\'purpose\'));
			deviceEditForm.findById(\'editHw\').setValue(record.get(\'hardware\'));
			deviceEditForm.findById(\'editNotes\').setValue(record.get(\'notes\'));

		}		
    });


    var editWindow = new Ext.Window
    ({
        title: tls_dlg_set_title,
        width: 500,
        height: 400,
//		autoHeight:true,
        minWidth: 300,
        minHeight: 200,
        layout: \'fit\',
//		layout:\'absolute\',
        plain: true,
        bodyStyle: \'padding:5px;\',
        buttonAlign: \'center\',
		modal: true,
		shadow: true,
//		labelWidth: 80,
//		frame: true,
        items: deviceEditForm,
        closeAction: \'hide\',
		buttons: 
		[{
    		text: tls_save, 
    		handler: buttonHandler
		},{
			text: tls_cancel,
	        handler: function()
	        {
	            editWindow.hide();
	        }
        }]

    }); //editWindow = new Ext.Window


});	//Ext.onReady


'; ?>
</script>

</head>
<body <?php echo $this->_tpl_vars['body_onload']; ?>
>

<h1 class="title"><?php echo $this->_tpl_vars['labels']['inventory_title']; ?>
</h1>

<div id="user_feedback"></div>

<div class="workBack">
    <div id="inventoryTable"></div>
</div>

</body>
</html>