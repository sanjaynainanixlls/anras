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

    <title>Floor Plans</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

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

       <?php include_once 'leftSidebar.php';?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard 
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                	<button type="button" class="btn btn-info btn-lg col-lg-4" data-toggle="modal" data-target="#groundFloorModal" style="margin:5px;">Ground Floor</button>
                	<button type="button" class="btn btn-info btn-lg col-lg-4" data-toggle="modal" data-target="#firstFloorModal" style="margin:5px;">First Floor</button>
                	<button type="button" class="btn btn-info btn-lg col-lg-4" data-toggle="modal" data-target="#secondFloorModal" style="margin:5px;">Second Floor</button>
                	<button type="button" class="btn btn-info btn-lg col-lg-4" data-toggle="modal" data-target="#thirdFloorModal" style="margin:5px;">Third Floor</button>
                	<button type="button" class="btn btn-info btn-lg col-lg-4" data-toggle="modal" data-target="#fourthFloorModal" style="margin:5px;">Fourth Floor</button>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<div class="modal fade" id="groundFloorModal" role="dialog" style="padding:0px;padding-left:0px !important;">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title" style="text-align: center">Ground
						Floor Plan</h2>
				</div>
				<div class="modal-body">
					<img class="img-responsive" src="img/ground-floor.png">
				</div>
				<div class="modal-footer" style="text-align: center">
					<button type="button" class="btn btn-lg btn-success"
						data-dismiss="modal" id="closeButton">Close</button>
						<button type="button" id="printButton" class="btn btn-lg btn-success">Print</button>
				</div>
			</div>

		</div>
	</div>
	
	<div class="modal fade" id="firstFloorModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title" style="text-align: center">First
						Floor Plan</h2>
				</div>
				<div class="modal-body">
					<img class="img-responsive" src="img/first-floor.png">
				</div>
				<div class="modal-footer" style="text-align: center">
					<button type="button" class="btn btn-lg btn-success"
						data-dismiss="modal" id="closeButton">Close</button>
						<button type="button" id="printButton" class="btn btn-lg btn-success">Print</button>
				</div>
			</div>

		</div>
	</div>
	
	<div class="modal fade" id="secondFloorModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title" style="text-align: center">Second
						Floor Plan</h2>
				</div>
				<div class="modal-body">
					<img class="img-responsive" src="img/second-floor.png">
				</div>
				<div class="modal-footer" style="text-align: center">
					<button type="button" class="btn btn-lg btn-success"
						data-dismiss="modal" id="closeButton">Close</button>
						<button type="button" id="printButton" class="btn btn-lg btn-success">Print</button>
				</div>
			</div>

		</div>
	</div>
	
	<div class="modal fade" id="thirdFloorModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title" style="text-align: center">Third
						Floor Plan</h2>
				</div>
				<div class="modal-body">
					<img class="img-responsive" src="img/third-floor.png">
				</div>
				<div class="modal-footer" style="text-align: center">
					<button type="button" class="btn btn-lg btn-success"
						data-dismiss="modal" id="closeButton">Close</button>
						<button type="button" id="printButton" class="btn btn-lg btn-success">Print</button>
				</div>
			</div>

		</div>
	</div>
	
	<div class="modal fade" id="fourthFloorModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title" style="text-align: center">Fourth
						Floor Plan</h2>
				</div>
				<div class="modal-body">
					<img class="img-responsive" src="img/fourth-floor.png">
				</div>
				<div class="modal-footer" style="text-align: center">
					<button type="button" class="btn btn-lg btn-success"
						data-dismiss="modal" id="closeButton">Close</button>
						<button type="button" id="printButton" class="btn btn-lg btn-success">Print</button>
				</div>
			</div>

		</div>
	</div>

	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Additional JavaScript -->
	<script src="js/script.js"></script>


</body>

</html>
