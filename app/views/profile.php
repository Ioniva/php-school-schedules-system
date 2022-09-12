<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | User Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
    <!-- jQuery -->
    <script defer src="public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script defer src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script defer src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script defer src="public/js/adminlte.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script defer src="public/plugins/moment/moment.min.js"></script>
    <!-- Sweetalert2 script -->
    <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom profile script -->
    <script defer src="public/js/functions_profile.js"></script>
    <!-- Base URL for app -->
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
</head>

<body class="hold-transition sidebar-mini">

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include("includes/asidebar.php"); ?>
    <!-- /. main Sidebar Container -->

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/calendar">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- About Me Box -->
                        <div class="col-xl-3 col-md-12 col-sm-12 card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong></em> Name and Surnames</strong>
                                <p class="text-muted">
                                    <?php
                                    if ($_SESSION["userData"]["role_id"] == 1 || $_SESSION["userData"]["role_id"] == 2) {
                                        echo $_SESSION["userData"]["name"] . " " . $_SESSION["userData"]["surname"];
                                    }

                                    if ($_SESSION["userData"]["role_id"] == 3) {
                                        echo $_SESSION["userData"]["name"];
                                    }
                                    ?>
                                </p>
                                <hr>
                                <?php if ($_SESSION["userData"]["role_id"] == 1) { ?>
                                    <strong>Username</strong>
                                    <p class="text-muted">
                                        <?= $_SESSION["userData"]["username"] ?>
                                    </p>
                                    <hr>
                                <?php } ?>
                                <strong>Email</strong>
                                <p class="text-muted"><?= $_SESSION["userData"]["email"] ?></p>
                                <hr>
                                <?php if ($_SESSION["userData"]["role_id"] == 1 || $_SESSION["userData"]["role_id"] == 2) { ?>
                                    <strong>Telephone</strong>
                                    <p class="text-muted"><?= $_SESSION["userData"]["telephone"] ?></p>
                                    <hr>
                                    <strong>NIF/CIF/NIE</strong>
                                    <p class="text-muted"><?= $_SESSION["userData"]["nif"] ?></p>
                                    <hr>
                                <?php } ?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="col-xl-9 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div id="settings">
                                            <form id="userForm" name="userForm" method="post">
                                                <input type="hidden" id="userId" name="id" value="<?= $_SESSION["userData"]["user_id"] ?>">
                                                <input type="hidden" id="roleId" name="role_id" value="<?= $_SESSION["userData"]["role_id"] ?>">
                                                <p class="primary-text">Todos los campos son obligatorios.</p>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" placeholder="Insert the name" value="<?= $_SESSION["userData"]["name"] ?>">
                                                    </div>
                                                    <?php if ($_SESSION["userData"]["role_id"] == 1 || $_SESSION["userData"]["role_id"] == 2) { ?>
                                                        <div class="col-6">
                                                            <label for="surname">surname</label>
                                                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Insert the surname" value="<?= $_SESSION["userData"]["surname"] ?>">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <?php if ($_SESSION["userData"]["role_id"] == 1) { ?>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="username">Username</label>
                                                            <input type="text" id="username" name="username" class="form-control" placeholder="Insert the username" value="<?= $_SESSION["userData"]["username"] ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="Insert the email" value="<?= $_SESSION["userData"]["email"] ?>">
                                                        <small class="form-text text-muted">We will never share your email</small>
                                                    </div>
                                                </div>
                                                <?php if ($_SESSION["userData"]["role_id"] == 1 || $_SESSION["userData"]["role_id"] == 2) { ?>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="phone">Phone</label>
                                                            <input type="number" id="phone" name="phone" class="form-control" placeholder="Insert the phone number" value="<?= $_SESSION["userData"]["telephone"] ?>">
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="nif">CIF/NIF/NIE</label>
                                                            <input type="text" id="nif" name="nif" class="form-control" placeholder="Insert the surname" value="<?= $_SESSION["userData"]["nif"] ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="row">
                                                    <div class="col-6 mb-4">
                                                        <label for="password">Password</label>
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="Insert the password" require>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" id="btnAction"><span id="btnText">Update changes</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

</html>
