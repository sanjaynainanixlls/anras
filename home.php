<?php
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>HOME :: ANRAS</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/plugins/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">
            <?php include_once 'leftSidebar.php'; ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Shri Anandpur 
                            </h1>

                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dashboard
                                </li>
                            </ol>
                        </div>

                    </div>
                    <!-- /.row -->

                    <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
                        <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong style="font-size:16px"><?php echo $_SESSION['message']; ?></strong>
                        </div>
                    <?php } unset($_SESSION['message']);?>
                    <div class="row">
                        <a href="roomAllocation.php"><div class="col-lg-6 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">
                                        <div class="row">
                                            <h1>Allot A New Room</h1>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        <a href="checkout.php"><div class="col-lg-6 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">
                                        <div class="row">
                                            <h1>Checkout</h1>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        <a href="completeStatus.php"><div class="col-lg-6 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">
                                        <div class="row">
                                            <h1>Complete Status</h1>
                                        </div>
                                    </div>
                                </div>
                            </div></a>
                        <a href="roomStatus.php"><div class="col-lg-6 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading text-center">
                                        <div class="row">
                                            <h1>Room Status</h1>
                                        </div>
                                    </div>
                                </div>
                            </div></a>

                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->
        </div>


        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Additional JavaScript -->
        <script src="js/script.js"></script>



    </body>

</html>
