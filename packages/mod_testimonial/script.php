
<?php
class mod_testimonialInstallerScript {

   function install($parent) {
     // echo '<p>'. JText::_('1.6 Custom install script') . '</p>';
       // articlelist
        $db = & JFactory::getDBO();
        $title = $tmpdir."-".'Default';
        $title=ucfirst($title);
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


        /** Banner**/
        
        $query1 = 'UPDATE  #__extensions '.
                 'SET enabled=1 '.
                 'WHERE element = "mod_contus_bannerslider"';
        $db->setQuery($query1);
        $db->query();

        $query1 = 'UPDATE  #__modules '.
                 'SET position="appthabusiness-topbanner",published=1 '.
                 'WHERE module = "mod_contus_bannerslider"';
        $db->setQuery($query1);
        $db->query();

        $queryinsert1 = 'SELECT id FROM #__modules WHERE module = "mod_contus_bannerslider"';
        $db->setQuery( $queryinsert1 );
        $lastid1 = $db->loadResult();

        $db->setQuery("INSERT INTO #__modules_menu (moduleid, menuid) VALUES ($lastid1, 0)");
        $db->query();

        // testimonial

        $query2 = 'UPDATE  #__extensions '.
                 'SET enabled=1 '.
                 'WHERE element = "mod_testimonial"';
        $db->setQuery($query2);
        $db->query();

        $query2 = 'UPDATE  #__modules '.
                 'SET position="position-9",published=1 '.
                 'WHERE module = "mod_testimonial"';
        $db->setQuery($query2);
        $db->query();

        $queryinsert2 = 'SELECT id FROM #__modules WHERE module = "mod_testimonial"';
        $db->setQuery( $queryinsert2 );
        $lastid2 = $db->loadResult();

        $db->setQuery("INSERT INTO #__modules_menu (moduleid, menuid) VALUES ($lastid2, 0)");
        $db->query();


        // Footer

        $query2 = 'UPDATE  #__extensions '.
                 'SET enabled=1 '.
                 'WHERE element = "mod_footer"';
        $db->setQuery($query2);
        $db->query();

        $query2 = 'UPDATE  #__modules '.
                 'SET position="footerload",published=1 '.
                 'WHERE module = "mod_footer"';
        $db->setQuery($query2);
        $db->query();

        $queryinsert2 = 'SELECT id FROM #__modules WHERE module = "mod_footer"';
        $db->setQuery( $queryinsert2 );
        $lastid2 = $db->loadResult();

        $db->setQuery("INSERT INTO #__modules_menu (moduleid, menuid) VALUES ($lastid2, 0)");
        $db->query();

        // latest news

        $query2 = 'UPDATE  #__extensions '.
                 'SET enabled=1 '.
                 'WHERE element = "mod_latestnews"';
        $db->setQuery($query2);
        $db->query();

        $query2 = 'UPDATE  #__modules '.
                 'SET position="appthabusiness-bottom2",published=1 '.
                 'WHERE module = "mod_latestnews"';
        $db->setQuery($query2);
        $db->query();

        $queryinsert2 = 'SELECT id FROM #__modules WHERE module = "mod_latestnews"';
        $db->setQuery( $queryinsert2 );
        $lastid2 = $db->loadResult();

        $db->setQuery("INSERT INTO #__modules_menu (moduleid, menuid) VALUES ($lastid2, 0)");
        $db->query();


   }

   function uninstall($parent) {
   // echo '<p>'. JText::_('1.6 Custom install script') . '</p>';
   }

   function update($parent) {
    //  echo '<p>'. JText::_('1.6 Custom update script') .'</p>';
   }

   function preflight($type, $parent) {
      //echo '<p>'. JText::sprintf('1.6 Preflight for %s', $type) .'</p>';
   }

   function postflight($type, $parent) {
    //  echo '<p>'. JText::sprintf('1.6 Postflight for %s', $type) .'</p>';
   }
}

?>