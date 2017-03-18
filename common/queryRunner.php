<?php


//include '../config/connection.php';
class queryRunner {
    
    private static function getConnection(){
        $db_conn = new connection();
        return $db_conn->getConnection();
    }
    
    public static function doSelect($query, $db_conn = NULL, $key = NULL) { 
        //echo $query;
        $result = Array();
        if ($query == "")
            return $result;
        $output = mysqli_query(self::getConnection(), $query);
        if ($output && mysqli_num_rows($output) > 0) {
            while ($row = mysqli_fetch_assoc($output)) {
                if ($key == NULL) {
                    $result[] = $row;
                } else {
                    $result[$row[$key]] = $row;
                }
            }
        }else{
            return FALSE;
        }
        return $result;
    }

    public static function doUpdate($query, $db_conn=NULL) {
        $result = array('status' => false, 'rows' => 0);
        if ($query == "")
            return $result;
        $output = mysqli_query(self::getConnection(), $query);
        if ($output > 0) {
            $result['status'] = true;
            $result['rows'] = $output;
        }
        return $result;
    }

    public static function doInsert($query, $db_conn=NULL) {
        return self::doUpdate($query, $db_conn);
    }
    
    public static function doDelete($query, $db_conn) {
        return self::doUpdate($query, $db_conn);
    }

    public static function is_user_exist($user,$db_conn){
        $query = "SELECT username FROM users where username = '".$user."'";
        return self::is_record_exist($query,$db_conn);
    }

    public static function is_entry_exist($table,$column,$val,$db_conn){
        $query = "SELECT ".$column." FROM ".$table." WHERE ".$column." = '".$val."'";
        return self::is_record_exist($query,$db_conn);
    }

    public static function is_record_exist($query, $db_conn) {
        $query_result = mysqli_query(self::getConnection(), $query);
        if (mysqli_num_rows($query_result) < 1) {
            return false;
        } else {
            return true;
        }
    }

    public static function is_otp_exists($email,$db_conn){
        $query = "SELECT email_id from otp_recovery WHERE email_id = '".$email."'";
        return self::is_record_exist($query, $db_conn);
    }

    public static function getFromConfig($key,$returnArray){
        $query = "SELECT `value` FROM config_base WHERE `key` = '".$key."' AND isactive  = 1";
        $result = self::doSelect($query,self::getConnection());
        $result = $result[0]['value'];
        if($returnArray){
            $result = explode(',', $result);
            return $result;
        }else
        return $result;
    }
}

?>