<?php
// Kết nối CSDL
include_once'../include/getNewsList.php';
include_once '../include/getCateList.php';

$id = isset($_GET['id']) ? $_GET['id'] : 'null';
$array = array("news_id" => $id);
$news_arr = $news->getListByIDNews($array);
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
        <?php 
        //echo $news_arr->getCategory_id();
        ?>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">News Manager</a>
                </div>
                <!-- Top Menu Items -->
               
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
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 panel-login">
                            <div class="panel panel-default ">
                                <div class="panel-heading">EDIT NEWS </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="GET" action="../controls/update_news.php">
                                        <input type="hidden" name="_token" value="trainningcowell2222" >
                                        <div style="display: none"class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label"> ID: </label>

                                            <div class="col-md-6">
                                                <input id="nameuser" type="text" class="form-control" name="id"
                                                       value="<?php echo $news_arr->getNews_id(); ?>" required autofocus  maxlength="100">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label"> Title Name: </label>

                                            <div class="col-md-6">
                                                <input id="nameuser" type="text" class="form-control" name="title"
                                                       value="<?php echo $news_arr->getTitle(); ?>" required autofocus  maxlength="100">
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Sapo: </label>

                                            <div class="col-md-6">
                                                <input id="nameuser" type="text" class="form-control" name="sapo"
                                                       value="<?php echo $news_arr->getSapo(); ?>"  required autofocus  maxlength="100">
                                            </div>
                                        </div> 
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Content: </label>

                                            <div class="col-md-6">
                                                <textarea rows="7" id="nameuser" type="textarea" class="form-control" name="content"
                                                          value="" required autofocus  ><?php echo $news_arr->getContent(); ?></textarea>
                                            </div>
                                        </div> 
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Categories's: </label>

                                            <div class="col-md-6">
                                                <select id="id_parent" name="categories" style="height: 29px;margin-top: 5px; width: 100px;">
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
                                            <label for="name" class="col-md-4 control-label">Rank: </label>

                                            <div class="col-md-6">
                                                <input type="checkbox" name="is_hot[]" value="1">New<br>
                                                <input type="checkbox" name="is_hot[]" value="2" checked>Focus<br>
                                                <input type="checkbox" name="is_hot[]" value="4" checked>Hot<br>
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
                                                <button type="submit" onclick="" class="btn btn-success">
                                                    OK
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
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

    <script src="../public/js/jquery.js" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../public/js/bootstrap.js" type="text/javascript"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../public/js/plugins/morris/raphael.min.js" type="text/javascript"></script>
    <script src="../public/js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="../public/js/plugins/morris/morris-data.js" type="text/javascript"></script>
       <script>
           var id_ct= "<?php echo $news_arr->getCategory_id();  ?>"
            $("#id_parent").val(id_ct);
        </script>
</html>