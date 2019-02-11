<?php
//no direct access
defined('_JEXEC') or die('Restricted access');
if(version_compare(JVERSION,'1.7.0','ge')) {
      $version='1.7';
} elseif(version_compare(JVERSION,'1.6.0','ge')) {
      $version='1.6';
} else {
      $version='1.5';
}
if($version !='1.5'){
    $positionOne='position-1';
    $positionSix='position-6';
    $positionSeven='position-7';
    $positionNine='position-9';
    $positionTen='position-10';
    $positionEleven='position-11';
    $positionFooter='footerload';
}else{
    $positionOne='user3';
    $positionSix='right';
    $positionSeven='left';
    $positionNine='user1';
    $positionTen='user2';
    $positionEleven='user5';
    $positionFooter='footer';
}
$folderPath = JPATH_SITE.DS.'modules'.DS.'mod_contus_bannerslider';
$contusBanner = JFolder::exists($folderPath);
$isEnable = ($contusBanner)?true:false;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
    <head>
        <jdoc:include type="head" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
        <?php
        //Variable declaration for logo and follow us
            $logo = $this->params->get('logo');
            $facebookURL = $this->params->get('facebook_url');
            $twitterURL = $this->params->get('twitter_url');
            $linkedinURL = $this->params->get('linkedin_url');
            $cTitle = $this->params->get('title');
            $cDescription = $this->params->get('description');
            $facebookURL=isset($facebookURL)?$facebookURL:'';
            $twitterURL=isset($twitterURL)?$twitterURL:'';
            $linkedinURL=isset($linkedinURL)?$linkedinURL:'';
        ?>
    </head>
    <body>
        <!--Header container starts here-->
        <div class="header">
            <div id="wrapper">
                <?php if (!empty($logo)) {
                ?>
                    <h1 class="logo"><a href="<?php echo $this->baseurl ?>"><img src="<?php echo $this->baseurl . '/' . $logo; ?>" alt="business logo"  width="226" height="42" /></a></h1>
                <?php } else {
                ?>
                    <h1 class="logo"><a href="<?php echo $this->baseurl ?>" ><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" alt="business logo" width="226" height="42" /></a></h1>
                <?php } ?>
                <div class="navigation"><jdoc:include type="modules" name="<?php echo $positionOne;?>" /></div>
                <div class="clear"></div>
            </div>
        </div>
        <!--Header container ends here-->
        <!--Banner container starts here-->
         <?php
            $menu = & JSite::getMenu();
            $defaultMenu = & $menu->getDefault();
            $ditemid = $defaultMenu->id;
        ?>
        <?php if(JRequest::getInt('Itemid') == $ditemid){?>
        <?php if ($this->countModules('appthabusiness-topbanner') && $isEnable) {?>
                <jdoc:include type="modules" name="appthabusiness-topbanner" />
       <?php } ?>
        <div><jdoc:include type="modules" name="appthabusiness-bottom2"/></div>
        <!--Banner container ends here-->
        <!--content container starts here-->
        <div class="container">
            <div class="content_container">
                <jdoc:include type="modules" name="appthabusiness-bottom1" />
            </div>
        </div>
        <!--content container ends here-->
        <div class="shadow"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/container_shadow.png" alt="shadow" width="950" height="3" /></div>
        <?php } ?>
         <?php
                $app = &JFactory::getApplication();
                $messages = $app->getMessageQueue();
                if (!empty($messages)) {
        ?>
                    <div class="error_msgcontainer">
                        <div class="error_msgcontent">
                            <jdoc:include type="message" />
                        </div>
                    </div>
        <?php } ?>
        <!--bottom container starts here-->
        <div id="bottom_wrapper">
            <div class="bottom_container">
                <div class="left_container">
                    <jdoc:include type="modules" name="<?php echo $positionSeven;?>" style="modules" />
                </div>
                <div class="mid_container"><jdoc:include type="component" /></div>
                <div class="right_container"><jdoc:include type="modules" name="<?php echo $positionSix;?>" style="modules" /></div>
            </div>
        </div>
        <!--bottom container ends here-->
        <!--Footer container starts here-->
        <div class="footer">
            <div id="footer_wrapper">
                <div class="footer_block_one">
                    <jdoc:include type="modules" name="<?php echo $positionNine; ?>"/>
                </div>
                <div class="footer_block_two">
                     <jdoc:include type="modules" name="<?php echo $positionTen; ?>"/>
                </div>
                <div class="footer_block_three">
                    <div><jdoc:include type="modules" name="<?php echo $positionEleven;?>"/></div>
                    <?php if($facebookURL || $twitterURL || $linkedinURL){?>
                    <ul class="network">
                        <?php if($facebookURL) {?>
                            <li><a href="<?php echo $facebookURL; ?>" target="_blank" ><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/facebook.png"  alt="network" width="31" height="31" /></a></li>
                         <?php }if($twitterURL) { ?>
                            <li><a href="<?php echo $twitterURL; ?>" target="_blank" ><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/twitter.png" alt="twitter" width="31" height="31" /></a></li>
                         <?php } if($linkedinURL) {?>
                            <li><a href="<?php echo $linkedinURL; ?>" target="_blank" ><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/linkedin.png" alt="linkedin" width="31" height="31" /></a></li>
                         <?php } ?>
                    </ul>
                    <?php } ?>
                    <div class="copyright"><jdoc:include type="modules" name="<?php echo $positionFooter; ?>"/></div>
                </div>
            </div>
        </div>
        <!--Footer container ends here-->
    </body>
</html>