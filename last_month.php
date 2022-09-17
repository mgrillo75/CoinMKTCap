<?php include("header.php");
include("config.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from listed_in_month order by date_added desc";
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
                                                <th style="display:none;">Id</th>
                                                <th>Name</th>
                                                <th>Symbol</th>
                                                <th>Date Listed
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                        while($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                            <td  style="display:none;"><?php echo $row['id'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['symbol'];?></td>
                                            <td><?php echo $row['date_added'];?></td>
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