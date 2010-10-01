<?php /* Smarty version 2.6.26, created on 2010-09-24 17:53:19
         compiled from inc_copyrightnotice.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang_get', 'inc_copyrightnotice.tpl', 2, false),)), $this); ?>
<p>
<?php echo lang_get_smarty(array('s' => 'lic_product'), $this);?>
 <a href="http://testlink.sourceforge.net/docs/testLink.php"><?php echo lang_get_smarty(array('s' => 'lic_home'), $this);?>
</a><br />
<?php echo lang_get_smarty(array('s' => 'licensed_under'), $this);?>
 <a href="http://www.gnu.org/copyleft/gpl.html"><?php echo lang_get_smarty(array('s' => 'gnu_gpl'), $this);?>
</a>
</p>