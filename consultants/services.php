<?php
    include "header.php";
?>
<div id="wrapper">
    <?php include "sidebar.php"?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include "topbar.php"?>
            <div class="container-fluid">
                <div class="row">
                    <div class="d-sm-flex col-12 align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Services I am Offering</h1>
                    </div>
                </div>
                <?php
                    $con = mysqli_connect('localhost','root','','demo');
                    $services = mysqli_query($con,"SELECT Consultants.service_id,Consultants.id,services.name,services.price FROM Consultants INNER JOIN services ON services.id=Consultants.service_id");
                    foreach ($services as $service)
                    {?>
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        <?php echo $service['name']?>
                                                    </div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $service['price']?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-money-bill fa-2x text-success"></i>
                                                </div>
                                            </div>
                                        </div>
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
<?php
    include "footer.php"
?>
