<?php
if(!isset($_SESSION))
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
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN')
                    header("location: ../home.php");
                else if (isset($_SESSION['role']) && $_SESSION['role'] == 'RECEPTION') {
                    header("location: ../dataEntry.php");
                } else if (isset($_SESSION['role']) && $_SESSION['role'] == 'INVENTORY') {
                    header("location: ../inventoryById.php");
                }
            } else {
                $_SESSION['error'] = "Invalid Username or Password!";
                header("location: ../index.php");
            }
        } else if ($this->postParams['action'] == 'registerUser') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->registerUser($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "User with ID: " . $result[0]['id'] . " Added Successfully!";
                header("location: ../dataEntry.php");
            } else {
                $_SESSION['error'] = "Invalid Username or Password!";
                header("location: ../index.php");
            }
        }  else if ($this->postParams['action'] == 'roomAllocation') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->allocateRoom($this->postParams);
            if (!empty($result)) {
                if ($_SESSION['role'] == 'ADMIN') {
                    $_SESSION['message'] = "Room Number: ".$result[0]['roomNumberAllotted'].' has been Alloted to Bhagat id :'.$result[0]['id'];
                    header("location: ../home.php");
                }
            }
        } else if ($this->postParams['action'] == 'checkOutUser') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->checkOutUser($this->postParams);
            if ($result['status'] == 1) {
                if ($_SESSION['role'] == 'ADMIN') {
                    header("location: ../home.php");
                } elseif ($_SESSION['role'] == 'RECEPTION') {
                    header("location: ../dataEntry.php");
                }
            }
        } else if ($this->postParams['action'] == 'addNewUser') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->addNewUser($this->postParams);
            if ($result) {
                session_start();
                $_SESSION['message'] = "New User Added Successfully";
                header("location: ../home.php");
            } else {
                session_start();
                $_SESSION['message'] = "User Name Already Exists!!!";
                header("location: ../addUser.php");
            }
        } elseif ($this->postParams['action'] == 'checkoutUsers') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->checkoutUsers($this->postParams);
            if ($result['status'] == 1) {
                if ($_SESSION['role'] == 'ADMIN') {
                    header("location: ../home.php");
                } elseif ($_SESSION['role'] == 'RECEPTION') {
                    header("location: ../dataEntry.php");
                }
            }
        } else if ($this->postParams['action'] == 'allotInventory') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->allotInventoryToUser($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "Inventory Alloted to User: " . $result[0] . ', Please Collect ' . $result[1] . ' INR';
                header("location: ../inventoryById.php");

                }
            else{
                session_start();
                $_SESSION['message'] = "Inventory has been already alloted to this User. Please check.";
                header("location: ../inventoryById.php");
            }
        } else if($this->postParams['action'] == 'returnInventory') {
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->releaseInventory($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "Return ".$result[0].' INR to UserId: '.$result[1];
                header("location: ../returnInventoryById.php");
                }
        } else if($this->postParams['action'] == 'tallyCash') {
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->tallyCash($this->postParams);
            if (isset($result)) {
                session_start();
                $_SESSION['tallyCash'] = $result;
                header("location: ../tallyCash.php");
                }
        }
    }

}

$ActionObj = new Action();
$ActionObj->execute();
?>
