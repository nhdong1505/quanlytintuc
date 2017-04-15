<?php
require '../models/Category.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = isset($_GET['id'])?$_GET['id']:null;
//echo"$id";

$cate = new Category(true);
$array = array("IdCategories" => $id);
// delete thu muc
$delete_cate = $cate->deleteCate($array);
$array_parent = array("parentID" => $id);
$delete =$cate->deleteCate($array_parent);
if ($delete_cate) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header("location: ../views/show_category_form.php");
} else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../views/show_category_form.php'>Thử lại</a>";

?>
