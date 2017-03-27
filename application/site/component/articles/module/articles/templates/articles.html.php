<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<? if($show_title) : ?>
<h3><?= $module->title ?></h3>
<? endif ?>

<?php foreach ($articles as $article): ?>
<?php echo helper('com:articles.article.render',
    array(
        'row'              => $article,
        'show_create_date' => false,
        'show_modify_date' => false,
        'show_images'      => false,
        'title_heading'    => 3));?>
<?php endforeach; ?>
