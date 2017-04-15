<?php

require '../models/News.php';
//include('connect.php');
$new = new News(true);
$title = isset($_GET['title']) ? $_GET['title'] : 'null';
$sapo = (int) isset($_GET['sapo']) ? $_GET['sapo'] : 0;
$content = (int) isset($_GET['content']) ? $_GET['content'] : 0;
$categories = isset($_GET['categories']) ? $_GET['categories'] : 0;
$is_public = isset($_GET['is_public']) ? $_GET['is_public'] : 0;
$is_hot = isset($_GET['is_hot']) ? $_GET['is_hot'] : 0;
$date = date('Y-m-d H:i:s');

$hot = 0;
foreach ($is_hot as $val) {
    $hot = $hot + (int) $val;
}
//echo $hot;
//echo "ID: " . $is_public;

$array_insert = array('tittle' => $title, 'sapo' => $sapo, 'content' => $content, 'time_created' => $date, 'time_updated' => $date, 'is_public' => $is_public, 'is_hot' => $hot, 'categories_id' => $categories);
$add_news = $new->insertNews($array_insert);
if ($add_news) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
     header("location: ../views/show_news_form.php");
} else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../views/add_news_form.php'>Thử lại</a>";
?>