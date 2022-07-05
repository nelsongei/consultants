<?php
    include 'headers.php';
    $con = mysqli_connect('localhost','root','','demo');
    if (isset($_POST['save']))
    {
        $name =$_POST['name'];
        $price = $_POST['price'];
        //
        $qry = mysqli_query($con,"INSERT INTO services(name,price)
                            VALUES('$name','$price')");
        if ($qry)
        {
            echo "<script>alert('Success')</script>";
        }
        else{
            echo $con->error;
        }
    }
?>
<div id="wrapper">
    <?php include 'sidebar.php'?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include 'topbar.php' ?>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Services</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="mb-4 btn btn-sm btn-primary" data-toggle="modal" data-target="#addServices">
                                    Add Services
                                </button>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $services = mysqli_query($con,'SELECT * FROM services');
                                        foreach ($services as $service)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $service['id']; ?></td>
                                                <td><?php echo $service['name']; ?></td>
                                                <td><?php echo $service['price']; ?></td>
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                                            <a class="dropdown-item" href="clients/view.php">View</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#editService<?php echo $service['id']?>">Edit</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteService<?php echo $service['id']?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="deleteService<?php echo $service['id']?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="post" action="services/delete.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?php echo  $service['id']?>">
                                                                <center>
                                                                    <i class="fa fa-trash fa-5x" style="color: red"></i>
                                                                    <p>Are You sure you want to delete <?php echo $service['name']?></p>
                                                                </center>
                                                            </div>
                                                            <div class="modal-footer justify-content-center">
                                                                <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">
                                                                    Not Now
                                                                </button>
                                                                <button class="btn btn-sm btn-danger" type="submit" name="delete">
                                                                    Delete Service
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="editService<?php echo $service['id']?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="services/edit.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo  $service['id']?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input id="name" type="text" name="name" class="form-control" value="<?php echo $service['name']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="price">Price</label>
                                                                    <input id="price" type="text" name="price" class="form-control" value="<?php echo $service['price']?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-center">
                                                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                                                                    Not Now
                                                                </button>
                                                                <button type="submit" class="btn btn-sm btn-primary" name="update">
                                                                    Update Services
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
            <div class="modal fade" id="addServices">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input id="price" type="text" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                                    Not Now
                                </button>
                                <button type="submit" class="btn btn-sm btn-primary" name="save">
                                    Add Services
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
?>
