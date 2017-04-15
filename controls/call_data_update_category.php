<?php

require '../models/Category.php';
$idcate = isset($_GET['IDcate']) ? $_GET['IDcate'] : 1;
$cate = new Category(TRUE);
$arr = array('idCategories' => $idcate);
//$cate_json =
$cate_json = $cate->getListByIDCate($arr);
$array_cate =array();
$array_cate= array('name'=>$cate_json->getName(),'name_seo'=>$cate_json->getName_seo(),'parentID'=>$cate_json->getParentID());
die(json_encode($array_cate));
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

