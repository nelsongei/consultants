<?php
include 'headers.php';
?>
<div id="wrapper">
    <?php include 'sidebar.php' ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include 'topbar.php' ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="d-sm-flex col-12 align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div href="#" class="d-sm-flex col-12 align-items-center justify-content-between mb-4">
                        Welcome <?php echo $_SESSION['name'] ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-stripped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client Name</th>
                                        <th>Consultant Name</th>
                                        <th>Service Name</th>
                                        <th>Request Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'demo');
                                    $qry = mysqli_query($con, "SELECT Consultants.firstname as Fname, Consultants.lastname as Lname,Consultants.id as Cid, services.name as Sname,services.id as Sid, clients.fullname as ClientName,clients.id as ClientId, client_requests.description as description, client_requests.STATUS as staus,client_requests.id as ID FROM Consultants, services,clients,client_requests WHERE services.id = client_requests.service_id");
                                    while ($row = mysqli_fetch_array($qry)) {
                                        ?>
                                        <td><?php echo $row['ID'] ?></td>
                                        <td><?php echo $row['ClientName'] ?></td>
                                        <td><?php echo $row['Fname'] . ' ' . $row['Lname'] ?></td>
                                        <td><?php echo $row['Sname'] ?></td>
                                        <td><?php echo $row['description'] ?></td>
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
                                        <td>
                                            <div class="dropdown mb-4">
                                                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#updateRequst<?php echo $row['ID']?>">Edit</a>

                                                </div>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="updateRequst<?php echo $row['ID']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="clients/approve.php" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?php echo  $row['ID']?>">
                                                            <center>
                                                                <img src="../assets/img/check-correct.gif" alt="text">
                                                            </center>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">
                                                                Not Now
                                                            </button>
                                                            <button type="submit" class="btn btn-success btn-sm" name="approve">
                                                                Approve Request
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
include "footer.php";
?>

