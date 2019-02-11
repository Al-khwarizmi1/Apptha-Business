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
<script type="text/javascript">
     var jqs=jQuery.noConflict();
    jqs(document).ready(function() {
        jqs('.newsShow').after().cycle({
            fx      : 'fade' , // choose your transition type, ex: fade, scrollUp, shuffle, etc...
            autostop: false,
            speed   : 1000,
            next    :   '#nextNews',
            prev    :   '#prevNews',
            timeout : 1,
            width   :950,
            height  : 50
        });
    });
</script>
<div class="news_container">
  <div class="latestnews">
<?php echo '<div id="prevNews"><img src="' . JURI::Base() . 'templates/' . $templateName . '/images/newsprev.png" alt="slide previous" title"slide previous" width="6"  height="11"/></div>'; ?>
<div class="newsShow">
    <?php foreach ($list as $item) : ?>       
        <a href="<?php echo $item->link; ?>" >
        <?php echo "Top News: ".$item->text; ?></a>
    <?php endforeach; ?>
</div>
<?php echo '<div id="nextNews"><img src="' . JURI::Base() . 'templates/' . $templateName . '/images/newsnext.png" alt="slide next" title"slide next" width="6"  height="11"/></div>'; ?>
  </div>
</div>