<?php
// Kết nối CSDL

include_once'../include/getNewsList.php';
include_once '../include/getCateList.php';
?>

<html> 
    <head>
        <style>

        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Bootstrap 101 Template</title>
        <!-- Bootstrap -->
        <link href="../public/css/modal.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap Core CSS -->
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Custom CSS -->
        <link href="../public/css/sb-admin.css" rel="stylesheet" type="text/css"/>
        <!-- Morris Charts CSS -->
        <link href="../public/css/plugins/morris.css" rel="stylesheet" type="text/css"/>
        <!-- Custom Fonts -->
        <link href="../public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">

                    <a class="navbar-brand" href="index.html">News Manager</a>
                </div>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#cate_menu"><i class="fa fa-fw fa-arrows-v"></i> Categories <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="cate_menu" class="collapse">
                                <li>
                                    <a href="show_category_form.php"><i class=""></i>Show_ALL</a>
                                </li>
                                <?php
                                for ($i = 0; $i < $total_records; $i++) {
                                    echo "<li>";

                                    echo'<a href="#">' . $list_cate_unlimit[$i]->getName() . '</a>';
                                    echo "</li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="show_news_form.php"><i class="fa fa-fw fa-dashboard"></i> News</a>
                        </li>

                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">


                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h2 class="panel-title">List NEWS</h2>
                                </div>
                                <div class="col col-xs-6 text-right">
                                    <a href="add_news_form.php" type="button" class="btn btn-sm btn-primary btn-create">Create New </a>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            
                            <table class="table table-striped table-bordered table-list">

                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Sapo</th>
                                    <th>Created Time</th>
                                    <th>Updated Time</th>
                                    <th>Status</th>
                                    <th>Rank Hot</th>
                                    <th style="">Setting</th>

                                </tr>     

                                <?php

                                function trans($data) {
                                    if ($data == 1)
                                        return "publiced";
                                    else
                                        return "waiting";
                                }

/// da check den day!!!!!!!!!!!!!!
                         echo'<form action="../controls/delete_all_news.php" method="get" id="myCoolForm" >';
                                for ($i = 0; $i < count($list_news); $i++) {
                                    echo "<tr>";

                                    echo "<td >" . '<input type="checkbox" name="idNews_delete[]" value=' . $list_news[$i]->getNews_id() . '><br>' . "</td>";


                                    $a = $list_news[$i]->getNews_id();
                                    echo "<td style=\"width:20%\">" . ' <a href="update_news_form.php?id=' . $list_news[$i]->getNews_id() . ' "">' . $list_news[$i]->getTitle() . "</a>" . "</td>";
                                    echo "<td  style=\"width:30%\">" . $list_news[$i]->getSapo() . "</td>";
                                    echo "<td>" . $list_news[$i]->getTime_created() . "</td>";
                                    echo "<td>" . $list_news[$i]->getTime_updated() . "</td>";
                                    echo "<td>" . trans($list_news[$i]->getIs_public()) . "</td>";
                                    echo "<td>" . $list_news[$i]->getIs_hot() . "</td>";
                                    echo "<td style=\"width:15%\">" . ' <a class="btn btn-danger"  href="../controls/delete_news.php?id=' . $list_news[$i]->getNews_id() . ' " onclick="return confirm(\'Xac nhan!\')">' . 'DEL' . '</a>  ';
                                    echo ' <a class="btn btn-primary"  href="update_news_form.php?id=' . $list_news[$i]->getNews_id() . ' "">' . 'EDIT' . '</a>  ';

                                    //  echo "<td>" .'<button id="myBtn" onclick='."display_model(".$i.")>"."Edit".'</button>'. "</td>";
                                    ?>
                                                                                                                                                              <!--   echo "<td>" . "<a onclick='return confirm('jghg')'"." href='delete_category.php'>" . "Delete" . "</a>" . "</td>";-->
                                                        <!--<button type="button" class="btn btn-default" id="myBtn" onclick="<?php echo"display_model();" ?>">Edit</button></td>-->     

                                    <?php
                                    echo"</tr>";
                                }
                                echo ' <input type="submit" value="Delete_ALL">';
                                echo '</form>';
                                ?>
                            </table>

                            <ul class="pagination hidden-xs pull-right">
                                <?php
// PHẦN HIỂN THỊ PHÂN TRANG
// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                if ($current_page > 1 && $total_page > 1) {
                                    echo "<li>" . '<a href="show_news_form.php?page=' . ($current_page - 1) . '">Prev</a>  ' . "</li>";
                                }

// Lặp khoảng giữa

                                for ($i = 1; $i <= $total_page; $i++) {
                                    // Nếu là trang hiện tại thì hiển thị thẻ span
                                    // ngược lại hiển thị thẻ a
                                    if ($i == $current_page) {
                                        echo "<li>" . '<span>' . $i . '</span>  ' . "</li>";
                                    } else {
                                        echo "<li>" . '<a href="show_news_form.php?page=' . $i . '">' . $i . '</a>  ' . "</li>";
                                    }
                                }

// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                if ($current_page < $total_page && $total_page > 1) {
                                    echo "<li>" . '<a href="show_news_form.php?page=' . ($current_page + 1) . '">Next</a>  ' . "</li>";
                                }
                                ?>
                            </ul>        
                        </div>
                    </div>

                    <!-- The Modal -->



                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- /#page-wrapper -->
    </body>
    <script>
        var el = document.getElementById('myCoolForm');

        el.addEventListener('submit', function () {
            return confirm('Ban muon xoa?');
        }, false);
    </script>
    <script src="../public/js/jquery.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../public/js/bootstrap.js" type="text/javascript"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../public/js/plugins/morris/raphael.min.js" type="text/javascript"></script>
    <script src="../public/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="../public/js/plugins/morris/morris-data.js" type="text/javascript"></script>
</html>