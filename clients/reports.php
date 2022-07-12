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
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $con  = mysqli_connect('localhost','root','','demo');
                                        $qry = mysqli_query($con,"SELECT Consultants.firstname as Fname, Consultants.lastname as Lname,Consultants.id as Cid, services.name as Sname,services.id as Sid, clients.fullname as ClientName,clients.id as ClientId, client_requests.description as description, client_requests.STATUS as staus,client_requests.id as ID,services.price FROM Consultants, services,clients,client_requests WHERE services.id = client_requests.service_id AND clients.id ='".$_SESSION['clientId']."'");
                                        while($row=mysqli_fetch_array($qry))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo  $row['ID']?></td>
                                                <td><?php echo  $row['Sname']?></td>
                                                <td><?php echo  $row['Fname'].' '.$row['Lname']?></td>
                                                <td><?php echo  $row['price']?></td>
                                                <td><?php echo  $row['description']?></td>
                                                <td>
                                                    <?php
                                                    if ($row['staus'] == 0) {
                                                        ?>
                                                        <button type="button" class="btn btn-block btn-warning">
                                                            Pending
                                                        </button>
                                                        <?php
                                                    } else {?>
                                                        <button type="button" class="btn btn-block btn-success">
                                                            Dealt With
                                                        </button>
                                                        <?php

                                                    }
                                                    ?>
                                                </td>
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
