<%@page import="com.model.Rooms"%>
<%@page import="java.util.Iterator"%>
<%@page import="java.util.List"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Information</title>

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

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.jsp">S.S.D.N.</a>
            </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.jsp"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="Register"><i class="fa fa-fw fa-plus"></i> Allot A New Room</a>
                    </li>
                    <li>
                        <a href="Checkout"><i class="fa fa-fw fa-minus"></i> Checkout A Room</a>
                    </li>
                    <li>
                        <a href="EditInformation"><i class="fa fa-fw fa-pencil"></i> Edit Information</a>
                    </li>
                    <li>
                        <a href="CompleteStatus"><i class="fa fa-fw fa-list"></i> Complete Status</a>
                    </li>
                    <li>
                         <a href="RoomStatus"><i class="fa fa-fw fa-th-list"></i> Room Status</a>
                    </li>
                    <li>
                         <a href="floorPlans.html"><i class="fa fa-fw fa-map-marker"></i> Floor Plans</a>
                    </li>
                    <li>
                         <a href="TodaysCheckouts"><i class="fa fa-fw fa-calendar"></i> Today's Checkouts</a>
                    </li>
                    <li>
                         <a href="AllCheckouts"><i class="fa fa-fw fa-calendar"></i> All Checkouts</a>
                    </li>
                    <li>
                         <a href="NotCheckedOut"><i class="fa fa-fw fa-calendar"></i> Not Checked Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Information
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Edit Information
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form role="form" action="EditInformation" method="post">

                            <div class="form-group col-lg-4 col-lg-offset-4">
                                <label>Please Enter the ID</label>
                                <input id="checkoutIDInput" type="number"  class="form-control" name="editId" required="required" style="margin-bottom:20px">
                            
                            <button id="checkoutSubmit" type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            </div>

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

</body>

</html>
