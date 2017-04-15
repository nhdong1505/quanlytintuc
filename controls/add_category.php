<?php

//require './models/Category.php';
require '../models/Category.php';
//include('connect.php');
$cate = new Category(true);
$category_name = isset($_GET['category_name']) ? $_GET['category_name'] : 'null';
$name_seo = (int) isset($_GET['seo_name']) ? $_GET['seo_name'] : 0;
$is_public = (int) isset($_GET['is_public']) ? $_GET['is_public'] : 0;
$parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : 0;
$date = date('Y-m-d H:i:s');

echo "ID: " . "$parent_id";

$array_insert = array('name' => $category_name, 'parentID' => $parent_id, 'name_seo' => $name_seo, 'time_created' => $date, 'time_update' => $date, 'is_public' => $is_public);
$add_cate=$cate->insertCate($array_insert);
if ($add_cate) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header("location: ../views/show_category_form.php");
} else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../views/show_category_form.php'>Thử lại</a>";

/*$addcategory = mysqli_query($cate->conn, "
        INSERT INTO categories (
            name,
            parentID,
            name_seo,
            time_created,
            time_update,
            is_public
        )
        VALUE (
            '{$category_name}',
            '{$parent_id}',
            '{$name_seo}',
            '{$date}',
            '{$date}',
            '{$is_public}'
        )
    ");
if ($addcategory) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header("location: show_category_form.php");
} else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";
 * 
 */
?>