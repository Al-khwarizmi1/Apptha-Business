<?php
/**
 * Hello Controller for Hello World Component
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Hello Hello Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class TestControllerTest extends TestController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
	}

	/**
	 * display the edit form
	 * @return void
	 */
	function edit()
	{
                $data = JRequest::get( 'post' );

                $datas = JRequest::get( 'get' );
                $data['task']=isset($data['task'])?$data['task']:'';
                $datas['task']=isset($datas['task'])?$datas['task']:'';
                if($data['task']=='edit' || $datas['task'] =='edit'){
                        JRequest::setVar( 'view', 'test' );
                        JRequest::setVar( 'layout', 'default_edit');
                        JRequest::setVar('hidemainmenu', 1);
                        parent::display();
                    }
              else{
		JRequest::setVar( 'view', 'test' );
		JRequest::setVar( 'layout', 'form');
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
            }
        }

 
        function save()
        {
                $model = $this->getModel('test');

                if ($model->store()) {
                    $msg = JText::_( 'Testimonal Saved!' );
                } else {
                    $msg = JText::_( 'Error Saving Testimonal' );
                }

                // Check the table in so it can be edited.... we are done with it anyway
                $link = 'index.php?option=com_tests';
                $this->setRedirect($link, $msg);
        }


        function remove()
        {
                $model = $this->getModel('test');
                if(!$model->delete()) {
                    $msg = JText::_( 'Error: One or More Testimonial Could not be Deleted' );
                } else {
                    $msg = JText::_( 'Testmonial(s) Deleted' );
                }

                $this->setRedirect( 'index.php?option=com_tests', $msg );
        }

        function cancel()
        {
                $msg = JText::_( 'Operation Cancelled' );
                $this->setRedirect( 'index.php?option=com_tests', $msg );
        }
}