<?php

require '../models/News.php';

$id = isset($_GET['id']) ? $_GET['id'] : 'null';
$title = isset($_GET['title']) ? $_GET['title'] : 'null';
$sapo = (int) isset($_GET['sapo']) ? $_GET['sapo'] : 0;
$content = (int) isset($_GET['content']) ? $_GET['content'] : 0;
$categories = isset($_GET['categories']) ? $_GET['categories'] : 0;
$is_public = isset($_GET['is_public']) ? $_GET['is_public'] : 0;
$is_hot = isset($_GET['is_hot']) ? $_GET['is_hot'] : 0;
$date = date('Y-m-d H:i:s');

$hot = 0;
$news = new News($id);
foreach ($is_hot as $val) {
    $hot = $hot + (int) $val;
}

$array_insert = array('tittle' => $title, 'sapo' => $sapo, 'content' => $content, 'time_updated' => $date, 'is_public' => $is_public, 'is_hot' => $hot, 'categories_id' => $categories);

//
$update_news = $news->updateNews($array_insert);
if ($update_news) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header("location: ../views/show_news_form.php");
} else
    echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../views/show_news_form.php'>Thử lại</a>";
?>
