<?php 
include("header.php");
include("config.php");

$sql = "SELECT * from trending";
$result = $conn->query($sql);

?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
               
                <!-- /# row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              
                                <div class="table-responsive m-t-8">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Coin</th>
                                                <th>Rank</th>                                            
                                                <th>Positions Moved</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['symbol'];?></td>
                                            <td><?php echo $row['cmc_rank'];?></td>
                                            <td><?php echo $row['positions_moved'];?></td>

                                            </tr>
                                            <?php
                                          }
                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <!-- End Container fluid  -->
            <?php include("footer.php");
?>     
