<?php

require '../models/News.php';


    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $news = new News(true);
    $array = array("news_id " => $id);
// delete thu muc
    $delete_news = $news->deleteNews($array);
//$array_parent = array("parentID" => $id);
//$delete =$cate->deleteCate($array_parent);
    if ($delete_news) {
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        header("location: ../views/show_news_form.php");
    } else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../views/show_news_form.php'>Thử lại</a>";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
