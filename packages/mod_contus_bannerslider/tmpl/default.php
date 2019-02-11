<?php
/**
 * @Author      : Venkatesan
 * Author E-mail: venkatesan.ravi@contus.in
 * Creation Date: 12/07/2011
 * @Module      : mod_contus_bannerslider
 * @File        : default.php
 * @Description : To view the  contus_bannerslider module disign layout
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
$app = JFactory::getApplication();
$templateName = $app->getTemplate();
$doc = & JFactory::getDocument();
$doc->addScript(JURI::base() . "templates/appthabusiness/js/jquery.cycle.min.js");
$doc->addScript(JURI::base() . "templates/appthabusiness/js/jquery.cycle.all.min.js");

?>
<!-- contus_banner Module  start here -->

<?php if(count($banners) > 0){ ?>
<script type="text/javascript">
  jQuery.noConflict();
    jQuery(document).ready(function() {
        jQuery('.slideshow').after().cycle({
            fx      : '<?php echo $bannerEffect; ?>' , // choose your transition type, ex: fade, scrollUp, shuffle, etc...
            autostop: false,
            speed   : <?php echo $slideTimer; ?>,
            next    :   '#next',
            prev    :   '#prev',
            timeout : <?php echo $autoscroll; ?>,
            width   : <?php echo $width; ?>,
            height  : <?php echo $height; ?>
        });
    });
</script>
<div class="banners">
 <div class="banner_container">
     <div id="banner_wrapper">
	<?php echo '<div id="prev"><img src="'.JURI::Base().'templates/'.$templateName.'/images/previous.png" alt="slide previous" title"slide previous" width="25"  height="37"/></div>';?>
    <div class="slideshow">
     <?php
        foreach ($banners as $banner) {
            if($version !='1.5'){
               $parameters = new JRegistry;
               $parameters->loadJSON($banner->params);
               $item->params = $parameters;
               $imageurl = JURI::Base() . $item->params->get('imageurl');
               $bannerId=$banner->id;
           }else{
               $imageurl = "images/banners/" . $banner->imageurl;
               $bannerId=$banner->bid;
           }
            $banner->clickurl=isset($banner->clickurl)?$banner->clickurl:JURI::base();
            $link = JRoute::_('index.php?option=com_banners&task=click&bid=' . $bannerId);
          //  $banner_text = $banner->description;
            // echo $banner_text;
            echo '<a href="'.$banner->clickurl.'" target="_blank" ><img src="' . $imageurl . '" width="' . $width . '" height="' . $height . '" border="0" alt=""/></a>';
        }
        ?>
    </div>
    <?php echo '<div id="next"><img src="'.JURI::Base().'templates/'.$templateName.'/images/next.png" alt="slide next" title"slide next" width="25"  height="37"/></div>';  ?>
     </div></div></div>
<?php } ?>