<?php

//echo"haha";
require '../models/Category.php';
$name = isset($_GET['idCate_delete']) ? $_GET['idCate_delete'] : null;
if($name==null){
    header("location: ../views/show_category_form.php");
}
else{
    $cate = new Category(True);
$delete_cate = $cate->deleteAllCate($name);
// optional
// echo "You chose the following color(s): <br>";
if ($delete_cate) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header("location: ../views/show_category_form.php");
} else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../views/show_category_form.php'>Thử lại</a>";
}

//foreach ($name as $key => $val) {
//    echo $key . "<br />" . $val;
//}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
