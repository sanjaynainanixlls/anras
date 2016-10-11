<?php
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anras/action/completeStatusAction.php';
$userDataHandlerObj = new userDataHandler();
$data = $userDataHandlerObj->getCompleteStatus();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Complete Status</title>

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
                                Complete Status Of People
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Complete Status Of People
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3 text-center" style="padding-bottom: 20px;">
                            <div class="form-group">
                                <input class="form-control" type="text" id="searchById" placeholder="Search by Id" />
                            </div>
                        </div>
                        <div class="col-lg-3 text-center" style="padding-bottom: 20px;">
                            <div class="form-group">
                                <input class="form-control" type="text" id="searchByName" placeholder="Search by Name" />
                            </div>
                        </div>
                        <div class="col-lg-3 text-center" style="padding-bottom: 20px;">
                            <div class="form-group">
                                <input class="form-control" type="text" id="searchByRoom" placeholder="Search by Room Number" />
                            </div>
                        </div>
                        <div class="col-lg-3 text-center" style="padding-bottom: 20px;">
                            <div class="form-group">
                                <input class="form-control" type="text" id="searchByCity" placeholder="Search by City" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="completeStatusTable">
                                    <thead>
                                        <tr id="tableHeads">
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
                                        <?php foreach ($data as $key => $value) { ?>
                                        <tr class="completeStatusTableRow">
                                                <td class="completeStatusTableRowId"><?php echo $value['id']; ?></td>
                                                <td class="completeStatusTableRowName"><?php echo $value['name']; ?></td>
                                                <td class="completeStatusTableRowPhoneNumber"><?php echo $value['phoneNumber']; ?></td>
                                                <td class="completeStatusTableRowCity"><?php echo $value['city']; ?></td>
                                                <td class="completeStatusTableRowComingDate"><?php echo $value['dateOfArrival']; ?></td>
                                                <td class="completeStatusTableRowReturnDate"><?php echo $value['dateOfDeparture']; ?></td>
                                                <td class="completeStatusTableRowNumberOfPeople"><?php echo $value['numberOfPeople']; ?></td>
                                                <td class="completeStatusTableRowRoomAlloted"><?php
                                                    if (($value['roomNumberAllotted'] != '')) {
                                                echo $value['roomNumberAllotted'];
                                                    } else if($_SESSION['role'] == "ADMIN"){
                                                        $html = "<form action='roomAllocation.php' method='post'>";
                                                        $html .='<input type="hidden" name ="userId" value="' . $value['id'] . '">';
                                                        $html .='<input type="hidden" name="action" value="completeStatus">';
                                                        echo $html.'<button type="submit" class="btn btn-success" id="edit">Edit</button></form>';
                                                    }
                                                    ?></td>
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

        <script src="js/completeStatus.js"></script>

    </body>

</html>
