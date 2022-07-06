<?php
include "header.php";
?>
<div id="wrapper">
    <?php
    include "sidebar.php";
    ?>
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
                        <div class="card border-left-primary">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-profile rounded-circle"
                                         src="../img/undraw_profile.svg" height="100" width="100">
                                    <h3><?php echo $_SESSION['clientName'] ?></h3>
                                    <p><?php echo $_SESSION['clientEmail'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card border-left-success mt-3">
                            <div class="card-body">
                                <p class="text-muted">
                                    <i class="fa fa-envelope" style="color: #0a53be"></i>
                                    <?php echo $_SESSION['clientEmail'] ?>
                                </p>
                                <p class="text-muted">
                                    <i class="fa fa-phone" style="color: #5984c2"></i>
                                    <?php echo $_SESSION['clientPhone'] ?>
                                </p>
                                <p class="text-muted">
                                    <i class="fa fa-male" style="color: #7d92a9"></i>
                                    <?php echo $_SESSION['clientGender'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="card">
                            <form action="editClient.php" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?php echo $_SESSION['clientId'] ?>">
                                        <div class="form-group col-sm-6">
                                            <label>Fullname</label>
                                            <input type="text" name="name"
                                                   value="<?php echo $_SESSION['clientName'] ?>"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email</label>
                                            <input type="text" name="email"
                                                   value="<?php echo $_SESSION['clientEmail'] ?>"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Phone</label>
                                            <input type="text" name="phone"
                                                   value="<?php echo $_SESSION['clientPhone'] ?>"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Gender</label>
                                            <input type="text" name="gender"
                                                   value="<?php echo $_SESSION['clientGender'] ?>"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Password</label>
                                            <input type="password" name="password"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary" name="update">
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
