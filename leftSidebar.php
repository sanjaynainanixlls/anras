<?php
if (!isset($_SESSION)) {
    session_start();
}

    //include 'includeSession.php';
?>
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
        <a class="navbar-brand" href="">S.S.D.N.</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="logout.php">
                Logout
            </a>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN') { ?>
                <li class="active">
                    <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="roomAllocation.php"><i class="fa fa-fw fa-plus"></i> Allot A New Room</a>
                </li>
                <li>
                    <a href="checkout.php"><i class="fa fa-fw fa-minus"></i> Checkout A Room</a>
                </li>
                <li>
                    <a href="inventoryById.php"><i class="fa fa-fw fa-plus"></i>Allot Inventory</a>
                </li>
                <li>
                    <a href="returnInventoryById.php"><i class="fa fa-fw fa-minus"></i>Inventory Return</a>
                </li>
                <li>
                    <a href="print.php"><i class="fa fa-fw fa-print"></i>Print Reciept</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-pencil"></i> Edit Information</a>
                </li>
                <li>
                    <a href="completeStatus.php"><i class="fa fa-fw fa-list"></i> Complete Status</a>
                </li>
                <li>
                    <a href="roomStatus.php"><i class="fa fa-fw fa-th-list"></i> Room Status</a>
                </li>
                <li>
                    <a href="floorPlans.php"><i class="fa fa-fw fa-map-marker"></i> Floor Plans</a>
                </li>
                <li>
                    <a href="todaysCheckouts.php"><i class="fa fa-fw fa-calendar"></i> Today's Checkouts</a>
                </li>
                <li>
                    <a href="allCheckouts.php"><i class="fa fa-fw fa-calendar"></i> All Checkouts</a>
                </li>
                <li>
                    <a href="notCheckedOut.php"><i class="fa fa-fw fa-calendar"></i> Not Checked Out</a>
                </li>
                <li>
                    <a href="addUser.php"><i class="fa fa-fw fa-user"></i> Add New User</a>
                </li>
                <li>
                    <a href="tallyCash.php"><i class="fa fa-fw fa-list"></i>Tally Cash</a>
                </li>
                <?php
            } else if (isset($_SESSION['role']) && $_SESSION['role'] == 'RECEPTION') {
                ?>
                <li>
                    <a href="dataEntry.php"><i class="fa fa-fw fa-plus"></i> Allot A New Room</a>
                </li>
                <li>
                    <a href="checkout.php"><i class="fa fa-fw fa-minus"></i> Checkout A Room</a>
                </li>
                <li>
                    <a href="inventoryById.php"><i class="fa fa-fw fa-plus"></i>Allot Inventory</a>
                </li>
                <li>
                    <a href="returnInventoryById.php"><i class="fa fa-fw fa-minus"></i>Inventory Return</a>
                </li>
                <li>
                    <a href="print.php"><i class="fa fa-fw fa-print"></i>Print Reciept</a>
                </li>
                <li>
                    <a href="completeStatus.php"><i class="fa fa-fw fa-list"></i> Complete Status</a>
                </li>
                <li>
                    <a href="roomStatus.php"><i class="fa fa-fw fa-th-list"></i> Room Status</a>
                </li>
                <li>
                    <a href="tallyCash.php"><i class="fa fa-fw fa-list"></i>Tally Cash</a>
                </li>
            <?php } else if (isset($_SESSION['role']) && $_SESSION['role'] == 'INVENTORY') { ?>
                <li>
                    <a href="inventoryById.php"><i class="fa fa-fw fa-plus"></i>Allot Inventory</a>
                </li>
                <li>
                    <a href="returnInventoryById.php"><i class="fa fa-fw fa-minus"></i>Inventory Return</a>
                </li>
                <li>
                    <a href="completeStatus.php"><i class="fa fa-fw fa-list"></i> Complete Status</a>
                </li>
                <li>
                    <a href="tallyCash.php"><i class="fa fa-fw fa-list"></i>Tally Cash</a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>