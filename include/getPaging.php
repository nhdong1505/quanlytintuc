<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$total_page = ceil($total_records / $limit);
$start = ($current_page - 1) * $limit;

if($check=="cate"){
    $list_cate = $cate->getAllListCate($start, $limit);
}
else {
    $list_news = $news->getAllListNews($start, $limit);
}
?>