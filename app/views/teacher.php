<?php

getModal("modalTeacher", $data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>PHPeros | Teacher</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="public/css/adminlte.min.css">
 <!-- Custom student styles -->
 <link rel="stylesheet" href="public/css/student.css">
 <!-- jQuery -->
 <script defer src="public/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI -->
 <script defer src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Bootstrap 4 -->
 <script defer src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script defer src="public/js/adminlte.min.js"></script>
 <!-- Custom student script -->
 <script defer src="public/js/functions_teacher.js"></script>
 <!-- Sweetalert2 script -->
 <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- DataTables  & Plugins -->
 <link rel="stylesheet" href="public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link rel="stylesheet" href="public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 <script defer src="public/plugins/datatables/jquery.dataTables.min.js"></script>
 <script defer src="public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script defer src="public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script defer src="public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script defer src="public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script defer src="public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script defer src="public/plugins/jszip/jszip.min.js"></script>
 <script defer src="public/plugins/pdfmake/pdfmake.min.js"></script>
 <script defer src="public/plugins/pdfmake/vfs_fonts.js"></script>
 <script defer src="public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script defer src="public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script defer src="public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
                     <div class="col-sm-6 container-header">
                         <h1>Teacher</h1>
                         <button type="button" class="btn btn-primary ml-3" id="btnCreateTeacher" onclick="openModal()">
                             New Teacher
                         </button>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active">Teacher</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">DataTable with default features</h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
                 <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                     <div class="row">
                         <div class="col-sm-12 col-md-6">
                             <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                                 <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span><span class="dt-down-arrow"></span></button></div>
                             </div>
                         </div>
                         <div class="col-sm-12 col-md-6">
                             <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-sm-12">
                             <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                 <thead>
                                     <tr>
                                         <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Name</th>
                                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Surname</th>
                                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>
                                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Phone</th>
                                         <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CIF/NIF/NIE</th>
                                         <th class="sorting" tabindex="0" aria-controls="example1" rows#an="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php for ($i = 0; $i < count($data); $i++) : ?>
                                         <tr>
                                             <td>#</td>
                                             <td><?= $data[$i]['name'] ?></td>
                                             <td><?= $data[$i]['surname'] ?></td>
                                             <td><?= $data[$i]['email'] ?></td>
                                             <td><?= $data[$i]['telephone'] ?></td>
                                             <td><?= $data[$i]['nif'] ?></td>
                                             </td>
                                             <td class="project-actions text-right">
                                                 <a class="btn btn-primary btn-flat disabled ml-4" href="#">
                                                     <em class="fas fa-folder"></em>
                                                     View
                                                 </a>
                                                 <button type="button" class="btn btn-info btn-flat ml-4" id="btn-edit" onclick="fntEditTeacher(<?= $data[$i]['id_teacher']; ?>)">
                                                     <em class="fas fa-pencil-alt"></em>
                                                     Edit
                                                 </button>
                                                 <button type="button" class="btn btn-danger btn-flat ml-4" id="btn-delete" onclick="fntDelTeacher(<?= $data[$i]['id_teacher']; ?>)">
                                                     <em class="fas fa-trash"></em>
                                                     Delete
                                                 </button>
                                             </td>
                                         </tr>
                                     <?php endfor; ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-sm-12 col-md-5">
                             <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                         </div>
                         <div class="col-sm-12 col-md-7">
                             <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                 <ul class="pagination">
                                     <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                     <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                     <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                     <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                     <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                     <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                     <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                     <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.container-fluid -->
         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
 </div>
 <!-- ./wrapper -->
</body>

</html>
