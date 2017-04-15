<?php

require_once 'DBConnect.php';

/**
 * Description of News
 *
 * @author HongDong
 */
class News extends DBConnect {

    //put your code here
    protected $id;
    private $category_id;
    private $title;
    private $sapo;
    private $content;
    private $user_id;
    private $sensor_id;
    private $comment_id;
    private $view;
    private $time_public;
    private $tag;
    private $is_public;
    private $is_hot;
    private $time_created;
    private $time_updated;
    protected $table = "news";
    protected $id_table = "news_id";

    function __construct($news_id) {
        $this->id = $news_id;
        parent::__construct();
    }

    function getNews_id() {
        return $this->id;
    }

    function getCategory_id() {
        return $this->category_id;
    }

    function getTitle() {
        return $this->title;
    }

    function getSapo() {
        return $this->sapo;
    }

    function getContent() {
        return $this->content;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function getSensor_id() {
        return $this->sensor_id;
    }

    function getComment_id() {
        return $this->comment_id;
    }

    function getView() {
        return $this->view;
    }

    function getTime_public() {
        return $this->time_public;
    }

    function getTag() {
        return $this->tag;
    }

    function getIs_public() {
        return $this->is_public;
    }

    function getIs_hot() {
        return $this->is_hot;
    }

    function getTime_created() {
        return $this->time_created;
    }

    function getTime_updated() {
        return $this->time_updated;
    }

    function setNews_id($news_id) {
        $this->id = $news_id;
    }

    function setCategory_id($category_id) {
        $this->category_id = $category_id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setSapo($sapo) {
        $this->sapo = $sapo;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setSensor_id($sensor_id) {
        $this->sensor_id = $sensor_id;
    }

    function setComment_id($comment_id) {
        $this->comment_id = $comment_id;
    }

    function setView($view) {
        $this->view = $view;
    }

    function setTime_public($time_public) {
        $this->time_public = $time_public;
    }

    function setTag($tag) {
        $this->tag = $tag;
    }

    function setIs_public($is_public) {
        $this->is_public = $is_public;
    }

    function setIs_hot($is_hot) {
        $this->is_hot = $is_hot;
    }

    function setTime_created($time_created) {
        $this->time_created = $time_created;
    }

    function setTime_updated($time_updated) {
        $this->time_updated = $time_updated;
    }

    public function updateNews($array = array()) {
        $sql = $this->update($array, 'news_id');

        $result = mysqli_query($this->conn, $sql);
        // echo $sql;
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function deleteNews($array = array()) {
        $sql = $this->delete($array);
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function delete_allNews($array = array()) {
        $sql = $this->delete_all($array);
        echo $sql;
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function insertNews($array = array()) {
        $sql = $this->insert($array);
        $result = mysqli_query($this->conn, $sql);
        //  echo $sql;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllList_unlimitNews() {
        $arrayNews = array();
        $sql = $this->getAllList_unlimit();
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $news = new News($row['news_id']);
            $news->setTitle($row['tittle']);
            $news->setSapo($row['sapo']);
            $news->setContent($row['content']);
            $news->setCategory_id($row['categories_id']);
            $news->setIs_public($row['is_public']);
            $news->setIs_hot($row['is_hot']);
            $news->setTime_created($row['time_created']);
            $news->setTime_updated($row['time_updated']);
            array_push($arrayNews, $news);
        }
        return $arrayNews;
    }

    public function getAllListNews($start, $limit) {
        $arrayNews = array();
        $sql = $this->getAllList($start, $limit);
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $news = new News($row['news_id']);
            $news->setTitle($row['tittle']);
            $news->setSapo($row['sapo']);
            $news->setContent($row['content']);
            $news->setCategory_id($row['categories_id']);
            $news->setIs_public($row['is_public']);
            $news->setIs_hot($row['is_hot']);
            $news->setTime_created($row['time_created']);
            $news->setTime_updated($row['time_updated']);
            array_push($arrayNews, $news);
        }
        return $arrayNews;
    }

    public function getListByIDNews($array = array()) {
        // $cate = new Category(TRUE);
        $sql = $this->getListByID($array);
        //echo $sql;
        $news;
        $result = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $news = new News($row['news_id']);
            $news->setTitle($row['tittle']);
            $news->setSapo($row['sapo']);
            $news->setContent($row['content']);
            $news->setIs_public($row['is_public']);
            $news->setCategory_id($row['categories_id']);
            $news->setIs_hot($row['is_hot']);
            $news->setTime_created($row['time_created']);
            $news->setTime_updated($row['time_updated']);
        }
        return $news;
    }

//    public function  
    // private $c
}

//$test = new News(True);
//
//echo "<pre>";
//var_dump($test->getAllList_unlimitNews());
//echo"<pre>";
