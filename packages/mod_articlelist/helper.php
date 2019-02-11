<?php

/**
 * @Author      : Venkatesan
 * Author E-mail: venkatesan.ravi@contus.in
 * Creation Date: 29/06/2011
 * @Module      : mod_articlelist
 * @File        : helper.php
 * @Description : Database access
 */
class modList {

    function getListDetailsCountfour() {
        global $mainframe;
        $db    = &JFactory::getDBO();
        $query = "SELECT con.id,con.title,con.introtext,cat.title as categorytitle,cat.description "
                . "FROM #__content as con INNER JOIN #__categories  as cat ON cat.id=con.catid WHERE state=1 and cat.published=1 "
                . "ORDER BY id DESC LIMIT 4";
        $db->setQuery($query);
        $result = $db->loadObjectList();
//print_r($result);die;
         return $result;
    }
}

?>