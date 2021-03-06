<?php
/**
 * Nooku Framework - http://www.nooku.org
 *
 * @copyright	Copyright (C) 2011 - 2017 Johan Janssens and Timble CVBA. (http://www.timble.net)
 * @license		GNU AGPLv3 <https://www.gnu.org/licenses/agpl.html>
 * @link		https://github.com/timble/openpolice-platform
 */

namespace Nooku\Component\Tags;

use Nooku\Library;

/**
 * Tags Model
 *   
 * @author  Johan Janssens <https://github.com/johanjanssens>
 * @package Nooku\Component\Tags
 */
class ModelTags extends Library\ModelTable
{
	public function __construct(Library\ObjectConfig $config)
	{
		parent::__construct($config);
		
		// Set the state
		$this->getState()
		 	->insert('table' , 'string', $this->getIdentifier()->package)
            ->insert('search', 'string');
	}
	
	protected function _buildQueryColumns(Library\DatabaseQuerySelect $query)
    {
        parent::_buildQueryColumns($query);
        
        $query->columns(array(
            'count'    => 'COUNT( relations.tags_tag_id )'
        ));
	}
	
	protected function _buildQueryGroup(Library\DatabaseQuerySelect $query)
	{	
        $query->group('tbl.tags_tag_id');
	}
	 
	protected function _buildQueryJoins(Library\DatabaseQuerySelect $query)
	{
        parent::_buildQueryJoins($query);
        
        $query->join(array('relations' => 'tags_relations'), 'relations.tags_tag_id = tbl.tags_tag_id');
	}
	
	protected function _buildQueryWhere(Library\DatabaseQuerySelect $query)
	{                
        $state = $this->getState();

        if($state->search) {
            $query->where('tbl.title LIKE :search')->bind(array('search' => '%' . $state->search . '%'));
        }
        
        if($this->getState()->table) {
            $query->where('tbl.table = :table')->bind(array('table' => $this->getState()->table));
        }
        
        parent::_buildQueryWhere($query);
	}
}