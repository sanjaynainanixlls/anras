<?php
session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';
class Action {

    private $postParams;

    public function execute() {
        $this->postParams = Functions::getPostParams();
        if ($this->postParams['action'] == 'login') {
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->authenticateUser($this->postParams['username'], $this->postParams['pwd']);
                if (!empty($result)) {
                    $_SESSION["user"] = $result[0]['username'];
                    $_SESSION["role"] = $result[0]['role'];
                    $_SESSION["userId"] = $result[0]['id'];
                    if(isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN')
                        header("location: ../home.php");
                    else if(isset($_SESSION['role']) && $_SESSION['role'] == 'RECEPTION')
                        header("location: ../dataEntry.php");
                } else {
                    $_SESSION['error'] = "Invalid Username or Password!";
                    header("location: ../index.php");
                }
        } else if ($this->postParams['action'] == 'registerUser') {
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->registerUser($this->postParams);
                if (!empty($result)) {
                    header("location: ../dataEntry.php");
                }
        } else if ($this->postParams['action'] == 'roomAllocation') {
                $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->allocateRoom($this->postParams);
            if (TRUE) {
                header("location: ../completeStatus.php");
                }
            }
            else if($this->postParams['action'] == 'checkoutData'){
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->checkOutUser($this->postParams);
            }
        }
        
    }

$ActionObj = new Action();
$ActionObj->execute();
?>
