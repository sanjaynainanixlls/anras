<?php
if (!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$userDataHandlerObj = new userDataHandler();
$data = $userDataHandlerObj->todayCheckOutData();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Today's Checkouts</title>

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
                                Today's Checkouts
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Complete Status Of People
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <form action="action/action.php" method="post">
                        <input type="hidden" name="action" value="checkoutUsers">
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="table-responsive">

                                    <table class="table table-bordered table-hover" id="completeStatusTable">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
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
                                        <!--<%List completeStatus =  (List) request.getAttribute("completeStatus");
                                        int[] idArray = new int[completeStatus.size()];
                                        int count=0;
                                        %>
                                            <%  for (Iterator iterator = 
                                                        completeStatus.iterator(); iterator.hasNext();){
                     User user = (User) iterator.next(); 
                     idArray[count]=user.getId();
                     count++;
                     %>-->
                                            <?php for($i=0;$i<count($data);$i++){?>
                                            <tr>
                                                <td><input type="checkbox" name="idCheckboxes[]" value="<?php echo $data[$i]['id']?>" checked="checked"></td>
                                                <td><?php echo $data[$i]['id'];?><input type="hidden" name="id[]" value="<?php echo $data[$i]['id']; ?>"></td>
                                                <td><?php echo $data[$i]['name'];?></td>
                                                <td><?php echo $data[$i]['phoneNumber'];?></td>
                                                <td><?php echo $data[$i]['city'];?><input type="hidden" name="city[]" value="<?php echo $data[$i]['city']; ?>"></td>
                                                <td><?php echo $data[$i]['dateOfArrival'];?></td>
                                                <td><?php echo $data[$i]['dateOfDeparture'];?></td>
                                                <td><?php echo $data[$i]['numberOfPeople'];?><input type="hidden" name="numberOfPeople[]" value="<?php echo $data[$i]['numberOfPeople']; ?>"></td>
                                                <td><?php echo $data[$i]['roomNumberAllotted'];?><input type="hidden" name="roomNumberAllotted[]" value="<?php echo $data[$i]['roomNumberAllotted']; ?>"></td>
                                                <!--
                                                             <td style="display: none"><input type="hidden" value="<%= user.getId()%>" name="parameter<%= count%>"></td>
                                                -->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <input type="submit" class="btn btn-lg btn-danger" value="Checkout Selected">
                            </div>
                        </div>
                    </form>
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
