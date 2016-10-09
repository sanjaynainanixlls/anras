<?php

class userDataHandler {

    public static function authenticateUser($user, $pwd) {
        $query = "SELECT username, role, id FROM user WHERE username = '" . $user . "' AND password = '" . ($pwd) . "'";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public static function registerUser($data) {
        $data['userId'] = $_SESSION['userId'];
        $query = 'INSERT INTO guest (name,phoneNumber,city,numberOfPeople,dateOfArrival,dateOfDeparture,amountPaid,createdBy,createdTime)'
                . 'values("' . $data["name"] . '","' . $data["phoneNumber"] . '","' . $data["city"] . '","' . $data["numberOfPeople"] . '","' . $data["comingDate"] . '","' . $data["returnDate"] . '","' . $data["amountPaid"] . '","' . $data["userId"] . '",now())';
        $result = queryRunner::doInsert($query);
        if (!empty($result))
            return TRUE;
    }

    //allocate room  to the bhagats
    public static function allocateRoom($data){
        $query = "UPDATE guest SET roomNumberAllotted = '".$data['roomNumberAlloted']."' WHERE id ='".$data['name']."'";
        $result = queryRunner::doUpdate($query);
        self::entryRoom($data);
        if (!empty($result))
            return TRUE;
    }
    //get complete status form guest table
    public static function getCompleteStatus() {
        $query = "SELECT * FROM guest";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function getCompleteStatusById($id) {
        if (isset($id) && !empty($id)) {
            $query = "SELECT * FROM guest Where id= '" . $id . "'";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function checkoutUserById($id) {
        if(isset($id['checkoutId']) && !empty($id['checkoutId'])){
            $query = "SELECT * FROM guest Where id= '" . $id['checkoutId'] . "'";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }
         public static function  entryRoom($data){
        
        $query = "UPDATE rooms SET ";
    }   
//    public function checkOutUser($data){
//        if((isset($data['userId']) && !empty($data['userId'])) && isset($data['roomNum']) && !empty($data['roomNum'])){
//           $query1 = "SELECT * FROM guest Where id = '" . $data['userId'] . "'";
//           $userData = queryRunner::doSelect($query1);
//           
//           $query2 = ""
//        }
//    }
    
    public function addNewUser($data){
        $query = "SELECT username FROM user WHERE username ='".$data['username']."'";
        $result = queryRunner::doSelect($query);
        if(empty($result)){
            $query = "INSERT into user (name,username,password,role) values ('".$data['name']."','".$data['username']."','".$data['password']."','".$data['role']."')";
            $result = queryRunner::doInsert($query);
            return $result;
        }
        return false;
    }
}

?>