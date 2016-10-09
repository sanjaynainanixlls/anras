<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';


class CompleteStatus{
    
    public  function getComStatus(){
        $userDataHandlerObj = new userDataHandler();
        $result = $userDataHandlerObj->getCompleteStatus();
        return $result;
    }
}



?>
