<?php /* Smarty version 2.6.26, created on 2010-09-03 15:29:17
         compiled from inc_del_onclick.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_del_onclick.tpl', 12, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc_ext_js.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo lang_get_smarty(array('s' => 'Yes','var' => 'yes_b'), $this);?>

<?php echo lang_get_smarty(array('s' => 'No','var' => 'no_b'), $this);?>

<?php $this->assign('body_onload', "onload=\"init_yes_no_buttons('".($this->_tpl_vars['yes_b'])."','".($this->_tpl_vars['no_b'])."');\""); ?>
<script type="text/javascript">
 <?php echo '
 
/*
  function: delete_confirmation

  args: o_id: object id, id of object on with do_action() will be done.
              is not a DOM id, but an specific application id.
              IMPORTANT: do_action() is a function defined in this file

        o_name: name of object, used to to give user feedback.

        title: pop up title
                    
        msg: can contain a wildcard (%s), that will be replaced
             with o_name.     
  
  returns: 

*/
function delete_confirmation(o_id,o_name,title,msg,pFunction)
{
	var safe_name = o_name.escapeHTML();
  var safe_title = title;
  var my_msg = msg.replace(\'%s\',safe_name);
  if (!pFunction)
  {
		pFunction = do_action;
  }
  Ext.Msg.confirm(safe_title, my_msg,
			            function(btn, text)
			            { 
					         pFunction(btn,text,o_id);
			            });
}

/*
  function: 

  args:
  
  returns: 

*/
function init_yes_no_buttons(yes_btn,no_btn)
{
  Ext.MessageBox.buttonText.yes=yes_btn;
  Ext.MessageBox.buttonText.no=no_btn;
}
/*
  function: 

  args:
  
  returns: 

*/
function do_action(btn, text, o_id)
{ 
  // IMPORTANT:
  // del_action is defined in SMARTY TEMPLATE that is using this logic.
  //
	var my_action=\'\';
  
  if( btn == \'yes\' )
  {
    my_action=del_action+o_id;
	  window.location=my_action;
	}
}					
/*
  function: 

  args:
  
  returns: 

*/
function alert_message(title,msg)
{
  Ext.MessageBox.alert(title.escapeHTML(), msg.escapeHTML());
}

/**
 * Displays an alert message. title and message must be escaped.
 */
function alert_message_html(title,msg)
{
  Ext.MessageBox.alert(title, msg);
}
'; ?>

</script>