<?php

require '../models/Category.php';

$id=  isset($_POST['category_ID']) ? $_POST['category_ID'] : 'null';
$category_name = isset($_POST['category_name']) ? $_POST['category_name'] : 'null';
$name_seo = (int) isset($_POST['seo_name']) ? $_POST['seo_name'] : 0;
$is_public = (int) isset($_POST['is_public']) ? $_POST['is_public'] : 0;
$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : 0;
$date = date('Y-m-d H:i:s');

//echo "iD: ".$id." Thoi gian ". $date." ";
$array_update = array('name' => $category_name, 'parentID' => $parent_id, 'name_seo' => $name_seo, 'time_update' => $date, 'is_public' => $is_public);
$cate = new Category($id);
//
$update_cate = $cate->updateCate($array_update);
if ($update_cate) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header("location: ../views/show_category_form.php");
} else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../views/show_category_form.php'>Thử lại</a>";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

