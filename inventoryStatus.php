<?php
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/anandniwas.com/action/completeStatusAction.php';
$userDataHandlerObj = new userDataHandler();
$data = $userDataHandlerObj->getCompleteInventoryAlotted();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="refresh" content="60">
        <title>Inventory Status</title>

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
                                Inventory Status
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Inventory Status
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">

                        <div class="col-lg-6 col-lg-offset-3 text-center" style="padding-bottom: 20px;">
                            <div class="form-group">
                                <input class="form-control" type="text" id="searchById" placeholder="Search by Id" />
                            </div>
                        </div>
<!--                        <div class="col-lg-3 text-center" style="padding-bottom: 20px;">
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
-->
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Mattress Count</th>
                                        <th class="text-center">Pillows Count</th>
                                        <th class="text-center">Bedsheets Count</th>
                                        <th class="text-center">Blankets Count</th>
                                        <th class="text-center">Key Count</th>
                                        <th class="text-center">Das Cards Count</th>
                                        <th class="text-center">CASH</th>
                                    </tr>
                                    <tr class="text-center">
                                        <td id="totalMattressGiven"></td>
                                        <td id="totalPillowsGiven"></td>
                                        <td id="totalBedsheetsGiven"></td>
                                        <td id="totalQuiltsGiven"></td>
                                        <td id="totalKeysGiven"></td>
                                        <td id="totalDasCardsGiven"></td>
                                        <td id="totalAmountGiven"></td>
                                    </tr>
                                </thead>
                                </table>
                                    
                                <table class="table table-bordered table-hover" id="completeStatusTable">
                                    <thead>
                                        <tr id="tableHeads" class="text-center">
                                            <th class="text-center">GUEST ID</th>
                                            <th class="text-center">MATTRESS</th>
                                            <th class="text-center">PILLOW</th>
                                            <th class="text-center">BEDSHEET</th>
                                            <th class="text-center">QUILTS</th>
                                            <th class="text-center">KEYS</th>
                                            <th class="text-center">DAS CARDS</th>
                                            <th class="text-center">TOTAL AMOUNT</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)){?>
                                        <?php foreach ($data as $key => $value) { ?>
                                        <tr class="inventoryStatusTableRow text-center">
                                                <td class="inventoryStatusTableRowGuestId"><strong><?php echo $value['guestUserId']; ?></strong></td>
                                                <td class="inventoryStatusTableRowMattress"><?php echo $value['mattress']; ?></td>
                                                <td class="inventoryStatusTableRowPillow"><?php echo $value['pillow']; ?></td>
                                                <td class="inventoryStatusTableRowBedsheet"><?php echo $value['bedsheet']; ?></td>
                                                <td class="inventoryStatusTableRowQuilt"><?php echo $value['quilt']; ?></td>
                                                <td class="inventoryStatusTableRowKey"><?php echo $value['lockNkey']; ?></td>
                                                <td class="inventoryStatusTableRowDasCards"><?php echo $value['dasCards']; ?></td>
                                                <td class="inventoryStatusTableRowTotalAmount"><?php
                                                   echo (($value['mattress']*100)+($value['pillow']*50)+($value['bedsheet']*100)+($value['quilt']*100)+($value['lockNkey']*100)+($value['dasCards']*50))
                                                    ?></td>
                                        </tr>
                                        <?php } }?>
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
        <script src="js/inventoryStatus.js"></script>
<!--        <script src="js/completeStatus.js"></script>-->

    </body>

</html>
