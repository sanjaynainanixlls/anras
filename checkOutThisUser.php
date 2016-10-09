<?php

if(!isset($_SESSION))
    session_start();
    include 'includeSession.php';

include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$postParams = Functions::getPostParams();
if ($postParams['action'] == 'checkout') {
    $id = $postParams['checkoutId'];
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getCompleteStatusById($id);
}

isset($result[0]) ? $data = $result[0] : '';

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
                                <form method="Post" action="action/action.php" id="formId">
                                    <input type="hidden" name="action" value="checkOutUser">
                                    <input type="hidden" name="userId" value="<?php if(isset($data['id']))  echo $data['id'];else echo '';?>">
                                    <input type="hidden" name="roomNumberAllotted" value="<?php if(isset($data['roomNumberAllotted']))  echo $data['roomNumberAllotted'];else echo '';?>">
                                    <input type="hidden" name="numberOfPeople" value="<?php if(isset($data['numberOfPeople']))  echo $data['numberOfPeople'];else echo '';?>">
                                    <input type="hidden" name="city" value="<?php if(isset($data['city']))  echo $data['city'];else echo '';?>">
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
                                                <th>Amount Paid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="checkoutDetail" name="checkoutDetail">
                                                <td id="checkoutId" name="checkoutId"><?php if(isset($data['id']))  echo $data['id'];else echo '';?></td>
                                                <td id="name" name="name"><?php if(isset($data['name']))echo $data['name'];else echo '';?> </td>
                                                <td id="contact" name="contact"><?php if(isset($data['phoneNumber']))echo $data['phoneNumber'];else echo '';?></td>
                                                <td id="city" name="city"><?php if(isset($data['city']))echo $data['city'];else echo '';?></td>
                                                <td id="coming_date" name="coming_date"><?php if(isset($data['dateOfArrival']))echo $data['dateOfArrival'];else echo '';?></td>
                                                <td id="return_date" name="return_date"><?php if(isset($data['dateOfDeparture']))echo $data['dateOfDeparture'];else echo '';?></td>
                                                <td id="head_count" name="head_count"><?php if(isset($data['numberOfPeople']))echo $data['numberOfPeople'];else echo '';?></td>
                                                <td id="room_alloted" name="room_alloted"><?php if(isset($data['roomNumberAllotted']))echo $data['roomNumberAllotted'];else echo '';?></td>
                                                <td id="amountPaid" name="amountPaid"><?php if(isset($data['amountPaid']))echo $data['amountPaid'];else echo '';?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="Submit"  class="btn btn-success">Checkout Now</button>
                                </form>
                                <a href="checkout.php"><button  class="btn btn-warning text-center" style="margin-top:20px;">Search Again</button></a>
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
