<?php
    include 'headers.php';
    $con = mysqli_connect('localhost','root','','demo');
    if (isset($_POST['save']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $qry = mysqli_query($con,"INSERT INTO users(name,email,gender)
                                VALUES('$name','$email','$gender')");

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
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUser">
                                    Add Client
                                </button>
                                <table class="table table-bordered table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $users = mysqli_query($con,'SELECT * FROM users');
                                        while($row = mysqli_fetch_array($users))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id']?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><?php echo $row['gender']?></td>
                                                <td>
                                                    <div class="dropdown mb-4">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton" style="">
                                                            <a class="dropdown-item" href="clients/view.php">View</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#editUser<?php echo $row['id']?>">Edit</a>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteUser<?php echo $row['id']?>">Delete</a>
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
        </div>
        <div class="modal fade" id="addUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" name="email" class="form-control">
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
                                Add User
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
