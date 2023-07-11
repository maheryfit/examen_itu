<?php
class Daomodel extends CI_Model {

    public static function selectall($connection,$table,$condition = "")
    {
        $query = "SELECT * FROM $table ";
        if (strlen($condition) != 0) $query = $query." where $condition";

        $result = array();

        $resSet = $connection->query($query);

        echo $query;
        
        while ($eachResult = $resSet->fetch()) {
            array_push($result,$eachResult);
        }

        $resSet = null;

        return $result;
    }

    public static function insert($connection,$table,$values){
        try {
            $request = "INSERT INTO ".$table." VALUES (".$values.")";
            echo $request;

            $stm = $connection->exec($request);

            $stm = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function update($connection,$table,$set,$condition){
        try {
            $request = "UPDATE $table set $set where $condition" ;
            echo $request;

            $stm = $connection->exec($request);

            $stm = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function delete($connection,$table,$condition){
        try {
            $request = "DELETE FROM $table where $condition" ;
            echo $request;

            $stm = $connection->exec($request);

            $stm = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}

