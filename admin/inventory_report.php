<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php include '../dist/includes/title.php';?> | Products</title>
  <!-- Google Font: Source Sans Pro -->
  <?php include '../dist/includes/link.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../dist/img/logo.png" alt="SINHSLogo" height="60" width="60">
  </div>-->

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
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
             
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: right;">
                    <img src="../dist/img/logo.png" style="height: 100px" style="float: right">
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8">
                    <h6 style="text-align: center;">Sann Jose Veterinary Clinic</h6>
                    <h6 style="text-align: center;">Talisay City</h6>
                    <h6 style="text-align: center;">Negros Occidental</h6>
                    <h4 style="text-align: center;">Inventory Report as of <?php echo date("F d, Y");?></h4><br>
                  </div>
                </div>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Qty On Hand</th>
                    <th>Reorder</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php include '../dist/includes/dbcon.php';    
                  
                  $query=mysqli_query($con,"select * from product where prod_type='Product' order by prod_name")or die(mysqli_error($con));
                    $i=0;
                    while ($row=mysqli_fetch_array($query)){
                    $id=$row['prod_id'];
                    if ($row['prod_qty']<=$row['prod_reorder']){
                      $status="danger";
                    }
                    else{
                      $status="success";
                    }
                    $i++;      
                  ?>       
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['prod_name'];?></td>
                    <td><?php echo $row['prod_price'];?></td>
                    <td style="text-align: center;"><?php echo $row['prod_qty'];?></td>
                    <td style="text-align: center;"><?php echo $row['prod_reorder'];?></td>
                    </td>
                    <td>
                      <button class="btn btn-<?php echo $status?>"></button>
                    </td>
                    
                  <?php }?>  
                  </tr>
                  </tbody>
                  
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          
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
  bsCustomFileInput.init();
});
</script>
</body>
</html>
