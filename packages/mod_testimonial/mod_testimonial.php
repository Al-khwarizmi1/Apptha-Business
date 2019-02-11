<?php

/**
 * @Author      : Venkatesan
 * Author E-mail: venkatesan.ravi@contus.in
 * Creation Date: 29/06/2011
 * @Module      : mod_category
 * @File        : mod_category.php
 * @Description : Controller of categorylist module
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

global $mainframe;

//Include the model file
require_once(dirname(__FILE__) . DS . 'helper.php');

//Get the article details count four
$testimonialList = modListTestimonial::getTestimonialList();
echo "<h4>" .'Testimonial'. "</h4>";
echo "<ul>";
foreach($testimonialList as $testimonial){
    echo "<li><p>" .$testimonial['description']."</p></li>";
    echo "<li><span>" .$testimonial['name']."</span></li>";

}
echo "</ul>";
//To display the html layout path