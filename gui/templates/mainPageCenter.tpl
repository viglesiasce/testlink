{*
 Testlink Open Source Project - http://testlink.sourceforge.net/
 $Id: mainPageRight.tpl,v 1.24 2010/08/25 11:57:03 mx-julian Exp $
 Purpose: smarty template - main page / site map

 rev :
       20100825 - Julian - removed <p> tags from "test execution" and "test plan contents"
                           blocks to eliminate unused space
                         - blocks are not draggable anymore
       20090807 - franciscom - platform feature
       20090131 - franciscom - new link to access to test cases assigned to logged user
       20081228 - franciscom - new feature user can choose vertical order of link groups
*}
{lang_get var="labels"
          s="current_test_plan,ok,testplan_role,msg_no_rights_for_tp,
             title_test_execution,href_execute_test,href_rep_and_metrics,
             href_update_tplan,href_newest_tcversions,
             href_my_testcase_assignments,href_platform_assign,
             href_tc_exec_assignment,href_plan_assign_urgency,
             href_upd_mod_tc,title_test_plan_mgmt,title_test_case_suite,
             href_plan_management,href_assign_user_roles,
             href_build_new,href_plan_mstones,href_plan_define_priority,
             href_metrics_dashboard,href_add_remove_test_cases"}



{* ----- Center Column begin ---------------------------------------------------------- *}
{* ----------------------------------------------------------------------------------- *}
<div id="center_block" style="padding: 0px 0px 0px 0px;"></div>

<script  type="text/javascript"> 
{literal}

Ext.ux.IFrameComponent = Ext.extend(Ext.BoxComponent, {
     onRender : function(ct, position){
          this.el = ct.createChild({tag: 'iframe', id: 'iframe-'+ this.id, frameBorder: 0, src: this.url});
     }
});
   var current_tp_name = '{/literal}{$gui->current_tp_name}{literal}';
   var wiki = new Ext.Panel({
     id: id,
     title: current_tp_name + ' Testplan Wiki',
     //closable:true,
     // layout to fit child component
     layout:'fit', 
     // add iframe as the child component
     items: [ new Ext.ux.IFrameComponent({ id: 'iFrame', url: 'http://wiki/index.php/' + current_tp_name  +'_Project' }) ]
   });

    var testcases = new Ext.Panel({
     id: 'testcase_panel',
     title: 'My  Testcases',
     //closable:true,
     // layout to fit child component
     layout:'fit', 
     // add iframe as the child component
     items: [ new Ext.ux.IFrameComponent({ id: 'iFrame2', url: 'https://10.2.32.20/testlink_test/lib/testcases/tcAssignedToUser.php' }) ]
   }); 

   var tabs2 = new Ext.TabPanel({
        renderTo: 'center_block',
        activeTab: 0,
        //width:800,
        height: 800,
	//autoHeight: true,
	//plain:true,
	defaults:{autoScroll: true},
        items:[wiki, testcases]
    });

{/literal}

</script>


