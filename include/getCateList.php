<?php
require_once'../models/Category.php';
$cate = new Category(TRUE);
$list_cate_unlimit = $cate->getAllList_unlimitCate();
$total_records = count($list_cate_unlimit);
$_SESSION['catelist']=$list_cate_unlimit;
$check="cate";
 
include_once 'getPaging.php';

?>
