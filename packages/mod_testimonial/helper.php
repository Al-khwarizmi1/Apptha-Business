<?php

/**
 * @Author      : Venkatesan
 * Author E-mail: venkatesan.ravi@contus.in
 * Creation Date: 29/06/2011
 * @Module      : mod_articlelist
 * @File        : helper.php
 * @Description : Database access
 */
class modListTestimonial {

    function getTestimonialList() {
        global $mainframe;
        $db    = &JFactory::getDBO();
        $query = "SELECT * "
                . "FROM #__testimonal "
                . "ORDER BY id DESC LIMIT 2";
        $db->setQuery($query);
        $result = $db->loadAssocList();
        return $result;
    }
}

?>
