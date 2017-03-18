<?php
if(!isset($_SESSION))
    session_start();
    include 'includeSession.php';

include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$postParams = Functions::getPostParams();
if ($postParams['action'] == 'allotInventory') {
    $id = $postParams['userId'];
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getCompleteStatusById($id);
    $disabled = '';
}

if(isset($result[0])){
    $isInventoryAlloted = $userDataHandlerObj->checkIfInventoryAlloted($id);
    if(!isset($isInventoryAlloted[0])){
        isset($result[0]) ? $data = $result[0] : '';
    }
}


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
                                Allot Inventory
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Allot Inventory
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                <?php if(isset($data['id'])){?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <form method="" action="" id="formId">
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
                                                <td id="checkoutId" name="checkoutId"><?php if(isset($data['id']))  echo $data['id'];else echo '';?></td>
                                                <td id="name" name="name"><?php if(isset($data['name']))echo $data['name'];else echo '';?> </td>
                                                <td id="contact" name="contact"><?php if(isset($data['phoneNumber']))echo $data['phoneNumber'];else echo '';?></td>
                                                <td id="city" name="city"><?php if(isset($data['city']))echo $data['city'];else echo '';?></td>
                                                <td id="coming_date" name="coming_date"><?php if(isset($data['dateOfArrival']))echo $data['dateOfArrival'];else echo '';?></td>
                                                <td id="return_date" name="return_date"><?php if(isset($data['dateOfDeparture']))echo $data['dateOfDeparture'];else echo '';?></td>
                                                <td id="head_count" name="head_count"><?php if(isset($data['numberOfPeople']))echo $data['numberOfPeople'];else echo '';?></td>
                                                <td id="room_alloted" name="room_alloted"><?php if(isset($data['roomNumberAllotted']))echo $data['roomNumberAllotted'];else echo '';?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                                <form method="POST" action="action/action.php" name="allotInventory">
                                    <input type="hidden" name="action" value="allotInventory">
                                    <input type="hidden" name="createdBy" value="<?php if(isset($_SESSION['userId'])) echo $_SESSION['userId']; else echo ''; ?>">
                                    <input type="hidden" name="userId" value="<?php if(isset($data['id']))  echo $data['id'];?>">
                                    <input type="hidden" id="totalAmount" name="totalAmount" value="">
                                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mattress</th>
                                        <th>Pillows</th>
                                        <th>Bedsheets</th>
                                        <th>Blankets</th>
                                        <th>Locks</th>
                                        <th>Das Cards</th>
                                        <th>Submit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="mattress" class="form-control" name="mattress" required="required" placeholder="mattress">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="pillow" class="form-control" name="pillow" required="required" placeholder="pillows">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="bedsheet" class="form-control" name="bedsheet" required="required" placeholder="bedsheets">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="blanket" class="form-control" name="blanket" required="required" placeholder="blankets">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="lock" class="form-control" name="lock" required="required" placeholder="lock">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="dasCards" class="form-control" name="dasCards" required="required" placeholder="das cards">
                                            </div>

                                        </td>
                                        <td>
                                            <?php if(!isset($data['id'])){
                                                $disabled = 'disabled';
                                            }?>
                                            <div class="form-group">
                                                <input type="submit" <?php echo $disabled; ?> id="allotNow" name="allotNow" class="form-control btn btn-primary">
                                            </div>

                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                <?php } else{ ?>
                        <?php if($isInventoryAlloted==true){?>
                            
                        <div class="alert alert-error fade-in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Inventory has been already allotted to this user.</strong>
                        </div>
                        <?php } else{ ?>
                        <div class="alert alert-error fade-in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>No Record Found !!!</strong>
                        </div>
                        <?php }?>
                <?php }?>
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
        <script src="js/allotInventory.js"></script>
    </body>

</html>
