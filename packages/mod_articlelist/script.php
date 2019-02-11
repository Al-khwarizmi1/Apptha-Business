<?php
/**
 * @name        Apptha Mac Dock Photo Gallery
 * @since       Joomla 1.5
 * @subpackage	com_macgallery
 * @author      Apptha
 * @copyright   Copyright (C) 2011 Powered by Apptha
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @abstract    Custom uninstall script for qrcode component.
 */

// no direct access
defined('_JEXEC') or die('Restricted Access');
// no direct access
//error_reporting(0);

// import joomla's filesystem classes
jimport('joomla.filesystem.folder');
jimport('joomla.installer.installer');
// delete a folder inside your images folder
//JFolder::delete(JPATH_ROOT.DS.'images'.DS.'qrcode');
   
$installer = new JInstaller();

//$installer->install(JPATH_BASE.DS.'components'.DS.'com_macgallery'.DS.'extensions'.DS.'mod_macgallery');
//$installer->install(JPATH_BASE.DS.'components'.DS.'com_macgallery'.DS.'extensions'.DS.'macgallery');
//updating plugin
$db = & JFactory::getDBO();

$query = 'UPDATE  #__extensions '.
                 'SET enabled=1 '.
         'WHERE element = "mod_articlelist"';
$db->setQuery($query);
$db->query();

$query = 'UPDATE  #__modules '.
         'SET position="appthabusiness-bottom1",published=1 '.
         'WHERE module = "mod_articlelist"';
$db->setQuery($query);
$db->query();

$queryinsert = 'SELECT id FROM #__modules WHERE module = "mod_articlelist"';
$db->setQuery( $queryinsert );
$lastid = $db->loadResult();

$db->setQuery("INSERT INTO #__modules_menu (moduleid, menuid) VALUES ($lastid, 0)");
$db->query();

?>