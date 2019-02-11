<?php
/**
 * Hellos View for Hello World Component
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_5
 * @license        GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view' );

/**
 * Hellos View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class TestViewTest extends JView
{
    /**
     * Hellos view display method
     * @return void
     **/
    function display($tpl = null)
    {
        JToolBarHelper::title( JText::_( 'Testimonal Manager' ), 'generic.png' );
        JToolBarHelper::save();
        $data = JRequest::get( 'post' );
        $datas = JRequest::get( 'get' );
        $data['task']=isset($data['task'])?$data['task']:'';
        $datas['task']=isset($datas['task'])?$datas['task']:'';
       if($data['task']=='edit' || $datas['task']=='edit'){
             if($data['task']=='edit'){
                 $id=$data['cid']['0'];
             }elseif($datas['task']=='edit'){
                 $id=$datas['cid']['0'];
             }
             if($id > 0){
                 JToolBarHelper::cancel();
                 $model = &$this->getModel();
                 $greeting = $model->getFromData($id);
                 $this->assignRef( 'greeting', $greeting );
                 parent::display($tpl);
             }
       }elseif($data['task']=='add'){
                JToolBarHelper::cancel( 'cancel', 'Close' );
                parent::display($tpl);
       }else{
                 JToolBarHelper::addNewX();
                 JToolBarHelper::editListX();
                 JToolBarHelper::deleteList();
                // Get data from the model
                $items =& $this->get( 'Data');
                $pagination =& $this->get('Pagination');
                $this->assignRef( 'items', $items );
                $this->assignRef('pagination', $pagination);
                parent::display($tpl);
       }
    }
}