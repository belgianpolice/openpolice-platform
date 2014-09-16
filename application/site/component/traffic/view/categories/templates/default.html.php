<?
/**
 * Belgian Police Web Platform - Traffic Component
 *
 * @copyright	Copyright (C) 2012 - 2013 Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/belgianpolice/internet-platform
 */
?>

<ktml:module position="left">
    <?= import('com:categories.view.categories.list.html') ?>
</ktml:module>

<? foreach($categories as $category) : ?>
    <div class="article">
        <h1 class="article__header">
            <a href="<?= helper('route.category', array('row' => $category)) ?>">
                <?= escape($category->title);?>
            </a>
        </h1>

        <? if($category->attachments_attachment_id) : ?>
        <a class="article__thumbnail" href="<?= helper('route.category', array('row' => $category)) ?>">
            <?= helper('com:attachments.image.thumbnail', array(
                'attachment' => $category->attachments_attachment_id,
                'attribs' => array('width' => '400'))) ?>
        </a>
        <? endif ?>

        <? if ($category->description) : ?>
            <?= $category->description; ?>
        <? endif; ?>

        <? if($category->count) : ?>
        <a class="article__readmore" href="<?= helper('route.category', array('row' => $category)) ?>"><?= translate('Read more') ?></a>
        <? endif ?>
    </div>
<? endforeach; ?>
