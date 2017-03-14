<?php
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';

include dirname(dirname(__FILE__)) . '/anras/config/config.php';
$postParams = Functions::getPostParams();
if ($postParams['action'] == 'returnInventory') {
    $id = $postParams['userId'];
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getInventoryDetailsById($id);
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

        <title>Inventory Details</title>

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
                                Inventory Details
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Inventory Details
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                <?php if(isset($data['id'])){?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <form method="POST" action="action/action.php" name="returnInventory">
                                    <input type="hidden" name="action" value="returnInventory">
                                    <input type="hidden" name="returnAmount" value="<?php if(isset($data['totalAmount'])) echo $data['totalAmount']; else echo ''; ?>">
                                    <input type="hidden" name="userId" value="<?php if(isset($data['guestUserId']))  echo $data['guestUserId'];?>">
                                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Mattress</th>
                                        <th>Pillows</th>
                                        <th>Bedsheets</th>
                                        <th>Blankets</th>
                                        <th>Locks</th>
                                        <th>Submit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="number"id="mattress" class="form-control" name="mattress" disabled value="<?php if(isset($result[0]['mattress'])) echo $result[0]['mattress']; else echo ''; ?>">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="pillow" class="form-control" name="pillow" disabled value="<?php if(isset($result[0]['pillow'])) echo $result[0]['pillow']; else echo ''; ?>">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="bedsheet" class="form-control" name="bedsheet" disabled value="<?php if(isset($result[0]['bedsheet'])) echo $result[0]['bedsheet']; else echo ''; ?>">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="blanket" class="form-control" name="blanket" disabled value="<?php if(isset($result[0]['quilt'])) echo $result[0]['quilt']; else echo ''; ?>">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="lock" class="form-control" name="lock" disabled value="<?php if(isset($result[0]['lockNkey'])) echo $result[0]['lockNkey']; else echo ''; ?>">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="dasCards" class="form-control" name="dasCards" disabled value="<?php if(isset($result[0]['dasCards'])) echo $result[0]['dasCards']; else echo ''; ?>">
                                            </div>

                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="submit" id="releaseNow" name="releaseNow" class="form-control btn btn-primary">
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
                    <div class="alert alert-error fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>No Inventory Alloted !!!</strong>
                        </div>
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
