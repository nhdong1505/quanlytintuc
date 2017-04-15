<?php
require '../models/Category.php';
$cate = new Category(TRUE);
$name_search = $_GET['search'];
$array_name= array("name"=>$name_search);
$list_cate_unlimit = $cate->getAllList_unlimitCate();
$total_records = count($cate->searchCate($array_name));
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 4;
$total_page = ceil($total_records / $limit);
$start = ($current_page - 1) * $limit;
$list_cate = $cate->searchCate($array_name);
//$list_cate = $cate->searchByNameCate($_GET['search']);
?>
