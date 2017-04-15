<?php
// Kết nối CSDL
include_once'../include/getNewsList.php';
include_once '../include/getCateList.php';
//if(isset())
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
                                <div class="panel-heading">ADD NEW CATEGORY</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="GET" action="../controls/add_category.php">
                                        <input type="hidden" name="_token" value="trainningcowell2222" >

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label"> Category Name: </label>

                                            <div class="col-md-6">
                                                <input id="nameuser" type="text" class="form-control" name="category_name"
                                                       value="" required autofocus  maxlength="50">
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Seo Name: </label>

                                            <div class="col-md-6">
                                                <input id="nameuser" type="text" class="form-control" name="seo_name"
                                                       value="" required autofocus  maxlength="100">
                                            </div>
                                        </div> 

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Cate Parent: </label>

                                            <div class="col-md-6">
                                                <select name="parent_id" style="height: 29px;margin-top: 5px; width: 100px;">
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
                                                <button type="submit" onclick="" class="btn btn-success">
                                                    ADD
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                    </form>
                                </div>
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