<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */
?>

<?= overlay(array('url' => route('option=com_activities&view=activities&layout=list'))); ?>

<div class="sidebar">
    <div class="mod_users">
    	<h3><?= translate('Logged in Users'); ?></h3>
    	<?= object('com:users.controller.user')->layout('list')->limit(10)->loggedin(true)->render(); ?>
    </div>
</div>