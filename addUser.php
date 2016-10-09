<?php
if(!isset($_SESSION))
    session_start();
    include 'includeSession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Room Allocation</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">
    <?php include_once 'leftSidebar.php';?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add User
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> Add User
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') {?>
                        <div class="alert alert-error fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Error !</strong> <?php echo $_SESSION['message']; ?>
                        </div>
                    <?php } unset($_SESSION['message']);  ?>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">

                        <form role="form" action="action/action.php" method="post">
                            <input type="hidden" name="action" value='addNewUser'>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" class="form-control" name="name" required="required">
                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" id="username" class="form-control" name="username" required="required">
                            </div>

<!--                            <div class="form-group">
                                <label>City</label>
                                <input type="text" id="city" class="form-control" name="city" required="required">
                            </div>-->
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" class="form-control" name="password" required="required">
                            </div>
                            
                            <div class="form-group">
                            	<label>Select Role</label>
                            	<select class="form-control" id="role" name="role">
                            		<option value="RECEPTION">Data Entry</option>
                            		<option value="INVENTORY">Inventory-Allotment</option>
                            	</select>
                            </div>
                            
							
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>

                        </form>

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
	<script src="js/addUser.js"></script>
	<script src="js/roomStatus.js"></script>

</body>

</html>
