<?php

class Functions {

    public static function arrayToString($array, $delim) {
        if (sizeof($array) < 1)
            return "";
        $inStr = "";
        for ($e = 0; $e < sizeof($array); $e++) {
            $inStr .="'" . $array[$e] . "'" . $delim;
        }
        return substr($inStr, 0, -1);
    }

    public static function StringToArray($string, $delim) {
        $array = explode($delim, $string);
        return $array;
    }

    public static function trimArrayVals($array) {
        foreach ($array as $key => $value) {
            $new_array[$key] = trim($value);
        }
        return $new_array;
    }

    public static function dateConverter($dateStr) {
        $datetime = date_create($dateStr);
        $data = date_format($datetime, "d M Y H:i:s");
        return $data;
    }

    public static function fbDateFormat($dateStr) {
        $datetime = date_create($dateStr);
        $dataOnly = date_format($datetime, "d M Y");
        $timeOnly = date_format($datetime, "H:i:s");
        return $dataOnly . ' at ' . $timeOnly;
    }

    public static function getPostParams() {
        if (empty($_POST)) {
            return NULL;
        }
        $postParams;
        foreach ($_POST as $key => $value) {
            $postParams[$key] = $value;
        }
        return $postParams;
    }

    public static function encryptString($string, $salt) {
        $magicString = 'HeyBroThisIsSparta';
        //store $salt into database.
        $storedHash = $salt . $string;
        for ($i = 0; $i < 50000; $i++) {
            $storedHash = hash('sha256', $storedHash);
        }
        return $storedHash;
    }

    public static function clearSearchKey($searchFor) {
        if (empty($searchFor)) {
            return '';
        }
        $phrasesToClear = array('is', 'am', 'are', 'the', 'of', 'did', 'a', 'be', 'for', 'like', '');
        foreach ($phrasesToClear as $phrase) {
            $searchFor = preg_replace("# " . $phrase . " #i", " ", $searchFor);
        }
        return $searchFor;
    }

    public static function removeEmptyKeys($inputArray = NULL) {
        if (empty($inputArray))
            return;
        foreach ($inputArray as $index => $key) {
            if (empty($key)) {
                unset($inputArray[$index]);
            }
        }
        return $inputArray;
    }

    public static function display($key, $data, $doDie = FALSE) {
        if (is_string($data)) {
            echo '<br>----<br>' . $key . ' : ' . $data . '<br>----<br>';
        } else {
            echo '<br>----<br>' . $key . ' : ';
            var_dump($data);
            echo '<br>----<br>';
        }
        if ($doDie)
            die;
    }

    public static function matchAndConvert($str) {
        //$str = "p1:12|p2:18|";
        $strToArr = explode("|", $str);
        $empty = array_pop($strToArr);
        for ($i = 0; $i < count($strToArr); $i++) {
            $lastArr[$i] = explode(":", $strToArr[$i]);
        }
        $strToSearch = "p1";
        for ($i = 0; $i < count($lastArr); $i++) {
            for ($j = 0; $j < count($lastArr[$i]); $j++) {
                if ($lastArr[$i][$j] == $strToSearch) {
                    $lastArr[$i][$j + 1] = 40;
                }
            }
        }
        Functions::convertUserDetailsToString($lastArr);
    }

    public static function convertUserDetailsToString($arr) {
        for ($i = 0; $i < count($arr); $i++) {
            $interArr[$i] = implode(":", $arr[$i]);
        }
        $finalStr = implode("|", $interArr);
        return $finalStr."|";
    }

}

?>