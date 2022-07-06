<?php
    include "header.php"
?>
<div id="wrapper">
    <?php include "sidebar.php"?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php
                include "topbar.php"
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="d-sm-flex col-12 align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Reports</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Service Name</th>
                                        <th>Consultant Name</th>
                                        <th>Service Price</th>
                                        <th>Request</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $con  = mysqli_connect('localhost','root','','demo');
                                        $qry = mysqli_query($con,"SELECT services.price,services.name,services.id,client_requests.description,client_requests.service_id FROM client_requests INNER JOIN services ON client_requests.service_id = services.id AND client_id='".$_SESSION['id']."'");
                                        while($row=mysqli_fetch_array($qry))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo  $row['id']?></td>
                                                <td><?php echo  $row['name']?></td>
                                                <td><?php echo  $row['id']?></td>
                                                <td><?php echo  $row['description']?></td>
                                                <td></td>
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
    </div>
</div>
<?php
    include "footer.php"
?>
