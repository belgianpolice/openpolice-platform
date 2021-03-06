<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2007 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Library;

/**
 * Abstract Tag Template Filter
 *
 * Filter to parse tags
 *
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Library\Template
 */
abstract class TemplateFilterTag extends TemplateFilterAbstract implements TemplateFilterRenderer
{
	/**
     * Initializes the options for the object
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param  ObjectConfig $config  An optional ObjectConfig object with configuration options
     * @return void
     */
    protected function _initialize(ObjectConfig $config)
    {
        $config->append(array(
            'priority' => self::PRIORITY_LOW,
        ));

        parent::_initialize($config);
    }

	/**
	 * Find any virtual tags and render them
     *
     * This function will pre-pend the tags to the content
	 *
	 * @param string $text  The text to parse
	 */
	public function render(&$text)
	{
		//Parse the tags
		$tags = $this->_parseTags($text);

		//Prepend the tags again to the text
		$text = $tags.$text;
	}

	/**
	 * Parse the text for the tags
	 *
	 * @param string $text  The text to parse
	 * @return string
	 */
	abstract protected function _parseTags(&$text);

    /**
     * Render the tag
     *
     * @param 	array	$attribs Associative array of attributes
     * @param 	string	$content The element content
     * @return string
     */
	abstract protected function _renderTag($attribs = array(), $content = null);
}