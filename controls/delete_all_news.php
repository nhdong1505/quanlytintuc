<?php

require '../models/News.php';
$name = isset($_GET['idNews_delete']) ? $_GET['idNews_delete'] : null;

$news = new News(True);
$delete_news = $news->delete_allNews($name);
// optional
// echo "You chose the following color(s): <br>";
if ($delete_news) {
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    header("location: ../views/show_news_form.php");
} else
    header("location: ../views/show_news_form.php");

?>