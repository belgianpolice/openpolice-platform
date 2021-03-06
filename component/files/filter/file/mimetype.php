<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Files;

use Nooku\Library;

/**
 * File Mimetype Filter
 *
 * @author  Ercan Ozkaya <http://nooku.assembla.com/profile/ercanozkaya>
 * @package Nooku\Component\Files
 */
class FilterFileMimetype extends Library\FilterAbstract
{
	public function validate($row)
	{
		$mimetypes = Library\ObjectConfig::unbox($row->getContainer()->parameters->allowed_mimetypes);

		if (is_array($mimetypes))
		{
			$mimetype = $row->mimetype;

			if (empty($mimetype))
            {
				if (is_uploaded_file($row->file) && $row->isImage())
                {
					$info = getimagesize($row->file);
					$mimetype = $info ? $info['mime'] : false;
				}
                elseif ($row->file instanceof SplFileInfo) {
					$mimetype = $this->getObject('com:files.mixin.mimetype')->getMimetype($row->file->getPathname());
				}
			}

			if ($mimetype && !in_array($mimetype, $mimetypes)) {
				return $this->_error(\JText::_('Invalid Mimetype'));
			}
		}
	}
}