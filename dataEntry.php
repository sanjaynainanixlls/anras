<?php
session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$postParams = Functions::getPostParams();
$userDataHandlerObj = new userDataHandler();
$roomData = $userDataHandlerObj->allRoomStatus();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!--Bootstrap DatePicker-->
        <link href="css/bootstrap-datepicker3.css" rel="stylesheet">
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
                                Register
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-edit"></i> Register
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
                    <?php } unset($_SESSION['message']); ?>
                    <div class="row">
                        <div class="col-lg-6">

                            <form role="form" action="action/action.php" method="post">
                                <input type="hidden" name="action" value='registerUser'>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="name" class="form-control" name="name" required="required" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" id="city" class="form-control" name="city" required="required" placeholder="City">
                                </div>

                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="tel" id="phoneNumber" class="form-control" name="phoneNumber" required="required" placeholder="Mobile" minlength="10" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <label>Total Number of Bhagats</label>
                                    <input id="headCount" type="number" class="form-control" name="numberOfPeople" required="required" placeholder="Head Count">
                                </div>

                                <div class="form-group">
                                    <label>Date of Arrival</label>
                                    <input id="comingDate" type="date" class="form-control" name="comingDate" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Date of Return</label>
                                    <input type="date" id="returnDate" class="form-control" name="returnDate" required="required">

                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>

                            </form>

                        </div>

                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table id="roomStatusTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">Room Number</th>
                                            <th style="width: 100px;">Capacity</th>
                                            <th style="width: 100px;">Number Of People Staying</th>
                                            <th>Cities</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php for ($i = 0; $i < count($roomData); $i++) { ?>
                                            <tr class="roomStatusTableRow">
                                                <td class="roomNumberClass"><strong><?php echo $roomData[$i]['roomNumber']; ?></strong></td>
                                                <td class="roomCapacityClass"><strong><?php echo $roomData[$i]['capacity']; ?></strong></td>
                                                <td class="numberOfPeopleStayingClass"><strong><?php echo $roomData[$i]['occupied']; ?></strong></td>
                                                <td class="cities"><strong><?php echo $roomData[$i]['city']; ?></strong></td>
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

        <!-- Additional JavaScript -->
        <script src="js/script.js"></script>
        <script src='js/registerUser.js'></script>
        <script src="js/roomStatus.js"></script>

    </body>

</html>
