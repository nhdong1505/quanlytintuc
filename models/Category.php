<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DBConnect.php';

/**
 * Description of category
 *
 * @author HongDong
 */
class Category extends DBConnect {

//put your code here
    protected $id;
    private $name;
    private $parentID;
    private $tatal_news;
    private $time_created;
    private $time_update;
    private $name_seo;
    private $keyword;
    private $description;
    private $is_public;
    var $table = "categories";
    var $id_table = "IdCategories";

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setParentID($parentID) {
        $this->parentID = $parentID;
    }

    public function setTatal_news($tatal_news) {
        $this->tatal_news = $tatal_news;
    }

    public function setTime_created($time_created) {
        $this->time_created = $time_created;
    }

    public function setTime_update($time_update) {
        $this->time_update = $time_update;
    }

    public function setName_seo($name_seo) {
        $this->name_seo = $name_seo;
    }

    public function setKeyword($keyword) {
        $this->keyword = $keyword;
    }
    /*
     * 
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    public function setIs_public($is_public) {
        $this->is_public = $is_public;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getParentID() {
        return $this->parentID;
    }

    public function getTatal_news() {
        return $this->tatal_news;
    }

    public function getTime_update() {
        return $this->time_update;
    }

    public function getTime_created() {
        return $this->time_created;
    }

    public function getName_seo() {
        return $this->name_seo;
    }

    public function getKeyword() {
        return $this->keyword;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getIs_public() {
        return $this->is_public;
    }

    function __construct($id) {
        $this->id = $id;
        parent::__construct();
        // var_dump($this->conn);
    }
/*
 * return all list categories 
 */
    function getAllList_unlimitCate() {
        $arrayCate = array();
        $sql = $this->getAllList_unlimit();
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $cate = new Category($row['IdCategories']);
            $cate->setName($row['name']);
            $cate->setParentID($row['parentID']);
            $cate->setTatal_news($row['total_news']);
            $cate->setTime_created($row['time_created']);
            $cate->setIs_public($row['is_public']);
            $cate->setName_seo($row['name_seo']);
            $cate->setDescription($row['description']);
            $cate->setKeyword($row['keyword']);
            array_push($arrayCate, $cate);
        }
        return $arrayCate;
    }

    function getAllListCate($start, $limit) {
        $arrayCate = array();
        $sql = $this->getAllList($start, $limit);
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $cate = new Category($row['IdCategories']);
            $cate->setName($row['name']);
            $cate->setParentID($row['parentID']);
            $cate->setTatal_news($row['total_news']);
            $cate->setTime_created($row['time_created']);
            $cate->setTime_update($row['time_update']);
            $cate->setIs_public($row['is_public']);
            $cate->setName_seo($row['name_seo']);
            $cate->setDescription($row['description']);
            $cate->setKeyword($row['keyword']);
            array_push($arrayCate, $cate);
        }
        return $arrayCate;
    }

    function getListByIDCate($arrayCate = array()) {
        // $cate = new Category(TRUE);
        $sql = $this->getListByID($arrayCate);
        //echo $sql;
        $cate;
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $cate = new Category($row['IdCategories']);
            $cate->setName($row['name']);
            $cate->setParentID($row['parentID']);
            $cate->setTatal_news($row['total_news']);
            $cate->setTime_created($row['time_created']);
            $cate->setTime_update($row['time_update']);
            $cate->setIs_public($row['is_public']);
            $cate->setName_seo($row['name_seo']);
            $cate->setDescription($row['description']);
            $cate->setKeyword($row['keyword']);
        }
        return $cate;
    }

    function getListByParentID($array = array()) {
        $sql = $this->getListByID($array);
        $arrayCate = array();
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $cate = new Category($row['IdCategories']);
            $cate->setName($row['name']);
            $cate->setParentID($row['parentID']);
            $cate->setTatal_news($row['total_news']);
            $cate->setTime_created($row['time_created']);
            $cate->setTime_update($row['time_update']);
            $cate->setIs_public($row['is_public']);
            $cate->setName_seo($row['name_seo']);
            $cate->setDescription($row['description']);
            $cate->setKeyword($row['keyword']);
            array_push($arrayCate, $cate);
        }
        return $arrayCate;
    }

    function insertCate($array = array()) {
        // parent::insert($array);
        $sql = $this->insert($array);
        //print_r($sql);
        $result = mysqli_query($this->conn, $sql);
        // echo"hah";
        //print_r($result);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function deleteCate($array = array()) {
        $sql = $this->delete($array);
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }

    function deleteAllCate($array = array()) {
        $sql = $this->delete_all($array);
        echo $sql;
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }

    function updateCate($array = array()) {
        $sql = $this->update($array, 'idCategories');

        $result = mysqli_query($this->conn, $sql);
        // echo $sql;
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }

    function searchCate($array = array()) {
        $sql = $this->search($array);
        $result = mysqli_query($this->conn, $sql);
        $arrayCate = array();
//        echo $sql;
        while ($row = mysqli_fetch_assoc($result)) {
            $cate = new Category($row['IdCategories']);
            $cate->setName($row['name']);
            $cate->setParentID($row['parentID']);
            $cate->setTatal_news($row['total_news']);
            $cate->setTime_created($row['time_created']);
            $cate->setTime_update($row['time_update']);
            $cate->setIs_public($row['is_public']);
            $cate->setName_seo($row['name_seo']);
            $cate->setDescription($row['description']);
            $cate->setKeyword($row['keyword']);
            array_push($arrayCate, $cate);
        }
        return $arrayCate;
    }

}

//  $test= new Category(true);
//  $t = $test->searchCate(array("name"=>"aaaaa"));  echo"<pre>";
  //print_r($t);
//$test = new Category(25);
//$t = $test->searchByNameCate('dong');

