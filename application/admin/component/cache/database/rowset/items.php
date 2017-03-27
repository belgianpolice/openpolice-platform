<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

use Nooku\Library;

/**
 * Items Database Rowset
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @package Component\Cache
 */
class CacheDatabaseRowsetItems extends Library\DatabaseRowsetAbstract
{	
    protected function _initialize(Library\ObjectConfig $config)
    {
        $config->append(array(
            'identity_column' => 'hash'
        ));

        parent::_initialize($config);
    }
}