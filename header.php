<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>CoinMarketCap Dashboard</title>
    <!-- Custom CSS -->
    
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="header-fix fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
    
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebar-menu">
                       
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.php">Trending Up </a></li>
                                <li><a href="down_trend.php">Trending Down </a></li>
                                <li><a href="last_week.php">Listed in last 1 Week</a></li>
                                <li><a href="last_month.php">Listed in last 1 Month</a></li>
                                <li><a href="last_2months.php">Listed in last 2 Months</a></li>
                                <li><a href="last_6months.php">Listed in last 6 Months</a></li>
                                <li><a href="all.php">All Coins </a></li>
                                <li><a href="api.php">Refresh Data </a></li>


                            </ul>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->