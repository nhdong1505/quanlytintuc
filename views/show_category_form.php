<?php
// Kết nối CSDL
 
$id_parent1 =  isset($_GET['id_parent'])?$_GET['id_parent']:null;
if (isset($_REQUEST['ok'])) {
    $search = addslashes($_GET['search']);
    if (empty($search)) {
        include '../include/getCateList.php';
    } else {
        include '../include/searchCateList.php';
    }
}
 else {
        include '../include/getCateList.php';
}
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
        <title>News manager</title>
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
                <!-- Brand and toggle get grouped for better mobile display -->
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
                                for ($i = 0; $i < count($list_cate_unlimit); $i++) {
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

                    <div class="row">
                        <div class="col-md-6" style=" ">
                            <div id="custom-search-input">

                                <form action="show_category_form.php" method="get">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control input-lg" placeholder="Search" name="search" />
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-info btn-lg" name="ok" value="Search">
                                            
                                            <i class="glyphicon glyphicon-search"></i>
                                        </span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default panel-table">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-xs-6">
                                    <h2 class="panel-title">List Categories</h2>
                                </div>
                                <div class="col col-xs-6 text-right">
                                    <a href="add_category_form.php" type="button" class="btn btn-sm btn-primary btn-create">Create New</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-list">
                                <tr>
                                    <th></th>
                                    <th>Category Name</th>
                                    <th>Name Seo</th>
                                    <th>Created Time</th>
                                    <th>Updated Time</th>
                                    <th>Public</th>
                                    <th style="">Setting</th>

                                </tr>     

                                <?php

                                function trans($data) {
                                    if ($data == 1)
                                        return "publiced";
                                    else
                                        return "waiting";
                                }

                                echo'<form action="../controls/delete_all_category.php" method="get" id="myCoolForm" >';
                                for ($i = 0; $i < count($list_cate); $i++) {
                                    echo "<tr>";

                                    echo "<td>" . '<input type="checkbox" name="idCate_delete[]" value=' . $list_cate[$i]->getId() . '><br>' . "</td>";


                                    $a = $list_cate[$i]->getId();
                                    echo "<td>"."<a href=\"show_category_form.php?id_parent=".$list_cate[$i]->getId()."\">" . $list_cate[$i]->getName() ."</a>". "</td>";
                                    echo "<td>" . $list_cate[$i]->getName_seo() . "</td>";
                                    echo "<td>" . $list_cate[$i]->getTime_created() . "</td>";
                                    echo "<td>" . $list_cate[$i]->getTime_update() . "</td>";
                                    echo "<td>" . trans($list_cate[$i]->getIs_public()) . "</td>";
                                    echo "<td>" . ' <a class="btn btn-danger"  href="../controls/delete_category.php?id=' . $list_cate[$i]->getId() . ' " onclick="return confirm(\'xac nhan!\')">' . 'DEL' . '</a>  ';
                                    //  echo "<td>" . '<button id="myBtn">'."Edit".'</button>' . "</td>";
                                    //  echo "<td>" .'<button id="myBtn" onclick='."display_model(".$i.")>"."Edit".'</button>'. "</td>";
                                    ?>
                                                                                                                      <!--   echo "<td>" . "<a onclick='return confirm('jghg')'"." href='delete_category.php'>" . "Delete" . "</a>" . "</td>";-->
                                    <button type="button" class="btn btn-primary" id="myBtn" onclick="<?php echo"display_model($a);" ?>">EDIT</button></td>     
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
                                    echo "<li>" . '<a href="show_category_form.php?page=' . ($current_page - 1) . '">Prev</a>  ' . "</li>";
                                }

// Lặp khoảng giữa

                                for ($i = 1; $i <= $total_page; $i++) {
                                    // Nếu là trang hiện tại thì hiển thị thẻ span
                                    // ngược lại hiển thị thẻ a
                                    if ($i == $current_page) {
                                        echo "<li>" . '<span>' . $i . '</span>  ' . "</li>";
                                    } else {
                                        echo "<li>" . '<a href="show_category_form.php?page=' . $i . '">' . $i . '</a>  ' . "</li>";
                                    }
                                }

// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                if ($current_page < $total_page && $total_page > 1) {
                                    echo "<li>" . '<a href="show_category_form.php?page=' . ($current_page + 1) . '">Next</a>  ' . "</li>";
                                }
                                ?>
                            </ul>        
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="close">&times;</span>
                                <h2>Edit Category</h2>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="POST" action="../controls/update_category.php">
                                    <input type="hidden" name="_token" value="trainningcowell2222" >

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label"> IDCategory: </label>

                                        <div class="col-md-6">
                                            <label for="" id="category_ID" class="form-control" name=""
                                                   value="" required autofocus  maxlength="50"></label>
                                            <input style="display: none" id="category_ID2" type="text" class="form-control" name="category_ID"
                                                   value="" required autofocus  maxlength="100">
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label"> Category Name: </label>

                                        <div class="col-md-6">
                                            <input id="category_name" type="text" class="form-control" name="category_name"
                                                   value="" required autofocus  maxlength="100">
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Seo Name: </label>

                                        <div class="col-md-6">
                                            <input id="seo_name" type="text" class="form-control" name="seo_name"
                                                   value="" required autofocus  maxlength="100">
                                        </div>
                                    </div> 

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Cate Parent: </label>

                                        <div class="col-md-6">
                                            <select id="id_parent" name="parent_id" style="height: 29px;margin-top: 5px; width: 100px;">
                                                <option value="0">None</option>
                                                <?php
                                                for ($i = 0; $i < $total_records; $i++) {
                                                    ?>
                                                    <option value="<?php echo $list_cate_unlimit[$i]->getId(); ?>"><?php
                                                        echo$list_cate_unlimit[$i]->getName();
                                                        ?></option>
                                                    <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div> 

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Status: </label>
                                        <div class="col-md-6">
                                            <input type="radio" name="is_public" value="1"> Publiced <br>
                                            <input type="radio" name="is_public" value="2" checked> Waiting<br>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" onclick="return confirm('Xac nhan!')" class="btn btn-success">
                                                EDIT
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <h3>Modal Footer</h3>
                            </div>
                        </div>

                    </div>

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
            return confirm('Are you sure you want to submit this form?');
        }, false);
// Get the modal
        var modal = document.getElementById('myModal');

// Get the button that opens the modal
        var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

        function display_model(a) {
            //alert(a);


            var data = {
                IDcate: a,
            };
            $.ajax({
                url: '../controls/call_data_update_category.php',
                type: 'GET',
                data: data,
                dataType: 'json',
                success: function (result) {

                    //alert(result['name']);
                    $("#category_ID").text(a);
                    $("#category_ID2").val(a);
                    $("#category_name").val(result['name']);
                    $("#seo_name").val(result['name_seo']);
                    $("#id_parent").val(result['parentID']);

                }
            });
//            $("#category_name").val("");
            //var label = document.getElementsByName('category_name')[0]; 
            // label.value = 'Thanks';
            // jQuery("label[for='category_name']").html(a);
            modal.style.display = "block";


        }


// When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

// When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="../public/js/jquery.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../public/js/bootstrap.js" type="text/javascript"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../public/js/plugins/morris/raphael.min.js" type="text/javascript"></script>
    <script src="../public/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="../public/js/plugins/morris/morris-data.js" type="text/javascript"></script>
</html>