<?php
include "header.php";
$con = mysqli_connect('localhost','root','','demo');
if (isset($_POST['request']))
{
    $serviceId = $_POST['service_id'];
    $ConsultantId = $_POST['consultant_id'];
    $ClientId = $_POST['client_id'];
    $description = $_POST['description'];

    //
    $qry = mysqli_query($con,"INSERT INTO client_requests(service_id,consultant_id,client_id,description)
                            VALUES('$serviceId','$ConsultantId','$ClientId','$description')");
    if ($qry)
    {
        echo "<script>alert('Success')</script>";
    }
    else{
        echo  $con->error;
    }
}
?>
<div id="wrapper">
    <?php include "sidebar.php"; ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include "topbar.php"; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="d-sm-flex col-12 align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Services</h1>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'demo');
                    $services = mysqli_query($con, "SELECT Consultants.service_id,Consultants.id as ConsultantId,Consultants.firstname,Consultants.lastname, services.name,services.price FROM Consultants INNER JOIN services ON services.id=Consultants.service_id");
                    foreach ($services as $service) {
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-header bg-white">
                                    <div class="dropdown float-right">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#requestService<?php echo $service['service_id']?>">Request</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                <?php echo $service['name'] ?>
                                            </div>
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                <?php echo $service['firstname'].' '.$service['lastname'] ?>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $service['price'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-bill fa-2x text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="requestService<?php echo $service['service_id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="service_id" value="<?php echo $service['service_id']?>">
                                            <input type="hidden" name="consultant_id" value="<?php echo $service['ConsultantId']?>">
                                            <input type="hidden" name="client_id" value="<?php echo $_SESSION['clientId']?>">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea id="description" name="description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">
                                                Not Now
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-success" name="request">
                                                Request
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
