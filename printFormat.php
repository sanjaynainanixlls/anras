<?php
if(!isset($_SESSION))
    session_start();
    include 'includeSession.php';

include dirname(dirname(__FILE__)) . '/anandniwas.com/config/config.php';
$postParams = Functions::getPostParams();

    if(isset($_SESSION['printId'])){
        $id = $_SESSION['printId'];
    }
    else if($postParams['action'] == 'printDetails'){
        $id = $postParams['printThisUser'];
    }
     
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getCompleteStatusById($id);
    $resultInventory = $userDataHandlerObj->getinventoryDetailsById($id);


isset($result[0]) ? $data = $result[0] : '';
isset($resultInventory[0]) ? $InventoryData = $resultInventory[0] : '';
unset($_SESSION['printId']);

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Print Details</title>

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
                                Print Details 
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Print Details
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->
                    <?php if(isset($data['id']) && $data['isCheckout']==0){?>
                    <div class="row text-center"><button id="check"  class="btn btn-success" style="margin-bottom:10px">Print</button></div>
                    <div class="row" id="printTable">
<!--                        <form method="Post" action="printThisUsersDetails.php" target="_blank" id="formId">-->
                        <input type="hidden" name="id" value="<?php if(isset($data['id']))  echo $data['id'];else echo '';?>">
                        <input type="hidden" name="name" value="<?php if(isset($data['name']))  echo $data['name'];else echo '';?>">
                        <input type="hidden" name="city" value="<?php if(isset($data['city']))  echo $data['city'];else echo '';?>">
                        <input type="hidden" name="phoneNumber" value="<?php if(isset($data['phoneNumber']))  echo $data['phoneNumber'];else echo '';?>">
                        <input type="hidden" name="numberOfPeople" value="<?php if(isset($data['numberOfPeople']))  echo $data['numberOfPeople'];else echo '';?>">
                        <input type="hidden" name="dateOfArrival" value="<?php if(isset($data['dateOfArrival']))  echo $data['dateOfArrival'];else echo '';?>">
                        <input type="hidden" name="dateOfDeparture" value="<?php if(isset($data['dateOfDeparture']))  echo $data['dateOfDeparture'];else echo '';?>">
                        <input type="hidden" name="roomNumberAllotted" value="<?php if(isset($data['roomNumberAllotted']))  echo $data['roomNumberAllotted'];else echo '';?>">
                            
                        <input type="hidden" name="mattress" value="<?php if(isset($resultInventory[0]['mattress'])) echo $resultInventory[0]['mattress']; else echo '0'; ?>">
                        <input type="hidden" name="bedsheet" value="<?php if(isset($resultInventory[0]['bedsheet'])) echo $resultInventory[0]['bedsheet']; else echo '0'; ?>">
                        <input type="hidden" name="pillow" value="<?php if(isset($resultInventory[0]['pillow'])) echo $resultInventory[0]['pillow']; else echo '0'; ?>">
                        <input type="hidden" name="quilt" value="<?php if(isset($resultInventory[0]['quilt'])) echo $resultInventory[0]['quilt']; else echo '0'; ?>">
                        <input type="hidden" name="lockNkey" value="<?php if(isset($resultInventory[0]['lockNkey'])) echo $resultInventory[0]['lockNkey']; else echo '0'; ?>">
                        <input type="hidden" name="dasCards" value="<?php if(isset($resultInventory[0]['dasCards'])) echo $resultInventory[0]['dasCards']; else echo '0'; ?>">
                        <input type="hidden" id="hiddenTotalItemCount" name="totalItemCount" value="">
                        <input type="hidden" id="hiddenTotalAmount" name="totalAmount" value="">
                            
                        <table class="table table-bordered" style="margin-bottom:0px;width:100%; border:1px solid black;border-collapse:collapse;text-align:center">
                            <tr class="text-center"><td style="text-align:center;border:1px solid black;padding:3px" colspan="5">S.S.D.N.</td><td style="text-align:center;border:1px solid black;padding:3px;vertical-align:middle;font-size:36px" rowspan="3">ID<br><?php if(isset($data['id']))  echo $data['id'];else echo '';?></td></tr>
                            <tr class="text-center"><td style="text-align:center;border:1px solid black;padding:3px" colspan="5">Anand Niwas, Shri Anandpur</td></tr>
                            <tr class="text-center"><td style="text-align:center;border:1px solid black;padding:3px" colspan="5">Room Allotment Reciept</td></tr>
                            <tr>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px">Name </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px"><?php if(isset($data['name']))  echo $data['name'];else echo '';?></td>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px">City </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px"><?php if(isset($data['city']))  echo $data['city'];else echo '';?></td>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px">Mobile Number </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px"><?php if(isset($data['phoneNumber']))  echo $data['phoneNumber'];else echo '';?></td>
                            </tr>
                            <tr>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px">No. of People </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px"><?php if(isset($data['numberOfPeople']))  echo $data['numberOfPeople'];else echo '';?></td>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px">Arrival Date </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px">
                                <?php if(isset($data['dateOfArrival'])) {
                                    $date = new DateTime($data['dateOfArrival']); 
                                    echo $date->format('d-m-Y');
                                } else {
                                    echo '';
                                }?></td>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px">Return Date </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px">
                                <?php if(isset($data['dateOfDeparture'])) {
                                    $date = new DateTime($data['dateOfDeparture']); 
                                    echo $date->format('d-m-Y');
                                } else {
                                    echo '';
                                }?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px" >Room Number </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px" id="roomNumberCell"><?php if(isset($data['roomNumberAllotted']))  echo $data['roomNumberAllotted'];else echo '';?></td>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px" >Floor </td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px" id="floorCell"></td>
                                <td class="text-right" style="text-align:right;border:1px solid black;padding:3px">Bed Store Number</td>
                                <td class="text-left" style="text-align:left;border:1px solid black;padding:3px" id="bedStoreNumber"></td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px">S. No.</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2">Item</td>
                                <td style="text-align:center;border:1px solid black;padding:3px">Quantity</td>
                                <td style="text-align:center;border:1px solid black;padding:3px">Price</td>
                                <td style="text-align:center;border:1px solid black;padding:3px">Amount</td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px">1</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2">Mattress</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="matressCount"><?php if(isset($resultInventory[0]['mattress'])) echo $resultInventory[0]['mattress']; else echo '0'; ?></td>
                                <td style="text-align:center;border:1px solid black;padding:3px">100</td>
                                <td style="text-align:center;border:1px solid black;padding:3px"><?php if(isset($resultInventory[0]['mattress'])) echo $resultInventory[0]['mattress']*100; else echo '0'; ?></td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px">2</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2">Bedsheet</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="bedsheetCount"><?php if(isset($resultInventory[0]['bedsheet'])) echo $resultInventory[0]['bedsheet']; else echo '0'; ?></td>
                                <td style="text-align:center;border:1px solid black;padding:3px">100</td>
                                <td style="text-align:center;border:1px solid black;padding:3px"><?php if(isset($resultInventory[0]['bedsheet'])) echo $resultInventory[0]['bedsheet']*100; else echo '0'; ?></td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px">3</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2">Pillow</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="pillowCount"><?php if(isset($resultInventory[0]['pillow'])) echo $resultInventory[0]['pillow']; else echo '0'; ?></td>
                                <td style="text-align:center;border:1px solid black;padding:3px">50</td>
                                <td style="text-align:center;border:1px solid black;padding:3px"><?php if(isset($resultInventory[0]['pillow'])) echo $resultInventory[0]['pillow']*50; else echo '0'; ?></td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px">4</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2">Blanket</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="quiltCount"><?php if(isset($resultInventory[0]['quilt'])) echo $resultInventory[0]['quilt']; else echo '0'; ?></td>
                                <td style="text-align:center;border:1px solid black;padding:3px">100</td>
                                <td style="text-align:center;border:1px solid black;padding:3px"><?php if(isset($resultInventory[0]['quilt'])) echo $resultInventory[0]['quilt']*100; else echo '0'; ?></td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px">5</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2">Keys</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="lockNKeyCount"><?php if(isset($resultInventory[0]['lockNkey'])) echo $resultInventory[0]['lockNkey']; else echo '0'; ?></td>
                                <td style="text-align:center;border:1px solid black;padding:3px">100</td>
                                <td style="text-align:center;border:1px solid black;padding:3px"><?php if(isset($resultInventory[0]['lockNkey'])) echo $resultInventory[0]['lockNkey']*100; else echo '0'; ?></td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px">6</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2">Resident Cards</td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="dasCardsCount"><?php if(isset($resultInventory[0]['dasCards'])) echo $resultInventory[0]['dasCards']; else echo '0'; ?></td>
                                <td style="text-align:center;border:1px solid black;padding:3px">50</td>
                                <td style="text-align:center;border:1px solid black;padding:3px"><?php if(isset($resultInventory[0]['dasCards'])) echo $resultInventory[0]['dasCards']*50; else echo '0'; ?></td>
                            </tr>
                            <tr class="text-center">
                                <td style="text-align:center;border:1px solid black;padding:3px"></td>
                                <td style="text-align:center;border:1px solid black;padding:3px" colspan="2"><strong>Total Refundable Amount</strong></td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="totalItems"></td>
                                <td style="text-align:center;border:1px solid black;padding:3px" ></td>
                                <td style="text-align:center;border:1px solid black;padding:3px" id="totalAmount"></td>
                            </tr>
                        </table>
                        <table class="table" style="width:100%;margin-bottom:0px">
                            <tr>
                                <td style="vertical-align:bottom;text-align:center;border:1px solid black; height:100px;padding:3px">Cash Recieved By</td>
                                <td style="vertical-align:bottom;text-align:center;border:1px solid black; height:100px;padding:3px">Goods Given By</td>
                                <td style="vertical-align:bottom;text-align:center;border:1px solid black; height:100px;padding:3px">Goods Recieved By</td>
                                <td style="vertical-align:bottom;text-align:center;border:1px solid black; height:100px;padding:3px">Cancelled By</td>
                            </tr>
                        </table>
                            
<!--                        </form>-->
                    </div>
                    <div class="row text-center"><button id="check"  class="btn btn-success">Print</button></div>
                    <!-- /.row -->
                    <?php } 
                    else if($data['isCheckout']==1)
                        { ?>
                        <div class="alert alert-error fade-in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>This user has already checked out.</strong>
                        </div>
                <?php }
                    else { ?>
                        <div class="alert alert-error fade-in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>No Record Found !!!</strong>
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
        <script src="js/allotInventory.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>
