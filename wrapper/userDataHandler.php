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
        if (!empty($result)){
            echo $query = "SELECT id FROM guest where name='".$data["name"]."' ORDER BY id DESC LIMIT 1";
            $result = queryRunner::doSelect($query);
            return $result;
        }
    }

    //allocate room  to the bhagats
    public static function allocateRoom($data) {
        $query = "UPDATE guest SET roomNumberAllotted = '" . $data['roomNumberAlloted'] . "' WHERE id ='" . $data['name'] . "'";
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
        if (isset($id['checkoutId']) && !empty($id['checkoutId'])) {
            $query = "SELECT * FROM guest Where id= '" . $id['checkoutId'] . "'";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public static function entryRoom($data) {

        $query = "UPDATE rooms SET ";
    }

    public function checkOutUser($data) {
        $city = '';
        if ((isset($data['userId']) && !empty($data['userId']))) {
            $query1 = "UPDATE guest SET isCheckout = '1' WHERE id = '" . $data['userId'] . "'";
            $userData = queryRunner::doUpdate($query1);
            if ($userData['status'] == 1) {
                $sql1 = "SELECT city FROM guest WHERE roomNumberAllotted = '" . $data['roomNumberAllotted'] . "' AND isCheckout = '0'";
                $cityData = queryRunner::doSelect($sql1);
                for ($i = 0; $i < count($cityData); $i++) {
                    $city .= $cityData[$i]['city'] . ",";
                }
                $city = rtrim($city, ",");
                $qry = "update rooms set occupied = occupied - " . $data['numberOfPeople'] . " , city = '" . $city . "' where roomNumber = '" . $data['roomNumberAllotted'] . "'";
                $res = queryRunner::doUpdate($qry);
                return $res;
            }
        }
    }

    public function addNewUser($data) {
        $query = "SELECT username FROM user WHERE username ='" . $data['username'] . "'";
        $result = queryRunner::doSelect($query);
        if (empty($result)) {
            $query = "INSERT into user (name,username,password,role) values ('" . $data['name'] . "','" . $data['username'] . "','" . $data['password'] . "','" . $data['role'] . "')";
            $result = queryRunner::doInsert($query);
            return $result;
        }
        return false;
    }
    
    public function allotInventoryToUser($data){
        $query = "INSERT INTO inventory (guestUserId,mattress,pillow,bedsheet,quilt,lockNkey,totalAmount,isReturned,createdBy,createdTime)"
                . " values('".$data['userId']."','".$data['mattress']."','".$data['pillow']."','".$data['bedsheet']."','".$data['blanket']."','".$data['lock']."','".$data['totalAmount']."','0','".$data['createdBy']."',now())";
        $result = queryRunner::doInsert($query);
        if(!empty($result)){
            $result= array($data['userId'],$data['totalAmount']);
            return $result;
        }
        return false;
    }

    public function allRoomStatus() {
        $query = "SELECT * FROM rooms";
        $result = queryRunner::doSelect($query);
        if (!empty($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function todayCheckOutData() {
        $today = date('d/n/Y');
        $query = "SELECT * FROM guest WHERE dateOfDeparture = '" . $today . "' AND isCheckout = '0'";
        $result = queryRunner::doSelect($query);
        if (!empty($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function checkoutUsers($data) {
        $city = '';
        if ((isset($data['id']) && !empty($data['id']))) {
            $query1 = "UPDATE guest SET isCheckout = '1' WHERE id IN ('" . implode("','", $data['id']) . "')";
            $userData = queryRunner::doUpdate($query1);
            if ($userData['status'] == 1) {
                for ($i = 0; $i < count($data['roomNumberAllotted']); $i++) {
                    $sql1 = "SELECT city FROM guest WHERE roomNumberAllotted = '" . $data['roomNumberAllotted'][$i] . "' AND isCheckout = '0'";
                    $cityData = queryRunner::doSelect($sql1);
                    $city = '';
                    for ($j = 0; $j < count($cityData); $j++) {
                        $city .= $cityData[$j]['city'] . ",";
                    }
                    $city = rtrim($city, ",");
                    $qry = "update rooms set occupied = occupied - " . $data['numberOfPeople'][$i] . " , city = '" . $city . "' where roomNumber = '" . $data['roomNumberAllotted'][$i] . "'";
                    $res = queryRunner::doUpdate($qry);
                    unset($cityData);
                }
                return $res;
            }
        }
    }

    public function allCheckOutData() {
        $query = "SELECT * FROM guest WHERE isCheckout = '0'";
        $result = queryRunner::doSelect($query);
        if (!empty($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

}

?>