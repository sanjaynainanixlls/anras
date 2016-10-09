<?php
if (!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$userDataHandlerObj = new userDataHandler();
$data = $userDataHandlerObj->allRoomStatus();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Room Status</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

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
                                Complete Status Of Rooms
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Complete Status Of Rooms
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-lg-6 text-center" style="padding-bottom: 20px;">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="searchByRoom" placeholder="Search by Room Number" />
                                </div>
                            </div>
                            <div class="col-lg-6 text-center" style="padding-bottom: 20px;">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="searchByCity" placeholder="Search by City" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div style="padding:10px;">
                                <button class="btn btn-lg btn-info">Total Rooms: <span id="totalRooms"></span></button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="padding:10px;">
                                <button class="btn btn-lg btn-info">Total Capacity: <span id="totalCapacity"></span></button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="padding:10px;">
                                <button class="btn btn-lg btn-info">Total Occupancy: <span id="totalOccupancy"></span></button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="roomStatusTable">
                                    <thead>
                                        <tr>
                                            <th>Room Number</th>
                                            <th>Capacity</th>
                                            <th>Number Of People Staying</th>
                                            <th>Cities</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($data); $i++) { ?>
                                            <tr class="roomStatusTableRow">
                                                <td class="roomNumberClass"><strong><?php echo $data[$i]['roomNumber']; ?></strong></td>
                                                <td class="roomCapacityClass"><strong><?php echo $data[$i]['capacity']; ?></strong></td>
                                                <td class="numberOfPeopleStayingClass"><strong><?php echo $data[$i]['occupied']; ?></strong></td>
                                                <td class="cities"><strong><?php echo $data[$i]['city']; ?></strong></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

        <script src="js/roomStatus.js"></script>

    </body>

</html>
