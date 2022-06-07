<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Inventory Report</title>
  <!-- Google Font: Source Sans Pro -->
  <?php include '../dist/includes/link.php';?>
  <style type="text/css">
    @media print {
      .card-tools, .card-title{
        display: none;
      }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SINHSLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include '../dist/includes/navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include '../dist/includes/sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inventory Report</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-list-ul mr-1"></i>
                  Inventory Report
                </h3>
                <div class="card-tools">
                  <form method="post" action="">
                  <div class="input-group mb-3">
                    
                      <button class="btn btn-warning" type="button" onclick="window.print()"><span><i class="fas fa-print"></i>Print</span></button>
                      <span id="print"></span>
                       
                    
                </div>
                </form>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: right;">
                    <img src="../dist/img/logo.png" style="height: 100px" style="float: right">
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8">
                    <h6 style="text-align: center;">Republic of the Philippines</h6>
                    <h6 style="text-align: center;">Department of Education</h6>
                    <h6 style="text-align: center;">Division of Negros Occidental</h6>
                    <h5 style="text-align: center;">SANN JOSE VETERINARY CLINIC</h5>
                    <h6 style="text-align: center;">Talisay City, Negros Occidental</h6><br>
                    <h4 style="text-align: center;">Inventory Report as of <?php echo date("F d, Y");?></h4>
                  </div>
                </div>
                
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Reorder Point</th>
                    <th>Qty On Hand</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php include '../dist/includes/dbcon.php';    
                  
                  //$date=$_POST['date'];
                  $query=mysqli_query($con,"select * from product where prod_type='Product' and prod_qty<=prod_reorder")or die(mysqli_error($con));
                    $i=1;
                    while ($row=mysqli_fetch_array($query)){
                    $id=$row['prod_id'];
                    $id=$row['prod_id'];
                    $status=
                  ?>       
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['prod_reorder'];?></td>
                    <td><?php echo $row['prod_qty'];?></td>
                    <td><?php //echo $row['user_sex'];?></td>
                    
                  <?php $i++;}?>  
                  </tr>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../dist/includes/footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include '../dist/includes/script.php';?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"paging": false, "searching": false,buttons:['excelHtml5']
    }).buttons().container().appendTo('#print');
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
