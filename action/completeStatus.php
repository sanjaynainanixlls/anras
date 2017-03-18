<?php
session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';


class CompleteStatus{
    
    private $postParams;
    public function execute(){
        $userDataHandlerObj = new userDataHandler();
        $result = $userDataHandlerObj->getCompleteStatus();
        return $result;
    }
}



?>
