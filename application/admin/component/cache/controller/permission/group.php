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
 * Group Controller Permission
 *
 * @author  Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @package Component\Cache
 */
class CacheControllerPermissionGroup extends ApplicationControllerPermissionAbstract
{  
    public function canAdd()
    {
        return false;
    }
    
    public function canEdit()
    {
        return false;
    }
}