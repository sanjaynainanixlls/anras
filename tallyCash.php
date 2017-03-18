<?php
if (!isset($_SESSION))
    session_start();
include 'includeSession.php';
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tally Cash</title>

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
                                Tally Cash
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-table"></i> Tally Cash
                                </li>
                            </ol>
                        </div>
                    </div>

                    <form method="POST" action="action/action.php" name="tallyCash">
                        <input type="hidden" name="action" value="tallyCash">
                        <input type="hidden" name="role" value="<?php echo(isset($_SESSION['role'])?$_SESSION['role']:'');?>">
                        <input type="hidden" name="userId" value="<?php if (isset($_SESSION['userId'])) echo $_SESSION['userId']; else echo ''; ?>">
                        <?php 
                        $disabled = '' ;
                        $msg = '';
                        if(isset($_SESSION['tallyCash'])){
                            $disabled = 'disabled';
                            $msg =  'Total Cash Remaining Should Be: '.$_SESSION['tallyCash'].' INR'; 
                            //session_unset();
                        } ?>
                        <span <?php echo $disabled; ?>> <?php echo $msg; ?></span>
                        <button type="submit" class="btn btn-success" value="submit">Check</button>
                    </form>
                    <p>Please press check to see the latest balance.</p>
                            
                </div>
            </div>
        </div>
    </body>

</html>
