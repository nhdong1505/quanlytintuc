<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnect
 *
 * @author HongDong
 */
class DBConnect {

    public $conn;

    //put your code here
    // Hàm Kết Nối
    function __construct() {
        if (!$this->conn) {
            // Kết nối
            $this->conn = mysqli_connect('localhost', 'root', '', 'quanlytintuc') or die('Lỗi kết nối');
            // Xử lý truy vấn UTF8 để tránh lỗi font
            // mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }

    public function update($array = array(), $id) {

        $sql = "update " . $this->table . " SET ";
        $sql1 = "";
        // $cout = 0;
        foreach ($array as $key => $value) {
            //  $cout++;
            //  if ($cout < count($array)) {
            $sql1 .= $key . "=" . "'" . $value . "'" . ",";
            //  } else {
            //  $sql .=$key . "=" . "'" . $value . "'";
            //}
        }
        $sql1 = trim($sql1, ",");
        $sql .= $sql1 . " Where " . "$id" . " = " . $this->id;
        return $sql;
    }

    /**
     * Delete data
     * @param type $array
     * @return string
     */
    public function delete($array = array()) {
        $sql = "DELETE FROM " . $this->table . " WHERE ";
        foreach ($array as $key => $value) {
            $sql.= $key . "=" . $value;
        }
        return $sql;
    }

    public function delete_all($array = array()) {
        $sql = "DELETE FROM " . $this->table . " WHERE " . $this->id_table . " IN (";
        foreach ($array as $key => $value) {
            $sql.= $value . ",";
        }
        $sql = trim($sql, ',');
        $sql.= ")";
        return $sql;
    }

// 
    /**
     * 
     * @return string
     */
    public function getListByID($array = array()) {
        foreach ($array as $key => $value) {
            $sql = "SELECT * FROM " . $this->table . " WHERE " . $key . " = " . $value . "";
        }
        return $sql;
    }

    public function getAllList($start, $limit) {
        $sql = "select * from " . $this->table . " LIMIT " . $start . "," . $limit;
        return $sql;
    }

   
    public function getAllList_unlimit() {
        $sql = "select * from " . $this->table;
        //  echo $sql;
        return $sql;
    }

    public function insert($array = array()) {
        $sql = "INSERT INTO " . $this->table . "";
        $sql1 = "";
        $sql2 = "";
        $cout = 0;
        foreach ($array as $key => $value) {
            $cout++;
            $sql1.="" . $key . ",";
            $sql2.="" . "'" . $value . "'" . ",";
        }
        $sql2 = trim($sql2, ",");
        $sql1 = trim($sql1, ",");
        $sql.= "(" . $sql1 . ") " . " Values( " . $sql2 . " ) ";
        return $sql;
    }

    public function search($array = array()) {
        foreach ($array as $key => $value) {
            $sql = "SELECT * FROM " . $this->table . " WHERE MATCH (" . $key . ") AGAINST ( '" .$value."' IN BOOLEAN MODE)";
        }
        return $sql;
    }

//    public function searchByName($name) {
//        $sql = "SELECT * FROM " . $this->table . " WHERE name LIKE '%" . $name . "%'";
//        return $sql;
//    }
}
