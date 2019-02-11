<?php
/**
 * @Author      : Venkatesan
 * Author E-mail: venkatesan.ravi@contus.in
 * Creation Date: 29/06/2011
 * @Module      : mod_articlelist
 * @File        : default.php
 * @Description : Display the article list
 */
$app = JFactory::getApplication();
$templateName = $app->getTemplate();
?>
<?php
foreach ($articleListfour as $item) {
?>
    <ul>
        <li>
        <?php
          $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $item->description, $matches);
         $firstImg = ( isset($matches[1][0]) ) ? $matches[1][0] : '';
        if (!empty($firstImg)) {
        ?>
        <?php
            echo '<img src="' . JURI::Base() . $firstImg . '" alt="" title="" width="58"  height="58"/>';
        } else {
        ?>
        <?php echo '<img src="' . JURI::Base() . 'templates/' . $templateName . '/images/no-image.jpg" alt="" title"" width="58"  height="58"/>';
        } ?>
        <h2><?php echo $item->categorytitle; ?></h2></li>
    <?php $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $item->introtext, $matches); ?>

        <li><h3><?php echo $item->title; ?></h3></li>
        <li>
            <p><?php
        $contentText = strip_tags($item->introtext);
        echo substr($contentText, 0, 130);
        if (strlen($contentText) > 130)
            echo ' ...';
    ?>
        </p>
    </li>
    <li>
        <?php echo '<a href="index.php?option=com_content&view=article&id=' . $item->id . '">Read More</a>'; ?></li>
</ul>
<?php
    }
?>
