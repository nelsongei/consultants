<?php
include 'headers.php';
$con  = mysqli_connect('localhost','root','','demo');
if (isset($_POST['save']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $email = $_POST['email'];
    $service = $_POST['service_id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $qry = mysqli_query($con,"INSERT INTO Consultants(firstname,lastname,gender,email,service_id,address,phone)
                                    VALUES ('$firstname','$lastname','$gender','$email','$service','$address','$phone')");
    if ($qry)
    {
        echo "<script>alert('Successfully Addded a Consultant')</script>";
    }
    else{
        $con->error;
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
                    <h1 class="h3 mb-0 text-gray-800">Consultants</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addConsultants">
                                    Add Consultants
                                </button>
                                <table class="table table-bordered table-stripped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $consultants = mysqli_query($con,"SELECT * FROM Consultants");
                                        while($cons =mysqli_fetch_array($consultants))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $cons['id']?></td>
                                                <td><?php echo $cons['firstname'].' '. $cons['lastname']?></td>
                                                <td><?php echo $cons['email']?></td>
                                                <td><?php echo $cons['gender']?></td>
                                                <td><?php echo $cons['address']?></td>
                                                <td><?php echo $cons['phone']?></td>
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                                            <a class="dropdown-item" href="clients/view.php">View</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#editClient<?php echo $cons['id']?>">Edit</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteClient<?php echo $cons['id']?>">Delete</a>
                                                        </div>
                                                    </div>
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
            <div class="modal fade" id="addConsultants">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input id="firstname" type="text" name="firstname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input id="lastname" type="text" name="lastname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Gender</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option disabled>Select Gender</option>
                                        <option>Female</option>
                                        <option>Male</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="service_id">Services</label>
                                    <select class="form-control" name="service_id" id="service_id">
                                        <option disabled>Select Service</option>
                                        <?php
                                        $services = mysqli_query($con,"SELECT * FROM services");
                                        while($row = mysqli_fetch_array($services)){
                                            ?>
                                            <option value="<?php echo $row['id']?>"><?php echo $row['name'].'  Price: '.$row['price']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" name="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                                    Not Now
                                </button>
                                <button type="submit" class="btn btn-sm btn-primary" name="save">
                                    Add Consultant
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
