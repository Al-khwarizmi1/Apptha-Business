<?php
/**
 * Hellos Model for Hello World Component
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_5
 * @license        GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

  global $mainframe;
    $mainframe = JFactory::getApplication(); 
/**
 * Hello Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class TestModelTest extends JModel
{

    
    /**
     * Hellos data array
     *
     * @var array
     */
    var $_data;

    /**
   * Items total
   * @var integer
   */
    var $_total = null;

  /**
   * Pagination object
   * @var object
   */
     var $_pagination = null;

    /**
     * Returns the query
     * @return string The query to be used to retrieve the rows from the database
     */
      function __construct()
     {
            parent::__construct();

            global $mainframe, $option;

            // Get pagination request variables
            $limit = $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
            //$limit=3;
            $limitstart = JRequest::getVar('limitstart', 0, '', 'int');

            // In case limit has been changed, adjust it
            $limitstart = ($limit != 0 ? (floor($limitstart / $limit) * $limit) : 0);

            $this->setState('limit', $limit);
            $this->setState('limitstart', $limitstart);
  }
    
    function _buildQuery()
    {
        $query = ' SELECT * '
            . ' FROM #__testimonal '
            . ' ORDER BY id DESC'
        ;
        return $query;
    }

    /**
     * Retrieves the hello data
     * @return array Array of objects containing the data from the database
     */
    function getData()
    {
        // Lets load the data if it doesn't already exist
        if (empty( $this->_data ))
        {
            $query = $this->_buildQuery();
            $this->_data = $this->_getList( $query, $this->getState('limitstart'), $this->getState('limit') );
        }

        return $this->_data;
    }

   function getTotal()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_total)) {
 	    $query = $this->_buildQuery();
 	    $this->_total = $this->_getListCount($query);
 	}
 	return $this->_total;
  }

  function getPagination()
  {
 	// Load the content if it doesn't already exist
 	if (empty($this->_pagination)) {
 	    jimport('joomla.html.pagination');
 	    $this->_pagination = new JPagination($this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
 	}
 	return $this->_pagination;
  }

     function getFromData($id)
    {
        // Lets load the data if it doesn't already exist
           $db =& JFactory::getDBO();

            $query = ' SELECT * FROM #__testimonal '.
                '  WHERE id = '.$id;
            $db->setQuery( $query );
            $greeting = $db->loadObject();
           
        return $greeting;
    }

  function takeTime(){
         $todayd=date("Y-m-d");
        return $todayd;
    }

     function store()
        {
        $row =& $this->getTable();
      
        $data = JRequest::get( 'post' );

	  $data['date']=$this->takeTime();
        // Bind the form fields to the hello table
        if (!$row->bind($data)) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // Make sure the hello record is valid
        if (!$row->check()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        // Store the web link table to the database
        if (!$row->store()) {
            $this->setError($this->_db->getErrorMsg());
            return false;
        }

        return true;
    }


    function delete()
    {
    $cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
    $row =& $this->getTable();

    foreach($cids as $cid) {
        if (!$row->delete( $cid )) {
            $this->setError( $row->getErrorMsg() );
            return false;
        }
    }

    return true;
}

}