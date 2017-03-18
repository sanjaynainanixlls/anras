<?php
if (!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$userDataHandlerObj = new userDataHandler();
$data = $userDataHandlerObj->notCheckedOutData();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Not Checked Out</title>

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
                                Complete Status Of People Not Checked Out
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Complete Status Of People Not Checked Out
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
                                        <?php for ($i = 0; $i < count($data); $i++) { ?>
                                            <tr>
                                                <td><?php echo $data[$i]['id']; ?></td>
                                                <td><?php echo $data[$i]['name']; ?></td>
                                                <td><?php echo $data[$i]['phoneNumber']; ?></td>
                                                <td><?php echo $data[$i]['city']; ?></td>
                                                <td><?php echo $data[$i]['dateOfArrival']; ?></td>
                                                <td><?php echo $data[$i]['dateOfDeparture']; ?></td>
                                                <td><?php echo $data[$i]['numberOfPeople']; ?></td>
                                                <td><?php
                                                    
                                                    if (($data[$i]['roomNumberAllotted'] != '')) {
                                                        echo $data[$i]['roomNumberAllotted'];
                                                    } else if ($_SESSION['role'] == "ADMIN") {
                                                        $html = "<form action='roomAllocation.php' method='post'>";
                                                        $html .='<input type="hidden" name ="userId" value="' . $data[$i]['id'] . '">';
                                                        $html .='<input type="hidden" name="action" value="completeStatus">';
                                                        echo $html . '<button type="submit" class="btn btn-success" id="edit">Edit</button></form>';
                                                    }
                                                    ?>
                                                    </td>
                                                <!--
                                                             <td style="display: none"><input type="hidden" value="<%= user.getId()%>" name="parameter<%= count%>"></td>
                                                -->
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
