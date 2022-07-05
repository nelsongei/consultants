<?php
include "header.php";
?>
<div id="wrapper">
    <?php include "sidebar.php"; ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php include "topbar.php"; ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="d-sm-flex col-12 align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card border-left-warning mb-3">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-profile rounded-circle"
                                         src="../img/undraw_profile.svg" height="100" width="100">
                                    <h3><?php echo $_SESSION['consultantName'] ?></h3>
                                    <h6><?php echo $_SESSION['consultant'] ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="card border-left-success">
                            <div class="card-body">
                                <p class="text-muted">
                                    <i class="fa fa-user" style="color: green"></i>
                                    Name: <?php echo $_SESSION['consultantName'] ?>
                                </p>
                                <p class="text-muted">
                                    <i class="fa fa-envelope" style="color: greenyellow"></i>
                                    Email: <?php echo $_SESSION['consultant'] ?>
                                </p>
                                <p class="text-muted">
                                    <i class="fa fa-phone" style="color: greenyellow"></i>
                                    Phone Number: <?php echo $_SESSION['phone'] ?>
                                </p>
                                <p class="text-muted">
                                    <i class="fa fa-male" style="color: greenyellow"></i>
                                    Gender: <?php echo $_SESSION['gender'] ?>
                                </p>
                                <p class="text-muted">
                                    <i class="fa fa-location-arrow" style="color: greenyellow"></i>
                                    Address: <?php echo $_SESSION['address'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card border-left-danger">
                            <form action="profile/edit.php" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
                                        <div class="form-group col-sm-6">
                                            <label>Fullname</label>
                                            <input type="text" name="name"
                                                   value="<?php echo $_SESSION['consultantName'] ?>"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email</label>
                                            <input type="text" name="email" value="<?php echo $_SESSION['consultant'] ?>"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="<?php echo $_SESSION['phone'] ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Address</label>
                                            <input type="text" name="address" value="<?php echo $_SESSION['address'] ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Gender</label>
                                            <input type="text" name="gender" value="<?php echo $_SESSION['gender'] ?>"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="update" class="btn btn-sm btn-info">
                                        Update
                                    </button>
                                </div>
                            </form>
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
