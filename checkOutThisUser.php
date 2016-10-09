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

        <title>Do Checkout</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                                Checkout 
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-table"></i> Checkout
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <form method="Post" action="DoCheckout" id="formId">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>City</th>
                                                <th>Coming Date</th>
                                                <th>Return Date</th>
                                                <th>Number Of People</th>
                                                <th>Room Number Alloted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="checkoutDetail" name="checkoutDetail">
                                                <td id="checkoutId" name="checkoutId">1</td>
                                                <td id="name" name="name">Sanjay </td>
                                                <td id="contact" name="contact">99999999999</td>
                                                <td id="city" name="city">Jaipur</td>
                                                <td id="coming_date" name="coming_date">26/09/2016</td>
                                                <td id="return_date" name="return_date">27/09/2016</td>
                                                <td id="head_count" name="head_count">10</td>
                                                <td id="room_alloted" name="room_alloted">201</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="Submit"  class="btn btn-success">Checkout Now</button>
                                </form>
                                <a href="Checkout"><button  class="btn btn-warning text-center" style="margin-top:20px;">Search Again</button></a>
                            </div>




                        </div>
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
    </body>

</html>
