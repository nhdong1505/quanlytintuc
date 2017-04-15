<?php
require_once '../models/News.php';
$news = new News(TRUE);
$list_news_unlimit = $news->getAllList_unlimitNews();
$total_records = count($list_news_unlimit);
//echo"$total_records";
$check="news";
    include_once 'getPaging.php';
?>