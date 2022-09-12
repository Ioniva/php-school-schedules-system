<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/calendar" class="brand-link">
        <span class="brand-text font-weight-light"><strong>PHP</strong>eros</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php if ($_SESSION["userData"]["role_id"] === "3") { ?>

                <div class="info">
                    <a href="<?= base_url() ?>/profile" class="d-block"><?= $_SESSION["userData"]["name"] . " (" . $_SESSION["userData"]["role_name"] . ")" ?></a>
                </div>
            <?php } else { ?>
                <div class="info">
                    <a href="<?= base_url() ?>/profile" class="d-block"><?= $_SESSION["userData"]["name"] . " " . $_SESSION["userData"]["surname"] . " (" . $_SESSION["userData"]["role_name"] . ")" ?></a>
                </div>
            <?php } ?>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <em class="fas fa-search fa-fw"></em>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>/calendar" class="nav-link">
                        <strong class="nav-icon fas fa-th"></strong>
                        <p>
                            Calendar
                        </p>
                    </a>
                </li>
                <?php
                if ($_SESSION["userData"]["role_id"] === "3") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link">
                            <strong class="nav-icon fas fa-copy"></strong>
                            <p>
                                Manage Users
                                <em class="fas fa-angle-right right"></em>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/student" class="nav-link">
                                    <em class="far fa-circle nav-icon"></em>
                                    <p>Students</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/teacher" class="nav-link">
                                    <em class="far fa-circle nav-icon"></em>
                                    <p>Teacher</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/admin" class="nav-link">
                                    <em class="far fa-circle nav-icon"></em>
                                    <p>Admin</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">
                            <em class="nav-icon fas fa-copy"></em>
                            <p>
                                Administration
                                <em class="fas fa-angle-right right"></em>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/course" class="nav-link">
                                    <em class="far fa-circle nav-icon"></em>
                                    <p>Course</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/schedule" class="nav-link">
                                    <em class="far fa-circle nav-icon"></em>
                                    <p>Schedule</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/subject" class="nav-link">
                                    <em class="far fa-circle nav-icon"></em>
                                    <p>Subject</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>/enrollment" class="nav-link">
                                    <em class="far fa-circle nav-icon"></em>
                                    <p>Enrollment</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item border-top my-3">
                    <a href="<?= base_url(); ?>/logout" class="nav-link">
                        <strong class="nav-icon fas fa-sign-out-alt"></strong>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
