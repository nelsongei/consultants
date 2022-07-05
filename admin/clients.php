<?php
include 'headers.php';
$con = mysqli_connect('localhost','root','','demo');
if (isset($_POST['save'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];

    //Sending The Data To The DB Table
    $qry = mysqli_query($con,"INSERT INTO clients(fullname,gender,phone,email)
                    VALUES('$name','$gender','$phone','$email')");
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
            <?php include 'topbar.php'?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Clients</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addClient">
                                    Add Client
                                </button>
                                <table class="table table-bordered table-striped mt-3">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $qry = mysqli_query($con,"SELECT * FROM clients");
                                        while($row = mysqli_fetch_array($qry))
                                        {
                                           ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['gender']; ?></td>
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                                            <a class="dropdown-item" href="clients/view.php">View</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#editClient<?php echo $row['id']?>">Edit</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteClient<?php echo $row['id']?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="deleteClient<?php echo $row['id']?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="clients/delete.php" method="post">
                                                            <div class="modal-body">
                                                                <center>
                                                                    <i class="fa fa-trash fa-5x" style="color: red"></i>
                                                                    <p>Are You sure you want to delete <?php echo $row['fullname']?></p>
                                                                </center>
                                                            </div>
                                                            <div class="modal-footer justify-content-center">
                                                                <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">
                                                                    Not Now
                                                                </button>
                                                                <button class="btn btn-sm btn-danger" type="submit" name="delete">
                                                                    Delete Client
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="editClient<?php echo $row['id']?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="clients/edit.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                                                <div class="form-group">
                                                                    <label for="name">Client Name</label>
                                                                    <input id="name" type="text" name="name" class="form-control" value="<?php echo $row['fullname']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Client Email</label>
                                                                    <input id="email" type="email" name="email" class="form-control" value="<?php echo $row['email']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="phone">Client Phone Number</label>
                                                                    <input id="phone" type="text" name="phone" class="form-control" value="<?php echo $row['phone']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gender">Gender</label>
                                                                    <select name="gender" id="gender" class="form-control">
                                                                        <option disabled>Select Gender</option>
                                                                        <option value="Female">Female</option>
                                                                        <option value="Male">Male</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-center">
                                                                <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">
                                                                    Not Now
                                                                </button>
                                                                <button class="btn btn-sm btn-success" type="submit" name="edit">
                                                                    Update Client
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
        <div class="modal fade" id="addClient">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Add Client</h4>
                    </div>
                    <form method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Client Name</label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Client Email</label>
                                <input id="email" type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Client Phone Number</label>
                                <input id="phone" type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option disabled>Select Gender</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">
                                Not Now
                            </button>
                            <button class="btn btn-sm btn-success" type="submit" name="save">
                                Add Client
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
