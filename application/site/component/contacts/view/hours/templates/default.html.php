<?
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright    Copyright (C) 2011 - 2013 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license        GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        git://git.assembla.com/nooku-framework.git for the canonical source repository
 */
?>

<?
    $date = isset($_GET['date']) && !empty($_GET['date']) ? new DateTime($_GET['date']) : new DateTime('NOW');
    $today = new DateTime('NOW');
    $tomorrow = new DateTime('NOW');
    $tomorrow = $tomorrow->modify('+1 day');
?>

<? if ($contact->params->get('open_24_7', false)) : ?>
    <h3><?= translate('Opening hours') ?></h3>
    <p>
        <time>
            <?= translate('24 hours a day, 7 days a week') ?>
        </time>
    </p>
<? else : ?>

    <? if (count($hours)) : ?>
        <table class="table table--striped table--openinghours">
            <caption><?= translate('Opening hours') ?></caption>
            <tbody>
            <? for ($day_of_week = 1; $day_of_week <= 7; $date->modify( '+1 day' ), $day_of_week++) : ?>
                <? $weekly = $hours->find(array('day_of_week' => $date->format('N'), 'date' => '')) ?>
                <? $exceptions = $hours->find(array('date' => $date->format('Y-m-d'))) ?>
                <? $list = count($exceptions) ? $exceptions : $weekly ?>
                <? $closed = isset($list->top()->closed) ? $list->top()->closed : false ?>
                <tr>
                    <td width="25%" nowrap>
                        <? if($date == $today) : ?>
                        <?= translate('Today') ?>:
                        <? elseif($date == $tomorrow) : ?>
                        <?= translate('Tomorrow') ?>:
                        <? else : ?>
                        <?= translate($date->format('l')).' '.$date->format('j').' '.translate($date->format('F')) ?>:
                        <? endif ?>
                    </td>
                    <td>
                        <? if ($count = count($list)) : ?>
                            <? $i = '1' ?>
                            <? foreach ($list as $hour) : ?>
                                <? if ($hour->opening_time && $hour->closing_time) : ?>
                                    <time>
                                        <?= $hour->opening_time ?>
                                        <?= translate('till') ?>
                                        <?= $hour->closing_time ?>
                                    </time>
                                    <?= $i < $count ? translate('and from') : '' ?>
                                    <? $i++ ?>
                                <? else : ?>
                                    <?= $hour->appointment ? translate('Appointment only') : translate('Closed'); break; ?>
                                <? endif ?>
                            <? endforeach ?>
                            <? if ($hour->note) : ?>
                                <br/><span class="text--small"><?= $hour->note ?></span>
                            <? endif ?>
                        <? else : ?>
                            <?= translate('Closed') ?>
                        <? endif ?>
                    </td>
                </tr>
            <? endfor ?>
            </tbody>
        </table>

        <? if(isset($pagination)) : ?>
        <? if(isset($_GET['date']) && !empty($_GET['date'])) : ?>
            <a href="<?= helper('route.contact', array('row' => $contact, 'date' => '')) ?>"><?= translate('Previous 7 days') ?></a>
        <? else : ?>
            <a href="<?= helper('route.contact', array('row' => $contact, 'date' => $date->format('Y-m-d'))) ?>"><?= translate('Next 7 days') ?></a>
        <? endif ?>
        <? endif ?>
    <? endif ?>
<? endif ?>