<?php /* Smarty version 2.6.26, created on 2010-09-24 15:27:43
         compiled from inc_ext_table.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_ext_table.tpl', 41, false),array('modifier', 'escape', 'inc_ext_table.tpl', 101, false),)), $this); ?>


<?php echo lang_get_smarty(array('var' => 'labels','s' => "expand_collapse_groups, show_all_columns,
	show_all_columns_tooltip, default_state, multisort, multisort_tooltip,
	multisort_button_tooltip, button_refresh"), $this);?>

<?php echo '
<script type="text/javascript" src="gui/javascript/ext_extensions.js" language="javascript"></script>
<script type="text/javascript">
/*
 statusRenderer() 
 translate this code to a localized string and applies formatting
*/
function statusRenderer(item)
{
	item.cssClass = item.cssClass || "";
	return "<span class=\\""+item.cssClass+"\\">" + item.text + "</span>";
}

/*
 statusCompare() 
 handles the sorting order by status. 
 It maps a status code to a number. 
 The statuses are then sorted by comparing those numbers.
 WARNING: Global coupling
          uses variable status_code_order
*/
function statusCompare(item)
{
	var order=0;
	order = status_code_order[item.value];
	if( order == undefined )
	{
	  alert(\'Configuration Issue - test case execution status code: \' + val + \' is not configured \');
	  order = -1;
	}
	return order;
}

function priorityRenderer(val)
{
	return prio_code_label[val];
}

function columnWrap(val){
    return \'<div style="white-space:normal !important; -moz-user-select: text; -webkit-user-select: text;">\'+ val +\'</div>\';
}

//Functions for MultiSort
function createSorterButton(config, table) {
	config = config || {};
	Ext.applyIf(config, {
		listeners: {
			"click": function(button, e) {
				if(e.shiftKey == true) {
					button.destroy();
					doSort(table);
				} else {
					updateButtons(button, table, true);
				}
			}
		},
		iconCls: \'tbar-sort-\' + config.sortData.direction.toLowerCase(),
		'; ?>
tooltip: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['multisort_button_tooltip'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',<?php echo '
		tooltipType: \'title\',
		multisort: \'yes\',
		reorderable: true
	});

	return new Ext.Button(config);
};
    
function updateButtons(button,table,changeDirection){
	sortData = button.sortData;
	iconCls = button.iconCls;
	
	if (sortData != undefined) {
		if (changeDirection != false) {
			button.sortData.direction = button.sortData.direction.toggle(\'ASC\',\'DESC\');
			button.setIconClass(button.iconCls.toggle(\'tbar-sort-asc\', \'tbar-sort-desc\'));
		}
	}
	store[table].clearFilter();
	doSort(table);
}

function doSort(table){
	sorters = getSorters(table);
	store[table].sort(sorters, \'ASC\');
}

function getSorters(table) {
var sorters = [];
	tbar = grid[table].getTopToolbar();
	Ext.each(tbar.find(\'multisort\', \'yes\'), function(button) {
		sorters.push(button.sortData);
	}, this);
	return sorters;
}
//End Functions for MultiSort

Ext.onReady(function() {
'; ?>

	Ext.state.Manager.setProvider(new Ext.ux.JsonCookieProvider());
	<?php $_from = $this->_tpl_vars['gui']->tableSet; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['idx'] => $this->_tpl_vars['matrix']):
?>
		<?php $this->assign('tableID', $this->_tpl_vars['matrix']->tableID); ?>

		store['<?php echo $this->_tpl_vars['tableID']; ?>
'] = new Ext.data.GroupingStore({
			reader: new Ext.data.ArrayReader({},
				fields['<?php echo $this->_tpl_vars['tableID']; ?>
'])
				<?php if ($this->_tpl_vars['matrix']->groupByColumn >= 0): ?>
					,groupField: 'idx<?php echo $this->_tpl_vars['matrix']->groupByColumn; ?>
'
				<?php endif; ?>
				// 20100816 - asimon - enable sorting by a default column
				<?php if ($this->_tpl_vars['matrix']->sortByColumn >= 0): ?>
					,sortInfo:{field:'idx<?php echo $this->_tpl_vars['matrix']->sortByColumn; ?>
',direction:'<?php echo $this->_tpl_vars['matrix']->sortDirection; ?>
'}
				<?php endif; ?>
			});
		store['<?php echo $this->_tpl_vars['tableID']; ?>
'].loadData(tableData['<?php echo $this->_tpl_vars['tableID']; ?>
']);
			
		grid['<?php echo $this->_tpl_vars['tableID']; ?>
'] = new Ext.ux.SlimGridPanel({
			id: '<?php echo $this->_tpl_vars['tableID']; ?>
',
			store: store['<?php echo $this->_tpl_vars['tableID']; ?>
'],
			<?php if (! $this->_tpl_vars['matrix']->storeTableState): ?>
				stateful: false,
			<?php endif; ?>
			
			//show toolbar
			<?php if ($this->_tpl_vars['matrix']->showToolbar): ?>
			tbar: tbar = new Ext.Toolbar({
				//init plugins for multisort
				<?php if ($this->_tpl_vars['matrix']->allowMultiSort): ?>
					plugins: [
						reorderer = new Ext.ux.ToolbarReorderer(),
						droppable = new Ext.ux.ToolbarDroppable({
						
							createItem: function(data) {
								var column = this.getColumnFromDragDrop(data);
								return createSorterButton({
									text    : column.header,
									sortData: {
										field: column.dataIndex,
										direction: "DESC"
									}
								}, '<?php echo $this->_tpl_vars['tableID']; ?>
');
							},

							canDrop: function(dragSource, event, data) {
								var sorters = getSorters('<?php echo $this->_tpl_vars['tableID']; ?>
'),
                					column  = this.getColumnFromDragDrop(data);

								for (var i=0; i < sorters.length; i++) {
									if (sorters[i].field == column.dataIndex) return false;
								}

								return true;
							},
							
							//after multisort buttons changed sort data again 
							afterLayout: function () {
								doSort('<?php echo $this->_tpl_vars['tableID']; ?>
');
							},

							getColumnFromDragDrop: function(data) {
								var index    = data.header.cellIndex,
								colModel = grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].colModel,
								column   = colModel.getColumnById(colModel.getColumnId(index));

								return column;
							}
						})
					],  //END plugins
					items: [], //necessary line as otherwise plugins will throw an error
					listeners: {
						scope    : this,
						reordered: function(button) {
							updateButtons(button,'<?php echo $this->_tpl_vars['tableID']; ?>
', false);
						}
					}
				<?php endif; ?> //end plugins for multisort
			}), //END tbar
			<?php endif; ?> 
			
			listeners: {
			<?php if ($this->_tpl_vars['matrix']->allowMultiSort): ?>
				scope: this,
				render: function() {
					dragProxy = grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].getView().columnDrag;
					ddGroup = dragProxy.ddGroup;
					droppable.addDDGroup(ddGroup);
				}
			<?php endif; ?>
			}, //END listeners

			view: new Ext.grid.GroupingView({
				forceFit: true
				<?php if ($this->_tpl_vars['matrix']->showGroupItemsCount): ?>
					,groupTextTpl: '{text} ({[values.rs.length]} ' +
						'{[values.rs.length > 1 ? "Items" : "Item"]})'
				<?php endif; ?>
				<?php if ($this->_tpl_vars['matrix']->hideGroupedColumn): ?>
					,hideGroupedColumn:true
				<?php endif; ?>
				}), //END view
			
			columns: columnData['<?php echo $this->_tpl_vars['tableID']; ?>
']
			
			<?php echo $this->_tpl_vars['matrix']->getGridSettings(); ?>

			
		}); //END grid
	
		//show expand/collapse toolbar button
		<?php if ($this->_tpl_vars['matrix']->toolbarExpandCollapseGroupsButton && $this->_tpl_vars['matrix']->showToolbar): ?>
			tbar.add({
				text: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['expand_collapse_groups'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
				last_state: 'expanded',
				iconCls: 'x-group-by-icon',
				handler: function () {
					if (this.last_state == 'expanded') {
						grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].getView().collapseAllGroups();
						this.last_state = 'collapsed';
					} else {
						grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].getView().expandAllGroups()
						this.last_state = 'expanded';
					}
				}
			});
		<?php endif; ?>
		
		//show all columns toolbar button
		<?php if ($this->_tpl_vars['matrix']->toolbarShowAllColumnsButton && $this->_tpl_vars['matrix']->showToolbar): ?>
			tbar.add({
				text: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['show_all_columns'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
				tooltip: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['show_all_columns_tooltip'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
				tooltipType: 'title',
				iconCls: 'x-cols-icon',
				handler: function (button, state) {
					var cm = grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].getColumnModel();
					for (var i=0;i<cm.getColumnCount();i++) {
						//do not show grouped column if hideGroupedColumn is true
						if (grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].getView().hideGroupedColumn == false ||
							store['<?php echo $this->_tpl_vars['tableID']; ?>
'].groupField != 'idx'+i) {
							cm.setHidden(i, false);
						}
					}
				}
			});
		<?php endif; ?>

		//show reset to default state toolbar button
		<?php if ($this->_tpl_vars['matrix']->toolbarDefaultStateButton && $this->_tpl_vars['matrix']->showToolbar && $this->_tpl_vars['matrix']->storeTableState): ?>
			tbar.add({
				text: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['default_state'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
				iconCls: 'tbar-default-state',
				handler: function (button, state) {
					Ext.state.Manager.clear(grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].getStateId());
					//window.location.reload(); replaced due to IE, FF problems
					window.location = window.location;
				}
			});
		<?php endif; ?>
		
		//show refresh toolbar button
		<?php if ($this->_tpl_vars['matrix']->toolbarRefreshButton && $this->_tpl_vars['matrix']->showToolbar): ?>
			tbar.add({
				text: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['button_refresh'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
				iconCls: 'x-tbar-loading',
				handler: function (button, state) {
					window.location = window.location;
				}
			});
		<?php endif; ?>
		
		//MULTISORT
		<?php if ($this->_tpl_vars['matrix']->allowMultiSort && $this->_tpl_vars['matrix']->showToolbar): ?>
			
			//add button seperator
			tbar.add({
				xtype: 'tbseparator'
			});
			
			//add multisort text
			tbar.add({
				handleMouseEvents: false,
				iconCls: 'tbar-info',
				iconAlign: 'right',
				text: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['multisort'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
				tooltip: '<?php echo ((is_array($_tmp=$this->_tpl_vars['labels']['multisort_tooltip'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : smarty_modifier_escape($_tmp, 'javascript')); ?>
',
				tooltipType: 'title'
			});
		<?php endif; ?>
		//END MULTISORT
		
		//render grid
		grid['<?php echo $this->_tpl_vars['tableID']; ?>
'].render('<?php echo $this->_tpl_vars['tableID']; ?>
_target');
	<?php endforeach; endif; unset($_from); ?>

}); // END Ext.onReady
</script>