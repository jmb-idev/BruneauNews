<?php

class CommentController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
        $db = $bootstrap->getResource('db');

        $select=$db->select();
        $select->from('Comment');

        $result = $db->query($select);

		$comments = new Application_Model_Db_Table_Comment($db);

		$rowset = $comments->fetchAll();




        foreach($rowset as $row){
			Zend_Debug::dump($row, $label=null, $echo=true);
        }
    }

    public function indexAction()
    {
        // action body


    }


}

